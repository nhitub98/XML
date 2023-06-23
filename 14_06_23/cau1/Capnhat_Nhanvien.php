<?php 
require 'Nhanvien.php';
$xml1=new SimpleXMLElement("Nhanvien.xml",null,true); ?>
<?php 
require 'Phongban.php';
$xml2=new SimpleXMLElement("Phongban.xml",null,true); ?>
<html>
<body>
    <form method="POST"action="Capnhat_Nhanvien.php">
    Ma nhan vien <input type="text" name="Manv"> </br>
    Ten nhan vien <input type="text" name="Tennv"> </br>
   
    Ma phong:<select name="maPhong">
        <?php
            foreach($xml2 as $pb)
            {?>
                <option><?php echo "{$pb->Maphong}"; ?></option>
            <?php } ?>
    </select><br>
  
        <input type="submit" name="Add" value="Them"> 
        <input type="submit" name="Update" value="Sua">
        <input type="submit" name="Delete" value="Xoa"> 
        <input type="submit" name="Xem" value="Xem thong tin">
        <input type="submit" name="Search" value="Liet ke">
        <li> <a href="header.html">Home</a></li>
    </form>
    <?php 

if(isset($_POST['Xem'])) {
echo "<table border='1' cellspacing='0' cellpadding='10'>"; 
  echo "<tr>";
  echo "<td>Ma nhan vien</td>";
  echo "<td>Ten nhan vien</td>";
  echo "<td>Ma phong</td>";
  echo "</tr>";

foreach ($xml1 as $nv) {
  echo "<tr>";
  echo "<td>{$nv->manv} </td>";
  echo "<td>{$nv->tennv} </td>";
  echo "<td>{$nv->maphong} </td>";

  echo "</tr>";
}
echo "</table>"; }
if (isset($_POST['Add'])) {
$manv=$_POST['Manv'];
$tennv=$_POST['Tennv'];
$maphong=$_POST['maPhong']; 
$Nhanvien=new Nhanvien($manv,$tennv,$maphong);
$Nhanvien->Add();
}
if (isset($_POST['Update']))
{
  $manv=$_POST['Manv'];
  $tennv=$_POST['Tennv'];
  $maphong=$_POST['maPhong']; 
  $Nhanvien=new Nhanvien($manv,$tennv,$maphong);
  $Nhanvien->Update();
}
if (isset($_POST['Delete']))
{
  $manv=$_POST['Manv'];
  $tennv=$_POST['Tennv'];
  $maphong=$_POST['maPhong']; 
  $Nhanvien=new Nhanvien($manv,$tennv,$maphong);
  $Nhanvien->Delete();
}
if(isset($_POST['Search'])) {
  echo "<table border='1' cellspacing='0' cellpadding='10'>";
  echo "<tr>"; 
  echo "<td>Ma Phong</td>";  
  echo "<td>Ma nhan vien</td>";
  echo "<td>Ten nhan vien</td>"; 
   
  echo "</tr>";  
  $result = $xml1->xpath('/qlnv/Nhanvien/maphong'); //điều kiện tìm kiếm
  $maphong=$_POST['maPhong']; 
  foreach($xml1 as $nv){ 
      if($nv->maphong==$_POST['maPhong']){
          echo "<tr>";
          echo "<td>{$nv->maphong}</td>";
          echo "<td>{$nv->manv}</td>";
          echo "<td>{$nv->tennv}</td>";
          echo "</tr>";
          
      }
        
  }
  echo "</table>";   
}
 ?>
</body>
</html>	




