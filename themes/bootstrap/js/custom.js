





(function ($) {
    "use strict";
    var mainApp = {
        main_fun: function () {
            /*====================================
             METIS MENU 
             ======================================*/
            $('#main-menu').metisMenu();

            /*====================================
             LOAD APPROPRIATE MENU BAR
             ======================================*/
            $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            });


            Morris.Donut({
                element: 'morris-donut-chart',
                data: [{
                        label: "Active",
                        value: active_users
                    }, {
                        label: "Inactive",
                        value: inactive_users
                    }],
                resize: true
            });


            Morris.Line({
                element: 'morris-line-chart',
                data: data,
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['Users', 'Searches'],
                hideHover: 'auto',
                resize: true
            });


        },
        initialization: function () {
            mainApp.main_fun();

        }

    }
    // Initializing ///

    $(document).ready(function () {
        mainApp.main_fun();
    });

}(jQuery));
