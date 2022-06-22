<?php $conn = new mysqli("localhost", "root", "Test@1234");
$db=mysqli_select_db($conn,"geekdatas");
echo $_POST['isbn'];
$sql="UPDATE book SET id=$_POST[isbn],publisher_name='$_POST[title]'
WHERE id=$_POST[isbn]";if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

?>






<!DOCTYPE HTML>
<html>
<body bgcolor="87ceeb">
    <center><h2>Simple Library Management System</h2></center>
    <!--Once the form is submitted, all the form data is forwarded to InsertBooks.php -->
    <form action="update.php" method="post">
 
        <table border="2" align="center" cellpadding="5" cellspacing="5">
            <tr>
            <td> Enter Id:</td>
            <td> <input type="number" name="isbn" size="48"> </td>
            </tr>
            <tr>
            <td> Enter Title :</td>
            <td> <input type="text" name="title" size="48"> </td>
            </tr>
            <tr>
            <td> Enter Author :</td>
            <td> <input type="text" name="author" size="48"> </td>
            </tr>
            <tr>
            <td> Enter Edition :</td>
            <td> <input type="text" name="edition" size="48"> </td>
            </tr>
            <tr>
            <td> Enter Price: </td>
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
<div>to delete books click here <a href="delete.php"></a>



</body>
</html>
