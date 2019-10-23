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

        Highcharts.chart('impactchart1', {
            colors: ['#4472C4','transparent'],
            chart: {
                backgroundColor: 'transparent',
                plotBackgroundColor: 'transparent',
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            navigation: {
                buttonOptions: {
                    enabled: false
                }
            },
            credits: false,
            title: {
                text: 'Test Chart'
            },
            subtitle: {
                text: 'Alex kindly modify to your use'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: false,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '{point.percentage:.1f} %',
                        distance: -100,
                           color:'white'
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'Chrome',
                    y: 70,
                    sliced: false,
                    selected: true
                }, {
                    name: '',
                    y: 30
                }]
            }]
        });

        Highcharts.chart('impactchart2', {
            colors: ['#4472C4','transparent'],
            chart: {
                backgroundColor: 'transparent',
                plotBackgroundColor: 'transparent',
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            navigation: {
                buttonOptions: {
                    enabled: false
                }
            },
            credits: false,
            title: {
                text: 'Test Chart'
            },
            subtitle: {
                text: 'Alex kindly modify to your use'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: false,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '{point.percentage:.1f} %',
                        distance: -100,
                           color:'white'
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'Chrome',
                    y: 70,
                    sliced: false,
                    selected: true
                }, {
                    name: '',
                    y: 30
                }]
            }]
        });

        Highcharts.chart('impactchart3', {
            colors: ['#4472C4','transparent'],
            chart: {
                backgroundColor: 'transparent',
                plotBackgroundColor: 'transparent',
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            navigation: {
                buttonOptions: {
                    enabled: false
                }
            },
            credits: false,
            title: {
                text: 'Test Chart'
            },
            subtitle: {
                text: 'Alex kindly modify to your use'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: false,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '{point.percentage:.1f} %',
                        distance: -100,
                           color:'white'
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'Chrome',
                    y: 70,
                    sliced: false,
                    selected: true
                }, {
                    name: '',
                    y: 30
                }]
            }]
        });




    });
});