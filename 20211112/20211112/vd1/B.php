<?php 
class B{
    public      $b1;
    protected   $b2;
    //ham tao
    public function __construct($vb1=1, $vb2=0)
    {
        $this->b1= $vb1;
        $this->b2= $vb2;
    }
}

// $x1 = new B(2, 4);
// var_dump($x1);
// $x2= new B(3);
// var_dump($x2);
// $x3 = new B();
// var_dump($x3);