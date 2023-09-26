<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		body {
			font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
		}

		#chartdiv {
			width: 100%;
			height: 400px;
		}
	</style>
</head>

<body>
	<script src="//cdn.amcharts.com/lib/5/index.js"></script>
	<script src="//cdn.amcharts.com/lib/5/hierarchy.js"></script>
	<script src="//cdn.amcharts.com/lib/5/themes/Animated.js"></script>
	<div id="chartdiv"></div>

	<script>
		// Create root and chart
		var root = am5.Root.new("chartdiv");

		root.setThemes([
			am5themes_Animated.new(root)
		]);

		var data = [{
			name: "Root",
			children: [{
				name: "A0",
				children: [{
					name: "A00",
					value: 88
				}, {
					name: "A01",
					value: 23
				}, {
					name: "A02",
					value: 25
				}]
			}, {
				name: "B0",
				children: [{
					name: "B10",
					value: 62
				}, {
					name: "B11",
					value: 4
				}]
			}, {
				name: "C0",
				children: [{
					name: "C20",
					value: 11
				}, {
					name: "C21",
					value: 92
				}, {
					name: "C22",
					value: 17
				}]
			}, {
				name: "D0",
				children: [{
					name: "D30",
					value: 95
				}, {
					name: "D31",
					value: 84
				}, {
					name: "D32",
					value: 75
				}]
			}]
		}];


		var container = root.container.children.push(
			am5.Container.new(root, {
				width: am5.percent(100),
				height: am5.percent(100),
				layout: root.verticalLayout
			})
		);

		var series = container.children.push(
			am5hierarchy.Tree.new(root, {
				singleBranchOnly: false,
				downDepth: 1,
				initialDepth: 5,
				topDepth: 0,
				valueField: "value",
				categoryField: "name",
				childDataField: "children",
				orientation: "vertical"
			})
		);

		series.data.setAll(data);
		series.set("selectedDataItem", series.dataItems[0]);
	</script>
</body>

</html>