<?php

class Frame
{

    protected $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public static function fromstring($data) {
        return new Frame($data);
    }

    public function subframe() {
        return NULL;
    }

    public function __toString() {
        return hexdump($this->data);
    }
}
