<html>
<body>
    <form method="POST"action="Capnhat_Nhanvien.php">
        Ma nhan vien<input type="text" name="Manv"> </br>
        Ten nhan vien <input type="text" name="Hoten"> </br>
        Ma du an <input type="text" name="Mada"></br> 
        <input type="submit" name="Add" value="Them"> 
        <input type="submit" name="Update" value="Sua">
        <input type="submit" name="Delete" value="Xoa"> 
        <input type="submit" name="Xem" value="Xem thong tin">

</form>

<?php require 'Nhanvien.php'; 
$xml=new SimpleXMLElement ("Nhanvien.xml",null,true);

if(isset($_POST['Xem'])) 
{
echo "<table border='1' cellspacing='0' cellpadding='10'>"; 
  echo "<tr>";
  echo "<td> Ma nhan vien</td>";
  echo "<td>Ten nhan vien</td>";
  echo "<td>Ma du an</td>";
  echo "</tr>";

foreach ($xml as $nv)
{
  echo "<tr>";
  echo "<td>{$nv->manv}</td>";
  echo "<td>{$nv->tennv}</td>";
  echo "<td>{$nv->maduan}</td>";
  echo "</tr>";
}
echo "</table>";
}
if (isset($_POST['Add']))
{
$Ma=$_POST['Manv'];
$Ten=$_POST['Hoten'];
$Duan=$_POST['Mada']; 
$Nhanvien=new Nhanvien ($Ma, $Ten, $Duan);
$Nhanvien->Add();
}
if (isset($_POST['Update']))
{
$Ma=$_POST['Manv'];
$Ten=$_POST['Hoten'];
$Duan=$_POST['Mada']; 
$Nhanvien=new Nhanvien ($Ma, $Ten, $Duan);
$Nhanvien->Update();
}
if (isset($_POST['Delete']))
{
  $Ma=$_POST['Manv'];
  $Ten=$_POST['Hoten'];
  $Duan=$_POST['Mada']; 
  $Nhanvien=new Nhanvien ($Ma, $Ten, $Duan);
  $Nhanvien->Delete();
}
?>
</body>
</html>