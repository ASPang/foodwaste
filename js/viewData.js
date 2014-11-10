/* Google Chart */
google.load("visualization", "1", {packages: ["corechart"]});
//google.setOnLoadCallback(drawVisualization);

function drawTodayData(dataList) {
    // Create and populate the data table.
    var data = new google.visualization.DataTable();

    //pull data out of array
    data.addColumn('string','Date');
    data.addColumn('number','InitialWeight');
    data.addColumn('number','WasteWeight');

    var dailywasteTotal=0;
    var dailyWeight=0;

    for (var i=0;i<dataList.length;i++){
        if (i !=(dataList.length-1)){
           if (dataList[i][2] == dataList[i+1][2]){
            dailywasteTotal += parseInt(dataList[i][5]);
            dailyWeight += parseInt(dataList[i][4]);
           }else if(dailywasteTotal != 0 || dailyWeight !=0){
            data.addRow([dataList[i][2],dailyWeight,dailywasteTotal]);  
                dailywasteTotal=0;
                dailyWeight=0;       
           }else{
              data.addRow([dataList[i][2],parseInt(dataList[i][4]),parseInt(dataList[i][5])]);     
           }
        }else if (dataList[i][2] ==dataList[i-1][2]){//add last row when same day as previous row
            dailywasteTotal += parseInt(dataList[i][5]);
            dailyWeight += parseInt(dataList[i][4]);
            data.addRow([dataList[i][2],dailyWeight,dailywasteTotal]);  
       }else {//add last row
              data.addRow([dataList[i][2],parseInt(dataList[i][4]),parseInt(dataList[i][5])]); 
       }
     }

    var options = {
        title: 'Daily Food Waste',
        titleTextStyle: {fontsize: 5},
        hAxis: {title: 'Time (Hours)'},

        vAxis: {title: 'Weight (grams)'}
        //curveType: "none",
        //vAxes: {0: {logScale: false},
        //    1: {logScale: false, maxValue: 2}},
       // series: {
        //    0: {targetAxisIndex: 0},
        //    1: {targetAxisIndex: 1},
        //    2: {targetAxisIndex: 1}}
    };

    // Create and draw the visualization.
    var chart = new google.visualization.LineChart(document.getElementById('dayResult'));
    chart.draw(data, options);
}


function drawWeekData(dataList) {
    // Create and populate the data table.
    var data = new google.visualization.DataTable();
    
    //pull data out of array
    data.addColumn('string','Date');
    data.addColumn('number','InitialWeight');
    data.addColumn('number','WasteWeight');

    var dailywasteTotal=0;
    var dailyWeight=0;

    for (var i=0;i<dataList.length;i++){
        if (i !=(dataList.length-1)){
           if (dataList[i][1] == dataList[i+1][1]){
            dailywasteTotal += parseInt(dataList[i][5]);
            dailyWeight += parseInt(dataList[i][4]);
           }else if(dailywasteTotal != 0 || dailyWeight !=0){
            data.addRow([dataList[i][1],dailyWeight,dailywasteTotal]);  
                dailywasteTotal=0;
                dailyWeight=0;       
           }else{
              data.addRow([dataList[i][1],parseInt(dataList[i][4]),parseInt(dataList[i][5])]);     
           }
        }else if (dataList[i][1] ==dataList[i-1][1]){//add last row when same day as previous row
            dailywasteTotal += parseInt(dataList[i][5]);
            dailyWeight += parseInt(dataList[i][4]);
            data.addRow([dataList[i][1],dailyWeight,dailywasteTotal]);  
       }else {//add last row
              data.addRow([dataList[i][1],parseInt(dataList[i][4]),parseInt(dataList[i][5])]); 
       }

     }

    // Chart options (axis, titles, scale, curve)
    var options = {
        title: 'Food Waste Weekly Report',
        titleTextStyle: {fontsize: 5},
        hAxis: {title: 'Week'},
        vAxis: {title: 'Weight (grams)'}
    };

    // Create and draw the visualization.
    var chart = new google.visualization.LineChart(document.getElementById('weekResult'));
    chart.draw(data, options);
}


function drawMonthData(dataList) {
    // Create and populate the data table.
    var data = new google.visualization.DataTable();
    var monthNum = dataList[0][1].substr(5,2);
    
    var start = [12];    
    var waste = [12];
        
    //pull data out of array
    data.addColumn('string','Date');
    data.addColumn('number','InitialWeight');
    data.addColumn('number','WasteWeight');

    for (var i=0; i < 12; i++) {
        start[i] = 0;
        waste[i] = 0;
    }
    
    for (var i=0;i<dataList.length;i++){
        monthNum = dataList[i][1].substr(5,2);
        
        start[parseInt(monthNum)] += parseInt(dataList[i][4]);
        waste[parseInt(monthNum)] += parseInt(dataList[i][5]);
     }
     
     for(var i = 0; i < 12; i++) {
         if ((start[i] !== null) && (waste[i] !== null)) { 
           data.addRow([i.toString(), start[i], waste[i]]);
        }
     }

    // Chart options (axis, titles, scale, curve)
    var options = {
        title: 'Food Waste Monthly Report',
        titleTextStyle: {fontsize: 5},
        hAxis: {title: 'Month'},
        vAxis: {title: 'Weight (grams)'}
    };

    // Create and draw the visualization.
    var chart = new google.visualization.LineChart(document.getElementById('monthResult'));
    chart.draw(data, options);
}