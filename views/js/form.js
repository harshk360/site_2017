$.validator.addMethod("regex", function(value, element, regexpr) {
 return regexpr.test(value);
}, "Invalid expression.");


$('#volunteerForm').validate({
    rules: {
        'firstName': {
            required: true,
            maxlength: 50
        },
        'lastName': {
            required: true,
            maxlength: 50
        },
        'netid': {
            required: true,
            maxlength: 50
        },
        'phone': {
            required: true,
            regex: /(\d{3}[\.\-\+\s]){2}\d{4}/
        },
        'gender': {
            required: true,
        },
        'city': {
            required: true,
            maxlength: 50
        },
        'state': {
            required: true,
            maxlength: 50
        },
        'country': {
            required: true,
            maxlength: 50
        },
        'year': {
            required: true,
        },
        'major': {
            required: true,
        },
        'housing': {
            required: true,
        },
        'pastSite': {
            required: true,
        },
        'multiHost': {
            required: true,
        },
        'interests': {
            required: true,
        }
    },
    messages: {
        phone: { regex: "e.g. 555 555 5555 or -,.,+, separated"}
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
        url         : '../scripts/volunteer-signup.php', // the url where we want to POST
        data        : formData, // our data object
        dataType    : 'json', // what type of data do we expect back from the server
        encode      : true
    })
        .done(function(data) {
            // here we will handle errors and validation messages
            if(data.success)
            {
                $('#alert-volunteers-form').removeClass().addClass('alert alert-success').text(data.message);
                window.setTimeout(function(){location.reload()},1500)
            }
            else
            {
                $('#alert-volunteers-form').removeClass().addClass('alert alert-danger').text(JSON.stringify(data.errors));
            }
        });
    }
});


$('#participantForm').validate({
    rules: {
        'firstName': {
            required: true,
            maxlength: 50
        },
        'lastName': {
            required: true,
            maxlength: 50
        },
        'email': {
            required: true,
            email: true
        },
        'phone': {
            required: true,
            regex: /(\d{3}[\.\-\+\s]){2}\d{4}/
        },
        'gender': {
            required: true,
        },
        'shirt': {
            required: true,
        },
        'major': {
            required: true,
        },
        'street': {
            required: true,
            maxlength: 50
        },
        'city': {
            required: true,
            maxlength: 50
        },
        'state': {
            required: true,
            maxlength: 50
        },
        'zip': {
            required: true,
            digits: true,
            maxlength: 5,
            minlength: 5
        },
        'parentName': {
            required: true,
        },
        'parentDayPhone': {
            required: true,
            regex: /(\d{3}[\.\-\+\s]){2}\d{4}/
        },
        'parentNightPhone': {
            required: true,
            regex: /(\d{3}[\.\-\+\s]){2}\d{4}/
        },
        'secondaryName': {
            required: true,
        },
        'secondaryPhone': {
            required: true,
            regex: /(\d{3}[\.\-\+\s]){2}\d{4}/
        },
        'arrival': {
            required: true,
        },
        'tour1': {
            required: true,
        },
        'tour2': {
            required: true,
        },
        'activity1': {
            required: true,
        },
        'activity2': {
            required: true,
        },
        'interests': {
            required: true,
        },
        'hopes': {
            required: true,
        },
    },
    messages: {
        phone: { regex: "e.g. 555 555 5555 or -,.,+, separated"},
        parentDayPhone: { regex: "e.g. 555 555 5555 or -,.,+, separated"},
        parentNightPhone: { regex: "e.g. 555 555 5555 or -,.,+, separated"},
        secondaryPhone: { regex: "e.g. 555 555 5555 or -,.,+, separated"}
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
            url         : '../scripts/participant-signup.php', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode      : true
        })
            .done(function(data) {
                // here we will handle errors and validation messages
                if(data.success)
                {
                    $('#alert-participants-form').removeClass().addClass('alert alert-success').text(data.message);
                    window.setTimeout(function(){location.reload()},1500)

                }
                else
                {
                    $('#alert-participants-form').removeClass().addClass('alert alert-danger').text(JSON.stringify(data.errors));
                }
            });
    }
});
