<?php

interface Component {
    public function changeColor();
}


class Shape implements Component {

    public function changeColor()
    {
        echo "shape changes color.\n";
    }
}

class Square implements Component {

    public function changeColor()
    {
        echo "square changes color.\n";
    }
}

class Compound implements Component {

    private $components;

    public function addShape(Component $component) {
        $this->components[] =$component;
    }

    public function changeColor()
    {
       foreach ($this->components as $component) {
           $component->changeColor();
       }
    }
}


class Main {

    public function main() {
        $shape = new Shape();
        $square = new Square();

        $compound = new Compound();
        $compound->addShape($shape);
        $compound->addShape($square);

        $compound->changeColor();

    }
}

$main = new Main();
$main->main();