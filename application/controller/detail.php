<?php

/**
 * Class Detail
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class DetailController extends Controller {
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index() {
        $productName = $_GET["pname"];
        
        $title = str_replace("-", " ", $productName). ' - Detail Page';
        
        $description = trim(strip_tags(file_get_contents(APP.'view/product/description/'.$productName.'.php')));
        
        $keywords = str_replace("-", " ", $productName);
        $keywords = str_replace(" cp", " capsule", $keywords);
        $keywords = str_replace(" cr", " cream", $keywords);
        $keywords = str_replace(" pw", " powder", $keywords);
        $keywords = str_replace(" sy", " syrup", $keywords);
        $keywords = str_replace(" gel", " gel", $keywords);
        $keywords = str_replace(" on", " onitment", $keywords);
        $keywords = str_replace(" ton", " tonic", $keywords);
        
        $canonicalUrl = "";
        
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/product/' . $productName . '.php';
        require APP . 'view/_templates/footer.php';
    }
}
?>