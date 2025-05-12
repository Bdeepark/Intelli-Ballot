$(document).ready(function(){
  $.ajax({
    url: "http://localhost/vote/getresult.php",
    method: "GET",
    success: function(data) {
      
      data=JSON.parse(data)
      console.log(data);
      var player = [];
      var score = [];

      for(var i in data) {
        player.push( data[i]['POLITICAL_PARTY'].match(/(\b\S)?/g).join(""));
        score.push(data[i]['VOTES_RECEIVED'])
      }
console.log(player)
      var chartdata = {
        labels: player,
        datasets : [
          {
            label: 'Votes Count',
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: score
          }
        ]
      };

      var ctx = $("#mycanvas");

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata
      });
    },
    error: function(data) {
      console.log(data);
    }
  });
});