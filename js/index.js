
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


function loginFailed(b){
    var text = document.getElementsByClassName("form-failed")[0];
    console.log(text);
    if (b) {
        text.textContent = "Incorrect Username or Password";
    }
    else{
        text.textContent = "";
    }
    return b;
}