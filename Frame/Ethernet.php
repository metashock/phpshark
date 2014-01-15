<?php
class Frame_Ethernet
{

    protected $sourceaddr;

    protected $destaddr;

    protected $ethertype;

    protected $type;

    protected $raw;


    public function __construct(
        $sourceaddr,
        $destaddr,
        $ethertype,
        $raw = ''
    ) {
        $this->sourceaddr = $sourceaddr;
        $this->destaddr = $destaddr;
        $this->ethertype = $ethertype;
        $this->raw = $raw;
    }


    public static function fromstring($raw){
        $parts = array();
        for($i=0; $i<6; $i++){
            $parts []= str_pad(dechex(ord($raw[$i])), 2, '0');
        }
        
        $destaddr = implode(':', $parts);
        
        $parts = array();
        for($i=6; $i<12; $i++){
            $parts []= str_pad(dechex(ord($raw[$i])), 2, '0');
        }
       
        $sourceaddr = implode(':', $parts);

        $unpacked = unpack('n', substr($raw, 12, 2));
        $ethertype = array_shift($unpacked);

        // @TODO check if this a vlan frame

        // try to decode payload

        return new Frame_Ethernet($sourceaddr, $destaddr, $ethertype, $raw);
    }


    public function subframe() {
        $classname = 'Frame_'
            . Frame_Ethernet_Type::humanize($this->ethertype);

        if(!class_exists($classname, TRUE)) {
            $frame = Frame::fromstring(substr($this->raw, 14));
        } else {
            $frame = $classname::fromstring(substr($this->raw, 14));
        }
        return $frame;
    }


    public function sourceaddr(){
        return $this->sourceaddr;
    }

    public function destaddr(){
        return $this->destaddr;
    }


    public function __toString() {
        $str  = '[Ethernet] Source Address:       '
            . $this->sourceaddr . PHP_EOL;
        $str .= '[Ethernet] Destination Address:  ' 
            . $this->destaddr . PHP_EOL;
        $str .= '[Ethernet] EtherType:            0x' 
            . str_pad(dechex($this->ethertype), 4, '0', STR_PAD_LEFT)
            . '(' . Frame_Ethernet_Type::humanize($this->ethertype) . ')' . PHP_EOL;

        return $str;
    }
}

