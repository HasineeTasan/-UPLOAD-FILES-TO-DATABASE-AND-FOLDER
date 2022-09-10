<?php
require_once("db.php");

?>
<form name="haber" action="#" method="post" enctype="multipart/form-data">

<table cellpadding="8" cellspacing="0" border="3
" width="410" style="font-family:Tahoma; font-size:14px; border:solid; border-color:#999999; border-width:1px;">
	<tr>
		<td>Haber Başlığı</td><td><input type="text" name="baslik"></td>
	</tr>

	<tr>
	<td>Haber Detayı</td><td><textarea name="detay"></textarea> </td>
	</tr>

	<tr>
	<td>Haberin Resmi</td><td><input type="file" name="hresim"></td>
	</tr>
	
	<tr>
		<td colspan="2"><input type="submit" name="kaydet" value="Kaydet"></td>
	</tr>
</table>
</form>
<?php
if (isset($_REQUEST['kaydet'])){
	$baslik=$_REQUEST['baslik'];
$detay=$_REQUEST['detay'];
$dosya_adi=$_FILES['hresim']['name'];
//isimlendirme
$d=explode(".",$dosya_adi);
$dyeniad=rand(1,1000).date("Y").$d[0].".".end($d);
$dadi="resimler/".$dyeniad;
//isimlendirme bitiyor
$dosya_gecici_adi=$_FILES['hresim']['tmp_name'];
echo "$baslik, $detay,$dosya_adi"."<br>";
$sorgu= "insert into haber (baslik,detay,resim)values('$baslik','$detay','$dadi')";
$sorgucalistir=$baglanti->query($sorgu);
if($sorgucalistir){
	$yukle=move_uploaded_file($dosya_gecici_adi,$dadi);
	if($yukle) echo "Kayıt Başarılı";
	else echo "kayıt başarısız.";
}
/*
foreach ($_FILES as $f => $g) 
{
	foreach ($g as $h => $p) 
	{
	echo $h."--->".$p."<br>";
	}
}
}*/
}
?>