<?php
class Duan{
    private $maduan;
    private $tenduan;
    private $diadiem;
    public function __construct($ma,$ten,$diadiem)
    {
        $this->maduan=$ma;
        $this->tenduan=$ten;
        $this->diadiem=$diadiem;
        
    }
    
    public function __destruct() {
        $this->maduan="";
        $this->tenduan="";
        $this->diadiem="";

    }
    public function getMada()
    {
        return $this->maduan;
    }
    public function getTenda()
    {
        return $this->tenduan;
    }
    public function getDiadiem()
    {
        return $this->diadiem;
    }
    
    public function Add() {
        $root=new DomDocument("1.0");
        $root->load('Duan.xml');
        $rootTag=$root->getElementsByTagName("qlda")->item(0);
        $infoTag=$root->createElement("Duan");
        $MadaTag=$root->createElement("Maduan",$this->maduan);
        $TendaTag=$root->createElement("Tenduan",$this->tenduan);
        $DiadiemTag=$root->createElement("Diadiem",$this->diadiem);
       
        $infoTag->appendChild($MadaTag);
        $infoTag->appendChild($TendaTag);
        $infoTag->appendChild($DiadiemTag);
    
        $rootTag->appendChild($infoTag);
        $root->formatoutput=true;
        $root->save('Duan.xml');
    }
   public function Update() {
$root=new DomDocument("1.0");
 $root->load('Duan.xml');
$xpath=new DOMXPATH($root); 
$kq=$xpath->query("//qlda/Duan[Maduan='$this->maduan']"); 
foreach($kq as $node){
    //Tao node moi
    $infoTag=$root->createElement("Duan");
    $MadaTag=$root->createElement("Maduan",$this->maduan);
    $TendaTag=$root->createElement("Tenduan",$this->tenduan);
    $DiadiemTag=$root->createElement("Diadiem",$this->diadiem);
    $infoTag->appendChild($MadaTag);
    $infoTag->appendChild($TendaTag);
    $infoTag->appendChild($DiadiemTag);
     //thay the node moi vao node cu
     $node->parentNode->replaceChild($infoTag,$node);      
    }
$root->formatoutput=true;
$root->save('Duan.xml');
   }

public function Delete() {
 $root=new DomDocument ("1.0");
 $root->load('Duan.xml');
$xpath=new DOMXPATH($root);
echo $this->maduan;
 $kq=$xpath->query("//qlda/Duan[Maduan='$this->maduan']");
 foreach($kq as $node)
 {
$node->parentNode->removeChild($node);
 }
 $root->formatoutput=true;
 $root->save('Duan.xml');
 }
}
?>


