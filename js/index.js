
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
            document.location.href = "Spec.html";
            break;
        case "help desk":
            document.location.href = "Opp.html";
            break;
        default:
            loginFailed(true);
    }
}

var text = document.getElementsByClassName("form-failed");
function loginFailed(b){
    
    console.log(text.value);
    if (b) {
        text.value = "Login Failed! Wrong Username / Password";
    }
    else{
        text.value = "";
    }
    return b;
}