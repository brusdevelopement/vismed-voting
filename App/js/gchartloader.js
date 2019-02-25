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

/*    var data = google.visualization.arrayToDataTable([
        ['Element', 'Density', { role: 'annotation' }],
        ['Copper', 8.94, 100],            // RGB value
        ['Silver', 10.49, 54],            // English color name
        ['Gold', 19.30, 35],
        ['Platinum', 21.45, 130 ], // CSS-style declaration
    ]);*/

    var options = {
        annotations: {
            textStyle: {
                color: 'black',
                //fontSize: 11,
            },
            alwaysOutside: false
        },
        legend: 'none',
        width: '100%',
        height: 600,
        backgroundColor: { fill:'transparent' },
        dataOpacity: 0.9,

        bar: {groupWidth: "80%"},
        //gridlines: { count: 12 },
        //title: 'Результаты голосования',
        chartArea: {width: '50%'},
        hAxis: {
            ticks: [10,20,30,40,50,60,70,80,90,100,110,120,130,140,150,160],
            title: 'Кол-во Баллов',
            minValue: 0,
            textStyle: {
                bold: true,
                italic: false,
            }
        },
        vAxis: {
            textStyle: {
                bold: true,
            }
            //title: 'Ф.И.О.'
        }
    };

    var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

    chart.draw(data, options);
}
