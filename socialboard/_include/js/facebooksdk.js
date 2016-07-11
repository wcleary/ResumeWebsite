// You probably don't want to use globals, but this is just example code
  var fbAppId = '352838394859685';
  // This check is just here to make sure you set your app ID. You don't
  // need to use it in production. 
  if (fbAppId === 'replace me') {
    alert('Please set the fbAppId in the sample.');
  }

  /*
   * This is boilerplate code that is used to initialize
   * the Facebook JS SDK.  You would normally set your
   * App ID in this code.
   */

  // Additional JS functions here
  window.fbAsyncInit = function() {
    FB.init({
      appId      : fbAppId, // App ID
      status     : true,    // check login status
      cookie     : true,    // enable cookies to allow the
                            // server to access the session
      xfbml      : true     // parse page for xfbml or html5
                            // social plugins like login button below
    });

    // Put additional init code here
	FB.Event.subscribe('auth.authResponseChange', function(response) {
    // Here we specify what we do with the response anytime this event occurs. 
    if (response.status === 'connected') {
      // The response object is returned with a status field that lets the app know the current
      // login status of the person. In this case, we're handling the situation where they 
      // have logged in to the app.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // In this case, the person is logged into Facebook, but not into the app, so we call
      // FB.login() to prompt them to do so. 
      // In real-life usage, you wouldn't want to immediately prompt someone to login 
      // like this, for two reasons:
      // (1) JavaScript created popup windows are blocked by most browsers unless they 
      // result from direct interaction from people using the app (such as a mouse click)
      // (2) it is a bad experience to be continually prompted to login upon page load.
      FB.login();
    } else {
      // In this case, the person is not logged into Facebook, so we call the login() 
      // function to prompt them to do so. Note that at this stage there is no indication
      // of whether they are logged into the app. If they aren't then they'll see the Login
      // dialog right after they log in to Facebook. 
      // The same caveats as above apply to the FB.login() call here.
      FB.login();
    }
  });
  };
	
  // Load the SDK Asynchronously
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/all.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
   
function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('me?fields=id,name,gender,picture.type(large)', function(response) {
      console.log('Good to see you, ' + response.name + '.');
      console.log('Good to see you, ' + response.id + '.');
      console.log('Good to see you, ' + response.gender + '.'); 
      console.log('Good to see you, ' + response.picture.data.url + '.'); 
      console.log(response);
      $( ".fbFeed" ).after(display(response));
      })
    }
$(function() {
    $( "#draggable" ).draggable().resizeable();
  });
function display(response){
	$(".picture").append("<a title='profic-pic' target='_blank' href='" + response.picture.data.url + "'><img id="+"image"+" src='" + response.picture.data.url + "'></img></a>");
	$(".id").append("<p> "+response.id+"</p>");
	$(".name").append("<p> "+response.name+"</p>");
	$(".gender").append("<p> "+response.gender+"</p>");
}   
//End of function
