<html>
<body>
    <form method="POST"action="Capnhat_Nhasanxuat.php">
        Ma nha san xuat <input type="text" name="Mansx"> </br>
        Ten nha san xuat <input type="text" name="Tennsx"> </br>
        Dia chi <input type="text" name="Diachi"></br> 
        Dien thoai <input type="text" name="Dienthoai"></br> 
        <input type="submit" name="Add" value="Them"> 
        <input type="submit" name="Update" value="Sua">
        <input type="submit" name="Delete" value="Xoa"> 
        <input type="submit" name="Xem" value="Xem thong tin">

</form>

<?php require 'Nhasanxuat.php'; 
$xml=new SimpleXMLElement ("Nhasanxuat.xml",null,true);

if(isset($_POST['Xem'])) 
{
echo "<table border='1' cellspacing='0' cellpadding='10'>"; 
  echo "<tr>";
  echo "<td> Ma nha san xuat </td>";
  echo "<td> Ten nha san xuat </td>";
  echo "<td>Dia chi</td>";
  echo "<td>Dien thoai </td>";
  echo "</tr>";

foreach ($xml as $nsx)
{
  echo "<tr>";
  echo "<td>{$nsx->Manhasx}</td>";
  echo "<td>{$nsx->Tennhasx}</td>";
  echo "<td>{$nsx->Diachi}</td>";
  echo "<td>{$nsx->Dienthoai}</td>";
  echo "</tr>";
}
echo "</table>";
}
if (isset($_POST['Add']))
{
$Ma=$_POST['Mansx'];
$Ten=$_POST['Tennsx'];
$Diachi=$_POST['Diachi']; 
$Dienthoai=$_POST['Dienthoai']; 
$Nhasanxuat=new Nhasanxuat ($Ma, $Ten, $Diachi,$Dienthoai);
$Nhasanxuat->Add();
}
if (isset($_POST['Update']))
{
$Ma=$_POST['Mansx'];
$Ten=$_POST['Tennsx'];
$Diachi=$_POST['Diachi']; 
$Dienthoai=$_POST['Dienthoai']; 
$Nhasanxuat=new Nhasanxuat ($Ma, $Ten, $Diachi,$Dienthoai);
  $Nhasanxuat->Update();
}
if (isset($_POST['Delete']))
{
  $Ma=$_POST['Mansx'];
  $Ten=$_POST['Tennsx'];
  $Diachi=$_POST['Diachi']; 
  $Dienthoai=$_POST['Dienthoai']; 
  $Nhasanxuat=new Nhasanxuat ($Ma, $Ten, $Diachi,$Dienthoai);
  $Nhasanxuat->Delete();
}
?>
</body>
</html>