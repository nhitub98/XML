<?php
class donhang{
    private $makh;
    private $mahang;
    private $tenhang;
    private $dongia;
    public function __construct($makhach,$mahang,$tenhang,$dongia)
    {
        $this->makh=$makhach;
        $this->mahang=$mahang;
        $this->tenhang=$tenhang;
        $this->dongia=$dongia;
    }
    
    public function __destruct() {
        $this->makh="";
        $this->mahang="";
        $this->tenhang="";
        $this->dongia=0;
    }
    public function getMakh()
    {
        return $this->makh;
    }
    public function getMahang()
    {
        return $this->mahang;
    }
    public function getTenhang()
    {
        return $this->tenhang;
    }
    public function getDongia()
    {
        return $this->dongia;
    }
    public function Add() {
        $root=new DomDocument("1.0");
        $root->load('donhang.xml');
        $rootTag=$root->getElementsByTagName("qldh")->item(0);
        $infoTag=$root->createElement("donhang");
        $MakhTag=$root->createElement("makh",$this->makh);
        $MahangTag=$root->createElement("mahang",$this->mahang);
        $TenhangTag=$root->createElement("tenhang",$this->tenhang);
        $DongiaTag=$root->createElement("dongia",$this->dongia);
        $infoTag->appendChild($MakhTag);
        $infoTag->appendChild($MahangTag);
        $infoTag->appendChild($TenhangTag);
        $infoTag->appendChild($DongiaTag);
        $rootTag->appendChild($infoTag);
        $root->formatoutput=true;
        $root->save('donhang.xml');
    }
   public function Update() {
$root=new DomDocument("1.0");
 $root->load('donhang.xml');
$xpath=new DOMXPATH($root); 
$kq=$xpath->query("//qldh/donhang[mahang='$this->mahang']"); 
foreach($kq as $node){
    //Tao node moi
        $infoTag=$root->createElement("donhang");
        $MakhTag=$root->createElement("makh",$this->makh);
        $MahangTag=$root->createElement("mahang",$this->mahang);
        $TenhangTag=$root->createElement("tenhang",$this->tenhang);
        $DongiaTag=$root->createElement("dongia",$this->dongia);
        $infoTag->appendChild($MakhTag);
        $infoTag->appendChild($MahangTag);
        $infoTag->appendChild($TenhangTag);
        $infoTag->appendChild($DongiaTag);
     //thay the node moi vao node cu
     $node->parentNode->replaceChild($infoTag,$node);      
    }
$root->formatoutput=true;
$root->save('donhang.xml');
   }

public function Delete() {
 $root=new DomDocument ("1.0");
$root->load('donhang.xml');
$xpath=new DOMXPATH($root);
echo $this->mahang;
 $kq=$xpath->query("//qldh/donhang[mahang='$this->mahang']");
 foreach($kq as $node)
 {
$node->parentNode->removeChild($node);
 }
 $root->formatoutput=true;
 $root->save('donhang.xml');
 }
}
?>


