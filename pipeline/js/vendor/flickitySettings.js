/**
 *
 * Flickity.js settings
 * @author Peter Laxalt
 *
 */

function initSliders() {
  // Init our block-sliders
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

  // Init our collection-listing-sliders
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

  // Init our featured-product-sliders
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

  // Init our featured-news-sliders
  let featuredNewsSlider = document.querySelectorAll(
    ".featured-news-slider-el"
  );

  if (featuredNewsSlider.length > 0) {
    featuredNewsSlider.forEach(el => {
      new Flickity(el, {
        cellAlign: "left",
        prevNextButtons: false,
        fade: true,
        wrapAround: true,
        autoPlay: true
      });
    });
  }
}

initSliders();
