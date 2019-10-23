jQuery(document).ready(function($){
    'use strict';

    var data = [{
            name: 'Male',
            data: [5, 3]
        }, {
            name: 'Female',
            data: [2, 4]
        }];

    $(function() {
        // Create the chart
        Highcharts.chart('barchart', {
            colors: ['#79a8c4','#f69686'],
            chart: {
                type: 'bar',
                backgroundColor: 'transparent'
            },
            title: {
                text: 'CIALCA Trainings'
            },
            xAxis: {
                categories: ['Trainings', 'Internship', 'MSc', 'PhD']
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total people trained'
                }
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
            credits: {
                enabled: false
            },
            series: data
        });
    });
});