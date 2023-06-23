<?php
class Khachhang{
    private $makhach;
    private $hodem;
    private $ten;
    private $diachi;
    private $dienthoai;
    private $madichvu;
   
    public function __construct($makh,$hodem,$ten,$dc,$sdt,$madv)
    {
        $this->makhach=$makh;
        $this->hodem=$hodem;
        $this->ten=$ten;
        $this->diachi=$dc;
        $this->dienthoai=$sdt;
        $this->madichvu=$madv;
       
       
    }
    
    public function __destruct() {
        $this->makhach="";
        $this->hodem="";
        $this->ten="";
        $this->diachi="";
        $this->dienthoai="";
        $this->madichvu="";
        
    }
    public function getmakhach()
    {
        return $this->makhach;
    }
    public function gethodem()
    {
        return $this->hodem;
    }
    public function getten()
    {
        return $this->ten;
    }
   
    public function getdc()
    {
        return $this->diachi;
    }
    public function getdt()
    {
        return $this->dienthoai;
    }
    public function getmadv()
    {
        return $this->madichvu;
    }
  
    public function Add() {
        $root=new DomDocument("1.0");
        $root->load('Khachhang.xml');
        $rootTag=$root->getElementsByTagName("qlkh")->item(0);
        $infoTag=$root->createElement("Khachhang");
        $makhTag=$root->createElement("makhach",$this->makhach);
        $hodemTag=$root->createElement("hodem",$this->hodem);
        $tenTag=$root->createElement("ten",$this->ten);
        $dcTag=$root->createElement("diachi",$this->diachi);
        $dtTag=$root->createElement("dienthoai",$this->dienthoai);
        $madvTag=$root->createElement("madichvu",$this->madichvu);
        $infoTag->appendChild($makhTag);
        $infoTag->appendChild($hodemTag);
        $infoTag->appendChild($tenTag);
        $infoTag->appendChild($dcTag);
        $infoTag->appendChild($dtTag);
        $infoTag->appendChild($madvTag);
        $rootTag->appendChild($infoTag);
        $root->formatoutput=true;
        $root->save('Khachhang.xml');
    }
   public function Update() {
$root=new DomDocument("1.0");
 $root->load('Khachhang.xml');
$xpath=new DOMXPATH($root); 
$kq=$xpath->query("//qlkh/Khachhang[makhach='$this->makhach']"); 
foreach($kq as $node){
    //Tao node moi
    $rootTag=$root->getElementsByTagName("qlkh")->item(0);
    $infoTag=$root->createElement("Khachhang");
    $makhTag=$root->createElement("makhach",$this->makhach);
    $hodemTag=$root->createElement("hodem",$this->hodem);
    $tenTag=$root->createElement("ten",$this->ten);
    $dcTag=$root->createElement("diachi",$this->diachi);
    $dtTag=$root->createElement("dienthoai",$this->dienthoai);
    $madvTag=$root->createElement("madichvu",$this->madichvu);
    $infoTag->appendChild($makhTag);
    $infoTag->appendChild($hodemTag);
    $infoTag->appendChild($tenTag);
    $infoTag->appendChild($dcTag);
    $infoTag->appendChild($dtTag);
    $infoTag->appendChild($madvTag);

    $rootTag->appendChild($infoTag);
     //thay the node moi vao node cu
     $node->parentNode->replaceChild($infoTag,$node);      
    }
$root->formatoutput=true;
$root->save('Khachhang.xml');
   }

public function Delete() {
 $root=new DomDocument ("1.0");
$root->load('Khachhang.xml');
$xpath=new DOMXPATH($root);
echo $this->makhach;
 $kq=$xpath->query("//qlkh/Khachhang[makhach='$this->makhach']");
 foreach($kq as $node)
 {
$node->parentNode->removeChild($node);
 }
 $root->formatoutput=true;
 $root->save('Khachhang.xml');
 }
}
?>


