
<?php
function fact($n){
    if($n<0)
    return -1;
    if($n==0)
    return 1;
    return($n*fact($n-1));
}
echo fact(5);
?>