!function ($) {
  "use strict";

  var Widgets = function () { };

  // Init plugin demo and examples
  Widgets.prototype.init = function () {
    // mini bar chart
    $('#mini-bar-chart').sparkline('html', {
      type: 'bar',
      barWidth: 8,
      height: 45,
      barColor: '#72BB23',
      chartRangeMin: 0,
      chartRangeMax: 100
    });

    
    // mini line chart
    $('#sales-performance').sparkline('html', {
      width: '170px',
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
        updateProgress(from, from + 25);
      },
      callback: function(result) {
        $(this).html('Phone: ' + result)
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
        updateProgress(from, from + 25);
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
  },

  $.Widgets = new Widgets, $.Widgets.Constructor =  Widgets
}(window.jQuery),

function ($) {
  "use strict";

  $.Widgets.init();
}(window.jQuery);