$(document).ready(function() {
	var $loginButton = $("#login button");
	var $loginUl = $("#login ul");

	var $registerButton = $("#register");
	var $registerUl = $("#register ul");



	$loginButton.click(function() {
		$loginUl.slideToggle();
	});

	$(window).resize(function() {
		$("#login ul").css('display', '');
	});

});