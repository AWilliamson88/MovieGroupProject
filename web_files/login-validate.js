(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    var valid = true;
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
    .forEach(
        function (form) {
            form.addEventListener(
                'submit', function (event) {
                    event.preventDefault()
                    $.ajax(
                        {
                            type: "post",
                            url: "check_user.php",
                            data: $('#loginForm').serialize(),
                            success: function (data) {
                                if (data == 1) {
                                    window.location = "admin.php";
                                } else {
                                    $('#incorrect').text(data);
                                }
                            }
                        }
                    )
                    //form.classList.add('was-validated')
                }, false
            )
        }
    )
})()