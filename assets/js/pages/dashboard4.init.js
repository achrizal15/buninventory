!function ($) {
  "use strict";

  var Dashboard4 = function () { };

  // Init plugin demo and examples
  Dashboard4.prototype.init = function () {
    // Visit duration chart
    var data = [
      [400,1], [800,2], [500,3], [450,4], [300,5], [250,6], [150,7]
    ];

    var plot = $.plot($('#visit-duration-chart'), 
      [
        { data: data },
      ], 
      {
        series: {
          bars: {
            show: true,
            horizontal: true,
            barWidth: 0.8,
            align: "center",
            fill: true,
            lineWidth: 0,
            fillColor: "rgba(0,184,235,0.2)"
          },
        },
        grid: {
          borderWidth: 0,
          tickColor: "transparent",
        },
        xaxis: {
          show: false,
          autoScale: 'none',
          min:0, max: 800,
          gridLines: false,
          showTicks: false,
          color: "transparent"
        },
        yaxis: {
          autoScaleMargin: 0.2,
          gridLines: false,
          showTicks: false,
          ticks: [[1,'0-10s'], [2,'11s-30s'], [3,'31s-60s'], [4,'1m-2m'], [5,'3m-5m'], [6,'6m-10m'], [7,'> 10m']],
          color: "transparent",
          font: { size: 11 },
        },
      }
    );


    // Campaign result, tab 1
    var sparklineParams = {
      width: '100%',
      height: '70px',
      lineWidth: '2',
      lineColor: 'rgba(0,56,255,0.30)',
      fillColor: 'rgba(0,56,255,0.15)',
      spotRadius: '2',
      highlightLineColor: 'rgba(0,56,255,0.30)',
      highlightSpotColor: 'rgba(0,56,255,0.30)',
      spotColor: '',
      minSpotColor: false,
      maxSpotColor: false,
      disableInteraction: false,
      tooltipClassname: 'jqstooltip flotTip',
      normalRangeMin: 0,
      normalRangeMin: 100
    };
    
    $('.inlinesparkline').sparkline('html', sparklineParams);


    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
      // Campaign result, tab 2
      if($(e.target).attr('href') === '#tab2') {
        var mapData = {
          "us": "2936",
          "dz": "2812",
          "ru": "2735",
          "fr": "2674",
          "mx": "2584",
          "de": "1986",
          "br": "1921",
        }

        $('#map-email-opens').vectorMap({
          map: 'world_en',
          backgroundColor: 'transparent',
          color: '#f2f4f6',
          borderColor: '#D1D4D7',
          borderOpacity: 0.5,
          values: mapData,
          scaleColors: ["#E7F5FF", "#9AA9B4"],
          normalizeFunction: 'polynomial'
        });
      } else if($(e.target).attr('href') === '#tab3') {
        // Campaign result, tab 3
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
      }
    });

    function donutLabelFormatter(label, series) {
      return "<div class=\"flot-donut-label\">" + Math.round(series.percent) + "%</div>";
    }


    // stock carousel
    $('.widget-carousel').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      draggable: false,
      swipe: false,
      responsive: [
        {
          breakpoint: 640,
          settings: {
            slidesToShow: 1,
          }
        }
      ]
    });


    // sales chart
    var ctxBarChart = document.getElementById("sales-chart").getContext("2d");
    var barChart = new Chart(ctxBarChart, {
      type: 'bar',
      data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [
          {
            data: [400, 450, 370, 299, 205, 142, 120],
            backgroundColor: 'rgba(66,184,1,0.3)'
          }
        ]
      },
      options: {
        responsive: true,
        legend: {
          display: false
        },
        scales: {
          xAxes: [{
            display: false
          }],
          yAxes: [{
            display: false
          }]
        }
      }
    });


    // chat volume
    var ctxLineChart = document.getElementById("chat-volume-chart").getContext("2d");
    var lineChart = new Chart(ctxLineChart, {
      type: 'line',
      data: {
        labels: ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'],
        datasets: [
          {
            data: [65, 85, 95, 90, 75, 60, 30],
            label: 'Volume',
            fill: false,
            borderWidth: 2,
            pointRadius: 3,
            pointHoverRadius: 5,
            borderColor: '#FB9D7C',
            backgroundColor: '#FB9D7C',
          },
        ]
      },
      options: {
        responsive: true,
        legend: {
          display: false
        },
        elements: {
          line: {
            tension: 0.000001
          }
        },
        scales: {
          xAxes: [{
            gridLines: {
              display: false,
              drawBorder: false
            }
          }],
          yAxes: [{
            gridLines: { 
              color: '#eff3f6',
              drawBorder: false,
            },
            ticks: {
              display: false,
              min: 20,
              max: 100,
              stepSize: 20
            }
          }]
        },
      }
    });
    
  },

  $.Dashboard4 = new Dashboard4, $.Dashboard4.Constructor =  Dashboard4
}(window.jQuery),

function ($) {
  "use strict";

  $.Dashboard4.init();
}(window.jQuery);