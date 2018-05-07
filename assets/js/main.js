function validateForm() 
{
    var checkName = document.forms["myForm"]["name"].value;
    var checkEmail = document.forms["myForm"]["email"].value;
    var checkMessage = document.forms["myForm"]["message"].value;

    var errorName = document.getElementById("name_error");
    var errorEmail = document.getElementById("email_error");
    var errorMessage = document.getElementById("message_error");
    
    var trimName = checkName.trim();
    var trimEmail = checkEmail.trim();
    var trimMessage = checkMessage.trim();
    var at = "@";
    var dot = ".";  

    if (trimName == "")
    { 
     name_error.textContent = "Name is required";
     return false;
    }

    if (trimEmail == "" || trimEmail.indexOf(at) == -1 || trimEmail.indexOf(dot) == -1 || trimEmail.indexOf(at) > trimEmail.indexOf(dot))
    {
    email_error.textContent = "Valid email is required";
    return false;
    }
    if (trimMessage == "")
    { 
    message_error.textContent = "Message is required";
    return false;
    }  

}