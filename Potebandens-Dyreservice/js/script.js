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

    // Function to delete service from html table and db table
    function del() {
	    $(document).delegate(".delete-service", "click", function() {

            if (confirm("Er du sikker på, at du vil slette denne ydelse?")) {
                // set variable to select the <tr> closest to the selected delete btn
                let $table_row = jQuery(this).closest("tr");
                // get the service ID
                var serviceId = $table_row.attr('attr-service_id');

                // Ajax config
                $.ajax({
                    //we are using GET method to get data from server side
                    type: "GET",
                    // get the url to send to, when btn is clicked
                    url: 'includes/deleteservice.inc.php',
                    // data to send
                    data: {
                        service_id:serviceId
                    },
                    // when the request to delete the selected row is completed
                    success: function (response) {
                        // remove the table row
                        $table_row.remove();
                        // reload page
                        window.location.reload();
                        // alert that the row has been successfully removed
                        alert(response)
                    }
                });
            }
        });
    }
    // call the function to initiate when delete-service btn is clicked
    del();

});