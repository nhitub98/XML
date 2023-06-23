<html> 
<body>

<form method="POST" action="khachhang.php">
    Ma khach hang <input type="text" name="ID"></br>
    Ten khach hang <input type="text" name="Tenkh"></br>
    Tuoi <input type="text" name="Tuoi"></br>
    Dien thoai <input type="text" name="Dienthoai"></br>

<input type="submit" name="Add" value="Them">
<input type="submit" name="Update" value="Sua">
<input type="submit" name="Delete" value="Xoa">
<input type="submit" name="Xem" value="Xem thong tin">
<input type="submit" name="Search" value="Tim khach hang co tuoi <=20"> 
</form>

<?php

    $xml=new SimpleXMLElement("khachhang.xml",null,true);

    if(isset($_POST['Xem'])){

    echo "<table border='1' cellspacing='0' cellpadding='10'>";

    echo "<tr>";
    echo "<td>Ma khach hang</td>";
    echo "<td>Ho ten</td>"; 
    echo "<td>Tuoi</td>"; 
    echo "<td>Dien thoai</td>"; 
    echo "</tr>";

    foreach($xml as $sv){

    echo "<tr>";
    echo "<td>{$sv['id']}</td>";
    echo "<td>{$sv->name}</td>";
    echo "<td>{$sv->age}</td>";
    echo "<td>{$sv->phone}</td>";
    echo "</tr>";}echo "</table>"; }//code cho nút thêm

    if(isset($_POST['Add']))
    {

    $root=new DomDocument("1.0");

    $root->load('khachhang.xml');

    $id=$_POST['ID']; $tenkh=$_POST['Tenkh']; $tuoi=$_POST['Tuoi']; $phone=$_POST['Dienthoai'];

    $rootTag=$root->getElementsByTagName("listcustomers")->item(0);

    $infoTag=$root->createElement("customer");$infoTag->setAttribute("id",$id);

    $tenkhTag=$root->createElement("name",$tenkh);$tuoiTag=$root->createElement("age",$tuoi);

    $DienthoaiTag=$root->createElement("phone",$phone);

    $infoTag->appendChild($tenkhTag);$infoTag->appendChild($tuoiTag);

    $infoTag->appendChild($DienthoaiTag);$rootTag->appendChild($infoTag); //Tạo nút cho cây

    $root->save('khachhang.xml'); //lưu dữ liệu
    }

    //Nút sửa

    if(isset($_POST['Update']))
    {
    $root=new DomDocument("1.0"); $root->load('khachhang.xml'); $id=$_POST['ID']; $tenkh=$_POST['Tenkh'];
    $tuoi=$_POST['Tuoi']; $phone=$_POST['Dienthoai'];//tim den node goc
    $xpath=new DOMXPATH($root);
    foreach($xpath->query("/listcustomers/customer[@id=$id]")as $node)
    {
    //Tao node moi
    $infoTag=$root->createElement("customer");
    $infoTag->setAttribute("id",$id);
    $tenkhTag=$root->createElement("name",$tenkh);
    $tuoiTag=$root->createElement("age",$tuoi);
    $DienthoaiTag=$root->createElement("phone",$phone);
    $infoTag->appendChild($tenkhTag);$infoTag->appendChild($tuoiTag);
    $infoTag->appendChild($DienthoaiTag);
    //thay the node moi vao node cu 
    $node->parentNode->replaceChild($infoTag,$node);
    }
    $root->save('khachhang.xml');
    } //Nut xoa

    if(isset($_POST['Delete']))
    {
    $root=new DomDocument("1.0"); $root->load('khachhang.xml'); 
    $id=$_POST['ID'];
    $xpath=new DOMXPATH($root);
    foreach($xpath->query("/listcustomers/customer[@id=$id]")as $node)
    {
    $node->parentNode->removeChild($node);
    }
    $root->formatoutput=true;$root->save('khachhang.xml');
    }//Nut tim kiem

    if(isset($_POST['Search']))
        {
            echo "<table border='1' cellspacing='0' cellpadding='10'>";
            echo "<tr>"; 
            echo "<td>Ma khach hang</td>"; 
            echo "<td>Ho ten</td>";
            echo "<td>Tuoi</td>"; 
            echo "<td>Dien thoai</td>";
            echo "</tr>";

            $result = $xml->xpath('/listcustomers/customer[age<=20]'); //điều kiện tìm kiếm

            foreach($xml as $sv){ 
                if($sv->age<20){
                    echo "<tr>";
                    echo "<td>{$sv['id']}</td>";
                    echo "<td>{$sv->name}</td>";
                    echo "<td>{$sv->age}</td>";
                    echo "<td>{$sv->phone}</td>";
                    echo "</tr>";
                }
                    echo "</table>";   
            }
        }
?></body></html>