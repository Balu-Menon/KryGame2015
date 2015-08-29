var _gaq = _gaq || [];
$(document).ready(function(){
    // Set Do Not Show cookie
    $.Cookie = {
        get: function(name) {
            var nameOfCookie = name + "=",
            x = 0;
            while (x <= document.cookie.length) {
                var y = (x + nameOfCookie.length);
                if (document.cookie.substring(x, y) == nameOfCookie) {
                    if ((endOfCookie = document.cookie.indexOf(";", y)) == -1) {
                        endOfCookie = document.cookie.length;
                    }
                    return unescape(document.cookie.substring(y, endOfCookie));
                }
                x = document.cookie.indexOf(" ", x) + 1;
                if (x == 0) {
                    break;
                }
            }
            return "";
        },
        set: function(name, value, expiredays) {
            var todayDate = new Date();

            expiredays = expiredays || null;
            if (expiredays != null) {
                todayDate.setDate(todayDate.getDate() + expiredays);
            }
            document.cookie = name + "=" + escape(value) + "; path=/; domain=" + document.domain + ";" + (expiredays != null ? ("expires=" + todayDate.toGMTString() + ";") : "");
        }
    };

    $('#dont-show input[type=checkbox]').change(function() {
        if ($(this).attr("checked")) {
            $.Cookie.set("dontShowPageAgain2", "false", "30");
        } else {
            $.Cookie.set("dontShowPageAgain2", "false", "0");
        }
    });

    if (document.cookie.indexOf("pageVisitedThisSession") < 0) {
        document.cookie = "pageVisitedThisSession=true;path=/";
    };

    $('#btn-portuguese').remove();

    if(typeof $(document).ncsEventTracker!=="undefined"){
        $(document).ncsEventTracker({
            pageProfile: "aion",
            accountId: "UA-3959034-6",
            rollupAccountId: "UA-17151370-1",
            domainName:".aiononline.com",
            isCrossDomainTracking: true
        });  
    }
});
var navLock = false;
//reposition when intereacting with a section
$.fn.reposition = function(callback) {
    //lock main nav
    navLock = true;
    $("#main-nav").removeClass('scroll-nav');
    $("#main-nav").removeClass('init-nav');

    var section = $(this).closest('.section');
    var scrollPosY = section.offset().top;
    $('html,body').animate({scrollTop:scrollPosY},200,function(){
        callback();
        navLock = false;
        lastScrollTop = 0; //this is necessary to avoid the 'bump'
    });
    return $(this);
};
//reposition when intereacting with a section
function scrollLock(opt) {
    switch(opt){
        case 'lock':
            $('body').addClass('scroll-lock');
            break;
        case 'unlock':
            $('body').removeClass('scroll-lock');
            break;
        default:
        //nothing
    }
    return this;
};