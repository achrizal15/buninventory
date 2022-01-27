// Plugin for timepicker with Bootstrap styles
(function ($) {
  $.editable.addInputType('time', {
      /* Create input element. */
      element : function(settings, original) {
          /* Create and pulldowns for hours and minutes. Append them to */
          /* form which is accessible as variable this.                 */
          var hourselect = $('<select class="form-control form-control-sm d-inline mr-1" style="width: 3rem;" id="hour_" />');
          var minselect  = $('<select class="form-control form-control-sm d-inline mr-1" style="width: 3rem;" id="min_" />');

          var option;

          for (var hour=0; hour <= 23; hour++) {
              if (hour < 10) {
                  hour = '0' + hour;
              }
              option = $('<option />').val(hour).append(hour);
              hourselect.append(option);
          }
          $(this).append(hourselect);

          for (var min=0; min <= 45; min = parseInt(min, 10) + 15) {
              if (min < 10) {
                  min = '0' + min;
              }
              option = $('<option />').val(min).append(min);
              minselect.append(option);
          }
          $(this).append(minselect);

          /* Last create an hidden input. This is returned to plugin. It will */
          /* later hold the actual value which will be submitted to server.   */
          var hidden = $('<input type="hidden" />');
          $(this).append(hidden);
          return(hidden);
      },
      /* Set content / value of previously created input element. */
      content : function(string, settings, original) {
          /* Select correct hour and minute in pulldowns. */
          var hour = parseInt(string.substr(0,2), 10);
          var min  = parseInt(string.substr(3,2), 10);

          $('#hour_', this).children().each(function() {
              if (hour === $(this).val()) {
                  $(this).attr('selected', 'selected');
              }
          });
          $('#min_', this).children().each(function() {
              if (min === $(this).val()) {
                  $(this).attr('selected', 'selected');
              }
          });

      },
      /* Call before submit hook. */
      submit: function (settings, original) {
          /* Take values from hour and minute pulldowns. Create string such as    */
          /* 13:45 from them. Set value of the hidden input field to this string. */
          var value = $('#hour_').val() + ':' + $('#min_').val();
          $('input', this).val(value);
      }
  });
})(jQuery);



!function ($) {
  "use strict";

  var InplaceEditing = function () { };

  // Init plugin demo and examples
  InplaceEditing.prototype.init = function () {
    var endpoint_url = "http://localhost:8080/dist/assets/plugins/jquery-jeditable/php-demo/";
    var save_url = endpoint_url + 'save.php';

    // basic
    $(".editable-text").editable(save_url, {
      inputcssclass: "form-control",
      placeholder: "Hit enter to submit",
    });

    // advanced example
    var submitdata = {}
    submitdata['slow'] = true; /* this will make the save.php script take a long time so you can see the spinner */
    submitdata['param1'] = 'param1_value';

    $(".editable-text-full").editable(save_url, {
      inputcssclass: "form-control",
      indicator: "<i class='fa fa-spinner fa-spin'></i>",
      type: "text",
      //pattern: "[A-Za-z]{3}", /* only limit to three letters example */
      onedit: function() { console.log('If I return false, editing will be canceled'); return true;},
      before: function() { console.log('Triggered before form appears')},
      callback: function(result, settings, submitdata) {
        console.log('Triggered after submit');
        console.log('Result: ' + result);
        console.log('Settings.width: ' + settings.width);
        console.log('Submitdata: ' + submitdata.param1);
      },
      cancel: 'Cancel',
      cssclass: 'custom-class',
      cancelcssclass: 'btn btn-sm btn-danger ml-1',
      submitcssclass: 'btn btn-sm btn-success',
      maxlength: 200,
      select: true, /* all text selection */
      label: 'This is a label',
      onreset: function() { console.log('Triggered before reset') },
      onsubmit: function() { console.log('Triggered before submit') },
      showfn: function(elem) { elem.fadeIn('slow') },
      submit: 'Save',
      submitdata: submitdata,
      /* submitdata as a function example
      submitdata: function(revert, settings, submitdata) {
          console.log("Revert text: " + revert);
          console.log(settings);
          console.log("User submitted text: " + submitdata.value);
      },
      */
      tooltip: "Click to edit...",
      width: 160
    });
    
    // textarea
    $(".editable-textarea").editable(save_url, {
      inputcssclass: "form-control",
      type: 'textarea',
      submit: '<i class="fa fa-save"></i> Save',
      cancel: '<i class="fa fa-remove"></i> Cancel',
      cancelcssclass: 'btn btn-sm btn-outline-light ml-1',
      submitcssclass: 'btn btn-sm btn-success',
    });

    // checkbox
    $(".editable-checkbox").editable(save_url, {
      inputcssclass: "form-control",
      type: "checkbox",
      submit: 'Save',
      submitcssclass: 'btn btn-sm btn-success'
    });

    // inline select
    $(".editable-select").editable(save_url, {
      inputcssclass: "form-control",
      type   : "select",
      // this data will be sorted by value
      data   : '{"Wiki":"Wiki","Banana":"Banana","Apple":"Apple", "Pear":"Pear", "selected":"Pear"}',
      submitdata : function() { return {id : 42, something: 'else'};},
    });

    // multiple select
    $(".multiple-select").editable(save_url, {
      inputcssclass: "form-control",
      type : "select",
      data   : '{"Wiki":"Wiki","Banana":"Banana","Apple":"Apple", "Pear":"Pear"}',
      submit: 'OK',
      submitcssclass : 'btn btn-sm btn-success',
      multiple : true,
      onblur: function() { return true; },
      // use intercept to display the results as we want it
      intercept: function(result, status) {
        return "You selected: " + result + ". ";
      },
      onerror: function(settings, self, xhr) {
        console.log("Error with status code: " + xhr.status);
      },
      submitdata : function(revert, settings, result) {
        console.log("User selected values: " + result.value);
      },
    });

    // edit on double click
    $(".editable-text-dbclick").editable(save_url, {
      inputcssclass: "form-control",
      tooltip   : "Doubleclick to edit...",
      event     : "dblclick",
    });

    // edit on mouse over
    $(".editable-text-hover").editable(save_url, {
      inputcssclass: "form-control",
      tooltip   : "Move mouseover to edit...",
      event     : "mouseover",
    });

    // email, number and url input
    $(".editable-email").editable(save_url, {
      inputcssclass: "form-control",
      type: "email",
      tooltip: "Enter a valid email address",
      placeholder: "your.email@domain.com",
    });

    $(".editable-number").editable(save_url, {
      inputcssclass: "form-control",
      type: "number",
      tooltip: "Click to edit: number",
      placeholder: "0",
      min: 0,
      max: 1000,
      step: 1
    });

    $(".editable-url").editable(save_url, {
      inputcssclass: "form-control",
      type: "url",
      tooltip: "Enter a valid URL",
      placeholder: "https://www.example.com"
    });

    // datepicker
    $(".editable-datepicker").editable(save_url, {
      inputcssclass: "form-control",
      type: 'datepicker',
      datepicker: {
        format: "dd-mm-yy",
        onSelect: function() {
          $(this).submit();
        },
      },
      tooltip: "Click to edit..."
    });

    // timepicker
    $(".editable-timepicker").editable(save_url, {
      type: 'time',
      submit: 'Save',
      tooltip: "Click to edit...",
      submitcssclass: 'btn btn-sm btn-success',
    });

    // character counter
    $(".editable-charcounter").editable(save_url, {
      inputcssclass: "form-control",
      type: "charcounter",
      submit: 'Save',
      submitcssclass: 'btn btn-sm btn-success d-block',
      tooltip: "Click to edit...",
      onblur: "ignore",
      charcounter: {
        characters: 60,
        format: "%1 characters remaining",
      }
    });

    // masked input
    $(".editable-masked").editable(save_url, {
      inputcssclass: "form-control",
      type: "masked",
      mask: "(999) 999-9999",
      tooltip: "Click to edit..."
    });

    // autogrow textarea
    $(".editable-autogrow").editable(save_url, {
      inputcssclass: "form-control",
      type: "autogrow",
      submit: 'OK',
      cancel: 'cancel',
      cancelcssclass: 'btn btn-sm btn-outline-light ml-1',
      submitcssclass: 'btn btn-sm btn-success',
      tooltip: "Click to edit...",
      onblur: "ignore"
    });
    

  },

  $.InplaceEditing = new InplaceEditing, $.InplaceEditing.Constructor =  InplaceEditing
}(window.jQuery),

function ($) {
  "use strict";

  $.InplaceEditing.init();
}(window.jQuery);

