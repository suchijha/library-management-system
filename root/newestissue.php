<?php $conn = new mysqli("localhost", "root", "Test@1234");
$db = mysqli_select_db($conn, "geekdatas");

if (isset($_POST["submit"])) {






  $sql2 = "SELECT * FROM issued_books ";
  $query_run = mysqli_query($conn, $sql2);
  while ($row = mysqli_fetch_assoc($query_run)) {
    $date = $row['Issued_at'];

    $date1 = strtotime($date);

    $date2 = strtotime('+30 days', $date1);

    $date3 = date('m/d/Y H:i:s', $date2);



    $sql5 = "update issued_books set returned_at=STR_TO_DATE('[$date3]', '[%m/%d/%Y %H:%i:%S]') WHERE book_id=$_POST[book_id]&& Issued_at='$_POST[time]'&&return_date='$_POST[time3]'";
  }
}







?>



<!DOCTYPE HTML>
<html>

<head>
  <link rel="stylesheet" href="style.css" />

</head>

<div class="header">
  <a href="#default" class="logo">Library&nbsp;&nbsp;&nbsp;&nbsp;Admin </a>

  <div class="header-right">

    <a href="dashboard.php">Home</a>
    <a style="background-color:lightgray;font-weight:bold" >Issued-book Details</a>

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



        <fieldset style="width:300px;height:400px;border:1px solid grey ;background-color:#e6edeb;text-align:left;">
        
          <span>
           
              <input id="bookid" name="book_id" type="number" placeholder="book_id" oninput="myfunction3(this.value) "></input>
        
          </span>
          <span>
           
              <input id="userid" name="user_id" placeholder="user_id" type="number" oninput="myfun8(this.value)"></input>
            
            <span>
              
                <input type="text" id="issuedat" placeholder="issued_at" name="time" onfocus="(this.type='datetime-local')">
             
            </span>
            <span>
             
                <input type="text" id="updation" placeholder="updation" name="updation" oninput="myfunction5(this.value)">
             
              <span>
                <span>
            
                    <input type="text" id="returnedat" placeholder="returned_at" name="time3" onfocus="(this.type='datetime-local')">
               
                </span>
                <span>
              
                    <input class="submit2" type="submit" value="Submit"name="submit" style="margin-left:105px;height:30px; width:80px">
              
                </span>
        </fieldset>
      </form>

      <img src='../root/booklib.gif' style=margin-bottom:300px;height:300px;width:300px;>
  </div>



</body>


</html>
<?php
if (isset($_POST['book_id'])) {
  $conn = new mysqli("localhost", "root", "Test@1234");
  $db = mysqli_select_db($conn, "geekdatas");
  $res = mysqli_query($conn, "SELECT * FROM issued_books where book_id=$_POST[book_id]&&user_id=$_POST[user_id]");
  $_SESSION["userid"] = $_POST['user_id'];
  $_SESSION["updation"] = $_POST['updation'];
  if ($_POST['updation'] == 'no') {
    while ($obj = mysqli_fetch_assoc($res)) {
      print("returned date: " . $obj["return_date"] . "\n");
      print("returned at: " . $obj["returned_at"] . "\n");
      $res3 = "update issued_books set updation='$_POST[updation]' WHERE book_id=$_POST[book_id]&&user_id=$_POST[user_id]&&return_date='$_POST[time3]'&&Issued_at='$_POST[time]'";



      if ($conn->query($res3) === TRUE) {
        echo " ";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }





      echo $difference_in_seconds = strtotime($obj["return_date"]) - strtotime($obj["returned_at"]);
      $difference_in_days = $difference_in_seconds / 86400;
      echo "</br>";
      print "\n" . $difference_in_days;
      if ($difference_in_days > 0) {
        $sql6 = "update issued_books set FINE=$difference_in_days*10 WHERE book_id=$_POST[book_id]&&user_id=$_POST[user_id]&&return_date='$obj[return_date]'&&returned_at='$obj[returned_at]'";
        if ($conn->query($sql6) === TRUE) {
          echo " ";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      } else {
        $sql7 = "update issued_books set FINE='0' WHERE book_id=$_POST[book_id] &&user_id=$_POST[user_id]&&return_date='$obj[return_date]'&&returned_at= '$obj[returned_at]'";
        if ($conn->query($sql7) === TRUE) {
          echo " ";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }
    }
  } else {
    $res3 = "update issued_books set updation='$_POST[updation]' WHERE book_id=$_POST[book_id]&&user_id=$_POST[user_id]&&return_date='$_POST[time3]'&&Issued_at='$_POST[time]'";

    if ($conn->query($res3) === TRUE) {
      echo " ";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $sql8 = "update issued_books set FINE='0' WHERE book_id=$_POST[book_id]&&user_id=$_POST[user_id]&&return_date='$_POST[time3]'&&Issued_at='$_POST[time]'";
    if ($conn->query($sql8) === TRUE) {
      echo " ";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}


?>