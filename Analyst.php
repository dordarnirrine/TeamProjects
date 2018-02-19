<!-- Written by Sam Thompson B619450-->
<!-- This code is used to display the webpage for the general analytics-->
<!-- There are 2 graphs to  be chosen from 1.Backlog/Time Chart and 2.Number Of problems per problemtype chartjs -->
<!-- The backlog at the current time is also displayed to the analyst-->


<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-datatable.css" rel="stylesheet"> 
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/jquery-latest.js"></script>
        <script src="js/jquery-datatable.js"></script>
        <script src="js/bootstrap.datatable.js"> </script>
        <script src="Chart.min.js"></script>
        
    </head>

    <body onload="setChartShown()">
    <div class="row">
        <nav class="col-sm-2 d-none d-md-block bg-dark sidebar h-100">
        <a class="nav-link active" href=""> <h1 class="text-light col-sm"> Make-It All </h1> </a>
          <div class="sidebar-sticky">

            <h5 class="d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-light">
              <span>Navigation</span>
            </h5>
            <ul class=" nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="Analyst.php">
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
              <a class="nav-link" href="Analyst_Software.php">
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
            <h1 class="h2">General Analytics</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
          </div>  
          <div class="col h-5">                 
                <p> Choose What Data you Wish to View: 
                <select id="chartSelect">
                    <option>View "Backlog" Data</option>
                    <option>View "Problems for Problem Types" Data</option>
                    
                </select>
          </div>
          <div class="col-md-12 ml-sm-12">

                <div id ="Backlog">
                    <h4><u>Backlog:</u> The number of on-going problems</h4>
                    <p id="totalBacklog"></p>
                    
                    <canvas id="canvas" style="width: 80%; height: 40%"></canvas>
               
               </div>
          </div>

          <script>
         //intialises the pie chart using chartjs
        var pieChart = new Chart(document.getElementById("canvas"), {
            type: 'pie',
            options: {
                responsive:true,
                tooltips: {enabled: false},
                hover: {mode: null},
                title: {
                    display: true,
                    text: 'Problem Type and Problem Chart',
                    responsive: true,
                }
            }
        }); 

        //initalises the backlog chart using chartjs
        var backlogChart = new Chart(document.getElementById("canvas"), {
            type: 'line',
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
        });
        
        </script>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        <script type="text/javascript">
            

           $("#chartSelect").change(function() {    //jquery, function runs when the chart select is changed
               setChartShown($(this).find('option:selected').text());

            });


            //Sets the shown chart to the chosen chart 
            function setChartShown(chosenMetric) {
                $.post("metricsPHP/backlog.php", function(data){    
                //sets the number of backlogs to what is retrieved from the database
                    console.log(data);
                    $("#totalBacklog").html("Total Backlog: <strong>"+data+"</strong></p>");

                });

                //make sure that the chosenMetric is set to what the analyst has chosen
                if(!chosenMetric) chosenMetric = document.getElementById("chartSelect").value;
     
                if(chosenMetric == "View \"Backlog\" Data"){    //if this condition is true, display the backlog chart
                    if (pieChart) {
                        var dataArray = [];
                        pieChart.destroy();

                        for(var k=0; k<6;k++){
                            var kWeeksAgo = new Date();
                            kWeeksAgo.setDate(kWeeksAgo.getDate() - (k*7));

                            $.post("metricsPHP/numOfProbsOverTime.php",{date:formatDate(kWeeksAgo)}, function(data){
                                //get the number of problems over a period of time
                                dataArray.push(data);
                                updateLineChart(dataArray);
                            });
                        }

                    }

                } else {    //this else code block should draw the pie chart
                    if (backlogChart) {
                        backlogChart.destroy();
                        updatePieChart();
                    }
                }
            }



            function updateLineChart(dataArray){
                dataArray = sortByDate(dataArray);
                //since data comes back via asynchronous server requests, data needs to be sorted
                
                backlogChart = new Chart(document.getElementById("canvas"), {
                    //draw the line chart
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



            function updatePieChart(){
                var labelArray=[];
                var dataArray=[];

                $.post("metricsPHP/probTypeNum.php", function(probTypeData){ //gets the data from the server
                    probTypeData = JSON.parse(probTypeData);
                    for(var i=0; i<probTypeData.length;i++){    
                        //put the data into two arrays, probType and number of problems for each type
                        labelArray.push(probTypeData[i].ProbType);
                        dataArray.push(probTypeData[i].ProbNumCount);
                    }
                        
                    pieChart = new Chart(document.getElementById("canvas"), {
                        //draws the pie chart, standard chartjs notation
                        type: 'pie',
                        data :{
                            labels: labelArray,
                            datasets:[{
                                data:dataArray,
                                backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9"]
                            }]
                        },
                        options: {
                            responsive:true,
                            tooltips: {enabled: false},
                            hover: {mode: null},
                            title: {
                                display: true,
                                text: 'Problem Type and Problem Chart',
                                responsive: true,
                            }
                        }
                    }); 

                });
            }



            function formatDate(date) {
                //formats the data to yyyy-mm-dd
                var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();
                if (month.length < 2) month = '0' + month;
                if (day.length < 2) day = '0' + day;
                return [year, month, day].join('-');
            }



            function sortByDate(dataArray){
                //sorts the data array by the date
                //uses a bubble sort to sort
                    var tempArray=[];
                    for(var i=0; i<dataArray.length;i++){
                        //split the data into date and number
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

                            } else if(parseInt(day2)<parseInt(day1) && parseInt(year2)==parseInt(year1)&&parseInt(month2)==parseInt(month1) ){
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