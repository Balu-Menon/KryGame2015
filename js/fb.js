//sample url for profile picture http://graph.facebook.com/1175660425792940/picture?type=large&width=140&height=140
function fbLoginDone() {
    FB.api("/me?fields=id,name,email,permissions", function(response) {
        console.log(JSON.stringify(response));
        if (response.id) {
            //var pro_pic_link = "http://graph.facebook.com/" + response.id + "/picture?type=large&width=240&height=240";
            //var small_pro_pic_link = "http://graph.facebook.com/" + response.id + "/picture?type=large&width=55&height=55";
            //$("#prof_pic").attr('src', pro_pic_link);
            //var fab_html="<img src='"+small_pro_pic_link+"'>";
            //$("#profile_fab").html(fab_html);
        }
        if (response.name) {
            var fb_name = response.name;
            $("#username").html(fb_name);
            $("#fabout").attr('data-tooltip',fb_name);
            $("#notloggedin").css({display: "none"});
            $("#loggedin").css({display: "inherit"});
        }
    });
}

// This is called with the results from from FB.getLoginStatus().
function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
        if (response.authResponse) {
            FB.api("/me/permissions", function(response) {
                console.log(response);
                if (response.data[0].status != "granted" || response.data[1].status != "granted") {
                    CustomCheckLoginState();
                } 
                else {    
                    fbLoginDone();
                }
            });
        }
    } 
    else if (response.status === 'not_authorized') {
        // The person is logged into Facebook, but not your app.
        document.getElementById('status').innerHTML = 'Please log ' +
            'into this app.';
        //change button and button type
    }
    else {
        // The person is not logged into Facebook, so we're not sure if
        // they are logged into this app or not.
        //ask people to login to fb button
        document.getElementById('status').innerHTML = 'Please log ' +
            'into Facebook.';
    }
}
// This function is called when someone finishes with the Login
// Button.  See the onlogin handler attached to it in the sample
// code below.
function checkLoginState() {
    FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
    });
}
function checkLoginState() {
    FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
    });
}

function CustomCheckLoginState() { //custom login button listener
    FB.login(function(response) {
        console.log(response);
        if (response.status === 'connected') {
            // Logged into your app and Facebook.
            if (response.authResponse) {
                FB.api("/me/permissions", function(response) {
                    console.log(response);
                    if (response.data[0].status != "granted" || response.data[1].status != "granted") {
                        CustomCheckLoginState();
                    }
                    else {
                        fbLoginDone();
                    }
                });
            }    
        }
        else if (response.status === 'not_authorized') {
            // The person is logged into Facebook, but not your app.
        }
        else {
            // The person is not logged into Facebook, so we're not sure if
            // they are logged into this app or not.
        }
    }, {scope: 'public_profile,email', auth_type: 'rerequest'});
    //FB.getLoginStatus(function(response) {
    //    statusChangeCallback(response);
    //});
}
window.fbAsyncInit = function() {
    FB.init({
        appId: '929431097094904',
        cookie: true, // enable cookies to allow the server to access 
        // the session
        xfbml: true, // parse social plugins on this page
        version: 'v2.2' // use version 2.2
    });
    
    // Now that we've initialized the JavaScript SDK, we call 
    // FB.getLoginStatus().  This function gets the state of the
    // person visiting this page and can return one of three states to
    // the callback you provide.  They can be:
    //
    // 1. Logged into your app ('connected')
    // 2. Logged into Facebook, but not your app ('not_authorized')
    // 3. Not logged into Facebook and can't tell if they are logged into
    //    your app or not.
    //
    // These three cases are handled in the callback function.
    FB.getLoginStatus(function(response) {
        checkLoginState(response);
    });
};

// Load the SDK asynchronously
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id))
        return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Here we run a very simple test of the Graph API after login is
// successful.  See statusChangeCallback() for when this call is made.
//            function testAPI() {
//                console.log('Welcome!  Fetching your information.... ');
//                FB.api('/me', function(response) {
//                    console.log('Successful login for: ' + response.name);
//                    document.getElementById('status').innerHTML =
//                            'Thanks for logging in, ' + response.name + '!';
//                });
//            }