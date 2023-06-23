<html>   
<body>
<form method="POST" action="Phong.php">
    Ma phong <input type="text" name="maphong"></br>
    Ten phong <input type="text" name="tenphong"></br>
    <input type="submit" name="Add" value="Them">
    <input type="submit" name="Update" value="Sua">
    <input type="submit" name="Delete" value="Xoa">
    <input type="submit" name="Xem" value="Xem thong tin">
</form>
<?php   
require 'phong_class.php';
$xml=new SimpleXMLElement("Phongban.xml",null,true);
if(isset($_POST['Xem']))
{
    $maphong=$_POST['maphong'];
    $tenphong=$_POST['tenphong'];
    $phongban=new phong($maphong, $tenphong);
    $phongban->view();
}
if(isset($_POST['Add']))
{
    $maphong=$_POST['maphong'];
    $tenphong=$_POST['tenphong'];
    $phongban=new phong($maphong, $tenphong);
    $phongban->add();
}
    
if(isset($_POST['Update']))
{
    $maphong=$_POST['maphong'];
    $tenphong=$_POST['tenphong'];
    $phongban=new phong($maphong, $tenphong);
    $phongban->update();
} 
if(isset($_POST['Delete']))
{
    $maphong=$_POST['maphong'];
    $tenphong=$_POST['tenphong'];
    $phongban=new phong($maphong, $tenphong);
    $phongban->delete();
}    
?>
</body>
</html>	
