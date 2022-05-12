window.onbeforeunload = function() {
    window.scrollTo(0, 0);
}

$(document).ready(function() {

    el = {
        document: $(document),
        window: $(window),
        html: $("html"),
        html_body: $("body"),
        body: $("body"),
        main: $("main"),
        menu_toggle: $(".menu-toggle"),
        menu_item: $(".menu a"),
        header_section_placeholder: $("#section-placeholder"),
        footer: $("#footer")
    };

    el.html.addClass(bowser.name.toLowerCase());

    // Menu
    el.menu_item.on("click", function(e) {

        e.preventDefault();

        $(".menu-toggle").trigger("click");
        var section_index = $(this).attr("data-section-index"),
            this_href = $(this).attr("href");

        if(el.html.hasClass("is-mobile-tablet") && $("#project-content").length && $(this).hasClass("anchor-link")) {
            var anchor_hash = this_href.substring(1);
            jQuery().ajaxify("/index.php?s="+anchor_hash+"");
        } else {
            setTimeout(function() {
                if ($("#project-content").length) {
                    section_index = parseInt(section_index) + 1;
                    // if(section_index > 2) {
                    //     $(".project-header").fadeOut(400);
                    // }
                }
                $.fn.fullpage.moveTo(section_index);
            }, 550);
        }

    });

    el.menu_toggle.on("click", function(e) {
        el.body.toggleClass("menu-open");
        e.preventDefault();

    });

    // Fullpage
    init_fullpage();

    // Init Animation
    el.body.imagesLoaded({
        background: true
    }, function() {
        // Temporary timeout for localhost simulation
        setTimeout(function() {
            el.body.addClass("loaded");
            // Temporary timeout for localhost simulation
            setTimeout(function() {
                el.body.removeClass("loading");
                setTimeout(function(){
                    $(".project-view-header").removeClass("project-view-header");
                },200);
                setTimeout(function(){
                  el.html.addClass("fully-loaded");
                }, 450);
                check_params();
                if(el.html.is('.edge, .ie')) {
                  $.fn.fullpage.reBuild();
                }
              // 500
            }, 850);
        }, 1000);
    });

    // Global Functions
    init_home();
    init_projects();

    // Ajax
    $('#main').ajaxify({
        selector : ".async",
        prefetch: false,
        refresh : true,
        scrolltop: false,
        requestDelay: 400
    });

    $(window).on('pronto.request', function(event, eventInfo) {

      jQuery.cache("f");
      el.body.addClass("init-loading");
      $link_element = $(eventInfo.currentTarget);

      // google.maps.event.clearInstanceListeners(window);
      // google.maps.event.clearInstanceListeners(document);

      $(document).off("click keydown keyup mouseenter mouseleave touchend touchstart");
      $(window).off("scroll");

      $('.swiper-container').each(function(){
        this.swiper.destroy();
      });

      $(".fp-scrollable").each(function(){
        var iscroll = $(this).data('iscrollInstance')
        if(iscroll && typeof iscroll !== undefined){
          iscroll.destroy();
        }
      });

      var $video_js_el = $(".video-js");

      if($video_js_el.length) {
          $video_js_el.each(function(){
              var old_player = document.getElementById(this.id);
              videojs(old_player).dispose();
          });
      }

      body_sub_theme = $link_element.attr("data-theme");

      if(body_sub_theme == "") {
          body_sub_theme = "red";
      }



      el.main.addClass("fade-out");
      el.body.attr("data-theme","light").removeClass("loaded");

      setTimeout(function() {
          el.body.addClass("loading");
      }, 400);

      if($link_element.hasClass("thumb-toggle") && !el.html.hasClass("is-mobile-tablet")) {

          el.footer.addClass("is-loading thumb-expanded");

          var this_id = $link_element.attr("data-id"),
              $this_thumb = $("#" + this_id + " .index-thumb"),
              $cloned_thumb = $this_thumb.clone();

          $cloned_thumb.css("opacity","1").appendTo(".cloned-thumbs");

          $(".featured-project a").off("mouseenter mouseleave");

          TweenMax.to($cloned_thumb, .55, {
              top: 0,
              left: 0,
              width: "100vw",
              height: "100vh",
              ease: Power4.easeInOut
          });

          $cloned_thumb.addClass("expand");

      }

    });

    $(window).on('pronto.load', function(event, eventInfo) {
         $.fn.fullpage.destroy('all');
         el.body.attr("data-sub-theme", "red");
    });

    $(window).on('pronto.render', function(event, eventInfo) {

        el.body.attr("data-sub-theme", body_sub_theme);

        init_fullpage();
        init_home();
        init_projects();


        if(!$link_element.hasClass("thumb-toggle")) {
          el.body.addClass("loaded");
        }

        if(!$link_element.hasClass("thumb-toggle")) {
          var timeout_animation = 850;
        } else {
          var timeout_animation = 400;
        }

        setTimeout(function() {

          if(!$link_element.hasClass("thumb-toggle")) {
            el.main.removeClass("fade-out");
          } else {
            el.main.fadeTo(0, 1, function(){
              el.main.removeClass("fade-out").attr("style","");
            });
          }

          if(!$link_element.hasClass("thumb-toggle") || !$link_element.hasClass("project-toggle")) {
            el.html.removeClass("fully-loaded");
          } else {
            el.html.addClass("fully-loaded");
          }

          if($link_element.hasClass("thumb-toggle")) {
            el.body.addClass("loaded");
          }

          el.body.removeClass("loading init-loading");
          $.fn.fullpage.reBuild();

          //$(".cloned-thumbs .index-thumb").fadeOut(400, function(){
                setTimeout(function() {
                  $(".project-view-header").removeClass("project-view-header");
                  el.footer.attr("class","");
                  $(".cloned-thumbs").empty();

                }, 500);
                check_params();
          //});
          // 400
        }, timeout_animation);


    });


});

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function check_params() {
    var get_params = getParameterByName("s");
    if(typeof get_params !== 'undefined') {
      if(get_params == "about") {
          $.fn.fullpage.moveTo(2);
      } else if (get_params == "people") {
          $.fn.fullpage.moveTo(3);
      }
    }
}

function init_fullpage() {
    if(el.html.hasClass("is-mobile-tablet")) {
        var drag_scroll_setting = "panel-section-inner";
        var css_transform = true;
        var disable_drag_pointer = false;
    } else {
        var drag_scroll_setting = "none";
        var css_transform = false;
        var disable_drag_pointer = true;
    }

    var window_height = $(window).height();

    function get_scroll_y(){

      var $project_header_el = $(".project-header");

      //$("h1.index-item").css("transform","translateY("+this.y+"px)");
      // if -> $("h1.index-item").css("margin-top",-(window_height - 63)+"px");
      // if(Math.abs(this.y) <= window_height) {
      //   $("h1.index-item").css("margin-top",this.y+"px");
      // } else {
      //
      // }

      // if(Math.abs(this.y) >= window_height) {
      //   $("h1.index-item").css("margin-top",this.y);
      // } else {
      //
      // }

      if(Math.abs(this.y) + 65 >= el.window.height()) {
        $project_header_el.addClass("trigger-entrance");
      } else {
        $project_header_el.removeClass("trigger-entrance");
      }
    }

    $(".main section").fullpage({
        sectionSelector: ".panel-section",
        scrollOverflow: true,
        normalScrollElements: "#navigation",
        scrollOverflowOptions: {
            //preventDefault: false,
            disablePointer: disable_drag_pointer,
            useTransition : css_transform,
            useTransform : css_transform,
            probeType: 3
            //preventDefaultException: { className: "column" }
        },
        resize: true,
        css3:css_transform,
        easingcss3: "cubic-bezier(0.860, 0.000, 0.070, 1.000)",
        onLeave: function(index, nextIndex, direction){

            var $active_panel = $(".panel-section").eq(nextIndex-1),
                theme = $active_panel.data("theme"),
                section_title = $active_panel.attr("data-panel-title");
                el.body.attr("data-theme", theme);

            el.header_section_placeholder.html(section_title);

            if($("#project-content").length) {
                // if(nextIndex == 1) {
                    // $(".project-header").removeClass("trigger-entrance");
                    // if($("#intro-video").length) {
                    //     document.getElementById('intro-video').play();
                    // }
                //}
                if(nextIndex == 1) {
                    //$(".project-header").addClass("trigger-entrance");
                    setTimeout(function() {
                        $(".intro-video-wrapper").show();
                    }, 600);

                }
                if(nextIndex >= 2) {
                    $(".project-header").addClass("fade-out");
                    $(".intro-video-wrapper").hide();
                }
                if(nextIndex == 1 && index >= 2) {
                    $(".project-header").removeClass("fade-out");
                }
            }
        },
        afterRender: function(){
            var $active_panel = $(".panel-section.fp-completely"),
                section_title = $active_panel.attr("data-panel-title");

            el.header_section_placeholder.html(section_title);

            if($("#project-content").length) {
                el.body.addClass("viewing-project");
            } else {
                el.body.removeClass("viewing-project");
            }
            var iscroll = $('.project-panel').find('.fp-scrollable').data('iscrollInstance');

            if(iscroll && typeof iscroll !== undefined){
              iscroll.on('scroll', get_scroll_y);
            }
            $(".arrow-down-trigger").click(function() {
                iscroll.scrollTo(0, -el.window.height(), 500);
            });
            if(el.html.hasClass("is-mobile-tablet")) {
              $(".video-parallax-effect").click(function(e){
                if( e.target != this ) {
                  return false;
                }
                document.getElementById('intro-video').play();
              });
            }
        }
    });
}


function init_home() {

    // if($("#map").length) {
    //     map();
    // }

    if($(".mobile-project-list").length) {
        var projects_list_swiper = new Swiper(".mobile-project-list", {
            spaceBetween: 0,
            loop: true,
            speed: 400,
            effect: "fade",
            fadeEffect: {
                crossFade: false
            },
            autoplay: {
                delay: 4000,
                disableOnInteraction: false
            },
        });
        projects_list_swiper.autoplay.stop();

        if(el.html.hasClass("is-mobile-tablet")) {
            setTimeout(function() {
                projects_list_swiper.autoplay.start();
            }, 1200);
        }
    }


    // var $panel = $('.index-content');
    //
    // $(".featured-project a").on('mouseenter mouseleave', function(e) {
    //     return e.type == "mouseenter" ? panelOn(e) : panelOff() ;
    // });

    // function panelOn(e) {
    //    var $this = $(e.currentTarget),
    //     $project_id = $this.attr("data-id"),
    //     $this_thumb = $("#" + $project_id + " .index-thumb");
    //
    //    if(typeof window.matchMedia != "undefined" || typeof window.msMatchMedia != "undefined") {
    //      if (window.matchMedia("(min-width: 1600px)").matches) {
    //        var cursor_offset = 290;
    //      } else if (window.matchMedia("(min-width: 1440px) and (max-width: 1599px)").matches) {
    //        var cursor_offset = 232;
    //      } else {
    //        var cursor_offset = 174;
    //      }
    //    } else {
    //      var cursor_offset = 5;
    //    }
    //
    //    el.document.on("mousemove", function(e) {
    //        //current_y_offset = e.clientY;
    //        $this_thumb.css({
    //            'top': e.clientY - cursor_offset,
    //            'left': e.clientX + 15
    //        });
    //    });
    //
    //    $panel.data('wait', setTimeout(function(){
    //      $this_thumb.fadeIn(250).addClass("visible");
    //      $this_thumb.addClass("visible")
    //    },100));
    //
    // }

    // function panelOff() {
    //     clearTimeout( $panel.data('wait') );
        //$(".index-thumb.visible").fadeOut(200).removeClass("visible");
    //     $(".index-thumb.visible").removeClass("visible");
    //     el.document.off("mousemove");
    // }


    $(".featured-project a").on({
        mouseenter: function() {

          var $this = $(this),
           $project_id = $this.attr("data-id"),
           $this_thumb = $("#" + $project_id + " .index-thumb");

          if(typeof window.matchMedia != "undefined" || typeof window.msMatchMedia != "undefined") {
            if (window.matchMedia("(min-width: 1600px)").matches) {
              var cursor_offset = 290;
            } else if (window.matchMedia("(min-width: 1440px) and (max-width: 1599px)").matches) {
              var cursor_offset = 232;
            } else {
              var cursor_offset = 174;
            }
          } else {
            var cursor_offset = 5;
          }

          $this_thumb.addClass("visible");

          el.document.on("mousemove", function(e) {
              //current_y_offset = e.clientY;
              $this_thumb.css({
                  'top': e.clientY - cursor_offset,
                  'left': e.clientX + 15
              });
          });

        },
        mouseleave: function() {
          $(".index-thumb.visible").removeClass("visible");
          el.document.off("mousemove");
        }
    });

    var $custom_slideshow = $(".index-content a[href*='.mp4']");

    if($custom_slideshow.length && !$(".slideshow-bg").length) {
        $("#main").append('<div class="slideshow-bg"></div>')
    }

    $custom_slideshow.each(function(i){
      var $this = $(this),
          this_video_url = $this.attr("href"),
          data_slideshow_id = "s-c"+i;

      $this.attr("data-slideshow","c"+i).addClass("custom-slideshow");

      var generate_lightbox = '<div id="'+data_slideshow_id+'" class="custom-slideshow slideshow-container-outer" data-type="video">
        <div class="slideshow-container">
          <div class="close-slideshow"><span></span></div>
          <div class="slideshow-container-inner">
            <div class="swiper-container" >
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="slide-content">
                    <video id="v-c'+i+'" class="video-js vjs-default-skin" preload="none" controls>
                      <source src="'+this_video_url+'" type="video/mp4">
                    </video>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>';

      $("#main").append(generate_lightbox);
      //$("#"+data_slideshow_id).
      // var video_id = 'v-c'+i;
      //
      // var player = videojs(video_id, {
      //     inactivityTimeout:0
      // });

    });

    // $(".custom-slideshow").each(function(){
    //   $(".video-js").each(function(){
    //       var player = videojs(this.id, {
    //           inactivityTimeout:0
    //           // controlBar: {
    //           //     fullscreenToggle: false
    //           // }
    //       });
    //   });
    // });

    // $(document).on("click",".custom-slideshow", function(){
    //
    //     e.preventDefault();
    //
    //     $.fn.fullpage.setAllowScrolling(false);
    //
    //     var slideshow_id = $(this).attr("data-slideshow"),
    //         $active_slideshow = $(".slideshow-container-outer#s-"+slideshow_id),
    //         slideshow_type = $active_slideshow.attr("data-type");
    //
    //     $(".slideshow-bg").addClass("is-visible");
    //     $active_slideshow.addClass("opened");
    //
    //     // $(".slideshow-bg").fadeTo(300,.8);
    //     // $(".slideshow-container-outer#s-"+slideshow_id).fadeTo(300,1);
    //
    //     el.html_body.addClass('overflow-hidden');
    //     el.body.addClass("slideshow-is-opened");
    //
    //     if(slideshow_type == "video") {
    //       var this_video = $active_slideshow.find(".video-js");
    //       this_video[0].player.play();
    //     }
    //
    //     // $(document).one("keyup", function(e) {
    //     //   if (e.keyCode == 27) {
    //     //       $close_slideshow.trigger("click");
    //     //     }
    //     // });
    //     //
    //     // add_close_toggle = setTimeout(function() {
    //     //   $slideshow_bg.one("click",function(){
    //     //       $close_slideshow.trigger("click");
    //     //   });
    //     // }, 500);
    //     //
    //     // add_visibility_toggle = setTimeout(function() {
    //     //      $active_slideshow.addClass("is-visible");
    //     // }, 3000);
    //
    // });

    // $('.show-more-text-wrapper').each(function() {
    //     var wrapper = $(this),
    //         inner = wrapper.find('.inner'),
    //         toggleButton = wrapper.find('.show-more-text-toggle');
    //
    //     toggleButton.bind('click', function() {
    //         if (inner.hasClass('expanded')) {
    //             inner.removeClass('expanded');
    //             toggleButton.removeClass('expanded');
    //         } else {
    //             inner.addClass('expanded');
    //             toggleButton.addClass('expanded');
    //         }
    //
    //         return false;
    //     });
    // })

    // $(".read-more-accordion-toggle").on("click", function(e) {
    //     var $this = $(this);
    //     $this.toggleClass("read-more-expanded");
    //     $this.closest(".team-member").find(".read-more-accordion").toggleClass("expanded");
    //     var $accordion_container = $this.next(".read-more-accordion");
    //     setTimeout(function() {
    //         //el.window.trigger("resize");
    //         $.fn.fullpage.reBuild();
    //     }, 350);
    //     e.preventDefault();
    //     e.stopImmediatePropagation();
    // });
    //
    // function map() {
    //
    //     var point_lat = 40.721449,
    //         point_lng = -73.997746;
    //
    //     // new google.maps.map(el, {});  // will use only one map
    //     //window.myOnlyMap = map;
    //
    //     if (window.myOnlyMap) {
    //       var map = window.myOnlyMap;
    //       $("#map").append(map.getDiv());
    //     } else {
    //       var map = new google.maps.Map(document.getElementById('map'), {
    //         center: {
    //             lat: point_lat,
    //             lng: point_lng
    //         },
    //         gestureHandling: 'greedy',
    //         zoom: 18,
    //         minZoom: 6,
    //         disableDefaultUI: true,
    //         styles: [{
    //                 "featureType": "all",
    //                 "elementType": "geometry",
    //                 "stylers": [{
    //                     "color": "#ffffff"
    //                 }]
    //             },
    //             {
    //                 "featureType": "all",
    //                 "elementType": "labels.text.fill",
    //                 "stylers": [{
    //                         "gamma": 0.01
    //                     },
    //                     {
    //                         "lightness": 20
    //                     }
    //                 ]
    //             },
    //             {
    //                 "featureType": "all",
    //                 "elementType": "labels.text.stroke",
    //                 "stylers": [{
    //                         "saturation": -31
    //                     },
    //                     {
    //                         "lightness": -33
    //                     },
    //                     {
    //                         "weight": 2
    //                     },
    //                     {
    //                         "gamma": 0.8
    //                     }
    //                 ]
    //             },
    //             {
    //                 "featureType": "all",
    //                 "elementType": "labels.icon",
    //                 "stylers": [{
    //                     "visibility": "off"
    //                 }]
    //             },
    //             {
    //                 "featureType": "administrative.locality",
    //                 "elementType": "labels.text.fill",
    //                 "stylers": [{
    //                     "color": "#050505"
    //                 }]
    //             },
    //             {
    //                 "featureType": "administrative.locality",
    //                 "elementType": "labels.text.stroke",
    //                 "stylers": [{
    //                         "color": "#fef3f3"
    //                     },
    //                     {
    //                         "weight": "3.01"
    //                     }
    //                 ]
    //             },
    //             {
    //                 "featureType": "administrative.neighborhood",
    //                 "elementType": "labels.text.fill",
    //                 "stylers": [{
    //                         "color": "#0a0a0a"
    //                     },
    //                     {
    //                         "visibility": "off"
    //                     }
    //                 ]
    //             },
    //             {
    //                 "featureType": "administrative.neighborhood",
    //                 "elementType": "labels.text.stroke",
    //                 "stylers": [{
    //                         "color": "#fffbfb"
    //                     },
    //                     {
    //                         "weight": "3.01"
    //                     },
    //                     {
    //                         "visibility": "off"
    //                     }
    //                 ]
    //             },
    //             {
    //                 "featureType": "landscape",
    //                 "elementType": "geometry",
    //                 "stylers": [{
    //                         "lightness": 30
    //                     },
    //                     {
    //                         "saturation": 30
    //                     }
    //                 ]
    //             },
    //             {
    //                 "featureType": "poi",
    //                 "elementType": "geometry",
    //                 "stylers": [{
    //                     "saturation": 20
    //                 }]
    //             },
    //             {
    //                 "featureType": "poi.attraction",
    //                 "elementType": "labels.icon",
    //                 "stylers": [{
    //                     "visibility": "off"
    //                 }]
    //             },
    //             {
    //                 "featureType": "poi.park",
    //                 "elementType": "geometry",
    //                 "stylers": [{
    //                         "lightness": 20
    //                     },
    //                     {
    //                         "saturation": -20
    //                     }
    //                 ]
    //             },
    //             {
    //                 "featureType": "poi.park",
    //                 "elementType": "labels.text.fill",
    //                 "stylers": [{
    //                     "color": "#444242"
    //                 }]
    //             },
    //             {
    //                 "featureType": "road",
    //                 "elementType": "geometry",
    //                 "stylers": [{
    //                         "lightness": 10
    //                     },
    //                     {
    //                         "saturation": -30
    //                     }
    //                 ]
    //             },
    //             {
    //                 "featureType": "road",
    //                 "elementType": "geometry.stroke",
    //                 "stylers": [{
    //                         "saturation": 25
    //                     },
    //                     {
    //                         "lightness": 25
    //                     }
    //                 ]
    //             },
    //             {
    //                 "featureType": "road.highway",
    //                 "elementType": "geometry.fill",
    //                 "stylers": [{
    //                         "visibility": "on"
    //                     },
    //                     {
    //                         "color": "#a1a1a1"
    //                     }
    //                 ]
    //             },
    //             {
    //                 "featureType": "road.highway",
    //                 "elementType": "geometry.stroke",
    //                 "stylers": [{
    //                     "color": "#292929"
    //                 }]
    //             },
    //             {
    //                 "featureType": "road.highway",
    //                 "elementType": "labels.text.fill",
    //                 "stylers": [{
    //                         "visibility": "on"
    //                     },
    //                     {
    //                         "color": "#202020"
    //                     }
    //                 ]
    //             },
    //             {
    //                 "featureType": "road.highway",
    //                 "elementType": "labels.text.stroke",
    //                 "stylers": [{
    //                         "visibility": "on"
    //                     },
    //                     {
    //                         "color": "#ffffff"
    //                     }
    //                 ]
    //             },
    //             {
    //                 "featureType": "road.highway",
    //                 "elementType": "labels.icon",
    //                 "stylers": [{
    //                         "visibility": "simplified"
    //                     },
    //                     {
    //                         "hue": "#0006ff"
    //                     },
    //                     {
    //                         "saturation": "-100"
    //                     },
    //                     {
    //                         "lightness": "13"
    //                     },
    //                     {
    //                         "gamma": "0.00"
    //                     }
    //                 ]
    //             },
    //             {
    //                 "featureType": "road.arterial",
    //                 "elementType": "geometry.fill",
    //                 "stylers": [{
    //                         "visibility": "on"
    //                     },
    //                     {
    //                         "color": "#686868"
    //                     }
    //                 ]
    //             },
    //             {
    //                 "featureType": "road.arterial",
    //                 "elementType": "geometry.stroke",
    //                 "stylers": [{
    //                         "visibility": "off"
    //                     },
    //                     {
    //                         "color": "#8d8d8d"
    //                     }
    //                 ]
    //             },
    //             {
    //                 "featureType": "road.arterial",
    //                 "elementType": "labels.text.fill",
    //                 "stylers": [{
    //                         "visibility": "on"
    //                     },
    //                     {
    //                         "color": "#353535"
    //                     },
    //                     {
    //                         "lightness": "6"
    //                     }
    //                 ]
    //             },
    //             {
    //                 "featureType": "road.arterial",
    //                 "elementType": "labels.text.stroke",
    //                 "stylers": [{
    //                         "visibility": "on"
    //                     },
    //                     {
    //                         "color": "#ffffff"
    //                     },
    //                     {
    //                         "weight": "2.71"
    //                     }
    //                 ]
    //             },
    //             {
    //                 "featureType": "road.local",
    //                 "elementType": "geometry.fill",
    //                 "stylers": [{
    //                     "color": "#d0d0d0"
    //                 }]
    //             },
    //             {
    //                 "featureType": "road.local",
    //                 "elementType": "geometry.stroke",
    //                 "stylers": [{
    //                         "lightness": "2"
    //                     },
    //                     {
    //                         "visibility": "on"
    //                     },
    //                     {
    //                         "color": "#999898"
    //                     }
    //                 ]
    //             },
    //             {
    //                 "featureType": "road.local",
    //                 "elementType": "labels.text.fill",
    //                 "stylers": [{
    //                     "color": "#383838"
    //                 }]
    //             },
    //             {
    //                 "featureType": "road.local",
    //                 "elementType": "labels.text.stroke",
    //                 "stylers": [{
    //                     "color": "#faf8f8"
    //                 }]
    //             },
    //             {
    //                 "featureType": "water",
    //                 "elementType": "all",
    //                 "stylers": [{
    //                     "lightness": -20
    //                 }]
    //             }
    //         ]
    //       });
    //       window.myOnlyMap = map;
    //     }
    //
    //     var marker = new google.maps.Marker({
    //         map: map,
    //         position: {
    //             lat: point_lat,
    //             lng: point_lng
    //         },
    //         icon: dannyforster.root + "/assets/map-marker.svg"
    //     });
    //
    //     marker.addListener('click', function() {
    //         window.open("https://www.google.pt/maps/place/203+Lafayette+St,+New+York,+NY+10012,+EUA/@40.721388,-73.9999027,17z/data=!3m1!4b1!4m5!3m4!1s0x89c25989203d3a8b:0x8e20d80c98641581!8m2!3d40.721384!4d-73.997714", '_blank');
    //     });
    //
    // }

}




function init_projects() {

    var $text_accordion = $(".accordion-container"),
        $object_fit_images = $(".project-thumb-cover img");

    $text_accordion.each(function(){

      var $this = $(this),
          $text_accordion_divider = $("hr", this),
          $text_accordion_toggle =  $(".read-more-toggle", this);

      if($text_accordion_divider.length) {
          $text_accordion_divider.nextUntil(".read-more-toggle").wrapAll("<div class='text-accordion'></div>");
          $text_accordion_toggle.on("click",function(){
              $(this).html($(this).html() == '+ <span>read more</span>' ? '– <span>read less</span>' : '+ <span>read more</span>');
              $(this).prev(".text-accordion").slideToggle(500, function(){
                  $.fn.fullpage.reBuild();
              });
          });
      } else {
          $text_accordion_toggle.remove();
      }

    });

    objectFitImages($object_fit_images);

    $(".slide-info-title").click(function(){
        $(this).toggleClass("opened");
        $(this).next().slideToggle(400);
    });

    var add_visibility_toggle;
    var $close_slideshow = $(".close-slideshow"),
        $slideshow_bg = $(".slideshow-bg");

    $(".project-thumb, .custom-slideshow").click(function(e){

        e.preventDefault();

        $.fn.fullpage.setAllowScrolling(false);

        var slideshow_id = $(this).attr("data-slideshow");
        var $active_slideshow = $(".slideshow-container-outer#s-"+slideshow_id);
        var slideshow_type = $active_slideshow.attr("data-type");
        var $close_slideshow = $(".slideshow-container-outer#s-"+slideshow_id).find(".close-slideshow")

        $(".slideshow-bg").addClass("is-visible");
        $active_slideshow.addClass("opened");

        // $(".slideshow-bg").fadeTo(300,.8);
        // $(".slideshow-container-outer#s-"+slideshow_id).fadeTo(300,1);

        el.html_body.addClass('overflow-hidden');
        el.body.addClass("slideshow-is-opened");

        if(slideshow_type == "video") {
          var this_video = $active_slideshow.find(".video-js");
          this_video[0].player.play();
        }

        //if(slideshow_type == "images") {
          // $(window).on('resizestart', function(){
          //   $close_slideshow.trigger("click");
          //   $(window).off('resizestart');
          // });
          //
          // $(window).on('resizeend', '500', function(){
          //   $('.slideshow-container-outer[data-type="images"] .swiper-slide').css("width","");
          //   console.log("aa");
          //   $('.slideshow-container-outer[data-type="images"] .slideshow-container').each(function(){
          //     $(this).css("width","");
          //     $(this).find(".swiper-slide").each(function(){
          //       // var slide_width = $(this).find("img").width();
          //       // $(this).width(slide_width);
          //     });
          //     // var current_active_slide_width = $(this).find(".swiper-slide-active").width();
          //     // $(this).width(current_active_slide_width);
          //   });
          //
          //   $(window).off('resizeend');
          // });
        //}

        $(document).one("keyup", function(e) {
          if (e.keyCode == 27) {
              $close_slideshow.trigger("click");
            }
        });

        add_close_toggle = setTimeout(function() {
          $slideshow_bg.one("click",function(){
              $close_slideshow.trigger("click");
          });
        }, 500);

        add_visibility_toggle = setTimeout(function() {
             $active_slideshow.addClass("is-visible");
        }, 3000);

    });


    $(document).on("click", ".close-slideshow",function(){

        // $(".slideshow-bg").fadeTo(300,0);
        // $(".slideshow-container-outer.opened").fadeTo(300,0);
        console.log("sada");
        $(".slideshow-bg").removeClass("is-visible");
        $(".slideshow-container-outer.opened").removeClass("is-visible opened");

        el.body.removeClass("slideshow-is-opened");
        $.fn.fullpage.setAllowScrolling(true);
        $(".video-js").each(function (index) {
            this.player.pause();
        });
        clearTimeout(add_visibility_toggle);
        clearTimeout(add_close_toggle);
        setTimeout(function() {
            el.html_body.removeClass('overflow-hidden');
        }, 350);
    });

    if($("#intro-video").length && !el.html.hasClass("is-mobile-tablet")) {
      var intro_video = document.getElementById('intro-video');
      var isPlaying = intro_video.currentTime > 0 && !intro_video.paused && !intro_video.ended && intro_video.readyState > 2;
      if (!isPlaying) {
        intro_video.play();
      }
      //document.getElementById('intro-video').play();
    }

    $(".video-js").each(function(){
        var player = videojs(this.id, {
            inactivityTimeout:0
            // controlBar: {
            //     fullscreenToggle: false
            // }
        });
    });

    var slideshows = [];

    $('.slideshow-container-outer .swiper-container').each(function(slideshow_index) {

        var $this = $(this),
            $swiperContainer = $this,
            $next = $this.find('.slideshow-next'),
            $prev = $this.find('.slideshow-prev'),
            $slideshowContainer = $swiperContainer.closest('.slideshow-container'),
            media_type = $this.closest("slideshow-container-outer").attr("data-type");

        if(media_type == "images") {
            touch_drag_setting = true;
        } else {
            touch_drag_setting = false;
        }

        var swiper = new Swiper($swiperContainer, {
            slidePerView: 'auto',
            centeredSlides: true,
            setWrapperSize: false,
            freeMode: true,
            navigation: {
                nextEl: $next,
                prevEl: $prev,
            },
            virtualTranslate:true,
            // effect: "fade",
            // fadeEffect: {
            //     crossFade: false
            // },
            speed: 0,
            simulateTouch: touch_drag_setting,
            spaceBetween: 0,
            preloadImages: true,
            lazy: {
                // loadPrevNext: true,
                // loadPrevNextAmount: 4,
                preloaderClass: "preloader"
            },
            on: {
                init: function () {
                    //setThumbnails($slideshowContainer, slideshow_index);
                    // $swiperContainer.find(".swiper-slide").each(function(){
                    //   var img_width = $(this).find("img").width();
                    //   console.log(img_width);
                    //   $this.width(img_width);
                    // });
                    $slideshowContainer.imagesLoaded(function() {
                      var init_width = $slideshowContainer.find(".swiper-slide:first-child img").width();
                      $slideshowContainer.width(init_width);
                      $slideshowContainer.find(".swiper-slide:first-child").width(init_width);
                    });


                },
                lazyImageReady: function(slide) {
                  var img_width = $(slide).find("img").width();
                  $(slide).width(img_width);
                },
                transitionStart: function(){
                  var slide_width = $slideshowContainer.find(".swiper-slide").eq(swiper.activeIndex).width();
                  $slideshowContainer.width(slide_width);
                }

            }

        });

        slideshows.push(swiper);

    });
    $(window).resizestart(function() {
	     // execute callback...
       $('.slideshow-container-outer[data-type="images"] .swiper-slide').css("width","");
       $('.slideshow-container-outer[data-type="images"] .slideshow-container').css("width","");
    });
    $(window).on("resizeend", function(){
      $('.slideshow-container-outer[data-type="images"] .swiper-slide').css("width","");
      $('.slideshow-container-outer[data-type="images"] .slideshow-container').css("width","");
      $('.slideshow-container-outer[data-type="images"] .slideshow-container').each(function(){
        $(this).css("width","");
        $(".swiper-slide").each(function(){
          var slide_width = $(this).find("img").width();
          $(this).width(slide_width);
        });
        var current_active_slide_width = $(this).find(".swiper-slide-active").width();
        $(this).width(current_active_slide_width);
      });
    });

    $(".slideshow-container").each(function(slideshow_index){

      var $slideshowContainer = $(this);

      $(this).imagesLoaded(function() {
        // var thumbnailWidth = $slideshowContainer.find('.thumbnails-wrapper ul li').width(),
        //     totalThumbnails = $slideshowContainer.find('.thumbnails-wrapper ul li').length;

        var totalWidth = 0;

        $slideshowContainer.find('.thumbnails-wrapper ul li').each(function(index) {
          totalWidth += parseInt($(this).width());
        });

        $slideshowContainer.find('.thumbnails-wrapper ul').css('width', (totalWidth+5) + 'px');

        $slideshowContainer.find('.thumbnails-wrapper ul li').each(function() {
            $(this).bind('click', function(e) {
                var index = $(this).index();
                slideshows[slideshow_index].slideTo(index, 0);
            });
        });
      });

    });

    // initialize thumbnails on swiper.onInit()
    // function setThumbnails($slideshowContainer, slideshow_index) {
    //     console.log($slideshowContainer);
    //     var thumbnailWidth = $slideshowContainer.find('.thumbnails-wrapper ul li').width(),
    //         totalThumbnails = $slideshowContainer.find('.thumbnails-wrapper ul li').length;
    //
    //     // set width for thumbnails container
    //     $slideshowContainer.find('.thumbnails-wrapper ul').css('width', thumbnailWidth * totalThumbnails + 'px');
    //
    //     // bind click event to each thumbnails
    //     $slideshowContainer.find('.thumbnails-wrapper ul li').each(function() {
    //         $(this).bind('click', function(e) {
    //             var index = $(this).index();
    //             slideshows[slideshow_index].slideTo(index, 0);
    //         });
    //     });
    // }

    // Pan thumbnails on mousemove
    $(".thumbnails-wrapper").each(function(){
      $(this).mousemove(function(e) {
          var elem = $(this);
          var parentOffset = $(this).parent().offset();
          var relX = e.clientX - parentOffset.left;
          moveThumbnails(relX, elem);
      });
    })

    function moveThumbnails(t, elem) {

        var thumbnailsContainer = elem.find('ul');
        var e = thumbnailsContainer.width();
        var slideshowWidth = $(elem).closest(".slideshow-container").width();

        if (e > slideshowWidth && $(window).width() >= 600) {
            var i = mapRange([0, slideshowWidth], [0, e - slideshowWidth], t);
            TweenMax.to(thumbnailsContainer, 1, {
                x: -1 * Math.min(Math.max(parseInt(i), 0), e - slideshowWidth),
                ease: Power2.easeOut
            })
        } else if ($(window).width() < 600) {
            TweenMax.to(thumbnailsContainer, 1, {
                x: 0
            })
        } else {
            TweenMax.to(thumbnailsContainer, 1, {
                x: 0
            })
        }
    }

    function mapRange(t, e, i) {
        return e[0] + (i - t[0]) * (e[1] - e[0]) / (t[1] - t[0])
    }

}
