$(function(){
    var ul_width = 0;
    var diff; 
    var left;
    
    $.each($('.playlist li'), function(key, value){
        ul_width += $(this).outerWidth(true);             
    });
    
    $('.playlist').width(ul_width);
    
    $("#right_arrow").unbind('click');
    $('#right_arrow').bind('click', function(e){
        
        e.preventDefault();
        
        var parent = $('.playlist').parent().width();
        var position = $('.playlist').css('left');
        
        var pxPos = position.indexOf('px');
        position = position.substr(1, pxPos - 1);

        var division = parseInt(ul_width) / parseInt(parent);

        if (position === '') {
            diff = parseInt(parent) * Math.round(division);
        } else {
            diff = parseInt(ul_width) - parseInt(position) - parseInt(parent);
        }

        if (position === '') {
            left = parent;

        } else if (diff > parent) {
            left = '-' + (parseInt(position) + parseInt(parent));

        } else if ((parent > diff) && (diff > 0)) {
            left = '-' + (parseInt(position) + parseInt(diff));

        } else {
            left = 10;
        }

        $('.playlist').animate({
            left: left + 'px'
        });

    });
    
    $("#left_arrow").unbind('click');
    $('#left_arrow').bind('click', function(e){
        
        e.preventDefault();
        
        var parent = $('.playlist').parent().width();
        var position = $('.playlist').css('left');
        
        var pxPos = position.indexOf('px');
        position = position.substr(0, pxPos);

        var division = parseInt(ul_width) / parseInt(parent);

        if (position === '10') {
            diff = parseInt(parent) * Math.round(division);
        } else {
            diff = parseInt(ul_width) - parseInt(position) - parseInt(parent);
        }

        if (position === '10') {
            left = position;

        } else if (diff > parent) {
            left = (parseInt(parent) + parseInt(position));

        } else if ((parent < diff) && (diff < 0)) {
            left = (parseInt(position) + parseInt(diff));

        } else {
            left = 10;
        }

        $('.playlist').animate({
            left: left + 'px'
        });

    });
    
    //player type
    $('#player_type').unbind('click');
    $('#player_type').bind('click', function(){
        window.location.href = window.location.pathname + '?player_type=' + $(this).val();
    });
});

//check if object is empty
function isEmpty(ob){
    for(var i in ob){ return false;}
    return true;
}

function videoLoad(playerId){
    var kdp = $('#' + playerId).get(0);
    //console.log(kdp.playNextItem());
    console.log('Loaded');
    
    var videoType = mw.getConfig('KalturaSupport.LeadWithHTML5');    
}

function videoPlay() {
    console.log('Played.');
    $(".playlist_container").removeClass('show_playlist');    
    clearInterval(0);
}

function videoPause(){
    console.log('pause');
}

function videoEnd(playerId){
    var interval;
    var entryId;
    var entryUrl;
    var id;
    var state = {};
    console.log('end.');
    $(".playlist_container").addClass('show_playlist');  
    
    var kdp = $('#' + playerId).get(0);
        
    //var videoType = mw.getConfig('KalturaSupport.LeadWithHTML5');
    var currentEntry = kdp.evaluate('{mediaProxy.entry.id}');
    
    var nextEntry = $('li.active_video').next();
    entryId = $('li.active_video').next().children('a').attr('data-entryid');
    entryUrl = $('li.active_video').next().children('a').attr('href');
    id = $('li.active_video').next().parent().attr('id');
    
    if(entryId == undefined){
        entryId = $('.playlist li').first().children('a').attr('data-entryid');
        entryUrl = $('.playlist li').first().children('a').attr('href');
        nextEntry = $('.playlist li').first();
        id = $('li.active_video').first().parent().attr('id');        
    } 
    
    kdp.sendNotification('changeMedia', {'entryId': entryId}); 
   
    //timer
    $('.timer').addClass('show_timer');
    var interval = setInterval(function(){ 
        var count = parseInt($('.timer').find('span').html());
        
        if(count > 0){
            $('.timer').find('span').html(count - 1);            
        } else{
            clearInterval(interval);
            $('.timer').find('span').html('10');
            $('.timer').removeClass('show_timer');
        }
        
        }, 2000);
    
    
    //change video
    miliseconds = 10000;
    //console.log('miliseconds ' + miliseconds);
    timeout = setTimeout(function(){
        kdp.sendNotification('doPlay'); 
        
        /*$('li.thumb').removeClass('active_video');
        nextEntry.addClass('active_video');
        
        state[ id ] = entryUrl;
        $.bbq.pushState(state);
        
        clearInterval(0);*/ }, 10000);
    
    //console.log('timeout 2 '+timeout);
    
}

function timer(obj){
    var val = parseInt(obj.html());
    console.log('val ' + val);
    
    obj.html(val - 1);
    
    if ($('.timer').find('span').html() === '2') {
        console.log('in');
        clearInterval(0);
    }
}

function startTimeout(){
    
}