<?php
$host='sql104.epizy.com';
$user='epiz_21941247';
$pass='adeknabila';
$database='epiz_21941247_dbstbi';

$conn=mysqli_connect($host,$user,$pass);
mysqli_select_db($conn, $database);
//hitung index
mysqli_query($conn, "TRUNCATE TABLE tbindex");
$selectdocument = "SELECT `token`,`nama_file`,count(*) FROM `dokumen` group by `nama_file`,token";
$mysqlselect = mysqli_query($conn, $selectdocument);
$resn = mysqli_query($conn, "INSERT INTO `tbindex`(`Term`, `DocId`, `Count`) ".$selectdocument);
	$n = mysqli_num_rows($mysqlselect);
	

//berapa jumlah DocId total?, n
	$resn = mysqli_query($conn, "SELECT DISTINCT DocId FROM tbindex");
	$n = mysqli_num_rows($resn);
	
	//ambil setiap record dalam tabel tbindex
	//hitung bobot untuk setiap Term dalam setiap DocId
	$resBobot = mysqli_query($conn, "SELECT * FROM tbindex ORDER BY Id");
	$num_rows = mysqli_num_rows($resBobot);
	print("Terdapat " . $num_rows . " Term yang diberikan bobot. <br />");

	while($rowbobot = mysqli_fetch_array($resBobot)) {
		//$w = tf * log (n/N)
		$term = $rowbobot['Term'];		
		$tf = $rowbobot['Count'];
		$id = $rowbobot['Id'];
		
		//berapa jumlah dokumen yang mengandung term tersebut?, N
		$resNTerm = mysqli_query($conn, "SELECT Count(*) as N FROM tbindex WHERE Term = '$term'");
		$rowNTerm = mysqli_fetch_array($resNTerm);
		$NTerm = $rowNTerm['N'];
		
		$w = $tf * log($n/$NTerm);
		
		//update bobot dari term tersebut
		echo $term." ".$tf." ".$id." ".$NTerm." ".$w."<br>";
		$resUpdateBobot = mysqli_query($conn, "UPDATE tbindex SET Bobot = $w WHERE Id = $id");		
  	} //end while $rowbobot


?>