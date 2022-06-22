
<?php
  
  // Checking if post value is set
  // by user or not
  if(isset($_POST['name'])) {
    
      // Getting the data of form in
      // different variables
      $name = $_POST['name'];
      $age = $_POST['age'];
      $address = $_POST['address'];
    
      // Sending Response
      echo "Success";
  }
  ?>