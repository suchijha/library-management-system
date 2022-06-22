<?php 
$id="";
$username="";
$password="";
?> 
<html>
    <head>
    <link rel="stylesheet" href="style.css" /> 
   <style>
    td[scope="col"] {
    background-color: blue;
    color: #fff;
    font-weight: bold;
}
td[scope="row2"] {
    background-color: yellow;
}
 td[scope="row"]{
    background-color: skyblue;
 }
 table, th, td {
  border: 1px solid grey  ;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
}
   </style>
</head>
    <body>
    <div class="header">
  <a href="#default" class="logo">Library &nbsp;&nbsp;&nbsp;&nbsp; Admin</a>
  
  <div class="header-right">
  <a style="background-color:lightgray;font-weight:bold" >Issued-books</a>
    <a href="dashboard.php">Home</a>
   
  </div>
    </div>
 
    <?php $conn = new mysqli("localhost", "root", "Test@1234");
$db=mysqli_select_db($conn,"geekdatas");
?> <?php
$query="SELECT books.Bookname,issued_books.id,issued_books.user_id, books.Book_categories,issued_books.issued_at,issued_books.returned_at,issued_books.return_date,issued_books.FINE FROM issued_books INNER JOIN books ON books.Bookid=issued_books.book_id
";

$query_run1=mysqli_query($conn,$query);
$query_run=mysqli_query($conn,$query2);?>
<div style="margin-top:100px">
<table  align="center" >
<col width="150px" />
    <col width="150px" />
    <col width="200px"/>
    <col width="150px"/>
    <col width="250px" />
    <col width="200px"/>
    
    
<tr >
<td scope="col">Bookname </td>

<td scope="col">Issued_at</td>

<td scope="col">Return_date</td>
<td scope="col">Fine</td>
<td scope="col">Email</td>
<td scope="col">Issued_bookid</td>
</tr>
</table>
<?php while(($row=mysqli_fetch_assoc($query_run1)) ){
    $bookname=$row['Bookname'];
    $book_categories=$row['Book_categories'];
    $Userid=$row['user_id'];
    $issued_at=$row['issued_at'];
    $returned_at=$row['returned_at'];
    $return_date=$row['return_date'];
    $fine=$row['FINE'];
 
 $issued_bookid=$row['id'];
 $query3="SELECT users.Email  FROM users INNER JOIN issued_books ON users.Userid=issued_books.user_id where Userid='$Userid'";
 $query_run=mysqli_query($conn,$query3);
 while(($row1=mysqli_fetch_assoc($query_run)) )
 {
     $EMAIL=$row1['Email'];
 }
 


   ?> 
    
<table   align="center">
<col width="150px" />
    <col width="150px" />
    <col width="200px"/>
    <col width="150px"/>
    <col width="250px" />
    <col width="200px"/>
    
    
<tr><td scope="row"> <?php echo $bookname;?></td>

<td scope="row2"><?php echo $issued_at;?></td>

<td><?php echo $return_date;?></td>
<td><?php echo $fine;?></td>
<td><?php echo $EMAIL;?></td>
<td><?php echo $issued_bookid;?></td>
</tr> 
</table>


<?php
 }?>
 </div>
