<!--
AddTickets.php - Created by Jon Nuttall
Front facing menus for Adding a new ticket to the database
-->
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-datatable.css" rel="stylesheet"> 

        <script src="js/jquery-latest.js"></script>
        <script src="js/jquery-datatable.js"></script>
        <script src="js/bootstrap.datatable.js"> </script>
    </head>

    <body>
    <div class="row">
        <nav class="col-sm-2 d-none d-md-block bg-dark sidebar h-100">
        <a class="nav-link active" href=""> <h1 class="text-light col-sm"> Make-It All </h1> </a>
          <div class="sidebar-sticky">

            <h5 class="d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-light">
              <span>Navigation</span>
            </h5>
            <ul class=" nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="Spec.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    Specialists
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                  Add Ticket
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ViewTickets.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                  View Tickets
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ViewSolutions.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                  View Solutions
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="EditTicket.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                  Edit Ticket
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="CallLog.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                Call Log
                </a>
              </li>
              <li class="nav-item">                
                <a class="nav-link" href="index.php"> 
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                Sign Out
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-6 ml-sm-auto col-lg-10 pt-3 px-4 bg-light">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Add Ticket</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
          </div>  
          <div class="col h-5"> </div>
          <div class="col-md-12 ml-sm-12">

            <form action="AddTicket-Query.php" method="post">
                <div class="form-group">
                    <label for="ProblemID">ID:</label>
                    <input type="ProblemID" class="form-control" id="ProblemID" name="id">
                </div>
                <div class="form-group">
                    <label for="CallerName">Caller Name:</label>
                    <input type="callername" class="form-control" id="callername" name="caller">
                </div>
                <div class="form-group">
                    <label for="Description">Description of Problem:</label>
                    <textarea type="desc" class="form-control" id="desc" name="desc"> </textarea>
                </div>
                <div class="form-group">
                    <label for="CallbackNum">Callback Number:</label>
                    <input type="callbacknum" class="form-control" id="callbacknum" name="callbacknum">
                </div>
                <div class="form-group">
                    <label for="CallbackReason">Reason for Callback:</label>
                    <input type="callback" class="form-control" id="callback" name="callback">
                </div>     
                <div class="form-group">
                    <label for="ProblemType">Problem Type:</label>
                    <select type="problemtype" class="form-control" id="problemtype" name="type">
                        <?php
                            // getProblemTypes
                            ob_flush(); # As we're using the output buffer to grab data from out api, we clear and flush it to ensure we only get out data
                            ob_start(); # And then restart the buffer for output again
                            include "metricsPHP/getProblemTypes.php"; 
                            $res = ob_get_clean(); # This then grabs the current buffer and clears it
                            $res = json_decode($res, true);

                            foreach($res as $type){
                                echo "<option> " . $type["ProblemType"] . "</option>";
                            }
                        ?>
                    </select>
                </div>

                  <div class="form-group">
                    <label for="Hardware Type">Hardware Type:</label>
                    <select type="HardwareType" class="form-control" id="HardwareType" name="htype">
                    <option> None </option>
                        <?php
                            // getProblemTypes
                            ob_flush(); # Same as above
                            ob_start();
                            include "metricsPHP/getEquipment.php";
                            $res = ob_get_clean();
                            $res = json_decode($res, true);

                            foreach($res as $type){
                                echo "<option> " . $type["SerialNo"] . " - " . $type["Type"] . " - " . $type["Make"] . " - " . $type["Model"] . "</option>";
                            }
                        ?>
                    </select>
                  </div>    

                  <div class="form-group">
                    <label for="Software Type">Software Type:</label>
                    <select type="Software" class="form-control" id="SoftwareType" name="stype">
                    <option> None </option>
                        <?php
                            // getProblemTypes
                            ob_flush(); # Same as Above
                            ob_start();
                            include "metricsPHP/getSoftware.php";
                            $res = ob_get_clean();
                            $res = json_decode($res, true);

                            foreach($res as $type){
                                echo "<option> " . $type["License"] . " - " . $type["Name"] . " - " . $type["Type"] . "</option>";
                            }
                        ?>
                    </select>
                  </div>    

                <div class="form-group">
                    <label for="AssignedSpec">Assigned Specialist:</label>
                    <select type="assignedspec" class="form-control" id="assignedspec" name="spec">
                        <option> None </option>
                        <?php
                            // specInfo.php
                            ob_flush(); # Same as above
                            ob_start();
                            include "metricsPHP/specInfo.php";
                            $res = ob_get_clean();            
                            $res = (json_decode($res, true));

                            foreach($res as $spec){
                                echo "<option> #" . $spec["SpecilailistID"] . " - " . $spec["Name"] . "</option>";                       
                            }
                        ?>
                    </select>
                </div>      
                <button type="submit" class="btn btn-primary">Submit</button>
            </form> 

          </div>
    </body>
</html>