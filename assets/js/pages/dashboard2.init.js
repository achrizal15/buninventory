!function ($) {
  "use strict";

  var Dashboard2 = function () { };

  // Init plugin demo and examples
  Dashboard2.prototype.init = function () {
    // traffic sources chart
    var data = [
      { label: "Social",  data: 45},
      { label: "Referral",  data: 26},
      { label: "Organic", data: 14},
      { label: "Others", data: 15}
    ];

    $.plot('#traffic-sources-chart', data, {
      series: {
        pie: {
          show: true,
          innerRadius: 0.5,
          stroke: {
            width: 4,
            color: "#F9F9F9"
          },
          label: {
            show: true,
            radius: 3/4,
            formatter: donutLabelFormatter,
          },
        },
        lines: {
          show: true,
          fill: true
        },
      },
      legend: {
        show: true,
      },
      grid: {
        hoverable: true
      },
      colors: ["#FF4402", "#AB7DF6", "#F3BB23", "#20B2AA"],
    });

    function donutLabelFormatter(label, series) {
      return "<div class=\"flot-donut-label\">" + Math.round(series.percent) + "%</div>";
    }


    // sales performance chart
    var puzzle = [
      [gt(2013, 10, 21), 188], [gt(2013, 10, 22), 205], [gt(2013, 10, 23), 250], [gt(2013, 10, 24), 230], [gt(2013, 10, 25), 245], [gt(2013, 10, 26), 260], [gt(2013, 10, 27), 290]
    ];

    var qrcode = [
      [gt(2013, 10, 21), 100], [gt(2013, 10, 22), 110], [gt(2013, 10, 23), 155], [gt(2013, 10, 24), 120], [gt(2013, 10, 25), 135], [gt(2013, 10, 26), 150], [gt(2013, 10, 27), 175]
    ];

    var easypolls = [
      [gt(2013, 10, 21), 75], [gt(2013, 10, 22), 65], [gt(2013, 10, 23), 80], [gt(2013, 10, 24), 60], [gt(2013, 10, 25), 65], [gt(2013, 10, 26), 80], [gt(2013, 10, 27), 110]
    ];
    
    $.plot($('#sales-performance-chart'), 
      [
        {
          data: puzzle,
          label: "Puzzle"
        },
        {
          data: qrcode,
          label: "QRCode"
        },
        {
          data: easypolls,
          label: "EasyPolls"
        }
      ],
      {
        series: {
          stack: true,
          bars: {
            show: true,
            barWidth: 0.4,
            align: "center",
            fill: true,
            lineWidth: 0,
            fillColor: { colors: [ { opacity: 1 }, { opacity: 1 } ] }
          },
        },
        grid: {
          hoverable: true, 
          clickable: true,
          borderWidth: 0,
          tickColor: "#E4E4E4",
        },
        colors: ["#56B9B7", "#5666B9", "#FF4402"],
        xaxis: {
          mode: "time",
          timezone: "browser",
          minTickSize: [1, "day"],
          timeBase: "milliseconds",
          timeformat: "%a",
          tickColor: "#fafafa",
          autoscaleMargin: 0.2,
          gridLines: false,
          showTicks: false
        },
        yaxis: {
          ticks: 8,
          color: "transparent",
        },
        legend: {
          show: true,
          position: "nw",
          noColumns: 3
        },
        tooltip: true,
        tooltipOpts: {
          content: '%s: %y'
        }
      }
    );

    function gt(y, m, d) {
      return new Date(y, m-1, d).getTime();
    }
    
  },

  $.Dashboard2 = new Dashboard2, $.Dashboard2.Constructor =  Dashboard2
}(window.jQuery),

function ($) {
  "use strict";

  $.Dashboard2.init();
}(window.jQuery);