jQuery(document).ready(function($) {

  $(window).on('scrollstart', scrollYStart);
  $(window).on('scrollstop', scrollYStop);

  $('body > section').on('scrollstart', scrollXStart);
  $('body > section').on('scrollstop', scrollXStop);

});

function scrollYStart(event) {
  // console.log("vertical start", event);
  startY = $(event.currentTarget).scrollTop();
}

function scrollYStop(event) {
  // console.log("vertical stop", event);
  var value  = $(event.currentTarget).scrollTop();
  var total  = $(event.currentTarget).height();
  var ratio  = Math.round( value / total );

  $('html, body').animate({ scrollTop: ratio * total +"px" }, 200);
}

function scrollXStart(event) {
  // console.log("horizontal start", event);
  startX = $(event.currentTarget).scrollLeft();
}

function scrollXStop(event) {
  // console.log("horizontal stop", event);
  var value  = $(event.currentTarget).scrollLeft();
  var total  = $(event.currentTarget).width();
  var ratio  = Math.round( value / total );

  $(event.currentTarget).animate({ scrollLeft: ratio * total +"px" }, 200);
}