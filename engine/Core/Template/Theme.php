<?php

declare(strict_types=1);

namespace Engine\Core\Template;

use Engine\Utils\VarDumper\VarDumper;
use Exception;

class Theme
{



    public string $url = '';

    protected array $data = [];



    public function include(string $part_name = '', array $data = [])
    {

        if ($part_name !== '') {

            $this->get_template_part($part_name, $data);
        }


    }

    private function get_template_part($file_name = '', array $data = []): void
    {
        try {
            $template_file = ROOT . '/content/themes/start/' . $file_name . '.php';
            if (is_file($template_file)) {
                extract($data);

                require_once $template_file;
            } else {
                VarDumper::dump('danger', "Template $file_name not found", __FILE__, __LINE__);
            }
        } catch (Exception $exception) {

            VarDumper::dump('danger', $exception, __FILE__, __LINE__);
        }
    }



    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }
}
