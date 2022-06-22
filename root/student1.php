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
  <a href="#default" class="logo">Library &nbsp;&nbsp;&nbsp;&nbsp;Student</a>
  
  <div class="header-right">
  <a style="background-color:lightgray;font-weight:bold" >Home</a>
    <a href="login.php">Login</a>
    <a href="show_book.php"> books </a>
 
<a href="show1.php"> issued books </a>
<a> book to submit <button id="myBtn">  click</button> </a>
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
</div>

    

       
 


  
    
<div class="sixthi-class"><a href="newestissue2.php"><h3>"Place order"</h3></a></div>
</body>
</html>