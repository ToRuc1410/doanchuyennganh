<?php 
// class- object 
// hinh dang, so chan: thuoc tinh 
// mora:, xep lai: method - phuong thuc
//quyen truy xuat: public, private, protected
class A{
    public      $a1=1;
    var         $a2=2;//public default
    protected   $a3 =3;
    private     $a4=4;

    //--------Method 
    public function F1()
    {
        $this->F2();
    }

    protected function F2()
    {
        echo "Cac thuoc tinh a1, a2, a3, a4:";
        echo " {$this->a1} - {$this->a2} - {$this->a3} - {$this->a4}";
    }
    function F3(){}
}

// $x1 = new A();//$x1 la 1 object
// echo $x1->a1;
// echo $x1->a2;
// //echo $x1->a3;
// $x1->F1();
// print_r($x1);
