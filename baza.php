<?php header('Content-Type: text/html;charset=UTF-8');
$select = "select *";
$skad = "from produkty where";
$kategoria = $_POST["kat"];
$cena = $_POST["cena"];
$cena1 = $_POST["cena1"];
$co = $_POST["1"];
if ($co === ""){
ob_start();
echo $select,' ', $skad,' ', 'kategoria like ', $kategoria, ' and',' cena ', $cena,' ', $cena1;
$all = ob_get_contents();
ob_end_clean();
}elseif ($kategoria === "" && $co === "") {
ob_start();
echo $select,' ', $skad,' ', $cena,' ', $cena1;
$all = ob_get_contents();
ob_end_clean();
}elseif ($kategoria === "") {
	ob_start();
echo $select,' ', $skad,' cena ', $cena,' ', $cena1, ' and ', 'nazwa like ',$co;
$all = ob_get_contents();
ob_end_clean();
}
else{
	ob_start();
 echo $select,' ', $skad, ' ','kategoria like ',$kategoria , ' and cena ',$cena, ' ', $cena1,' and ', 'nazwa like ', $co;
$all = ob_get_contents();
ob_end_clean();
};
echo $all;

	$conn = mysqli_connect('localhost', 'root', '');
    $datab = mysqli_select_db($conn ,'alegro');
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
