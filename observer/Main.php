<?php


class ConcreteObserver2 implements Observer {
    public function update()
    {
        echo "concrete 2 got notified! \n";
    }
}

class ConcreteObserver1 implements Observer {
    public function update()
    {
        echo "concrete 1 got notified! \n";
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

    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update();

        }
    }


}

interface Observer {
    public function update();
}

class ChildObservable  extends Observable {

    private $value;

    public function setValue() {
        $this->notify();
    }
}
class Main {

    public function main() {
        $concrete1 = new ConcreteObserver1();
        $concrete2 = new ConcreteObserver2();

        $observable = new ChildObservable();
        $observable->addObserver($concrete1);
        $observable->addObserver($concrete2);

        $observable->setValue();
    }
}

$main = new Main();
$main->main();