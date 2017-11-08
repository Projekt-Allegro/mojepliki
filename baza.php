<?php
$p = $_POST["pier"];
$x = $_POST["1"];
$v = $_POST["drug"];
$e = $_POST["2"];
$r = $_POST["trze"];
$t = $_POST["3"];
$pos = strpos($p, "select");
if ($pos === false){
ob_start();
echo $p, $x, $v, $e;
$all = ob_get_contents();
ob_end_clean();
} else {
ob_start();
echo $p,' ', $x,' ', $v,' ', $e,' ', $r, ' ', $t;
$all = ob_get_contents();
ob_end_clean();
}

if ($pos === false){
	$a = mysqli_connect('localhost', 'root', '');
    $b = mysqli_select_db($a ,'komis');
    $h = mysqli_query($a, 'select * from auto');
    $c = mysqli_query($a, $all);
    $d = mysqli_num_rows($h);

        for ($i=0; $i < $d; $i++) { 
	$g = mysqli_fetch_row($h);
	echo '</br>';
	foreach ($g as $key) {
	echo ' ', $key;
}
}
} else {

	$a = mysqli_connect('localhost', 'root', '');
    $b = mysqli_select_db($a ,'komis');
    $c = mysqli_query($a, $all);
    $d = mysqli_num_rows($c);

    for ($i=0; $i < $d; $i++) { 
	$g = mysqli_fetch_row($c);
	echo '</br>';
	foreach ($g as $key) {
	echo ' ', $key;
}
}
}
?>
