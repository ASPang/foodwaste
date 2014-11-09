/* Google Chart */
google.load("visualization", "1", {packages: ["corechart"]});
//google.setOnLoadCallback(drawVisualization);

function drawVisualization(dataList) {
    // Create and populate the data table.
       var data = new google.visualization.DataTable();

//console.log(dataList);
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

//var data = google.visualization.arrayToDataTable(dataList);


    // Adding Data 
      //   data.addRow(["N", 1, 0.5, 1]);

    // Chart options (axis, titles, scale, curve)
    var options = {
        title: 'Comparation per Day',
        titleTextStyle: {fontsize: 5},
        //curveType: "none",
        //vAxes: {0: {logScale: false},
        //    1: {logScale: false, maxValue: 2}},
       // series: {
        //    0: {targetAxisIndex: 0},
        //    1: {targetAxisIndex: 1},
        //    2: {targetAxisIndex: 1}}
    };

    // Create and draw the visualization.
    var chart = new google.visualization.LineChart(document.getElementById('visualization'));
    chart.draw(data, options);
}