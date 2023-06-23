<?php
class Nhanvien{
    private $manv;
    private $tennv;
    private $maduan;
    public function __construct($Ma, $Ten, $Duan)
    {
        $this->manv=$Ma;
        $this->tennv=$Ten;
        $this->maduan=$Duan;
    }
    public function __destruct()
    {
        $this->manv="";
        $this->tennv="";
        $this->maduan="";
    }
    public function getmanv()
    {
        return $this->manv;
    }
    public function gettennv()
    {
        return $this->tennv;
    }
    public function getmada()
    {
        return $this->maduan;
    }
    public function Add()
    {
        $root=new DomDocument("1.0");
        $root->load('Nhanvien.xml');
        $rootTag=$root->getElementsByTagName("qlnv")->item(0);
        $infoTag=$root->createElement("Nhanvien");
        $ManvTag=$root->createElement("manv",$this->manv);
        $TennvTag=$root->createElement("tennv",$this->tennv);
        $MadaTag=$root->createElement("maduan",$this->maduan);
        $infoTag->appendChild($ManvTag);
        $infoTag->appendChild($TennvTag);
        $infoTag->appendChild($MadaTag);
        $rootTag->appendChild($infoTag);
        $root->formatoutput=true;
        $root->save('Nhanvien.xml');
    }
    public function Update()
{
$root=new DomDocument("1.0");
$root->load('Nhanvien.xml');
$xpath=new DOMXPATH($root); 
$kq=$xpath->query("/qlnv/Nhanvien[manv='$this->manv']"); 
foreach ($kq as $node)
{
//Tao node moi
$infoTag=$root->createElement("Nhanvien");
$ManvTag=$root->createElement("manv",$this->manv);
$TennvTag=$root->createElement("tennv",$this->tennv);
$MadaTag=$root->createElement("maduan",$this->maduan);
$infoTag->appendChild($ManvTag);
$infoTag->appendChild($TennvTag);
$infoTag->appendChild($MadaTag);
$node->parentNode->replaceChild ($infoTag, $node); }
$root->formatoutput=true;
$root->save('Nhanvien.xml');
}
public function Delete() {
$root=new DomDocument ("1.0");
$root->load('Nhanvien.xml');
$xpath=new DOMXPATH($root);
foreach ($xpath->query("/qlnv/Nhanvien[manv='$this->manv']") as $node)
{
$node->parentNode->removeChild($node);
}
$root->formatoutput=true;
$root->save('Nhanvien.xml');
}
}
?>

