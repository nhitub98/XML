<html>
<body>
    <form method="POST"action="Capnhat_Donhang.php">
    Ma khach hang:<select name='makh'> 
      <?php
      $j=0;
      $k=0;
      require 'donhang.php';
      require 'khachhang.php';
      $xml=new SimpleXMLElement("donhang.xml",null,true);
      $xml1=new SimpleXMLElement("khachhang.xml",null,true);
      $donhang=array();
      $khachhang=array();
      foreach($xml as $dh)
      {
        $donhang[$j] = new donhang($dh->makh,$dh->mahang, $dh->tenhang, $dh->dongia);
        $j++;
      }
      foreach($xml1 as $kh){
        $khachhang[$k]=new khachhang($kh->makh,$kh->hoten,$kh->diachi);
        $k++;
      }
      for($i=0;$i<$k;$i++){
        $makh=$khachhang[$i]->getmakh();
        echo"<option value=$makh>$makh</option>";
      }
      ?>
      </select>
    </br>
        Ma hang <input type="text" name="mahang"> </br>
        Ten hang <input type="text" name="tenhang"> </br>
        Don gia <input type="text" name="dongia"></br> 
        <input type="submit" name="Add" value="Them"> 
        <input type="submit" name="Update" value="Sua">
        <input type="submit" name="Delete" value="Xoa"> 
        <input type="submit" name="Xem" value="Xem thong tin">
        <li> <a href="header.html">Home</a></li>
    </form>
    <?php 

if(isset($_POST['Xem'])) {
echo "<table border='1' cellspacing='0' cellpadding='10'>"; 
  echo "<tr>";
  echo "<td>Ma khach</td>";
  echo "<td>Ma hang</td>";
  echo "<td>Ten hang</td>";
  echo "<td>Don gia</td>";
  echo "</tr>";

foreach ($donhang as $dh) {
  echo "<tr>";
  echo "<td>{$dh->getMakh()} </td>";
  echo "<td>{$dh->getMahang()} </td>";
  echo "<td>{$dh->getTenhang()} </td>";
  echo "<td>{$dh->getDongia()} </td>";
  echo "</tr>";
}
echo "</table>"; }
if (isset($_POST['Add'])) {
$Ma=$_POST['makh'];
$Ma1=$_POST['mahang'];
$Ten=$_POST['tenhang']; 
$Dongia=$_POST['dongia']; 
$donhang=new donhang($Ma, $Ma1, $Ten, $Dongia);
$donhang->Add();
}
if (isset($_POST['Update']))
{
  $Ma=$_POST['makh'];
  $Ma1=$_POST['mahang'];
  $Ten=$_POST['tenhang']; 
  $Dongia=$_POST['dongia']; 
  $donhang=new donhang ($Ma, $Ma1, $Ten, $Dongia);
  $donhang->Update();
}
if (isset($_POST['Delete']))
{
  $Ma=$_POST['makh'];
  $Ma1=$_POST['mahang'];
  $Ten=$_POST['tenhang']; 
  $Dongia=$_POST['dongia']; 
  $donhang=new donhang ($Ma, $Ma1, $Ten, $Dongia);
  $donhang->Delete();
}
?>
</body>
</html>