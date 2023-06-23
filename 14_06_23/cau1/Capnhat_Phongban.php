<html>
<body>
    <form method="POST"action="Capnhat_Phongban.php">
        Ma phong <input type="text" name="Maphong"> </br>
        Ten phong<input type="text" name="Tenphong"> </br>
       
        <input type="submit" name="Add" value="Them"> 
        <input type="submit" name="Update" value="Sua">
        <input type="submit" name="Delete" value="Xoa"> 
        <input type="submit" name="Xem" value="Xem thong tin">

</form>

<?php require 'Phongban.php'; 
$xml=new SimpleXMLElement ("Phongban.xml",null,true);

if(isset($_POST['Xem'])) 
{
echo "<table border='1' cellspacing='0' cellpadding='10'>"; 
  echo "<tr>";
  echo "<td> Ma phong</td>";
  echo "<td>Ten phong</td>";

  echo "</tr>";

foreach ($xml as $mh)
{
  echo "<tr>";
  echo "<td>{$mh->Maphong}</td>";
  echo "<td>{$mh->Tenphong}</td>";
 
  echo "</tr>";
}
echo "</table>";
}
if (isset($_POST['Add']))
{
$Maphong=$_POST['Maphong'];
$Tenphong=$_POST['Tenphong'];
$Phongban=new Phongban ($Maphong,$Tenphong);
$Phongban->Add();
}
if (isset($_POST['Update']))
{
  $Maphong=$_POST['Maphong'];
  $Tenphong=$_POST['Tenphong'];
  $Phongban=new Phongban ($Maphong,$Tenphong);
  $Phongban->Update();
}
if (isset($_POST['Delete']))
{
  $Maphong=$_POST['Maphong'];
  $Tenphong=$_POST['Tenphong'];
  $Phongban=new Phongban ($Maphong,$Tenphong);
  $Phongban->Delete();
}
?>
</body>
</html>