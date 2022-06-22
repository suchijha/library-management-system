<?php
class home {
    var $title;
    function setTitle($val)
    {
        $this->title=$val;
    }
    function display(){
        echo $this->title;
    }
} 

$sa=new home();
$sa->setTitle("mr.");
$sa->display();
?>