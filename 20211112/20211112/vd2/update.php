<?php 
include './pdo.php';
$m = isset($_POST['masach'])?$_POST['masach']:'';
$t = isset($_POST['tensach'])?$_POST['tensach']:'';
$g = isset($_POST['gia'])?$_POST['gia']:0;
$mt = isset($_POST['mota'])?$_POST['mota']:'';
$maloai =  isset($_POST['maloai'])?$_POST['maloai']:'th';
$manxb =  isset($_POST['manxb'])?$_POST['manxb']:'gd';

$sql="update sach set tensach=?, gia=?, mota=?, manxb=?, maloai=? 
                    where masach=?  ";
$a =[ $t, $g,  $mt, $manxb, $maloai, $m];
$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute($a);//ket qua truy van
$n = $objStatement->rowCount();
// echo "<pre>Da them $n dong";
// echo $sql ;
// print_r($a);
header('location:index');