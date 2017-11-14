<?php header('Content-Type: text/html;charset=UTF-8');

$conn = mysqli_connect('localhost', 'root', ''); //łączy z bazą
$datab = mysqli_select_db($conn ,'komis'); // wybiera baze

$select = "select *";
$skad = "from auto ";
$gdzie = "where";
$kolor = $_POST["kat"];
$cena = $_POST["cena"];
$przebieg = $_POST["przebieg"];
$co = $_POST["1"];

$co = "'".mysqli_real_escape_string($conn, stripslashes($co))."'"; 	// dodaje automatycznie quoty do nazwy
$array = array($co);
$values = implode(", ", $array);

if ($kolor === "" && $co === "" && $przebieg === "") { 		// zasady działania dla pustych pól
ob_start(); 												// zapisuje echo do stringa
echo $select,' ', $skad;
$all = ob_get_contents();
ob_end_clean();

}elseif ($kolor === "" && $co === "") {
ob_start();
echo $select,' ', $skad, $gdzie,' ', $cena;
$all = ob_get_contents();
ob_end_clean();

}elseif ($co === "" && $przebieg === ""){
ob_start();
echo $select,' ', $skad,$gdzie,' ', 'kolor like ', $kolor;
$all = ob_get_contents();
ob_end_clean();

}elseif ($kolor === "" && $przebieg === "") {
ob_start();
echo $select,' ', $skad, $gdzie,' ','marka like ',"$co";
$all = ob_get_contents();
ob_end_clean();

}elseif ($co === ""){
ob_start();
echo $select,' ', $skad,$gdzie,' ', 'kolor like ', $kolor, ' and ', $cena;
$all = ob_get_contents();
ob_end_clean();

}elseif ($kolor === "") {
	ob_start();
echo $select,' ', $skad,$gdzie,$cena,' and ', $przebieg, ' and ', 'marka like ',"$co";
$all = ob_get_contents();
ob_end_clean();

}elseif ($przebieg === ""){
ob_start();
 echo $select,' ', $skad,$gdzie, ' ','kolor like ',$kolor ,' and ', 'marka like ', "$co";
$all = ob_get_contents();
ob_end_clean();

}
else{
	ob_start();
 echo $select,' ', $skad,$gdzie, ' ','kolor like ',$kolor , ' and ',$cena,' and ', 'marka like ', "$co", ' and ',$cena,' and ', $przebieg;
$all = ob_get_contents();
ob_end_clean();
};
//echo $all;

	
    $query2 = mysqli_query($conn, $all); // zapytanie
    $times = mysqli_num_rows($query2);

        for ($i=0; $i < $times; $i++) {  //wykonuje tyle razy ile powyżej zwrócił wyników dla każdego wiersza
	$forrow = mysqli_fetch_row($query2);
	echo '</br>';
	foreach ($forrow as $key) {
	echo ' ', $key;
	}
}
?>
