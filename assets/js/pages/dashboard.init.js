!function ($) {
  "use strict";

  var Dashboard = function () { };

  // Init plugin demo and examples
  Dashboard.prototype.init = function () {
    // US customer locations
    var usMapData = {
      "al": "2936",
      "ca": "2812",
      "fl": "2735",
      "ga": "2674",
      "il": "2584",
      "ma": "1986",
      "nv": "1921",
      "ny": "1865",
      "ok": "1352",
      "tx": "1322"
    }
    
    $('#us-customers-map').vectorMap({
      map: 'usa_en',
      backgroundColor: '#FAFBFC',
      color: '#f2f4f6',
      borderColor: '#D1D4D7',
      borderOpacity: 0.7,
      values: usMapData,
      scaleColors: ["#4671E0", "#5AA6F0"],
      normalizeFunction: 'polynomial'
    });
    
    
    // age bar chart
    var ageData = [
      [400,1], [800,2], [500,3], [450,4], [300,5], [250,6]
    ];

    var plot = $.plot($('#age-chart'), 
      [
        { data: ageData },
      ], 
      {
        series: {
          bars: {
            show: true,
            horizontal: true,
            barWidth: 0.6,
            align: "center",
            fill: true,
            lineWidth: 0,
            fillColor: "rgba(245,165,35,0.5)"
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
          ticks: [[1,'18-22'], [2,'23-27'], [3,'28-32'], [4,'33-37'], [5,'38-42'], [6,'> 42']],
          color: "transparent",
          font: { size: 11 },
        },
      }
    );


    // gauge chart
    var activityGauge = new JustGage({
      id: "gauge",
      value: getRandomInt(0, 100),
      valueFontColor: '#5E6773',
      valueFontFamily: 'Roboto, sans-serif',
      valueMinFontSize: 28,
      symbol: '%',
      min: 0,
      max: 100,
      minTxt: '0%',
      maxTxt: '100%',
      label: 'resource allocated',
      labelFontColor: '#A0AEBA',
      labelMinFontSize: 12,
      counter: true,
      pointer: true,
      pointerOptions: {
        color: '#5E6773'
      }
    });

    setInterval(function() {
      activityGauge.refresh(getRandomInt(0, 100));
    }, 2000);

    function getRandomInt(min, max) {
      min = Math.ceil(min);
      max = Math.floor(max);
      return Math.floor(Math.random() * (max - min + 1)) + min;
    }


    // sales chart
    var salesData = [[1,400], [2,450], [3,370], [4,299], [5,205], [6,142], [7,120]];
    var salesChart = $.plot($('#sales-chart'),
      [
        { data: salesData }
      ],
      {
        series: {
          lines: {
            show: true,
            lineWidth: 2, 
          },
          points: {
            show: true, 
            lineWidth: 2,
            fill: true,
            fillColor: "#fff",
            pointRadius: 5,
          },
          shadowSize: 0
        },
        colors: ["#AB7DF6"],
        grid: {
          hoverable: true, 
          clickable: true,
          borderWidth: 0,
          tickColor: "transparent",
        },
        xaxis: {
          show: false,
        },
        yaxis: {
          show: false,
        },
        tooltip: true,
        tooltipOpts: {
          content: function(s, x, y) {
            var days = ["Mon","Tue","Wed","Thu","Fri","Sat","Sun"];
            return days[x-1] + ": " + y;
          }
        }
      }
    );


    // online visitor, demo purpose
    setInterval( function() {
      $('.online-visitors .number').text(Math.floor(Math.random()*100));
    }, 3000);

    // live chat support
    $('.table-chat-support').dataTable({
      scrollX: false,
      scrollY: "300px",
      ordering: false,
      searching: false,
      info: false,
      scrollCollapse: true,
      paging: false,
    });

    $('.table-chat-support .page-tooltip').tooltip({
      placement: 'bottom',
    });
    
    $('.table-chat-support [data-toggle="popover"]').popover({
      trigger: 'hover',
      container: 'body',
      html: true,
      content: function() {
        var visitorContent, visitorImgPath;
        var visitorName = 'Guest';

        if($(this).attr('data-visitor-img') === undefined) {
          visitorContent = '<i class="fa fa-user picture guest-avatar"></i>';
        } else {
          visitorName = $(this).attr('data-visitor-name');
          visitorImgPath = $(this).attr('data-visitor-img');
          visitorContent = '<img src="' + visitorImgPath + '" class="picture rounded-circle">';
        }

        return '<div class="online-visitor-data">'
            + '<div class="left">'
              + visitorContent
            + '</div>'
            + '<div class="right">'
              + '<div class="data">'
                + '<span class="label-data">Name :</span>'
                + '<span>' + visitorName + '</span>'
              + '</div>'
              + '<div class="data">'
                + '<span class="label-data">IP :</span>'
                + '<span><a href="#">123.111.101.76</a></span>'
              + '</div>'
              + '<div class="data">'
                + '<span class="label-data">Type :</span>'
                + '<span>Returning</span>'
              + '</div>'
            + '</div>'
            + '</div>';
      }
    });


    // sales chart
    var salesChart, sales, earnings;

    sales = [
      [gt(2020, 1, 1), 54], [gt(2020, 1, 2), 75], [gt(2020, 1, 3), 66], [gt(2020, 1, 4), 80], [gt(2020, 1, 5), 75], [gt(2020, 1, 6), 85], [gt(2020, 1, 7), 90]
    ];

    earnings = [
      [gt(2020, 1, 1), 200], [gt(2020, 1, 2), 600], [gt(2020, 1, 3), 360], [gt(2020, 1, 4), 550], [gt(2020, 1, 5), 300], [gt(2020, 1, 6), 800], [gt(2020, 1, 7), 900]
    ];
    
    salesChart = $.plot($("#sales-stat"), 
      [
        {
          data: sales,
          label: "Sales"
        },
        {
          data: earnings,
          label: "Earnings",
          yaxis: 2
        }
      ], 
      {
        series: {
          lines: {
            show: true,
            lineWidth: 2, 
            fill: false
          },
          points: {
            show: true, 
            lineWidth: 1,
            fill: true,
            fillColor: "#fff"
          },
          shadowSize: 0
        },
        grid: {
          hoverable: true, 
          clickable: true,
          borderWidth: 0,
          tickColor: "#EFF1F5",
        },
        colors: ["#45AEEF", "#F89B03"],
        xaxis: {
          mode: "time",
          timezone: "browser",
          minTickSize: [1, "day"],
          timeformat: "%a",
          timeBase: "milliseconds",
          autoscaleMargin: 0.2,
          gridLines: false,
          showTicks: false,
          font: { size: 12 }
        },
        yaxis: {
          color: "transparent",
          font: { size: 12 },
          labelWidth: 20
        },
        yaxes: [ 
          { },
          { 
            position: "right",
            labelWidth: 40,
            tickFormatter: function(val, axis) {
              return '$' + val;
            }
          }
        ],
        legend: {
          show: false,
        },
        tooltip: true,
        tooltipOpts: {
          content: '%s: %y',
          cssClass: 'flotTip-black',
        }
      }
    );

    // get day function
    function gt(y, m, d) {
      return new Date(y, m-1, d).getTime();
    }


    // progress shares goal
    var runProgressShareOnce = false;

    $('#progress-share').appear(function(){
      
      if(runProgressShareOnce) return false;

      $(this).each(function() {
        var $bar = $(this).find(".bar");
        var $val = $(this).find(".value");
        var perc = parseInt( $val.text(), 10);
        var scale = 180/parseInt($(this).attr('data-max'));

        $({p:0}).animate({p:perc}, {
          duration: 3000,
          easing: "swing",
          step: function(p) {
            $bar.css({
            transform: "rotate("+ (45+(p*scale)) +"deg)",
          });
            $val.text(p|0);
          }
        });
      });

      runProgressShareOnce = true;
    });


    // profile completeness meter
    var cPbar = $('.completeness-meter');
    var progress = cPbar.find(".progress-bar");
    var from = parseInt(progress.attr("data-from"));
    var to = parseInt(progress.attr("data-to"));

    updateProgress(from, to);
    
    var endpoint_url = "http://localhost:8080/dist/assets/plugins/jquery-jeditable/php-demo/";
    var save_url = endpoint_url + 'save.php';

    // add phone number
    $(".editable-phone").editable(save_url, {
      inputcssclass: "form-control d-inline mr-1",
      type: "masked",
      mask: "(999) 999-9999",
      submit: '<i class="fa fa-check"></i> ', // give whitespace
      cancel: '<i class="fa fa-remove"></i> ', // give whitespace
      cancelcssclass: 'btn btn-sm btn-outline-light ml-1',
      submitcssclass: 'btn btn-sm btn-success',
      onsubmit: function() {
        var from = parseInt(progress.attr("data-to"));
        updateProgress(from, from + 10);
      },
      callback: function(result) {
        $(this).html('Phone: ' + result)
        markAsDone($(this));
      },
    });

    // add sex
    $(".editable-select").editable(save_url, {
      inputcssclass: "form-control",
      type   : "select",
      // this data will be sorted by value
      data   : '{"":"Select...", "Male":"Male","Female":"Female"}',
      onsubmit: function() {
        var from = parseInt(progress.attr("data-to"));
        updateProgress(from, from + 10);
      },
      callback: function(result) {
        $(this).html('Sex: ' + result)
        markAsDone($(this));
      },
    });

    // add date of birth
    $(".editable-dob").editable(save_url, {
      inputcssclass: "form-control",
      type: 'datepicker',
      datepicker: {
        format: "dd-mm-yy",
        onSelect: function() {
          $(this).submit();
        },
      },
      onsubmit: function() {
        var from = parseInt(progress.attr("data-to"));
        updateProgress(from, from + 10);
      },
      callback: function(result) {
        $(this).html('DOB: ' + result)
        markAsDone($(this));
      },
    });
    
    // add nickname
    $(".editable-nickname").editable(save_url, {
      inputcssclass: "form-control d-inline mr-1",
      submit: '<i class="fa fa-check"></i> ', // give whitespace
      cancel: '<i class="fa fa-remove"></i> ', // give whitespace
      cancelcssclass: 'btn btn-sm btn-outline-light ml-1',
      submitcssclass: 'btn btn-sm btn-success',
      placeholder: 'Add your nickname', // must be the same text with the initial link text
      onsubmit: function(p1,el) {
        var from = parseInt(progress.attr("data-to"));
        updateProgress(from, from + 10);
      },
      callback: function(result) {
        $(this).html('Nickname: ' + result)
        markAsDone($(this));
      },
    });

    function updateProgress(from, to) {
      var timerId;

      progress.css('width', from+'%');
      progress.addClass('progress-bar-striped active');

      timerId = setInterval(function() {
        from += 5;
        progress.css('width', from + '%');
        progress.html(from + '%');

        if (from >= to) {
          clearInterval(timerId);
          progress.removeClass('progress-bar-striped active');
          progress
          .attr("data-from", from)
          .attr("data-to", to);

          if (from >= 100) {
            $('.complete-info').addClass('text-success').html('<i class="fa fa-check-circle"></i> Hooray, it\'s done!');
            progress.removeClass('bg-info').addClass('bg-success');
          }
        } 
      }, 200);
    }

    function markAsDone(el) {
      el
        .removeClass('editable')
        .off('click')
        .parents('li').addClass('done')
        .find('i').removeClass('fa-circle-o').addClass('fa-check-circle');
    }

    // emails open by location
    var mapData = {
      "us": "2936",
      "dz": "2812",
      "ru": "2735",
      "fr": "2674",
      "mx": "2584",
      "de": "1986",
      "br": "1921",
      "ca": "1865",
      "id": "1352",
      "cn": "1322"
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


    // mini bar charts
    $('#mini-bar-chart1').sparkline('html', {
      type: 'bar',
      barWidth: 8,
      height: 45,
      barColor: '#00B9EB',
      chartRangeMin: 0,
      chartRangeMax: 100
    });
    $('#mini-bar-chart2').sparkline('html', {
      type: 'bar',
      barWidth: 8,
      height: 45,
      barColor: '#EB9700',
      chartRangeMin: 0,
      chartRangeMax: 100
    });
    $('#mini-bar-chart3').sparkline('html', {
      type: 'bar',
      barWidth: 8,
      height: 45,
      barColor: '#72BB23',
      chartRangeMin: 0,
      chartRangeMax: 100
    });
    $('#mini-bar-chart4').sparkline('html', {
      type: 'bar',
      barWidth: 8,
      height: 45,
      barColor: '#FB5021',
      chartRangeMin: 0,
      chartRangeMax: 100
    });


    $('#sales-performance').sparkline('html', {
      width: '70%',
      height: '40px',
      lineWidth: '2',
      lineColor: '#00aaff',
      fillColor: false,
      spotRadius: '2',
      highlightLineColor: '#aedaff',
      highlightSpotColor: '#71aadb',
      spotColor: false,
      minSpotColor: false,
      maxSpotColor: false,
      disableInteraction: false
    });
  
    // Bootstrap Tour
    var tour = new Tour({
      steps: [
        {
        	element: '#tour-help',
        	placement: 'bottom',
        	title: 'Welcome to Klorofil Pro',
        	content: 'Hello, welcome to Klorofil Pro. Use this tour feature to guide new users to your website or show existing users new features.',
        },
        {
          element: '#tour-sales-stat',
          title: 'Backdrop Container',
          backdrop: true,
          content: 'Add backdrop container to give focus on the step. It can be added to all steps or certain step you choose.'
        },
        {
          element: '#tour-online-count',
          placement: 'top',
          title: 'Anywhere on page',
          content: 'You can target specific element on the page like this one. You can also determine the placement either right (default), bottom, left, top or auto.'
        },
        {
          element: '#tour-fullwidth',
          placement: 'bottom',
          title: 'Layout',
          content: 'This toggle button will make the layout at fullwidth mode. More space, more content. Try now!'
        },
      ],
      template: "<div class='popover tour'> " +
            "<div class='arrow'></div> " +
            "<h3 class='popover-title'></h3>" +
            "<div class='popover-content'></div>" +
            "<div class='popover-navigation'>" +
              "<button class='btn btn-outline-light btn-sm' data-role='prev'>« Prev</button>" +
              "<button class='btn btn-primary btn-sm' data-role='next'>Next »</button>" +
              "<button class='btn btn-outline-light btn-sm' data-role='end'>End tour</button>" +
            "</div>" +
          "</div>",
    });

    tour.init();
    tour.start();

    if(tour.ended()) {
      tour.restart();
    }
  },

  $.Dashboard = new Dashboard, $.Dashboard.Constructor =  Dashboard
}(window.jQuery),

function ($) {
  "use strict";

  $.Dashboard.init();
}(window.jQuery);