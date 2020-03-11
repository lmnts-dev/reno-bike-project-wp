"use strict";

/**
 *
 * Barba.js settings
 * @author Peter Laxalt
 * @see https://barba.js.org/docs/userguide/markup/
 *
 */
// basic default transition (with no rules and minimal hooks)
barba.init({
  transitions: [{
    leave: function leave(_ref) {// do something with `current.container` for your leave transition
      // then return a promise or use `this.async()`

      var current = _ref.current,
          next = _ref.next,
          trigger = _ref.trigger;
    },
    beforeEnter: function beforeEnter(_ref2) {
      var current = _ref2.current,
          next = _ref2.next,
          trigger = _ref2.trigger;
      // Scroll to top of page
      window.scrollTo(0, 0); // Re-init our Lazy Loading

      initLazyLoad(); // Re-init our bicycle wheel script.

      initBikeWheel(); // Re-init our sliders

      initSliders();
    }
  }]
}); // // dummy example to illustrate rules and hooks
// barba.init({
//   transitions: [{
//     name: 'dummy-transition',
//     // apply only when leaving `[data-barba-namespace="home"]`
//     from: 'home',
//     // apply only when transitioning to `[data-barba-namespace="products | contact"]`
//     to: {
//       namespace: [
//         'products',
//         'contact'
//       ]
//     },
//     // apply only if clicked link contains `.cta`
//     custom: ({ current, next, trigger })
//       => trigger.classList && trigger.classList.contains('cta'),
//     // do leave and enter concurrently
//     sync: true,
//     // available hooks…
//     beforeOnce() {},
//     once() {},
//     afterOnce() {},
//     beforeLeave() {},
//     leave() {},
//     afterLeave() {},
//     beforeEnter() {},
//     enter() {},
//     afterEnter() {}
//   }]
// });
"use strict";

/**
 *
 * Flickity.js settings
 * @author Peter Laxalt
 *
 */
function initSliders() {
  // Re-init our block-sliders
  var blockSliderElements = document.querySelectorAll(".block-slider-el");

  if (blockSliderElements.length > 0) {
    blockSliderElements.forEach(function (el) {
      new Flickity(el, {
        cellAlign: "left",
        prevNextButtons: false,
        fade: true,
        wrapAround: true,
        autoPlay: true
      });
    });
  } // Re-init our collection-listing-sliders


  var collectionListingsSliderElements = document.querySelectorAll(".collection-listings-slider-el");

  if (collectionListingsSliderElements.length > 0) {
    collectionListingsSliderElements.forEach(function (el) {
      new Flickity(el, {
        contain: true,
        cellAlign: "left",
        prevNextButtons: true,
        pageDots: false,
        freeScroll: true
      });
    });
  } // Re-init our featured-product-sliders


  var featuredProductsSlider = document.querySelectorAll(".featured-products-slider-el");

  if (featuredProductsSlider.length > 0) {
    featuredProductsSlider.forEach(function (el) {
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
"use strict";

/**
 *
 * Lazyload.js settings
 * @author Peter Laxalt
 * @see https://www.andreaverlicchi.eu/lazyload/
 *
 */
function initLazyLoad() {
  var lazyLoadInstance = new LazyLoad({
    elements_selector: ".lazy"
  });
}

initLazyLoad();
// Vendor Javascript File
"use strict";