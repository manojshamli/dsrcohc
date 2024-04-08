<?php
class CommonHelper {
    /**
    * listFilesInsideDir: For listing the files inside a directory.
    * @param String $dir_path
    * @return Array
    **/
    public static function listFilesInsideDir($dir_path = null) {
    // if (count(glob("path/*")) === 0 ) {
        if(is_readable($dir_path)) {
            $file_names = array();
            $iterator = new DirectoryIterator($dir_path);
            foreach ($iterator as $file_info) {
                if ($file_info->isFile()) {
                    $file_names[] = $file_info->getFilename();
                }
            }
            return $file_names;
        }
    }
    /**
    * readSubDirectories: For listing the subdirectories inside a directory.
    * @param String $dir_path
    * @return Array
    **/
    public static function readSubDirectories($dir_path = null) {
        $sub_dirs = array();
        $handle = opendir($dir_path);
        if ($handle) {
            while ($entry = readdir($handle)) {
                if ($entry !== '.' && $entry !== '..' && is_dir($dir_path."/".$entry)) {
                    $sub_dirs[] = $entry;
                }
            }
            closedir($handle);
        }
        return $sub_dirs;
    }
    /**
    * readDirectory: For listing the files & subdirectories inside a directory.
    * @param String $dir_path
    * @return Array
    **/
    public static function readDirectory($dir_path = null) {
        $items = array_slice(scandir($dir_path), 2);
        return $items;
    }
    /**
    * createLog: For Create Logs.
    * @param String $file_name
    * @param String $msg
    * @param String $path
    * @return Boolean
    **/
    public static function createLog($file_name = '',$msg = '', $path = ''){
        $old = umask(0);
        if(!is_dir($path)){
            if(!mkdir($path, 0777, true)){
                echo 'Unable to create folder';
                return false;
            }
        }
        umask($old);
        $file_path = $path.$file_name;
        $handle=fopen($file_path,'a+');
        fwrite($handle,$msg);
        fclose($handle);
        return true;
    }
    /** Open the database connection with the credentials from application/config/config.php **/
    public static function openDatabaseConnection() {
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
        return new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
    }

    /**
     * Loads the "model".
     * @return object model
     */
    public static function loadModel($model = '', $db = '') {
        if(file_exists(APP . '/model/'.$model . '.php')) {
            require APP . '/model/'.$model . '.php';
            $requested_model = $model . MODEL_SUFFIX;

            // Create Model Object
            return new $requested_model($db);
        } else {
            // Create Base Model Object
            return new Model($db);
        }
        return false;
    }
}
?>