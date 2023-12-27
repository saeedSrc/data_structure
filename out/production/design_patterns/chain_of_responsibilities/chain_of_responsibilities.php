<?php
abstract class HandleHTTPRequest {
    protected   $next;
    public function __construct(?HandleHTTPRequest $next)
    {
        $this->next = $next;
    }

    public abstract function handle(): ?HandleHTTPRequest;
}
class DoFirst extends HandleHTTPRequest {

    public function __construct(?HandleHTTPRequest $next)
    {
        parent::__construct($next);
    }

    public function handle() :?HandleHTTPRequest
    {
        echo "Do first!";
        if($this->next != null) {
            return $this->next->handle();
        }
        return null;
    }
}
class DoSecond extends HandleHTTPRequest {
    public function __construct(?HandleHTTPRequest $next)
    {
        parent::__construct($next);
    }
    public function handle():?HandleHTTPRequest
    {
        echo "Do second!";
        if($this->next != null) {
            return $this->next->handle();
        }
        return null;
    }
}
class DoThird extends HandleHTTPRequest {
    public function __construct(?HandleHTTPRequest $next)
    {
        parent::__construct($next);
    }
    public function handle():?HandleHTTPRequest
    {
        echo "Do third!";
        if($this->next != null) {
            return $this->next->handle();
        }
        return null;
    }
}

class DoForth extends HandleHTTPRequest {
    public function __construct(?HandleHTTPRequest $next)
    {
        parent::__construct($next);
    }
    public function handle():?HandleHTTPRequest
    {
        echo "Do forth!";
        if($this->next != null) {
            return $this->next->handle();
        }
        return null;
    }
}

class WebServer {
   private $httpRequest;

   public function __construct(HTTPRequest $httpRequest)
   {
       $this->httpRequest = $httpRequest;
   }

   public function handle(HandleHTTPRequest $handleHTTPRequest) {
       $handleHTTPRequest->handle();
   }
}


class HTTPRequest {

}
class Main {
    public function handleRequest() {
        $httpRequest = new HTTPRequest();
        $webServer = new WebServer($httpRequest);
        $forth =new DoForth(null);
        $third =new DoThird($forth);
        $second =new DoSecond($third);
        $first =new DoFirst($second);


        $webServer->handle($first);

    }

}

$main = new Main();
$main->handleRequest();