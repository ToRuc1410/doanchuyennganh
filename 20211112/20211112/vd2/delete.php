<?php 
include './pdo.php';
$m = isset($_GET['masach'])?$_GET['masach']:'';
if ($m !='')
{
    $sql="delete from sach where masach= ? ";
    $a =[$m];
    $objStatement= $objPDO->prepare($sql);//return B
    $objStatement->execute($a);//ket qua truy van
    //$n = $objStatement->rowCount();
}
header('location:index.php');