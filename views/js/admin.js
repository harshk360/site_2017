
$(window).load(function() {
    $("#page-loader").delay(300).fadeOut('slow'); // page loader
    $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust().draw(); // adjust columns

});

$(document).ready(function(){

    $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
        $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust().draw();
    } );


    // Initialize sortable tables
    var participantTable = $('#participantsDataTable').DataTable({
        "orderMulti": true,
        "order": [[ 2, "asc" ]],
        "colReorder": true,
        "columnDefs": [
          { "visible": false, "targets": [0, 6, 7, 10, 11, 12, 13, 14, 15, 26, 27] }
        ],
        "columns": [
                { data: 'id' },
                { data: 'firstName' },
                { data: 'lastName' },
                { data: 'nickName' },
                { data: 'email' },
                { data: 'phone' },
                { data: 'street' },
                { data: 'street2' },
                { data: 'city' },
                { data: 'state' },
                { data: 'zip' },
                { data: 'parentName' },
                { data: 'parentDayPhone' },
                { data: 'parentNightPhone' },
                { data: 'secondaryName' },
                { data: 'secondaryPhone' },
                { data: 'health' },
                { data: 'arrival' },
                { data: 'departEarly' },
                { data: 'shirt' },
                { data: 'gender' },
                { data: 'major' },
                { data: 'tour1' },
                { data: 'tour2' },
                { data: 'activity1' },
                { data: 'activity2' },
                { data: 'interests' },
                { data: 'hopes' }
        ],
        "scrollX": true,
        "select": 'single',
        "dom": 'Bflptip',
        "buttons": [
          'excelHtml5', 'colvis',
            {
              text: 'Get Email List',
              action: function ( e, dt, node, config ) {
                  $.ajax({
                      type        : 'GET', // define the type of HTTP verb we want to use
                      url         : '../admin/get-participant-emails.php', // the url where we want to GET
                      dataType    : 'json', // type of data we expect back from the server
                      encode      : true
                  })
                      .done(function(data) {
                          $('#alert-db-table').removeClass().addClass('alert alert-success').text(data);
                      });

              }
            },
           {
              text: 'Delete',
              enabled: false,
              action: function ( e, dt, node, config ) {
                  var rowData = dt.row( { selected: true } ).data();

                  // process the form
                  $.ajax({
                      type        : 'POST', // define the type of HTTP verb we want to use
                      url         : '../admin/delete-participants.php', // the url where we want to POST
                      data        : rowData, // our data object
                      dataType    : 'json', // type of data we expect back from the server
                      encode      : true
                  })
                      .done(function(data) {
                          // handle errors and validation messages
                          if(data.success)
                          {
                              $('#alert-db-table').removeClass().addClass('alert alert-success').text(data.message);
                              window.setTimeout(function(){location.reload()},800);
                          }
                          else
                          {
                              $('#alert-db-table').removeClass().addClass('alert alert-danger').text(JSON.stringify(data.errors));
                          }
                      });
              }
            }
        ]
     });
    participantTable.on( 'select', function ( e, dt, type, indexes ) {
        participantTable.button(3).enable();
    } ).on( 'deselect', function ( e, dt, type, indexes ) {
        participantTable.button(3).disable();
    } );


    var waitTable = $('#waitlistDataTable').DataTable({
        "orderMulti": true,
        "order": [[ 26, "asc" ]],
        "colReorder": true,
        "columnDefs": [
          { "visible": false, "targets": [0, 6, 7, 10, 11, 12, 13, 14, 15, 16, 19, 26, 27] }
        ],
        "columns": [
                { data: 'id' },
                { data: 'firstName' },
                { data: 'lastName' },
                { data: 'nickName' },
                { data: 'email' },
                { data: 'phone' },
                { data: 'street' },
                { data: 'street2' },
                { data: 'city' },
                { data: 'state' },
                { data: 'zip' },
                { data: 'parentName' },
                { data: 'parentDayPhone' },
                { data: 'parentNightPhone' },
                { data: 'secondaryName' },
                { data: 'secondaryPhone' },
                { data: 'health' },
                { data: 'arrival' },
                { data: 'departEarly' },
                { data: 'shirt' },
                { data: 'gender' },
                { data: 'major' },
                { data: 'tour1' },
                { data: 'tour2' },
                { data: 'activity1' },
                { data: 'activity2' },
                { data: 'interests' },
                { data: 'hopes' },
                { data: 'creationDate' }
        ],
        "scrollX": true,
        "select": 'single',
        "dom": 'Bflptip',
        "buttons": [
          'excelHtml5', 'colvis',
            {
              text: 'Get Email List',
              action: function ( e, dt, node, config ) {
                  $.ajax({
                      type        : 'GET', // define the type of HTTP verb we want to use
                      url         : '../admin/get-waitlist-emails.php', // the url where we want to GET
                      dataType    : 'json', // type of data we expect back from the server
                      encode      : true
                  })
                      .done(function(data) {
                          $('#alert-db-table').removeClass().addClass('alert alert-success').text(data);
                      });

              }
            },
            {
              text: 'Accept',
              enabled: false,
              action: function ( e, dt, node, config ) {
                  var rowData = dt.row( { selected: true } ).data();

                  $.ajax({
                      type        : 'POST', // define the type of HTTP verb we want to use
                      url         : '../admin/move-waitlist.php', // the url where we want to POST
                      data        : rowData, // our data object
                      dataType    : 'json', // type of data we expect back from the server
                      encode      : true
                  })
                      .done(function(data) {
                          // handle errors and validation messages
                          if(data.success)
                          {
                              $('#alert-db-table').removeClass().addClass('alert alert-success').text(data.message);
                              window.setTimeout(function(){location.reload()},800);
                          }
                          else
                          {
                              $('#alert-db-table').removeClass().addClass('alert alert-danger').text(JSON.stringify(data.errors));
                          }
                      });
              }
            },
            {
              text: 'Delete',
              enabled: false,
              action: function ( e, dt, node, config ) {
                  var rowData = dt.row( { selected: true } ).data();

                  $.ajax({
                      type        : 'POST', // define the type of HTTP verb we want to use
                      url         : '../admin/delete-waitlist.php', // the url where we want to POST
                      data        : rowData, // our data object
                      dataType    : 'json', // type of data we expect back from the server
                      encode      : true
                  })
                      .done(function(data) {
                          // handle errors and validation messages
                          if(data.success)
                          {
                              $('#alert-db-table').removeClass().addClass('alert alert-success').text(data.message);
                              window.setTimeout(function(){location.reload()},800);
                          }
                          else
                          {
                              $('#alert-db-table').removeClass().addClass('alert alert-danger').text(JSON.stringify(data.errors));
                          }
                      });
              }
            },
        ]
     });
    waitTable.on( 'select', function ( e, dt, type, indexes ) {
        waitTable.button(2).enable();
        waitTable.button(3).enable();
    } ).on( 'deselect', function ( e, dt, type, indexes ) {
        waitTable.button(2).disable();
        waitTable.button(3).disable();
    } );


    var volunteerTable = $('#volunteersDataTable').DataTable({
        "orderMulti": true,
        "order": [[ 2, "asc" ]],
        "colReorder": true,
        "columnDefs": [
          { "visible": false, "targets": [0,15,16] }
        ],
        "columns": [
                { data: 'id' },
                { data: 'firstName' },
                { data: 'lastName' },
                { data: 'netId' },
                { data: 'phone' },
                { data: 'gender' },
                { data: 'homeCity' },
                { data: 'homeState' },
                { data: 'homeCountry' },
                { data: 'year' },
                { data: 'major' },
                { data: 'minor' },
                { data: 'housing' },
                { data: 'pastAttendee' },
                { data: 'multiHost' },
                { data: 'engineeringSociety' },
                { data: 'interests' }
        ],
        "scrollX": true,
        "select": 'single',
        "dom": 'Bflptip',
        "buttons": [
          'excelHtml5', 'colvis',
            {
              text: 'Get Email List',
              action: function ( e, dt, node, config ) {
                  $.ajax({
                      type        : 'GET', // define the type of HTTP verb we want to use
                      url         : '../admin/get-volunteer-emails.php', // the url where we want to GET
                      dataType    : 'json', // type of data we expect back from the server
                      encode      : true
                  })
                      .done(function(data) {
                          $('#alert-db-table').removeClass().addClass('alert alert-dismissable alert-success').text(data);
                      });

              }
            },
            {
              text: 'Delete',
              enabled: false,
              action: function ( e, dt, node, config ) {
                  var rowData = dt.row( { selected: true } ).data();
                  console.log( rowData );


                  // process the form
                  $.ajax({
                      type        : 'POST', // define the type of HTTP verb we want to use
                      url         : '../admin/delete-volunteers.php', // the url where we want to POST
                      data        : rowData, // our data object
                      dataType    : 'json', // type of data we expect back from the server
                      encode      : true
                  })
                      .done(function(data) {
                          // handle errors and validation messages
                          if(data.success)
                          {
                              $('#alert-db-table').removeClass().addClass('alert alert-success').text(data.message);
                              window.setTimeout(function(){location.reload()},800);
                          }
                          else
                          {
                              $('#alert-db-table').removeClass().addClass('alert alert-danger').text(JSON.stringify(data.errors));
                          }
                      });


              }
            }
        ]
     });
    volunteerTable.on( 'select', function ( e, dt, type, indexes ) {
        volunteerTable.button(3).enable();
    } ).on( 'deselect', function ( e, dt, type, indexes ) {
        volunteerTable.button(3).disable();
    } );



    $('#hostingTable').DataTable({
        "orderMulti": true,
        "order": [[ 0, "asc" ]]
     });



});


// smooth scrolling feature - requires jQuery Easing plugin (jquery.easing.min.js)
/*$('a.page-scroll').bind('click', function(event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
        scrollTop: $($anchor.attr('href')).offset().top
    }, 600, 'easeInOutExpo');
    event.preventDefault();
});*/

// faster smooth scroll, no plugin required
$('a.page-scroll').click(function() {
  if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
  && location.hostname == this.hostname) {
      var $target = $(this.hash);
      $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
      if ($target.length) {
          var targetOffset = $target.offset().top;
          $('html,body').animate({scrollTop: targetOffset}, 600);
          return false;
      }
  }
});



// timeline scroll: check if element is visible in viewport
$.fn.visible = function(partial) {

  var $t            = $(this),
      $w            = $(window),
      viewTop       = $w.scrollTop(),
      viewBottom    = viewTop + $w.height(),
      _top          = $t.offset().top,
      _bottom       = _top + $t.height(),
      compareTop    = partial === true ? _bottom : _top,
      compareBottom = partial === true ? _top : _bottom;

    return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

};




$('#form-hostMatch').validate({
    rules: {
        'volunteerId': {
            required: true
        },
        'participantId': {
            required: true
        }
    },
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
        if(element.parent('.form-group').length || element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    },
    submitHandler: function(form, event) {
    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
    // get the form data
    var serializedForm = $(form).serializeArray();
    var formData = {};
    $.map(serializedForm, function(n, i){
        formData[n['name']] = n['value'];
    });
    // process the form
    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : '../admin/set-hosts.php', // the url where we want to POST
        data        : formData, // our data object
        dataType    : 'json', // what type of data do we expect back from the server
        encode      : true
    })
        .done(function(data) {
            // here we will handle errors and validation messages
            if(data.success)
            {
                $('#alert-form-hostMatch').removeClass().addClass('alert alert-success').text(data.message);
                window.setTimeout(function(){location.reload()},300)
            }
            else
            {
                $('#alert-form-hostMatch').removeClass().addClass('alert alert-danger').text(JSON.stringify(data.errors));
            }
        });
    }
});
