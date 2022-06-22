<?php 
$id="";
$username="";
$password="";
?> 
<html>
<head><style>
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
    <link rel="stylesheet" href="style.css" /> 
 </head>
    <body> 
    <?php $conn = new mysqli("localhost", "root", "Test@1234");
$db=mysqli_select_db($conn,"geekdatas");
?> <?php
$query="SELECT books.Bookname, books.Book_categories,authors.AUTHOR_NAME FROM books LEFT JOIN authors ON books.author_id=authors.author_id
";
$query2="SELECT publishers.publisher_name
FROM books
left JOIN publishers ON books.publisher_id=publishers.publisher_id";
$query_run1=mysqli_query($conn,$query);
$query_run=mysqli_query($conn,$query2);?>
<div style="margin-top:100px">
<table align="center" >
<col width="200px" />
    <col width="200px" />
    <col width="250px"/>
    <col width="200px"/>
    
<tr><td scope="col">Bookname </td>
<td scope="col">Book-Categories</td>
<td scope="col">Author name</td>
<td scope="col">Publisher_name</td>
</tr>
</table>
<?php while(($row=mysqli_fetch_assoc($query_run1))&& ($row1=mysqli_fetch_assoc($query_run))){
    $bookname=$row['Bookname'];
    $book_categories=$row['Book_categories'];
    $author=$row['AUTHOR_NAME'];
    $Publisher=$row1['publisher_name'];
 
    ?> 
<table   align="center">
<col width="200px" />
    <col width="200px" />
    <col width="250px"/>
    <col width="200px"/>
<tr><td scope="row"> <?php echo $bookname;?></td>
<td scope="row2"><?php echo $book_categories;?></td>
<td><?php echo $author;?></td>
<td><?php echo $Publisher;?></td>
</tr> 
</table><?php }?>
</div>





