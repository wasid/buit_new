$(document).ready(function(){

    var jumboHeight = $('.jumbotron').outerHeight();
    function parallax(){
        var scrolled = $(window).scrollTop();
        $('.bg').css('height', (jumboHeight-scrolled) + 'px');
    }
    
    $(window).scroll(function(e){
        parallax();
    });

    $('.datepicker').datepicker({ dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true
    
    }).val();

    $('#toggle-search').click(function(){
       $(this).next().slideToggle();
    });
});