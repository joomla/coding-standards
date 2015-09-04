<?php
class MyClass
{
    protected $value = 'value-default';
    
    public function __construct($value = null)
    {
        if (null !== $value)
        {
            $this->value = $value;
        }
    }
    
    public function getValue()
    {
    	$k = new self();
    	
        return $this->value;
    }
}

$a = new MyClass();

$v = (new MyClass())->getValue();
