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
        Highcharts.chart('impactchart1', {
            colors: ['#5472d2','transparent'],
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
                    },
                    borderWidth: 0
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
            colors: ['#fe6c61','transparent'],
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
                    },
                    borderWidth: 0
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
            colors: ['#6dab3c','transparent'],
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
                    },
                    borderWidth: 0
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