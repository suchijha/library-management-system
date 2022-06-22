<!doctype html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    

    <!-- below we are including the jQuery and jQuery plugin .js files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
        $().ready(function() {

            $("#signupForm").validate({


                // in 'rules' user have to specify all the constraints for respective fields
                rules: {
                
                    password: {
                        required: true,
                        minlength: 8
                    },
                    confirm_password: {

                        
                        equalTo: "#password" //for checking both passwords are same or not
                    },
                    email: {
                        required: true,
                    
                    },
                    
                },
                // in 'messages' user have to specify message as per rules
                messages: {
                    firstname: "<br/> <span style=color:red>Please enter your firstname</span>",
                    lastname: "<br/><span style=color:red>Please enter your lastname </span>",
                    username: {
                        required: "<br/><span style=color:red>Please enter a username </span>",
                        minlength: "Your username must consist of at least 2 characters"
                    },
                    password: {
                        required: "<br/><span style=color:red>Please enter a password </span>",
                        minlength: "<br/><span style=color:red>your password must atleast of 8 characters</span>"
                    },
                    confirm_password: {
         required : "</br><span style=color:red>Please enter a password</span>",
         minlength : "</br><span style=color:red>Your password must be consist of at least 8 characters</span>",
         equalTo : "</br>"
         },




         email: {required:"</br><span style=color:red> please enter email</span>",
        email:"</br><span style=color:red> please enter valid email</span>"},
                    ujk: {required:"<span style=color:red>Please accept our policy</span>"},
                    role:{required:"</br><span style=color:red>Please enter role</span>"},
                },



            });
        });
    </script>
</head>

<div class="header">
    <a href="#default" class="logo">Library</a>
    <div class="header-right">

        <a href="login.php">Login</a>
    </div>
</div>


<div class="form-1">

    <body>
    <form class="cmxform" id="signupForm" method="post"  autocomplete="off">
          <div class="h1">  <h1>Password Reset </h1></div>
          
        
        
        
             <fieldset style="width:500px;padding:20px">  



         
       
    



</script>


                <p>
                <div class="my-label required"> <label for="password">Password</label></div>
                <input type="password" id="password" placeholder="Password" name="password">
                </p>

                <div id="message">
                  <h3>  Password must contain the following:</h3>
                    <p id="letter" class="invalid">lowercase letter</p>
                    <p id="capital" class="invalid"> uppercase letter</p>
                    <p id="number" class="invalid"> number</p>
                    <p id="length" class="invalid">Minimum 8 characters </p>
                </div>
                <div id="ijk"></div>
                <p>
                <div class="my-label required "><label for="co">Confirm Password</label> </div>
                <input type="password" id="confirm_password" placeholder="Confirm_password" name="confirm_password" oninput="myfunction5(this.value)"required>
                <p id="demo6"></p>
                </p>
                <script>
                    var myInput = document.getElementById("password");
                    var myInput2 = document.getElementById("confirm_password");
                    var letter = document.getElementById("letter");
                    var capital = document.getElementById("capital");
                    var number = document.getElementById("number");
                    var length = document.getElementById("length");
                    var conf = document.getElementById("co");
                function    myfunction5(val){
                    var regex = /^\s*$/;
                    if(regex.test(val)){
                        document.getElementById("demo6").innerHTML = " " ; 
                    }
                     else{ if(val!=myInput.value){
                            
                            document.getElementById("demo6").innerHTML = "<span style=color:red>Please enter same password</span>";

                        }
                        else {
                            document.getElementById("demo6").innerHTML = " ";
                        }}
                    }
                    // When the user clicks on the password field, show the message box
                    myInput.onfocus = function() {
                        document.getElementById("message").style.display = "block";
                    }

                    // When the user clicks outside of the password field, hide the message box
                    myInput.onblur = function() {
                        document.getElementById("message").style.display = "none";
                    }

   

                    // When the user starts to type something inside the password field
                    myInput.onkeyup = function() {
                        // Validate lowercase letters
                        var lowerCaseLetters = /[a-z]/g;
                        if (myInput.value.match(lowerCaseLetters)) {
                            letter.classList.remove("invalid");
                            letter.classList.add("valid1");
                        } else {
                            letter.classList.remove("valid1");
                            letter.classList.add("invalid");
                        }
                        var upperCaseLetters = /[A-Z]/g;
                        if (myInput.value.match(upperCaseLetters)) {
                            capital.classList.remove("invalid");
                            capital.classList.add("valid1");
                        } else {
                            capital.classList.remove("valid1");
                            capital.classList.add("invalid");
                        }

                        // Validate numbers
                        var numbers = /[0-9]/g;
                        if (myInput.value.match(numbers)) {
                            number.classList.remove("invalid");
                            number.classList.add("valid1");
                        } else {
                            number.classList.remove("valid1");
                            number.classList.add("invalid");
                        }

                        // Validate length
                        if (myInput.value.length >= 8) {
                            length.classList.remove("invalid");
                            length.classList.add("valid1");
                        } else {
                            length.classList.remove("valid1");
                            length.classList.add("invalid");
                        }

                    }
                </script>

                


                <p> <div class="sub">
                    <input class="submit" type="submit" name="submit" value="submit" style="height:30px; width:200px"></div>
                </p>

                </fieldset>
        </form>
</div>
</body>

</html>
<?php 

$conn = new mysqli("localhost", "root", "Test@1234","geekdatas");
  if (isset([$_POST['submit']]))
{
    $password=SHA1($_POST['password']);

$sql='UPDATE users SET password=$password';
    $result=mysqli_query($conn,$sql);
}
?>
