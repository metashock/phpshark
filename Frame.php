<?php

class Frame
{

	protected $header;

    protected $data;


	public function __construct(array $header) {
		$this->header = array_merge($this->defaults(), $header);
	}

    public function subframe() {
        return NULL;
    }

	public function __call($fname, $args) {
		if(!isset($this->header[$fname])) {
			throw new Exception('Bla Bla');
		}
		
		if(count($args) === 0) {
			return $this->header[$fname];
		} else {
			$this->header[$fname] = $args[0];
			return $this;
		}
	}

#	abstract public function bytes();
}

