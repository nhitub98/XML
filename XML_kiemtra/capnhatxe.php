<?php
$xml_pb=new SimpleXMLElement("nhasx.xml",null,true);
?>
<html>   
<body>
<form method="POST" action="capnhatxe.php">
    Ma xe <input type="text" name="maxe"></br>
    Ngay xuat xuong <input type="text" name="ngayxuatxuong"></br>
    Ten xe <input type="text" name="tenxe"></br>
    Gia <input type="text" name="gia"></br>
    Ma nsx 
    <select name="mansx">
        <?php    
            foreach($xml_pb as $pb) 
            {?>
                <option><?php echo "{$pb->mansx}"; ?></option>
            <?php } 
            ?>
    </select><br>
    <input type="submit" name="Add" value="Them">
    <input type="submit" name="Update" value="Sua">
    <input type="submit" name="Delete" value="Xoa">
    <input type="submit" name="Xem" value="Xem thong tin">
    <input type="submit" name="Loc" value="Xem thong tin loc"> 
</form>
<?php   require 'xe.php';
$xml=new SimpleXMLElement("xe.xml",null,true);
if(isset($_POST['Xem']))
{
    $maxe=$_POST['maxe'];
    $ngayxuatxuong=$_POST['ngayxuatxuong'];
    $mansx=$_POST['mansx'];
    $tenxe=$_POST['tenxe'];
    $gia=$_POST['gia'];
    $xe=new xe($maxe,$ngayxuatxuong,$mansx, $tenxe, $gia);
    $xe->view();
}
if(isset($_POST['Loc']))
{
    echo "<table border='1' cellspacing='0' cellpadding='10'>";
    echo "<tr>";
    echo "<td>Ma xe</td>";
    echo "<td>Ngay xuat xuong</td>";     
    echo "<td>Ma nsx</td>";
    echo "<td>Ten xe</td>";     
    echo "<td>Gia</td>";
    echo "</tr>";
   
    $mp=$_POST['mansx'];    
   
    foreach($xml as $mh)
    {

       if($mh->mansx==$mp)
       {
        echo "<tr>";
        echo "<td>{$mh->maxe}</td>";
        echo "<td>{$mh->ngayxuatxuong}";
        echo "<td>{$mh->mansx}</td>";
        echo "<td>{$mh->tenxe}</td>";
        echo "<td>{$mh->gia}</td>";
        echo "</tr>";
       }
    }
    echo "</table>";
}
if(isset($_POST['Add']))
{
    $maxe=$_POST['maxe'];
    $ngayxuatxuong=$_POST['ngayxuatxuong'];
    $mansx=$_POST['mansx'];
    $tenxe=$_POST['tenxe'];
    $gia=$_POST['gia'];
    $xe=new xe($maxe,$ngayxuatxuong,$mansx, $tenxe, $gia);
    $xe->add();
}
    
if(isset($_POST['Update']))
{
    $maxe=$_POST['maxe'];
    $ngayxuatxuong=$_POST['ngayxuatxuong'];
    $mansx=$_POST['mansx'];
    $tenxe=$_POST['tenxe'];
    $gia=$_POST['gia'];
    $xe=new xe($maxe,$ngayxuatxuong,$mansx, $tenxe, $gia);
    $xe->update();
} 
if(isset($_POST['Delete']))
{
    $maxe=$_POST['maxe'];
    $ngayxuatxuong=$_POST['ngayxuatxuong'];
    $mansx=$_POST['mansx'];
    $tenxe=$_POST['tenxe'];
    $gia=$_POST['gia'];
    $xe=new xe($maxe,$ngayxuatxuong,$mansx, $tenxe, $gia);
    $xe->delete();
}    
?>
</body>
</html>	
