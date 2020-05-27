"use strict";

function initMaps() {
  var api = document.querySelector("body").getAttribute('data-google-api');
  var googleLink = "https://maps.googleapis.com/maps/api/js?key=" + api;
  var script = document.createElement('script');
  script.type = 'text/javascript';
  script.src = googleLink;
  console.log(script);
  document.body.appendChild(script);
  script.onload = mapImplementation();
  script.onreadystatechange = mapImplementation();

  function mapImplementation() {
    var mapSections = document.querySelectorAll(".map-el");

    for (var i = 0; i < mapSections.length; i++) {
      var sectionId = mapSections[i].id;
      var sectionZoom = parseInt(mapSections[i].getAttribute('data-zoom'));
      var sectionLat = parseInt(mapSections[i].getAttribute('data-lat'));
      var sectionLng = parseInt(mapSections[i].getAttribute('data-lng'));
      var sectionAddress = mapSections[i].getAttribute('data-address');
      var mapsLink = 'https://www.google.com/maps/place/' + sectionAddress.replace(/\./g, '+').replace(/ /g, "+") + '/@' + sectionLat + ',' + sectionLng + ',17z';
      var infoBoxHtml = '<p class="maps-addy">' + sectionAddress.replace(/\./g, '<br/>') + '</p><a class="btn btn-clr-black btn-arrow" href="' + mapsLink + '" target="_blank">Directions</a>';
      initMap(sectionId, sectionZoom, sectionLat, sectionLng, infoBoxHtml);
    }
  }

  function initMap(id, zoom, lat, lng, addy) {
    if (google) {
      var map = new google.maps.Map(document.getElementById(id), {
        zoom: zoom,
        center: {
          lat: lat,
          lng: lng
        }
      });
      var marker = new google.maps.Marker({
        position: {
          lat: lat,
          lng: lng
        },
        map: map
      }); // Create info window.

      var infowindow = new google.maps.InfoWindow({
        content: addy
      }); // Show info window when marker is clicked.

      google.maps.event.addListener(marker, 'click', function () {
        infowindow.open(map, marker);
      });
    }
  }
}

initMaps();
"use strict";

/*
 ** @author: Peter Laxalt
 ** @description: Super simple custom cursor library.
 */
function initCursor() {
  var cursor = document.querySelector(".cursor");
  var cursorOutline = document.querySelector(".cursor-outline");

  function setCursorPosition(e) {
    cursor.setAttribute("style", "opacity: 1; transform: translate(" + e.clientX + "px," + e.clientY + "px)");
    cursorOutline.setAttribute("style", "opacity: 1; transform: translate(" + e.clientX + "px," + e.clientY + "px)");
  }

  document.addEventListener("mousemove", setCursorPosition, false);
}

initCursor();
// App Javascript File
"use strict";
"use strict";

/*
 ** @author: Alisha Garric
 ** @description: Adds masonry to memberships
 */
function initMasonry() {
  var elem = document.querySelector('.membership-listings-inner');

  if (elem) {
    var msnry = new Masonry(elem, {
      columnWidth: '.grid-sizer',
      itemSelector: '.membership-listing-card',
      percentPosition: true
    });
  }
}

initMasonry();
"use strict";

/*
 ** @author: Peter Laxalt
 ** @description: Functions to show/hide the navigation overlay.
 */
var navigationBtnClass = "nav-overlay-toggle";
var navigationOverlayClass = "overlay-nav-container";
var navigationOverlay = document.getElementsByClassName(navigationOverlayClass)[0];

function toggleNavOverlay(e) {
  if (navigationOverlay.classList.contains("visible")) {
    // console.log("CLOSE!");
    document.body.classList.remove("scroll-lock");
    navigationOverlay.classList.remove("visible");
    document.getElementsByTagName("header")[0].classList.remove("hidden");
  } else {
    // console.log("SHOW!");
    document.body.classList.add("scroll-lock");
    navigationOverlay.classList.add("visible");
    document.getElementsByTagName("header")[0].classList.add("hidden");
  }
}

function initNavOverlay() {
  document.addEventListener("click", function (event) {
    // If the clicked element doesn't have the right selector, bail
    if (!event.target.classList.contains(navigationBtnClass)) {
      // console.log("WRONG TARGET");
      return;
    } else {
      // Don't follow the link
      event.preventDefault(); // Log the clicked element in the console

      toggleNavOverlay(event);
    }
  }, false);
}

initNavOverlay();
"use strict";

/*
 ** @author: Peter Laxalt
 ** @description: Functions to show/hide the newsletter overlay.
 */
function initNewsletter() {
  var newsletterBtnClass = "btn-newsletter";
  var newsletterOverlayClass = "newsletter-overlay";

  var toggleNewsletterOverlay = function toggleNewsletterOverlay(e) {
    var newsletterOverlay = document.getElementsByClassName(newsletterOverlayClass)[0];

    if (newsletterOverlay.classList.contains("visible")) {
      document.body.classList.remove("scroll-lock");
      newsletterOverlay.classList.remove("visible");
    } else {
      document.body.classList.add("scroll-lock");
      newsletterOverlay.classList.add("visible");
    }

    return;
  };

  document.addEventListener("click", function (event) {
    // If the clicked element doesn't have the right selector, bail
    if (!event.target.classList.contains(newsletterBtnClass)) return; // Don't follow the link

    event.preventDefault(); // Log the clicked element in the console

    toggleNewsletterOverlay(event);
  }, false);
}

initNewsletter();
"use strict";

/*
 ** @author: Alisha Garric
 ** @description: Functions to change number input's values
 */
function initInputNumberIcons() {
  var inputDecrementClass = "input-number-decrement";
  var inputIncrementClass = "input-number-increment";

  var changeInputValue = function changeInputValue(e) {
    if (event.target.classList.contains(inputDecrementClass)) {
      var inputTag = event.target.nextSibling;
      decrement(inputTag);
    } else {
      var _inputTag = event.target.previousSibling;
      increment(_inputTag);
    }

    return;
  };

  document.addEventListener("click", function (event) {
    // If the clicked element doesn't have the right selector, bail
    if (!(event.target.classList.contains(inputDecrementClass) || event.target.classList.contains(inputIncrementClass))) return;
    changeInputValue(event);
  }, false);
}

initInputNumberIcons();

function decrement(input) {
  var value = input.value;
  var min = 0;
  value--;

  if (value >= min) {
    input.value = value;
  }
}

function increment(input) {
  var value = input.value;
  value++;
  input.value = value++;
}
"use strict";

/*
 ** @author: Alisha Garric
 ** @description: Remove items from cart
 */
function initRemoveItem() {
  var removeItem = function removeItem(e) {
    var itemIndex = e.target.dataset.item;
    var state = {};
    var title = 'Update Cart';
    var url = '/cart/change?line=' + itemIndex + '&amp;quantity=0';
    window.location.href = url;
    return;
  };

  document.addEventListener("click", function (event) {
    // If the clicked element doesn't have the right selector, bail
    if (!event.target.classList.contains("remove-item")) return; // Don't follow the link

    event.preventDefault(); // Log the clicked element in the console

    removeItem(event);
  }, false);
}

initRemoveItem();
"use strict";

/*
 ** @author: Peter Laxalt
 ** @description: Super simple script for the Bike Wheel SVG to
 ** follow the mouse position.
 */
function initBikeWheel() {
  var rotated = document.getElementsByClassName("bike-wheel-el")[0];

  if (rotated != undefined) {
    window.addEventListener("mousemove", function (ev) {
      ev.preventDefault();
      ev.stopPropagation();
      var deltaX = ev.pageX - innerWidth / 2;
      var deltaY = ev.pageY - innerHeight / 2;
      var angle = Math.atan(deltaX / deltaY);

      if (deltaY < 0) {
        rotated.style.transform = "rotate(" + -angle + "rad)";
      } else {
        rotated.style.transform = "rotate(" + (Math.PI - angle) + "rad)";
      }
    }, false);
  }
}

initBikeWheel();
"use strict";

/*
 ** Toggle Search Overlay
 **
 ** @author: Peter Laxalt
 ** @description: Functions to show/hide the newsletter overlay.
 */
function initSearchOverlay() {
  var searchToggleClass = "search-toggle";
  var searchOverlayClass = "search-overlay";

  var toggleSearchOverlay = function toggleSearchOverlay(e) {
    var newsletterOverlay = document.getElementsByClassName(searchOverlayClass)[0];

    if (newsletterOverlay.classList.contains("visible")) {
      document.body.classList.remove("scroll-lock");
      newsletterOverlay.classList.remove("visible");
    } else {
      document.body.classList.add("scroll-lock");
      newsletterOverlay.classList.add("visible");
    }

    return;
  };

  document.addEventListener("click", function (event) {
    // If the clicked element doesn't have the right selector, bail
    if (!event.target.classList.contains(searchToggleClass)) return; // Don't follow the link

    event.preventDefault(); // Log the clicked element in the console

    toggleSearchOverlay(event);
  }, false);
}

initSearchOverlay();
"use strict";

/*
 ** Social Share Dialogs
 **
 ** @author: Peter Laxalt
 ** @description: Functions to initiate social sharing.
 */
function initSocialOverlay() {
  var socialShareLink = "social-share";

  var toggleSocialOverlay = function toggleSocialOverlay(e) {
    console.log(e);
    window.open(e.target.dataset.href, "Share", "left=20,top=20,width=500,height=500,toolbar=1,resizable=0");
    return false;
  };

  document.addEventListener("click", function (event) {
    // If the clicked element doesn't have the right selector, bail
    if (!event.target.classList.contains(socialShareLink)) return; // Log the clicked element in the console

    toggleSocialOverlay(event);
  }, false);
}

initSocialOverlay();
"use strict";

/*
 ** Toggle Video Overlay
 **
 ** @author: Peter Laxalt
 ** @description: Functions to show/hide the video overlay.
 */
function initVideoOverlay() {
  var videoToggleClass = "video-toggle";
  var videoOverlayClass = "video-overlay";
  var videoOverlay = document.getElementsByClassName(videoOverlayClass)[0];

  if (videoOverlay) {
    var toggleVideoOverlay = function toggleVideoOverlay(e) {
      if (videoOverlay.classList.contains("visible")) {
        var src = videoOverlay.querySelector('iframe').src.replace("autoplay=1", "autoplay=0");
        videoOverlay.querySelector('iframe').src = src;
        document.body.classList.remove("scroll-lock");
        videoOverlay.classList.remove("visible");
      } else {
        var _src = videoOverlay.querySelector('iframe').src.replace("autoplay=0", "autoplay=1");

        videoOverlay.querySelector('iframe').src = _src;
        document.body.classList.add("scroll-lock");
        videoOverlay.classList.add("visible");
      }

      return;
    };

    document.addEventListener("click", function (event) {
      // If the clicked element doesn't have the right selector, bail
      if (!event.target.classList.contains(videoToggleClass)) return; // Don't follow the link

      event.preventDefault(); // Log the clicked element in the console

      toggleVideoOverlay(event);
    }, false);
  } else {
    return;
  }
}

initVideoOverlay(); // __appFunctions.BEFORE_ENTER.push(initVideoOverlay);