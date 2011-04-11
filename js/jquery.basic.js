var $al = jQuery.noConflict();

var round_corners = function(){
var str = '<b class="cn tl"></b><b class="cn tr"></b><b class="cn bl"></b><b class="cn br"></b>';
// Three lines below handle images
// $('img.round').wrap('<div class="round"></div>');//returns img element
// var floating = $('img.round').css("float");
// $('img.round').removeClass('round').css("float", "none").parent().css("float", floating);
$al('.round').addClass("boxc").append(str);
};

jQuery.fn.tabs=function(options){var settings={linkClass:'tabs',containerClass:'tab-content',linkSelectedClass:'selected',containerSelectedClass:'selected',onComplete:false}
jQuery.extend(settings,options);jQuery('.'+settings.linkClass).each(function(i){jQuery(this).attr('rel',settings.containerClass+i);});jQuery('.'+settings.containerClass).each(function(i){jQuery(this).attr('id',settings.containerClass+i);});jQuery('.'+settings.linkClass).bind('click',function(){jQuery('.'+settings.linkClass+'.'+settings.linkSelectedClass).removeClass(settings.linkSelectedClass);jQuery(this).addClass(settings.linkSelectedClass);jQuery('.'+settings.containerClass+'.'+settings.containerSelectedClass).removeClass(settings.containerSelectedClass);jQuery('#'+jQuery(this).attr('rel')).addClass(settings.containerSelectedClass);if(settings.onComplete){settings.onComplete();}
return false;});}



$al(document).ready(function(){
round_corners();

$al(".ads").css("opacity",0.3);
$al(".article:not(:last)").css('border-bottom','1px solid #CCC');
$al(".article:not(:first)").css('border-top','3px solid #EFEFEF');

/*
$("a.extend").click(function(event){
$('body').css('width', '1080px');
$('#body').css('width', '600px');
$('#sidebar').css('width', '478px');
});
*/


$al("#sidebar ul:first").hide();
$al("#sidebar h3:first").addClass("active");
$al("#sidebar ul:first").slideDown();
$al("#sidebar ul:not(:first)").hide();
$al("#sidebar h3").click(function(){
$al(this).stop().next("ul").slideToggle("slow")
.siblings("ul:visible").slideUp("slow");
$al(this).toggleClass("active");
$al(this).siblings("h3").removeClass("active");
});

});