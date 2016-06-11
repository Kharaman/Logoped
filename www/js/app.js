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
        $('#second-select option').removeAttr('selected');
    });

    $('#group2').click(function(){

        $('#second-select').show();
        $('#first-select').hide();
        $('#first-select option').removeAttr('selected');

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

    if ($('input').is('#screen-search'))  {
        $('#screen-search').searchbox({
            url: '/speech_screen/ajax_search',
            param: 'q',
            dom_id: '#search-result',
            delay: 250,
            loading_css: '#spinner'
        });
    } else if ($('input').is('#children-search')) {
        $('#children-search').searchbox({
            url: '/children/ajax_search',
            param: 'q',
            dom_id: '#search-result',
            delay: 250,
            loading_css: '#spinner'
        });
        
    } else if ($('input').is('#plan-search')) {
        $('#plan-search').searchbox({
            url: '/individual_plan/ajax_search',
            param: 'q',
            dom_id: '#search-result',
            delay: 250,
            loading_css: '#spinner'
        });
    } else if ($('input').is('#speech_card-search')) {
        $('#speech_card-search').searchbox({
            url: '/speech_card/ajax_search',
            param: 'q',
            dom_id: '#search-result',
            delay: 250,
            loading_css: '#spinner'
        });
    } else if ($('input').is('#analysis-search')) {
        $('#analysis-search').searchbox({
            url: '/analysis/ajax_search',
            param: 'q',
            dom_id: '#search-result',
            delay: 250,
            loading_css: '#spinner'
        });
    } else if ($('input').is('#card-search')) {
        $('#card-search').searchbox({
            url: '/individual_card/ajax_search',
            param: 'q',
            dom_id: '#search-result',
            delay: 250,
            loading_css: '#spinner'
        });
    }

    

  

    $('.close-icon').click(function(){
        $(this).parent().children('input').val('').blur();
        $('#search-result').html('');
    });

    $('#wrapper').sidebar({

          // sidebar toggle
          toggler: '[data-toggle="sidebar"]',

          // CSS class for Wrapper when Sidebar is Collapsed
          minimized: 'minimized',

          // CSS class for Wrapper Transition
          animating: 'animating',

          // transition speed
          duration: 350,

          // auto collapse sidebar on small screens
          breakpoint: 2000
  
    });

    $('#side-wrapper .btn-canvas').click(function(){
        $('.mask').removeClass('active');
    });
    $('.content-wrapper .btn-canvas').click(function(){
        $('.mask').addClass('active');
    });

    $('.mask').click(function(){
        $('#side-wrapper .btn-canvas').click();
    });

    $('.modal-trigger').leanModal({
        opacity: .65,
    });


});