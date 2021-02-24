<?php

class Application
{

    protected $_controller = 'HomeController';

    protected $_action = 'index';

    protected $_params = [];

    protected $_controller_path = './controllers/';

    function __construct()
    {
        $url = $this->_getURL();

        //print_r($url);

        if (file_exists($this->_controller_path . $url[0] . 'Controller.php')) {
            $this->_controller = $url[0] . "Controller";
            unset($url[0]);
        } else {
            if (strlen($url[0]) != 0) {
                $redirect = PATH . "/Home/error";
                header("location: $redirect");
            }
        }

        require_once($this->_controller_path . $this->_controller . '.php');

        //Contrutor para aceder a metodos não estaticos
        $this->_controller = new $this->_controller();

        if (isset($url[1])) {
            if (method_exists($this->_controller, $url[1])) {
                $this->_action = $url[1];
                unset($url[1]);
            } else {
                $redirect = PATH . "/Home/error";
                header("location: $redirect");
                exit();
            }
        }

        $this->_params = $url ? array_values($url) : [];

        call_user_func_array([$this->_controller, $this->_action], $this->_params);
    }


    //variavel "global" url está no ficheiro .htaccess
    public function _getURL()
    {

        if (isset($_GET['url'])) {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}

?>