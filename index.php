<!--This file is the login page of the help desk system. It was created by Jon Nuttall, Jordan Irvine and Henry Cornelius -->
<!DOCTYPE HTML SYSTEM>
<html>
    <head>
    	<title>Helpdesk Login.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link href="css/bootstrap.min.css" rel="stylesheet"/>
    </head>

    <body>
    <div class="row">
        <nav class="col-sm-2 d-none d-md-block bg-dark sidebar h-100">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="https://getbootstrap.com/docs/4.0/examples/dashboard/#"> <h1 class="text-light col-sm"> Make-It All </h1> </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="https://getbootstrap.com/docs/4.0/examples/dashboard/#"> </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="https://getbootstrap.com/docs/4.0/examples/dashboard/#"> </a>
              </li>
            </ul>

            <h5 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Navigation</span>
              <a class="d-flex align-items-center text-muted" href="https://getbootstrap.com/docs/4.0/examples/dashboard/#">
              </a>
            </h5>
          </div>
        </nav>

        <main role="main" class="col-md-6 ml-sm-auto col-lg-10 pt-3 px-4 bg-light">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Login</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
          </div>  
          <div class="col h-25"> </div>
          <div class="col-md-8 ml-sm-auto row align-items-center">
            <div class="wrapper">
                <form action="LoginVerify.php" method="post" name="LoginForm" class="form-signin"> <!--Sends form data to the login verifying page once the login button is pressed.-->      
                    <h3 class="form-signin-heading"> <img src="img/logo.png" class="" style="margin-left:55px;width:180px;height:180px;"></h3>
                    <hr><br>
                    <label for="Username">Username</label>
                    <input type="text" class="form-control" style="width: 300px;" name="Username" placeholder="Username" required="" autofocus="" id="Username" value="Username" /><!--Box for user to enter username-->
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" name="Password" placeholder="Password" required="" id="Password" value=""/><!--Box for user to enter password-->     		  
                    <br>
                    <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Login</button> <!--Button for user to press to log in--> 			
                </form>			
            </div>
          </div>
    </body>
</html>