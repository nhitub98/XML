<html>
<body>
    <form method="POST"action="Capnhat_Khachhang.php">
        Ma khach <input type="text" name="Makhach"> </br>
        Ho ten<input type="text" name="Hoten"> </br>
        Dia chi <input type="text" name="Diachi"></br> 
        <input type="submit" name="Add" value="Them"> 
        <input type="submit" name="Update" value="Sua">
        <input type="submit" name="Delete" value="Xoa"> 
        <input type="submit" name="Xem" value="Xem thong tin">

</form>

<?php require 'Khachhang.php'; 
$xml=new SimpleXMLElement ("Khachhang.xml",null,true);

if(isset($_POST['Xem'])) 
{
echo "<table border='1' cellspacing='0' cellpadding='10'>"; 
  echo "<tr>";
  echo "<td> Ma khach</td>";
  echo "<td>Ho ten</td>";
  echo "<td>Dia chi</td>";
  echo "</tr>";

foreach ($xml as $mh)
{
  echo "<tr>";
  echo "<td>{$mh->Makh}</td>";
  echo "<td>{$mh->Hoten}</td>";
  echo "<td>{$mh->Diachi}</td>";
  echo "</tr>";
}
echo "</table>";
}
if (isset($_POST['Add']))
{
$Ma=$_POST['Makhach'];
$Ten=$_POST['Hoten'];
$Diachi=$_POST['Diachi']; 
$Khachhang=new Khachhang ($Ma, $Ten, $Diachi);
$Khachhang->Add();
}
if (isset($_POST['Update']))
{
  $Ma=$_POST['Makhach'];
  $Ten=$_POST['Hoten'];
  $Diachi=$_POST['Diachi'];  
  $Khachhang=new Khachhang ($Ma, $Ten, $Diachi);
  $Khachhang->Update();
}
if (isset($_POST['Delete']))
{
  $Ma=$_POST['Makhach'];
  $Ten=$_POST['Hoten'];
  $Diachi=$_POST['Diachi']; 
  $Khachhang=new Khachhang ($Ma, $Ten, $Diachi);
 $Khachhang->Delete();
}
?>
</body>
</html>