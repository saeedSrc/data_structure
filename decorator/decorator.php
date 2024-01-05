<?php

interface Write {
    public function write(string $a);
}

class NormalWrite implements Write {

    public function write(string $a)
    {
        echo $a;
    }
}

class EncryptedWrite implements Write {

    private $write;

    public function __construct(Write $write)
    {
        $this->write = $write;

    }
    public function write(string $a)
    {
        $a = $this->encrypt($a);
        $this->write->write($a);
    }

    public function encrypt($a) {
        return "@#@$@#%@^^#$^%^";
    }
}

class CompressedWrite implements Write {

    private $write;

    public function __construct(Write $write)
    {
        $this->write = $write;

    }
    public function write(string $a)
    {
        $a = $this->compressed($a);
        $this->write->write($a);
    }

    public function compressed($a) {
        return substr($a, 1);
    }
}


class Main {
    public function useWrite(Write $write) {

        $write->write("hi there!");
    }
}

$main = new Main();

$normalWrite = new NormalWrite();
$main->useWrite(new EncryptedWrite(new CompressedWrite($normalWrite)));