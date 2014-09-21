<?php

class ARP extends Frame
{

	protected $hwaddrtype;

	protected $prtcladdrtype;

	protected $hwaddrsize;

	protected $prtcladdrsize;

	protected $operation;

	protected $sourcemac;

	protected $sourceip;

	protected $destmac;

	protected $destip;

	protected $header;


	/**
	 *
	 */
	public function defaults() {
		return array(
			'hwaddrtype' 	=> 0x1, 		// Ethernet
			'prctladdrtype' => 0x0800,		// IPv4
			'hwaddrsize'    => 0x6,			// Mac, Ethernet
			'prctladdrsize'	=> 0x4,			// IPv4
			'destmac'		=> 0xFFFFFFFF	// Broadcast
		);
	}


	public function binspec() {
		return array(
			'hwaddrtype' 	=> 'n',
			'prtcladdrtype' => 'n'
			'hwaddrsize' 	=> '1 Byte',
			'prtcladdrsize' => '1 Byte',
			'operation'		=> 'n',
			'sourcemac'		=> 48,
			'sourceip'		=> 'N',
		)

/*		return Spec::create()
		  ->hwaddrtype(8, 'n', 'Hardware address type')
		  ->prtcladdrtype(8, 'n', 'Protocol address type')
		  -> .. */
	}	


	/**
	 *
	 */
	public function pack() {
		$bytes = '';
		foreach($this->binspec() as $header => $desc) {
			$bytes .= pack($this->$header(), $desc);
		}
	}


	public function unpack($data) {

	}

}
