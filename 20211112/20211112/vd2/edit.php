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

$m = isset($_GET['masach'])?$_GET['masach']:'';
if ($m =='')
{
    header('location:index.php');exit;
}

    $sql="select * from sach  where masach= ? ";
    $a =[$m];
    $objStatement= $objPDO->prepare($sql);//return B
    $objStatement->execute($a);//ket qua truy van
    //$data = $objStatement->fetchAll(PDO::FETCH_OBJ);
    $data1 = $objStatement->fetch(PDO::FETCH_OBJ);
    // echo '<pre>';
    // //print_r($data);
    // print_r($data1);
    ?>
    <form action="update.php" method='post' entype='multipart/form-data'>
        ma: <input type="text" name='masach' value='<?php echo $data1->masach ?>' readonly> <br>
        ten: <input type="text" name='tensach' value='<?php echo $data1->tensach ?>'> <br>
        gia: <input type="number" name='gia' value='<?php echo $data1->gia ?>'> <br>
        Mo ta: <textarea name="mota" id="" cols="30" rows="10"><?php echo $data1->mota ?>
        </textarea> <br>
        Nha xb <select name="manxb" id="">
            <?php 
            foreach($dataNxb as $r)
            {
                $selected='';
                if ($r->manxb== $data1->manxb) $selected=' selected ';
                ?>
                <option value="<?php echo $r->manxb ?>" <?php echo $selected ?> ><?php echo $r->tennxb ?></option>
                <?php
            }
            ?>
        </select>
            <br>
        Loai <select name="maloai" id="">
            <?php 
            foreach($dataLoai as $r)
            {
                $selected='';
                if ($r->maloai== $data1->maloai) $selected=' selected ';
                ?>
                <option value="<?php echo $r->maloai ?>" <?php echo $selected ?> >
                    <?php echo $r->tenloai ?></option>
                <?php
            }
            ?>
        </select> <br>
        <input type="submit" value="Update">
    
    </form>

