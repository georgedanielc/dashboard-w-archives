/* Credit: http://www.templatemo.com */
    
$(document).ready( function() {        

	// sidebar menu click
	$('.templatemo-sidebar-menu li.sub a').click(function(){
		if($(this).parent().hasClass('open')) {
			$(this).parent().removeClass('open');
		} else {
			$(this).parent().addClass('open');
		}
	});  // sidebar menu click

}); // document.ready
 $('#idTourDateDetails').datepicker({
   dateFormat: 'dd-mm-yy',
   minDate: '+5d',
   changeMonth: true,
   changeYear: true,
   altField: "#idTourDateDetailsHidden",
   altFormat: "yy-mm-dd"
 });
