<html>   <body>
<form method="POST" action="monhoc.php">
Mã môn <input type="text" name="ID"></br>
Tên môn <input type="text" name="Tenmon"></br>
Tên giảng viên <input type="text" name="Tengv"></br>
Thời gian <input type="text" name="Thoigian"></br>
<input type="submit" name="Add" value="Thêm">
<input type="submit" name="Update" value="Sửa">
<input type="submit" name="Delete" value="Xoá">
<input type="submit" name="Xem" value="Xem thông tin"></form>
<?php   
$xml=new SimpleXMLElement("monhoc.xml",null,true);
if(isset($_POST['Xem'])){
echo "<table border='1' cellspacing='0' cellpadding='10'>";
                        echo "<tr>";
                        echo "<td>Mã môn</td>";
                        echo "<td>Tên môn</td>"; 
                        echo "<td>Tên giảng viên</td>";  
                        echo "<td>Thời gian</td>";     
                        echo "</tr>";
foreach($xml as $mh){
echo "<tr>";
echo "<td>{$mh['id']}</td>";
echo "<td>{$mh->tenmon}</td>";
echo "<td>{$mh->tengiangvien}</td>";
echo "<td>{$mh->thoigian}</td>";
echo "</tr>";
}echo "</table>"; }
if(isset($_POST['Add'])){
  $root=new DomDocument("1.0");
  $root->load('monhoc.xml');
  $id=$_POST['ID'];
  $tenm=$_POST['Tenmon'];
  $tengv=$_POST['Tengv'];
  $thoigian=$_POST['Thoigian'];
$rootTag=$root->getElementsByTagName("monhocs")->item(0);
$infoTag=$root->createElement("monhoc");
$infoTag->setAttribute("id",$id);
$tengvTag=$root->createElement("tengiangvien",$tengv);
$tenmonTag=$root->createElement("tenmon",$tenm);
$thoigianTag=$root->createElement("thoigian",$thoigian);
$infoTag->appendChild($tengvTag);$infoTag->appendChild($tenmonTag);
$infoTag->appendChild($thoigianTag);$rootTag->appendChild($infoTag);
$root->save('monhoc.xml');}
    
if(isset($_POST['Update']))
{
  $root=new DomDocument("1.0");
  $root->load('monhoc.xml');
  $id=$_POST['ID'];  $tenm=$_POST['Tenmon'];  $tengv=$_POST['Tengv'];
  $thoigian=$_POST['Thoigian']; $xpath=new DOMXPATH($root);
foreach($xpath->query("/monhocs/monhoc[@id=$id]")as $node)
{  
//Tao node moi   
$infoTag=$root->createElement("monhoc");
$infoTag->setAttribute("id",$id);
$tengvTag=$root->createElement("tengiangvien",$tengv);
$tenmonTag=$root->createElement("tenmon",$tenm);
$thoigianTag=$root->createElement("thoigian",$thoigian);
$infoTag->appendChild($tengvTag);
$infoTag->appendChild($tenmonTag);
$infoTag->appendChild($thoigianTag);
//thay the node moi vao node cu
     $node->parentNode->replaceChild($infoTag,$node);
   }
$root->save('monhoc.xml');
} 
if(isset($_POST['Delete'])){
  $root=new DomDocument("1.0");
  $root->load('monhoc.xml');  $id=$_POST['ID'];  $xpath=new DOMXPATH($root);
  foreach($xpath->query("/monhocs/monhoc[@id=$id]")as $node){
   $node->parentNode->removeChild($node);}
$root->formatoutput=true;$root->save('monhoc.xml');}    
?></body></html>	
