var form = $(".validation-wizard").show();

$(".validation-wizard").steps({
    headerTag: "h6",
    bodyTag: "section",
    transitionEffect: "fade",
    titleTemplate: '<span class="step">#index#</span> #title#',
    labels: {
        previous: "Sebelum",
        next: "Seterusnya",
        finish: "Hantar"
    },
    onStepChanging: function (event, currentIndex, newIndex) {

    // Boleh undur
    if (currentIndex > newIndex) {
        return true;
    }

    // VALIDATE STEP 1
    if (currentIndex === 0 && newIndex === 1) {

        let isValid = false;

        $.ajax({
            url: window.APP.validateStep1Url,
            type: 'POST',
            data: $('.validation-wizard').serialize(),
            async: false,
            headers: {
                'X-CSRF-TOKEN': window.APP.csrfToken
            },
            success: function () {
                isValid = true;
            },
            error: function (xhr) {

                let errors = xhr.responseJSON.errors;
                let html = '<ul style="text-align:left;">';

                Object.values(errors).forEach(messages => {
                    messages.forEach(msg => {
                        html += `<li>${msg}</li>`;
                    });
                });

                html += '</ul>';

                Swal.fire({
                    icon: 'error',
                    title: 'Maklumat Tidak Lengkap',
                    html: html,
                    confirmButtonText: 'OK'
                });
            }
        });

        return isValid;
    }

    // VALIDATE STEP 2
    if (currentIndex === 1 && newIndex === 2) {

        let isValid = false;

        $.ajax({
            url: window.APP.validateStep2Url,
            type: 'POST',
            data: $('.validation-wizard').serialize(),
            async: false,
            headers: {
                'X-CSRF-TOKEN': window.APP.csrfToken
            },
            success: function () {
                isValid = true;
            },
            error: function (xhr) {

                let errors = xhr.responseJSON.errors;
                let html = '<ul style="text-align:left;">';

                Object.values(errors).forEach(messages => {
                    messages.forEach(msg => {
                        html += `<li>${msg}</li>`;
                    });
                });

                html += '</ul>';

                Swal.fire({
                    icon: 'error',
                    title: 'Maklumat Tidak Lengkap',
                    html: html
                });
            }
        });

        return isValid;
    }

    return true;
    },



    onFinishing: function(event, currentIndex) {
        return form.validate().settings.ignore = ":disabled", form.valid()
    },
    onFinished: function(event, currentIndex) {
        // swal("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
        $(".validation-wizard").submit();
    }
    }), $(".validation-wizard").validate({
    ignore: "input[type=hidden]",
    errorClass: "text-danger",
    successClass: "text-success",
    highlight: function(element, errorClass) {
        $(element).removeClass(errorClass)
    },
    unhighlight: function(element, errorClass) {
        $(element).removeClass(errorClass)
    },
    errorPlacement: function(error, element) {
        error.insertAfter(element)
    },
    rules: {
        email: {
            email: !0
        }
    }
})