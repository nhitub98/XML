<?php
class xe
{
    private $Maxe;
    private $Ngayxuatxuong;
    private $Mansx;
    private $Tenxe;
    private $Gia;
    public function __construct($Maxe, $Ngayxuatxuong, $Mansx, $Tenxe,$Gia)
    {
        $this->Maxe="$Maxe";
        $this->Ngayxuatxuong="$Ngayxuatxuong";
        $this->Mansx="$Mansx";
        $this->Tenxe="$Tenxe";
        $this->Gia="$Gia";
        
    }
    public function __destruct()
    {
        $this->Maxe="";
        $this->Ngayxuatxuong="";
        $this->Mansx="";
        $this->Tenxe="";
        $this->Gia="";
    }
    public function add()
    {
        $root=new DomDocument("1.0");
        $root->load('xe.xml');
        $rootTag=$root->getElementsByTagName("qlx")->item(0);
        $Xe=$root->createElement("xe");
        $maxe=$root->createElement("maxe", $this->Maxe);
        $ngayxuatxuong=$root->createElement("ngayxuatxuong", $this->Ngayxuatxuong);
        $mansx=$root->createElement("mansx", $this->Mansx);
        $tenxe=$root->createElement("tenxe", $this->Tenxe);
        $gia=$root->createElement("gia", $this->Gia);
        
        $rootTag->appendChild($Xe);
        $Xe->appendChild($maxe);
        $Xe->appendChild($ngayxuatxuong);
        $Xe->appendChild($mansx);
        $Xe->appendChild($tenxe);
        $Xe->appendChild($gia);
        $root->formatoutput=true;
        $root->save('xe.xml');
    }
    public function update()
    {
        $root=new DomDocument("1.0");
        $root->load('xe.xml');
        $xpath=new DOMXPATH($root);
        $kq=$xpath->query("/qlx/xe[maxe='$this->Maxe']");
        foreach($kq as $node)
        {
            $Xe=$root->createElement("xe");
            $maxe=$root->createElement("maxe", $this->Maxe);
            $ngayxuatxuong=$root->createElement("ngayxuatxuong", $this->Ngayxuatxuong);
            $mansx=$root->createElement("mansx", $this->Mansx);
            $tenxe=$root->createElement("tenxe", $this->Tenxe);
            $gia=$root->createElement("gia", $this->Gia);

            $Xe->appendChild($maxe);
            $Xe->appendChild($ngayxuatxuong);
            $Xe->appendChild($mansx);
            $Xe->appendChild($tenxe);
            $Xe->appendChild($gia);
        $node->parentNode->replaceChild($Xe, $node);
        }
        $root->formatoutput=true;
        $root->save('xe.xml');
    }
    public function delete()
    {
        $root=new DomDocument("1.0");
        $root->load('xe.xml');
        $xpath=new DOMXPATH($root);
        foreach($xpath->query("//xe[maxe='$this->Maxe']") as $node)
        {
            $node->parentNode->removeChild($node);
        }
        $root->formatoutput=true;
        $root->save('xe.xml');
    }
    public function view()
    {
        $xml=new SimpleXMLElement("xe.xml",null,true);
        echo "<table border='1' cellspacing='0' cellpadding='10'>";
        echo "<tr>";
        echo "<th>Ma xe</th>";
        echo "<th>Ngay xuat xuong</th>";  
        echo "<th>Ma nsx</th>";
        echo "<th>Ten xe</th>";   
        echo "<th>Gia</th>";
        echo "</tr>";
    foreach($xml as $mh)
    {
        echo "<tr>";
        echo "<td>{$mh->maxe}</td>";
        echo "<td>{$mh->ngayxuatxuong}</td>";
        echo "<td>{$mh->mansx}</td>";
        echo "<td>{$mh->tenxe}</td>";
        echo "<td>{$mh->gia}</td>";
        echo "</tr>";
    }
    echo "</table>"; 
    }

}
?>