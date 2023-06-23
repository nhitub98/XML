<?php
class Xe{
    private $maxe;
    private $ngayxuatxuong;
    private $mansx;
    private $tenxe;
    private $gia;
    public function __construct($maxe,$ngayxuatxuong,$mansx,$tenxe,$gia)
    {
        $this->maxe=$maxe;
        $this->ngayxuatxuong=$ngayxuatxuong;
        $this->mansx=$mansx;
        $this->tenxe=$tenxe;
        $this->gia=$gia;
    }
    
    public function __destruct() {
        $this->maxe="";
        $this->ngayxuatxuong="";
        $this->mansx="";
        $this->gia=0;
    }
    public function getMaxe()
    {
        return $this->maxe;
    }
    public function getNgayxuatxuong()
    {
        return $this->ngayxuatxuong;
    }
    public function getMansx()
    {
        return $this->mansx;
    }
    public function getTenxe()
    {
        return $this->tenxe;
    }
    public function getGia()
    {
        return $this->gia;
    }
    public function Add() {
        $root=new DomDocument("1.0");
        $root->load('Xe.xml');
        $rootTag=$root->getElementsByTagName("qlx")->item(0);
        $infoTag=$root->createElement("Xe");
        $MaxeTag=$root->createElement("Maxe",$this->maxe);
        $NgayxuatxuongTag=$root->createElement("Ngayxuatxuong",$this->ngayxuatxuong);
        $ManhasxTag=$root->createElement("Manhasx",$this->mansx);
        $TenxeTag=$root->createElement("Tenxe",$this->tenxe);
        $DongiaTag=$root->createElement("Gia",$this->gia);
        $infoTag->appendChild($MaxeTag);
        $infoTag->appendChild($NgayxuatxuongTag);
        $infoTag->appendChild($ManhasxTag);
        $infoTag->appendChild($TenxeTag);
        $infoTag->appendChild($DongiaTag);
        $rootTag->appendChild($infoTag);
        $root->formatoutput=true;
        $root->save('Xe.xml');
    }
   public function Update() {
$root=new DomDocument("1.0");
$root->load('Xe.xml');
$xpath=new DOMXPATH($root); 
$kq=$xpath->query("//qlx/Xe[Maxe='$this->maxe']"); 
foreach($kq as $node){
    //Tao node moi
        $infoTag=$root->createElement("Xe");
        $MaxeTag=$root->createElement("Maxe",$this->maxe);
        $NgayxuatxuongTag=$root->createElement("Ngayxuatxuong",$this->ngayxuatxuong);
        $ManhasxTag=$root->createElement("Manhasx",$this->mansx);
        $TenxeTag=$root->createElement("Tenxe",$this->tenxe);
        $DongiaTag=$root->createElement("Gia",$this->dongia);
        $infoTag->appendChild($MaxeTag);
        $infoTag->appendChild($NgayxuatxuongTag);
        $infoTag->appendChild($ManhasxTag);
        $infoTag->appendChild($TenxeTag);
        $infoTag->appendChild($DongiaTag);
     //thay the node moi vao node cu
     $node->parentNode->replaceChild($infoTag,$node);      
    }
$root->formatoutput=true;
$root->save('Xe.xml');
   }

public function Delete() {
 $root=new DomDocument ("1.0");
 $root->load('Xe.xml');
$xpath=new DOMXPATH($root);
echo $this->maxe;
 $kq=$xpath->query("//qlx/Xe[Maxe='$this->maxe']");
 foreach($kq as $node)
 {
$node->parentNode->removeChild($node);
 }
 $root->formatoutput=true;
 $root->save('Xe.xml');
 }
}
?>


