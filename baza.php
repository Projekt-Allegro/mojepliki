<?php header('Content-Type: text/html;charset=UTF-8');

$conn = mysqli_connect('localhost', 'root', '');
$datab = mysqli_select_db($conn ,'alegro');

$select = "select *";
$skad = "from produkty ";
$gdzie = "where";
$kategoria = $_POST["kat"];
$cena = $_POST["cena"];
$cena1 = $_POST["cena1"];
$co = $_POST["1"];

$co = "'".mysqli_real_escape_string($conn, stripslashes($co))."'";
$array = array($co);
$values = implode(", ", $array);

if ($kategoria === "" && $co === "" && $cena1 === "") {
ob_start();
echo $select,' ', $skad;
$all = ob_get_contents();
ob_end_clean();
}elseif ($kategoria === "" && $co === "") {
ob_start();
echo $select,' ', $skad, $gdzie,' ', $cena,' ', $cena1;
$all = ob_get_contents();
ob_end_clean();
}elseif ($co === "" && $cena1 === ""){
ob_start();
echo $select,' ', $skad,$gdzie,' ', 'kategoria like ', $kategoria;
$all = ob_get_contents();
ob_end_clean();
}elseif ($kategoria === "" && $cena1 === "") {
ob_start();
echo $select,' ', $skad, $gdzie,' ','nazwa like ',"$co";
$all = ob_get_contents();
ob_end_clean();
}elseif ($co === ""){
ob_start();
echo $select,' ', $skad,$gdzie,' ', 'kategoria like ', $kategoria, ' and',' cena ', $cena,' ', $cena1;
$all = ob_get_contents();
ob_end_clean();
}elseif ($kategoria === "") {
	ob_start();
echo $select,' ', $skad,$gdzie,' cena ', $cena,' ', $cena1, ' and ', 'nazwa like ',"$co";
$all = ob_get_contents();
ob_end_clean();
}elseif ($cena1 === ""){
ob_start();
 echo $select,' ', $skad,$gdzie, ' ','kategoria like ',$kategoria ,' and ', 'nazwa like ', "$co";
$all = ob_get_contents();
ob_end_clean();
}
else{
	ob_start();
 echo $select,' ', $skad,$gdzie, ' ','kategoria like ',$kategoria , ' and cena ',$cena, ' ', $cena1,' and ', 'nazwa like ', "$co";
$all = ob_get_contents();
ob_end_clean();
};
echo $all;



	
    $query2 = mysqli_query($conn, $all);
    $times = mysqli_num_rows($query2);

        for ($i=0; $i < $times; $i++) { 
	$forrow = mysqli_fetch_row($query2);
	echo '</br>';
	foreach ($forrow as $key) {
	echo ' ', $key;
}
}

?>
