<?php
class Duan{
    private $Maduan;
    private $Tenduan;
    private $Diadiem;
    public function __construct($Mada, $Tenda,$Diadiem)
    {
        $this->Maduan=$Mada;
        $this->Tenduan=$Tenda;
        $this->Diadiem=$Diadiem;
        
    }
    public function __destruct()
    {
        $this->Maduan="";
        $this->Tenduan="";
        $this->Diadiem="";
    }
    public function getMada()
    {
        return $this->Maduan;
    }
    public function getTenda()
    {
        return $this->Tenduan;
    }
    public function getDiadiem()
    {
        return $this->Diadiem;
    }
    public function Add()
    {
        $root=new DomDocument("1.0");
        $root->load('Duan.xml');
        $rootTag=$root->getElementsByTagName("qlda")->item(0);
        $infoTag=$root->createElement("Duan");
        $MadaTag=$root->createElement("Maduan",$this->Maduan);
        $TendaTag=$root->createElement("Tenduan",$this->Tenduan);
        $DiadiemTag=$root->createElement("Diadiem",$this->Diadiem);
        $infoTag->appendChild($MadaTag);
        $infoTag->appendChild( $TendaTag);
        $infoTag->appendChild( $DiadiemTag);
        $rootTag->appendChild($infoTag);
        $root->formatoutput=true;
        $root->save('Duan.xml');
    }
    public function Update()
{
$root=new DomDocument("1.0");
$root->load('Duan.xml');
$xpath=new DOMXPATH($root); 
$kq=$xpath->query("/qlda/Duan[Maduan='$this->Maduan']"); 
foreach ($kq as $node)
{
//Tao node moi
$infoTag=$root->createElement("Duan");
$MadaTag=$root->createElement("Maduan",$this->Maduan);
$TendaTag=$root->createElement("Tenduan",$this->Tenduan);
$DiadiemTag=$root->createElement("Diadiem",$this->Diadiem);
$infoTag->appendChild($MadaTag);
$infoTag->appendChild( $TendaTag);
$infoTag->appendChild( $DiadiemTag);

$node->parentNode->replaceChild ($infoTag, $node); }
$root->formatoutput=true;
$root->save('Duan.xml');
}
public function Delete() {
$root=new DomDocument ("1.0");
$root->load('Duan.xml');
$xpath=new DOMXPATH($root);
foreach ($xpath->query("/qlda/Duan[Maduan='$this->Maduan']") as $node)
{
$node->parentNode->removeChild($node);
}
$root->formatoutput=true;
$root->save('Duan.xml');
}
}
?>

