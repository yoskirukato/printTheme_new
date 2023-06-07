<?php

namespace App\Helpers;

define('CONSTANTS_FILE_PATH', get_template_directory() . '/app/constants.php');

class Constants
{
    protected static $filePath;

    /**
     * Get variable value by key
     *
     * @param $key
     *
     * @return mixed
     */
    public static function get($key)
    {
        if (!file_exists(CONSTANTS_FILE_PATH)) {
            return false;
        }

        $content = file_get_contents(CONSTANTS_FILE_PATH);
        $content = unserialize($content);

        return isset($content[$key]) ? $content[$key] : null;
    }

    public static function set($key, $value)
    {
        if (file_exists(CONSTANTS_FILE_PATH)) {
            $content = file_get_contents(CONSTANTS_FILE_PATH);
            $content = unserialize($content);
        } else {
            $content = [];
        }

        $row = [$key => $value];

        if ($content) {
            $data = array_merge($content, $row);
        } else {
            $data = $row;
        }

        $data = serialize($data);
        file_put_contents(CONSTANTS_FILE_PATH, $data);
    }
}