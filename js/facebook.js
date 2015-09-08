var fbid=0; 
var loginFlag=0;

function statusChangeCallback(response) {
    if (response.status === 'connected') {
        testAPI();
    }
    else if (response.status === 'not_authorized') {
        console.log("Not Authorised");
    }
    else {
        console.log("Not Logged In to Facebook");
    }
}

function checkLoginState() {
    FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
    });
}

window.fbAsyncInit = function() {
    FB.init({
        appId      : '1497221180514758',
        cookie     : true,                          
        xfbml      : true,  
        version    : 'v2.0' 
    });

    FB.getLoginStatus(function(response) {
        statusChangeCallback(response); 
    });
};

(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function testAPI() {
    var fbid;
    $("#fblogin").removeAttr("onclick");
    $("#fblogin").html("Loading...");
    FB.api('/me?fields=id,first_name,last_name,email,permissions', function(response) {
        loginFlag=1;
        $.post("loginverify.php",
               {
            fbid:response.id,
            firstname:response.first_name,
            lastname:response.last_name,
            email:response.email
            },
               function(data, status) {
            if(data=="1"||data==1) {
                $("#fblogin").html("Go to Battle!");
                $("#fblogin").click(function(){
                    window.location.assign("validate.php");
                });
            }
            else if(data=='Error') {
                $("#fblogin").html("Login Using Facebook");
                $("#fblogin").attr("onclick","fb_login();");
            }
            else if(data) {
                $("#fblogin").html("Choose Battleground!");
                $("#fblogin").click(function(){
                    window.location.assign("battlegrounds.php");
                });
            }
            else {
                alert("Error");
            }
        });
    });
}
function fb_login() {
    FB.login(function(response) {
        testAPI();
    }, {scope: 'publish_actions,public_profile,email'});
}                 
