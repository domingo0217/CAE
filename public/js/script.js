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

    //charge_member
    var charge_member = $('#oldMember').val();
    $('#members').val(charge_member);

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

    //activating radius button when validating and when editing id
    $("input[name='idoc']").each(function(){
        var id = $('#idoc').val();
        if(id == $(this).val())
        {
            $(this).attr('checked', true);
        }
    });

});

//------------------------------------------------------------------------

//activating validation in id depending on radius button
if( $('#idoc1').is(':checked') == true )
{
    $('#id').attr('data-length', 11);
    $('#id').attr('maxlength', 11);
    $('#id').attr('minlength', 11);
}
if( $('#idoc2').is(':checked') == true )
{
    $('#id').attr('data-length', 9);
    $('#id').attr('maxlength', 9);
    $('#id').attr('minlength', 9);
}

$('#idoc1').on('click', function(){
    $('#id').attr('data-length', 11);
    $('#id').attr('maxlength', 11);
    $('#id').attr('minlength', 11);
});

$('#idoc2').on('click', function(){
    $('#id').attr('data-length', 9);
    $('#id').attr('maxlength', 9);
    $('#id').attr('minlength', 9);
});
