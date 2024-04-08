<?php
class Autoloader {
    //Define autoloader
    public function __autoload() {
        $modules = explode(',', AUTOLOAD_MODULES);
        foreach($modules as $module) {
            self::__load(APP . trim($module));
        }
        return true;
    }
    private function __load($dir_path = '') {
//        if (count(glob("path/*")) === 0 ) {
        if(is_readable($dir_path)) {
            $iterator = new DirectoryIterator($dir_path);
            foreach ($iterator as $file_info) {
                if ($file_info->isFile()) {
                    require $dir_path . DIRECTORY_SEPARATOR . $file_info->getFilename();
                }
            }
            unset($iterator);
            return true;
        }
    }
    public function canClassBeAutloaded($className) {
          return class_exists($className);
    }
}
?>