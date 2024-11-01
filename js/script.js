// JavaScript Document
jQuery(document).ready(function() {
   jQuery('.ytSubLinkLocker').click(function(){
	var locked_link = jQuery(this).attr("yt_link");
	window.open('http://subscribetodownload.net/files/'+locked_link,'_blank','width=600,height=525,top=100,left=300,location=yes')
	});
});