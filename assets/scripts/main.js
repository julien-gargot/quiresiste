var supportsTouch = 'ontouchstart' in window || navigator.msMaxTouchPoints;
var startX = 0;
var startY = 0;
var ontasticX = true;
var ontasticY = true;
var leaveTouch = true;

jQuery(document).ready(function($) {

  // TABS
  // initTabsHome();
  initTabsQuiResiste();

  //
  initGalleries();

  // SCROLL
  initScroll();

});

function initTabsHome() {

  $('#home .content').each(function(i) {

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
        }).addClass('btn btn-default').html( $(this).html() )
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

function initTabsQuiResiste() {

  $('#qui .content').each(function(i) {

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

/*
 * SCROLL STUFF
 */

function initScroll() {
  if( supportsTouch ) {
    // $(window).on('touchstart', scrollYStart);
    // // $(window).on('scroll', scrollYStop);
    // $(window).on('touchend touchcancel', scrollYStop);
    // $('body > section').on('touchstart', scrollXStart);
    // // $('body > section').on('scroll',scrollXStop);
    // $('body > section').on('touchend touchcancel', scrollXStop);


      var posx, posy, ix, iy, dx, dy = 0;
      var stepx = $('article').width();
      var stepy = $('article').height();
      var s = 100;

      $(window).on({
        'touchstart': function(event) {
          ix = event.originalEvent.pageX;
          posx = $('#qui').scrollLeft();
          iy = event.originalEvent.pageY;
          posy = $('body').scrollTop();
        },
        'touchmove': function(event) {
          event.preventDefault();
          dx = ix - event.originalEvent.pageX;
          dy = iy - event.originalEvent.pageY;
        },
        'touchend': function(event) {

          if( $(event.target).parents('#qui').length > 0 ) {
            if( dx > s )
              $('#qui').animate({ scrollLeft: posx + stepx +"px" }, 200, "swing");
            else if( dx < -s )
              $('#qui').animate({ scrollLeft: posx - stepx +"px" }, 200, "swing");
          }

          if( dy > s )
            $('html, body').animate({ scrollTop: posy + stepy +"px" }, 200, "swing");
          else if( dy < -s )
            $('html, body').animate({ scrollTop: posy - stepy +"px" }, 200, "swing");
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

function scrollYStart(event) {
  // if( ontasticY && leaveTouch ) {
    console.log("vertical start", event);
    startY = $(event.currentTarget).scrollTop();
  // }
}

function scrollXStart(event) {
  // if( ontasticX && leaveTouch ) {
    console.log("horizontal start", event);
    startX = $(event.currentTarget).scrollLeft();
  // }
}

function scrollYStop(event) {

  console.log("vertical stop ("+ontasticX+"/"+ontasticY+"/"+leaveTouch+")", event);

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

  console.log("horizontal stop ("+ontasticX+"/"+ontasticY+"/"+leaveTouch+")", event);

  var value  = $(event.currentTarget).scrollLeft();
  var diff = Math.abs(startX - value);

  if( ontasticX && ontasticY && leaveTouch && diff > 0 ) {

    ontasticX = false;
    eaveTouch = false;

    var total  = $(event.currentTarget).width();
    var ratio  = Math.round( value / total );
    console.log("value",value);
    console.log("total",total);
    console.log("ratio",ratio);

    $(event.currentTarget).animate({ scrollLeft: ratio * total +"px" }, 500, "swing", function() {
      setTimeout(function(){ontasticX = true;leaveTouch = true;},1000);
    });

  }

}