!function ($) {
  "use strict";

  var Dashboard3 = function () { };

  // Init plugin demo and examples
  Dashboard3.prototype.init = function () {
    // headline chart
    Chart.defaults.global.defaultFontColor = '#a0aeba';
    var ctx = document.getElementById("headline-chart").getContext("2d");
    var headlineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [
          {
            data: [123, 129, 124, 130, 132, 139, 140],
            label: 'Previous Week',
            backgroundColor: 'rgba(0, 183, 253, .25)',
            borderColor: 'transparent',
          },
          {
            data: [125, 127, 123, 132, 129, 138, 144],
            label: 'This Week',
            backgroundColor: 'rgba( 0, 157, 255, .5)',
            borderColor: 'transparent',
          }
        ],
      },
      options: {
        responsive: true,
        elements: {
          line: {
            borderWidth: 1,
          },
          point: {
            radius: 0
          }
        },
        scales: {
          xAxes: [{
            gridLines: { display: false }
          }],
          yAxes: [{
            gridLines: { 
              color: '#e5e5e5', 
              drawBorder: false,
              borderDash: [4, 8]
            },
            ticks: {
              callback: function(value, index, values) {
                return '$' + value;
              }
            },
          }]
        },
        tooltips: {
          position: 'nearest',
          mode: 'index',
          intersect: false
        }
      }
    });

    // headline chart interactivity
    $('#headlinechart-controls #toggleWeeklyAvg').on('change', function() {
      var newDataset = {
        data: [124, 128, 129, 131, 131, 137, 142],
        label: 'Weekly Avg.',
        fill: false,
        borderWidth: 2,
        borderDash: [5, 5],
        pointRadius: 3,
        pointHoverRadius: 5,
        borderColor: '#5e6773',
        backgroundColor: 'transparent'
      }

      if( $(this).is(':checked') ) {
        headlineChart.data.datasets.push(newDataset);
      } else {
        headlineChart.data.datasets.pop();
      }

      headlineChart.update();
    });

    $('#headlinechart-controls #toggleTension').on('change', function() {
      headlineChart.options.elements.line.tension = $(this).is(':checked') ? 0.000001 : 0.4;
      headlineChart.update();
    });


    // real-time usage chart
		var usageData = [],
    totalPoints = 20;

    function getRandomData() {

      if (usageData.length > 0)
        usageData = usageData.slice(1);

      while (usageData.length < totalPoints) {
        var y = Math.random() * 100
        usageData.push(y);
      }

      var result = [];
      for (var i = 0; i < usageData.length; ++i) {
        result.push([i, usageData[i]])
      }

      return result;
    }


    var usageChart = $.plot($('#real-time-usage'), [getRandomData()], {
      series: {
        lines: {
          
          fill: true,
          fillColor: '#53c265'
        }
      },
      colors: ['#53c265'],
      grid: {
        show: false,
      },
    });

    setInterval(function() {
      usageChart.setData([getRandomData()]);
      usageChart.draw();
      $('.widget-mini-realtime-usage').find('.number').text((Math.random() * 100).toFixed(2));
    }, 1000);


    // real-time system load
    var sysLoad = $('#load-chart').easyPieChart({
      size: 130,
      barColor: function(percent) {
        return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
      },
      trackColor: 'rgba(187, 202, 213, .2)',
      scaleColor: false,
      lineWidth: 8,
      lineCap: "round",
      animate: 800
    });

    var updateInterval = 3000; // in milliseconds

    setInterval( function() {
      var randomVal;
      randomVal = getRandomInt(0, 100);

      sysLoad.data('easyPieChart').update(randomVal);
      sysLoad.find('.percent').text(randomVal);

      $('.widget-system-load .info .number').each(function() {
        $(this).text(getRandomInt(0, 100))
      });
    }, updateInterval);

    function getRandomInt(min, max) {
      return Math.floor(Math.random() * (max - min + 1)) + min;
    }


    // todo list
    $('.todo-list input').change( function() {
      if( $(this).prop('checked') ) {
        $(this).parents('li').addClass('completed');
      }else {
        $(this).parents('li').removeClass('completed');
      }
    });

    // visits table with export features
    $('#datatable-export').DataTable({
      pageLength: 5,
      dom: 'Bfrtip',
      buttons: [
        'print',
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
      ]
    });
  },

  $.Dashboard3 = new Dashboard3, $.Dashboard3.Constructor =  Dashboard3
}(window.jQuery),

function ($) {
  "use strict";

  $.Dashboard3.init();
}(window.jQuery);