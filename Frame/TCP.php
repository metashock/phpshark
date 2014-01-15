<?php

class Frame_TCP extends Frame
{

    public function __construct($configuration) {
        $this->configure($configuration);
    }

    public static function fromstring($data) {
        $unpacked = unpack(join('/', array(
            'nsrcport',
            'ndstport',
            'Nseqnum',
            'Nacknum'
        )), $data);
        $frame = new Frame_TCP($unpacked);
        hexdump($data);
        return $frame;
    }

    public function __get($varname) {
        if(!isset($this->configuration[$varname])) {
            throw new Exception('index ' . $varname . ' not found');
            // print('index ' . $varname . ' not found');
        }
        return $this->configuration[$varname];
    }


    public function __toString() {
        $str  = '[TCP] Source Port: ' . $this->srcport . PHP_EOL;
        $str .= '[TCP] Destination Port: ' . $this->dstport . PHP_EOL;
        $str .= '[TCP] Sequence Number: ' . $this->seqnum . PHP_EOL;
        $str .= '[TCP] Acknowledgement Number: ' . $this->acknum . PHP_EOL;
        return $str;
    }

    public function configure($configuration) {
        $this->configuration = $configuration;
    }
}

