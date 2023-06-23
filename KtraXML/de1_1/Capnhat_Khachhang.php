<html>
<body>
    <form method="POST"action="Capnhat_Khachhang.php">
    Ma khach<input type="text" name="Makhach"> </br>
    Ho dem <input type="text" name="Hodem"> </br>
    Ten <input type="text" name="Ten"> </br>
    Dia chi<input type="text" name="Dc"> </br>
    Dien thoai <input type="text" name="Dt"> </br>
    Ma dich vu <input type="text" name="Madv"> </br>
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
  echo "<td>Ho dem</td>";
  echo "<td>Ten</td>";
  echo "<td> Dia chi</td>";
  echo "<td>Dien thoai</td>";
  echo "<td>Ma dich vu</td>";
  echo "</tr>";

foreach ($xml as $kh)
{
    echo "<tr>";
    echo "<td>{$kh->makhach} </td>";
    echo "<td>{$kh->hodem} </td>";
    echo "<td>{$kh->ten} </td>";
    echo "<td>{$kh->diachi} </td>";
    echo "<td>{$kh->dienthoai} </td>";
    echo "<td>{$kh->madichvu} </td>";
    echo "</tr>";
  
}
echo "</table>";
}
if (isset($_POST['Add']))
{
  $makhach=$_POST['Makhach'];
  $hodem=$_POST['Hodem'];
  $ten=$_POST['Ten']; 
  $diachi=$_POST['Dc'];
  $dt=$_POST['Dt'];
  $madv=$_POST['Madv']; 
  $Khachhang=new Khachhang($makhach,$hodem,$ten,$diachi,$dt,$madv);
  $Khachhang->Add();
}
if (isset($_POST['Update']))
{
  $makhach=$_POST['Makhach'];
  $hodem=$_POST['Hodem'];
  $ten=$_POST['Ten']; 
  $diachi=$_POST['Dc'];
  $dt=$_POST['Dt'];
  $madv=$_POST['Madv']; 
  $Khachhang=new Khachhang($makhach,$hodem,$ten,$diachi,$dt,$madv);
  $Khachhang->Update();
}
if (isset($_POST['Delete']))
{
  $makhach=$_POST['Makhach'];
  $hodem=$_POST['Hodem'];
  $ten=$_POST['Ten']; 
  $diachi=$_POST['Dc'];
  $dt=$_POST['Dt'];
  $madv=$_POST['Madv']; 
  $Khachhang=new Khachhang($makhach,$hodem,$ten,$diachi,$dt,$madv);
  $Khachhang->Delete();
}
?>
</body>
</html>