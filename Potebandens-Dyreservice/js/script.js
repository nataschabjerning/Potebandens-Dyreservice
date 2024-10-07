$(document).ready(function(){

    // Mobile menu - click on hamburger menu icon to open menu
    $('#menu-btn').click(function() {
        $(this).toggleClass('open');
        $('.menu-content').toggle("slide");
    });

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
                window.location.reload();
                alert("Obs! Det ser ud som om du har glemt at udfylde et eller flere felter. Udfyld alle og prøv igen!");
            }
            // if 'service_name' contains numbers
            else if ($service_name.match(".*\\d.*")) {
                $request.abort();
                window.location.reload();
                alert("Obs! Det ser ud som om det ikke kun er bogstaver i ydelsens navn. Sørg for at navnet ikke inkluderer tal eller andre tegn og prøv igen!");
            }
            else {
                // if all checks have cleared
                alert("Ydelse oprettet!");
                
                // WORK ON APPEND TO TABLE INSTEAD OF RELOADING PAGE SO #ALERTMESSAGE KEEPS BEING ON PAGE AFTER ADDING NEW SERVICE

                window.location.reload();
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
        $('.cancel_update').click(function(){ 
            window.location.reload();
            alert("Ingen ydelse blev opdateret!");
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
                    alert("Obs! Det ser ud som om du har glemt at udfylde et eller flere felter. Udfyld alle og prøv igen!");
                    $("#confirmation-update").hide();
                }
                // if 'service_name' contains numbers
                else if ($service_name.match(".*\\d.*")) {
                    $request.abort();
                    window.location.reload();
                    alert("Obs! Det ser ud som om at der ikke kun er bogstaver ydelsens navn.");
                    $("#confirmation-update").hide();
                }
                else {
                    // if all checks have cleared
                    // hide confirmation box
                    $("#confirmation-service-update").hide();
                    alert("Ydelse " + $serviceId + " opdateret!");
                    // reload page to show update
                    window.location.reload();
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

    // ---------- UPDATE ABOUT ----------
    $('.update-about').click(function() {

        // select the closest section to the clicked update button
        let $section  = jQuery(this).closest("section");
        // get the service ID from section attr class
        var $aboutId   = $section.attr('attr-about_id');

        // Get inputs from abouts
        let $about_name = $section.find("#about_name").val();
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
        var aboutId   = $section.attr('attr-about_id');

        // show confirmaiton box
        $("#confirmation-about-delete").show();

        // CONFIRMATION
        var buttonclicked;
        // if cancel_delete (no)
        $('.cancel_about_delete').click(function(){ 
            if(buttonclicked != false) {
                window.location.reload();
                $("#confirmation-about-delete").hide();
                alert("Ingen info blev slettet!");
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
                    about_id: aboutId
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
                alert("Info slettet!");
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