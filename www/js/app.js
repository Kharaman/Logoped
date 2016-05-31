$(document).ready(function() {
    $('select').material_select();
    $(".tab_item").not(":first").hide();

    $(".wrapper .tab").click(function() {
        $(".wrapper .tab").removeClass("active").eq($(this).index()).addClass("active");
        $(".tab_item").hide().eq($(this).index()).fadeIn()
    }).eq(0).addClass("active");
    $(".button-collapse").sideNav();

$('#description').trigger('autoresize');

    if ($('#group1').prop('checked') === true)
    {
        $('#first-select').show();
        $('#second-select').hide();
    }
    else
    {
        $('#first-select').hide();
        $('#second-select').show();
    }

    $('#group1').click(function(){
        $('#first-select').show();
        $('#second-select').hide();
    });

    $('#group2').click(function(){
        $('#first-select').hide();
        $('#second-select').show();
    });

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year
        format: 'yyyy-mm-dd'
    });

    $('.timepicker').lolliclock({hour24:true});

    $("#upload-file").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function(){ // set image data as background of div
                $(".image-preview").css("background-image", "url("+this.result+")");
            }
        }
    });
});