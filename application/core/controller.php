<?php
class Controller {
    public $db = null;
    public $url_controller = null;
    public $model = null;

    /** Whenever controller is created, open a database connection too and load "the model". **/
    function __construct() {
        $split_url = UrlHelper::splitUrl();
        $this->url_controller = UrlHelper::getControllerName($split_url);
       //  $this->db = CommonHelper::openDatabaseConnection();
        $this->model = CommonHelper::loadModel($this->url_controller, $this->db);
    }
}
?>