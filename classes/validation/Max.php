<?php


namespace validation;

require_once 'validationInterface.php';

class MAx implements validationInterface
{

    private $name;
    private $value;

    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }
    public function validate()
    {

        if (strlen($this->value) > 100) {
            return "$this->name must be <= 100 chars";
        }
        return '';
    }
}
