<?php
class UrlHelper {
    /**
    * splitUrl: For Get and split the URL.
    * @return Array
    **/
    public static function splitUrl() {
        if (isset($_GET['url'])) {
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
    /**
    * getControllerName: For getting controller name from URL.
    * @param Array $url
    * @return String
    **/
    public static function getControllerName($url = array()) {
        if (isset($url[0]) && !empty($url[0])) {
            return isset($url[0]) ? $url[0] : null;
        }
    }
    /**
    * getActionName: For getting action name from URL.
    * @param Array $url
    * @return String
    **/
    public static function getActionName($url = array()) {
        if (isset($url[1]) && !empty($url[1])) {
            return isset($url[1]) ? $url[1] : null;
        }
    }
    /**
    * getUrlParameters: For getting parameters from URL.
    * @param Array $url
    * @return Array
    **/
    public static function getUrlParameters($url = array()) {
        if (isset($url[1]) && isset($url[2])) {
            // Remove controller and action from the split URL
            unset($url[0], $url[1]);
            return array_values($url);
        }
    }
}
?>