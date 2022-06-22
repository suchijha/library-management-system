<?php

// Start the session
session_start();


$conn = new mysqli("localhost", "root", "Test@1234","geekdatas");


 
 if(isset($_POST['email'])){
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = $_POST['email'];
      $mypassword = $_POST['password'];
      $password=SHA1($_POST['password']);
      $_SESSION["email"]=$_POST['email'];
   if(empty($myusername)){
       echo "empty";
   }else{
       echo $_SESSION["email"];
   }
      
      

      $sql = "SELECT  user_id  FROM users WHERE email = '$myusername'";
      $result = mysqli_query($conn,$sql);
     
      
      $count = mysqli_num_rows($result);
      
      
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count >= 1) {
       // $row=mysqli_fetch_assoc($result);
        $row = $result -> fetch_assoc();

        $id=$row["user_id"];
       
      $sql = "SELECT * FROM users WHERE password= '$password'";
      
      $result = mysqli_query($conn,$sql);
    
      
      $count1 = mysqli_num_rows($result);
      
         if($count1>=1)
        { 
         // $result=mysqli_query($conn,$sql);
          
          $SQL="SELECT role from Roles where Roleid='$id'";
          $result = mysqli_query($conn,$SQL);
          $row=mysqli_fetch_assoc($result);
        $id=$row['role'];
        echo $id;
        if($id=='admin')
         {$_SESSION['login_user'] = $myusername;
         echo "hi";
         echo "<script>window.location.href='dashboard.php';</script>";}
        else{
           
            
            echo "<script>window.location.href='student1.php';</script>"; 
     
        }
        
        }
         else{
             $error1="<span style=color:red;font-size:14px>invalid password</span>";
         }
      }
      else {
         $error = "<span style=color:red;font-size:14px ;visibility:visible> email not found</span>";
         
      }
      
   }}
   ?>
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
        $(document).ready(function() {

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
                    firstname: "<br/> <span style=color:red;font-size:14px;margin-top:5px>Please enter your firstname</span>",
                    lastname: "<br/><span style=color:red;font-size:14px;margin-top:5px>Please enter your lastname </span>",
                    username: {
                        required: "<br/><span style=color:red;font-size:14px;margin-top:5px>Please enter a username </span>",
                        minlength: "Your username must consist of at least 2 characters"
                    },
                    password: {
                        required: "<br/><span style=color:red;font-size:14px;margin-top:5px>Please enter a password </span>",
                        minlength: "<br/><span style=color:red;font-size:14px;margin-top:5px>your password must atleast of 8 characters</span>"
                    },
                    confirm_password: {
                        //required : "</br><span style=color:red;font-size:12px>Please enter a password</span>",
                        //minlength : "</br><span style=color:red;font-size:12px>Your password must be consist of at least 8 characters</span>",
                        equalTo: "</br>"
                    },




                    email: {
                        required: "</br><span style=color:red;font-size:14px;margin-top:5px;visibility:visible> please enter email</span>",
                        email: "</br><span style=color:red;font-size:14px;margin-top:5px> please enter valid email</span>"
                    },
                    // ujk: {required:"<span style=color:red;font-size:12px>Please accept our policy</span>"},
                    role: {
                        required: "</br><span style=color:red;font-size:14px;margin-top:5px>Please enter role</span>"
                    },
                },



            });
        });
    </script>
</head>

<div class="header">
    <a href="#default" class="logo">Library</a>
    <div class="header-right">
    <a style="background-color:lightgray;font-weight:bold" >Login</a>
        <a href="new.php">Registration</a>
    </div>
</div>


<div class="form-3">

    <body>
        <form name="myForm" class="cmxform3" id="signupForm" method="post" autocomplete="off" onsubmit="  validateForm(event)">
            <div class="h1">
                <h1>Login Form </h1>
            </div>
            <p id="newemail"></p>

            <p id="success"></p>

            <script>
                $('#success').fadeIn('fast').delay(1000).fadeOut('fast');
            </script>



            <fieldset style="width:400px;padding:20px">




                <script>
                    function myfunction3(val) {
                        if (val.length > 20) {


                            document.getElementById("demo3").style.visibility = "visible"
                            document.getElementById("demo3").innerHTML = "<span style=color:red;font-size:14px;margin-top:5px>please enter characters only upto 20</span>";

                            //else{
                            //document.getElementById("demo").innerHTML="";
                            // }
                        } else {
                            var regex= /^[a-z0-9_\-]+$|^\s*$/
                            if(val.match(regex)){
                                document.getElementById("demo3").style.visibility = "hidden"
                            document.getElementById("demo3").innerHTML = "<span style=color:red;font-size:14px;margin-top:5px>please enter characters only lowercase letters</span>"
                            }
                            else{document.getElementById("demo3").style.visibility = "visible"
                            document.getElementById("demo3").innerHTML = "<span style=color:red;font-size:14px;margin-top:5px>please enter characters only lowercase letters</span>";

                            }

                        }
                    }
                </script>
                <span>

                    <div class="my-label required"> <i class="fa fa-envelope" style="font-size:18px;padding-top:3%"></i>
                        <input id="email" name="email" placeholder="Email" value="<?php echo $_POST['email']; ?>" oninput="myfun8(this.value)"
                      ></input>
                    </div>
                  
                    <div id="demo20"><div id="demo75"><?php echo $error;echo "<span style=font-size:14px;margin-top:5px;visibility:hidden;>hii</span>"?></div></div>
               
              

                </span>
                <script>
      
                    function myfun8(val) {
                        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; {
                            if (!emailReg.test(val)) {
                                document.getElementById("demo20").style.visibility = "visible"
                                document.getElementById("demo20").innerHTML = "<span style=color:red;font-size:14px;margin-top:5px>please enter valid email</span>";
                            } else {
                                
                                
                                
                                document.getElementById("demo20").style.visibility = "hidden"
                                document.getElementById("demo20").innerHTML = "hello "
                            }
                               
                        }
                    }
                </script>


                <span>
                    <div class="my-label required"> <i class="fa fa-lock" style="font-size:22px;padding-top:2%"></i>
                        <input  type="password" id="password1" placeholder="Password" name="password" oninput="myfun82(this.value)" value="<?php echo $_POST['password']?>">   <i class="bi bi-eye-slash" 
                    id="togglePassword"style=" margin-top:3%;margin-left: -30px; cursor: pointer;"></i>
                  
                    
                    </div>

                    <div id="demo15"><div id="demo25"><?php echo $error1;echo "<span style= font-size:14px;visibility:hidden;margin-top:5px>hii</span>";?></div></div>
                    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password1");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle('bi-eye');
        });
</script>
                    

                    
               
               
                </span>
                <script> 
               function myfun82(val){
                  var regex=  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/
                  var regex2 = /^\s*$/;
                  if (regex2.test(val)) {
                            document.getElementById("demo15").style.visibility = "hidden";
                            document.getElementById("demo15").innerHTML = "hello ";
                        } 
             else  {  if (!regex.test(val)) {
                                document.getElementById("demo15").style.visibility = "visible"
                                document.getElementById("demo15").innerHTML = "<span style=color:red;font-size:14px;margin-top:5px> enter valid password upto 8 characters including uppercase and lowercase letters with numbers</span>";
                            } else {
                                document.getElementById("demo15").style.visibility = "hidden"
                                document.getElementById("demo15").innerHTML = "hello "
                            }}
                }
                    </script>






                
                <script>
                    var myInput = document.getElementById("password");
                    var myInput2 = document.getElementById("confirm_password");
                    var letter = document.getElementById("letter");
                    var capital = document.getElementById("capital");
                    var number = document.getElementById("number");
                    var length = document.getElementById("length");
                    var conf = document.getElementById("co");
                    
     


                    // When the user clicks on the password field, show the message box
                </script>


                <script>
                    function myfun35(val) {
                        var regex = /^\s*$/;
                        if (regex.test(val)) {
                            document.getElementById("demo14").style.visibility = "visible";
                            document.getElementById("demo14").innerHTML = "<span style=color:red;font-size:14px;margin-top:5px>please agree to our policy</span>";
                            event.preventDefault();
                        } else {
                            document.getElementById("demo14").style.visibility = "hidden";
                            document.getElementById("demo14").innerHTML = " hello";
                        }
                    }
                </script>
                <span>   <div id="suc"></div>
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
                            document.getElementById("suc").innerHTML = "<span style=color:red;font-size:14px;margin-top:5px>please agree to our policy</span>";
                            document.getElementById("suc2").value = " "

                        }
                    }
                </script>



                </span>


              <span>
                <div class="sub">
                    <input class="submit1" type="submit" value="Submit" style="margin-right:20px;height:30px; width:80px">
                </div>
                </span>
       
                 
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
    function validateForm(event) {

        let x4 = document.forms["myForm"]["email"].value;
        let x5 = document.forms["myForm"]["password"].value;
        // let x6=document.forms["myForm"]["role"].value;
        
        var regex = /^\s*$/;
        var regex2=  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/

        if (regex.test(x4)) {
            document.getElementById("demo20").style.visibility = "visible";
            document.getElementById("demo20").innerHTML = "<span style=color:red;font-size:14px;margin-top:5px>please enter email </span>";
            event.preventDefault();
        }
        if (regex.test(x5)) {
            document.getElementById("demo15").style.visibility = "visible";
            document.getElementById("demo15").innerHTML = "<span style=color:red;font-size:14px;margin-top:5px>please enter password </span>";
            event.preventDefault();
        } else  {  if (!regex2.test(x5)) {
                                document.getElementById("demo15").style.visibility = "visible"
                         document.getElementById("demo15").innerHTML = "<span style=color:red;font-size:12px;margin-top:5px>please enter valid password consisting of uppercase letters, lowercase letters and number and upto 8 characters</span>";
                        event.preventDefault();    } else {
                                document.getElementById("demo15").style.visibility = "hidden"
                                document.getElementById("demo15").innerHTML = "hello "
                            }}



                        }

    //if(regex.test(x6)){document.getElementById("demo14").style.visibility="visible";
    //document.getElementById("demo14").innerHTML = "<span style=color:red;font-size:12px>please enter role </span>";

    //event.preventDefault();  }
    
</script>



