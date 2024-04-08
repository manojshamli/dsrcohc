<?php
class Application {
    public $url_controller = null;
    public $url_action = null;
    public $url_params = array();

    /** Analyze the URL Elements & Calls The According Controller/Method or The Fallback **/
    public function __construct() {
        $split_url = UrlHelper::splitUrl();
        $this->url_controller = UrlHelper::getControllerName($split_url);
        $this->url_action = UrlHelper::getActionName($split_url);
        $this->url_params = UrlHelper::getUrlParameters($split_url);
        
        // Check Controller, If No controller Then Load START PAGE
        if (!$this->url_controller) {
            require APP . 'controller/' . DEFAULT_CONTROLLER . '.php';
            $default_controller = DEFAULT_CONTROLLER . CONTROLLER_SUFFIX;
            $page = new $default_controller();
            $page->index();
        } else 
            // Check Controller File.
            if (file_exists(APP . 'controller/' . $this->url_controller . '.php')) {
                // Load Controller File & Create The Controller
                require APP . 'controller/' . $this->url_controller . '.php';
                $requested_controller = $this->url_controller . CONTROLLER_SUFFIX;
                $this->url_controller = new $requested_controller();

            // Check Action Existance in The Controller.
            if (method_exists($this->url_controller, $this->url_action)) {
                // Check Action Parameters.
                if (!empty($this->url_params)) {
                    call_user_func_array(array($this->url_controller, $this->url_action), $this->url_params);
                } else {
                    $this->url_controller->{$this->url_action}();
                }

            } else {
                // If No Action is Defined Then Call INDEX Action.
                if (strlen($this->url_action) == 0) {
                    $this->url_controller->index();
                } else {
                    header('location: ' . URL . ERROR_CONTROLLER);
                }
            }
        } else
            if(file_exists(ROOT . $this->url_controller . '.php')) {
                require ROOT . $this->url_controller . '.php';
            } else {
                header('location: ' . URL . ERROR_CONTROLLER);
            }
    }
}
?>