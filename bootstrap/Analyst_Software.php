<!-- Written by Sam Thompson B619450-->
<!-- Used to display the software data to the analyst-->
<!-- The analyst can choose a piece of software, and data and charts are shown about that piece of software-->
<!-- Data is displayed in both bullet point form -->
<!-- And in the form of two graphs 1.Comparison of number of current problems 2.Number of prblems/time for the chosen software-->


<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-datatable.css" rel="stylesheet"> 

        <script src="js/jquery-latest.js"></script>
        <script src="js/jquery-datatable.js"></script>
        <script src="js/bootstrap.datatable.js"> </script>
        <script src="Chart.min.js"></script>
        <style>
            select {
                margin:10px;
            }

            option{
                margin:5px;
            }

            #ChooseSoftPanel{
               margin:10px;
               margin-left:15px;
                padding:3px;
                height:450px;
                width:350px;
                border:solid;
                border-width: 1px;
                border-radius:3px;
                display: inline-block;
                float:left;
            }

             #SoftwarePanel{
                margin:10px;
                padding:3px;
                height:450px;
                width:500px;
                border:solid;
                border-width: 1px;
                border-radius:3px;
                display: inline-block;
                float:left;
            }

            li{
                margin:10px;
                margin-left:30px;
            }
        </style>
    </head>

    <body onload="setSoftwareData()">
    <div class="row">
        <nav class="col-sm-2 d-none d-md-block bg-dark sidebar h-100">
        <a class="nav-link active" href=""> <h1 class="text-light col-sm"> Make-It All </h1> </a>
          <div class="sidebar-sticky">

            <h5 class="d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-light">
              <span>Navigation</span>
            </h5>
            <ul class=" nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="Analyst.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                  General Analytics
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Analyst_Spec.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                Specialist Analytics
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="Analyst_Software.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                Software Analytics
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Analyst_Equip.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                Equipment Analytics
              </a>
            </li>
          </ul>
          </div>
        </nav>

        <main role="main" class="col-md-6 ml-sm-auto col-lg-10 pt-3 px-4 bg-light">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Equipment Analytics</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
          </div>  
          
          <div class="col-md-12 ml-sm-12">

          <div id="content-main">
                        <div class="row">
                          
                          <div id="ChooseSoftPanel">
                              <h4><u>Choose Software</u></h4>
                              <select id ="chosenSoftware"></select>
                              <ul id="SoftInfo">
                                 <li id="softName" style="padding:3px"></li>
                                 <li id="softType" style="padding:3px"></li>
                                 <li id="numOfStaff" style="padding:3px"></li>
                                 <li id="numOfCurrentProbs" style="padding:3px"></li>
                              </ul>
                          </div>
                          
          
                          <div id="SoftwarePanel">
                              <h4><u>Software Analytics</u></h4>
                              <select id="softwareMetric">
                                  <option value="Comparison of Number of Problems">Comparison of Number of Problems</option>
                                  <option value="Problems / Time">Problems / Time</option>
                              </select>
                              
                              <canvas id="canvas" style="width: 40%; height: 40%"></canvas>
          
                          </div>
          
                          <div id="content-login">    
                          </div>
                        </div>
          
                      </div>    
          </div>

          <script>
                //initalises the probtimechart
                var probTimeChart = new Chart(document.getElementById("canvas"), {
                    type: 'line',
                    options: {
                        responsive:true,
                        tooltips: {enabled: false},
                        hover: {mode: null},
                        title: {
                            display: true,
                            text: 'Number Of Current Problems / Time'
                        }
                    }
                });

                //initalises the numofprobchart
                var numOfProbChart = new Chart(document.getElementById("canvas"), {
                    type: 'bar',
                    options: {
                        responsive:true,
                        tooltips: {enabled: false},
                        hover: {mode: null},
                        legend: { display: false },
                        title: {
                            display: true,
                            text: 'Total Number of Problems'
                        }
                    }
                });
        </script>


          <script>
           
          //draws the charts if the analyst choose a different software to view metrics on
          $("#chosenSoftware").change(function() {
                changeSoftwareData($(this).find('option:selected').text());
                setMetricData();
            });


          //draws the charts if the analyst chooses a different chart to view the data
            $("#softwareMetric").change(function() {
                setMetricData($(this).find('option:selected').text())
            });


            //runs this function on load
            function setSoftwareData() {
                //gets each piece of software
                //adds it to the option tag
                $.post("metricsPHP/softInfo.php", function(data){
                    data = JSON.parse(data);
                    for(var i=0; i<data.length; i++){
                        $("#chosenSoftware").append("<option>"+data[i].Name+"</option>");
                    }
                        
                    //makes sure the bullet points are changed to the chosen software
                    //the chosen software is initalised to data[0]
                    changeSoftwareData(data[0].Name);
                });
            }



            function changeSoftwareData(chosenSoftware){
                if(!chosenSoftware) chosenSoftware = document.getElementById("chosenSoftware").value;
                //makes sure the chosenSoftware is changed to what is currently chosen
                $.post("metricsPHP/changeSoftData.php",{chosenSoftware:chosenSoftware},function(data){
                    //gets all the data about the chosen piece of software
                    data = JSON.parse(data);
                    
                    //sets the webpage to show the data about the chosen piece of software
                    $("#softName").html("Software: <strong>"+data[0].Name+"</strong>");
                    $("#softType").html("Type: <strong>"+data[0].Type+"</strong>");
                    $("#numOfStaff").html("Num of Staff Using <strong>"+data[0].NoOfStaffUsing+"</strong>");
                });
                
                //gets the number of current problems of the choseb software
                $.post("metricsPHP/softNoOfProbs.php",{chosenSoftware:chosenSoftware},function(data){
                    $("#numOfCurrentProbs").html("Number Of Problems: <strong>"+data+"</strong>")
                });
                setMetricData();
            }



            function setMetricData(selectedMetric){
                if(!selectedMetric) selectedMetric = document.getElementById("softwareMetric").value;
                var chosenSoftware = document.getElementById("chosenSoftware").value;
                
                if (selectedMetric == "Comparison of Number of Problems") {
                    if(probTimeChart) {
                        probTimeChart.destroy();
                        var softProbs;  //the number of problems that the chosen piece of software has
                        var max=0;
                        var min=Math.pow(10,1000);  //essentially infinite
                        var softList = document.getElementById('chosenSoftware');   //gets the list of software

                        for(var k=0; k<softList.length;k++){    //goes through every piecce of software
                            var soft = softList[k].value;
                            $.post("metricsPHP/softNoOfProbs.php",{chosenSoftware:soft}, function(data){
                                //gets the number of problems for every piece of software
                                if(data<min){
                                    min=data;
                                }

                                if(data>max&data){
                                    max=data;
                                }
                               

                                $.post("metricsPHP/softNoOfProbs.php",{chosenSoftware:chosenSoftware},function(probSoft){
                                    updateGraph(min,probSoft,max); // draws graph with correct data
                                })
                            })
                        }

                    }
                } else {

                    if(numOfProbChart){
                        numOfProbChart.destroy();
                        var dataArray = [];

                        for(var k=0; k<6;k++){
                            var kWeeksAgo = new Date();
                            kWeeksAgo.setDate(kWeeksAgo.getDate() - (k*7));
                            //goes through 6 weeks, starting at current date

                            $.post("metricsPHP/softProbsOverTime.php",{date:formatDate(kWeeksAgo),software:chosenSoftware}, function(data){
                                //gets the number of problems for each week
                                dataArray.push(data);
                                //draws graph with data
                                updateLineChart(dataArray);
                            });
                        }
                    }
                }
            }




            function updateGraph(min, soft, max){
                //draws graph with data from database
                //standard chartJS code
                numOfProbChart = new Chart(document.getElementById("canvas"), {
                    type: 'bar',
                    data: {
                        labels: ["Highest","Chosen Software","Lowest"],
                        datasets: [
                        {
                            label: "Total Number of Problems",
                            backgroundColor: ["#3e95cd", "#8e5ea2","#3e95cd","#3e95cd","#3e95cd"],
                            data: [min,soft,max]
                        }
                        ]
                    },
                    options: {
                        responsive:true,
                        tooltips: {enabled: false},
                        hover: {mode: null},
                        scales:{
                            yAxes:[{
                                ticks:{
                                    suggestedMin: 0
                                 }
                             }]
                        },
                        legend: { display: false },
                        title: {
                            display: true,
                            text: 'Total Number of Problems'
                        }
                    }

                }); //end of draw chart
            }
        



            function updateLineChart(dataArray){
                dataArray = sortByDate(dataArray);
                //makes sure data is sorted by the date
                //draws graph with data, chartJS
                backlogChart = new Chart(document.getElementById("canvas"), {
                    type: 'line',
                    data: {
                        labels: [1,2,3,4,5,6],
                        datasets: [{ 
                            data:dataArray,
                            label: "Backlog",
                            borderColor: "#3e95cd",
                            fill: false
                        },
                        ]
                    },
                    options: {
                        responsive:true,
                        tooltips: {enabled: false},
                        hover: {mode: null},
                        title: {
                            display: true,
                            text: 'Backlog Chart',
                            responsive: true,
                        }
                    }       
                }); //end of draw backlog chart
                
            }




            function formatDate(date) {
                //makes sure the date is formatted correctly
                // yyyy/mm/dd
                var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();
                if (month.length < 2) month = '0' + month;
                if (day.length < 2) day = '0' + day;
                return [year, month, day].join('-');
            }





           function sortByDate(dataArray){
                //bubble sort to make sure that the array is sorted by the date
                //needs to be sorted to draw the graph
                    var tempArray=[];
                    for(var i=0; i<dataArray.length;i++){
                        tempArray.push(dataArray[i].split("."));
                    }
                    for(var x=0; x<dataArray.length-1;x++) {
                        for(var i=0;i<tempArray.length-1;i++) {
                            
                            var day1=tempArray[i][1].split("-")[2];
                            var month1=tempArray[i][1].split("-")[1];
                            var year1=tempArray[i][1].split("-")[0];
                            
                            var day2=tempArray[i+1][1].split("-")[2];
                            var month2=tempArray[i+1][1].split("-")[1];
                            var year2=tempArray[i+1][1].split("-")[0];        

                            if(parseInt(year2)<parseInt(year1)){    //dd/mm/2016 < dd/mm/2017
                                var temp = tempArray[i];
                                tempArray[i] = tempArray[i+1];
                                tempArray[i+1] = temp;
                    
                            } else if(parseInt(month2)<parseInt(month1) && parseInt(year2)==parseInt(year1)){  

                                var temp = tempArray[i];
                                tempArray[i] = tempArray[i+1];
                                tempArray[i+1] = temp;

                            } else if(parseInt(day2)<parseInt(day1) &&parseInt(year2)==parseInt(year1)&&parseInt(month2)==parseInt(month1) ){
                                var temp = tempArray[i];
                                tempArray[i] = tempArray[i+1];
                                tempArray[i+1] = temp;

                            }
                        }
                        
                    }
                    for(var i=0; i<dataArray.length;i++){
                        tempArray[i] = tempArray[i][0];

                    }
                    return tempArray;
            }



        </script>


    </body>
</html>