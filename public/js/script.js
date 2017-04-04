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
    //civil status
    var civil_status = $('#oldCivilStatus').val();
    $('#civil_status').val(civil_status);

    //gender
    var gender = $('#oldGender').val();
    $('#gender').val(gender);

    //city
    var city = $('#oldCity').val();
    $('#city').val(city);

    //delegation
    var delegation = $('#oldDelegation').val();
    $('#delegation').val(delegation);

    //status
    var status = $('#oldStatus').val();
    $('#status').val(status);

    //Initialize select
    $('select').material_select();
});
