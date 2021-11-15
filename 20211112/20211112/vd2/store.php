<?php 
include './pdo.php';
$m = isset($_POST['masach'])?$_POST['masach']:'';
$t = isset($_POST['tensach'])?$_POST['tensach']:'';
$g = isset($_POST['gia'])?$_POST['gia']:0;
$mt = isset($_POST['mota'])?$_POST['mota']:'';
$maloai =  isset($_POST['maloai'])?$_POST['maloai']:'th';
$manxb =  isset($_POST['manxb'])?$_POST['manxb']:'gd';
$h ='';
if ($m==''){ header('location:index.php'); exit;}
if (isset($_FILES['hinh']))
{
    if ($_FILES['hinh']['error']==0) //ok
    {
        $h = $_FILES['hinh']['name'];
        move_uploaded_file($_FILES['hinh']['tmp_name'], "img/product/$h");
    }
}
$sql="insert into sach(masach, tensach, gia, hinh, mota, manxb, maloai) 
                    values(?, ?, ?, ?, ?, ?, ?) ";
$a =[$m, $t, $g, $h, $mt, $manxb, $maloai];
$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute($a);//ket qua truy van
$n = $objStatement->rowCount();
// echo "<pre>Da them $n dong";
// echo $sql ;
// print_r($a);
header('location:index');