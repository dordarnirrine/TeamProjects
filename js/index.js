
function choosePage(){
    //var user = document.getElementById("form-user").value;
    //var pass = document.getElementById("form-pass").value;\console.log(user + pass);
    var element = document.getElementsByClassName("form-input");
    var user = element[0];
    var pass = element[1];
    
    switch(user.value){
        case "analyst":
            document.location.href = "analyst.html";
            break;
        case "specialist":
            break;
        default:
            loginFailed(true);
    }
}

function loginFailed(b){
    var text = document.getElementsByClassName("form-failed");
    console.log(text[0].value);
    if (b) {
        text.value = "Login Failed! Wrong Username / Password";
    }
    else{
        text.value = "";
    }
    return b;
}