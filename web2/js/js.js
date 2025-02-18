// JavaScript Document
function lo(th, url) {
	$.ajax(url, { cache: false, success: function (x) { $(th).html(x) } })
}


function to(x) {
	location.replace(x)
}