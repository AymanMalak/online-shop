<?php


namespace validation;

interface validationInterface
{

    public  function __construct($name, $value);

    public  function validate();
}
