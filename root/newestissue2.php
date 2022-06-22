<?php session_start();
$conn = new mysqli("localhost", "root", "Test@1234");
$db = mysqli_select_db($conn, "geekdatas");?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  <?php 

   
  
  
  
  
  if (isset($_POST["submit"])) {

// Start the session







  $res3 = "INSERT INTO issued_books(book_id,user_id,issued_at,return_date) VALUES ('$_POST[book_id]','$_POST[user_id]','$_POST[time]','$_POST[time3]')";
  if ($conn->query($res3) === TRUE) {
    echo" ";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $sql2 = "SELECT * FROM issued_books ";
  $query_run = mysqli_query($conn, $sql2);
  while ($row = mysqli_fetch_assoc($query_run)) {
    $date = $row['Issued_at'];

    $date1 = strtotime($date);

    $date2 = strtotime('+30 days', $date1);

    $date3 = date('m/d/Y H:i:s', $date2);
  


  $sql5 = "update issued_books set returned_at=STR_TO_DATE('[$date3]', '[%m/%d/%Y %H:%i:%S]') WHERE book_id='$_POST[book_id]' && Issued_at='$_POST[time]'&& return_date='$_POST[time3]'";

  if ($conn->query($sql5) === TRUE) {
    echo " ";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
  }








?>



<!DOCTYPE HTML>
<html>
  <head>
  <link rel="stylesheet" href="style.css" />
  <div class="header">
  <a href="#default" class="logo">Library&nbsp;&nbsp;&nbsp;&nbsp;Admin </a>

  <div class="header-right">

    <a href="student1.php">Home</a>
    <a style="background-color:lightgray;font-weight:bold" >Issued_book Details</a>

  </div>
</div>










<body>


  <div class="form-2">

    <body>
      <form name="myForm" class="cmxform" id="signupForm" method="post" autocomplete="off" onsubmit="  validateForm(event)">
        <div class="h2">

        </div>
        <p id="newemail"></p>

        <p id="success"></p>

        <script>
          $('#success').fadeIn('fast').delay(1000).fadeOut('fast');
        </script>



        <fieldset style="width:300px;height:400px;border:1px solid black ;background-color:#e6edeb;text-align:left;">
        
          <span>
           
              <input id="bookid" name="book_id" type="number" placeholder="book_id" oninput="myfunction3(this.value) "></input>
        
          </span>
          <span>
           
              <input id="userid" name="user_id" placeholder="user_id" type="number" oninput="myfun8(this.value)"></input>
            
            <span>
              
                <input type="text" id="issuedat" placeholder="issued_at" name="time" onfocus="(this.type='datetime-local')">
             
            </span>
          
                <span>
            
                    <input type="text" id="returnedat" placeholder="returned_at" name="time3" onfocus="(this.type='datetime-local')">
               
                </span>
                <span>
              
                    <input class="submit2" type="submit" value="Submit"name="submit" style="margin-left:95px;height:30px; width:80px">
              
                </span>
        </fieldset>
      </form>

      <img src='../root/booklib.gif' style=margin-bottom:300px;height:300px;width:300px;>
  </div>



</body>


</html>
  
 
  </head>

<?php

//session_start();
  //$conn = new mysqli("localhost", "root", "Test@1234");
  //$db = mysqli_select_db($conn, "geekdatas");
 
  
  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
  $url = "https://";   
else  
  $url = "http://";  
  $url.= $_SERVER['HTTP_HOST'];  
  $url.= $_SERVER['REQUEST_URI']; 
  $url.= $_SERVER['QUERY_STRING'];
  $email1 = $_SESSION['email'];

  $res = mysqli_query($conn,"Select Userid from users where Email='$email1'");

  while ($obj = mysqli_fetch_assoc($res))
  
 
  $res4= mysqli_query($conn,"Select updation from issued_books where user_id='$useri'");
  while ($obj2 = mysqli_fetch_assoc($res4))

  

  // $pos = strrpos($url, '/');
//$id = $pos === false ? $url : substr($url, $pos + 1);
 // echo $id;
// string passed via URL



      
// Display result

 // $res = mysqli_query($conn, "SELECT * FROM issued_books where book_id=$_POST[book_id]&&user_id=$_POST[user_id]");

   // while ($obj = mysqli_fetch_assoc($res)) {
     // print("returned date: " . $obj["return_date"] . "\n");
      //print("returned at: " . $obj["returned_at"] . "\n");
      //echo $difference_in_seconds = strtotime($obj["return_date"]) - strtotime($obj["returned_at"]);
      //$difference_in_days = $difference_in_seconds / 86400;
      //echo "</br>";
      //print "\n" . $difference_in_days;
      //if ($difference_in_days > 0) {
        //$sql6 = "update issued_books set FINE=$difference_in_days*10 WHERE book_id=$_POST[book_id]&&user_id=$_POST[user_id]&&return_date='$obj[return_date]'&&returned_at='$obj[returned_at]'";
        //if ($conn->query($sql6) === TRUE) {
          //echo "New record 2created successfully";
        //} else {
          //echo "Error: " . $sql . "<br>" . $conn->error;
        //}
      //} else {
        //$sql7 = "update issued_books set FINE='0' WHERE book_id=$_POST[book_id] &&user_id=$_POST[user_id]&&return_date='$obj[return_date]'&&returned_at= '$obj[returned_at]'";
        //if ($conn->query($sql7) === TRUE) {
          //echo "New record 2created successfully";
        //} else {
          //echo "Error: " . $sql . "<br>" . $conn->error;
        //}
      //}
    //}
  
  

  
 
  
?>