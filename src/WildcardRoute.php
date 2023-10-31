<?php


class WildcardRoute extends Route {


    public function __construct($callback = null) {
        $this->path = "*";
        $this->callback = $callback ??  function($req){return "The default route callback.";};
    }


}
