<?php

namespace Engine\Helper;

class Request
{
    /**
     * @return bool
     */
    static public final function isPost(): bool {
        if(self::getRequestMethod() === 'POST'){
            return true;
        }

        return false;
    }

    /** returns $_SERVER request method
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