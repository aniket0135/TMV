var lineChartData = [
  // First series
  {
    label: "Series 1",
    values: [ {time: 1370044800, y: 100}, {time: 1370044801, y: 1000},{time: 1370044800, y: 100}, {time: 1370044801, y: 1000},{time: 1370044800, y: 100}, {time: 1370044801, y: 1000},{time: 1370044800, y: 100},
    {time: 1370044800, y: 100}, {time: 1373044801, y: 1000}, {time: 1370644800, y: 100}, {time: 1370044801, y: 1000}, {time: 1370044800, y: 100}, {time: 1370044801, y: 1000},
  {time: 1370044800, y: 100}, {time: 1370544801, y: 1000}, {time: 1370047800, y: 100}, {time: 1270044801, y: 1000}]
  }];


  $('#lineChart').epoch({
    type: 'time.line',
    data: lineChartData
  });
