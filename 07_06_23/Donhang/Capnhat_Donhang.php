<html>
<body>
    <form method="POST"action="Capnhat_Donhang.php">
    Ma khach hang:<select name='maKh'> 
      <?php
      $j=0;
      $k=0;
      require 'Donhang.php';
      require 'Khachhang.php';
      $xml=new SimpleXMLElement("Donhang.xml",null,true);
      $xml1=new SimpleXMLElement("Khachhang.xml",null,true);
      $Donhang=array();
      $Khachhang=array();
      foreach($xml as $dh)
      {
        $Donhang[$j] = new Donhang($dh->makh,$dh->mahang, $dh->tenhang, $dh->dongia);
        $j++;
      }
      foreach($xml1 as $kh){
        $Khachhang[$k]=new Khachhang($kh->Makh,$kh->Hoten,$kh->Diachi);
        $k++;
      }
      for($i=0;$i<$k;$i++){
        $Makh=$Khachhang[$i]->getMakh();
        echo"<option value=$Makh>$Makh</option>";
      }
      ?>
      </select>
    </br>
        Ma hang <input type="text" name="Mahang"> </br>
        Ten hang <input type="text" name="Tenhang"> </br>
        Don gia <input type="text" name="Dongia"></br> 
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

foreach ($Donhang as $dh) {
  echo "<tr>";
  echo "<td>{$dh->getmakh()} </td>";
  echo "<td>{$dh->getMahang()} </td>";
  echo "<td>{$dh->getTenhang()} </td>";
  echo "<td>{$dh->getDongia()} </td>";
  echo "</tr>";
}
echo "</table>"; }
if (isset($_POST['Add'])) {
$Ma=$_POST['maKh'];
$Ma1=$_POST['Mahang'];
$Ten=$_POST['Tenhang']; 
$Dongia=$_POST['Dongia']; 
$Donhang=new Donhang($Ma, $Ma1, $Ten, $Dongia);
$Donhang->Add();
}
if (isset($_POST['Update']))
{
  $Ma=$_POST['maKh'];
  $Ma1=$_POST['Mahang'];
  $Ten=$_POST['Tenhang']; 
  $Dongia=$_POST['Dongia'];   
  $Donhang=new Donhang ($Ma, $Ma1, $Ten, $Dongia);
  $Donhang->Update();
}
if (isset($_POST['Delete']))
{
  $Ma=$_POST['maKh'];
  $Ma1=$_POST['Mahang'];
  $Ten=$_POST['Tenhang']; 
  $Dongia=$_POST['Dongia'];  
  $Donhang=new Donhang ($Ma, $Ma1, $Ten, $Dongia);
  $Donhang->Delete();
}
?>
</body>
</html>