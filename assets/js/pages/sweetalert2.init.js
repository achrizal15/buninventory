!function ($) {
  "use strict";

  var SweetAlert = function () { };

  // Init plugin demo and examples
  SweetAlert.prototype.init = function () {
    $('#btn-sw-success').on('click', function() {
      Swal.fire({
        title: 'Good job!',
        text: 'You clicked the button!',
        type: 'success'
      });
    });

    $('#btn-sw-error').on('click', function() {
      Swal.fire({
        title: 'Error!',
        text: 'Please check again',
        type: 'error'
      });
    });

    $('#btn-sw-warning').on('click', function() {
      Swal.fire({
        title: 'Warning!',
        text: 'Your storage is almost full',
        type: 'warning'
      });
    });

    $('#btn-sw-info').on('click', function() {
      Swal.fire({
        title: 'Hello!',
        text: 'Welcome to Klorofil Pro',
        type: 'info'
      });
    });

    $('#btn-sw-question').on('click', function() {
      Swal.fire({
        title: 'Any question?',
        text: 'Please contact us at support@themeineed.com',
        type: 'info'
      });
    });

    $('#btn-sw-confirmation').on('click', function() {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#F9354C',
        cancelButtonColor: '#41B314',
        confirmButtonText: 'Yes, delete it!'
      }).then(function (result) {
        if(result.value) {
          Swal.fire({
            title: 'Deleted!',
            text: 'Your file has been deleted.',
            type: 'success'
          });
        }
      });
    });

    $('#btn-sw-confirmation2').on('click', function() {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#F9354C',
        cancelButtonColor: '#41B314',
        confirmButtonText: 'Yes, delete it!'
      }).then(function (result) {
        if(result.value) {
          Swal.fire({
            title: 'Deleted!',
            text: 'Your file has been deleted.',
            type: 'success'
          });
        } else if (result.dismiss) {
          Swal.fire({
            title: 'Cancelled',
            text: 'Your file is safe',
            type: 'info'
          });
        }
      });
    });

    $('#btn-sw-chaining').on('click', function() {
      Swal.mixin({
        input: 'text',
        confirmButtonText: 'Next &rarr;',
        showCancelButton: true,
        animation: false,
        progressSteps: ['1', '2', '3']
      }).queue([
          {
            title: 'Question 1',
            text: 'What\'s your name?'
          },
          {
            title: 'Question 2',
            text: 'How old are you?'
          },
          {
            title: 'Question 3',
            text: 'Where are you come from?' 
          }
      ]).then(function (result) {
        if(result.value) {
          Swal.fire({
            title: 'All done!',
            html:
            'Your answers: <pre><code>' +
              JSON.stringify(result.value) +
            '</code></pre>',
            confirmButtonText: 'Lovely!'
          })
        }
      });
    });

    $('#btn-sw-dynamic').on('click', function() {
      var ipAPI = 'https://api.ipify.org?format=json';

      Swal.queue([{
        title: 'Your public IP',
        confirmButtonText: 'Show my public IP',
        text: 'Your public IP will be received via AJAX request',
        showLoaderOnConfirm: true,
        preConfirm: function() {
          return fetch(ipAPI)
          .then(function (response) { response.json() })
          .then(function (data) { Swal.insertQueueStep(data.ip) })
          .catch(function() {
            Swal.insertQueueStep({
              type: 'error',
              title: 'Unable to get your public IP'
            })
          })
        }
      }]);
    });

    $('#btn-sw-ajax').on('click', function() {
      Swal.fire({
        title: 'Submit your Github username',
        input: 'text',
        inputAttributes: {
          autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Submit',
        showLoaderOnConfirm: true,
        preConfirm: function(login) {
          return fetch('//api.github.com/users/' + login)
            .then(function (response) {
              if (!response.ok) {
                throw new Error(response.statusText)
              }
              return response.json()
            })
            .catch(function (error) {
              Swal.showValidationMessage(
                'Request failed:' + error
              )
            })
        },
        allowOutsideClick: false,
        }).then(function (result) {
          if (result.value) {
            Swal.fire({
              title: result.value.login + 's avatar',
              imageUrl: result.value.avatar_url
            })
          }
        });
    });
    
    $('#btn-sw-text').on('click', function() {
      Swal.fire({
        title: 'Input something',
        text: 'Try to input blank input to simulate error',
        input: 'text',
        showCancelButton: true,
        inputValidator: function(value) {
          if(!value) {
            return 'You need to write something!'
          }
        }
      }).then(function(result) {
        if(result.value) {
          Swal.fire({
            type: 'success',
            html: 'You entered: ' + result.value
          });
        }
      });
    });
    
    $('#btn-sw-email').on('click', function() {
      Swal.fire({
        title: 'Input email address',
        input: 'email'
      }).then(function(result) {
        Swal.fire({
          type: 'success',
          html: 'Entered email: ' + result.value
        });
      });
    });
    
    $('#btn-sw-url').on('click', function() {
      Swal.fire({
        title: 'Input URL',
        input: 'url'
      }).then(function (result) {
        Swal.fire({
          type: 'success',
          html: 'Entered URL: ' + result.value
        });
      });
    });
    
    $('#btn-sw-password').on('click', function() {
      Swal.fire({
        title: 'Enter your password',
        input: 'password',
        inputAttributes: {
          'maxlength': 10,
          'autocapitalize': 'off',
          'autocorrect': 'off'
        }
      }).then(function(result) {
        if (result.value) {
          Swal.fire({
            type: 'success',
            html: 'Entered password: ' + result.value
          });
        }
      });
    });
    
    $('#btn-sw-textarea').on('click', function() {
      Swal.fire({
        input: 'textarea',
        showCancelButton: true
      }).then(function (result) {
        if (result.value) {
          Swal.fire(result.value);
        }
      });
    });

    $('#btn-sw-select').on('click', function() {
      Swal.fire({
        title: 'Select Ukraine',
        input: 'select',
        inputOptions: {
          'SRB': 'Serbia',
          'UKR': 'Ukraine',
          'HRV': 'Croatia'
        },
        inputPlaceholder: 'Select country',
        showCancelButton: true,
        inputValidator: function(value) {
          return new Promise(function(resolve) {
            if(value === 'UKR') {
              resolve();
            } else {
              resolve('You need to select Ukraine :)');
            }
          });
        }
      }).then(function(result) {
        Swal.fire({
          type: 'success',
          html: 'You selected: ' + result.value
        });
      });
    });
    
    $('#btn-sw-radio').on('click', function() {
      var inputOptions = new Promise(function (resolve) {
        setTimeout(function () {
          resolve({
            '#ff0000': 'Red',
            '#00ff00': 'Green',
            '#0000ff': 'Blue'
          })
        }, 1000);
      });

      Swal.fire({
        title: 'Select color',
        input: 'radio',
        inputOptions: inputOptions,
        inputValidator: function(result) {
          return new Promise(function(resolve) {
            if(result) {
              resolve();
            } else {
              resolve('You need to select something!');
            }
          });
        }
      }).then(function(result) {
        Swal.fire({
          type: 'success',
          html: 'You selected: ' + result.value
        });
      });
    });
    
    $('#btn-sw-checkbox').on('click', function() {
      Swal.fire({
        title: 'Terms and conditions',
        input: 'checkbox',
        inputPlaceholder: 'I agree with the terms and conditions',
        confirmButtonText: 'Continue <i class="fa fa-arrow-right"></i>',
        inputValidator: function(result) {
          return new Promise(function(resolve, reject) {
            if(result) {
              resolve();
            } else {
              resolve('You need to agree with T&C')
            }
          });
        }
      }).then(function(result) {
        Swal.fire({
          type: 'success',
          text: 'You agreed with T&C :)'
        });
      });
    });
    
    $('#btn-sw-file').on('click', function() {
      Swal.fire({
        title: 'Select image',
        input: 'file',
        inputAttributes: {
          accept: 'image/*',
          'aria-label': 'Upload your profile picture'
        }
      }).then(function(file) {
        var reader = new FileReader
        reader.onload = function (e) {
          Swal.fire({
            title: 'Your uploaded picture',
            imageUrl: e.target.result,
            imageAlt: 'The uploaded picture'
          });
        }
        reader.readAsDataURL(file.value);
      });
    });
    
    $('#btn-sw-range').on('click', function() {
      Swal.fire({
        title: 'How old are you?',
        type: 'question',
        input: 'range',
        inputAttributes: {
          min: 8,
          max: 120,
          step: 1
        },
        inputValue: 25
      });
    });
  },

  $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),

function ($) {
  "use strict";
  $.SweetAlert.init()
}(window.jQuery);