<?php
// Start the session
session_start();
?>

<!doctype html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <form class="cmxform" id="signupForm" method="post"  autocomplete="off"onsubmit="  validateForm(event)">
          <div class="h1">  <h1>Password Reset </h1></div>
          
        
        
        
             <fieldset style="width:500px;padding:20px">  



         
       
    



</script>
                 <div id="fg-demo"></div>
                 <script>$('#fg-demo').fadeIn('fast').delay(1000).fadeOut('fast');</script>

                 <span>

<div class="my-label required"> <i class="fa fa-envelope-o" style="font-size:22px;padding-top:3%"></i>
    <input id="email" name="email" placeholder="Email" type="text" oninput="myfun8(this.value)"></input>
</div>
<div id="demo10">hello</div>
</span>
<script>
function myfun8(val) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; {
        if (!emailReg.test(val)) {
            document.getElementById("demo10").style.visibility = "visible"
            document.getElementById("demo10").innerHTML = "<span style=color:red;font-size:16px>please enter valid email</span>";
        } else {
            document.getElementById("demo10").style.visibility = "hidden"
            document.getElementById("demo10").innerHTML = "hello "
        }


    }
}
</script>

                


                <p> <div class="sub">
                    <input class="submit" type="submit" value="submit" style="height:30px; width:200px"></div>
                </p>

                </fieldset>
        </form>
</div>
</body>

</html>
<?php $conn = new mysqli("localhost", "root", "Test@1234");
$db=mysqli_select_db($conn,"geekdatas");





if(isset($_POST['email'])){
	$email =  $_POST['email'];
    echo $email;
	$sql = "SELECT * FROM `users` WHERE email = '$email'";
	$res = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($res);
	if($count == 1){?>
        <script> document.getElementById('fg-demo').innerHTML='your email id is not registered';
        </script>
	<?php }else{?>
		<script> document.getElementById('fg-demo').innerHTML='your email id is not registered';
</script>
<?php	}
}
if(isset($_POST['email'])&&$count==1){
   $_SESSION["email"]=$_POST['email'];
    $to = $_POST['email'];
$subject = 'Password Reset';

 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '."\r\n".
    'Reply-To: '."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message = '<html><body>';
$message .= '<div>click here for reset your password &nbsp;<a href="http://localhost:3000/root/resetnew.php">click </a></div>';

$message .= '</body></html>';
 
// Sending email
if(mail($to, $subject, $message, $headers)){?>
<script> document.getElementById('fg-demo').innerHTML='A mail has been sent ';
</script>
    <?php
    echo 'Your mail has been sent successfully.';
} else{?>
   <script> document.getElementById('fg-demo').innerHTML='your email id is not registered';
</script>
<?php }
   
}
?>
<script>
    function validateForm() {

        let x3 = document.forms["myForm"]["username"].value;
        let x4 = document.forms["myForm"]["email"].value;
        let x5 = document.forms["myForm"]["password"].value;
        // let x6=document.forms["myForm"]["role"].value;
        let x7 = document.forms["myForm"]["confirm_password"].value;
        let x8 = document.forms["myForm"]["submit"].value;
        var regex = /^\s*$/;
        var regex2=  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/

        if (regex.test(x3)) {
            document.getElementById("demo3").style.visibility = "visible";
            document.getElementById("demo3").innerHTML = "<span style=color:red;font-size:16px>please enter user name </span>";
            event.preventDefault();
        }
        if (regex.test(x4)) {
            document.getElementById("demo10").style.visibility = "visible";
            document.getElementById("demo10").innerHTML = "<span style=color:red;font-size:16px>please enter email </span>";
            event.preventDefault();
        }
        if (regex.test(x5)) {
            document.getElementById("demo2").style.visibility = "visible";
            document.getElementById("demo2").innerHTML = "<span style=color:red;font-size:16px>please enter password </span>";
            event.preventDefault();
        } else  {  if (!regex2.test(x5)) {
                                document.getElementById("demo2").style.visibility = "visible"
                         document.getElementById("demo2").innerHTML = "<span style=color:red;font-size:16px>please enter valid password consisting of uppercase letters, lowercase letters and number and upto 8 characters</span>";
                        event.preventDefault();    } else {
                                document.getElementById("demo2").style.visibility = "hidden"
                                document.getElementById("demo2").innerHTML = "hello "
                            }}



    

    //if(regex.test(x6)){document.getElementById("demo14").style.visibility="visible";
    //document.getElementById("demo14").innerHTML = "<span style=color:red;font-size:12px>please enter role </span>";

    //event.preventDefault();  }
    if (regex.test(x7)) {
        document.getElementById("demo6").style.visibility = "visible";
        document.getElementById("demo6").innerHTML = "<span style=color:red;font-size:16px>please enter confirm password</span>";
        event.preventDefault();
    }

    if (regex.test(x8)) {
        document.getElementById("suc").style.visibility = "visible";
        document.getElementById("suc").innerHTML = "<span style=color:red;font-size:16px>please agree our policy</span>";
        event.preventDefault();
    } else {
        document.getElementById("suc").style.visibility = "hidden"
        document.getElementById("suc").innerHTML = "hello ";
        document.getElementById("suc2").value = "hii"
    } }
</script>
