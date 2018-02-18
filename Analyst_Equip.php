<!-- Written by Sam Thompson B619450-->
<!-- Used to display the equipment data to the analyst-->
<!-- The analyst can choose a equipment, and data and charts are shown about that piece of equipment-->
<!-- Data is displayed in both bullet point form -->
<!-- And in the form of two graphs 1.Comparison of number of current problems 2.Number of prblems/time for the chosen equipment-->


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

            #ChooseEquip{
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

            #EquipmentAnalytics{
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

    <body onload="setEquipToChoose()">
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
                Equipment Analytics
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Analyst_Software.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                Software Analytics
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="Analyst_Equip.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                Equipment Analytics
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
            <h1 class="h2">Equipment Analytics</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
          </div>  
        
          <div class="col-md-12 ml-sm-12">

        
        <div id="ChooseEquip">
            <h4><u>Equipment</u></h4>
            
            <ul id="EquipInfo">
                <select id="chosenEquip"></select >

                <li id ="Make" style="padding:3px"></li>
                <li id="Model" style="padding:3px"></strong></li>
                <li id="EquipType" style="padding:3px"></li>
                <li id="NoOfProblems" style="padding:3px"></li>
                
            </ul>
        </div>


        <div id="EquipmentAnalytics" style="padding-left:20px">
            <h4><u>Equipment Analytics</u></h4>
            <select id="equipmentMetric">
                <option value="Comparison of Number of Problems">Comparison of Number of Problems</option> 
                <option value="Number Of Problems / Time">Number Of Problems / Time</option>
            </select>

            <canvas id="canvas" style="width: 80%; height: 80%"></canvas>
        </div>
       


          <script>
         
        //initalises the probTimeChart
         var probTimeChart = new Chart(document.getElementById("canvas"), {
                    type: 'line',
                    options: {
                        responsive:false,
                        tooltips: {enabled: false},
                        hover: {mode: null},
                        title: {
                        display: true,
                        text: 'Number Of Current Problems / Time'
                        }
                    }
                });

         //initalises the numOfProbChart
                var numOfProbChart = new Chart(document.getElementById("canvas"), {
                            type: 'bar',
                            options: {
                                responsive:false,
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



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        <script type="text/javascript">
            
            //runs when the chosen equipment has been changed
            $("#chosenEquip").change(function() {
                setEquipData($(this).find('option:selected').text());
            });


            //runs when the metric chosen to be showed to the analyst has been changed
            $("#equipmentMetric").change(function() {
                setMetricData($(this).find('option:selected').text());
            });


            //gets all the equipment from the database and adds them to the <option>
            //so that the analyst can choose between all the data in the database
            function setEquipToChoose(){
               $.post("metricsPHP/equipInfo.php",function(data){
                    data = JSON.parse(data); 
                    for(var i=0; i<data.length;i++){
                        $("#chosenEquip").append("<option>"+data[i].Make+"-"+data[i].Model+"</option>");
                    }
                    setEquipData();
                    
                });
            }


            //this runs when the analyst chooses which equipment he wants to view metrics on
            function setEquipData(chosenEquip) {
                if(!chosenEquip) chosenEquip = document.getElementById("chosenEquip").value;
                //makes sure the chosenEquip is set to something
                
                var make = chosenEquip.split("-")[0];
                var model = chosenEquip.split("-")[1];
                //extracts the make and model from the chosenEquip varible

                $.post("metricsPHP/chosenEquipInfo.php",{make:make, model:model},function(data){
                    //gets make, model and type of the chosen equipment
                    data = JSON.parse(data);
                    $("#Make").html("Make: <strong>"+data[0].Make+"</strong>");
                    $("#Model").html("Model: <strong>"+data[0].Model+"</strong>");
                    $("#EquipType").html("Equipment Type: <strong>"+data[0].Type+"</strong>");
                });

                $.post("metricsPHP/equipNoOfProbs.php",{make:make, model:model},function(data){
                    $("#NoOfProblems").html("Number Of Problems: <strong>"+data+"</strong>");
                    //gets the current number of problems associated with the chosen equipment
                    //displays the number of problems to the analyst
                });

                setMetricData(); //this function is run to draw the charts
                
            }



            function setMetricData(selectedMetric){

                if(!selectedMetric) selectedMetric = document.getElementById("equipmentMetric").value;
                //makes sure the selectedMetric is set to something
                

                if (selectedMetric == "Comparison of Number of Problems") {
                    //if the above condition is true, the bar chart comparing no of problems should be drawn
                    if(probTimeChart) {
                        probTimeChart.destroy();
                        //gets rid of current chart
                        var equipProbs;
                        var max=0;
                        var min=Math.pow(10,1000);  //essentially infinite
                        var equipList = document.getElementById('chosenEquip');

                        for(var k=0; k<equipList.length;k++){
                            //runs through every piece of equipment
                            var equip = equipList[k].value;
                            var make = equip.split("-")[0];
                            var model = equip.split("-")[1];
                            //extracts the make and model of every equipment
                            $.post("metricsPHP/equipNoOfProbs.php",{make:make,model:model}, function(data){
                                console.log(data);
                                if(data<min){   //gets the minimum piece of data
                                    min = data;
                                }
                                if(data>max & data){    //gets the max piece of data
                                    max = data;
                                }

                                var chosenEquip = document.getElementById("chosenEquip").value;
                                $.post("metricsPHP/equipNoOfProbs.php",{make:chosenEquip.split("-")[0], model:chosenEquip.split("-")[1]},function(equipChosenProbs){
                                    //get the number of problems for the currently chosen equipment
                                    //calls updateGraph to draw the graph with the data from the database
                                    updateGraph(min,equipChosenProbs,max);
                                });
                            });
                        }

                       

                    }

                } else {
                    if(numOfProbChart){
                        numOfProbChart.destroy();
                        //draw probTimeChart

                        var dataArray = [];
                        var make = chosenEquip.value.split("-")[0];
                        var model = chosenEquip.value.split("-")[1];
                        //extraccts the make and model frmo the chosen equip
                        
                        for(var k=0; k<6;k++){
                            var kWeeksAgo = new Date();
                            kWeeksAgo.setDate(kWeeksAgo.getDate() - (k*7));
                            //goes through 6 weeks, calculates the date, every 6 weeks ago
                            
                            $.post("metricsPHP/EquipProbsOverTime.php",{date:formatDate(kWeeksAgo),make:make,model:model}, function(data){
                                //gets the problems at the given time for the chosen piece of equipment
                                dataArray.push(data);
                                updateLineChart(dataArray);
                            });
                        }  
                    }
                }
            }


            function updateGraph(min, prob, max){
                //draws the numOfProbChart with the given data
                numOfProbChart = new Chart(document.getElementById("canvas"), {
                    type: 'bar',
                    data: {
                        labels: ["Lowest","Chosen Equipment","Highest"],
                        datasets: [
                        {
                            label: "Total Number of Problems",
                            backgroundColor: ["#3e95cd", "#8e5ea2","#3e95cd","#3e95cd","#3e95cd"],
                            data: [min,prob,max]
                        }
                        ]
                    },
                    options: {
                        responsive:false,
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
                //data needs to be sorted by data, since got through asynchronous requests
                dataArray = sortByDate(dataArray);

                //draws the backlog chart, standard chartjs
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
                        responsive:false,
                        title: {
                            display: true,
                            text: 'Backlog for Chosen Equipment Chart',
                            responsive: true,
                        }
                    }       
                }); //end of draw backlog chart
                
            }



            function formatDate(date) {
                //formats the date correctly
                var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();
                if (month.length < 2) month = '0' + month;
                if (day.length < 2) day = '0' + day;
                return [year, month, day].join('-');
            }



            function sortByDate(dataArray){
                //sorts the array passed to it by the date
                //uses bubble sort
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