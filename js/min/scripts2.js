jQuery(function($){
   $(".formPhone").mask(" +7 (999) 999 99 99");
});

function showConfirm(data) {
	$(".form-submit").fadeOut();
	$(".confirm").text(data);
	$(".confirm").fadeIn();
	$(".overlay").height($(document).height());
	$(".overlay").fadeIn();
	$(".message-block").fadeIn();
	setTimeout(function(){
		$(".overlay").fadeOut();
		$(".message-block").fadeOut();
		$(".form-submit").fadeIn();
		$(".message-block .form-submit").fadeOut();
		$(".confirm").fadeOut();
	}, 3000);
}

$(".close-button").click(function(){
	$(".overlay").fadeOut();
	$(".message-block").fadeOut();
	$(".form-submit").fadeIn();
	$(".message-block .form-submit").fadeOut();
});

$(".overlay").click(function(){
	$(".overlay").fadeOut();
	$(".message-block").fadeOut();
	$(".form-submit").fadeIn();
	$(".message-block .form-submit").fadeOut();
});

$(".form-call").click(function(){
	$(".overlay").fadeIn();
	$(".overlay").height($(document).height());
	$(".message-block").fadeIn();
	$(".form-modal").fadeIn();
});

$(".kak-call").click(function(){
	$(".main-form").fadeIn();
	$(".main-form input[name='type']").val("как мы работаем");
});

$(".land-call").click(function(){
	$(".main-form").fadeIn();
	$(".main-form input[name='type']").val("как мы работаем");
});

$(".zakaz1-call").click(function(){
	$(".main-form").fadeIn();
	$(".main-form input[name='type']").val("базовый");
});
$(".zakaz2-call").click(function(){
	$(".main-form").fadeIn();
	$(".main-form input[name='type']").val("стандартный");
});
$(".zakaz3-call").click(function(){
	$(".main-form").fadeIn();
	$(".main-form input[name='type']").val("расширенный");
});

