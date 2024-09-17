$(document).ready(function(){

    // Mobile menu - click on hamburger menu icon to open menu
    $('#menu-btn').click(function() {
        $(this).toggleClass('open');
        $('.menu-content').toggle("slide");
    });

    // Slider on front page to diplay services
    $('.slider').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
        infinite: false,
        prevArrow: $('.service-prev'),
        nextArrow: $('.service-next'),
        responsive: [
            {
                breakpoint: 800,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    // delete user from db and table
    function deleteUser() {
	    $(document).delegate(".delete-user", "click", function() {

            let $table_row  = jQuery(this).closest("tr");
            // get the service ID
            var serviceId   = $table_row.attr('attr-user_id');

            // show confirmaiton box
            $("#confirmation-user-delete").show();

            // CONFIRMATION
            var buttonclicked;
            // if cancel_delete (no)
            $('.cancel_delete').click(function(){ 
                if(buttonclicked != false) {
                    window.location.reload();
                    $("#confirmation-delete").hide();
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
                        service_id: serviceId
                    }
                })
                .done(function() {
                    // remove the table row
                    $table_row.remove();
                    // hide confirmation box
                    $("#confirmation-delete").hide();
                    // reload page
                    window.location.reload();
                    // alert that the row has been successfully removed
                    alert("Ydelse slettet!");
                })
            });
        })
    }
    // call the function to initiate when delete-service btn is clicked
    deleteUser();


    // show/hide 'new service' form
    $(".show_hide").click(function () {
        $("#new_service").slideToggle();
        $(this).children("#show_add_form").toggle();
        $(this).children("#hide_add_form").toggle();
    });

    // Function to create service in html table and db table
    $('#create-service').click(function() {

        $service_name = $('input[name=service_name]').val();
        $service_length = $('input[name=service_length]').val();
        $service_description = $('input[name=service_description]').val();
        $service_price = $('input[name=service_price]').val();
        
        var $request = $.ajax({
            type: 'POST',
            url: 'includes/createservice.inc.php',
            data: {
                service_name: $service_name,
                service_length: $service_length,
                service_description: $service_description,
                service_price: $service_price
            }
        })
        .done(function() {
            // if one or more fields is empty
            if(!$service_name || !$service_length || !$service_description || !$service_price) {
                $request.abort();
                window.location.reload();
                alert("Obs! Det ser ud som om du har glemt at udfylde et eller flere felter. Udfyld alle og prøv igen!");
            }
            // if 'service_price' does not contain only numbers
            if (isNaN($service_price)) {
                $request.abort();
                window.location.reload();
                alert("Obs! Det ser ud som om at det ikke er tal i ydelsens pris.");
            }
            // if 'service_name' contains numbers
            if ($service_name.match(".*\\d.*")) {
                $request.abort();
                window.location.reload();
                alert("Obs! Det ser ud som om det ikke kun er bogstaver i ydelsens navn. Sørg for at navnet ikke inkluderer tal eller andre tegn og prøv igen!");
            }
            // if all checks have cleared
            
            // show message in #alertMessage div
            $('#alertMessage').html('<p>Ydelse oprettet!</p>');

            // WORK ON APPEND TO TABLE INSTEAD OF RELOADING PAGE SO #ALERTMESSAGE KEEPS BEING ON PAGE AFTER ADDING NEW SERVICE

            // reload page after 3 seconds (#alertMessage dissappears)
            // setTimeout(function() {
            //     location.reload();
            // }, 3000);
		})
    });
    
    // Function to update service from html table and db table
    function updateService() {
	    $(document).delegate(".update-service", "click", function() {

            // select the closest table row (tr) to the clicked update button
            let $table_row  = jQuery(this).closest("tr");
            // get the service ID from table row (tr) attr class
            var serviceId   = $table_row.attr('attr-service_id');

            // Get inputs from services
            let $service_name 	        = $table_row.find(".service_name").val();
            let $service_length	        = $table_row.find(".service_length").val();
            let $service_description 	= $table_row.find(".service_description").val();
            let $service_price 	        = $table_row.find(".service_price").val();

            // show confirmaiton box
            $("#confirmation-update").show();

            // CONFIRMATION
            var buttonclicked;
            // if cancel_update (no)
            $('.cancel_update').click(function(){ 
                if(buttonclicked != false) {
                    window.location.reload();
                    alert("Ingen ydelse blev opdateret!");
                    $("#confirmation-update").hide();
                } 
            });
            // if confirm_update (yes)
            $('.confirm_update').click(function(){
                // Ajax config
                var $request = $.ajax({
                    type: "POST",
                    // get the url to send to, when btn is clicked
                    url: 'includes/updateservice.inc.php',
                    // data to send
                    data: {
                        service_id: serviceId,
                        service_name: $service_name,
                        service_length: $service_length,
                        service_description: $service_description,
                        service_price: $service_price
                    },
                })
                .done(function() {
                    // if one or more fields is empty
                    if($service_name  === "" || $service_description  === "" || $service_price === "") {
                        $request.abort();
                        window.location.reload();
                        alert("Obs! Det ser ud som om du har glemt at udfylde et eller flere felter. Udfyld alle og prøv igen!");
                        $("#confirmation-update").hide();
                    }
                    // if 'service_price' does not contain only numbers
                    if (isNaN($service_price)) {
                        $request.abort();
                        window.location.reload();
                        alert("Obs! Det ser ud som om at det ikke er tal i ydelsens pris.");
                        $("#confirmation-update").hide();
                    }
                    // if 'service_name' contains numbers
                    if ($service_name.match(".*\\d.*")) {
                        $request.abort();
                        window.location.reload();
                        alert("Obs! Det ser ud som om at der ikke kun er bogstaver ydelsens navn.");
                        $("#confirmation-update").hide();
                    }
                    // if all checks have cleared
                    // hide confirmation box
                    $("#confirmation-update").hide();
                    // show message in #alertMessage div
                    $('#alertMessage').html('<p>Ydelse opdateret!</p>');
                    // reload page after 3 seconds (#alertMessage dissappears)
                    setTimeout(function() {
                        location.reload();
                    }, 3000);
                })  
            });
        })
    }
    // call the function to initiate when update-service btn is clicked
    updateService();

    // Function to delete service from html table and db table
    function deleteService() {
	    $(document).delegate(".delete-service", "click", function() {

            let $table_row  = jQuery(this).closest("tr");
            // get the service ID
            var serviceId   = $table_row.attr('attr-service_id');

            // show confirmaiton box
            $("#confirmation-delete").show();

            // CONFIRMATION
            var buttonclicked;
            // if cancel_delete (no)
            $('.cancel_delete').click(function(){ 
                if(buttonclicked != false) {
                    window.location.reload();
                    $("#confirmation-delete").hide();
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
                        service_id: serviceId
                    }
                })
                .done(function() {
                    // remove the table row
                    $table_row.remove();
                    // hide confirmation box
                    $("#confirmation-delete").hide();
                    // reload page
                    window.location.reload();
                    // alert that the row has been successfully removed
                    alert("Ydelse slettet!");
                })
            });
        })
    }
    // call the function to initiate when delete-service btn is clicked
    deleteService();

});