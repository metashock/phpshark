<?php


class Frame_IPv4 extends Frame
{

    protected $version;

    protected $ihl;

    protected $tos;

    protected $totallen;

    protected $id;

    protected $flags;

    protected $offset;

    protected $ttl;

    protected $protocol;

    protected $checksum;

    protected $srcaddr;

    protected $destaddr;

    protected $raw;

    /**
     *
     */
    public function __construct($configuration = NULL, $raw = '') {
        $this->configure($configuration);
        $this->raw = $raw;
    }
 

    public static function fromstring($data) {
        //hexdump($data);
        $unpacked = unpack(join('/', array(
            'CfirstByte',
            'Ctos',
            'ntotallen',
            'nid',
            'noffset',
            'Cttl',
            'Cprotocol',
            'nchecksum',
            'Nsrcaddr',
            'Ndestaddr',
            'Noptions'
        )), $data);

        extract($unpacked);

        $version = $firstByte >> 4;
        $ihl = $firstByte - ($version << 4);
        $ihl *= 4; // (in bytes)
        
        $dscp = $tos >> 2;
        $cu = $tos - ($dscp << 2);

        $unpacked['version'] = $version;
        $unpacked['ihl'] = $ihl;
        
        $unpacked['flags'] = $offset >> 13;
        $offset &= 0x1FFF;
        $unpacked['offset'] = $offset;
        // var_dump($unpacked);

        return new Frame_IPv4($unpacked, $data);
    }


    public function subframe() {
        $classname = 'Frame_'
            . Frame_IPv4_Protocol::humanize($this->protocol);

        if(!class_exists($classname, TRUE)) {
            $frame = Frame::fromstring(substr($this->raw, $this->ihl));
        } else {
            $frame = $classname::fromstring(substr($this->raw, $this->ihl));
        }
        return $frame;
    }


    public function __toString() {
        $str  = '[IPv4] Version :     ' . $this->version . PHP_EOL;
        $str .= '[IPv4] Header Length:' . $this->ihl . ' Bytes' . PHP_EOL;
        $str .= '[IPv4] Type of Service:' . $this->tos . PHP_EOL;
        $str .= '[IPv4] Total Length:' . $this->totallen . ' Bytes' . PHP_EOL;
        $str .= '[IPv4] ID:' . $this->id . PHP_EOL;
       
        $str .= '[IPv4] Flags: 0   RESERVED' . PHP_EOL;
        if(($this->flags & 0x2) == 0x2) {
            $str .= '[IPv4] Flags:  1  CAN BE FRAGMENTED' . PHP_EOL;
        } else {
            $str .= '[IPv4] Flags:  0  DON\'T FRAGMENT' . PHP_EOL;
        } 

        if(($this->flags & 0x1) == 0x1) {
            $str .= '[IPv4] Flags:   1 MORE FRAGMENTS FOLLOW' . PHP_EOL;
        } else {
            $str .= '[IPv4] Flags:   0 LAST FRAGMENT' . PHP_EOL;
        }

        $str .= '[IPv4] Fragment Offset: ' . $this->offset . PHP_EOL;
        $str .= '[IPv4] TTL: ' . $this->ttl . PHP_EOL;
        $str .= '[IPv4] Protocol: '
            . Frame_IPv4_Protocol::humanize($this->protocol) . PHP_EOL;
        $str .= '[IPv4] Source Address: ' . long2ip($this->srcaddr) . PHP_EOL;
        $str .= '[IPv4] Destination Address: ' . long2ip($this->destaddr) . PHP_EOL;
        return $str;
    }


    public function configure($configuration) {
        $this->version = $configuration['version'];
        $this->ihl = $configuration['ihl'];
        $this->tos = $configuration['tos'];
        $this->totallen = $configuration['totallen'];
        $this->id = $configuration['id'];
        $this->flags = $configuration['flags'];
        $this->offset = $configuration['offset'];
        $this->ttl = $configuration['ttl'];
        $this->protocol = $configuration['protocol'];
        $this->checksum = $configuration['checksum'];
        $this->srcaddr = $configuration['srcaddr'];
        $this->destaddr = $configuration['destaddr'];
    }
}
