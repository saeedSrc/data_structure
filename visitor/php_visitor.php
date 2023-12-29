<?php /** @noinspection PhpHierarchyChecksInspection */



interface Operation {
    public function apply(Anchor $anchor);
}

class HilightOperation implements Operation {

    public function apply(Anchor $anchor)
    {
       echo "anchor hilighted!";
    }

}

class ErrorOperation implements Operation {

    public function apply(Anchor $anchor)
    {
        echo "anchor errored!";
    }

}
abstract  class HTMLNode {
    public abstract function exec(Operation $operation);

}


class Anchor extends HTMLNode {
  public function exec(Operation $operation)
  {
     echo $operation->apply($this);
  }

}

class Main  {
    public function testNewOperation() {
        $anchor =  new Anchor();
        $anchor->exec(new ErrorOperation());
    }
}

$main = new Main();
$main->testNewOperation();