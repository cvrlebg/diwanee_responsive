$(function(){
    $('#media_kit').hide();
    
    $('#tabs').bind('click', function(event){
        event.preventDefault();
        
        var obj = event.target;
        var link = obj.href;
        var hasPos = link.indexOf('#');
        var id = link.substr(hasPos);
        
        //add or remove class
        $(this).children().removeClass('active');
        $(obj).addClass('active');
        
        //show or hide
        var parent = $(this).parent();
        $('#'+parent[0].id + ' article').hide(); 
        $(id).show();
    });
    
    
    //brand menu slide
    var ul_width = 0;
    var diff; 
    var left;
    
    $.each($('#brands_menu li'), function(key, value){
        ul_width += $(this).width();        
    });
    
    var parent = $('#brands_menu').parent().width();
    ul_width = ul_width - 145;
    
    $('#brands_menu').css('width', ul_width);
    
    $('#arrow_more').bind('click', function(e){
        
        e.preventDefault();
        
        var position = $('#brands_menu').css('left');
        var pxPos = position.indexOf('px');
        position = position.substr(1,pxPos-1);        
        
        var division = parseInt(ul_width) / parseInt(parent);
        
        if(position === ''){
            diff = parseInt(parent) * Math.round(division);
        } else{
            diff = parseInt(ul_width) - parseInt(position) - parseInt(parent);
        }
        
        console.log('diff '+diff);
        
        if(position === ''){
            left = parent;
            
        } else if(diff > parent){
            left = parseInt(position) + parseInt(parent);
            
        } else if((parent > diff) && (diff > 0)){
           left = parseInt(position) + parseInt(diff);
           
        } else{
            left = 0;
        }
        
       $('#brands_menu').animate({
         left: '-' + left + 'px'
       });
        
    });
    
});
