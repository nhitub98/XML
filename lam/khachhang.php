<?php
class khachhang{
    private $id;
    private $name;
    private $age;
    private $phone;
   
    public function __construct($id, $name,  $age, $phone)
    {
        $this->id=$id;
        $this->name=$name;
        $this->age=$age;
        $this->phone=$phone;
        
    }
    public function __destruct()
    {
        $this->id="";
        $this->name="";
        $this->age="";
        $this->phone="";
        
    }
    public function getid()
    {
        return $this->id;
    }
    public function getname()
    {
        return $this->name;
    }
    public function getage()
    {
        return $this->age;
    }
    public function getphone()
    {
        return $this->phone;
    }
   
    public function Add()
    {
        $root=new DomDocument("1.0");
        $root->load('khachhang.xml');
        $rootTag=$root->getElementsByTagName("listcustomers")->item(0);
        $infoTag=$root->createElement("customer");
        $infoTag->setAttribute("id",$this->id);
        $tenkhTag=$root->createElement("name",$this->name);
        $tuoiTag=$root->createElement("age",$this->age);
        $DienthoaiTag=$root->createElement("phone",$this->phone);
        $infoTag->appendChild($tenkhTag);
        $infoTag->appendChild($tuoiTag);
        $infoTag->appendChild($DienthoaiTag);
        $rootTag->appendChild($infoTag);
        $root->formatoutput=true;
        $root->save('khachhang.xml');
    }
public function Update()
{
$root=new DomDocument("1.0");
$root->load('khachhang.xml');
$xpath=new DOMXPATH($root); 
$kq=$xpath->query("/listcustomers/customer[@id=$id]"); 
foreach ($kq as $node)
{
//Tao node moi
$infoTag=$root->createElement("customer");
$infoTag->setAttribute("id",$this->id);
$tenkhTag=$root->createElement("name",$this->name);
$tuoiTag=$root->createElement("age",$this->age);
$DienthoaiTag=$root->createElement("phone",$this->phone);
$infoTag->appendChild($tenkhTag);
$infoTag->appendChild($tuoiTag);
$infoTag->appendChild($DienthoaiTag);

$node->parentNode->replaceChild ($infoTag, $node); }
$root->formatoutput=true;
$root->save('khachhang.xml');
}
public function Delete() {
$root=new DomDocument ("1.0");
$root->load('khachhang.xml');
$xpath=new DOMXPATH($root);
foreach ($xpath->query("/listcustomers/customer[@id=$id]") as $node)
{
$node->parentNode->removeChild($node);
}
$root->formatoutput=true;
$root->save('khachhang.xml');
}
}
?>

