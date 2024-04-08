<?php
class Model {
    public $db = null;
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        if(!empty($db)) {
            try {
                $this->db = $db;
            } catch (PDOException $e) {
                exit('Database connection could not be established.');
            }
        }
    }
}
?>