
<?php

 class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();

        if (isset($url[0])) {
            if (file_exists(APPROOT .'/controllers/' . $url[0] . '.php')) {
                // If Exist Set As Controller
                $this->currentController = ucwords($url[0]);
                // unset 0 Index 
                unset($url[0]);
                // ["login", "3"]
            }
        }

        // Require Controller
        require '../app/controllers/'. $this->currentController.'.php';

        //Instantiate controller class
    
        $this->currentController = new $this->currentController; 

        if (isset($url[1])) {
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
            }
            unset($url[1]);
            // ["3"]
        }

        $this->params =  $url ? array_values($url) : [];
        // ["3"]

        call_user_func_array(  [ $this->currentController, $this->currentMethod ]  , $this->params);
        // ["User", "login"], ["3"]

    }

    public function getUrl(){
        if(isset($_GET['url'])){
            // user/login
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            // ["user", "login", "3"]
            return $url;
        }
    }

 }

?> 
