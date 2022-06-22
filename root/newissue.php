
<?php $conn = new mysqli("localhost", "root", "Test@1234");
$db=mysqli_select_db($conn,"geekdatas");

if(isset($_POST['book_id'])){


  $sql2="SELECT * FROM issued_books ";
 $query_run = mysqli_query($conn, $sql2);



$res3="INSERT INTO issued_books(book_id,user_id,issued_at,return_date) VALUES ('$_POST[book_id]','$_POST[user_id]','$_POST[time]','$_POST[time3]')";
while($row = mysqli_fetch_assoc($query_run))
{$date=$row['Issued_at'];

$date1=strtotime($date);

$date2=strtotime('+7 days',$date1);

$date3=date('m/d/Y H:i:s', $date2);

}
echo $date3;

$sql5="update issued_books set returned_at=STR_TO_DATE('[$date3 +0100]', '[ %m/%d/%Y %H:%i:%S +0100]') WHERE book_id=$_POST[book_id]";

if ($conn->query($sql5) === TRUE) {
    echo "New record 2created successfully";
  }
  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
} 
if(isset($_POST['book_id']))
{$res = mysqli_query($conn, "SELECT * FROM issued_books");

$obj = mysqli_fetch_assoc($res){
  print("returned date: ".$obj["return_date"]."\n");
  print("returned at: ".$obj["returned_at"]."\n");
  echo $difference_in_seconds = strtotime($obj["return_date"]) - strtotime($obj["returned_at"]);
$difference_in_days=$difference_in_seconds/86400;
echo "</br>";  
print "\n".$difference_in_days;

  $res1=mysqli_query($conn,"INSERT INTO issued_books (fine) VALUES($difference_in_days*10)");
$sql6="update issued_books set FINE=$difference_in_days*10 where book_id=$_POST[book_id]";

if ($conn->query($sql6) === TRUE) {
  echo "New record 3created successfully";
}
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
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
</html>