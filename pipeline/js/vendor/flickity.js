/**
 *
 * Flickity.js settings
 * @author Peter Laxalt
 *
 */

// Re-init our sliders
let blockSliderElements = document.querySelectorAll(".block-slider-el");

if (blockSliderElements.length > 0) {
  blockSliderElements.forEach(el => {
    new Flickity(el, {
      cellAlign: "left",
      prevNextButtons: false,
      fade: true,
      wrapAround: true,
      autoPlay: true
    });
  });
}

// var flkty = new Flickity(elem, {
//   cellAlign: "left",
//   prevNextButtons: false,
//   fade: true,
//   wrapAround: true,
//   autoPlay: true
// });
