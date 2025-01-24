$(document).ready(function(){

    // MARK: MOBILE ICON
    // Mobile menu - click on hamburger menu icon to open menu
    $('#menu-btn').click(function() {
        $(this).toggleClass('open');
        $('.menu-content').toggle("slide");
    });



// ------------------------------------------
    // MARK: INDEX SLIDERS




    // MARK: Services
    $('.service-slider').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
        infinite: false,
        prevArrow: $('.service-prev'),
        nextArrow: $('.service-next'),
        responsive: [
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
    
    // MARK: Gallery
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
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

    // MARK: CREATOR DIV
    // show/hide 'creator' on 'contact.php' page
    $(".show-creator").click(function () {
        $("#creator").slideToggle();
    });


    

// -------------------------------------------------------------------
    // MARK: USER INTERFACE




    // MARK: send msg
    // ---------- USER SEND MESSAGE TO ADMIN INBOX (block-contact.php) ----------
    $('#send-contact-message').click(function() {

        $currentDate = new Date();
        $day = $currentDate.getDate();
        $month = $currentDate.getMonth() + 1;
        $year = $currentDate.getFullYear();
        $message_date = $day + '-' + $month + '-' + $year;

        var $currentTime = new Date();
        var $message_time = $currentTime.getHours() + ":" + $currentTime.getMinutes() + ":" + $currentTime.getSeconds();

        $message_name = $('input[name=message_name]').val();
        $message_subject = $('input[name=message_subject]').val();
        $message_msg = $('textarea[name=message_msg]').val();
        $message_contact = $('#selected').val();
        $message_phone = $('input[name=message_phone]').val();
        $message_email = $('input[name=message_email]').val();

        // to check if phone number string only contains numbers
        let isnum = /^\d+$/.test($message_phone);
        
        var $request = $.ajax({
            type: 'POST',
            url: 'includes/messages/sendmessage.inc.php',
            data: {
                message_date: $message_date,
                message_time: $message_time,
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
            if(!$message_name || !$message_subject || !$message_msg) {
                $request.abort();
                errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde et eller flere felter. Udfyld alle og prøv igen! <br><br>");
            }
            // if no contact method has been chosen
            else if($message_contact === "vælg") {
                $request.abort();
                errorAlert("Obs! <br> Det ser ud til, at du har glemt at fortælle os hvordan du vil kontaktes. Vælg hvordan i drop down menuen. <br>");
            }
            // if call or sms is selected but no phone number is given
            else if ($message_contact === "Telefonopkald" && !$message_phone || $message_contact === "SMS" && !$message_phone) {
                $request.abort();
                errorAlert("Obs! <br> Det ser ud som om du har glemt at give os dit telefonnummer! <br>");
            }
            // if 'message_phone' contains letters
            else if ($message_contact === "Telefonopkald" && !isnum || $message_contact === "SMS" && !isnum) {
                $request.abort();
                errorAlert("Obs! <br> Dit telefonnummer kan ikke indeholde bogstaver! <br>");
            }
            // if email is selected but no email is given
            else if ($message_contact === "Email" && !$message_email) {
                $request.abort();
                errorAlert("Obs! <br> Det ser ud som om du har glemt at give os din email! <br>");
            }
            // if 'message_name' contains numbers
            else if ($message_name.match(".*\\d.*")) {
                $request.abort();
                errorAlert("Obs! <br> Det ser ud som om det ikke kun er bogstaver i dit navn. Sørg for at navnet ikke inkluderer tal eller andre tegn og prøv igen! <br>");
            }
            else if ($message_msg.length > 255) {
                $request.abort();
                errorAlert("Obs! <br> Det ser ud som om din besked er for lang. Der kan maks være 255 teng (inkl. mellemrum).");
            }
            else {
                // if all checks have cleared
                successAlert("Din besked blev sendt!");
            }
		})
    });

    // MARK: phone/email
    // For user when writing a msg to admin by using contact form on 'block-contact.php'
    // show input field when user selects either phone or email
    $("#selected").change(function(){
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


    // MARK: textarea chars
    // For user when writing a msg to admin by using contact form on 'block-contact.php'
    // ----- show how many characters are left in textarea -----
    var text_min = 0;
    $('#message_msg_feedback').html(text_min + ' / 255');

    $('#message_msg').keyup(function() {
        var text_length = $('#message_msg').val().length;
        var text_remaining = text_min + text_length;

        $('#message_msg_feedback').html(text_remaining + ' / 255');
    });



// ----------------------------------------------------------------
    // MARK: ADMIN




    // MARK: ALERT
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

    // MARK: CONFIRMATION
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


    // ----- SHOW FORMS FOR INSERTING IN DB -----

    // MARK: Show/Hide

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
    // show/hide 'add openinghours' form on 'admin-contact' page
    $(".add_openinghours").click(function () {
        $("#new_openinghours").slideToggle();
        $(this).children("#show_add_openinghours").toggle();
        $(this).children("#hide_add_openinghours").toggle();
    });
    // show/hide 'add rules' form on 'admin-contact' page
    $(".add_rule").click(function () {
        $("#new_rule").slideToggle();
        $(this).children("#show_add_rule").toggle();
        $(this).children("#hide_add_rule").toggle();
    });
    // show/hide 'add white' form on 'admin-index' page
    $(".add_white").click(function () {
        $("#new_white").slideToggle();
        $(this).children("#show_add_white").toggle();
        $(this).children("#hide_add_white").toggle();
    });
    // show/hide 'admin-white' blocks on 'admin-index' page
    $(".admin_white").click(function () {
        $(".admin-white").slideToggle();
        $(this).children("#show_admin_white").toggle();
        $(this).children("#hide_admin_white").toggle();
    });
    // show/hide 'add blue' form on 'admin-index' page
    $(".add_blue").click(function () {
        $("#new_blue").slideToggle();
        $(this).children("#show_add_blue").toggle();
        $(this).children("#hide_add_blue").toggle();
    });
    // show/hide 'admin-blue' blocks on 'admin-index' page
    $(".admin_blue").click(function () {
        $(".admin-blue").slideToggle();
        $(this).children("#show_admin_blue").toggle();
        $(this).children("#hide_admin_blue").toggle();
    });
    
    /* MARK: MESSAGE READ
    */
    // show/hide 'message' on 'admin-inbox' page and display if message is read or not
    $(".message-from").click(function () {
        $(this).next(".message-msg").slideToggle();
        $(this).children(".arrow-down").toggle();
        $(this).children(".arrow-up").toggle();
        // toggle these classes to add a little color to messages that are open
        $(this).toggleClass("open");
        $(this).toggleClass("close");
        // remove this class when msg has been clicked, so it does not show as 'new message'
        $(this).removeClass("newmessage");
        // add this class when msg has been clicked, so it does not show as 'new message'
        $(this).addClass("read");

        let $section = jQuery(this).closest("section");
        var $messageId   = $section.attr('attr-message_id');
        $message_read = $('input[name=message_read]').val();

        $.ajax({
            method: "POST",
            // get the url to send to, when btn is clicked
            url: 'includes/messages/messageread.inc.php',
            // data to send
            data: {
                message_id: $messageId,
                message_read: $message_read
            },
        })

    });



// ---------------------------------------------------------
    // MARK: CREATE FORMS




    // ---------- MARK: About ----------
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
            url: 'includes/create/createabout.inc.php',
            data: {
                about_image_link: $about_image_link,
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

    // ---------- MARK: Contact ----------
    $('#create-contact').click(function() {

        $contact_name = $('input[name=contact_name]').val();
        $contact_work_title = $('input[name=contact_work_title]').val();
        $contact_phone = $('input[name=contact_phone]').val();
        $contact_email = $('input[name=contact_email]').val();
        
        var $request = $.ajax({
            type: 'POST',
            url: 'includes/create/createcontact.inc.php',
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
            // if text in field has too many characters
            else if($contact_name.length > 100) {
                $request.abort();
                errorAlert("Obs! <br> Teksten i 'Navn' er for langt. Der kan maks skrives 100 tegn (inkl. mellemrum).");
            }
            else if($contact_work_title.length > 100) {
                $request.abort();
                errorAlert("Obs! <br> Teksten i 'Arbejdstitel' er for langt. Der kan maks skrives 100 tegn (inkl. mellemrum).");
            }
            // if 'contact_phone' contains letters
            else if (!/^\d+$/.test($contact_phone)) {
                $request.abort();
                errorAlert("Obs! <br> Telefonnummeret kan ikke indeholde bogstaver!");
            }
            else {
                // if all checks have cleared
                successAlert("Kontakt oprettet!");
            }
		})
    });

    // ---------- MARK: Openinghours ----------
    $('#create-openinghours').click(function() {

        $vacationform = $('#vacationform').val();
        $mondayfromform = $('#mondayfromform').val();
        $mondaytoform = $('#mondaytoform').val();
        $tuesdayfromform = $('#tuesdayfromform').val();
        $tuesdaytoform = $('#tuesdaytoform').val();
        $wednesdayfromform = $('#wednesdayfromform').val();
        $wednesdaytoform = $('#wednesdaytoform').val();
        $thursdayfromform = $('#thursdayfromform').val();
        $thursdaytoform = $('#thursdaytoform').val();
        $fridayfromform = $('#fridayfromform').val();
        $fridaytoform = $('#fridaytoform').val();
        $saturdayfromform = $('#saturdayfromform').val();
        $saturdaytoform = $('#saturdaytoform').val();
        $sundayfromform = $('#sundayfromform').val();
        $sundaytoform = $('#sundaytoform').val();
        
        var $request = $.ajax({
            type: 'POST',
            url: 'includes/create/createopeninghours.inc.php',
            data: {
                vacationform: $vacationform,
                mondayfromform: $mondayfromform,
                mondaytoform: $mondaytoform,
                tuesdayfromform: $tuesdayfromform,
                tuesdaytoform: $tuesdaytoform,
                wednesdayfromform: $wednesdayfromform,
                wednesdaytoform: $wednesdaytoform,
                thursdayfromform: $thursdayfromform,
                thursdaytoform: $thursdaytoform,
                fridayfromform: $fridayfromform,
                fridaytoform: $fridaytoform,
                saturdayfromform: $saturdayfromform,
                saturdaytoform: $saturdaytoform,
                sundayfromform: $sundayfromform,
                sundaytoform: $sundaytoform
            }
        })
        .done(function() {
            // if one or more fields is empty
            if(!$mondayfromform || !$tuesdayfromform || !$wednesdayfromform || !$thursdayfromform || !$fridayfromform || !$saturdayfromform || !$sundayfromform) {
                $request.abort();
                errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde et eller flere felter. Udfyld alle og prøv igen!");
            }
            // if (weekday)from is not "closed" and (weekday)to is empty
            else if($mondayfromform !== "Lukket" && !$mondaytoform) {
                $request.abort();
                errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde 'Til' feltet i åbningstider for mandag!");
            }
            else if($tuesdayfromform !== "Lukket" && !$tuesdaytoform) {
                $request.abort();
                errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde 'Til' feltet i åbningstider for tirsdag!");
            }
            else if($wednesdayfromform !== "Lukket" && !$wednesdaytoform) {
                $request.abort();
                errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde 'Til' feltet i åbningstider for onsdag!");
            }
            else if($thursdayfromform !== "Lukket" && !$thursdaytoform) {
                $request.abort();
                errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde 'Til' feltet i åbningstider for torsdag!");
            }
            else if($fridayfromform !== "Lukket" && !$fridaytoform) {
                $request.abort();
                errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde 'Til' feltet i åbningstider for fredag!");
            }
            else if($saturdayfromform !== "Lukket" && !$saturdaytoform) {
                $request.abort();
                errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde 'Til' feltet i åbningstider for lørdag!");
            }
            else if($sundayfromform !== "Lukket" && !$sundaytoform) {
                $request.abort();
                errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde 'Til' feltet i åbningstider for søndag!");
            }
            else {
                successAlert("Åbningstider oprettet!");
            }
		})
    });

    // ---------- MARK: Rules ----------
    $('#create-rules').click(function() {

        $rules = $('input[name=rules]').val();
        $point_one = $('textarea[name=point_one]').val();
        $point_two = $('textarea[name=point_two]').val();
        $point_three = $('textarea[name=point_three]').val();
        $point_four = $('textarea[name=point_four]').val();
        $point_five = $('textarea[name=point_five]').val();
        $point_six = $('textarea[name=point_six]').val();
        $point_seven = $('textarea[name=point_seven]').val();
        $point_eight = $('textarea[name=point_eight]').val();
        $point_nine = $('textarea[name=point_nine]').val();
        $point_ten = $('textarea[name=point_ten]').val();
        
        var $request = $.ajax({
            type: 'POST',
            url: 'includes/create/createrules.inc.php',
            data: {
                rules: $rules,
                point_one: $point_one,
                point_two: $point_two,
                point_three: $point_three,
                point_four: $point_four,
                point_five: $point_five,
                point_six: $point_six,
                point_seven: $point_seven,
                point_eight: $point_eight,
                point_nine: $point_nine,
                point_ten: $point_ten,
            }
        })
        .done(function() {
            // if one or more required fields is empty
            if(!$rules || !$point_one) {
                $request.abort();
                errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde begge eller ét af de påkrævede felter!");
            }
            // if string length is too long
            else if($rules.length > 100) {
                $request.abort();
                errorAlert("Obs! <br> Teksten i 'Hvor gælder disse regler' er for langt. Der kan maks skrives 100 tegn (inkl. mellemrum).");
            }
            else if($point_one.length > 250) {
                $request.abort();
                errorAlert("Obs! <br> Teksten i regelfelt 1 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
            }
            else if($point_two.length > 250) {
                $request.abort();
                errorAlert("Obs! <br> Teksten i regelfelt 2 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
            }
            else if($point_three.length > 250) {
                $request.abort();
                errorAlert("Obs! <br> Teksten i regelfelt 3 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
            }
            else if($point_four.length > 250) {
                $request.abort();
                errorAlert("Obs! <br> Teksten i regelfelt 4 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
            }
            else if($point_five.length > 250) {
                $request.abort();
                errorAlert("Obs! <br> Teksten i regelfelt 5 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
            }
            else if($point_six.length > 250) {
                $request.abort();
                errorAlert("Obs! <br> Teksten i regelfelt 6 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
            }
            else if($point_seven.length > 250) {
                $request.abort();
                errorAlert("Obs! <br> Teksten i regelfelt 7 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
            }
            else if($point_eight.length > 250) {
                $request.abort();
                errorAlert("Obs! <br> Teksten i regelfelt 8 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
            }
            else if($point_nine.length > 250) {
                $request.abort();
                errorAlert("Obs! <br> Teksten i regelfelt 9 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
            }
            else if($point_ten.length > 250) {
                $request.abort();
                errorAlert("Obs! <br> Teksten i regelfelt 10 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
            }
            else {
                // if all checks have cleared
                successAlert("Regler oprettet!");
            }
		})
    });

    // ---------- MARK: Service ----------
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
            url: 'includes/create/createservice.inc.php',
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
            if(!$service_name || !$service_description_one) {
                $request.abort();
                errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde et eller flere påkrævede felter. Udfyld alle og prøv igen!");
            }
            // if string length is over 250 characters
            else if($service_name.length > 100) {
                $request.abort();
                errorAlert("Obs! <br> Teksten i Ydelsens Navn er for langt. Der kan maks skrives 100 tegn (inkl. mellemrum).");
            }
            // if string length is over 250 characters
            else if($service_description_one.length > 250) {
                $request.abort();
                errorAlert("Obs! <br> Teksten i tekstfelt 1 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
            }
            // if string length is over 250 characters
            else if($service_description_two.length > 250) {
                $request.abort();
                errorAlert("Obs! <br> Teksten i tekstfelt 2 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
            }
            // if string length is over 250 characters
            else if($service_description_three.length > 250) {
                $request.abort();
                errorAlert("Obs! <br> Teksten i tekstfelt 3 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
            }
            // if string length is over 250 characters
            else if($service_description_four.length > 250) {
                $request.abort();
                errorAlert("Obs! <br> Teksten i tekstfelt 4 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
            }
            // if string length is over 250 characters
            else if($service_short_description.length > 100) {
                $request.abort();
                errorAlert("Obs! <br> Teksten i den korte beskrivelse er for langt. Der kan maks skrives 100 tegn (inkl. mellemrum).");
            }
            // if string length is over 250 characters
            else if($important_note.length > 250) {
                $request.abort();
                errorAlert("Obs! <br> Teksten i 'Vigtig Note'-feltet er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
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

    

// -----------------------------------------------------------
    // MARK: UPDATE FORMS




    // ---------- MARK: About ----------
    $('.update-about').click(function() {

        // select the closest section to the clicked update button
        let $section  = jQuery(this).closest("section");
        // get the about ID from section attr class
        var $aboutId   = $section.attr('attr-about_id');

        // Get inputs from abouts
        let $about_name = $section.find(".about_name").val();
        let $about_work_title = $section.find(".about_work_title").val();
        let $about_text_one = $section.find(".about_text_one").val();
        let $about_text_two = $section.find(".about_text_two").val();
        let $about_text_three = $section.find(".about_text_three").val();
        let $about_text_four = $section.find(".about_text_four").val();
        let $about_text_five = $section.find(".about_text_five").val();
        let $about_text_six = $section.find(".about_text_six").val();
        let $about_text_seven = $section.find(".about_text_seven").val();

        // show confirmaiton box
        confirmationUpdate("Er du sikker på, at du gerne vil opdatere denne infoboks?");

        // CONFIRMATION
        // if cancel_update (no)
        $('.cancel_update').click(function() {
            $("#confirmation-update").hide();
            errorAlert("Ingen infoboks blev opdateret!");
        });
        // if confirm_update (yes)
        $('.confirm_update').click(function() {
            // Ajax config
            var $request = $.ajax({
                method: "POST",
                // get the url to send to, when btn is clicked
                url: 'includes/update/updateabout.inc.php',
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
                if(!$about_name) {
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
                // if fields contains too many characters
                else if($about_name.length > 100) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i 'Navn' er for langt. Der kan maks skrives 100 tegn (inkl. mellemrum).");
                }
                else if($about_work_title.length > 100) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i 'Arbejdstitel' er for langt. Der kan maks skrives 100 tegn (inkl. mellemrum).");
                }
                else if($about_text_one.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i 'Tekstfelt 1' er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
                }
                else if($about_text_two.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i 'Tekstfelt 2' er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
                }
                else if($about_text_three.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i 'Tekstfelt 3' er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
                }
                else if($about_text_four.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i 'Tekstfelt 4' er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
                }
                else if($about_text_five.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i 'Tekstfelt 5' er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
                }
                else if($about_text_six.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i 'Tekstfelt 6' er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
                }
                else if($about_text_seven.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i 'Tekstfelt 7' er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
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

    // ---------- MARK: Contact ----------
    $('.update-contact').click(function() {

        // select the closest section to the clicked update button
        let $section  = jQuery(this).closest("section");
        // get the contact ID from section attr class
        var $contactId   = $section.attr('attr-contact_id');

        // Get inputs from contact
        let $contact_name = $section.find(".contact_name").val();
        let $contact_work_title = $section.find(".contact_work_title").val();
        let $contact_phone = $section.find(".contact_phone").val();
        let $contact_email = $section.find(".contact_email").val();

        // show confirmaiton box
        confirmationUpdate("Er du sikker på, at du gerne vil opdatere denne kontakt?");

        // CONFIRMATION
        // if cancel_update (no)
        $('.cancel_update').click(function() {
            $("#confirmation-update").hide();
            errorAlert("Ingen kontakt blev opdateret!");
        });
        // if confirm_update (yes)
        $('.confirm_update').click(function() {
            // Ajax config
            var $request = $.ajax({
                method: "POST",
                // get the url to send to, when btn is clicked
                url: 'includes/update/updatecontact.inc.php',
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
                // if text in field has too many characters
                else if($contact_name.length > 100) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i 'Navn' er for langt. Der kan maks skrives 100 tegn (inkl. mellemrum).");
                }
                else if($contact_work_title.length > 100) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i 'Arbejdstitel' er for langt. Der kan maks skrives 100 tegn (inkl. mellemrum).");
                }
                // if 'contact_phone' contains letters
                else if (!/^\d+$/.test($contact_phone)) {
                    $request.abort();
                    errorAlert("Obs! <br> Telefonnummeret kan ikke indeholde bogstaver!");
                }
                // if 'service_name' contains numbers
                else if ($contact_name.match(".*\\d.*")) {
                    $request.abort();
                    $("#confirmation-update").hide();
                    errorAlert("Obs! <br> Det ser ud som om at der ikke kun er bogstaver i navnet.");
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

    // ---------- MARK: White ----------
    $('.update-white').click(function() {

        // select the closest section to the clicked update button
        let $section  = jQuery(this).closest("section");
        // get the contact ID from section attr class
        var $whiteId   = $section.attr('attr-white_id');

        // Get inputs from white
        let $visibility = $section.find('.visibility').val();
        let $title = $section.find('.title').val();
        let $subtitle = $section.find('.subtitle').val();
        let $text_one = $section.find('.text_one').val();
        let $text_two = $section.find('.text_two').val();
        let $text_three = $section.find('.text_three').val();
        let $text_link = $section.find('.text_link').val();
        let $link_url = $section.find('.white_link_url').val();

        // show confirmaiton box
        confirmationUpdate("Er du sikker på, at du gerne vil opdatere denne blok?");

        // CONFIRMATION
        // if cancel_update (no)
        $('.cancel_update').click(function() {
            $("#confirmation-update").hide();
            errorAlert("Ingen blok blev opdateret!");
        });
        // if confirm_update (yes)
        $('.confirm_update').click(function() {
            // Ajax config
            var $request = $.ajax({
                method: "POST",
                // get the url to send to, when btn is clicked
                url: 'includes/update/updatewhite.inc.php',
                // data to send
                data: {
                    white_id: $whiteId,
                    visibility: $visibility,
                    title: $title,
                    subtitle: $subtitle,
                    text_one: $text_one,
                    text_two: $text_two,
                    text_three: $text_three,
                    text_link: $text_link,
                    link_url: $link_url
                },
            })
            .done(function() {
                // if one or more fields is empty
                if(!$title) {
                    $request.abort();
                    // $("#confirmation-update").hide();
                    errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde 'Titel'. Udfyld dette felt og prøv igen!");
                }
                // if fields contains too many characters
                else if($title.length > 100) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i 'Titel' er for langt. Der kan maks skrives 100 tegn (inkl. mellemrum).");
                }
                else if($subtitle.length > 100) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i 'Undertitel' er for langt. Der kan maks skrives 100 tegn (inkl. mellemrum).");
                }
                else if($text_one.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i 'Tekst 1' er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
                }
                else if($text_two.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i 'Tekst 2' er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
                }
                else if($text_three.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i 'Tekst 3' er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
                }
                else if($text_link.length > 100) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i 'Tekst der bliver til link' er for langt. Der kan maks skrives 100 tegn (inkl. mellemrum).");
                }
                else {
                    // if all checks have cleared
                    // hide confirmation box
                    $("#confirmation-update").hide();
                    successAlert("Blok 1 med ID " + $whiteId + " opdateret!");
                }
            })  
        });
    })

    // ---------- MARK: Blue ----------
    $('.update-blue').click(function() {

        // select the closest section to the clicked update button
        let $section  = jQuery(this).closest("section");
        // get the contact ID from section attr class
        var $blueId   = $section.attr('attr-blue_id');

        // Get inputs from blue
        let $visibility = $section.find('.visibility').val();
        let $title = $section.find('.title').val();
        let $subtitle = $section.find('.subtitle').val();
        let $text_one = $section.find('.text_one').val();
        let $text_two = $section.find('.text_two').val();
        let $text_three = $section.find('.text_three').val();
        let $text_link = $section.find('.text_link').val();
        let $link_url = $section.find('.blue_link_url').val();

        // show confirmaiton box
        confirmationUpdate("Er du sikker på, at du gerne vil opdatere denne blok?");

        // CONFIRMATION
        // if cancel_update (no)
        $('.cancel_update').click(function() {
            $("#confirmation-update").hide();
            errorAlert("Ingen blok blev opdateret!");
        });
        // if confirm_update (yes)
        $('.confirm_update').click(function() {
            // Ajax config
            var $request = $.ajax({
                method: "POST",
                // get the url to send to, when btn is clicked
                url: 'includes/update/updateblue.inc.php',
                // data to send
                data: {
                    blue_id: $blueId,
                    visibility: $visibility,
                    title: $title,
                    subtitle: $subtitle,
                    text_one: $text_one,
                    text_two: $text_two,
                    text_three: $text_three,
                    text_link: $text_link,
                    link_url: $link_url
                },
            })
            .done(function() {
                // if 'title' field is empty
                if (!$title) {
                    $request.abort();
                    $("#confirmation-update").hide();
                    errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde 'Titel'. Udfyld dette felt og prøv igen!");
                }
                // if fields contains too many characters
                else if($title.length > 100) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i 'Titel' er for langt. Der kan maks skrives 100 tegn (inkl. mellemrum).");
                }
                else if($subtitle.length > 100) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i 'Undertitel' er for langt. Der kan maks skrives 100 tegn (inkl. mellemrum).");
                }
                else if($text_one.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i 'Tekst 1' er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
                }
                else if($text_two.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i 'Tekst 2' er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
                }
                else if($text_three.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i 'Tekst 3' er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
                }
                else if($text_link.length > 100) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i 'Tekst der bliver til link' er for langt. Der kan maks skrives 100 tegn (inkl. mellemrum).");
                }
                else {
                    // if all checks have cleared
                    // hide confirmation box
                    $("#confirmation-update").hide();
                    successAlert("Blok 2 med ID " + $blueId + " opdateret!");
                }
            })  
        });
    })

    // ---------- MARK: Openinghours ----------
    $('.update-openinghours').click(function() {

        // select the closest section to the clicked update button
        let $section  = jQuery(this).closest("section");
        // get the openinghours ID from section attr class
        var $openinghoursId   = $section.attr('attr-openinghours_id');

        // Get inputs from openinghours
        let $vacation = $section.find(".vacation").val();
        let $mondayfrom = $section.find(".mondayfrom").val();
        let $mondayto = $section.find(".mondayto").val();
        let $tuesdayfrom = $section.find(".tuesdayfrom").val();
        let $tuesdayto = $section.find(".tuesdayto").val();
        let $wednesdayfrom = $section.find(".wednesdayfrom").val();
        let $wednesdayto = $section.find(".wednesdayto").val();
        let $thursdayfrom = $section.find(".thursdayfrom").val();
        let $thursdayto = $section.find(".thursdayto").val();
        let $fridayfrom = $section.find(".fridayfrom").val();
        let $fridayto = $section.find(".fridayto").val();
        let $saturdayfrom = $section.find(".saturdayfrom").val();
        let $saturdayto = $section.find(".saturdayto").val();
        let $sundayfrom = $section.find(".sundayfrom").val();
        let $sundayto = $section.find(".sundayto").val();

        // show confirmaiton box
        confirmationUpdate("Er du sikker på, at du gerne vil opdatere disse åbningstider?");

        // CONFIRMATION
        // if cancel_update (no)
        $('.cancel_update').click(function() {
            $("#confirmation-update").hide();
            errorAlert("Ingen åbningstider blev opdateret!");
        });
        // if confirm_update (yes)
        $('.confirm_update').click(function() {
            // Ajax config
            var $request = $.ajax({
                method: "POST",
                // get the url to send to, when btn is clicked
                url: 'includes/update/updateopeninghours.inc.php',
                // data to send
                data: {
                    openinghours_id: $openinghoursId,
                    vacation: $vacation,
                    mondayfrom: $mondayfrom,
                    mondayto: $mondayto,
                    tuesdayfrom: $tuesdayfrom,
                    tuesdayto: $tuesdayto,
                    wednesdayfrom: $wednesdayfrom,
                    wednesdayto: $wednesdayto,
                    thursdayfrom: $thursdayfrom,
                    thursdayto: $thursdayto,
                    fridayfrom: $fridayfrom,
                    fridayto: $fridayto,
                    saturdayfrom: $saturdayfrom,
                    saturdayto: $saturdayto,
                    sundayfrom: $sundayfrom,
                    sundayto: $sundayto,
                },
            })
            .done(function() {
                // if one or more fields is empty
                if(!$mondayfrom || !$tuesdayfrom || !$wednesdayfrom || !$thursdayfrom || !$fridayfrom || !$saturdayfrom || !$sundayfrom) {
                    $request.abort();
                    $("#confirmation-update").hide();
                    errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde et eller flere felter. Udfyld alle og prøv igen!");
                }
                // if (weekday)from is not "closed" and (weekday)to is "closed"
                else if($mondayfrom !== "Lukket" && $mondayto === "") {
                    $request.abort();
                    errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde 'Til' feltet i åbningstider for mandag!");
                }
                else if($tuesdayfrom !== "Lukket" && $tuesdayto === "") {
                    $request.abort();
                    errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde 'Til' feltet i åbningstider for tirsdag!");
                }
                else if($wednesdayfrom !== "Lukket" && $wednesdayto === "") {
                    $request.abort();
                    errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde 'Til' feltet i åbningstider for onsdag!");
                }
                else if($thursdayfrom !== "Lukket" && $thursdayto === "") {
                    $request.abort();
                    errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde 'Til' feltet i åbningstider for torsdag!");
                }
                else if($fridayfrom !== "Lukket" && $fridayto === "") {
                    $request.abort();
                    errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde 'Til' feltet i åbningstider for fredag!");
                }
                else if($saturdayfrom !== "Lukket" && $saturdayto === "") {
                    $request.abort();
                    errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde 'Til' feltet i åbningstider for lørdag!");
                }
                else if($sundayfrom !== "Lukket" && !$sundayto === "") {
                    $request.abort();
                    errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde 'Til' feltet i åbningstider for søndag!");
                }
                else {
                    $("#confirmation-update").hide();
                    successAlert("Åbningstider opdateret!");
                }
            })  
        });
    })

    // ---------- MARK: Rules ----------
    $('.update-rules').click(function() {

        // select the closest section to the clicked update button
        let $section  = jQuery(this).closest("section");
        // get the openinghours ID from section attr class
        var $rulesId   = $section.attr('attr-rules_id');

        // Get inputs from openinghours
        let $rules = $section.find(".rules").val();
        let $point_one = $section.find(".point_one").val();
        let $point_two = $section.find(".point_two").val();
        let $point_three = $section.find(".point_three").val();
        let $point_four = $section.find(".point_four").val();
        let $point_five = $section.find(".point_five").val();
        let $point_six = $section.find(".point_six").val();
        let $point_seven = $section.find(".point_seven").val();
        let $point_eight = $section.find(".point_eight").val();
        let $point_nine = $section.find(".point_nine").val();
        let $point_ten = $section.find(".point_ten").val();

        // show confirmaiton box
        confirmationUpdate("Er du sikker på, at du gerne vil opdatere disse regler?");

        // CONFIRMATION
        // if cancel_update (no)
        $('.cancel_update').click(function() {
            $("#confirmation-update").hide();
            errorAlert("Ingen regler blev opdateret!");
        });
        // if confirm_update (yes)
        $('.confirm_update').click(function() {
            // Ajax config
            var $request = $.ajax({
                method: "POST",
                // get the url to send to, when btn is clicked
                url: 'includes/update/updaterules.inc.php',
                // data to send
                data: {
                    rules_id: $rulesId,
                    rules: $rules,
                    point_one: $point_one,
                    point_two: $point_two,
                    point_three: $point_three,
                    point_four: $point_four,
                    point_five: $point_five,
                    point_six: $point_six,
                    point_seven: $point_seven,
                    point_eight: $point_eight,
                    point_nine: $point_nine,
                    point_ten: $point_ten
                },
            })
            .done(function() {
                // if one or more required fields is empty
                if(!$rules || !$point_one) {
                    $request.abort();
                    $("#confirmation-update").hide();
                    errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde begge eller ét af de påkrævede felter!");
                }
                // if string length is too long
                else if($rules.length > 100) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i 'Hvor gælder disse regler' er for langt. Der kan maks skrives 100 tegn (inkl. mellemrum).");
                }
                else if($point_one.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i regelfelt 1 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
                }
                else if($point_two.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i regelfelt 2 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
                }
                else if($point_three.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i regelfelt 3 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
                }
                else if($point_four.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i regelfelt 4 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
                }
                else if($point_five.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i regelfelt 5 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
                }
                else if($point_six.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i regelfelt 6 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
                }
                else if($point_seven.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i regelfelt 7 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
                }
                else if($point_eight.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i regelfelt 8 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
                }
                else if($point_nine.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i regelfelt 9 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
                }
                else if($point_ten.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i regelfelt 10 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
                }
                else {
                    // if all checks have cleared
                    $("#confirmation-update").hide();
                    successAlert("Regler opdateret!");
                }
            })  
        });
    })

    // ---------- MARK: Service ----------
    $('.update-service').click(function() {

        // select the closest section to the clicked update button
        let $section  = jQuery(this).closest("section");
        // get the service ID from section attr class
        var $serviceId   = $section.attr('attr-service_id');

        // Get inputs from services
        let $service_name = $section.find(".service_name").val();
        let $service_short_description = $section.find(".service_short_description").val();
        let $service_description_one = $section.find(".service_description_one").val();
        let $service_description_two = $section.find(".service_description_two").val();
        let $service_description_three = $section.find(".service_description_three").val();
        let $service_description_four = $section.find(".service_description_four").val();
        let $important_note = $section.find(".important_note").val();

        // show confirmaiton box
        confirmationUpdate("Er du sikker på, at du gerne vil opdatere denne ydelse?");

        // CONFIRMATION
        // if cancel_update (no)
        $('.cancel_update').click(function() {
            $("#confirmation-update").hide();
            errorAlert("Ingen ydelse blev opdateret!");
        });
        // if confirm_update (yes)
        $('.confirm_update').click(function() {
            // Ajax config
            var $request = $.ajax({
                method: "POST",
                // get the url to send to, when btn is clicked
                url: 'includes/update/updateservice.inc.php',
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
                if(!$service_name|| !$service_description_one) {
                    $request.abort();
                    $("#confirmation-update").hide();
                    errorAlert("Obs! <br> Det ser ud som om du har glemt at udfylde et eller flere felter. Udfyld alle og prøv igen!");
                }
                // if string length is over 250 characters
                else if($service_name.length > 100) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i Ydelsens Navn er for langt. Der kan maks skrives 100 tegn (inkl. mellemrum).");
                }
                // if string length is over 250 characters
                else if($service_description_one.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i tekstfelt 1 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
                }
                // if string length is over 250 characters
                else if($service_description_two.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i tekstfelt 2 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
                }
                // if string length is over 250 characters
                else if($service_description_three.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i tekstfelt 3 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
                }
                // if string length is over 250 characters
                else if($service_description_four.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i tekstfelt 4 er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
                }
                // if string length is over 250 characters
                else if($service_short_description.length > 100) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i den korte beskrivelse er for langt. Der kan maks skrives 100 tegn (inkl. mellemrum).");
                }
                // if string length is over 250 characters
                else if($important_note.length > 250) {
                    $request.abort();
                    errorAlert("Obs! <br> Teksten i 'Vigtig Note'-feltet er for langt. Der kan maks skrives 250 tegn (inkl. mellemrum).");
                }
                // if 'service_name' contains numbers
                else if ($service_name.match(".*\\d.*")) {
                    $request.abort();
                    $("#confirmation-update").hide();
                    errorAlert("Obs! <br> Det ser ud som om at der ikke kun er bogstaver i ydelsens navn.");
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



// -------------------------------------------------------------
    // MARK: DELETE FORMS




    // ---------- MARK: About ----------
    $('.delete-about').click(function() {

        let $section  = jQuery(this).closest("section");
        // get the about ID
        var $aboutId   = $section.attr('attr-about_id');
        let $about_name = $section.find(".about_name").val();
        let $imageName = $section.find("#image_name").val();

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
                url: 'includes/delete/deleteabout.inc.php',
                // data to send
                data: {
                    about_id: $aboutId,
                    about_name: $about_name,
                    image_name: $imageName
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

    // ---------- MARK: Contact ----------
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
                url: 'includes/delete/deletecontact.inc.php',
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

    // ---------- MARK: White ----------
    $('.delete-white').click(function() {

        let $section  = jQuery(this).closest("section");
        // get the contact ID
        var $whiteId   = $section.attr('attr-white_id');
        let $imageName = $section.find("#image_name").val();

        // show confirmaiton box
        confirmationDelete("Er du sikker på, at du gerne vil slette denne blok?");

        // CONFIRMATION
        // if cancel_delete (no)
        $('.cancel_delete').click(function(){ 
            $("#confirmation-delete").hide();
            errorAlert("Ingen blok blev slettet!");
        });
        // if confirm_delete (yes)
        $('.confirm_delete').click(function(){
            // Ajax config
            $.ajax({
                //we are using GET method to get data from server side
                type: "GET",
                // get the url to send to, when btn is clicked
                url: 'includes/delete/deletewhite.inc.php',
                // data to send
                data: {
                    white_id: $whiteId,
                    image_name: $imageName
                }
            })
            .done(function() {
                // remove the table row
                $section.remove();
                $("#confirmation-delete").hide();
                // alert that the row has been successfully removed
                successAlert("Hvid blok med ID " + $whiteId + " slettet!");
            })
        });
    })

    // ---------- MARK: Blue ----------
    $('.delete-blue').click(function() {

        let $section  = jQuery(this).closest("section");
        // get the contact ID
        var $blueId   = $section.attr('attr-blue_id');
        let $imageName = $section.find("#image_name").val();

        // show confirmaiton box
        confirmationDelete("Er du sikker på, at du gerne vil slette denne blok?");

        // CONFIRMATION
        // if cancel_delete (no)
        $('.cancel_delete').click(function(){ 
            $("#confirmation-delete").hide();
            errorAlert("Ingen blok blev slettet!");
        });
        // if confirm_delete (yes)
        $('.confirm_delete').click(function(){
            // Ajax config
            $.ajax({
                //we are using GET method to get data from server side
                type: "GET",
                // get the url to send to, when btn is clicked
                url: 'includes/delete/deleteblue.inc.php',
                // data to send
                data: {
                    blue_id: $blueId,
                    image_name: $imageName
                }
            })
            .done(function() {
                // remove the table row
                $section.remove();
                $("#confirmation-delete").hide();
                // alert that the row has been successfully removed
                successAlert("Blå blok med ID " + $blueId + " slettet!");
            })
        });
    })

    // ---------- MARK: Gallery Image ----------
    $('.delete-image').click(function() {

        let $section  = jQuery(this).closest("section");
        // get the image ID
        var $imageId   = $section.attr('attr-image_id');
        let $imageName = $section.find("#image_name").val();

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
                url: 'includes/delete/deletegalleryimage.inc.php',
                // data to send
                data: {
                    image_id: $imageId,
                    image_name: $imageName
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

    // ---------- MARK: Msg (Inbox) ----------
    $('.delete-message').click(function() {

        let $section  = jQuery(this).closest("section");
        // get the image ID
        var messageId   = $section.attr('attr-message_id');

        // show confirmaiton box
        confirmationDelete("Er du sikker på, at du gerne vil slette denne besked?");

        // CONFIRMATION
        var buttonclicked;
        // if cancel_delete (no)
        $('.cancel_delete').click(function(){ 
            if(buttonclicked != false) {
                $("#confirmation-delete").hide();
                errorAlert("Ingen besked blev slettet!");
            }
        });
        // if confirm_delete (yes)
        $('.confirm_delete').click(function(){
            // Ajax config
            $.ajax({
                //we are using GET method to get data from server side
                type: "GET",
                // get the url to send to, when btn is clicked
                url: 'includes/messages/deletemessage.inc.php',
                // data to send
                data: {
                    message_id: messageId
                }
            })
            .done(function() {
                // remove the table row
                $section.remove();
                $("#confirmation-delete").hide();
                // alert that the row has been successfully removed
                successAlert("Besked slettet!");
            })
        });
    })

    // ---------- MARK: Openinghours ----------
    $('.delete-openinghours').click(function() {

        // select the closest section to the clicked update button
        let $section  = jQuery(this).closest("section");
        // get the openinghours ID from section attr class
        var $openinghoursId   = $section.attr('attr-openinghours_id');

        // show confirmaiton box
        confirmationDelete("Er du sikker på, at du gerne vil slette disse åbningstider?");

        // CONFIRMATION
        // if cancel_delete (no)
        $('.cancel_delete').click(function(){ 
            $("#confirmation-delete").hide();
            errorAlert("Ingen åbningstider blev slettet!");
        });
        // if confirm_delete (yes)
        $('.confirm_delete').click(function(){
            // Ajax config
            $.ajax({
                //we are using GET method to get data from server side
                type: "GET",
                // get the url to send to, when btn is clicked
                url: 'includes/delete/deleteopeninghours.inc.php',
                // data to send
                data: {
                    openinghours_id: $openinghoursId
                }
            })
            .done(function() {
                // remove the table row
                $section.remove();
                $("#confirmation-delete").hide();
                // alert that the row has been successfully removed
                successAlert("Åbningstider " + $openinghoursId + " slettet!");
            })
        });
    })

    // ---------- MARK: Rules ----------
    $('.delete-rules').click(function() {

        // select the closest section to the clicked update button
        let $section  = jQuery(this).closest("section");
        // get the openinghours ID from section attr class
        var $rulesId   = $section.attr('attr-rules_id');

        // show confirmaiton box
        confirmationDelete("Er du sikker på, at du gerne vil slette disse regler?");

        // CONFIRMATION
        // if cancel_delete (no)
        $('.cancel_delete').click(function(){ 
            $("#confirmation-delete").hide();
            errorAlert("Ingen regler blev slettet!");
        });
        // if confirm_delete (yes)
        $('.confirm_delete').click(function(){
            // Ajax config
            $.ajax({
                //we are using GET method to get data from server side
                type: "GET",
                // get the url to send to, when btn is clicked
                url: 'includes/delete/deleterules.inc.php',
                // data to send
                data: {
                    rules_id: $rulesId
                }
            })
            .done(function() {
                // remove the table row
                $section.remove();
                $("#confirmation-delete").hide();
                // alert that the row has been successfully removed
                successAlert("Regler " + $rulesId + " slettet!");
            })
        });
    })

    // ---------- MARK: Service ----------
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
                url: 'includes/delete/deleteservice.inc.php',
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

    // ---------- MARK: User ----------
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
                    url: 'includes/delete/deleteuser.inc.php',
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