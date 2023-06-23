<?php
class nhanvien
{
    private $manv;
    private $tennv;
    private $maphong;
    public function __construct($manv, $tennv, $maphong)
    {
        $this->manv="$manv";
        $this->tennv="$tennv";
        $this->maphong="$maphong";
    }
    public function __destruct()
    {
        $this->manv="";
        $this->tennv="";
        $this->maphong="";
    }
    public function add()
    {
        $root=new DomDocument("1.0");
        $root->load('nhanvien.xml');
        $rootTag=$root->getElementsByTagName("NVS")->item(0);
        $inforTag=$root->createElement("NV");
        $manvTag=$root->createElement("MaNV", $this->manv);
        $tennvTag=$root->createElement("TenNV", $this->tennv);
        $maphongTag=$root->createElement("Maphong", $this->maphong);
        $rootTag->appendChild($inforTag);
        $inforTag->appendChild($manvTag);
        $inforTag->appendChild($tennvTag);
        $inforTag->appendChild($maphongTag);
        $root->formatoutput=true;
        $root->save('nhanvien.xml');
    }
    public function update()
    {
        $root=new DomDocument("1.0");
        $root->load('nhanvien.xml');
        $xpath=new DOMXPATH($root);
        $kq=$xpath->query("/NVS/NV[MaNV='$this->manv']");
        foreach($kq as $node)
        {
            $inforTag=$root->createElement("NV");
            $manvTag=$root->createElement("MaNV", $this->manv);
            $tennvTag=$root->createElement("TenNV", $this->tennv);
            $maphongTag=$root->createElement("Maphong", $this->maphong);
            $inforTag->appendChild($manvTag);
            $inforTag->appendChild($tennvTag);
            $inforTag->appendChild($maphongTag);
            $node->parentNode->replaceChild($inforTag, $node);
        }
        $root->formatoutput=true;
        $root->save('nhanvien.xml');

    }
    public function delete()
    {
        $root=new DomDocument("1.0");
        $root->load('nhanvien.xml');
        $xpath=new DOMXPATH($root);
        foreach($xpath->query("//NV[MaNV='$this->manv']") as $node)
        {
            $node->parentNode->removeChild($node);
        }
        $root->formatoutput=true;
        $root->save('nhanvien.xml');
    }
    public function view()
    {
        $xml=new SimpleXMLElement("nhanvien.xml",null,true);
        echo "<table border='1' cellspacing='0' cellpadding='10'>";
        echo "<tr>";
        echo "<td>Ma nhan vien</td>";
        echo "<td>Ten nhan vien</td>";     
        echo "<td>Ma phong</td>";
        echo "</tr>";
    foreach($xml as $mh)
    {
        echo "<tr>";
        echo "<td>{$mh->MaNV}</td>";
        echo "<td>{$mh->TenNV}</td>";
        echo "<td>{$mh->Maphong}</td>";
        echo "</tr>";
    }
    echo "</table>"; 
    }
}
?>