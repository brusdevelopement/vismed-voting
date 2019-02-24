google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var jsonData = $.ajax({
        url: "App/Core/getWinner.php",
        dataType: "json",
        async: false
    }).responseText;

    // Create our data table out of JSON data loaded from server.
    var data = new google.visualization.DataTable(jsonData);

/*
    var data = google.visualization.arrayToDataTable([
        ['Element', 'Density', { role: 'style' }],
        ['Copper', 8.94, '#b87333'],            // RGB value
        ['Silver', 10.49, 'silver'],            // English color name
        ['Gold', 19.30, 'gold'],
        ['Platinum', 21.45, 'color: #e5e4e2' ], // CSS-style declaration
    ]);
*/

    var options = {
        title: 'Результаты голосования',
        chartArea: {width: '50%'},
        hAxis: {
            title: 'Кол-во Баллов',
            minValue: 0
        },
        vAxis: {
            //title: 'Ф.И.О.'
        }
    };

    var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

    chart.draw(data, options);
}