$(document).ready(function(){
  var ajax_call = function()
  {
    $.ajax({
      url : "http://localhost/tmv-master/getdata.php",
      type : "GET",
      success : function(data){
        console.log(data);
        var dataset = JSON.parse(data);
        console.log(dataset);
        //var id_data = [];
        var temp_data = [];
        var hum_data = [];
        var time_data = [];

        for(var i in dataset) {
          //id_data.push(dataset[i].id);
          temp_data.push(dataset[i].temp);
          hum_data.push(dataset[i].hum);
          time_data.push(dataset[i].cur_time);
        }

        var chartdata = {
          labels: time_data,
          datasets: [
            {
              label: "Temperature",
              fill: false,
              lineTension: 0.1,
              backgroundColor: "rgba(59, 89, 152, 0.75)",
              borderColor: "rgba(59, 89, 152, 1)",
              pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
              pointHoverBorderColor: "rgba(59, 89, 152, 1)",
              data: temp_data
            },
            {
              label: "Humidity",
              fill: false,
              lineTension: 0.1,
              backgroundColor: "rgba(70, 100, 175, 1)",
              borderColor: "rgba(70, 100, 175, 1)",
              pointHoverBackgroundColor: "rgba(70, 100, 175, 1)",
              pointHoverBorderColor: "rgba(70, 100, 175, 1)",
              data: hum_data
            }
          ]
        }
        var ctx = $("#mycanvas");
        var optionsNoAnimation = {animation : false}
        var LineGraph = new Chart(ctx,{
          type: 'line',
          data: chartdata,
          animation: false,
          options: {
            animation: {
              duration: 0
            }
          }
        });
      },
      error : function(data){
        console.log(data);
      }
    });
  };
  var interval = 1000;
  setInterval(ajax_call, interval);
});
