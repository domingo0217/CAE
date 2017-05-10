{{-- instanciando javascript --}}
<script type="text/javascript" src="/js/jquery-3.1.1.js"></script>
<script type="text/javascript" src="/js/script.js"></script>
{!! MaterializeCSS::include_js() !!}
@yield('quillScript')
<script type="text/javascript">
    // Initialize collapse button
    $(".button-collapse").sideNav();
    // Initialize collapsible (uncomment the line below if you use the dropdown variation)
    $('.collapsible').collapsible();
    //Initialize datepicker
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 200, // Creates a dropdown of 15 years to control year
        format: 'yyyy-mm-dd' //date format
    });
    //Initialize character counter
    $('input#input_text, textarea#textarea1').characterCounter();
    //Initialize tooltip
    $('.tooltipped').tooltip({delay: 50});
</script>
<script src="/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        selector : "#textarea",
        plugins: "lists advlist print",
        toolbar: ["undo redo | fontselect fontsizeselect | bold italic underline | alignleft aligncenter alignjustify alignright | bullist numlist | indent outdent"],
        height: 300
    });
</script>
