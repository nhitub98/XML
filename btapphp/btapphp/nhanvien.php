<?php
$xml_pb=new SimpleXMLElement("phongban.xml",null,true);
?>
<html>   
<body>
<form method="POST" action="nhanvien.php">
    Ma nhan vien <input type="text" name="manv"></br>
    Ten nhan vien <input type="text" name="tennv"></br>
    <!--Ma phong <input type="text" name="maphong"></br>-->
    Ma phong ban 
    <select name="maphong">
        <?php    
            foreach($xml_pb as $pb) 
            {?>
                <option><?php echo "{$pb->Maphong}"; ?></option>
            <?php } 
            ?>
    </select><br>
    <input type="submit" name="Add" value="Them">
    <input type="submit" name="Update" value="Sua">
    <input type="submit" name="Delete" value="Xoa">
    <input type="submit" name="Xem" value="Xem thong tin">
    <input type="submit" name="Loc" value="Xem thong tin nv thuoc phong ban"> 
</form>
<?php   require 'nhanvien_class.php';
$xml=new SimpleXMLElement("nhanvien.xml",null,true);
if(isset($_POST['Xem']))
{
    $manv=$_POST['manv'];
    $tennv=$_POST['tennv'];
    $maphong=$_POST['maphong'];
    $nhanvien=new nhanvien($manv, $tennv, $maphong);
    $nhanvien->view();
}
if(isset($_POST['Loc']))
{
    echo "<table border='1' cellspacing='0' cellpadding='10'>";
    echo "<tr>";
    echo "<td>Ma nhan vien</td>";
    echo "<td>Ten nhan vien</td>";     
    echo "<td>Ma phong</td>";
    echo "</tr>";
    $mp=$_POST['maphong'];
    $result = $xml->xpath('/NVS/NV/Maphong'); //điều kiện tìm kiếm

    foreach($xml as $mh)
    {

       if($mh->Maphong==$mp)
       {
        echo "<tr>";
        echo "<td>{$mh->MaNV}</td>";
        echo "<td>{$mh->TenNV}</td>";
        echo "<td>{$mh->Maphong}</td>";
        echo "</tr>";}
    }
    echo "</table>";
}
if(isset($_POST['Add']))
{
    $manv=$_POST['manv'];
    $tennv=$_POST['tennv'];
    $maphong=$_POST['maphong'];
    $nhanvien=new nhanvien($manv, $tennv, $maphong);
    $nhanvien->add();
}
    
if(isset($_POST['Update']))
{
    $manv=$_POST['manv'];
    $tennv=$_POST['tennv'];
    $maphong=$_POST['maphong'];
    $nhanvien=new nhanvien($manv, $tennv, $maphong);
    $nhanvien->update();
} 
if(isset($_POST['Delete']))
{
    $manv=$_POST['manv'];
    $tennv=$_POST['tennv'];
    $maphong=$_POST['maphong'];
    $nhanvien=new nhanvien($manv, $tennv, $maphong);
    $nhanvien->delete();
}    
?>
</body>
</html>	
