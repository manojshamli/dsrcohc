<?php

/**
 * Class Error
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class ErrorController extends Controller {
    /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */
    public function index() {
        $title = "DSRCO Healthcare - Error";
        $description = "DSRCO Healthcare - Error";
        $keywords = "Error";
        $canonicalUrl = "";
        
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/error/index.php';
        require APP . 'view/_templates/footer.php';
    }
}
?>