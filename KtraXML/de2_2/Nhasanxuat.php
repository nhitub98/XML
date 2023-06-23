<?php
class Nhasanxuat{
    private $Mansx;
    private $Tennsx;
    private $Diachi;
    private $Dienthoai;
    public function __construct($Mansx, $Tennsx, $Diachi,$Dienthoai)
    {
        $this->Mansx=$Mansx;
        $this->Tennsx= $Tennsx;
        $this->Diachi=$Diachi;
        $this->Dienthoai=$Dienthoai;
    }
    public function __destruct()
    {
        $this->Mansx="";
        $this->Tennsx="";
        $this->Diachi="";
        $this->Dienthoai="";
    }
    public function getMansx()
    {
        return $this->Mansx;
    }
    public function getTennsx()
    {
        return $this->Tennsx;
    }
    public function getDiachi()
    {
        return $this->Diachi;
    }
    public function getDienthoai()
    {
        return $this->Dienthoai;
    }
    public function Add()
    {
        $root=new DomDocument("1.0");
        $root->load('Nhasanxuat.xml');
        $rootTag=$root->getElementsByTagName("qlsx")->item(0);
        $infoTag=$root->createElement("Nhasanxuat");
        $MansxTag=$root->createElement("Manhasx",$this->Mansx);
        $TennsxTag=$root->createElement("Tennhasx",$this->Tennsx);
        $DiachiTag=$root->createElement("Diachi",$this->Diachi);
        $DienthoaiTag=$root->createElement("Gia",$this->Dienthoai);
        $infoTag->appendChild($MansxTag);
        $infoTag->appendChild($TennsxTag);
        $infoTag->appendChild($DiachiTag);
        $infoTag->appendChild($DienthoaiTag);
        $rootTag->appendChild($infoTag);
        $root->formatoutput=true;
        $root->save('Nhasanxuat.xml');
    }
    public function Update()
{
$root=new DomDocument("1.0");
$root->load('Nhasanxuat.xml');
$xpath=new DOMXPATH($root); 
$kq=$xpath->query("/qlsx/Nhasanxuat[Manhasx='$this->Mansx']"); 
foreach ($kq as $node)
{
//Tao node moi
$infoTag=$root->createElement("Nhasanxuat");
$MansxTag=$root->createElement("Manhasx",$this->Mansx);
$TennsxTag=$root->createElement("Tennhasx",$this->Tennsx);
$DiachiTag=$root->createElement("Diachi",$this->Diachi);
$DienthoaiTag=$root->createElement("Gia",$this->Dienthoai);
$infoTag->appendChild($MansxTag);
$infoTag->appendChild($TennsxTag);
$infoTag->appendChild($DiachiTag);
$infoTag->appendChild($DienthoaiTag);
$node->parentNode->replaceChild ($infoTag, $node); }
$root->formatoutput=true;
$root->save('Nhasanxuat.xml');
}
public function Delete() {
$root=new DomDocument ("1.0");
$root->load('Nhasanxuat.xml');
$xpath=new DOMXPATH($root);
foreach ($xpath->query("/qlsx/Nhasanxuat[Manhasx='$this->Mansx']") as $node)
{
$node->parentNode->removeChild($node);
}
$root->formatoutput=true;
$root->save('Nhasanxuat.xml');
}
}
?>

