<?php 
include './pdo.php';
$sql='select * from nhaxb';
$objStatement= $objPDO->prepare($sql);
$objStatement->execute();
$dataNxb = $objStatement->fetchAll(PDO::FETCH_OBJ);

$sql='select * from loai';
$objStatement= $objPDO->prepare($sql);
$objStatement->execute();
$dataLoai = $objStatement->fetchAll(PDO::FETCH_OBJ);

$kw = isset($_GET['kw'])?$_GET['kw']:'';
$sql="select * from sach where tensach like ? ";
$a =["%$kw%"];
$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute($a);//ket qua truy van
$n = $objStatement->rowCount();
echo "Co $n ket qua";
$data = $objStatement->fetchAll(PDO::FETCH_OBJ );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img{width: 60px;}
    </style>
</head>
<body>
    <h1>Data table Sach:   php  <-> PDO (Php Data Object)  <->  mysql </h1>
    <form action="store.php" method="post" enctype="multipart/form-data">
        ma sach: <input type="text" name="masach"> <br>
        ten sach: <input type="text" name="tensach"> <br>
       gia: <input type="number" name="gia"> <br>
        Hinh: <input type="file" name="hinh"> <br>
        Mo ta: <textarea name="mota" id="" cols="30" rows="3"></textarea> <br>
        Nha xb: <select name="manxb" id="">
                <?php 
                foreach($dataNxb as $r)
                {
                    ?>
                    <option value="<?php echo $r->manxb ?>"><?php echo $r->tennxb ?></option>
                    <?php
                }
                ?>
                </select> <br>
        Loai sach: <select name="maloai" id="">
        <?php 
                foreach($dataLoai as $r)
                {
                    ?>
                    <option value="<?php echo $r->maloai ?>"><?php echo $r->tenloai ?></option>
                    <?php
                }
                ?>
                    </select> <br>
        <input type="submit" value="Insert">

    </form>
<hr>
<h1>Tim kiem</h1>
<form>
<input type="text" name="kw" value="<?php echo $kw ?>"><input type="submit" value="Search">
</form>
<hr>
    <?php 
   // var_dump($data);
   echo '<table  border=1>';
    foreach($data as $r)
    {
        ?>
        <tr>
            <td><?php echo $r->masach ?></td>
            <td><?php echo $r->tensach ?></td>
            <td><?php echo $r->gia ?></td>
            <td><img src='./img/product/<?php echo $r->hinh ?>'> </td>
            <!-- <td><?php echo $r->mota ?></td> -->
            <td>
                <a href="delete.php?masach=<?php echo $r->masach ?>">Xoa</a>
                <a href="edit.php?masach=<?php echo $r->masach ?>">Sua</a>
            
            </td>
        </tr>
        <?php 
    }
    ?>
</body>
</html>