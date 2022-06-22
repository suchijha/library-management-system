<?php  
$count=1;
for($i=1;$i<=3;$i++){  
for($k=1;$k<=3-$i;$k++){  
echo "  ";  
}  
for($j=1;$j<=2*$i-1;$j++){  
echo "* ";  
}  
echo "<br>";  
} 
?>