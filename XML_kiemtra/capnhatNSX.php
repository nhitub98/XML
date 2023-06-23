<html>   
<body>
<form method="POST" action="capnhatNSX.php">
    Ma nsx <input type="text" name="mansx"></br>
    Ten nsx <input type="text" name="tennsx"></br>
    Diachi<input type="text" name="diachi"></br>
    Dien thoai <input type="text" name="dt"></br>
    <input type="submit" name="Add" value="Them">
    <input type="submit" name="Update" value="Sua">
    <input type="submit" name="Delete" value="Xoa">
    <input type="submit" name="Xem" value="Xem thong tin">
</form>
<?php   
require 'nhasx.php';
$xml=new SimpleXMLElement("nhasx.xml",null,true);
if(isset($_POST['Xem']))
{
    $mansx=$_POST['mansx'];
    $tennsx=$_POST['tennsx'];
    $diachi=$_POST['diachi'];
    $dt=$_POST['dt'];
    $nhasx=new nhasx($mansx, $tennsx,$diachi,$dt);
    $nhasx->view();
}
if(isset($_POST['Add']))
{
    $mansx=$_POST['mansx'];
    $tennsx=$_POST['tennsx'];
    $diachi=$_POST['diachi'];
    $dt=$_POST['dt'];
    $nhasx=new nhasx($mansx, $tennsx,$diachi,$dt);
    $nhasx->add();
}
    
if(isset($_POST['Update']))
{
    $mansx=$_POST['mansx'];
    $tennsx=$_POST['tennsx'];
    $diachi=$_POST['diachi'];
    $dt=$_POST['dt'];
    $nhasx=new nhasx($mansx, $tennsx,$diachi,$dt);
    $nhasx->update();
} 
if(isset($_POST['Delete']))
{
    $mansx=$_POST['mansx'];
    $tennsx=$_POST['tennsx'];
    $diachi=$_POST['diachi'];
    $dt=$_POST['dt'];
    $nhasx=new nhasx($mansx, $tennsx,$diachi,$dt);
    $nhasx->delete();
}    
?>
</body>
</html>	
