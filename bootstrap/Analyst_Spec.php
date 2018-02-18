<!-- Written by Sam Thompson B619450-->
<!-- Used to display the specialist data to the analyst-->
<!-- The analyst can choose a specialist, and data and charts are shown about that specialist-->
<!-- Data is displayed in both bullet point form -->
<!-- And in the form of two graphs 1.Comparison of number of average time to solve a  problems 2.Number of prblems/time-->


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
        option{
                margin:5px;
            }

            select{
                margin:10px;
            }

            #ChooseSpecPanel{
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


            #SpecialistPanel{
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

    <body onload="setSpecOptions()">
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
                <a class="nav-link active" href="Analyst_Spec.php">
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
            <h1 class="h2">Specialist Analytics</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
          </div>  
          
          <div class="col-md-12 ml-sm-12">

        <div class="row">
          <div id="ChooseSpecPanel" height="50px">
                   <h4><u>Specialists</u></h4>

                    <select id="specList">
                        
                    </select>

                    <ul id="SpecInfo">
                        <li id="specName" style="padding:3px"></li>
                        <li id="specAge" style="padding:3px"></li>
                        <li id="specID" style="padding:3px"></li>
                        <li id="specTime" style="padding:3px"></li>
                        <li id="specNoProbs" style="padding:3px"></li>
                        <li id="specExpertise" style="padding:3px">Areas of Expertise:
                            
                        </li>
                    </ul>
                    
                </div>


                <div id="SpecialistPanel">
                    <h4><u>Specialist Analytics</u></h4>
                    <select id="analyticsChoice">
                        <option value="Number Of Problems / Time">Number Of Problems / Time</option>
                        <option value="Time To Find Solutions">Time To Find Solutions</option>
                    </select>

                    
                    <canvas id="canvas" style="width: 40%; height: 40%"></canvas>
                </div>

          </div>
      </div>

          
        <script>
            //intialises the timetosol chart, using ChartJs
            var timeToSolChart = new Chart(document.getElementById("canvas"), {
                type: 'bar',
                options: {
                    responsive:true,
                    tooltips: {enabled: false},
                    hover: {mode: null},
                    legend: { display: false },
                    title: {
                        display: true,
                        text: 'Time To Find Solution'
                    }       
                }
            });    //end of draw chart

            //initalises the probtimechart using chartjs
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

        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        

        <script type="text/javascript">
           
            //runs when the analyst chooses a different chart
            $("#analyticsChoice").change(function() {
               var chosenMetric = $(this).find('option:selected').text();
               setChartShown($(this).find('option:selected').text());
            });   


            //runs when the analyst chooses a different specialist to view metrics on
            $("#specList").change(function(){
                var chosenSpec = $(this).find('option:selected').text();
                setInfoToChosen(chosenSpec);
            });



            function setSpecOptions() {
                //adds every specialist to the <option>
                $.post("metricsPHP/specInfo.php",function(data){
                    data=JSON.parse(data);
                    
                    for(var i=0;i<data.length;i++){
                        $("#specList").append("<option>"+data[i].Name+"</option>");
                    }
                    setInfoToChosen();
                    setChartShown();    //draws the graph
                });
            }



            function setInfoToChosen(chosenSpecialist){
               
                if(!chosenSpecialist) chosenSpecialist=document.getElementById("specList").value;
                //makes sure that the chosenSpecialist is set to what is chosen by the analyst

                $.post("metricsPHP/changeSpecData.php",{chosenSpecialist:chosenSpecialist}, function(data){
                    //get all the data from the chosen specialist
                    data=JSON.parse(data);
                    //change the html to output the data about the chosen specialist
                    $("#specName").html("Name: <strong>"+data[0].Name+"</strong>");
                    $("#specAge").html("Age: <strong>"+data[0].Age+"</strong>");
                    $("#specID").html("ID Number: <strong>"+data[0].SpecilailistID+"</strong>");
                    $("#specExpertise").html("Areas of Expertise:");
                    for(var x=0; x<data.length;x++){
                        //since a specialist can have multiple areas of expertise
                        //need to add each one to the list
                        $("#specExpertise").append("<li><strong>"+data[x].ProbType+"</strong></li>");
                    }

                });

                $.post("metricsPHP/specNoOfProbs.php",{chosenSpecialist:chosenSpecialist}, function(data){
                    //gets the number of problems the chosen specialist is currently working on,
                    //outputs the num of problems to the webpage
                    $("#specNoProbs").html("Number Of Problems: <strong>"+data+"</strong>");

                });

                
                $.post("metricsPHP/specAvgTimeToSol.php",{chosenSpecialist:chosenSpecialist},function(data){
                    //gets the average time to solve a problem for the chosen specialist
                    data = JSON.parse(data);
                    $("#specTime").html("Average Time To Sol: <strong>"+Math.round(data[0].AVERAGE)+" days </strong>");
                    setChartShown(); //calls the function which draws the graphs
                });

                
            }



            function setChartShown(chosenMetric) {
                var chosenSpecialist=document.getElementById("specList").value;
                //gets the chosen specialist
                if(!chosenMetric) chosenMetric = document.getElementById("analyticsChoice").value;
                //gets the chosen graph

                var spec1 = document.getElementById("specList").value;

                if (chosenMetric == "Number Of Problems / Time") {
                    
                    if(timeToSolChart) {
                        timeToSolChart.destroy();
                        var dataArray =[];

                        for(var k=0;k<6;k++){
                            //goes through the past 5 weeks
                            //gets data and draws the graph based on that data
                            var kWeeksAgo = new Date();
                            kWeeksAgo.setDate(kWeeksAgo.getDate() - (k*7));
                            $.post("metricsPHP/specProbsOverTime.php",{date:formatDate(kWeeksAgo),specialist:chosenSpecialist}, function(data){
                                dataArray.push(data);
                                updateLineGraph(dataArray);
                            })
                        }

                    }           

                } else {
                    
                    if(probTimeChart) {
                        probTimeChart.destroy();
                        //draw the time to sol chart
                        var avg;    //this is the average time to solve a problem by a specialist
                        var max=0;  //this is hte maximum average time to solve a problem by any specialist
                        var min=Math.pow(10, 1000); //this is the minimum average time to sovle a problem by any specalist
                        var specialistList = document.getElementById('specList');
                        
                        for(var k=0;k<specialistList.length;k++) {
                            $.post("metricsPHP/specAvgTimeToSol.php",{chosenSpecialist:specialistList[k].value},function(data){
                                
                                data = JSON.parse(data);

                                if(data[0].AVERAGE < min){  //gets the min value
                                    min = data[0].AVERAGE;
                                }

                                if(data[0].AVERAGE > max){  //gets the max value
                                    max = data[0].AVERAGE;
                                }
                                
                                $.post("metricsPHP/specAvgTimeToSol.php",{chosenSpecialist:document.getElementById('specList').value},function(averageTime){
                                    //gets the average time to solve a problem by the chosen specialist
                                    data = JSON.parse(averageTime)
                                    avg = data[0].AVERAGE;
                                    updateGraph(min,max,avg);      //calls function to draw the graph, passing the correct data
                                });

                                
                            });
                        }
                    }
                } 
            }

            function updateGraph(min, max, avg){
                //draws grpah based on data passed in,
                //standard chartjs 
                timeToSolChart = new Chart(document.getElementById("canvas"), {
                    type: 'bar',
                    data: {
                        labels: ["Lowest", document.getElementById("specList").value, "Highest"],
                        datasets: [
                        {
                            label: "Time To Find Solution",
                            backgroundColor: ["#3e95cd", "#8e5ea2","#3e95cd"],
                            data: [min,avg,max]
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
                            text: 'Time To Find Solution'
                        }       
                    }
                });    //end of draw chart
            }



            function updateLineGraph(dataArray){
                    dataArray = sortByDate(dataArray);
                    //makes sure that the array of data is sorted by the date

                    //draws the line chart, based on data
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
                                text: 'Number Of Problems for Chosen Specialist Over Time',
                                responsive: true,
                            }
                        }       
                    }); //end of draw backlog chart
            }



           function sortByDate(dataArray){ 
                    //bubble sort used to sort the dates
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


            function formatDate(date) {
                //helper function used to format the data correcltly
                //yyy/mm/dd
                var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();
                if (month.length < 2) month = '0' + month;
                if (day.length < 2) day = '0' + day;
                return [year, month, day].join('-');
            }


        </script>

    </body>
</html>