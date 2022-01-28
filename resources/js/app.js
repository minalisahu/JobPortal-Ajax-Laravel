require('./bootstrap');
require('jquery-confirm/js/jquery-confirm');
require('jquery-ui/ui/widgets/datepicker.js');
require('jquery-ui/ui/widgets/autocomplete.js');
require('bootstrap4-toggle/js/bootstrap4-toggle.min.js');
require('jquery-datetimepicker/build/jquery.datetimepicker.full.min.js');
require('jquery-validation/dist/jquery.validate.js');



import 'select2'; 
const app = new Vue({
    
    el: '#app',
});
global.vm = app;
(function ($) {
    "use strict"; // Start of use strict
    $('form').validate();

    $('.simple-select').select2();

    $(".multiple-select").select2({
        placeholder: "Select here"
    });

    $('.prevent-multi-submissions').on('submit', function () {
        $('.button-prevent-multi-submissions').attr('disabled', 'true');
    });
})(jQuery); // End of use strict



window.show = function (token, route, cl = '') {
    $.ajax(route, {
        type: "GET",
        data: ({ _token: token }),
        success: function (response) {
            $('#showModalClass').addClass(cl);
            $("#showModelBody").html(response);
            $("#showModel").modal('show');
        }
    });
}

window.trash = function (id) {
    $.confirm({
        title: 'Confirm!',
        content: 'Are you sure you want to delete?',
        buttons: {
            yes: function () {
                $('#delete_form_' + id).submit();
            },
            no: function () {

            }
        }
    });
}

window.openJobModel = function (token, url, id) {
    $.ajax(url, {
        method: 'POST',
        data: {
            _token: token,
            id: id
        },
        success: function (result) {
            $('#jobModelForm').html(result);
        }
    });
    $('#jobModel').modal('show');
}


window.storeProject= function (token, job_id, url) {
    $.ajax(url, {
        method: 'POST',
        data: {
            _token: token,
            headline: $('#headline').val(),
            cover_letter: $('#cover_letter').val(),
            user_id: $('#user_id').val(),
            job_id: job_id
        },
        beforeSend: function () {
            $("#jobModelLoader").removeClass("d-none");
        },
        success: function (result) {
            if (result.errors) {
                $("#jobModelLoader").addClass("d-none");
                $('#jobModel').modal('show');
                $('.alert-danger').html('');
                $('.alert-danger').removeClass('d-none');
                $('.alert-danger').append('Please fill all the required fields.');
            } else {
                $("#jobModelLoader").addClass("d-none");
                $('.alert-danger').html('');
                $('.alert-danger').addClass('d-none');
                alertify.set('notifier', 'position', 'top-right');
                alertify.success(result.success_message);
                $('#jobModel').modal('hide');
                $(".table").load(location.href + " .table>*", "");
            }
        }
    });
}

