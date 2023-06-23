<?php
class Nhanvien{
    private $manv;
    private $tennv;
    private $maphong;
   
    public function __construct($manv,$tennv,$maphong)
    {
        $this->manv=$manv;
        $this->tennv=$tennv;
        $this->maphong=$maphong;
       
    }
    
    public function __destruct() {
        $this->manv="";
        $this->tennv="";
        $this->maphong="";
        
    }
    public function getManv()
    {
        return $this->manv;
    }
    public function getTennv()
    {
        return $this->tennv;
    }
    public function getMaphong()
    {
        return $this->maphong;
    }
  
    public function Add() {
        $root=new DomDocument("1.0");
        $root->load('Nhanvien.xml');
        $rootTag=$root->getElementsByTagName("qlnv")->item(0);
        $infoTag=$root->createElement("Nhanvien");
        $ManvTag=$root->createElement("manv",$this->manv);
        $TennvTag=$root->createElement("tennv",$this->tennv);
        $MaphongTag=$root->createElement("maphong",$this->maphong);
        $infoTag->appendChild($ManvTag);
        $infoTag->appendChild($TennvTag);
        $infoTag->appendChild($MaphongTag);
        $rootTag->appendChild($infoTag);
        $root->formatoutput=true;
        $root->save('Nhanvien.xml');
    }
   public function Update() {
$root=new DomDocument("1.0");
 $root->load('Nhanvien.xml');
$xpath=new DOMXPATH($root); 
$kq=$xpath->query("//qlnv/Nhanvien[manv='$this->manv']"); 
foreach($kq as $node){
    //Tao node moi
    $rootTag=$root->getElementsByTagName("qlnv")->item(0);
    $infoTag=$root->createElement("Nhanvien");
    $ManvTag=$root->createElement("manv",$this->manv);
    $TennvTag=$root->createElement("tennv",$this->tennv);
    $MaphongTag=$root->createElement("maphong",$this->maphong);
    $infoTag->appendChild($ManvTag);
    $infoTag->appendChild($TennvTag);
    $infoTag->appendChild($MaphongTag);
    $rootTag->appendChild($infoTag);
     //thay the node moi vao node cu
     $node->parentNode->replaceChild($infoTag,$node);      
    }
$root->formatoutput=true;
$root->save('Nhanvien.xml');
   }

public function Delete() {
 $root=new DomDocument ("1.0");
$root->load('Nhanvien.xml');
$xpath=new DOMXPATH($root);
echo $this->manv;
 $kq=$xpath->query("//qlnv/Nhanvien[manv='$this->manv']");
 foreach($kq as $node)
 {
$node->parentNode->removeChild($node);
 }
 $root->formatoutput=true;
 $root->save('Nhanvien.xml');
 }
}
?>


