<?php
namespace Classes;

use Exception;

class Complex
{
    private $real;
    private $imaginary;

    public function __construct($real = 0, $imaginary = 0)
    {
        $this->real = self::normalize($real);
        $this->imaginary = self::normalize($imaginary);
    }

    public static function normalize($value)
    {
        return (is_numeric($value)) ? $value : 0;
    }

    public function show()
    {
        $im = $this->imaginary<0 ? '-'.abs($this->imaginary).'i' : '+'.$this->imaginary.'i';
        
        return $this->real.$im;
    }    

    public function add(Complex $b)
    {
        $r = $this->real;
        $i = $this->imaginary;

        $result = new Complex();

        $result->real = $r + $b->real;
        $result->imaginary = $i + $b->imaginary;

        return $result;
    }

    public function subtract(Complex $b)
    {
        $r = $this->real;
        $i = $this->imaginary;

        $result = new Complex();

        $result->real = $r - $b->real;
        $result->imaginary = $i - $b->imaginary;

        return $result;
    }

    public function multiply(Complex $b)
    {
        $r = $this->real;
        $i = $this->imaginary;

        $result = new Complex();

        $result->real = $r * $b->real - $i * $b->imaginary;
        $result->imaginary = $r * $b->imaginary + $i * $b->real;

        return $result;
    }

    public function divide(Complex $b)
    {
        if ($b->real == 0&&$b->imaginary == 0) {
            throw new \InvalidArgumentException('Division by zero');
        }

        $r = $this->real;
        $i = $this->imaginary;

        $result = new Complex();

        $denominator = $b->real * $b->real + $b->imaginary * $b->imaginary;
        $result->real = ($r * $b->real + $i * $b->imaginary) / $denominator;
        $result->imaginary = ($b->real * $i - $r * $b->imaginary) / $denominator;
        
        return $result;
    }
}    