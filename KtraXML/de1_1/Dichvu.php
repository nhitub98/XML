<?php
class Dichvu{
    private $Madichvu;
    private $Tendichvu;
    private $Gia;
    public function __construct($Madv, $Tendv,$Gia)
    {
        $this->Madichvu=$Madv;
        $this->Tendichvu=$Tendv;
        $this->Gia=$Gia;
        
    }
    public function __destruct()
    {
        $this->Maddichvu="";
        $this->Tendichvu="";
        $this->Gia="";
    }
    public function getMadv()
    {
        return $this->Madichvu;
    }
    public function getTendv()
    {
        return $this->Tendichvu;
    }
    public function getGia()
    {
        return $this->Gia;
    }
    public function Add()
    {
        $root=new DomDocument("1.0");
        $root->load('Dichvu.xml');
        $rootTag=$root->getElementsByTagName("qldv")->item(0);
        $infoTag=$root->createElement("Dichvu");
        $MadvTag=$root->createElement("Madichvu",$this->Madichvu);
        $TendvTag=$root->createElement("Tendichvu",$this->Tendichvu);
        $GiaTag=$root->createElement("Gia",$this->Gia);
        $infoTag->appendChild($MadvTag);
        $infoTag->appendChild( $TendvTag);
        $infoTag->appendChild( $GiaTag);
        $rootTag->appendChild($infoTag);
        $root->formatoutput=true;
        $root->save('Dichvu.xml');
    }
    public function Update()
{
$root=new DomDocument("1.0");
$root->load('Dichvu.xml');
$xpath=new DOMXPATH($root); 
$kq=$xpath->query("/qldv/Dichvu[Madichvu='$this->Madichvu']"); 
foreach ($kq as $node)
{
//Tao node moi
$infoTag=$root->createElement("Dichvu");
$MadvTag=$root->createElement("Madichvu",$this->Madichvu);
$TendvTag=$root->createElement("Tendichvu",$this->Tendichvu);
$GiaTag=$root->createElement("Gia",$this->Gia);
$infoTag->appendChild($MadvTag);
$infoTag->appendChild( $TendvTag);
$infoTag->appendChild( $GiaTag);

$node->parentNode->replaceChild ($infoTag, $node); }
$root->formatoutput=true;
$root->save('Dichvu.xml');
}
public function Delete() {
$root=new DomDocument ("1.0");
$root->load('Dichvu.xml');
$xpath=new DOMXPATH($root);
foreach ($xpath->query("/qldv/Dichvu[Madichvu='$this->Madichvu']") as $node)
{
$node->parentNode->removeChild($node);
}
$root->formatoutput=true;
$root->save('Dichvu.xml');
}
}
?>

