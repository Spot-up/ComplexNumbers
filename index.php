<?php

namespace Classes;

include_once 'classes/Complex.php';

$a = new Complex(1.1, -2.2);
$b = new Complex(0, 0);

echo "a = ", $a->show(), "<br>";

echo "b = ", $b->show(), "<br>";
echo "<br>";

$c = $a->add($b);
echo "a+b = ", $c->show(), "<br>";

$c = $a->subtract($b);
echo "a-b = ", $c->show(), "<br>";

$c = $a->multiply($b);
echo "a*b = ", $c->show(), "<br>";

echo "a/b = ";
try {
	$c = $a->divide($b);
	echo $c->show(), "<br>";
}
catch (\InvalidArgumentException $e) {
    echo $e->getMessage();
}
?>