<?php $conn = new mysqli("localhost", "root", "Test@1234");
$db=mysqli_select_db($conn,"geekdatas");
echo $_POST['isbn'];
if(isset($_POST['book_id'])){
$sql = "INSERT INTO issued_books (book_id,user_id,issued_at,return_date)
VALUES ('$_POST[book_id]','$_POST[user_id]','$_POST[time]','$_POST[time3]')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } 
  else{
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
    
}

?>



<!DOCTYPE HTML>
<html>
<body bgcolor="87ceeb">
    <center><h2>Simple Library Management System</h2></center>
    <!--Once the form is submitted, all the form data is forwarded to InsertBooks.php -->
    <form action="" method="post">
 
        <table border="2" align="center" cellpadding="5" cellspacing="5">
            <tr>
            <td> Enter book_Id:</td>
            <td> <input type="number" name="book_id" size="48"> </td>
            </tr>
            
            <tr>
            <td> Enter user_id:</td>
            <td> <input type="number" name="user_id" size="48"> </td>
            </tr>
            <tr>
            <td> Enter issued_at :</td>
            <td> <input type="datetime-local" step="1" name="time"></td>
            </tr>
            <tr>
            
            <td> Enter return_date: </td>
            <td> <input type="datetime-local" step="1" name="time3"> </td>
            </tr>
            
            

            <tr>
            <td>  </td>
            <td> <input type="submit"  name="submit"> </td>
            </tr>
            
            
            </td>
            </tr>
        </table>
    </form>
</body>
</html><?php
if(isset([$_POST['book_id']]))
$res = mysqli_query($conn, "SELECT * FROM issued_books");

while($obj = mysqli_fetch_assoc($res))
$date1=strtotime($obj["return_date"]);
$date2=strtotime('+7 days',$date1);
$date3=date("Y-m-d H:i:s",$date2);

$res3=mysqli_query($conn,"INSERT INTO issued_books(returned_at) VALUES ('$date3')");
while($obj = mysqli_fetch_assoc($res)){
 

//$difference_in_days=$difference_in_seconds/86400;

$difference_in_seconds = strtotime($obj["returned_at"]) - strtotime($obj["returned_date"]);

$difference_in_days=$difference_in_seconds/86400;
  $res1=mysqli_query($conn,"INSERT INTO issued_books (FINE) VALUES($difference_in_days*10)");


//$res2=mysqli_query($conn,"INSERT INTO issued_books(cur_date)VALUES($date)");



}
?>


