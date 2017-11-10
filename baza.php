<?php header('Content-Type: text/html;charset=UTF-8');
$tryb = $_POST["pier"];
$trwartosc = $_POST["1"];
$skad = $_POST["drug"];
$skwartosc = $_POST["2"];
$gdzie = $_POST["trze"];
$gdwartosc = $_POST["3"];
$pos = strpos($tryb, "select");
if ($gdwartosc === ""){
ob_start();
echo $tryb,' ', $trwartosc,' ', $skad,' ', $skwartosc;
$all = ob_get_contents();
ob_end_clean();
} else {
	ob_start();
echo $tryb,' ', $trwartosc,' ', $skad, ' ', $skwartosc,' ', $gdzie,' ', $gdwartosc;
$all = ob_get_contents();
ob_end_clean();
};

if ($pos === false){
	$conn = mysqli_connect('localhost', 'root', '');
    $datab = mysqli_select_db($conn ,'alegro');
    $query1 = mysqli_query($conn, 'select * from produkty');
    $query2 = mysqli_query($conn, $all);
    $times = mysqli_num_rows($query1);

        for ($i=0; $i < $times; $i++) { 
	$forrow = mysqli_fetch_row($query1);
	echo '</br>';
	foreach ($forrow as $key) {
	echo ' ', $key;
}
}
}else {

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
};
?>
