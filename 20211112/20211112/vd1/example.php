<?php 
//autoload -$cName: Name of class can load: A ->A.php, B-> B.php 
function loadClass($cName)
{
    if (is_file($cName .'.php' ))
        include $cName. '.php';
    else 
    {
        echo "Khong co dinh nghia class $cName"; 
        exit;
    }
}

spl_autoload_register('loadClass');
//$d1= new D();
$a1 = new A();
var_dump($a1);

$b1 = new B(5,6);
var_dump($b1);

$c1= new C();
var_dump($c1);

$b2 = $c1->F();
print_r($b2);