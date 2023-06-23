<?php
class Phongban{
    private $Maphong;
    private $Tenphong;
    public function __construct($Maphong, $Tenphong)
    {
        $this->Maphong=$Maphong;
        $this->Tenphong=$Tenphong;
        
    }
    public function __destruct()
    {
        $this->Maphong="";
        $this->Tenphong="";
    }
    public function getMaphong()
    {
        return $this->Maphong;
    }
    public function getTenphong()
    {
        return $this->Tenphong;
    }
   
    public function Add()
    {
        $root=new DomDocument("1.0");
        $root->load('Phongban.xml');
        $rootTag=$root->getElementsByTagName("qlpb")->item(0);
        $infoTag=$root->createElement("Phongban");
        $MaphongTag=$root->createElement("Maphong",$this->Maphong);
        $TenphongTag=$root->createElement("Tenphong",$this->Tenphong);
        $infoTag->appendChild($MaphongTag);
        $infoTag->appendChild( $TenphongTag);
        $rootTag->appendChild($infoTag);
        $root->formatoutput=true;
        $root->save('Phongban.xml');
    }
    public function Update()
{
$root=new DomDocument("1.0");
$root->load('Phongban.xml');
$xpath=new DOMXPATH($root); 
$kq=$xpath->query("/qlpb/Phongban[Maphong='$this->Maphong']"); 
foreach ($kq as $node)
{
//Tao node moi
$infoTag=$root->createElement("Phongban");
$MaphongTag=$root->createElement("Maphong",$this->Maphong);
$TenphongTag=$root->createElement("Tenphong",$this->Tenphong);
$infoTag->appendChild($MaphongTag);
$infoTag->appendChild( $TenphongTag);

$node->parentNode->replaceChild ($infoTag, $node); }
$root->formatoutput=true;
$root->save('Phongban.xml');
}
public function Delete() {
$root=new DomDocument ("1.0");
$root->load('Phongban.xml');
$xpath=new DOMXPATH($root);
foreach ($xpath->query("/qlpb/Phongban[Maphong='$this->Maphong']") as $node)
{
$node->parentNode->removeChild($node);
}
$root->formatoutput=true;
$root->save('Phongban.xml');
}
}
?>

