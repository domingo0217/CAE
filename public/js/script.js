//--------------------------------------------------------------------
//animation for status messages
$(document).ready(setTimeout(function(){
    $('#message').css({'opacity' : '0'});
    setTimeout(function() {
        $('#message').hide();
    },400);
},6000));

//validating telephone input
function isNumberKey(evt)
{
  var charCode = (evt.which) ? evt.which : event.keyCode;
    if ( charCode != 45 && charCode > 31
    && (charCode < 48 || charCode > 57))
     return false;

  return true;
}

//--------------------------------------------------------------------
$(document).ready(function(){
    //activating the select when validation fails
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

    //activating checkboxes when validation fails and when editing member
    $("input[name='document_member']").each(function(){
        var documents = $(this).val();
        var documentSelected = $('#document\\['+documents+'\\]').val();
        if(documents == documentSelected)
        {
            $('#document\\['+ documents +'\\]').attr('checked', true);
        }
    });

    //activating radius button when validating and when editing
    $("input[name='payment']").each(function(){
        var pagos = $('#pagos').val();
        if(pagos == $(this).val())
        {
            $(this).attr('checked', true);
        }
    });


});
