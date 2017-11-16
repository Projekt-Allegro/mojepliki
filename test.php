<?php
$con=mysqli_connect("localhost","root","","komis");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$sql="select distinct marka FROM auto"; 
if ($result=mysqli_query($con,$sql))
  {
  echo '<select name="nazwa" size="1">';
  while ($row=mysqli_fetch_assoc($result)){
    echo '<option value="'. $row["marka"] .'">'. $row["marka"] .'</option>';
    }
	echo '</select>';
	
  mysqli_free_result($result);
}
mysqli_close($con);
?>