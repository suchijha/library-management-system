<?php
// Start the session
session_start();
?>
<!doctype html>
<html>
   <head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    // firstname: "required",
                    //  lastname: "required",
                    // username: {
                    // required: true,
                    //for length of lastname
                    // },
                    password: {
                        // required: true,
                        // minlength: 8
                    },
                    confirm_password: {


                        equalTo: "#password" //for checking both passwords are same or not
                    },
                    // email: {
                    //  required: true,

                    // },
                    //ujk: {required:true},
                    //  role:{required:true}
                },
                // in 'messages' user have to specify message as per rules
                messages: {
                    firstname: "<br/> <span style=color:red;font-size:12px>Please enter your firstname</span>",
                    lastname: "<br/><span style=color:red;font-size:12px>Please enter your lastname </span>",
                    username: {
                        required: "<br/><span style=color:red;font-size:12px>Please enter a username </span>",
                        minlength: "Your username must consist of at least 2 characters"
                    },
                    password: {
                        required: "<br/><span style=color:red;font-size:12px>Please enter a password </span>",
                        minlength: "<br/><span style=color:red;font-size:12px>your password must atleast of 8 characters</span>"
                    },
                    confirm_password: {
                        //required : "</br><span style=color:red;font-size:12px>Please enter a password</span>",
                        //minlength : "</br><span style=color:red;font-size:12px>Your password must be consist of at least 8 characters</span>",
                        equalTo: "</br>"
                    },




                    email: {
                        required: "</br><span style=color:red;font-size:12px;visibility:visible> please enter email</span>",
                        email: "</br><span style=color:red;font-size:14px> please enter valid email</span>"
                    },
                    // ujk: {required:"<span style=color:red;font-size:12px>Please accept our policy</span>"},
                    role: {
                        required: "</br><span style=color:red;font-size:12px>Please enter role</span>"
                    },
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
        <form name="myForm" class="cmxform" id="signupForm" method="post" autocomplete="off" onsubmit="  validateForm(event)">
            <div class="h1">
                <h1>Login Form </h1>
            </div>
            <p id="newemail"></p>

            <p id="success"></p>

            <script>
                $('#success').fadeIn('fast').delay(1000).fadeOut('fast');
            </script>



            <fieldset style="width:500px;padding:20px">





                <span>
                    <div class="my-label required"> <i class="fa fa-lock" style="font-size:22px;padding-left:2%;padding-top:4%"></i>
                        <input type="password" id="password" placeholder="Password" name="password" oninput="myfun82(this.value)">
                    </div>
                    <div id="demo2">Hello</div>
                </span>
                <script> 
               function myfun82(val){
                  var regex=  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/
                  var regex2 = /^\s*$/;
                  if (regex2.test(val)) {
                            document.getElementById("demo2").style.visibility = "hidden";
                            document.getElementById("demo2").innerHTML = "hello ";
                        } 
             else  {  if (!regex.test(val)) {
                                document.getElementById("demo2").style.visibility = "visible"
                                document.getElementById("demo2").innerHTML = "<span style=color:red;font-size:16px>please enter valid password consisting of uppercase letters, lowercase letters and number and upto 8 characters</span>";
                            } else {
                                document.getElementById("demo2").style.visibility = "hidden"
                                document.getElementById("demo2").innerHTML = "hello "
                            }}
                }
                    </script>

<div class="my-label required "><i class="fa fa-lock" style="font-size:22px;padding-left:2%;padding-top:4%"></i>
                        <input type="password" id="confirm_password" placeholder="Confirm_password" name="confirm_password" oninput="myfunction5(this.value)">
                    </div>
                    <div id="demo6">hello</div>
                </span>




                
                <script>
                    var myInput = document.getElementById("password");
                    var myInput2 = document.getElementById("confirm_password");
                    var letter = document.getElementById("letter");
                    var capital = document.getElementById("capital");
                    var number = document.getElementById("number");
                    var length = document.getElementById("length");
                    var conf = document.getElementById("co");
                    function myfunction5(val) {
                        var regex = /^\s*$/;
                        if (regex.test(val)) {
                            document.getElementById("demo6").style.visibility = "hidden";
                            document.getElementById("demo6").innerHTML = "hello ";
                        } else {
                            if (val != myInput.value) {
                                <?php $count = 1 ?>
                                document.getElementById("demo6").style.visibility = "visible";
                                document.getElementById("demo6").innerHTML = "<span style=color:red;font-size:16px>Please enter same password</span>";

                            } else {

                                document.getElementById("demo6").style.visibility = "hidden";
                                document.getElementById("demo6").innerHTML = " hello";
                            }
                        }
                    }
                    
     


                    // When the user clicks on the password field, show the message box
                </script>

<span>
                 
                <script>
                    function myfun35(val) {
                        var regex = /^\s*$/;
                        if (regex.test(val)) {
                            document.getElementById("demo14").style.visibility = "visible";
                            document.getElementById("demo14").innerHTML = "<span style=color:red;font-size:16px>please agree to our policy</span>";
                            event.preventDefault();
                        } else {
                            document.getElementById("demo14").style.visibility = "hidden";
                            document.getElementById("demo14").innerHTML = " hello";
                        }
                    }
                </script>
               
                <script>
                    function myfunw(suc2) {
                        check = document.getElementById("suc2");
                        if (check.checked) {
                            document.getElementById("suc").style.visibility = "hidden"
                            document.getElementById("suc").innerHTML = "hello ";
                            document.getElementById("suc2").value = "hii"
                        } else {
                            document.getElementById("suc").style.visibility = "visible";
                            document.getElementById("suc").innerHTML = "<span style=color:red;font-size:16px>please agree to our policy</span>";
                            document.getElementById("suc2").value = " "

                        }
                    }
                </script>



                </span>


                <p>
                <div class="sub">
                    <input class="submit" type="submit" value="Submit" style="height:30px; width:255px">
                </div>

                </p>
                  <?php echo $error?>
            </fieldset>
        </form>
</div>
</body>

</html>

<script>
    <?php if (isset($_POST['username'], $_POST['lastname'], $_POST['firstname'], $_POST['email'], $_POST['password']) && $count < 1) { ?>
        document.getElementById("success").innerHTML = "<span style=color:white> Registered Successfully</span>";
    <?php } ?>
</script>
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



<?php 

$conn = new mysqli("localhost", "root", "Test@1234","geekdatas");

if(isset($_POST['password'])){
	$email =  SHA1($_POST['password']);
    echo "hii";
    echo $_SESSION["email"];
	$sql = "update users set password='$email' where email='$_SESSION[email]'";

	$res = mysqli_query($conn, $sql);
    if($conn->query($sql)===TRUE)
    { echo "success";
     }
    else{
        echo "error";
    }
	
}

   

?>