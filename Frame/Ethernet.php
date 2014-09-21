<?php

class Frame_Ethernet
{

    protected $sourceaddr;

    protected $destaddr;

    protected $ethertype;

    protected $type;

    protected $payload;


    public function __construct(
        $destaddr,
        $sourceaddr,
        $ethertype,
        $payload = ''
    ) {
        $this->destaddr = $destaddr;
        $this->sourceaddr = $sourceaddr;
        $this->ethertype = $ethertype;
        $this->payload = $payload;
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

		$payload = substr($raw, 14);

        return new Frame_Ethernet($destaddr, $sourceaddr, $ethertype, $payload);
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

	public function ethertype() {
		return $this->ethertype;
	}

	public function payload() {
		return $this->payload;
	}


	public function bytes() {
		$bytes = '';
		foreach(explode(':', $this->destaddr) as $hex) {
			$bytes .= chr(hexdec($hex));			
		}

		foreach(explode(':', $this->sourceaddr) as $hex) {
			$bytes .= chr(hexdec($hex));			
		}

		$bytes .= pack('n', $this->ethertype);
		$bytes .= $this->payload;

		hexdump($bytes);
		return $bytes;
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

