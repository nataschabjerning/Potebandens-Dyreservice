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

    $('#show_add_form').click(function(){
		$(this).hide();
		$("#new_service").show();
		$("#hide_add_form").show();
	});
	$('#hide_add_form').click(function(){
		$(this).hide();
		$("#new_service").hide();
		$("#show_add_form").show();
	});


    $('#create-service').click(function() {

        $service_name = $('input[name=service_name]').val();
        $service_length = $('input[name=service_length]').val();
        $service_description = $('input[name=service_description]').val();
        $service_price = $('input[name=service_price]').val();

        $response = false;

        if(!$service_name || !$service_length || !$service_description || !$service_price) {
            $response = false;
            
        }
        else {
            $reponse = true;
        }
        
        $.ajax({
            type: 'POST',
            url: 'includes/createservice.inc.php',
            data: {
                service_name: $service_name,
                service_length: $service_length,
                service_description: $service_description,
                service_price: $service_price
            },
            success: function () { 
                if($response == true) {
                    // reload page
                    window.location.reload();
                    alert("Ydelse oprettet!");
                }
                else {
                    window.location.reload();
                    alert("Udfyld alle felter!");
                } 
            } 
        })
    });
    

    // Function to update service from html table and db table
    function updateService() {
	    $(document).delegate(".update-service", "click", function() {

            let $table_row  = jQuery(this).closest("tr");
            // get the service ID
            var serviceId   = $table_row.attr('attr-service_id');

            // ADD INPUTS
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
                $.ajax({
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
                    // when the request to update the selected row is completed
                    success: function () {
                        // alert that the row has been successfully updated
                        alert("Ydelse opdateret!");
                        // hide confirmation box
                        $("#confirmation-update").hide();
                        // reload page
                        window.location.reload();
                    }
                });
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
                    alert("Ingen ydelse blev slettet!");
                    $("#confirmation-delete").hide();
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
                    },
                    // when the request to delete the selected row is completed
                    success: function () {
                        // remove the table row
                        $table_row.remove();
                        // alert that the row has been successfully removed
                        alert("Ydelse slettet!");
                        // hide confirmation box
                        $("#confirmation-delete").hide();
                        // reload page
                        window.location.reload();
                    }
                });
            });
        })
    }
    // call the function to initiate when delete-service btn is clicked
    deleteService();

});