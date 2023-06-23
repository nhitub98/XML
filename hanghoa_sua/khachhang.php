<?php
class khachhang{
    private $makh;
    private $hoten;
    private $diachi;
    public function __construct($ma, $ten, $diachi)
    {
        $this->makh=$ma;
        $this->hoten=$ten;
        $this->diachi=$diachi;
    }
    public function __destruct()
    {
        $this->makh="";
        $this->hoten="";
        $this->diachi="";
    }
    public function getmakh()
    {
        return $this->makh;
    }
    public function gethoten()
    {
        return $this->hoten;
    }
    public function getdiachi()
    {
        return $this->diachi;
    }
    public function Add()
    {
        $root=new DomDocument("1.0");
        $root->load('khachhang.xml');
        $rootTag=$root->getElementsByTagName("qlkh")->item(0);
        $infoTag=$root->createElement("khachhang");
        $makhTag=$root->createElement("makh",$this->makh);
        $tenkhTag=$root->createElement("hoten",$this->hoten);
        $diachiTag=$root->createElement("diachi",$this->diachi);
        $infoTag->appendChild($makhTag);
        $infoTag->appendChild($tenkhTag);
        $infoTag->appendChild($diachiTag);
        $rootTag->appendChild($infoTag);
        $root->formatoutput=true;
        $root->save('khachhang.xml');
    }
    public function Update()
{
$root=new DomDocument("1.0");
$root->load('khachhang.xml');
$xpath=new DOMXPATH($root); 
$kq=$xpath->query("/qlkh/khachhang[makh='$this->makh']"); 
foreach ($kq as $node)
{
//Tao node moi
$infoTag=$root->createElement("khachhang");
$MakhTag=$root->createElement ("makh", $this->makh);
$TenkhTag=$root->createElement ("hoten", $this->hoten);
$DiachiTag=$root->createElement("diachi", $this->diachi);
$infoTag->appendChild($MakhTag);
$infoTag->appendChild($TenkhTag);
$infoTag->appendChild($DiachiTag);
$node->parentNode->replaceChild ($infoTag, $node); }
$root->formatoutput=true;
$root->save('khachhang.xml');
}
public function Delete() {
$root=new DomDocument ("1.0");
$root->load('khachhang.xml');
$xpath=new DOMXPATH($root);
foreach ($xpath->query("//qlkh/khachhang[makh='$this->makh']") as $node)
{
$node->parentNode->removeChild($node);
}
$root->formatoutput=true;
$root->save('khachhang.xml');
}
}
?>

