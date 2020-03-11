/**
 *
 * Flickity.js settings
 * @author Peter Laxalt
 *
 */

function initSliders() {
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

  // Re-init our featured-product-sliders
  let featuredProductsSlider = document.querySelectorAll(
    ".featured-products-slider-el"
  );

  if (featuredProductsSlider.length > 0) {
    featuredProductsSlider.forEach(el => {
      new Flickity(el, {
        cellAlign: "left",
        prevNextButtons: true,
        pageDots: false,
        wrapAround: true,
        autoPlay: true
      });
    });
  }
}

initSliders();
