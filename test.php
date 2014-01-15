<?php

declare(ticks=1);

ini_set('display_errors', '1');

pcntl_signal(SIGINT, 'handler');

function handler() {
    exit(1);
}

printf("pcap library version: %s\n",
    pcap_lib_version());

if(!isset($argv[1])) {
    $dev = pcap_lookupdev($errbuf);
    if($dev === FALSE) {
    die("pcap_lookupdev(): $errbuf\n");
    }
} else {
    $dev = $argv[1];
}

if(pcap_lookupnet($dev, $net, $netmask, $errbuf) == -1) {
    die("pcap_lookupnet(): $errbuf\n");
}

printf("pcap_lookupdev(): net=%s mask=%s\n",
    long2ip($net), long2ip($netmask)
);

echo 'pcap_lookupdev(): using device: ' . $dev . PHP_EOL;

$pcap = pcap_open_live($dev, 65535, 1, 1000, $errbuf);
// $pcap = pcap_open_offline('test.pcap', $errbuf);
if(!is_resource($pcap)) {
    die("pcap_open_live(): $errbuf\n");
}

echo "pcap_open_live(): resource is $pcap (";
echo get_resource_type($pcap) . ")\n";

echo 'pcap_datalink(): link-type is ' . pcap_datalink($pcap) . PHP_EOL;

if (pcap_datalink($pcap) != 1) {
    printf('Device %s doesn\'t provide Ethernet headers - not supported%s',
        $dev, PHP_EOL);
    return(2);
}

if(isset($argv[2])) {
    $filterstr = $argv[2];
    $ret = pcap_compile($pcap, $filter, $filterstr, 1, $netmask);
    echo "compiled filter '$filterstr'" . PHP_EOL;

    if(pcap_setfilter($pcap, $filter) !== 0) {
    die('pcap_setfilter() failed');
    }
}

require_once 'Hexdump.php';
require_once 'Jm/Autoloader.php';


$dump = new Dump_Pcap('test.pcap');
$dump->open();
$fname = '';//'test.pcap';
while(TRUE) {
    $data = pcap_next($pcap, $header);
    if(is_null($data)) {
        if(!empty($fname)) {
            break;
        }
        echo 'wating for packet timed out' . PHP_EOL;
    } else {
		// write to pcap file
        $dump->write($header, $data);

		// decrypt and display the frame an it's subframes
        $frame = Frame_Ethernet::fromstring($data);
        do {
            print($frame . '');
        } while ($frame = $frame->subframe());
    }
}

