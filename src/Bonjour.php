<?php

namespace Jur;

class Bonjour
{
    private $bonjour;

    /**
     * Bonjour constructor.
     * @param $bonjour
     */
    public function __construct($bonjour)
    {
        $this->bonjour = $bonjour;
    }

    /**
     * @return mixed
     */
    public function getBonjour()
    {
        return $this->bonjour;
    }

    /**
     * @param mixed $bonjour
     */
    public function setBonjour($bonjour)
    {
        $this->bonjour = $bonjour;
    }
}
