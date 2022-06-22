
    function GEEKFORGEEKS() 
    {
        let  id = document.forms["RegForm"]["id"];
        let username = document.forms["RegForm"]["username"];
        var password = document.forms["RegForm"]["password"];
        var what = document.forms["RegForm"]["Subject"];
        var password = document.forms["RegForm"]["Password"];
        var address = document.forms["RegForm"]["Address"];
  
        if (id.value == "") {
            window.alert("Please enter your id.");
            name.focus();
            return false;
        }
  
        if (username.value == "") {
            window.alert("Please enter your username.");
            address.focus();
            return false;
        }
  
        if (password.value == "") {
            window.alert(
              "Please enter a valid password");
            email.focus();
            return false;
        }return true;
    }
