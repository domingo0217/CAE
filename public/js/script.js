//--------------------------------------------------------------------
//animation for status messages
$(document).ready(setTimeout(function(){
    $('#message').css({'opacity' : '0'});
    setTimeout(function() {
        $('#message').hide();
    },400);
},3000));

//--------------------------------------------------------------------
//activating the select when validation fails
$(document).ready(function(){
    $('#oldCivilStatus').css({'display' : 'none'});
    // $('#oldCivilStatus').wrap( "<span>" );
    var civil_status = $('#oldCivilStatus').text();
    $('#civil_status').val(civil_status);
});
