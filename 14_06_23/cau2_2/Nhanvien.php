<?php
class Nhanvien{
    private $manv;
    private $tennv;
    private $maduan;
   
    public function __construct($manv,$tennv,$mada)
    {
        $this->manv=$manv;
        $this->tennv=$tennv;
        $this->maduan=$mada;
       
    }
    
    public function __destruct() {
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
        return $this->mada;
    }
  
    public function Add() {
        $root=new DomDocument("1.0");
        $root->load('Nhanvien.xml');
        $rootTag=$root->getElementsByTagName("qlnv")->item(0);
        $infoTag=$root->createElement("Nhanvien");
        $manvTag=$root->createElement("manv",$this->manv);
        $tennvTag=$root->createElement("tennv",$this->tennv);
        $madaTag=$root->createElement("maduan",$this->maduan);
        $infoTag->appendChild($manvTag);
        $infoTag->appendChild($tennvTag);
        $infoTag->appendChild($madaTag);
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
    $manvTag=$root->createElement("manv",$this->manv);
    $tennvTag=$root->createElement("tennv",$this->tennv);
    $madaTag=$root->createElement("maduan",$this->maduan);
    $infoTag->appendChild($manvTag);
    $infoTag->appendChild($tennvTag);
    $infoTag->appendChild($madaTag);
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


