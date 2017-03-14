{{-- instanciando javascript --}}
<script type="text/javascript" src="../js/jquery-3.1.1.js"></script>
{!! MaterializeCSS::include_js() !!}

{{-- Inicializando funciones de materilize --}}
<script type="text/javascript">
	// Initialize collapse button
	$(".button-collapse").sideNav();
	// Initialize collapsible (uncomment the line below if you use the dropdown variation)
	$('.collapsible').collapsible();
	//Initialize datepicker
	$('.datepicker').pickadate({
	    selectMonths: true, // Creates a dropdown to control month
	    selectYears: 200, // Creates a dropdown of 15 years to control year
		format: 'dd-mm-yyyy' //date format
	});
	//Initialize select
	$('select').material_select();
	//Initialize character counter
	$('input#input_text, textarea#textarea1').characterCounter();
</script>
