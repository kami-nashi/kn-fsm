<head>
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
		color: "rgba(40,175,101,0.6)",
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
      { x: new Date(2017, 10), y: 6.5 }

		]
	},
	{
		name: "Coached Hours",
		showInLegend: true,
		legendMarkerType: "square",
		type: "area",
		color: "rgba(0,75,141,0.7)",
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
      { x: new Date(2017, 10), y: 1 }
		]
	}]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 125px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
