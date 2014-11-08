/* Google Chart */
google.load("visualization", "1", {packages: ["corechart"]});
google.setOnLoadCallback(drawVisualization);

function drawVisualization() {
    // Create and populate the data table.
    var data = new google.visualization.DataTable();

    // Adding Data 
    data.addColumn('string', 'x');
    data.addColumn('number', 'Cats');
    data.addColumn('number', 'Blanket 1');
    data.addColumn('number', 'Blanket 2');
    data.addRow(["A", 1, 1, 0.5]);
    data.addRow(["B", 2, 0.5, 1]);
    data.addRow(["C", 4, 1, 0.5]);
    data.addRow(["D", 8, 0.5, 1]);
    data.addRow(["E", 7, 1, 0.5]);
    data.addRow(["F", 7, 0.5, 1]);
    data.addRow(["G", 8, 1, 0.5]);
    data.addRow(["H", 4, 0.5, 1]);
    data.addRow(["I", 2, 1, 0.5]);
    data.addRow(["J", 3.5, 0.5, 1]);
    data.addRow(["K", 3, 1, 0.5]);
    data.addRow(["L", 3.5, 0.5, 1]);
    data.addRow(["M", 1, 1, 0.5]);
    data.addRow(["N", 1, 0.5, 1]);

    // Chart options (axis, titles, scale, curve)
    var options = {
        title: 'TITLE WILL BE DETERMINED DEPENDING ON WHATS SELECTED',
        titleTextStyle: {fontsize: 5},
        curveType: "none",
        vAxes: {0: {logScale: false},
            1: {logScale: false, maxValue: 2}},
        series: {
            0: {targetAxisIndex: 0},
            1: {targetAxisIndex: 1},
            2: {targetAxisIndex: 1}}
    };

    // Create and draw the visualization.
    var chart = new google.visualization.LineChart(document.getElementById('visualization'));
    chart.draw(data, options);
}