/**
 *
 * Flickity.js settings
 * @author Peter Laxalt
 *
 */

// Re-init our block-sliders
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

// Re-init our collection-listing-sliders
let collectionListingsSliderElements = document.querySelectorAll(
  ".collection-listings-slider-el"
);

if (collectionListingsSliderElements.length > 0) {
  collectionListingsSliderElements.forEach(el => {
    new Flickity(el, {
      contain: true,
      cellAlign: "left",
      prevNextButtons: true,
      pageDots: false,
      freeScroll: true
    });
  });
}
