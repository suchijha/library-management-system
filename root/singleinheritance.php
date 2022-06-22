<?php
class abc{
    var $title;
    public function display($var1)
    {
        $this->title=$var1;
        echo $this->title;
    }

}
class child extends abc{
    public function dis(){
        echo "hi";
    }
}
$gh=new child();
$gh->display("hello");
?>