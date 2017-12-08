<?php
echo '

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Figure Skating Metrics</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">

    <!-- Custom styles for icons -->
    <link href="/css/font-awesome.min.css" rel="stylesheet">

    <script>
  window.onload = function () {

  var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    title: {
      text: "Monthly Hour Analysis"
    },
    axisX: {
      valueFormatString: "MMM",
      intervalType: "month",
    interval: 1,
    },
    axisY: {
      title: "Hours"
    },
    legend: {
      verticalAlign: "top",
      horizontalAlign: "right",
      dockInsidePlotArea: true
    },
    toolTip: {
      shared: true,
      content: "{name}: {y}"
    },
    data: [{
      name: "Skated Hours",
      showInLegend: true,
      legendMarkerType: "square",
      type: "area",
      color: "rgba(142, 94, 162, 1)",
      markerSize: 1,
      dataPoints: [
        { x: new Date(2016, 11), y: 7.25 },
        { x: new Date(2016, 12), y: 2.5 },
        { x: new Date(2017, 1), y: 4.25 },
        { x: new Date(2017, 2), y: 2.25 },
        { x: new Date(2017, 3), y: 10 },
        { x: new Date(2017, 4), y: 11 },
        { x: new Date(2017, 5), y: 5.75 },
        { x: new Date(2017, 6), y: 13 },
        { x: new Date(2017, 7), y: 1 },
        { x: new Date(2017, 8), y: 3.5 },
        { x: new Date(2017, 9), y: 6 },
        { x: new Date(2017, 10), y: 1 },
        { x: new Date(2017, 11), y: 1 },
      ]
    },
    {
      name: "Coached Hours",
      showInLegend: true,
      legendMarkerType: "square",
      type: "area",
      color: "rgba(62, 149, 205, 1)",
      markerSize: 1,
      dataPoints: [
        { x: new Date(2016, 11), y: 1 },
        { x: new Date(2016, 12), y: 1.5 },
        { x: new Date(2017, 1), y: 2 },
        { x: new Date(2017, 2), y: 1 },
        { x: new Date(2017, 3), y: 3.5 },
        { x: new Date(2017, 4), y: 2 },
        { x: new Date(2017, 5), y: 2.5 },
        { x: new Date(2017, 6), y: 2 },
        { x: new Date(2017, 7), y: .5 },
        { x: new Date(2017, 8), y: 2 },
        { x: new Date(2017, 9), y: 2.5 },
        { x: new Date(2017, 10), y: .5 },
        { x: new Date(2017, 11), y: .5 },
      ]
    }]
  });
  chart.render();

  }
  </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  </head>

  <body>';
?>
