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
    function confirmationDelete(message) {
        $("#confirmation-delete").show();
        $(".deletemessage").append(message);
    }
    // success
    function confirmationUpdate(message) {
        $("#confirmation-update").show();
        $(".updatemessage").append(message);
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
    var text_min = 0;
    var text_max = 255;
    $('#message_msg_feedback').html(text_min + ' / 255');

    $('#message_msg').keyup(function() {
        var text_length = $('#message_msg').val().length;
        var text_remaining = text_min + text_length;

        $('#message_msg_feedback').html(text_remaining + ' / 255');
    });

    // ---------- USER SEND MESSAGE TO ADMIN INBOX (block-contact.php) ----------
    $('#send-contact-message').click(function() {

        $message_name = $('input[name=message_name]').val();
        $message_subject = $('input[name=message_subject]').val();
        $message_msg = $('textarea[name=message_msg]').val();
        $message_contact = $('#selected').val();
        $message_phone = $('input[name=message_phone]').val();
        $message_email = $('input[name=message_email]').val();

        // to check if string only contains numbers
        let isnum = /^\d+$/.test($message_phone);
        
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
            var regex = /^\d*$/;
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
            // if 'message_phone' contains letters
            else if ($message_contact === "call" && !isnum || $message_contact === "sms" && !isnum) {
                $request.abort();
                errorAlert("Obs! <br> Dit telefonnummer kan ikke indeholde bogstaver!");
            }
            // if email is selected but no email is given
            else if ($message_contact === "email" && !$message_email) {
                $request.abort();
                errorAlert("Obs! <br> Det ser ud som om du har glemt at give os din email!");
            }
            // if 'message_name' contains numbers
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
    // show/hide 'change password' form  on 'admin-profile' page
    $(".change_password").click(function () {
        $("#change-password").slideToggle();
        $(this).children("#show_password").toggle();
        $(this).children("#hide_password").toggle();
    });
    // show/hide 'new user' form on 'admin-profile' page
    $(".new_user").click(function () {
        $("#create-user").slideToggle();
        $(this).children("#show_new_user").toggle();
        $(this).children("#hide_new_user").toggle();
    });
    // show/hide 'new service' form on 'admin-services' page
    $(".add_service").click(function () {
        $("#new_service").slideToggle();
        $(this).children("#show_add_form").toggle();
        $(this).children("#hide_add_form").toggle();
    });
    // show/hide 'add image' form on 'admin-gallery' page
    $(".add_image").click(function () {
        $("#insert-image").slideToggle();
        $(this).children("#show_add_image").toggle();
        $(this).children("#hide_add_image").toggle();
    });
    // show/hide 'add about' form on 'admin-about' page
    $(".add_about").click(function () {
        $("#insert-about").slideToggle();
        $(this).children("#show_add_about").toggle();
        $(this).children("#hide_add_about").toggle();
    });
    // show/hide 'add contact' form on 'admin-contact' page
    $(".add_contact").click(function () {
        $("#new_contact").slideToggle();
        $(this).children("#show_add_contact").toggle();
        $(this).children("#hide_add_contact").toggle();
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
                errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde et eller flere felter. Udfyld alle og prøv igen!");
            }
            // if 'service_name' contains numbers
            else if ($service_name.match(".*\\d.*")) {
                $request.abort();
                errorAlert("Obs! <br> Det ser ud som om det ikke kun er bogstaver i ydelsens navn. Sørg for at navnet ikke inkluderer tal eller andre tegn og prøv igen!");
            }
            else {
                // if all checks have cleared
                successAlert("Ydelse oprettet!");
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
        confirmationUpdate("Er du sikker på, at du gerne vil opdatere denne ydelse?");

        // CONFIRMATION
        // if cancel_delete (no)
        $('.cancel_update').click(function() {
            $("#confirmation-update").hide();
            errorAlert("Ingen ydelse blev opdateret!");
        });
        // if confirm_delete (yes)
        $('.confirm_update').click(function() {
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
                    $("#confirmation-update").hide();
                    errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde et eller flere felter. Udfyld alle og prøv igen!");
                }
                // if 'service_name' contains numbers
                else if ($service_name.match(".*\\d.*")) {
                    $request.abort();
                    $("#confirmation-update").hide();
                    errorAlert("Obs! <br> Det ser ud som om at der ikke kun er bogstaver ydelsens navn.");
                }
                else {
                    // if all checks have cleared
                    // hide confirmation box
                    $("#confirmation-update").hide();
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
        confirmationDelete("Er du sikker på, at du gerne vil slette denne ydelse?");

        // CONFIRMATION
        // if cancel_delete (no)
        $('.cancel_delete').click(function(){ 
            $("#confirmation-delete").hide();
            errorAlert("Ingen ydelse blev slettet!");
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
                $("#confirmation-delete").hide();
                // alert that the row has been successfully removed
                successAlert("Ydelse " + $serviceId + " slettet!");
            })
        });
    })

    // ---------- CREATE CONTACT ----------
    $('#create-contact').click(function() {

        $contact_name = $('input[name=contact_name]').val();
        $contact_work_title = $('input[name=contact_work_title]').val();
        $contact_phone = $('input[name=contact_phone]').val();
        $contact_email = $('input[name=contact_email]').val();

        // to check if string only contains numbers
        let isnum = /^\d+$/.test($contact_phone);
        
        var $request = $.ajax({
            type: 'POST',
            url: 'includes/createcontact.inc.php',
            data: {
                contact_name: $contact_name,
                contact_work_title: $contact_work_title,
                contact_phone: $contact_phone,
                contact_email: $contact_email
            }
        })
        .done(function() {
            // if one or more fields is empty
            if(!$contact_name || !$contact_work_title || !$contact_phone || !$contact_email) {
                $request.abort();
                errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde et eller flere felter. Udfyld alle og prøv igen!");
            }
            // if 'service_name' contains numbers
            else if ($contact_name.match(".*\\d.*")) {
                $request.abort();
                errorAlert("Obs! <br> Det ser ud som om det ikke kun er bogstaver i navnet. Sørg for at navnet ikke inkluderer tal eller andre tegn og prøv igen!");
            }
            // if 'contact_phone' contains letters
            else if (!isnum) {
                $request.abort();
                errorAlert("Obs! <br> Telefonnummeret kan ikke indeholde bogstaver!");
            }
            else {
                // if all checks have cleared
                successAlert("Kontakt oprettet!");
            }
		})
    });

    // ---------- UPDATE CONTACT ----------
    $('.update-contact').click(function() {

        // select the closest section to the clicked update button
        let $section  = jQuery(this).closest("section");
        // get the contact ID from section attr class
        var $contactId   = $section.attr('attr-contact_id');

        // Get inputs from contact
        let $contact_name = $section.find("#contact_name").val();
        let $contact_work_title = $section.find("#contact_work_title").val();
        let $contact_phone = $section.find("#contact_phone").val();
        let $contact_email = $section.find("#contact_email").val();

        // to check if string only contains numbers
        let isnum = /^\d+$/.test($contact_phone);

        // show confirmaiton box
        confirmationUpdate("Er du sikker på, at du gerne vil opdatere denne kontakt?");

        // CONFIRMATION
        // if cancel_delete (no)
        $('.cancel_update').click(function() {
            $("#confirmation-update").hide();
            errorAlert("Ingen kontakt blev opdateret!");
        });
        // if confirm_delete (yes)
        $('.confirm_update').click(function() {
            // Ajax config
            var $request = $.ajax({
                method: "POST",
                // get the url to send to, when btn is clicked
                url: 'includes/updatecontact.inc.php',
                // data to send
                data: {
                    contact_id: $contactId,
                    contact_name: $contact_name,
                    contact_work_title: $contact_work_title,
                    contact_phone: $contact_phone,
                    contact_email: $contact_email
                },
            })
            .done(function() {
                // if one or more fields is empty
                if(!$contact_name || !$contact_work_title || !$contact_phone || !$contact_email) {
                    $request.abort();
                    $("#confirmation-update").hide();
                    errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde et eller flere felter. Udfyld alle og prøv igen!");
                }
                // if 'contact_phone' contains letters
                else if (!isnum) {
                    $request.abort();
                    errorAlert("Obs! <br> Telefonnummeret kan ikke indeholde bogstaver!");
                }
                // if 'service_name' contains numbers
                else if ($contact_name.match(".*\\d.*")) {
                    $request.abort();
                    $("#confirmation-update").hide();
                    errorAlert("Obs! <br> Det ser ud som om at der ikke kun er bogstaver ydelsens navn.");
                }
                else {
                    // if all checks have cleared
                    // hide confirmation box
                    $("#confirmation-update").hide();
                    successAlert("Kontakt " + $contactId + " opdateret!");
                }
            })  
        });
    })

    // ---------- DELETE CONTACT ----------
    $('.delete-contact').click(function() {

        let $section  = jQuery(this).closest("section");
        // get the contact ID
        var $contactId   = $section.attr('attr-contact_id');

        // show confirmaiton box
        confirmationDelete("Er du sikker på, at du gerne vil slette denne kontakt?");

        // CONFIRMATION
        // if cancel_delete (no)
        $('.cancel_delete').click(function(){ 
            $("#confirmation-delete").hide();
            errorAlert("Ingen kontakt blev slettet!");
        });
        // if confirm_delete (yes)
        $('.confirm_delete').click(function(){
            // Ajax config
            $.ajax({
                //we are using GET method to get data from server side
                type: "GET",
                // get the url to send to, when btn is clicked
                url: 'includes/deletecontact.inc.php',
                // data to send
                data: {
                    contact_id: $contactId
                }
            })
            .done(function() {
                // remove the table row
                $section.remove();
                $("#confirmation-delete").hide();
                // alert that the row has been successfully removed
                successAlert("Kontakt " + $contactId + " slettet!");
            })
        });
    })

    // ---------- DELETE IMAGE ----------
    $('.delete-image').click(function() {

        let $section  = jQuery(this).closest("section");
        // get the image ID
        var imageId   = $section.attr('attr-image_id');

        // show confirmaiton box
        confirmationDelete("Er du sikker på, at du gerne vil slette dette billede?");

        // CONFIRMATION
        var buttonclicked;
        // if cancel_delete (no)
        $('.cancel_delete').click(function(){ 
            if(buttonclicked != false) {
                $("#confirmation-delete").hide();
                errorAlert("Intet billede blev slettet!");
            }
        });
        // if confirm_delete (yes)
        $('.confirm_delete').click(function(){
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
                $("#confirmation-delete").hide();
                // alert that the row has been successfully removed
                successAlert("Billede slettet!");
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
        // get the about ID from section attr class
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
        confirmationUpdate("Er du sikker på, at du gerne vil opdatere denne infoboks?");

        // CONFIRMATION
        // if cancel_delete (no)
        $('.cancel_update').click(function() {
            $("#confirmation-update").hide();
            errorAlert("Ingen infoboks blev opdateret!");
        });
        // if confirm_delete (yes)
        $('.confirm_update').click(function() {
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
                    $("#confirmation-update").hide();
                    errorAlert("Obs! <br> Det ser ud som om du har glemt at indtaste et navn. Udfyld dette felt og prøv igen!");
                }
                // if 'about_name' contains numbers
                else if ($about_name.match(".*\\d.*")) {
                    $request.abort();
                    $("#confirmation-update").hide();
                    errorAlert("Obs! <br> Det ser ud som om at der ikke kun er bogstaver i det indtastede navn.");
                }
                else {
                    // if all checks have cleared
                    // hide confirmation box
                    $("#confirmation-update").hide();
                    successAlert("Infoboks " + $aboutId + " opdateret!");
                }
            })  
        });
    })

    // ---------- DELETE ABOUT ----------
    $('.delete-about').click(function() {

        let $section  = jQuery(this).closest("section");
        // get the about ID
        var $aboutId   = $section.attr('attr-about_id');
        let $about_name = $section.find("#about_name").val();

        // show confirmaiton box
        confirmationDelete("Er du sikker på, at du gerne vil slette denne blok?");

        // CONFIRMATION
        var buttonclicked;
        // if cancel_delete (no)
        $('.cancel_delete').click(function(){ 
            if(buttonclicked != false) {
                $("#confirmation-delete").hide();
                errorAlert("Ingen blok blev slettet!");
            }
        });
        // if confirm_delete (yes)
        $('.confirm_delete').click(function(){
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
                $("#confirmation-delete").hide();
                // alert that the row has been successfully removed
                successAlert("Blok med navn '" + $about_name + "' slettet!");
            })
        });
    })

    // ---------- DELETE USER ----------
    function deleteUser() {
	    $(document).delegate(".delete-user", "click", function() {

            let $section  = jQuery(this).closest("section");
            // get the user ID
            var $userId   = $section.attr('attr-user_id');
            // find username from input field
            let $username = $section.find("#user_username").val();

            // show confirmaiton box
            confirmationDelete("Er du sikker på, at du gerne vil slette denne bruger?");

            // CONFIRMATION
            var buttonclicked;
            // if cancel_delete (no)
            $('.cancel_delete').click(function(){ 
                if(buttonclicked != false) {
                    $("#confirmation-delete").hide();
                    errorAlert("Ingen bruger blev slettet!");
                }
            });
            // if confirm_delete (yes)
            $('.confirm_delete').click(function(){
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
                    $("#confirmation-delete").hide();
                    // alert that the row has been successfully removed
                    successAlert("Bruger: '" + $username + "' blev slettet!");
                })
            });
        })
    }
    // call the function to initiate when delete-user btn is clicked
    deleteUser();

});