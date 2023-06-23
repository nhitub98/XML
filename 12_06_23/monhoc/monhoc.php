<?php
class monhoc{
    private $id;
    private $tenmon;
    private $tengiangvien;
    private $thoigian;
    public function __construct($id, $ten, $tengv, $thoigian)
    {
        $this->id=$id;
        $this->tenmon=$ten;
        $this->tengiangvien=$tengv;
        $this->thoigian=$thoigian;
    }
    public function __destruct()
    {
        $this->id="";
        $this->tenmon="";
        $this->tengiangvien="";
        $this->thoigian="";
    }
    public function getid()
    {
        return $this->id;
    }
    public function gettenmon()
    {
        return $this->tenmon;
    }
    public function gettengiangvien()
    {
        return $this->tengiangvien;
    }
    public function getthoigian()
    {
        return $this->thoigian;
    }
    public function Add()
    {
        $root=new DomDocument("1.0");
        $root->load('monhoc.xml');
        $rootTag=$root->getElementsByTagName("monhocs")->item(0);
        $infoTag=$root->createElement("monhoc");
        $infoTag->setAttribute("id",$this->id);
        $tenmonTag=$root->createElement("tenmon",$this->tenmon);
        $tengvTag=$root->createElement("tengiangvien",$this->tengiangvien);
        $thoigianTag=$root->createElement("thoigian",$this->thoigian);
        $infoTag->appendChild($tenmonTag);
        $infoTag->appendChild($tengvTag);
        $infoTag->appendChild($thoigianTag);
        $rootTag->appendChild($infoTag);
        $root->formatoutput=true;
        $root->save('monhoc.xml');
    }
    public function Update()
{
$root=new DomDocument("1.0");
$root->load('monhoc.xml');
$xpath=new DOMXPATH($root); 
$kq=$xpath->query("/monhocs/monhoc[@id=$id]"); 
foreach ($kq as $node)
{
//Tao node moi
$infoTag=$root->createElement("monhoc");
$infoTag->setAttribute("id",$this->id);
$TenmonTag=$root->createElement ("tenmon", $this->tenmon);
$TengvTag=$root->createElement("tengiangvien", $this->tengiangvien);
$ThoigianTag=$root->createElement ("thoigian", $this->thoigian);
$infoTag->appendChild($TenmonTag);
$infoTag->appendChild($TengvTag);
$infoTag->appendChild($ThoigianTag);

$node->parentNode->replaceChild ($infoTag, $node); }
$root->formatoutput=true;
$root->save('monhoc.xml');
}
public function Delete() {
$root=new DomDocument ("1.0");
$root->load('monhoc.xml');
$xpath=new DOMXPATH($root);
foreach ($xpath->query("//monhocs/monhoc[@id=$id]") as $node)
{
$node->parentNode->removeChild($node);
}
$root->formatoutput=true;
$root->save('monhoc.xml');
}
}
?>

