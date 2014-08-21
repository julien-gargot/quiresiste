var supportsTouch = 'ontouchstart' in window || navigator.msMaxTouchPoints;
var startX = 0;
var startY = 0;
var ontastic = true;

jQuery(document).ready(function($) {

  if( supportsTouch ) {
    $(window).on('touchstart', scrollYStart);
    // $(window).on('touchend touchcancel',  scrollYStop);
    $(window).on('scrollstop', {latency: 650}, scrollYStop);
    $('body > section').on('touchstart', scrollXStart);
    // $('body > section').on('touchend touchcancel',  scrollXStop);
    $('body > section').on('scrollstop', {latency: 650}, scrollXStop);
  }
  else {
    $(window).on('scrollstart', {latency: 2000}, scrollYStart);
    $(window).on('scrollstop', {latency: 100}, scrollYStop);
    $('body > section').on('scrollstart', {latency: 2000}, scrollXStart);
    $('body > section').on('scrollstop', {latency: 100}, scrollXStop);
  }

});

function scrollYStart(event) {
  if( ontastic ) {
    console.log("vertical start", event);
    startY = $(event.currentTarget).scrollTop();
  }
}

function scrollYStop(event) {

  console.log("vertical stop ("+ontastic+")", event);

  var value  = $(event.currentTarget).scrollTop();
  var diff = Math.abs(startY - value);

  if( ontastic && diff > 0 ) {

    ontastic = false;

    var total  = $(event.currentTarget).height();
    var ratio  = Math.round( value / total );

    $('html, body').animate({ scrollTop: ratio * total +"px" }, 500, "swing", function() {
      setTimeout(function(){ontastic = true;},500);
    });

  }

}

function scrollXStart(event) {
  if( ontastic ) {
    console.log("horizontal start", event);
    startX = $(event.currentTarget).scrollLeft();
  }
}

function scrollXStop(event) {

  console.log("horizontal stop ("+ontastic+")", event);

  var value  = $(event.currentTarget).scrollLeft();
  var diff = Math.abs(startX - value);

  if( ontastic && diff > 0 ) {

    ontastic = false;

    var total  = $(event.currentTarget).width();
    var ratio  = Math.round( value / total );
    console.log("value",value);
    console.log("total",total);
    console.log("ratio",ratio);

    $(event.currentTarget).animate({ scrollLeft: ratio * total +"px" }, 500, "swing", function() {
      setTimeout(function(){ontastic = true;},500);
    });

  }

}