
$(document).ready(function(){

    "use strict";


/*
 ----------------------------------------------------------------------
 Preloader
 ----------------------------------------------------------------------
 */
    $(".loader").delay(400).fadeOut();
    $(".animationload").delay(400).fadeOut("fast");


/*
 ----------------------------------------------------------------------
 Nice scroll
 ----------------------------------------------------------------------
 */
    $("html").niceScroll({
        cursorcolor: '#fff',
        cursoropacitymin: '0',
        cursoropacitymax: '1',
        cursorwidth: '2px',
        zindex: 999999,
        horizrailenabled: false,
        enablekeyboard: false
    });


/*
 ----------------------------------------------------------------------
 Watch
 ----------------------------------------------------------------------
 */
    if($.find('#watch')[0]) {

        $('#watch').countDown({
            targetDate: {
                'day': 		30,
                'month': 	8,
                'year': 	2015,
                'hour': 	23,
                'min': 		0,
                'sec': 		0
            },
            omitWeeks: true
        });
        //enter the count down date using the format year, month, day, time: hour, min, sec

    }






}); // End $(document).ready(function(){





















