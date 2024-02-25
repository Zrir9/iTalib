var windowWidth = $(window).width();


	
$(document).ready(function(){
	$(nav).hide();
    $('.hamburger').click(function() {
		$(nav).slideToggle("slow");
});
	/*let slideIndex = 1;
	const showCards = (n) => {
		var slides = document.getElementsByClassName("mySlides");
		console.log(slides.length);
		for(let i=0;i<slides.length;i++){
			slides[i].style.display = "none";
		}
		slides[n-1].style.display = "flex"
}
	showCards(slideIndex);
	$(function() {

    var $img = $('.mySlides');   // Cache your elements selector
    var c = 0; // counter // Represents the first image index to show
    var n = $img.length; // number of images
  
    $img.eq(c).siblings().hide(); // Target the 'c' one and hide it's siblings
  
    $('#prev, #next').click(function(){
       c = this.id=='next'? ++c : --c ;      // increase - decrease counter
       $img.css("display", "none").eq( c%n ).stop(1).css("display", "flex"); // Loop using reminder
    });
  
  });*/

	var para = document.getElementsByClassName("long-text")[0];
	var text = para.innerHTML;
	para.innerHTML = "";
	var words = text.split(" ");
	for (i = 0; i < 30; i++) {
	  para.innerHTML += words[i] + " ";
	}
	para.innerHTML += "...";

});
		 
		 