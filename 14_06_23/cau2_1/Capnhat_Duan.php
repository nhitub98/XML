<html>
<body>
    <form method="POST"action="Capnhat_Duan.php">
    Ma du an:<select name='MaDA'> 
      <?php
      $j=0;
      $k=0;
      require 'Duan.php';
      require 'Nhanvien.php';
      $xml=new SimpleXMLElement("Duan.xml",null,true);
      $xml1=new SimpleXMLElement("Nhanvien.xml",null,true);
      $Duan=array();
      $Nhanvien=array();
      foreach($xml as $da)
      {
        $Duan[$j] = new Duan($da->maduan,$da->tenduan, $da->diadiem);
        $j++;
      }
      foreach($xml1 as $nv){
        $Nhanvien[$k]=new Nhanvien($nv->manv,$nv->tennv,$nv->maduan);
        $k++;
      }
      for($i=0;$i<$k;$i++){
        $maduan=$Nhanvien[$i]->getmada();
        echo"<option value=$maduan>$maduan</option>";
      }
      ?>
      </select>
    </br>
        Ten du an <input type="text" name="Tenduan"> </br>
        Dia diem <input type="text" name="Diadiem"> </br>
       
        <input type="submit" name="Add" value="Them"> 
        <input type="submit" name="Update" value="Sua">
        <input type="submit" name="Delete" value="Xoa"> 
        <input type="submit" name="Xem" value="Xem thong tin">
        <input type="submit" name="Search" value="Liet ke">
        <li> <a href="Nhanvien.xml">Danh sách nhân viên</a></li>
    </form>
    <?php 

if(isset($_POST['Xem'])) {
echo "<table border='1' cellspacing='0' cellpadding='10'>"; 
  echo "<tr>";
  echo "<td>Ma du an</td>";
  echo "<td>Ten du an</td>";
  echo "<td>Dia diem</td>";
  echo "</tr>";

foreach ($xml as $da) {
  echo "<tr>";
  echo "<td>{$da->Maduan} </td>";
  echo "<td>{$da->Tenduan} </td>";
  echo "<td>{$da->Diadiem} </td>";
 
  echo "</tr>";
}
echo "</table>"; }
if (isset($_POST['Add'])) {
$Mada=$_POST['MaDA'];
$Tenda=$_POST['Tenduan'];
$Diadiem=$_POST['Diadiem']; 
$Duan=new Duan($Mada, $Tenda, $Diadiem);
$Duan->Add();
}
if (isset($_POST['Update']))
{
  $Mada=$_POST['MaDA'];
  $Tenda=$_POST['Tenduan'];
  $Diadiem=$_POST['Diadiem']; 
  $Duan=new Duan($Mada, $Tenda, $Diadiem);
  $Duan->Update();
}
if (isset($_POST['Delete']))
{
  $Mada=$_POST['MaDA'];
  $Tenda=$_POST['Tenduan'];
  $Diadiem=$_POST['Diadiem']; 
  $Duan=new Duan($Mada, $Tenda, $Diadiem);
  $Duan->Delete();
}
/* if(isset($_POST['Search'])) {
  echo "<table border='1' cellspacing='0' cellpadding='10'>";
  echo "<tr>"; 
  echo "<td>Ma nhan vien</td>"; 
  echo "<td>Ten nhan vien</td>"; 

  echo "</tr>";  
  $result = $xml->xpath('/qlda/Duan/Diadiem'); //điều kiện tìm kiếm
  $Diadiem=$_POST['Diadiem']; 
  foreach($xml1 as $nv) 
  {
        foreach($xml as $da) 
        {
          $Diadiem=$_POST['Diadiem'];
          $kq="$da->Maduan";
       if($da->Diadiem==$Diadiem && $kq==$nv->maduan)
       {
        echo "<tr>";
        echo "<td>{$nv->manv}</td>";
        echo "<td>{$nv->tennv}</td>";
        echo "</tr>";
       }
        }
        }
echo "</table>";

}   // Nếu nhập địa điểm từ bàn phím */ 

if(isset($_POST['Search'])) {
  echo "<table border='1' cellspacing='0' cellpadding='10'>";
  echo "<tr>"; 
  echo "<td>Ma nhan vien</td>"; 
  echo "<td>Ten nhan vien</td>"; 

  echo "</tr>";  
  $result = $xml->xpath('/qlda/Duan/Diadiem'); //điều kiện tìm kiếm
  foreach($xml1 as $nv) 
  {
        foreach($xml as $da) 
        {
          $kq="$da->Maduan";
       if($da->Diadiem=="Ha Noi" && $kq==$nv->maduan) //nhập địa chỉ cứng
       {
        echo "<tr>";
        echo "<td>{$nv->manv}</td>";
        echo "<td>{$nv->tennv}</td>";
        echo "</tr>";
       }
        }
        }
echo "</table>";
      }
?>
</body>
</html>