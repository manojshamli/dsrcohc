<?php

/**
 * Class ContactUs
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class ContactusController extends Controller {
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index() {
        $title = "DSRCO Healthcare - Contact us";
        $description = "DSRCO Healthcare - Contact us";
        $keywords = "Contact us";
        $canonicalUrl = "";
        
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/contact-us.php';
        require APP . 'view/_templates/footer.php';
    }
}
?>