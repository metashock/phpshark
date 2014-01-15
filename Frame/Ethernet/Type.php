<?php


class Frame_Ethernet_Type 
{

    const IPV4 = 0x0800;

    const VLAN = 0x8100;

    const ARP  = 0x0806;

    const IPV6 = 0x86DD;


    /**
     * @return string
     */
    public static function humanize($type) {
        switch($type) {
            case self::IPV4 :
                return 'IPv4';
            case self::ARP :
                return 'ARP';
            case self::VLAN :
                return 'VLAN';
            case self::IPV6 :
                return 'IPv6';
            default :
                return (string) $type;
        }
    }
}


