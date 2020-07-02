<?php


namespace validation;

require_once 'validationInterface.php';

class Email implements validationInterface
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

        if (strlen($this->value) > 0 && !filter_var($this->value, FILTER_VALIDATE_EMAIL)) {
            return "$this->name is not a valid email";
        }
        return '';
    }
}
