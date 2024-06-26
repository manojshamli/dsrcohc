<?php
class DebugHelper {
    /**
     * debugPDO: Shows the emulated SQL query in a PDO statement.
     * 
     * @param String $raw_sql
     * @param Array $parameters
     * @return String
     */
    public static function debugPDO($raw_sql, $parameters) {
        $keys = array();
        $values = $parameters;
        foreach ($parameters as $key => $value) {
            // check if named parameters (':param') or anonymous parameters ('?') are used
            if (is_string($key)) {
                $keys[] = '/' . $key . '/';
            } else {
                $keys[] = '/[?]/';
            }
            // bring parameter into human-readable format
            if (is_string($value)) {
                $values[$key] = "'" . $value . "'";
            } else if (is_array($value)) {
                $values[$key] = implode(',', $value);
            } else if (is_null($value)) {
                $values[$key] = 'NULL';
            }
        }
        $raw_sql = preg_replace($keys, $values, $raw_sql, 1, $count);
        return $raw_sql;
    }
}
?>