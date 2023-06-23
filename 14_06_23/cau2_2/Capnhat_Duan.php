<html>
<body>
    <form method="POST"action="Capnhat_Duan.php">
    Ma du an <input type="text" name="Mada"> </br>
    Ten du an <input type="text" name="Tenda"> </br>
    Dia diem <input type="text" name="DiaDiem"> </br>
        <input type="submit" name="Add" value="Them"> 
        <input type="submit" name="Update" value="Sua">
        <input type="submit" name="Delete" value="Xoa"> 
        <input type="submit" name="Xem" value="Xem thong tin">
       
</form>

<?php require 'Duan.php'; 
$xml=new SimpleXMLElement ("Duan.xml",null,true);

if(isset($_POST['Xem'])) 
{
echo "<table border='1' cellspacing='0' cellpadding='10'>"; 
  echo "<tr>";
  echo "<td> Ma du an</td>";
  echo "<td>Ten du an</td>";
  echo "<td>Dia diem</td>";
  echo "</tr>";

foreach ($xml as $da)
{
  echo "<tr>";
  echo "<td>{$da->Maduan}</td>";
  echo "<td>{$da->Tenduan}</td>";
  echo "<td>{$da->Diadiem}</td>";
  echo "</tr>";
}
echo "</table>";
}
if (isset($_POST['Add']))
{
$Mada=$_POST['Mada'];
$Tenda=$_POST['Tenda'];
$Diadiem=$_POST['DiaDiem'];
$Duan=new Duan ($Mada,$Tenda,$Diadiem);
$Duan->Add();
}
if (isset($_POST['Update']))
{
  $Mada=$_POST['Mada'];
$Tenda=$_POST['Tenda'];
$Diadiem=$_POST['DiaDiem'];
$Duan=new Duan ($Mada,$Tenda,$Diadiem);
$Duan->Update();
}
if (isset($_POST['Delete']))
{
  $Mada=$_POST['Mada'];
  $Tenda=$_POST['Tenda'];
  $Diadiem=$_POST['DiaDiem'];
  $Duan=new Duan ($Mada,$Tenda,$Diadiem);
  $Duan->Delete();
}
?>
</body>
</html>