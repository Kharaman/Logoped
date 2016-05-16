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
});