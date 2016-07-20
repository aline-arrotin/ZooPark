(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();

  }); // end of document ready
})(jQuery); // end of jQuery name space


//Datepicker

  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 10 // Creates a dropdown of 15 years to control year
  });


//Disabled

$("#test5").on("click", function(){
	//alert("clik");
	if(this.checked) {
		$("#icon_telephone").removeAttr("disabled");
	} else {
    
    $("#icon_telephone").attr("disabled",true);
	}
    
});