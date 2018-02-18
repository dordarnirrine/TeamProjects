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
                <a class="nav-link" href="AddTicket.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                  Add Ticket
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                  View Tickets
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="EditTicket.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                  Edit Ticket
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-6 ml-sm-auto col-lg-10 pt-3 px-4 bg-light">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">View Tickets</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
          </div>  
          <div class="col h-5"> </div>
          <div class="col-md-12 ml-sm-12">

          <script>
                    $(document).ready(function() {
                        $('#example').DataTable();
                    } );
                </script>

                <table id="example" class="table table-bordered table-hover">        
                    <thead>
                        <tr class="thead-dark">
                            <th class="w-15">ID</th>
                            <th>Description</th>
                            <th>Start Date</th>
                            <th>Start Time</th>
                            <th>Problem Type </th>
                            <th>Solved</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Replace this with call to php page getProblems.php
                            $res = '[{"ProblemNum":"1","ProbDesc":"Computer has stopped printing to the printer","StartDate":"2018-02-05","StartTime":"09:00:00","ProbType":"Printing"},{"ProblemNum":"2","ProbDesc":"Computer is unable to connect to the internet.","StartDate":"2018-02-02","StartTime":"16:00:00","ProbType":"Networking"},{"ProblemNum":"3","ProbDesc":"Microsoft word is unable to import images into the word document","StartDate":"2018-02-01","StartTime":"08:00:00","ProbType":"Software"},{"ProblemNum":"4","ProbDesc":"Disk drive is stuck and wont eject disk from computer","StartDate":"2018-02-01","StartTime":"10:00:00","ProbType":"Hardware"}]';
                            
                            // getUnSolvedProblems.php
                            $unsolvedRes = '[{"ProblemNum":"3","ProbDesc":"Microsoft word is unable to import images into the word document","StartDate":"2018-02-01","StartTime":"08:00:00","ProbType":"Software","ProbNum":null,"SolDate":null,"SolTime":null,"SolDesc":null},{"ProblemNum":"4","ProbDesc":"Disk drive is stuck and wont eject disk from computer","StartDate":"2018-02-01","StartTime":"10:00:00","ProbType":"Hardware","ProbNum":null,"SolDate":null,"SolTime":null,"SolDesc":null},{"ProblemNum":"5","ProbDesc":"Printer is has a paper jam","StartDate":"2018-02-08","StartTime":"05:36:14","ProbType":"Printing","ProbNum":null,"SolDate":null,"SolTime":null,"SolDesc":null}]';
                            // getSolvedProblems.php
                            $solvedRes = '[{"ProblemNum":"1","ProbDesc":"Computer has stopped printing to the printer","StartDate":"2018-02-05","StartTime":"09:00:00","ProbType":"Printing","ProbNum":"1","SolDate":"2018-02-15","SolTime":"14:00:00","SolDesc":"Turned printer off and on again."},{"ProblemNum":"2","ProbDesc":"Computer is unable to connect to the internet.","StartDate":"2018-02-02","StartTime":"16:00:00","ProbType":"Networking","ProbNum":"2","SolDate":"2018-02-14","SolTime":"15:00:00","SolDesc":"Plugged in ethernet cable."}]';


                            // Take into account Assigned Specialists `SpecProb`
                            $res = (json_decode($unsolvedRes, true));

                            foreach($res as $spec){
                                echo "<tr>";
                                echo "<td> " . $spec["ProblemNum"] . "</td>";
                                echo "<td> " . $spec["ProbDesc"] . "</td>";
                                echo "<td> " . $spec["StartDate"] . "</td>";
                                echo "<td> " . $spec["StartTime"] . "</td>";  
                                echo "<td> " . $spec["ProbType"] . "</td>";  
                                echo "<td> No </td>";                            
                                echo "</tr>";
                            }

                            $res = (json_decode($solvedRes, true));

                            foreach($res as $spec){
                                echo "<tr>";
                                echo "<td> " . $spec["ProblemNum"] . "</td>";
                                echo "<td> " . $spec["ProbDesc"] . "</td>";
                                echo "<td> " . $spec["StartDate"] . "</td>";
                                echo "<td> " . $spec["StartTime"] . "</td>";  
                                echo "<td> " . $spec["ProbType"] . "</td>";  
                                echo "<td> Yes </td>";                            
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>

          </div>
    </body>
</html>