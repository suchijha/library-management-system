
<?php
interface A {
    public function setProperty($x);
    public function description();
}
class Mangoes implements A {
   public function setProperty($x) {
        $this->x = $x;
    }
    public function description() {
        echo $this->x ;
  }
}
$Mango = new Mangoes();
$Mango->setProperty("mango");
$Mango->description();
?>