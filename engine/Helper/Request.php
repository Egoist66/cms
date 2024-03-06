<?php

namespace Engine\Helper;

class Request
{
    /**
     * @return bool
     */
    static public final function isPost(): bool {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    static public final function getRequestMethod(): string {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @return string
     */
    static public final function getUrlPath(): string{
        $urlPath = $_SERVER['REQUEST_URI'];
        if($position = strpos($urlPath, '?')){
            return substr($urlPath, 0, $position);
        }

        return $urlPath;
    }
}