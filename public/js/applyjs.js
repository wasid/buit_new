$(document).ready(function(){
    
    //jumbotron
    var jumboHeight = $('.jumbotron').outerHeight();
    function parallax(){
        var scrolled = $(window).scrollTop();
        $('.bg').css('height', (jumboHeight-scrolled) + 'px');
    }
    
    $(window).scroll(function(e){
        parallax();
    });
    
    
    //datepicker
    $('.datepicker').datepicker({ dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true
    
    }).val();
    
    
    //search button
    $('#toggle-search').click(function(){
      $('.search-bar').slideToggle();
    });   
    
    $('#find').hover(function(){
      $('#search_all').show({width:'slide'},350);
    });
    
    $('#find_id').hover(function(){
      $('#search_id').show({width:'slide'},350);
    });

});