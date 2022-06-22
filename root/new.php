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
    <link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

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
                    firstname: "<br/> <span style= margin-top:2px;color:red;font-size:12px>Please enter your firstname</span>",
                    lastname: "<br/><span style=color:red;font-size:12px>Please enter your lastname </span>",
                    username: {
                        required: "<br/><span style=margin-top:2px; color:red;font-size:12px>Please enter a username </span>",
                        minlength: "Your username must consist of at least 2 characters"
                    },
                    password: {
                        required: "<br/><span style=margin-top:2px;color:red;font-size:12px>Please enter a password </span>",
                        minlength: "<br/><span style=color:red;font-size:12px>your password must atleast of 8 characters</span>"
                    },
                    confirm_password: {
                        //required : "</br><span style=color:red;font-size:12px>Please enter a password</span>",
                        //minlength : "</br><span style=color:red;font-size:12px>Your password must be consist of at least 8 characters</span>",
                        equalTo: "</br>"
                    },




                    email: {
                        required: "</br><span style=color:red;margin-top:2px;font-size:12px;visibility:visible> please enter email</span>",
                        email: "</br><span style=color:red;margin-top:2px;font-size:14px> please enter valid email</span>"
                    },
                    // ujk: {required:"<span style=color:red;font-size:12px>Please accept our policy</span>"},
                    role: {
                        required: "</br><span style=color:red;margin-top:2px;font-size:12px>Please enter role</span>"
                    },
                },



            });
        });
    </script>
</head>

<div class="header">
    <a  class="logo">Library</a>
    <div class="header-right">
    <a style="background-color:lightgrey;font-weight:bold" >Registration</a>
        <a href="login.php">Login</a>
    </div>
</div>


<div class="form-1">

    <body>
        <form name="myForm" class="cmxform" id="signupForm" method="post" autocomplete="off" onsubmit="  validateForm(event)">
            <div class="h1">
                <h1>Sign Up Form </h1>
            </div>
            <p id="newemail"></p>

            <p id="success"></p>

            <script>
                $('#success').fadeIn('fast').delay(1000).fadeOut('fast');
            </script>



            <fieldset style="width:400px;padding:30px; text-align:center">




                <span>
                    <div class="my-label required"><i class="fa fa-user" style="font-size:22px;padding-left:2%;padding-top:3%;"></i>
                        <input id="username" name="username" type="text" placeholder="Username" oninput="myfunction3(this.value)" value="<?php echo $_POST['username'] ?>"></input>
                    </div>
                    <div id="demo3">hello</div>
                </span>
                <script>
                    function myfunction3(val) {
                        if (val.length > 20) {


                            document.getElementById("demo3").style.visibility = "visible"
                            document.getElementById("demo3").innerHTML = "<span style=color:red;font-size:16px; margin-top:2px;>please enter characters only upto 20</span>";

                            //else{
                            //document.getElementById("demo").innerHTML="";
                            // }
                        } else {
                            var regex= /^[a-z0-9_\-]+$|^\s*$/
                            if(val.match(regex)){
                                document.getElementById("demo3").style.visibility = "hidden"
                            document.getElementById("demo3").innerHTML = "<span style=color:red;margin-top:2px;font-size:16px>please enter characters only lowercase letters</span>"
                            }
                            else{document.getElementById("demo3").style.visibility = "visible"
                            document.getElementById("demo3").innerHTML = "<span style=color:red;margin-top:2px;font-size:16px>please enter characters only lowercase letters</span>";

                            }

                        }
                    }
                </script>
                <span>

                    <div class="my-label required"> <i class="fa fa-envelope"  style="font-size:20px;margin-top:2px;padding-left:1%;padding-top:3%"></i>
                        <input id="email" name="email" placeholder="Email" type="text" oninput="myfun8(this.value)"value="<?php echo $_POST['email'] ?>"></input>
                    </div>
                    <div id="demo10">hello</div>
                </span>
                <script>
                    function myfun8(val) {
                        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; {
                            if (!emailReg.test(val)) {
                                document.getElementById("demo10").style.visibility = "visible"
                                document.getElementById("demo10").innerHTML = "<span style=color:red;margin-top:2px;font-size:16px>please enter valid email</span>";
                            } else {
                                document.getElementById("demo10").style.visibility = "hidden"
                                document.getElementById("demo10").innerHTML = "hello "
                            }


                        }
                    }
                </script>


                <span>
                    <div class="my-label required"> <i class="fa fa-lock" style="font-size:22px;margin-top:2px;padding-left:2%;padding-top:3%"></i>
                        <input type="password" id="password" placeholder="Password" name="password" oninput="myfun82(this.value)"value="<?php echo $_POST['password'] ?>"> <i class="bi bi-eye-slash" 
                    id="togglePassword"style=" margin-top:3%;margin-left: -30px; cursor: pointer;"></i>
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
                                document.getElementById("demo2").innerHTML = "<span style=color:red;margin-top:2px;font-size:16px>please enter valid password consisting of uppercase letters, lowercase letters and number and upto 8 characters</span>";
                            } else {
                                document.getElementById("demo2").style.visibility = "hidden"
                                document.getElementById("demo2").innerHTML = "hello "
                            }}
                }
                    </script>

<script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle('bi-eye');
        });
</script>




                <span>
                <div class="my-label required"> <i class="fa fa-lock" style="font-size:22px;padding-left:2%;padding-top:2%"></i>
                        <input  type="password" id="confirm_password" placeholder=" Confirm_Password" name="confirm_password" oninput="myfunction5(this.value)" value="<?php echo $_POST['password']?>">   <i class="bi bi-eye-slash" 
                    id="password2" style=" margin-top:3%;margin-left:-30px; cursor: pointer;" onclick=myfun()></i>
                    </div>
                    <div id="demo6">hello</div>
                </span>
                <script>
                    function myfun()

        {
            const togglePassword = document.getElementById("#togglePassword1");
            const password = document.querySelector("#confirm_password");

       
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text":"password";
            password.setAttribute("type", type);
                  
         
            // toggle the icon
         
        }</script>
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
                                document.getElementById("demo6").innerHTML = "<span style=color:red;margin-top:2px;font-size:16px>Please enter same password</span>";

                            } else {

                                document.getElementById("demo6").style.visibility = "hidden";
                                document.getElementById("demo6").innerHTML = " hello";
                            }
                        }
                    }
                    // When the user clicks on the password field, show the message box
                </script>


                <script>
                    function myfun35(val) {
                        var regex = /^\s*$/;
                        if (regex.test(val)) {
                            document.getElementById("demo14").style.visibility = "visible";
                            document.getElementById("demo14").innerHTML = "<span style=color:red;margin-top:2px;font-size:16px>please agree to our policy</span>";
                            event.preventDefault();
                        } else {
                            document.getElementById("demo14").style.visibility = "hidden";
                            document.getElementById("demo14").innerHTML = " hello";
                        }
                    }
                </script>
                <span> <div id="tr"><small> <input type="checkbox" style="padding-right:5%"name="submit" value=" " class="ujk" id="suc2" onclick="myfunw(this)"></input><a href='policies.html'style='padding-right:5%'>
 'Terms and Conditions</a></small>
                </div>    <div id="suc">hello</div>
                </span>
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
                    <input class="submit" type="submit" value="Submit" style="margin-right:50px;height:30px; width:80px">
                </div>

                </p>

            </fieldset>
        </form>
</div>
</body>

</html>
<script>
window.onload = function(){
        $(function(){
  
  $('#password2').click(function(){
 
    const list = document.querySelector("#password2").classList;
      console.log(list);    
          list.toggle('bi-eye');
        })})}</script>
<?php $selected = $_POST['role'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "Test@1234");
    $db = mysqli_select_db($conn, "geekdatas");
    // username and password sent from form 

    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];
    $email = $_POST['email'];

    $sql4 = "SELECT *FROM users WHERE email = '$email' ";

    $result = mysqli_query($conn, $sql4);

    //$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //$active = $row['active'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($count > 1 && $_POST["email"] != '') {
?> <script>
            document.getElementById("newemail").innerHTML = "<span style=color:white> email exists</span>";
        </script><?php   } else {

                    if (isset($_POST['username'])) {
                        $conn = new mysqli("localhost", "root", "Test@1234");
                        $db = mysqli_select_db($conn, "geekdatas");

                        $sql = "INSERT INTO Roles(role) value ('$_POST[role]')";
                        if ($conn->query($sql) === TRUE) {
                            echo " ";
                        } else {
                            echo "Error creating table: " . $conn->error;
                        }
                        $sql6 = "INSERT INTO user_profiles(Email,username)
                            VALUES ('$_POST[email]','$_POST[username]')";
                        if ($conn->query($sql6) === TRUE) {
                            echo " ";
                        } else {
                            echo "Error creating table: " . $conn->error;
                        }
                        $sql2 = "SELECT Roleid from Roles where role='$_POST[role]'";
                        $query_run = mysqli_query($conn, $sql2);
                        while ($row = mysqli_fetch_assoc($query_run))
                            $id = $row['Roleid'];


                        $pass = SHA1($_POST['password']);
                        $sql1 = "INSERT INTO users ( password,email,user_id)
   VALUES ( '$pass','$_POST[email]','$id')";


                        if ($conn->query($sql1) === TRUE) {
                            echo " ";
                        } else {
                            echo "Error creating table: " . $conn->error;
                        }
                    }
                }
            }







                    ?>
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
            document.getElementById("demo3").innerHTML = "<span style=color:red;font-size:16px;>please enter user name </span>";
            event.preventDefault();
        }
        if (regex.test(x4)) {
            document.getElementById("demo10").style.visibility = "visible";
            document.getElementById("demo10").innerHTML = "<span style=color:red;font-size:16px;margin-top:2px;>please enter email </span>";
            event.preventDefault();
        }
        if (regex.test(x5)) {
            document.getElementById("demo2").style.visibility = "visible";
            document.getElementById("demo2").innerHTML = "<span style=color:red;font-size:16px;margin-top:2px;>please enter password </span>";
            event.preventDefault();
        } else  {  if (!regex2.test(x5)) {
                                document.getElementById("demo2").style.visibility = "visible"
                         document.getElementById("demo2").innerHTML = "<span style=color:red;font-size:16px;margin-top:2px;>please enter valid password consisting of uppercase letters, lowercase letters and number and upto 8 characters</span>";
                        event.preventDefault();    } else {
                                document.getElementById("demo2").style.visibility = "hidden"
                                document.getElementById("demo2").innerHTML = "hello "
                            }}



    

    //if(regex.test(x6)){document.getElementById("demo14").style.visibility="visible";
    //document.getElementById("demo14").innerHTML = "<span style=color:red;font-size:12px>please enter role </span>";

    //event.preventDefault();  }
    if (regex.test(x7)) {
        document.getElementById("demo6").style.visibility = "visible";
        document.getElementById("demo6").innerHTML = "<span style=color:red;font-size:16px;margin-top:2px;>please enter confirm password</span>";
        event.preventDefault();
    }

    if (regex.test(x8)) {
        document.getElementById("suc").style.visibility = "visible";
        document.getElementById("suc").innerHTML = "<span style=color:red;font-size:16px;margin-top:2px;>please agree our policy</span>";
        event.preventDefault();
    } else {
        document.getElementById("suc").style.visibility = "hidden"
        document.getElementById("suc").innerHTML = "hello ";
        document.getElementById("suc2").value = "hii"
    } }
</script>