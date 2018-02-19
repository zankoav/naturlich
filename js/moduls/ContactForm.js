/**
 * Created by alexandrzanko on 2/19/18.
 */

export function contactForm($) {

    $('#send-button').click(function () {
        if (isFormValid()) {
            $(this).append('<i class="fas fa-sync fa-spin ml-2"></i>');
            return true;
        }
        return false;
    });

    function isFormValid() {

        $('#validationName').attr('class', 'form-control');
        $('#validationEmail').attr('class', 'form-control');
        $('#validationMessage').attr('class', 'form-control');

        let validationName = $('#validationName').val().trim();
        let validationEmail = $('#validationEmail').val().trim();
        let validationMessage = $('#validationMessage').val().trim();


        let isValidName = validateName(validationName);
        let isValidEmail = validateEmail(validationEmail);
        let isValidMessage = validationMessage.length > 10;


        if (isValidName) {
            valid($('#validationName'));
        } else {
            invalid($('#validationName'));
        }

        if (isValidEmail) {
            valid($('#validationEmail'));
        } else {
            invalid($('#validationEmail'));
        }

        if (isValidMessage) {
            valid($('#validationMessage'));
        } else {
            invalid($('#validationMessage'));
        }

        return isValidName && isValidEmail && isValidMessage;
    }

    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

    function validateName(name) {
        var re = /^[a-zA-Z\s]*$/;
        return name.length > 1 && re.test(name);
    }


    function valid(el) {
        $(el).addClass('is-valid');
    }

    function invalid(el) {
        $(el).addClass('is-invalid');
    }
}