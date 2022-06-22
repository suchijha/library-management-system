<?php $conn = new mysqli("localhost", "root", "Test@1234");
$db=mysqli_select_db($conn,"geekdatas");
echo $_POST['id'];
$sql = "DELETE FROM issued_books WHERE id=$_POST[id]";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} 

?>
<?php
function get_user_count(){
    $conn = new mysqli("localhost", "root", "Test@1234");
$db=mysqli_select_db($conn,"geekdatas");
$user_count=" ";

$query="Select count(*) as user_count from users";
$query_run=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($query_run)){
    $user_count=$row['user_count'];
    return ($user_count);
}

}
function get_user_book(){
    $conn = new mysqli("localhost", "root", "Test@1234");
$db=mysqli_select_db($conn,"geekdatas");
$user_count=" ";

$query="Select count(*) as book_count from book";
$query_run=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($query_run)){
    $user_count=$row['book_count'];
    return ($user_count);
}

}
function get_user_issue(){
    $conn = new mysqli("localhost", "root", "Test@1234");
$db=mysqli_select_db($conn,"geekdatas");
$user_count=" ";

$query="Select count(*) as user_count from issued_books";
$query_run=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($query_run)){
    $user_count=$row['user_count'];
    return ($user_count);
}

}
function get_user_deposited(){
    $conn = new mysqli("localhost", "root", "Test@1234");
$db=mysqli_select_db($conn,"geekdatas");
$user_count=" ";

$query="Select count(*) as user_count from deposited_book";
$query_run=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($query_run)){
    $user_count=$row['user_count'];
    return ($user_count);
}

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
    
</head>

<body>
<div class="header">
  <a href="#default" class="logo">Library &nbsp;&nbsp;&nbsp;&nbsp;Admin</a>
  
  <div class="header-right">

    <a href="login.php">Login</a>
    <a href="newadd.php">Add Book </a>
    <a style="background-color:lightgray;font-weight:bold" >Home</a>
  </div>
</div>
    <div class="form-2">
    

       
       <div class="books">
        

<div class="user_books">
<div class="first-class"><h3> number of users :<?php echo get_user_count() ; ?></h3>
<div class="design-1">  <a href="registered.php" >"registered user" </a></div>
</div> <div class="design-4">
 <div class="second-class"><h3>number of books available :<?php echo get_user_book();?></h3><div class="show"> <a href="show_book.php"> show books </a></div></div>
 <div class="frth-class"><h3>number of issues book: <?php echo get_user_issue();?></h3>
<div class="third-class"><a href="show.php">"show issued book" </a></div></div>
<div class="fourth-class"><h3> number of deposited books:<?php echo get_user_deposited();?> </h3><div class="book">book to submit <button id="myBtn">click</button></div></div></div>
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <div> enter issuedbook id to be submitted </div>
       <form method='POST'> <input type="number" name="id" >
       <input type="submit" value="Submit">
  </div>


</div>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>



    </div>
    
<div class="sixth-class"><a href="newestissue.php"><h3>"To fill issue books detail click here"</h3></a></div>
</body>
</html>