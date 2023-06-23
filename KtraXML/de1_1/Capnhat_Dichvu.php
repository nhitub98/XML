<?php 
require 'Khachhang.php';
$xml1=new SimpleXMLElement("Khachhang.xml",null,true); ?>
<?php 
require 'Dichvu.php';
$xml2=new SimpleXMLElement("Dichvu.xml",null,true); ?>
<html>
<body>
    <form method="POST"action="Capnhat_Dichvu.php">
  Ma dich vu :<select name="maDv">
        <?php
            foreach($xml1 as $kh)
            {?>
                <option><?php echo "{$kh->madichvu}"; ?></option>
            <?php } ?> </select><br>
    Ten dich vu <input type="text" name="Tendv"> </br>
    Gia <input type="text" name="Gia"> </br>

  
   
  
    
  
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
  echo "<td>Ma dich vu</td>";
  echo "<td>Ten dich vu</td>";
  echo "<td>Gia</td>";
  echo "</tr>";

foreach ($xml2 as $dv) {
  echo "<tr>";
  echo "<td>{$dv->Madichvu} </td>";
  echo "<td>{$dv->Tendichvu} </td>";
  echo "<td>{$dv->Gia} </td>";

  echo "</tr>";
}
echo "</table>"; }
if (isset($_POST['Add'])) {
$madv=$_POST['maDv'];
$tendv=$_POST['Tendv'];
$gia=$_POST['Gia']; 
$Dichvu=new Dichvu($madv,$tendv,$gia);
$Dichvu->Add();
}
if (isset($_POST['Update']))
{
  $madv=$_POST['maDv'];
  $tendv=$_POST['Tendv'];
  $gia=$_POST['Gia']; 
  $Dichvu=new Dichvu($madv,$tendv,$gia);
$Dichvu->Update();
}
if (isset($_POST['Delete']))
{
  $madv=$_POST['maDv'];
  $tendv=$_POST['Tendv'];
  $gia=$_POST['Gia']; 
  $Dichvu=new Dichvu($madv,$tendv,$gia);
  $Dichvu->Delete();
}
if(isset($_POST['Search'])) {
  echo "<table border='1' cellspacing='0' cellpadding='10'>";
 
  echo "<tr>";
  echo "<td> Ma khach</td>";
  echo "<td>Ho dem</td>";
  echo "<td>Ten</td>";
  echo "<td> Dia chi</td>";
  echo "<td>Dien thoai</td>";
  echo "<td>Ma dich vu</td>";
  echo "</tr>";
   
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




