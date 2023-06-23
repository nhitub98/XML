<?php
class phong
{
    private $Maphong;
    private $Tenphong;
    public function __construct($Maphong, $Tenphong)
    {
        $this->Maphong="$Maphong";
        $this->Tenphong="$Tenphong";
    }
    public function __destruct()
    {
        $this->Maphong="";
        $this->Tenphong="";
    }
    public function add()
    {
        $root=new DomDocument("1.0");
        $root->load('Phongban.xml');
        $rootTag=$root->getElementsByTagName("Phongs")->item(0);
        $phong=$root->createElement("Phong");
        $maphong=$root->createElement("Maphong", $this->Maphong);
        $tenphong=$root->createElement("Tenphong", $this->Tenphong);
        $rootTag->appendChild($phong);
        $phong->appendChild($maphong);
        $phong->appendChild($tenphong);
        $root->formatoutput=true;
        $root->save('Phongban.xml');
    }
    public function update()
    {
        $root=new DomDocument("1.0");
        $root->load('Phongban.xml');
        $xpath=new DOMXPATH($root);
        $kq=$xpath->query("/Phongs/Phong[Maphong='$this->Maphong']");
        foreach($kq as $node)
        {
            $phong=$root->createElement("Phong");
            $maphong=$root->createElement("Maphong", $this->Maphong);
            $tenphong=$root->createElement("Tenphong", $this->Tenphong);
            $phong->appendChild($maphong);
            $phong->appendChild($tenphong);
            $node->parentNode->replaceChild($phong, $node);
        }
        $root->formatoutput=true;
        $root->save('Phongban.xml');
    }
    public function delete()
    {
        $root=new DomDocument("1.0");
        $root->load('Phongban.xml');
        $xpath=new DOMXPATH($root);
        foreach($xpath->query("//Phong[Maphong='$this->Maphong']") as $node)
        {
            $node->parentNode->removeChild($node);
        }
        $root->formatoutput=true;
        $root->save('Phongban.xml');
    }
    public function view()
    {
        $xml=new SimpleXMLElement("Phongban.xml",null,true);
        echo "<table border='1' cellspacing='0' cellpadding='10'>";
        echo "<tr>";
        echo "<th>Ma phong</th>";
        echo "<th>Ten phong</th>";     
        echo "</tr>";
    foreach($xml as $mh)
    {
        echo "<tr>";
        echo "<td>{$mh->Maphong}</td>";
        echo "<td>{$mh->Tenphong}</td>";
        echo "</tr>";
    }
    echo "</table>"; 
    }

}
?>