<?php $conn = new mysqli("localhost", "root", "Test@1234");
$db=mysqli_select_db($conn,"geekdatas");

$sql = "INSERT INTO students(name,email,book_id,age)
VALUES ('$_POST[isbn]','$_POST[email]', '$_POST[publication]','$_POST[age]')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    
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
            <td> Enter name:</td>
            <td> <input type="text" name="isbn" size="48"> </td>
            </tr>
           
            <tr>
            <td> Enter email:</td>
            <td> <input type="text" name="email" size="48"> </td>
            </tr>
            <tr>
            <td> Enter age :</td>
            <td> <input type="number" name="age" size="48"> </td>
            </tr>
            <tr>
            <td> Enter book_id: </td>
            <td> <input type="number" name="publication" size="48"> </td>
            </tr>
            <tr>
            <td></td>
            <td>
            <input type="submit" value="submit">
            <input type="reset" value="Reset">
            </td>
            </tr>
        </table>
    </form>
</body>
</html>
