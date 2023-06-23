<html>
<body>
    <form method="POST"action="CapnhatKH.php">
        Ma khach <input type="text" name="makhach"> </br>
        Ho ten<input type="text" name="hoten"> </br>
        Dia chi <input type="text" name="diachi"></br> 
        <input type="submit" name="Add" value="Them"> 
        <input type="submit" name="Update" value="Sua">
        <input type="submit" name="Delete" value="Xoa"> 
        <input type="submit" name="Xem" value="Xem thông tin">

</form>

<?php require 'khachhang.php'; 
$xml=new SimpleXMLElement ("khachhang.xml",null,true);

if(isset($_POST['Xem'])) 
{
echo "<table border='1' cellspacing='0' cellpadding='10'>"; 
  echo "<tr>";
  echo "<td> Ma khach </td>";
  echo "<td>Ho ten</td>";
  echo "<td>Dia chi</td>";
  echo "</tr>";

foreach ($xml as $mh)
{
  echo "<tr>";
  echo "<td>{$mh->makh}</td>";
  echo "<td>{$mh->hoten}</td>";
  echo "<td>{$mh->diachi}</td>";
  echo "</tr>";
}
echo "</table>";
}
if (isset($_POST['Add']))
{
$ma=$_POST['makhach'];
$ten=$_POST['hoten'];
$diachi=$_POST['diachi']; 
$khachhang=new khachhang ($ma, $ten, $diachi);
$khachhang->Add();
}
if (isset($_POST['Update']))
{
$ma=$_POST['makhach']; 
$ten=$_POST['hoten'];
$diachi=$_POST['diachi']; 
$khachhang=new khachhang ($ma, $ten, $diachi);
$khachhang->Update();
}
if (isset($_POST['Delete']))
{
$ma=$_POST['makhach']; 
$ten=$_POST['hoten'];
$diachi=$_POST['diachi']; 
$khachhang=new khachhang ($ma, $ten, $diachi);
$khachhang->Delete();
}
?>
</body>
</html>