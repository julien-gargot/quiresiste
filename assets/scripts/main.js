var supportsTouch = 'ontouchstart' in window || navigator.msMaxTouchPoints;
var startX = 0;
var startY = 0;
var ontasticX = true;
var ontasticY = true;
var leaveTouch = true;

jQuery(document).ready(function($) {

  // TABS
  initTabs();

  // SCROLL
  initScroll();

});

function initTabs() {

  $('section:nth-of-type(2) article [class*="container"]').each(function(i) {

    var _this = $(this);
    var $navtabs = $('<nav>').append( $('<ul>').addClass('nav nav-tabs').attr('role','tablist') );
    var $tabs = $('<div>').attr('class','tab-content');

    $('h3', _this).each(function(j) {

      var id = 'tab-'+i+'-'+j;

      var $tab = $('<div>').attr('id',id).addClass('tab-pane');

      var $a = $('<li>').append(
        $('<a>').attr({
          'href':'#'+id,
          'role':"tab",
          'data-toggle':"tab"
        }).html( $(this).html() )
      );

      if( j==0 ) {
        $tab.addClass('active');
        $a.addClass('active');
      }

      $(this)
        .nextUntil( "h3" )
        .appendTo( $tab );

      $('ul', $navtabs).append( $a );
      $tabs.append( $tab );

      $(this).remove();

    });

    _this.append( $navtabs );
    _this.append( $tabs );

  });

}


function initScroll() {
  if( supportsTouch ) {
    $(window).on('touchstart', scrollYStart);
    // $(window).on('scroll', scrollYStop);
    $(window).on('touchend touchcancel', scrollYStop);
    $('body > section').on('touchstart', scrollXStart);
    // $('body > section').on('scroll',scrollXStop);
    $('body > section').on('touchend touchcancel', scrollXStop);
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