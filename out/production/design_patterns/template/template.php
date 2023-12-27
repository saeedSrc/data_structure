<?php
abstract class Task {
private  $sameDuty;
        function __construct() {
            $this->sameDuty =  new SameDuty();

        }
    public function execute() {
        $this->sameDuty->duty();
        $this->doSpecificThing();

    }
    protected abstract function doSpecificThing();
}


class SameDuty {
    public function duty() {
   echo "duty is done! \n";
    }
}

class Task1 extends Task {
    protected function doSpecificThing()
    {
       echo "task 1 is done \n";
    }
}


class Task2 extends Task {
    protected function doSpecificThing()
    {
        echo "task 2 is done \n";
    }
}

class Task3 extends Task {
    protected function doSpecificThing()
    {
        echo "task 3 is done \n";
    }
}

class main {
    public  static  function main()
    {
        $task1 = new Task1();
        $task1->execute();

        $task1 = new Task2();
        $task1->execute();

        $task1 = new Task3();
        $task1->execute();
    }

}

main::main();