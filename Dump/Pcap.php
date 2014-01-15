<?php

/**
 * .pcap writer according to:
 * http://wiki.wireshark.org/Development/LibpcapFileFormat
 */
class Dump_Pcap
{

    protected $filename;


    public function __construct($filename) {
        $this->filename = $filename;
    }


    public function open() {
        $globalHeader = pack('LSSiLLL',
            $magicnum = 0xa1b2c3d4,
            $versionmaj = 2,
            $versionmin = 4,
            $thiszone = 0,
            $sigfigs = 0,
            $snaplen = 65535,
            $linklayer = 1
        );

        file_put_contents($this->filename, $globalHeader);
    }

    /**
     *
     */
    public function write($header, $data) {
        $packet = pack('LLLL',
            $header['ts']['tv_sec'],
            $header['ts']['tv_usec'],
            $header['caplen'],
            $header['len']
        );

        $packet .= $data;
        file_put_contents($this->filename, $packet, FILE_APPEND);
    }
}

