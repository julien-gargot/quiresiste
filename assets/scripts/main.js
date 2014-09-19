var supportsTouch = 'ontouchstart' in window || navigator.msMaxTouchPoints;
var startX = 0;
var startY = 0;
var ontasticX = true;
var ontasticY = true;
var leaveTouch = true;
var stepx = 0;
var stepy = 0;
var _audio = {path:null,player:null};

jQuery(document).ready(function($) {

  console.log("version 3");

  //
  initClickIOS();

  // TABS
  initTabs();

  //
  initGalleries();

  // SCROLL
  initScroll();
  initHomeNavClick();

  // AUDIO PLAYER
  initSound();

});

function initClickIOS() {

  // Open links with javascript for standalone app.
  $('body').on('click', 'a', function(event) {
    event.preventDefault();
    /* Act on the event */
    if( $(this).attr("href") )
      window.location.href = $(this).attr("href");
  });

}

function initTabs() {

  $('.tabulize').each(function(i) {

    var _this = $(this);
    var $navtabs = $('<nav>').append( $('<ul>').addClass('nav nav-pills').attr('role','tablist') );
    var $tabs = $('<div>').attr('class','tab-content');

    $('h3', _this).each(function(j) {

      var id = 'tab-'+i+'-'+j;

      var $tab = $('<div>').attr('id',id).addClass('tab-pane fade');

      var $a = $('<li>').append(
        $('<a>').attr({
          'href':'#'+id,
          'role':"tab",
          'data-toggle':"tab"
        }).addClass('btn btn-primary').html( $(this).html() )
      );

      if( j==0 ) {
        $tab.addClass('active in');
        $a.addClass('active');
      }

      $(this)
        .nextUntil( "h3" )
        .appendTo( $tab );

      $('ul', $navtabs).append( $a );
      $tabs.append( $tab );

      $(this).remove();

    });

    $(_this)
      .append( $navtabs )
      .append( $tabs );

  });

}

function initGalleries() {
  $('a[data-toggle="modal"]').on('click', function(event) {
    var src =    $(this).attr('data-src');
    var target = $(this).attr('data-target');
    console.log(src);
    $(target + ' iframe').attr({'src':src});
  });
  $('.modal').on('hidden.bs.modal', function (e) {
    $(this).find("iframe").attr({'src':''});
  });
}

function initSound() {

  $('.audio-link').on('click', function(event) {

    if( $("#sound-play-pause").hasClass('invisible') )
      $("#sound-play-pause").removeClass('invisible').addClass('visible');

    var path = $(this).attr("data-target");

    if( _audio.path != path ) {
      if( _audio.player && !_audio.player.paused ) {
        _audio.player.pause();
      }
      _audio.path   = path;
      _audio.player = new Audio(path);
      $('.audio-link').removeClass('sound-selected');
      $('*[data-target="'+_audio.path+'"]').addClass('sound-selected');
    }


    if( _audio.player && _audio.player.paused ) {
      _audio.player.play();
      $('.audio-link').removeClass('sound-playing');
      $('*[data-target="'+_audio.path+'"]').addClass('sound-playing');
    }
    else {
      _audio.player.pause();
      $('*[data-target="'+_audio.path+'"]').removeClass('sound-playing');
    }

  });

  $("#sound-play-pause").click(function(event) {

    if( _audio.player && _audio.player.paused ) {
      _audio.player.play();
      $('*[data-target="'+_audio.path+'"]').addClass('sound-playing');
    }
    else {
      _audio.player.pause();
      $('*[data-target="'+_audio.path+'"]').removeClass('sound-playing');
    }

  });

}

function initHomeNavClick() {

  $('#home nav').on('click', 'a', function(event) {
    event.preventDefault();
    event.stopPropagation();
    var target = $(this).attr("href");
    if( target == "#abc")
      moveCamera(0,2);
    else {
      var index  = $(target).index();
      moveCamera(index,1);
    }
  });

}

/*
 * SCROLL STUFF
 */

function initScroll() {

  stepx = $('article').width();
  stepy = $('article').height();

  $(window).on('resize', function () {
    stepx = $('article').width();
    stepy = $('article').height();
  });


  if( supportsTouch ) {

    var ix, iy, dx = 0, dy = 0;
    var s = 100;
    var nx = ny = 0;

    $('body').on('hidden.bs.modal', '.modal', function () {
      moveCamera(nx,ny);
    });

    $('#home, #qui, #abc').on({
      'touchstart': function(event) {
        console.log('touchstart');
        dx = 0;
        dy = 0;
        ix = event.originalEvent.pageX;
        iy = event.originalEvent.pageY;
        nx = Math.floor( $('#qui').scrollLeft() / stepx );
        ny = Math.floor( $('body').scrollTop() / stepy );
      },
      'touchmove': function(event) {
        console.log('touchmove');
        event.preventDefault();
        dx = ix - event.originalEvent.pageX;
        dy = iy - event.originalEvent.pageY;
      },
      'touchend': function(event) {
        console.log('touchend');
        console.log('dx',dx);
        console.log('dy',dy);

        if( dx > s && ny == 1 ) {
          if( nx < $('#qui > article').length ) {
            nx ++;
            moveCamera(nx,ny);
          }
        } else if( dx < -s && ny == 1 ) {
          if( nx > 0 ) {
            nx --;
            moveCamera(nx,ny);
          }
        } else if( dy > s ) {
          if( ny < 3 ) {
            ny ++;
            moveCamera(nx,ny);
          }
        } else if( dy < -s ) {
          if( ny > 0 ) {
            ny --;
            moveCamera(nx,ny);
          }
        }

        dx = 0;
        dy = 0;
        console.log("["+nx+','+ny+"]");
      }
    });

  }
  else {
    $(window).on('scrollstart', {latency: 2000}, scrollYStart);
    $(window).on('scrollstop', {latency: 100}, scrollYStop);
    $('body > section').on('scrollstart', {latency: 2000}, scrollXStart);
    $('body > section').on('scrollstop', {latency: 100}, scrollXStop);
  }
}

function moveCamera(x,y) {
  console.log( 'goto: ['+x+','+y+']' );
  $('#qui').animate({ scrollLeft: (x * stepx) +"px" }, 500, "swing");
  $('html, body').animate({ scrollTop: (y * stepy) +"px" }, 500, "swing");

  // $('#qui').css({ 'transform': 'translateX('+ (-x * stepx) +"px)", });
  // $('body').css({ 'transform': 'translateY('+ (-y * stepy) +"px)", });

  // console.log( 'new x = '+ (-x * stepx) );
  // console.log( 'new y = '+ (-y * stepy) );

}

function shakeCamera(x,y) {

}

function scrollYStart(event) {
  // if( ontasticY && leaveTouch ) {
    // console.log("vertical start", event);
    startY = $(event.currentTarget).scrollTop();
  // }
}

function scrollXStart(event) {
  // if( ontasticX && leaveTouch ) {
    // console.log("horizontal start", event);
    startX = $(event.currentTarget).scrollLeft();
  // }
}

function scrollYStop(event) {

  // console.log("vertical stop ("+ontasticX+"/"+ontasticY+"/"+leaveTouch+")", event);

  var value  = $(event.currentTarget).scrollTop();
  var diff = Math.abs(startY - value);

  if( ontasticX && ontasticY && leaveTouch && diff > 0 ) {

    ontasticY = false;
    leaveTouch = false;

    var total  = $(event.currentTarget).height();
    var ratio  = Math.round( value / total );

    $('html, body').animate({ scrollTop: ratio * total +"px" }, 500, "swing", function() {
      setTimeout(function(){ontasticY = true;leaveTouch = true;},1000);
    });

  }

}

function scrollXStop(event) {

  // console.log("horizontal stop ("+ontasticX+"/"+ontasticY+"/"+leaveTouch+")", event);

  var value  = $(event.currentTarget).scrollLeft();
  var diff = Math.abs(startX - value);

  if( ontasticX && ontasticY && leaveTouch && diff > 0 ) {

    ontasticX = false;
    eaveTouch = false;

    var total  = $(event.currentTarget).width();
    var ratio  = Math.round( value / total );
    // console.log("value",value);
    // console.log("total",total);
    // console.log("ratio",ratio);

    $(event.currentTarget).animate({ scrollLeft: ratio * total +"px" }, 500, "swing", function() {
      setTimeout(function(){ontasticX = true;leaveTouch = true;},1000);
    });

  }

}