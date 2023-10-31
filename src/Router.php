<?php


use Http\Url;


class Router {

    // An array of all the routes in all the modules using this format
	// $route["module"]
	// $route["method"]
	// $route["content-type"]
	// $route["callback"]
	// $route["files"]
    private $routes = array();


    public function __construct() {}


    public function addRoute(Route $route) {
        array_unshift($this->routes, $route);
    }


	/**
	 * @param, request - string representing the requested URL.
	 *
	 * @param, array<String> or array<Path>
	 *
	 * @return a Path object
	 */
	function getMatchingRoute($url) {

		$url = Url::fromString($url);

		$found = false;
        // @jbernal
        // var_dump($url, $this->routes);
		// Pop items off the end of the $current_path 
		// $routes = array_keys($menu_items);
		$all_patterns = array();
		$possibles = array();
	
		// Locate the correct router item
		// convert each router path to a regular expression
		// and test it against the current path	
		foreach($this->routes as $route) {
			// $p = is_object($source) && get_class($source) == "Path" ? $source : new Path($source);
            $p = $route->getPath();
			if($p->matches($url)) {
                // new line of code here.
				$found = true;
				$possibles[] = $route;
			}
		}
	
		return $found ? $possibles[0] : false;
	}



}
