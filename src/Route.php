<?php


// use Http\Path;


class Route {

    protected $path;

    protected $callback;


    public function __construct($path, $callback = null) {
        $this->path = $path;
        $this->callback = $callback;
    }

    public function getCallback() {
        return $this->callback;
    }

    public function getPath() {
        return is_object($this->path) && get_class($this->path) == "Path" ? $$this->path : new Path($this->path);
    }


}
