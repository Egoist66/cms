<?php

declare(strict_types=1);

namespace Engine\DI;

class DI
{

    /**
     * @var array
     */
    private array $container = [];

    /**
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    final public function set(string $key, mixed $value): DI
    {
        $this->container[$key] = $value;
        return $this;
    }


    /**
     * @param string $key
     * @return mixed
     */
    final public function get(string $key): mixed
    {

        return $this->return_if_has($key);


    }


    /**
     * @param string $key
     * @return mixed
     */
    private function return_if_has(string $key): mixed
    {
        return $this->container[$key] ?? null;
    }


}
