(function () {
    'use strict'
    var forms = document.getElementsByClassName("ratingForm");



    Array.prototype.slice.call(forms).forEach(
        function (form) {
            // var radio = form.elements;
            // for (var i = 0; i < radio.length; i++) {
            //   radio[i].addEventListener('change', function(event){

            //   }, true) 
            // }
            // form.addEventListener('submit', function (event) {
            //   event.preventDefault()
            // })
        }
    )
    jQuery(document).ready(
        function ($) {
            console.log("Ready function call");

            $('input[type=radio]').on(
                'change', function () {
                    $(this).closest("form").on(
                        'submit', function (event) {
                            event.preventDefault();
                            var dataGet = $(this).closest("form").serializeArray();
                            $("#afterRating" + dataGet[0].value).text("Thanks for rating!");
            
                            $.ajax(
                                {
                                    type: "get",
                                    url: "add_rating_script.php",
                                    data: dataGet,
                                    success: function () {
                                        console.log(dataGet[0].value);
                                        var c = document.getElementById("ratingDiv" + dataGet[0].value).children;
                                        for(var i = 0; i < c.length; i++) {
                                            c[i].style.display = "none";
                                            setTimeout(
                                                function () { 
                                                    $.ajax(
                                                        {
                                                            type: "post",
                                                            url: "get_star_update.php",
                                                            data: {'id' : dataGet[0].value},
                                                            dataType: "text",
                                                            success: function (data) {
                                                                  $(".star" + dataGet[0].value).text("Average Star Rating: " + data);
                    
                                                                  console.log(data);
                                                            },
                                                            error: function (error) {
                                                                console.log("Error: " + error);
                                                            }
                                                        }
                                                    )
                                                }, 100
                                            );
                                        }
                                    }
                                }
                            )
        
        
                        }
                    );
                    $(this).closest("form").submit();
                    $(this).closest("form").unbind('submit');
                }
            );
        }
    );
})()


