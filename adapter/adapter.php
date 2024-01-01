<?php


class Image {

}

interface Filter {
    public function apply(Image  $image);
}

class VividFilter implements Filter {
    public function apply(Image $image)
    {
        echo "vivid filter is applied!";
    }
}

class ThirdpartyFilter {

    public  function init() {
        echo "thirdparty image filter is initied!";
    }

    public function render() {
        echo "thirdparty image filter is rendered!";
    }
}


class ThirdpartyFilterAdapter implements Filter {
    public $thidpartyFilter;
    public function __construct(ThirdpartyFilter $filter)
    {
        $this->thidpartyFilter = $filter;
    }

    public function apply(Image $image)
    {
        $this->thidpartyFilter->init();
        $this->thidpartyFilter->render();
    }
}

class ImageView {

    public $image;

    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    public function applyFilter(Filter  $filter) {
        $filter->apply($this->image);
    }
}


class Main {


    function main() {
        $imageView = new ImageView(new Image());

        $imageView->applyFilter(new VividFilter());
        $imageView->applyFilter(new ThirdpartyFilterAdapter(new ThirdpartyFilter()));

    }
}


$main = new Main();

$main->main();