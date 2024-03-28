<?php

namespace Engine\Core\Template;

use Engine\Utils\VarDumper\VarDumper;
use Engine\Core\Template\Theme;
use Exception;
use InvalidArgumentException;

class View
{
    protected Theme $theme;

    public function __construct()
    {
        $this->theme = new Theme();
    }    
    /**
     * renders view
     *
     * @param  mixed $template
     * @param  mixed $variables
     * @return void
     */
    public function render(string $template, array $variables = []): void
    {

        try {
            $templatePath = ROOT . '/content/themes/start/' . $template . '.php';
            if (!is_file($templatePath)) {
                throw new InvalidArgumentException(
                    sprintf('Template "%s" not found in "%s"', 
                    $template, 
                    $templatePath
                ));
            }
            $this->theme->setData($variables);
            $theme = $this->theme;

            extract($variables);
            
            ob_start();

            require $templatePath;
            echo ob_get_clean();

        } catch (Exception $exception) {

            ob_end_clean();
            VarDumper::dump('danger', $exception, __FILE__, __LINE__);
            
        }
    }
}