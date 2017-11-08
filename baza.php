<?php
 $p = $_POST["pier"];
 $x = $_POST["1"];
 $v = $_POST["drug"];
 $e = $_POST["2"];
 $r = $_POST["trze"];
 $t = $_POST["3"];
 
 ob_start();
 echo $p, $x, $v, $e, $r, $t;
 $all = ob_get_contents();
 ob_end_clean();
 
 $a = mysqli_connect('localhost', 'root', '');
 $b = mysqli_select_db($a ,'komis');
 $c = mysqli_query($a, $all);
 $h = mysqli_query($a, 'select * from auto');
 $d = mysqli_num_rows($h);
 
 //while($row = mysqli_fetch_array($c)) {
   //  $wyn = $row;
 //}
 
 
 for ($i=0; $i < $d; $i++) { 
 	$g = mysqli_fetch_row($h);
 	echo '</br>';
 	foreach ($g as $key) {
 	echo ' ', $key;
      }
 }
 ?>
