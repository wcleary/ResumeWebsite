$(document).ready(function(){
		
	var url ='https://api.instagram.com/oauth/authorize/?client_id=5f538ec0d0234bf99122d4dba3b9c0d5&redirect_uri=http://ix.cs.uoregon.edu/~kho3/test/index.php&response_type=token';
	var str = window.location.href;
	if(str.indexOf("access_token")>=0){
		var accesstoken = str.substring(str.indexOf("=")+1, str.length);
		var temp = accesstoken.split('.');
		var userid = temp[0];
		var accesstoken = accesstoken;
		var temp = accesstoken.split('.');
		var userid = temp[0];
		console.log(userid);
		console.log(accesstoken);
		
		jQuery.fn.spectragram.accessData = {
			accessToken: accesstoken,
			clientID: '5f538ec0d0234bf99122d4dba3b9c0d5'
		};
		$('.userFeed').spectragram('getRecentMedia', {
		//this gets adrianengine's photo feed
			userID: userid,
			size: 'medium',
			max:'20'});
		}else{
			$( ".userFeed" ).after( "<li class='item-thumbs instagram '><a title='Login' href='" + url + "'><img src='./_include/img/instagram2.png'></img></a>" );
		}
	/*$('.likedFeed').spectragram('getLiked', {
	//this gets adrianengine's photo feed
		size: 'medium',
		max:'10',
		wrapEachWith: '<span></span>'});
		
	//Get a list of what media is most popular at the moment.
	$('.popularFeed').spectragram('getPopular', {
		size: 'small',
		max:'5',
		wrapEachWith: '<span></span>',});
	//Get a list of recently tagged media
	$('.tagsFeed').spectragram('getRecentTagged', {
		query: 'converse', //this gets the recent photo feed tagged with the word: converse
		size: 'small',
		max:'1'});*/
}) ;