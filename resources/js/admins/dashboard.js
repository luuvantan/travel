window.Highcharts = require('highcharts');
$(document).ready(function() {

    let post = $('#container').data('post');
    let listOfValue = [];
    let listOfYear = [];
    post.forEach(function(element){
        listOfYear.push(element.getDate);
        listOfValue.push(element.value);
    });
    let chart = new Highcharts.chart({
        chart: {
            renderTo: 'container',
        },
        title: {
            text: 'Bài đăng theo tháng'
        },

        subtitle: {
            text: 'post'
        },

        xAxis: {
            categories: listOfYear,
        },

        credits: {
            enabled: false
        },

        series: [{
            type: 'column',
            colorByPoint: true,
            data: listOfValue,
            showInLegend: false
        }]
    });

    // console.log(chart.yAxis[0]);
    
    chart.yAxis[0].update({
        labels: {
            enabled: true
        },
        title: {
            text: null
        }
    });

    // category post
    let category = $('#category').data('category');
    let chartData = [];
    category.forEach(function(element){
        let ele = {name : element.category.name, y : parseFloat(element.value)};
        chartData.push(ele);
    });
    console.log(chartData);
    new Highcharts.chart({
        chart: {
            renderTo: 'category',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
          text: 'Du Lịch'
        },

        credits: {
            enabled: false
        },
        
        plotOptions: {
          pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
              enabled: false
            },
            showInLegend: true
          }
        },
        series: [{
          name: 'Brands',
          colorByPoint: true,
          data: chartData,
        }]
    });    
});
