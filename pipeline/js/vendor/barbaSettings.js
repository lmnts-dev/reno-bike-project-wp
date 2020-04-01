/**
 *
 * Barba.js settings
 * @author Peter Laxalt
 * @see https://barba.js.org/docs/userguide/markup/
 *
 */


// basic default transition (with no rules and minimal hooks)
barba.init({
  transitions: [
    {
      leave({ current, next, trigger }) {
        // do something with `current.container` for your leave transition
        // then return a promise or use `this.async()`
        hideNavOverlay();

        initNavOverlay();
      },
      beforeEnter({ current, next, trigger }) {
        // Scroll to top of page
        window.scrollTo(0, 0);

        // Re-init our Lazy Loading
        initLazyLoad();

        // Re-init our Search Overlay
        initSearchOverlay();

        // Re-init our bicycle wheel script.
        initBikeWheel();

        // Re-init remove item from cart
        initRemoveItem();

        // Re-init our number input value listener
        initInputNumberIcons();

        // Re-init our sliders
        initSliders();

        // Re-init social share buttons
        initSocialOverlay();

        // Re-init our video overlays
        initVideoOverlay();

        // Re-init the nav script
        initNavOverlay();
      }
    }
  ]
});

// // dummy example to illustrate rules and hooks
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
