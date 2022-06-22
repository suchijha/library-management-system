<?php $conn = new mysqli("localhost", "root", "Test@1234");
$db=mysqli_select_db($conn,"geekdatas");
echo $_POST['isbn'];
//$sql = "INSERT INTO book (id,publisher_name,  author_name,price)
//VALUES ('$_POST[isbn]','$_POST[author]', '$_POST[edition]','95');
if(isset($_POST['publisher'])){
$sql="INSERT INTO authors(AUTHOR_NAME) VALUES('$_POST[author]')";
$sql2="INSERT INTO publishers(publisher_name)VALUES('$_POST[publisher]')";

if ($conn->query($sql) === TRUE) {
    echo " ";
  } 

if ($conn->query($sql2) === TRUE) {
    echo " ";
  } 
  
  $sql3 = "SELECT author_id from authors where AUTHOR_NAME='$_POST[author]'";
  $query_run = mysqli_query($conn, $sql3);
  while ($row = mysqli_fetch_assoc($query_run))
     {$id2 = $row['author_id'];
        }
        
      $sql4 = "SELECT publisher_id from publishers where publisher_name='$_POST[publisher]'";
  $query_run = mysqli_query($conn, $sql4);
  while ($row = mysqli_fetch_assoc($query_run))
      {$id3 = $row['publisher_id'];
    }
    
      
$sql4="INSERT into books(Bookname,Book_categories,status,author_id,publisher_id) VALUES('$_POST[isbn]','$_POST[title]','$_POST[publication]','$id2','$id3')";

if ($conn->query($sql4) === TRUE) {
    echo " ";
  } 
  }



?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
    
</head>

<div class="header">
  <a href="#default" class="logo">Library&nbsp;&nbsp;&nbsp;&nbsp;Admin </a>

  <div class="header-right">
  <a style="background-color:lightgray;font-weight:bold" >Add Book</a>
    <a href="dashboard.php">Home</a>

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
           
              <input id="bookid" name="isbn" type="text" placeholder="book_name" oninput="myfunction3(this.value) "></input>
        
          </span>
          <span>
           
              <input id="userid" name="title" placeholder="book_title" type="text" oninput="myfun8(this.value)"></input>
            
            <span>
              
                <input type="text" id="issuedat" placeholder="author_name" name="author" >
             
            </span>
            <span>
             
                <input type="text" id="updation" placeholder="publisher_name" name="publisher" >
             
              <span>
                <span>
            
                    <input type="number" id="returnedat" placeholder="Status:1=availabilityor2=non-availability" name="publication" >
               
                </span>
                <span>
              
                    <input class="submit2" type="submit" value="Submit" style="margin-left:100px;height:30px; width:80px">
              
                </span>
        </fieldset>
      </form>

      <img src='../root/booklib.gif' style=margin-bottom:300px;height:300px;width:300px;>
  </div>



</body>


</html>