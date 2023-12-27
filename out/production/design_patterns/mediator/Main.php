<?php


abstract class UIControl {

    protected $owner;
    public function __construct($owner)
    {
        $this->owner = $owner;
    }

}
class TextBox extends UIControl {

    public function __construct($owner)
    {
        parent::__construct($owner);
    }

    private $content;
    public function getContent() {
        return $this->content;
         }
    public function setContent($content) {
        $this->content = $content;
        $this->owner->changed($this);
    }
}
class Button extends UIControl {
    public function __construct($owner)
    {
        parent::__construct($owner);
    }
    private  $enabled;
    public function isEnabled() {
        return $this->enabled;
    }
    public function enable($enabled) {
        $this->enabled = $enabled;
    }
}
class ListBox extends UIControl {
    public function __construct($owner)
    {
        parent::__construct($owner);
    }
    private $title;
    public function getTitle() {
        return $this->title;
    }
    public function setContent($title) {
        $this->title = $title;
        $this->owner->changed($this);
    }

    public function simulateChangingListBox() {


        $this->setContent("this title is selected");

    }
}

//////////////
abstract class DialogBox {
     abstract function changed(UIControl $UIControl);
}

class MyDialogBox extends DialogBox {

    private  $list;
    private  $text;
    private  $button;

    public function __construct()
    {
        $this->list = new ListBox($this);
        $this->text = new TextBox($this);
        $this->button = new Button($this);
    }

    public function changed(UIControl $control)
    {
       if ($control === $this->list) {
           $this->text->setContent($this->list->getTitle());
           $this->button->enable(true);
       }
    }

    public function simulateListChanged() {
        $this->list->setContent("title is selected! ");
        echo $this->text->getContent(), " ========= ", $this->button->isEnabled() . "\n";
    }

    public function simulateClearList() {
        $this->list->setContent("");
        echo $this->text->getContent(), " ========= ", $this->button->isEnabled(). "\n";
    }
}


class Main {
public function main(){
    $myDialog = new MyDialogBox();
    $myDialog->simulateListChanged();
    $myDialog->simulateClearList();
}

}

$main = new Main();
$main->main();