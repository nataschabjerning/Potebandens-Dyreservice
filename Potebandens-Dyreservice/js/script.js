$(document).ready(function(){

    // ----- ALERT BOXES - FORMS -----
    // errors
    function errorAlert(message) {
        $("#erroralert").show();
        $(".errormessage").append(message);
        $(".error-ok").click(function () {
            $(this).parent("#erroralert").hide();
            window.location.reload();
        });
    }
    // success
    function successAlert(message) {
        $("#successalert").show();
        $(".successmessage").append(message);
        $(".success-ok").click(function () {
            $(this).parent("#successalert").hide();
            window.location.reload();
        });
    }

    // ----- CONFIRMATION BOXES - FORMS -----
    // errors
    function confirmationNo(message) {
        $("#errorconfirm").show();
        $(".errormessage").append(message);
        $(".error-confirm").click(function () {
            $(this).parent("#errorconfirm").hide();
            window.location.reload();
        });
    }
    // success
    function confirmationYes(message) {
        $("#successconfirm").show();
        $(".successmessage").append(message);
        $(".success-confirm").click(function () {
            $(this).parent("#successconfirm").hide();
            window.location.reload();
        });
    }


    // ----- USER INTERFACE -----

    // ----- CREATOR DIV -----
    // show/hide 'creator'
    $(".show-creator").click(function () {
        $("#creator").slideToggle();
    });

    // ----- USER CONTACT FORM -----
    // show input field when user selects either phone or email
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();

    // ----- USER CONTACT FORM -----
    // ----- show how many characters are left in textarea -----
    var text_max = 255;
    $('#message_msg_feedback').html(text_max + ' tegn tilbage');

    $('#message_msg').keyup(function() {
        var text_length = $('#message_msg').val().length;
        var text_remaining = text_max - text_length;

        $('#message_msg_feedback').html(text_remaining + ' tegn tilbage');
    });

    // ---------- USER SEND MESSAGE TO ADMIN INBOX (block-contact.php) ----------
    $('#send-contact-message').click(function() {

        $message_name = $('input[name=message_name]').val();
        $message_subject = $('input[name=message_subject]').val();
        $message_msg = $('textarea[name=message_msg]').val();
        $message_contact = $('#selected').val();
        $message_phone = $('input[name=message_phone]').val();
        $message_email = $('input[name=message_email]').val();
        
        var $request = $.ajax({
            type: 'POST',
            url: 'includes/sendmessage.inc.php',
            data: {
                message_name: $message_name,
                message_subject: $message_subject,
                message_msg: $message_msg,
                message_contact: $message_contact,
                message_phone: $message_phone,
                message_email: $message_email
            }
        })
        .done(function() {
            // if one or more fields is empty
            if(!$message_name || !$message_subject || !$message_msg || $message_contact === "choose") {
                $request.abort();
                errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde et eller flere felter. Udfyld alle og prøv igen!");
            }
            // if call or sms is selected but no phone number is given
            else if ($message_contact === "call" && !$message_phone || $message_contact === "sms" && !$message_phone) {
                $request.abort();
                errorAlert("Obs! <br> Det ser ud som om du har glemt at give os dit telefonnummer!");
            }
            // if email is selected but no email is given
            else if ($message_contact === "email" && !$message_email) {
                $request.abort();
                errorAlert("Obs! <br> Det ser ud som om du har glemt at give os din email!");
            }
            // if 'service_name' contains numbers
            else if ($message_name.match(".*\\d.*")) {
                $request.abort();
                errorAlert("Obs! <br> Det ser ud som om det ikke kun er bogstaver i dit navn. Sørg for at navnet ikke inkluderer tal eller andre tegn og prøv igen!");
            }
            else {
                // if all checks have cleared
                successAlert("Din besked blev sendt!");
            }
		})
    });

    // ----- MOBILE MENU ICON -----
    // Mobile menu - click on hamburger menu icon to open menu
    $('#menu-btn').click(function() {
        $(this).toggleClass('open');
        $('.menu-content').toggle("slide");
    });

    // ----- FRONT PAGE SLIDERS -----
    // Slider on front page to diplay services
    $('.service-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
        infinite: false,
        prevArrow: $('.service-prev'),
        nextArrow: $('.service-next'),
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    arrows: false,
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
    
    // Slider on front page to diplay gallery
    $('.gallery-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
        infinite: false,
        prevArrow: $('.gallery-prev'),
        nextArrow: $('.gallery-next'),
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    arrows: false,
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });


    // ----- ADMIN FUNCTIONS -----

    // ----- SHOW FORMS FOR INSERTING IN DB -----
    // show/hide 'change password' form
    $(".change_password").click(function () {
        $("#change-password").slideToggle();
        $(this).children("#show_password").toggle();
        $(this).children("#hide_password").toggle();
    });
    // show/hide 'new user' form
    $(".new_user").click(function () {
        $("#create-user").slideToggle();
        $(this).children("#show_new_user").toggle();
        $(this).children("#hide_new_user").toggle();
    });
    // show/hide 'new service' form
    $(".add_service").click(function () {
        $("#new_service").slideToggle();
        $(this).children("#show_add_form").toggle();
        $(this).children("#hide_add_form").toggle();
    });
    // show/hide 'add image' form
    $(".add_image").click(function () {
        $("#insert-image").slideToggle();
        $(this).children("#show_add_image").toggle();
        $(this).children("#hide_add_image").toggle();
    });
    // show/hide 'add about' form on 'about' page
    $(".add_about").click(function () {
        $("#insert-about").slideToggle();
        $(this).children("#show_add_about").toggle();
        $(this).children("#hide_add_about").toggle();
    });

    // ---------- CREATE SERVICE ----------
    $('#create-service').click(function() {

        $service_name = $('input[name=service_name]').val();
        $service_short_description = $('textarea[name=service_short_description]').val();
        $service_description_one = $('textarea[name=service_description_one]').val();
        $service_description_two = $('textarea[name=service_description_two]').val();
        $service_description_three = $('textarea[name=service_description_three]').val();
        $service_description_four = $('textarea[name=service_description_four]').val();
        $important_note = $('textarea[name=important_note]').val();
        
        var $request = $.ajax({
            type: 'POST',
            url: 'includes/createservice.inc.php',
            data: {
                service_name: $service_name,
                service_short_description: $service_short_description,
                service_description_one: $service_description_one,
                service_description_two: $service_description_two,
                service_description_three: $service_description_three,
                service_description_four: $service_description_four,
                important_note: $important_note
            }
        })
        .done(function() {
            // if one or more fields is empty
            if(!$service_name || !$service_short_description || !$service_description_one) {
                $request.abort();
                errorAlert("Obs! Det ser ud som om du har glemt at udfylde et eller flere felter. Udfyld alle og prøv igen!");
            }
            // if 'service_name' contains numbers
            else if ($service_name.match(".*\\d.*")) {
                $request.abort();
                errorAlert("Obs! Det ser ud som om det ikke kun er bogstaver i ydelsens navn. Sørg for at navnet ikke inkluderer tal eller andre tegn og prøv igen!");
            }
            else {
                // if all checks have cleared
                successAlert("Ydelse oprettet!");
                
                // WORK ON APPEND TO TABLE INSTEAD OF RELOADING PAGE SO #ALERTMESSAGE KEEPS BEING ON PAGE AFTER ADDING NEW SERVICE

            }
		})
    });
    
    // ---------- UPDATE SERVICE ----------
    $('.update-service').click(function() {

        // select the closest section to the clicked update button
        let $section  = jQuery(this).closest("section");
        // get the service ID from section attr class
        var $serviceId   = $section.attr('attr-service_id');

        // Get inputs from services
        let $service_name = $section.find("#service_name").val();
        let $service_short_description = $section.find("#service_short_description").val();
        let $service_description_one = $section.find("#service_description_one").val();
        let $service_description_two = $section.find("#service_description_two").val();
        let $service_description_three = $section.find("#service_description_three").val();
        let $service_description_four = $section.find("#service_description_four").val();
        let $important_note = $section.find("#important_note").val();

        // show confirmaiton box
        $("#confirmation-service-update").show();

        // if cancel_update (no)
        $('.cancel_update').click(function() {
            successAlert("Ingen ydelse blev opdateret!");
            $("#confirmation-service-update").hide();
        });
        // if confirm_update (yes)
        $('.confirm_update').click(function(){
            // Ajax config
            var $request = $.ajax({
                method: "POST",
                // get the url to send to, when btn is clicked
                url: 'includes/updateservice.inc.php',
                // data to send
                data: {
                    service_id: $serviceId,
                    service_name: $service_name,
                    service_short_description: $service_short_description,
                    service_description_one: $service_description_one,
                    service_description_two: $service_description_two,
                    service_description_three: $service_description_three,
                    service_description_four: $service_description_four,important_note: $important_note,
                },
            })
            .done(function() {
                // if one or more fields is empty
                if($service_name  === "" || $service_description_one  === "") {
                    $request.abort();
                    window.location.reload();
                    $("#confirmation-update").hide();
                    alert("Obs! Det ser ud som om du har glemt at udfylde et eller flere felter. Udfyld alle og prøv igen!");
                }
                // if 'service_name' contains numbers
                else if ($service_name.match(".*\\d.*")) {
                    $request.abort();
                    window.location.reload();
                    $("#confirmation-update").hide();
                    alert("Obs! Det ser ud som om at der ikke kun er bogstaver ydelsens navn.");
                }
                else {
                    // if all checks have cleared
                    // hide confirmation box
                    $("#confirmation-service-update").hide();
                    successAlert("Ydelse " + $serviceId + " opdateret!");
                }
            })  
        });
    })

    // ---------- DELETE SERVICE ----------
    $('.delete-service').click(function() {

        let $section  = jQuery(this).closest("section");
        // get the service ID
        var $serviceId   = $section.attr('attr-service_id');

        // show confirmaiton box
        $("#confirmation-service-delete").show();

        // CONFIRMATION
        var buttonclicked;
        // if cancel_delete (no)
        $('.cancel_delete').click(function(){ 
            if(buttonclicked != false) {
                window.location.reload();
                $("#confirmation-service-delete").hide();
                alert("Ingen ydelse blev slettet!");
            } 
        });
        // if confirm_delete (yes)
        $('.confirm_delete').click(function(){
            // Ajax config
            $.ajax({
                //we are using GET method to get data from server side
                type: "GET",
                // get the url to send to, when btn is clicked
                url: 'includes/deleteservice.inc.php',
                // data to send
                data: {
                    service_id: $serviceId
                }
            })
            .done(function() {
                // remove the table row
                $section.remove();
                // hide confirmation box
                $("#confirmation-service-delete").hide();
                // reload page
                window.location.reload();
                // alert that the row has been successfully removed
                alert("Ydelse " + $serviceId + " slettet!");
            })
        });
    })

    // ---------- DELETE IMAGE ----------
    $('.delete-image').click(function() {

        let $section  = jQuery(this).closest("section");
        // get the service ID
        var imageId   = $section.attr('attr-image_id');

        // show confirmaiton box
        $("#confirmation-image-delete").show();

        // CONFIRMATION
        var buttonclicked;
        // if cancel_delete (no)
        $('.cancel_image_delete').click(function(){ 
            if(buttonclicked != false) {
                window.location.reload();
                $("#confirmation-image-delete").hide();
                alert("Intet billede blev slettet!");
            } 
        });
        // if confirm_delete (yes)
        $('.confirm_image_delete').click(function(){
            // Ajax config
            $.ajax({
                //we are using GET method to get data from server side
                type: "GET",
                // get the url to send to, when btn is clicked
                url: 'includes/deleteimage.inc.php',
                // data to send
                data: {
                    image_id: imageId
                }
            })
            .done(function() {
                // remove the table row
                $section.remove();
                // hide confirmation box
                $("#confirmation-image-delete").hide();
                // reload page
                window.location.reload();
                // alert that the row has been successfully removed
                alert("Billede slettet!");
            })
        });
    })


    // ---------- CREATE ABOUT ----------
    $('#upload-about').click(function() {

        $about_image_link = $('#about_image_link').val();
        $about_name = $('input[name=about_name]').val();
        $about_work_title = $('input[name=about_work_title]').val();
        $about_text_one = $('textarea[name=about_text_one]').val();
        $about_text_two = $('textarea[name=about_text$about_text_two]').val();
        $about_text_three = $('textarea[name=about_$about_text_three]').val();
        $about_text_four = $('textarea[name=about_$about_text_four]').val();
        $about_text_five = $('textarea[name=about_$about_text_five]').val();
        $about_text_six = $('textarea[name=about_$about_text_six]').val();
        $about_text_seven = $('textarea[name=about_$about_text_seven]').val();
        
        $.ajax({
            type: 'POST',
            url: 'includes/createabout.inc.php',
            data: {
                about_image_link: $$about_image_link,
                about_name: $about_name,
                about_work_title: $about_work_title,
                about_text_one: $about_text_one,
                about_text_two: $about_text_two,
                about_text_three: $about_text_three,
                about_text_four: $about_text_four,
                about_text_five: $about_text_five,
                about_text_six: $about_text_six,
                about_text_seven: $about_text_seven
            }
        })
    });

    // ---------- UPDATE ABOUT ----------
    $('.update-about').click(function() {

        // select the closest section to the clicked update button
        let $section  = jQuery(this).closest("section");
        // get the service ID from section attr class
        var $aboutId   = $section.attr('attr-about_id');

        // Get inputs from abouts
        let $about_name = $section.find("#about_name").val();
        let $about_work_title = $section.find("#about_work_title").val();
        let $about_text_one = $section.find("#about_text_one").val();
        let $about_text_two = $section.find("#about_text_two").val();
        let $about_text_three = $section.find("#about_text_three").val();
        let $about_text_four = $section.find("#about_text_four").val();
        let $about_text_five = $section.find("#about_text_five").val();
        let $about_text_six = $section.find("#about_text_six").val();
        let $about_text_seven = $section.find("#about_text_seven").val();

        // show confirmaiton box
        $("#confirmation-about-update").show();

        // if cancel_update (no)
        $('.cancel_about_update').click(function(){ 
            window.location.reload();
            alert("Ingen infoboks blev opdateret!");
            $("#confirmation-about-update").hide();
        });
        // if confirm_update (yes)
        $('.confirm_about_update').click(function(){
            // Ajax config
            var $request = $.ajax({
                method: "POST",
                // get the url to send to, when btn is clicked
                url: 'includes/updateabout.inc.php',
                // data to send
                data: {
                    about_id: $aboutId,
                    about_name: $about_name,
                    about_work_title: $about_work_title,
                    about_text_one: $about_text_one,
                    about_text_two: $about_text_two,
                    about_text_three: $about_text_three,
                    about_text_four: $about_text_four,
                    about_text_five: $about_text_five,
                    about_text_six: $about_text_six,
                    about_text_seven: $about_text_seven
                },
            })
            .done(function() {
                // if one or more fields is empty
                if($about_name  === "") {
                    $request.abort();
                    window.location.reload();
                    alert("Obs! Det ser ud som om du har glemt at indtaste et navn. Udfyld dette felt og prøv igen!");
                    $("#confirmation-update").hide();
                }
                else {
                    // if all checks have cleared
                    // hide confirmation box
                    $("#confirmation-about-update").hide();
                    alert("Infoboks " + $aboutId + " opdateret!");
                    // reload page to show update
                    window.location.reload();
                }
            })  
        });
    })

    // ---------- DELETE ABOUT ----------
    $('.delete-about').click(function() {

        let $section  = jQuery(this).closest("section");
        // get the service ID
        var $aboutId   = $section.attr('attr-about_id');
        let $about_name = $section.find("#about_name").val();

        // show confirmaiton box
        $("#confirmation-about-delete").show();

        // CONFIRMATION
        var buttonclicked;
        // if cancel_delete (no)
        $('.cancel_about_delete').click(function(){ 
            if(buttonclicked != false) {
                window.location.reload();
                $("#confirmation-about-delete").hide();
                alert("Ingen infoblok blev slettet!");
            } 
        });
        // if confirm_delete (yes)
        $('.confirm_about_delete').click(function(){
            // Ajax config
            $.ajax({
                //we are using GET method to get data from server side
                type: "GET",
                // get the url to send to, when btn is clicked
                url: 'includes/deleteabout.inc.php',
                // data to send
                data: {
                    about_id: $aboutId,
                    about_name: $about_name
                }
            })
            .done(function() {
                // remove the table row
                $section.remove();
                // hide confirmation box
                $("#confirmation-about-delete").hide();
                // reload page
                window.location.reload();
                // alert that the row has been successfully removed
                alert("Blok med navn '" + $about_name + "' slettet!");
            })
        });
    })

    // ---------- DELETE USER ----------
    function deleteUser() {
	    $(document).delegate(".delete-user", "click", function() {

            let $section  = jQuery(this).closest("section");
            // get the service ID
            var $userId   = $section.attr('attr-user_id');
            // FIND USERNAME AND DISPLAY ON DELETE CONFIRMATION
            let $username = $section.find("#user_username").val();

            // show confirmaiton box
            $("#confirmation-user-delete").show();

            // CONFIRMATION
            var buttonclicked;
            // if cancel_delete (no)
            $('.cancel_user_delete').click(function(){
                if(buttonclicked != false) {
                    window.location.reload();
                    $("#confirmation-user-delete").hide();
                    alert("Ingen bruger blev slettet!");
                } 
            });
            // if confirm_delete (yes)
            $('.confirm_user_delete').click(function(){
                // Ajax config
                $.ajax({
                    //we are using GET method to get data from server side
                    type: "GET",
                    // get the url to send to, when btn is clicked
                    url: 'includes/deleteuser.inc.php',
                    // data to send
                    data: {
                        user_id: $userId,
                        user_username: $username
                    }
                })
                .done(function() {
                    // remove the table row
                    $section.remove();
                    // hide confirmation box
                    $("#confirmation-user-delete").hide();
                    // reload page
                    window.location.reload();
                    // alert that the row has been successfully removed
                    alert("Bruger: '" + $username + "' blev slettet!");
                })
            });
        })
    }
    // call the function to initiate when delete-user btn is clicked
    deleteUser();

});