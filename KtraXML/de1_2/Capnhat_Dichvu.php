<html>
<body>
    <form method="POST"action="Capnhat_Dichvu.php">
    Ma dich vu<input type="text" name="Madv"> </br>
    Ten dich vu <input type="text" name="Tendv"> </br>
    Gia <input type="text" name="Gia"> </br>
        <input type="submit" name="Add" value="Them"> 
        <input type="submit" name="Update" value="Sua">
        <input type="submit" name="Delete" value="Xoa"> 
        <input type="submit" name="Xem" value="Xem thong tin">
       
</form>

<?php require 'Dichvu.php'; 
$xml=new SimpleXMLElement ("Dichvu.xml",null,true);

if(isset($_POST['Xem'])) 
{
echo "<table border='1' cellspacing='0' cellpadding='10'>"; 
  echo "<tr>";
  echo "<td> Ma dich vu</td>";
  echo "<td>Ten dich vu</td>";
  echo "<td>Gia</td>";
  echo "</tr>";

foreach ($xml as $dv)
{
  echo "<tr>";
  echo "<td>{$dv->Madichvu}</td>";
  echo "<td>{$dv->Tendichvu}</td>";
  echo "<td>{$dv->Gia}</td>";
  echo "</tr>";
}
echo "</table>";
}
if (isset($_POST['Add']))
{
$Madv=$_POST['Madv'];
$Tendv=$_POST['Tendv'];
$Gia=$_POST['Gia'];
$Dichvu=new Dichvu ($Madv,$Tendv,$Gia);
$Dichvu->Add();
}
if (isset($_POST['Update']))
{
  $Madv=$_POST['Madv'];
  $Tendv=$_POST['Tendv'];
  $Gia=$_POST['Gia'];
  $Dichvu=new Dichvu ($Madv,$Tendv,$Gia);
$Dichvu->Update();
}
if (isset($_POST['Delete']))
{
  $Madv=$_POST['Madv'];
  $Tendv=$_POST['Tendv'];
  $Gia=$_POST['Gia'];
  $Dichvu=new Dichvu ($Madv,$Tendv,$Gia);
  $Dichvu->Delete();
}
?>
</body>
</html>