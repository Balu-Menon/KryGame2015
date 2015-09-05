statusready=false;

 window.fbAsyncInit = function() {
  FB.init({
    appId      : '997353176952029',
    cookie     : true,  
                        
    xfbml      : true,  
    version    : 'v2.2' 
  });
  statusready=true;

};
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
function start(){
 FB.getLoginStatus(function(response){
  if(response.status==='connected'){
   login();
    $('body').fadeOut();
  }
 });
}
function isLoggedin(){
    FB.getLoginStatus(function(response){
    if(response.status==='connected')
      console.log(response.status);
    else{
      window.alert("You are not logged in to Facebook.Please Login To Continue");
      window.location="../"
  }},true);
}

function logout(){
  FB.getLoginStatus(handleSessionResponse);
}
function handleSessionResponse(response){
  if(response.status==='connected'){
      FB.logout();
      window.location="../";
  }
}
function login(){
 console.log("CONNECTED\n");
 FB.api('/me',function(response){
 console.log(JSON.stringify(response));
 var csrf=getCookie('csrftoken');
 $.post("loginverify.php",{
		fbid:response.id,
		firstname:response.first_name,
		lastname:response.last_name,
		email:response.email,
		csrfmiddlewaretoken:csrf
		},function(data,status){if(status==='success')
                                  window.location="../dashboard";					
					});
 });
}
// using jQuery
function getCookie(name) {
    var cookieValue = null;
    if (document.cookie && document.cookie != '') {
        var cookies = document.cookie.split(';');
        for (var i = 0; i < cookies.length; i++) {
            var cookie = jQuery.trim(cookies[i]);
            // Does this cookie string begin with the name we want?
            if (cookie.substring(0, name.length + 1) == (name + '=')) {
                cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                break;
            }
        }
    }
    return cookieValue;
}
function FBlogin(){
 FB.login(function(response){
 if(response.status==='connected')
  login();
   },{scope: 'public_profile,email'});
  }
