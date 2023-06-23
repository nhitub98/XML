<?php
class nhasx
{
    private $Mansx;
    private $Tennsx;
    private $Diachi;
    private $DT;
    public function __construct($Mansx, $Tennsx, $Diachi, $DT)
    {
        $this->Mansx="$Mansx";
        $this->Tennsx="$Tennsx";
        $this->Diachi="$Diachi";
        $this->DT="$DT";
    }
    public function __destruct()
    {
        $this->Mansx="";
        $this->Tennsx="";
        $this->Diachi="";
        $this->DT="";
    }
    public function add()
    {
        $root=new DomDocument("1.0");
        $root->load('nhasx.xml');
        $rootTag=$root->getElementsByTagName("qlsx")->item(0);
        $nsx=$root->createElement("NSX");
        $mansx=$root->createElement("mansx", $this->Mansx);
        $tennsx=$root->createElement("tennsx", $this->Tennsx);
        $diachi=$root->createElement("diachi", $this->Diachi);
        $dt=$root->createElement("dt", $this->DT);
        $rootTag->appendChild($nsx);
        $nsx->appendChild($mansx);
        $nsx->appendChild($tennsx);
        $nsx->appendChild($diachi);
        $nsx->appendChild($dt);
        $root->formatoutput=true;
        $root->save('nhasx.xml');
    }
    public function update()
    {
        $root=new DomDocument("1.0");
        $root->load('nhasx.xml');
        $xpath=new DOMXPATH($root);
        $kq=$xpath->query("/qlsx/NSX[mansx='$this->Mansx']");
        foreach($kq as $node)
        {
        $nsx=$root->createElement("NSX");
        $mansx=$root->createElement("mansx", $this->Mansx);
        $tennsx=$root->createElement("tennsx", $this->Tennsx);
        $diachi=$root->createElement("diachi", $this->Diachi);
        $dt=$root->createElement("dt", $this->DT);
        
        $nsx->appendChild($mansx);
        $nsx->appendChild($tennsx);
        $nsx->appendChild($diachi);
        $nsx->appendChild($dt);
        $node->parentNode->replaceChild($nsx, $node);
        }
        $root->formatoutput=true;
        $root->save('nhasx.xml');
    }
    public function delete()
    {
        $root=new DomDocument("1.0");
        $root->load('nhasx.xml');
        $xpath=new DOMXPATH($root);
        foreach($xpath->query("//NSX[mansx='$this->Mansx']") as $node)
        {
            $node->parentNode->removeChild($node);
        }
        $root->formatoutput=true;
        $root->save('nhasx.xml');
    }
    public function view()
    {
        $xml=new SimpleXMLElement("nhasx.xml",null,true);
        echo "<table border='1' cellspacing='0' cellpadding='10'>";
        echo "<tr>";
        echo "<th>Ma nsx</th>";
        echo "<th>Ten nsx</th>";  
        echo "<th>Dia chi</th>";
        echo "<th>Dien thoai</th>";   
        echo "</tr>";
    foreach($xml as $mh)
    {
        echo "<tr>";
        echo "<td>{$mh->mansx}</td>";
        echo "<td>{$mh->tennsx}</td>";
        echo "<td>{$mh->diachi}</td>";
        echo "<td>{$mh->dt}</td>";
        echo "</tr>";
    }
    echo "</table>"; 
    }

}
?>