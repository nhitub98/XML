<?php 
require 'Khachhang.php';
$xml1=new SimpleXMLElement("Khachhang.xml",null,true); ?>
<?php 
require 'Dichvu.php';
$xml2=new SimpleXMLElement("Dichvu.xml",null,true); ?>
<html>
<body>
    <form method="POST"action="Capnhat_Khachhang.php">
    Ma khach <input type="text" name="Makhach"> </br>
    Hodem <input type="text" name="Hodem"> </br>
    Ten <input type="text" name="Ten"> </br>
    Dia chi <input type="text" name="Dc"> </br>
    Dien thoai <input type="text" name="Dt"> </br>
    Gia <input type="text" name="Gia"> </br>
   
    Ma dich vu :<select name="maDv">
        <?php
            foreach($xml2 as $dv)
            {?>
                <option><?php echo "{$dv->Madichvu}"; ?></option>
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
  echo "<td>Ma khach</td>";
  echo "<td>Ho dem</td>";
  echo "<td>Ten</td>";
  echo "<td>Dia chi</td>";
  echo "<td>Dien thoai</td>";
  echo "<td>Ma dich vu</td>";
  echo "</tr>";

foreach ($xml1 as $kh) {
  echo "<tr>";
  echo "<td>{$kh->makhach} </td>";
  echo "<td>{$kh->hodem} </td>";
  echo "<td>{$kh->ten} </td>";
  echo "<td>{$kh->diachi} </td>";
  echo "<td>{$kh->dienthoai} </td>";
  echo "<td>{$kh->madichvu} </td>";
  echo "</tr>";
}
echo "</table>"; }
if (isset($_POST['Add'])) {
$makhach=$_POST['Makhach'];
$hodem=$_POST['Hodem'];
$ten=$_POST['Ten']; 
$diachi=$_POST['Dc'];
$dt=$_POST['Dt'];
$madv=$_POST['maDv']; 
$gia=$_POST['Gia']; 
$Khachhang=new Khachhang($makhach,$hodem,$ten,$diachi,$dt,$madv,$gia);
$Khachhang->Add();
}
if (isset($_POST['Update']))
{
$makhach=$_POST['Makhach'];
$hodem=$_POST['Hodem'];
$ten=$_POST['Ten']; 
$diachi=$_POST['Dc'];
$dt=$_POST['Dt'];
$madv=$_POST['maDv']; 
$gia=$_POST['Gia']; 
$Khachhang=new Khachhang($makhach,$hodem,$ten,$diachi,$dt,$madv,$gia);
$Khachhang->Update();
}
if (isset($_POST['Delete']))
{
  $makhach=$_POST['Makhach'];
  $hodem=$_POST['Hodem'];
  $ten=$_POST['Ten']; 
  $diachi=$_POST['Dc'];
  $dt=$_POST['Dt'];
  $madv=$_POST['maDv']; 
  $gia=$_POST['Gia']; 
  $Khachhang=new Khachhang($makhach,$hodem,$ten,$diachi,$dt,$madv,$gia);
  $Khachhang->Delete();
}
if(isset($_POST['Search'])) {
  echo "<table border='1' cellspacing='0' cellpadding='10'>";
  echo "<tr>";
  echo "<td>Ma khach</td>";
  echo "<td>Ho dem</td>";
  echo "<td>Ten</td>";
  echo "<td>Dia chi</td>";
  echo "<td>Dien thoai</td>";
  echo "<td>Ma dich vu</td>";
  
  echo "</tr>"; 
  $result = $xml2->xpath('/qldv/Dichvu/Gia'); //điều kiện tìm kiếm
  $gia=$_POST['Gia']; 
  foreach($xml1 as $kh)
    {
        foreach($xml2 as $dv)
         {
          $gia=$_POST['Gia']; 
            $dichvu = "$dv->Madichvu";
       if($dv->Gia==$gia && $dichvu==$kh->madichvu)
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
  }
}
  echo "</table>";
}
 ?>
</body>
</html>	




