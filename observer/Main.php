<?php


class ConcreteObserver2 implements Observer {
    public function update($value)
    {
        echo "concrete 2 got notified! with value: $value \n";
    }
}

class ConcreteObserver1 implements Observer {
    public function update($value)
    {
        echo "concrete 1 got notified! with value: $value \n";
    }
}

class Observable {
    /**
     * @var Observer $observers
     */
    private $observers = array();

//    public function __construct($observer)
//    {
//        $this->observer = $observer;
//    }

    public function addObserver($observer) {
        $this->observers[] = $observer;
    }

//    public function removeObserver($observer) {
//     $array = $this->observers;
//     unset($array[$observer]);
//    }

    public function notify($value) {
        foreach ($this->observers as $observer) {
            $observer->update($value);

        }
    }


}

interface Observer {
    public function update($value);
}

class ChildObservable  extends Observable {

    private $value;

    public function setValue($value) {
        $this->value = $value;
        $this->notify($value);
    }
}
class Main {

    public function main() {
        $concrete1 = new ConcreteObserver1();
        $concrete2 = new ConcreteObserver2();

        $observable = new ChildObservable();
        $observable->addObserver($concrete1);
        $observable->addObserver($concrete2);

        $observable->setValue(12);
    }
}

$main = new Main();
$main->main();