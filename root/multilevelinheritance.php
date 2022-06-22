<?php
class a{
    var $age;
    function myage($var2){
        echo $this->age=$var2;
    }
}
class b extends a{
    var $age1=30;
    function my(){
        echo $this->age1;
    }

}
class c extends b{
    var $age2=50;
    function my2(){
        echo $this->age2;
    }
function myhistory(){
    $this->myage(50);
}
}
$obj2=new c();
$obj2->myhistory();
?>