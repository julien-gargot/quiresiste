function FullScreenBackground(theItem){
var winWidth=$(window).width();
var winHeight=$(window).height();
var imageWidth=$(theItem).width();
var imageHeight=$(theItem).height();
var picHeight = imageHeight / imageWidth;
var picWidth = imageWidth / imageHeight;
if ((winHeight / winWidth) < picHeight) {
$(theItem).css("width",winWidth);
$(theItem).css("height",picHeight*winWidth);
} else {
$(theItem).css("height",winHeight);
$(theItem).css("width",picWidth*winHeight);
};
$(theItem).css("margin-left",winWidth / 2 - $(theItem).width() / 2);
$(theItem).css("margin-top",winHeight / 2 - $(theItem).height() / 2);
}

window.onload = function () {
FullScreenBackground('#bgimg');
}
$(window).resize(function() {
FullScreenBackground('#bgimg');
});
