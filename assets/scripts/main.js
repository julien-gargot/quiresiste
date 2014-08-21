var supportsTouch = 'ontouchstart' in window || navigator.msMaxTouchPoints;
var timer  = null;
var startX = 0;
var startY = 0;
var i = 0;

jQuery(document).ready(function($) {

  if( supportsTouch ) {
    $(window).on('touchstart', scrollYStart);
    $(window).on('touchend touchcancel',  scrollYStop);
    $('body > section').on('touchstart', scrollXStart);
    $('body > section').on('touchend touchcancel',  scrollXStop);
  }
  else {
    $(window).on('scrollstart', {latency: 2000}, scrollYStart);
    $(window).on('scrollstop', {latency: 2000}, scrollYStop);
    $('body > section').on('scrollstart', {latency: 2000}, scrollXStart);
    $('body > section').on('scrollstop', {latency: 2000}, scrollXStop);
  }

});

function resetTimer() {
  console.log("[resetTimer]");
  clearTimeout(timer);
  timer = null;
}

function scrollYStart(event) {
  console.log("vertical start", event);
  resetTimer();
  startY = $(event.currentTarget).scrollTop();
}

function scrollYStop(event) {
  console.log("vertical stop", event);

  var value  = $(event.currentTarget).scrollTop();
  var total  = $(event.currentTarget).height();
  var ratio  = Math.round( value / total );
  var posY   = ratio * total;

  if( Math.abs(value - startY) > 100 ) {
    resetTimer();
    scrollY(event, posY);
  }
  else if( timer == null ) {
    timer = setTimeout( function(){
      scrollY(event, posY);
    }, 300);
  }
}

function scrollY(event, posY) {
  $('html, body').animate({ scrollTop: posY +"px" }, 500, "swing", function() {
    resetTimer();
  });
}

function scrollXStart(event) {
  console.log("horizontal start", event);
  resetTimer();
  startX = $(event.currentTarget).scrollLeft();
}

function scrollXStop(event) {
  console.log("horizontal stop", event);
  var value  = $(event.currentTarget).scrollLeft();
  var total  = $(event.currentTarget).width();
  var ratio  = Math.round( value / total );

  // console.log("-------------------- " + i); i++;
  // console.log("start at " + startX + ", value = " + value + ', diff = '+ (value - startX) );

  if( Math.abs(value - startX) > 100 ) {
    console.log("large");
    resetTimer();
    console.log("> start anime h");
    $(event.currentTarget).animate({ scrollLeft: ratio * total +"px" }, 500, "swing", function(){

    });
  }
  else if( timer == null ) {
    console.log("small");
    timer = setTimeout( function(){
      console.log("> start anime h (after timeout)");
      $('html, body').animate({scrollLeft: ratio * total +"px"}, 500, "swing", function() {
        resetTimer();
      });
    }, 300);
  }
}