
<?php 
require 'Nhasanxuat.php';
$xml1=new SimpleXMLElement("Nhasanxuat.xml",null,true); ?>
<?php 
require 'Xe.php';
$xml2=new SimpleXMLElement("Xe.xml",null,true); ?>
<html>
<body>
    <form method="POST"action="Capnhat_Xe.php">
    Ma xe:  <input type="text" name="maxe"></br>
    Ngay xuat xuong <input type="text" name="ngayxuatxuong"> </br>
    Ma nha san xuat <select name='mansx'> 
    <?php
            foreach($xml1 as $nsx)
            {?>
                <option><?php echo "{$nsx->Manhasx}"; ?></option>
            <?php } ?> </select> </br>
        Ten xe <input type="text" name="tenxe"> </br>
        Gia <input type="text" name="gia"></br> 
        <input type="submit" name="Add" value="Them"> 
        <input type="submit" name="Update" value="Sua">
        <input type="submit" name="Delete" value="Xoa"> 
        <input type="submit" name="Xem" value="Xem thong tin">
        <input type="submit" name="Search" value="Loc">
        <li> <a href="header.html">Home</a></li>
    </form>
    <?php 

if(isset($_POST['Xem'])) {
echo "<table border='1' cellspacing='0' cellpadding='10'>"; 
  echo "<tr>";
  echo "<td>Ma xe</td>";
  echo "<td>Ngay xuat xuong</td>";
  echo "<td>Ma nha san xuat</td>";
  echo "<td>Ten xe</td>";
  echo "<td>Gia</td>";
  echo "</tr>";

foreach ($xml2 as $xe) {
  echo "<tr>";
  echo "<td>{$xe->Maxe} </td>";
  echo "<td>{$xe->Ngayxuatxuong} </td>";
  echo "<td>{$xe->Manhasx} </td>";
  echo "<td>{$xe->Tenxe} </td>";
  echo "<td>{$xe->Gia} </td>";
  echo "</tr>";
}
echo "</table>"; }
if (isset($_POST['Add'])) {
$Maxe=$_POST['maxe'];
$Ngayxuatxuong=$_POST['ngayxuatxuong'];
$Mansx=$_POST['mansx'];
$Tenxe=$_POST['tenxe']; 
$Gia=$_POST['gia']; 
$Xe=new Xe($Maxe, $Ngayxuatxuong, $Mansx, $Tenxe,$Gia);
$Xe->Add();
}
if (isset($_POST['Update']))
{
  $Maxe=$_POST['maxe'];
  $Ngayxuatxuong=$_POST['ngayxuatxuong'];
  $Mansx=$_POST['mansx'];
  $Tenxe=$_POST['tenxe']; 
  $Gia=$_POST['gia']; 
  $Xe=new Xe($Maxe, $Ngayxuatxuong, $Mansx, $Tenxe,$Gia);
  $Xe->Update();
}
if (isset($_POST['Delete']))
{
  $Maxe=$_POST['maxe'];
$Ngayxuatxuong=$_POST['ngayxuatxuong'];
$Mansx=$_POST['mansx'];
$Tenxe=$_POST['tenxe']; 
$Gia=$_POST['gia']; 
$Xe=new Xe($Maxe, $Ngayxuatxuong, $Mansx, $Tenxe,$Gia);
  $Xe->Delete();
}
if(isset($_POST['Search'])) {
  echo "<table border='1' cellspacing='0' cellpadding='10'>";
  echo "<tr>"; 
  echo "<td>Ma xe</td>";
  echo "<td>Ngay xuat xuong</td>";
  echo "<td>Ma nha san xuat</td>";
  echo "<td>Ten xe</td>";
  echo "<td>Gia</td>";    
  echo "</tr>";  
//$result = $xml2->xpath('/qlx/Xe/Manhasx'); //điều kiện tìm kiếm
$Mansx=$_POST['mansx'];   
   
    foreach($xml2 as $xe)
    {

       if($xe->Manhasx==$Mansx)
       {
echo "<tr>";
echo "<td>{$xe->Maxe} </td>";
echo "<td>{$xe->Ngayxuatxuong} </td>";
echo "<td>{$xe->Manhasx} </td>";
echo "<td>{$xe->Tenxe} </td>";
echo "<td>{$xe->Gia} </td>";
;echo "</tr>";
}
    }
echo "</table>";
}  
 ?>

</body>
</html>



