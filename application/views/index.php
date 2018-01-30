<?php 
	$path_maincontent = 'files/images/blog/';
?>
<script type="text/javascript">
	jQuery(document).ready(function() {
    jQuery('select').chosen({
        "disable_search_threshold": 10,
        "search_contains": true,
        "allow_single_deselect": true,
        "placeholder_text_multiple": "Type or select some options",
        "placeholder_text_single": "Select an option",
        "no_results_text": "No results match"
    });
});

jQuery(document).ready(function($) {
    jQuery('.hasTooltip').tooltip({
        "html": true
    });
    if (window.MooTools) {

        // Mootools conflict fix for toggle with Bootstrap 3/JQuery
        window.addEvent('load', function() {
            $$('[rel=tooltip],[data-toggle],a[data-toggle],button[data-toggle],[data-toggle=collapse],a[data-toggle=dropdown],.hasTooltip').each(function(e) {
                e.getParent().hide = null;
                e.hide = null;
            });
        });

    }
});
var path = "templates/theme3365/js/";
(function($) {
    $(document).ready(function() {
        var o = $("#back-top");
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                o.fadeIn()
            } else {
                o.fadeOut()
            }
        });
        var $scrollEl = ($.browser.mozilla || $.browser.msie) ? $("html") : $("body");
        o.find("a").click(function() {
            $scrollEl.animate({
                scrollTop: 0
            }, 400);
            return false
        })
    })
})(jQuery);
window.setInterval(function() {
    var r;
    try {
        r = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP")
    } catch (e) {}
    if (r) {
        r.open("GET", "/joomla_61332/index.php?option=com_ajax&format=json", true);
        r.send(null)
    }
}, 840000);
(function($) {
    $(document).ready(function() {
        $(".moduletable#module_107>i.fa-user").click(function() {
            $(".moduletable#module_107").toggleClass("shown")
        })
    })
})(jQuery);
jQuery(function($) {
    $("#style_switcher .toggler").click(function() {
        $("#style_switcher").toggleClass("shown")
    });
    $("#style_switcher").style_switcher("/joomla_61332/templates/theme3365/css/color_schemes/", "/joomla_61332")
});
(function($) {
    $(window).load(function() {
        $("#mod-newsflash-adv__masonry213").masonry({
            itemSelector: ".item"
        })
    })
})(jQuery);;
(function($, undefined) {
    $(document).ready(function() {
        function isIE() {
            var myNav = navigator.userAgent.toLowerCase();
            return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;
        };
        var o = $("#swiper-slider_208");
        var gal = $("#slider-thumbs_208");

        if (o.length) {
            function getSwiperHeight(object, attr) {
                var val = object.attr("data-" + attr),
                    dim;
                if (!val) {
                    return undefined;
                }
                dim = val.match(/(px)|(%)|(vh)$/i);
                if (dim.length) {
                    switch (dim[0]) {
                        case "px":
                            return parseFloat(val);
                        case "vh":
                            return $(window).height() * (parseFloat(val) / 100);
                        case "%":
                            return object.width() * (parseFloat(val) / 100);
                    }
                } else {
                    return undefined;
                }
            }

            function toggleSwiperInnerVideos(swiper) {
                var videos;
                $.grep(swiper.slides, function(element, index) {
                    var $slide = $(element),
                        video;
                    if (index === swiper.activeIndex) {
                        videos = $slide.find("video");
                        if (videos.length) {
                            videos.get(0).play();
                        }
                    } else {
                        $slide.find("video").each(function() {
                            this.pause();
                        });
                    }
                });
            }

            function toggleSwiperCaptionAnimation(swiper) {
                if (isIE() && isIE() < 10) {
                    return;
                }
                var prevSlide = $(swiper.container),
                    nextSlide = $(swiper.slides[swiper.activeIndex]);
                prevSlide.find("[data-caption-animate]").each(function() {
                    var $this = $(this);
                    $this.removeClass("animated").removeClass($this.attr("data-caption-animate")).addClass("not-animated");
                });
                nextSlide.find("[data-caption-animate]").each(function() {
                    var $this = $(this),
                        delay = $this.attr("data-caption-delay");
                    setTimeout(function() {
                        $this.removeClass("not-animated").addClass($this.attr("data-caption-animate")).addClass("animated");
                    }, delay ? parseInt(delay) : 0);
                });
            }

            $(document).ready(function() {
                o.each(function() {
                    var s = $(this);
                    var pag = s.find(".swiper-pagination"),
                        next = s.find(".swiper-button-next"),
                        prev = s.find(".swiper-button-prev"),
                        bar = s.find(".swiper-scrollbar"),
                        h = getSwiperHeight(o, "height"),
                        mh = getSwiperHeight(o, "min-height");
                    s.find(".swiper-slide").each(function() {
                        var $this = $(this),
                            url;
                        if (url = $this.attr("data-slide-bg")) {
                            $this.css({
                                "background-image": "url(" + url + ")",
                                "background-size": "cover"
                            })
                        }
                    }).end().find("[data-caption-animate]").addClass("not-animated").end();

                    var slider = new Swiper(s, {
                        autoplay: s.attr('data-autoplay') ? s.attr('data-autoplay') === "false" ? undefined : s.attr('data-autoplay') : 5000,
                        direction: s.attr('data-direction') ? s.attr('data-direction') : "horizontal",
                        effect: s.attr('data-slide-effect') ? s.attr('data-slide-effect') : "slide",
                        speed: s.attr('data-slide-speed') ? s.attr('data-slide-speed') : 600,
                        keyboardControl: s.attr('data-keyboard') === "true",
                        mousewheelControl: s.attr('data-mousewheel') === "true",
                        mousewheelReleaseOnEdges: s.attr('data-mousewheel-release') === "true",
                        nextButton: next.length ? next.get(0) : null,
                        prevButton: prev.length ? prev.get(0) : null,
                        pagination: pag.length ? pag.get(0) : null,
                        paginationClickable: pag.length ? pag.attr("data-clickable") !== "false" : false,
                        paginationBulletRender: pag.length ? pag.attr("data-index-bullet") === "true" ? function(index, className) {
                            return '<span class="' + className + '">' + (index + 1) + '</span>';
                        } : null : null,
                        scrollbar: bar.length ? bar.get(0) : null,
                        scrollbarDraggable: bar.length ? bar.attr("data-draggable") !== "false" : true,
                        scrollbarHide: bar.length ? bar.attr("data-draggable") === "false" : false,
                        loop: s.attr('data-loop') !== "false",
                        loopedSlides: 6,
                        autoplayDisableOnInteraction: false,
                        onTransitionStart: function(swiper) {
                            toggleSwiperInnerVideos(swiper);
                        },
                        onTransitionEnd: function(swiper) {
                            toggleSwiperCaptionAnimation(swiper);
                        },
                        onInit: function(swiper) {
                            toggleSwiperInnerVideos(swiper);
                            toggleSwiperCaptionAnimation(swiper);
                            var o = $(swiper.container).find('.rd-parallax');
                            if (o.length && window.RDParallax) {
                                o.RDParallax({
                                    layerDirection: ($('html').hasClass("smoothscroll") || $('html').hasClass("smoothscroll-all")) && !isIE() ? "normal" : "inverse"
                                });
                            }
                        }
                    });
                    $(window).on("resize", function() {
                        var mh = getSwiperHeight(s, "min-height"),
                            h = getSwiperHeight(s, "height");
                        if (h) {
                            s.css("height", mh ? mh > h ? mh : h : h);
                        }
                        var galh = getSwiperHeight(gal, "height");
                        if (galh) {
                            gal.css("height", galh);
                        }
                    }).load(function() {
                        s.find("video").each(function() {
                            if (!$(this).parents(".swiper-slide-active").length) {
                                this.pause();
                            }
                        });
                    }).trigger("resize");
                    var galleryThumbs = new Swiper(gal, {
                        spaceBetween: 0,
                        slidesPerView: 6,
                        slideToClickedSlide: true,
                        loop: true,
                        loopedSlides: 6,
                        autoplayDisableOnInteraction: true,
                        /*
                                						onSliderMove(swiper, event) {
                        			                        slider.stopAutoplay();
                        			                    },
                        			                    onTouchEnd(swiper, event) {
                        			                    	slider.startAutoplay();
                        			                    },*/
                        breakpoints: {
                            // when window width is <= 480px
                            480: {
                                slidesPerView: 3,
                                spaceBetween: 0
                            },
                            // when window width is <= 640px
                            768: {
                                slidesPerView: 3,
                                spaceBetween: 0
                            }
                        }
                    });

                    slider.params.control = galleryThumbs;
                    galleryThumbs.params.control = slider;

                });
            });
        }
    });
})(jQuery);

jQuery(function($) {
    var e = $(window).width();
    $("#icemegamenu").find(".icesubMenu").each(function(a) {
        var b = $(this).offset();
        var c = b.left + $(this).width();
        if (c >= e) {
            $(this).addClass("ice_righttoleft")
        }
    });
    $(window).resize(function() {
        var d = $(window).width();
        $("#icemegamenu").find(".icesubMenu").removeClass("ice_righttoleft").each(function(a) {
            var b = $(this).offset();
            var c = b.left + $(this).width();
            if (c >= d) {
                $(this).addClass("ice_righttoleft")
            }
        })
    })
});
	</script>
<div id="wrapper">
            <div class="wrapper-inner">
                <a id="fake" href='#'></a>
<!-- header -->
    <div id="header"><div class="container">
        <div class="row"><!-- Logo -->
                <div id="logo" class="col-sm-6">
                    <a href="https://livedemo00.template-help.com/joomla_61332/">
                        
                    <span class="site-logo"><span class="item_title_char0 item_title_char_odd item_title_char_first_half item_title_char_first">M</span><span class="item_title_char1 item_title_char_even item_title_char_first_half">o</span><span class="item_title_char2 item_title_char_odd item_title_char_first_half">v</span><span class="item_title_char3 item_title_char_even item_title_char_first_half">i</span><span class="item_title_char4 item_title_char_odd item_title_char_first_half">e</span><span class="item_title_char5 item_title_char_even item_title_char_first_half">s</span><span class="item_title_char6 item_title_char_odd item_title_char_first_half"> </span><span class="item_title_char7 item_title_char_even item_title_char_second_half">O</span><span class="item_title_char8 item_title_char_odd item_title_char_second_half">n</span><span class="item_title_char9 item_title_char_even item_title_char_second_half">l</span><span class="item_title_char10 item_title_char_odd item_title_char_second_half">i</span><span class="item_title_char11 item_title_char_even item_title_char_second_half">n</span><span class="item_title_char12 item_title_char_odd item_title_char_second_half item_title_char_last">e</span></span>
                </a>
                </div>
                    <div class="moduletable   col-sm-6"><div class="module_container"><div role="search" class="mod-search custom mod-search__">
  <form action="/joomla_61332/index.php" method="post" class="navbar-form">
  	<label for="searchword-209" class="element-invisible">Search ...</label> <input id="searchword-209" name="searchword" maxlength="200"  class="inputbox mod-search_searchword" type="text" size="0" placeholder=" " required> <button class="fa fa-search" onclick="this.form.searchword.focus();"></button>  	<input type="hidden" name="task" value="search">
  	<input type="hidden" name="option" value="com_search">
  	<input type="hidden" name="Itemid" value="101">
  </form>
</div></div></div></div>
        </div></div>      

<!-- showcase -->
    <div id="showcase">
   <div class="container">
      <div class="row">
         <div class="moduletable   col-sm-12">
            <div class="module_container">
               <div id="swiper-slider_208" class="swiper-container swiper-slider "
                  data-min-height="260px"
                  data-height="33.33333333333333%"
                  data-autoplay="false"
                  data-loop="true"
                  data-slide-effect="slide"
                  >
                  <div class="swiper-wrapper">
                     <div class="swiper-slide"
                        data-slide-bg="files/images/slider/slide-6.jpg"
                        >
                        <div class="swiper-slide-caption"
                           data-caption-animate="fadeIn"
                           data-caption-delay="200">
                        </div>
                     </div>
                     <div class="swiper-slide"
                        data-slide-bg="files/images/slider/slide-5.jpg"
                        >
                        <div class="swiper-slide-caption"
                           data-caption-animate="fadeIn"
                           data-caption-delay="200">
                        </div>
                     </div>
                     <div class="swiper-slide"
                        data-slide-bg="files/images/slider/slide-4.jpg"
                        >
                        <div class="swiper-slide-caption"
                           data-caption-animate="fadeIn"
                           data-caption-delay="200">
                        </div>
                     </div>
                     <div class="swiper-slide"
                        data-slide-bg="files/images/slider/slide-3.jpg"
                        >
                        <div class="swiper-slide-caption"
                           data-caption-animate="fadeIn"
                           data-caption-delay="200">
                        </div>
                     </div>
                     <div class="swiper-slide"
                        data-slide-bg="files/images/slider/slide-2.jpg"
                        >
                        <div class="swiper-slide-caption"
                           data-caption-animate="fadeIn"
                           data-caption-delay="200">
                        </div>
                     </div>
                     <div class="swiper-slide"
                        data-slide-bg="files/images/slider/slide-1.jpg"
                        >
                        <div class="swiper-slide-caption"
                           data-caption-animate="fadeIn"
                           data-caption-delay="200">
                        </div>
                     </div>
                  </div>
                  <!-- Swiper Navigation -->
                  <div class="swiper-button-prev"></div>
                  <div class="swiper-button-next"></div>
               </div>
               <div id="slider-thumbs_208" class="swiper-container swiper-slider slider-thumbs"
                  data-height="118px"
                  >
                  <div class="swiper-wrapper">
                     <div class="swiper-slide" style="background:url(files/images/slider/thumb-6.jpg); background-size:cover;"></div>
                     <div class="swiper-slide" style="background:url(files/images/slider/thumb-5.jpg); background-size:cover;"></div>
                     <div class="swiper-slide" style="background:url(files/images/slider/thumb-4.jpg); background-size:cover;"></div>
                     <div class="swiper-slide" style="background:url(files/images/slider/thumb-3.jpg); background-size:cover;"></div>
                     <div class="swiper-slide" style="background:url(files/images/slider/thumb-2.jpg); background-size:cover;"></div>
                     <div class="swiper-slide" style="background:url(files/images/slider/thumb-1.jpg); background-size:cover;"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>  

<!-- maintop -->
    <div id="maintop">
   <div class="container">
      <div class="row">
         <div class="moduletable center online  col-sm-12">
            <div class="module_container">
               <header class='page_header'>
                  <h1 class="moduleTitle "><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">Best</span> <span class="item_title_part_1 item_title_part_even item_title_part_first_half">movies</span> <span class="item_title_part_2 item_title_part_odd item_title_part_first_half">online</span> <span class="item_title_part_3 item_title_part_even item_title_part_second_half">for</span> <span class="item_title_part_4 item_title_part_odd item_title_part_second_half item_title_part_last">free</span></h1>
               </header>
               <div class="mod-newsflash-adv mod-newsflash-adv__center online cols-4" id="module_212">
                  <div class="pretext">
                     Most Popular Movies - Watch All Movies Online  
                  </div>
                  <div class="row">
                     <article class="col-sm-3 item item_num0 item__module  " id="item_163">
                        <div class="item_content">
                           <!-- Intro Image -->
                           <figure class="item_img img-intro img-intro__"> 
                              <img src="files/images/test/page1-img13.jpg" alt="">
                           </figure>
                           <!-- Item title -->
                           <h2 class="item_title item_title__center online"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first item_title_part_last">Action</span></h2>
                           <!-- Introtext -->
                           <div class="item_introtext">
                              <a class="btn" href="#">Watch Online</a>	
                           </div>
                           <!-- Read More link -->
                        </div>
                     </article>
                     <article class="col-sm-3 item item_num1 item__module  " id="item_164">
                        <div class="item_content">
                           <!-- Intro Image -->
                           <figure class="item_img img-intro img-intro__"> 
                              <img src="files/images/test/page1-img14.jpg" alt="">
                           </figure>
                           <!-- Item title -->
                           <h2 class="item_title item_title__center online"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first item_title_part_last">Adventure</span></h2>
                           <!-- Introtext -->
                           <div class="item_introtext">
                              <a class="btn" href="#">Watch Online</a>	
                           </div>
                           <!-- Read More link -->
                        </div>
                     </article>
                     <article class="col-sm-3 item item_num2 item__module  " id="item_165">
                        <div class="item_content">
                           <!-- Intro Image -->
                           <figure class="item_img img-intro img-intro__"> 
                              <img src="files/images/test/page1-img15.jpg" alt="">
                           </figure>
                           <!-- Item title -->
                           <h2 class="item_title item_title__center online"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first item_title_part_last">Comedy</span></h2>
                           <!-- Introtext -->
                           <div class="item_introtext">
                              <a class="btn" href="#">Watch Online</a>	
                           </div>
                           <!-- Read More link -->
                        </div>
                     </article>
                     <article class="col-sm-3 item item_num3 item__module  lastItem" id="item_166">
                        <div class="item_content">
                           <!-- Intro Image -->
                           <figure class="item_img img-intro img-intro__"> 
                              <img src="files/images/test/page1-img16.jpg" alt="">
                           </figure>
                           <!-- Item title -->
                           <h2 class="item_title item_title__center online"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first item_title_part_last">Drama</span></h2>
                           <!-- Introtext -->
                           <div class="item_introtext">
                              <a class="btn" href="#">Watch Online</a>	
                           </div>
                           <!-- Read More link -->
                        </div>
                     </article>
                  </div>
                  <div class="clearfix"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Main Content row -->
    <div id="content">
   <div class="container">
      <div class="row">
         <div class="content-inner">
            <!-- Left sidebar -->
            <div id="component" class="col-sm-8">
               <main role="main">
                  <div id="system-message-container">
                  </div>
                  <section class="page-blog page-blog__home" itemscope itemtype="https://schema.org/Blog">
                     <header class="page_header">
                        <h1><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">Latest</span> <span class="item_title_part_1 item_title_part_even item_title_part_second_half item_title_part_last">movies</span></h1>
                     </header>
                     <div class="items-row cols-4 row">
                        <div class="col-sm-3">
                           <article class="item column-1" id="item-118">
                              <!-- Intro image -->
                              <figure class="item_img img-intro img-intro__none">
                                 <a href="Movie?id=55">
                                 <img src="<?=$path_maincontent;?>blog-img1.jpg" alt=""/>
                                 </a>
                              </figure>
                              <!--  title/author -->
                              <header class="item_header">
                                 <h6 class="item_title"><a href="/joomla_61332/index.php/118-the-hobbit"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">The</span> <span class="item_title_part_1 item_title_part_even item_title_part_second_half item_title_part_last">Hobbit</span></a></h6>
                              </header>
                              <!-- Introtext -->
                              <div class="item_introtext">
                              </div>
                              <!-- info BOTTOM -->
                              <!-- Tags -->
                              <!-- More -->
                              <a class="btn btn-info" href="/joomla_61332/index.php/118-the-hobbit">
                              <span>
                              Read more	</span>
                              </a>
                           </article>
                           <!-- end item -->
                        </div>
                        <!-- end spann -->
                        <div class="col-sm-3">
                           <article class="item column-2" id="item-160">
                              <!-- Intro image -->
                              <figure class="item_img img-intro img-intro__none">
                                 <a href="/joomla_61332/index.php/160-a-tale-of-love">
                                 <img src="<?=$path_maincontent;?>blog-img2.jpg" alt=""/>
                                 </a>
                              </figure>
                              <!--  title/author -->
                              <header class="item_header">
                                 <h6 class="item_title"><a href="/joomla_61332/index.php/160-a-tale-of-love"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">A</span> <span class="item_title_part_1 item_title_part_even item_title_part_first_half">Tale</span> <span class="item_title_part_2 item_title_part_odd item_title_part_first_half">of</span> <span class="item_title_part_3 item_title_part_even item_title_part_second_half">Love</span> <span class="item_title_part_4 item_title_part_odd item_title_part_second_half item_title_part_last">...</span></a></h6>
                              </header>
                              <!-- Introtext -->
                              <div class="item_introtext">
                              </div>
                              <!-- info BOTTOM -->
                              <!-- Tags -->
                              <!-- More -->
                              <a class="btn btn-info" href="/joomla_61332/index.php/160-a-tale-of-love">
                              <span>
                              Read more	</span>
                              </a>
                           </article>
                           <!-- end item -->
                        </div>
                        <!-- end spann -->
                        <div class="col-sm-3">
                           <article class="item column-3" id="item-119">
                              <!-- Intro image -->
                              <figure class="item_img img-intro img-intro__none">
                                 <a href="/joomla_61332/index.php/119-the-impossible">
                                 <img src="<?=$path_maincontent;?>blog-img3.jpg" alt=""/>
                                 </a>
                              </figure>
                              <!--  title/author -->
                              <header class="item_header">
                                 <h6 class="item_title"><a href="/joomla_61332/index.php/119-the-impossible"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">The</span> <span class="item_title_part_1 item_title_part_even item_title_part_second_half item_title_part_last">Impossible</span></a></h6>
                              </header>
                              <!-- Introtext -->
                              <div class="item_introtext">
                              </div>
                              <!-- info BOTTOM -->
                              <!-- Tags -->
                              <!-- More -->
                              <a class="btn btn-info" href="/joomla_61332/index.php/119-the-impossible">
                              <span>
                              Read more	</span>
                              </a>
                           </article>
                           <!-- end item -->
                        </div>
                        <!-- end spann -->
                        <div class="col-sm-3">
                           <article class="item column-4" id="item-152">
                              <!-- Intro image -->
                              <figure class="item_img img-intro img-intro__none">
                                 <a href="/joomla_61332/index.php/152-avatar">
                                 <img src="<?=$path_maincontent;?>blog-img4.jpg" alt=""/>
                                 </a>
                              </figure>
                              <!--  title/author -->
                              <header class="item_header">
                                 <h6 class="item_title"><a href="/joomla_61332/index.php/152-avatar"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first item_title_part_last">Avatar</span></a></h6>
                              </header>
                              <!-- Introtext -->
                              <div class="item_introtext">
                              </div>
                              <!-- info BOTTOM -->
                              <!-- Tags -->
                              <!-- More -->
                              <a class="btn btn-info" href="/joomla_61332/index.php/152-avatar">
                              <span>
                              Read more	</span>
                              </a>
                           </article>
                           <!-- end item -->
                        </div>
                        <!-- end spann -->
                     </div>
                     <!-- end row -->
                     <div class="items-row cols-4 row">
                        <div class="col-sm-3">
                           <article class="item column-1" id="item-120">
                              <!-- Intro image -->
                              <figure class="item_img img-intro img-intro__none">
                                 <a href="/joomla_61332/index.php/120-alice-in-wonderland">
                                 <img src="<?=$path_maincontent;?>blog-img5.jpg" alt=""/>
                                 </a>
                              </figure>
                              <!--  title/author -->
                              <header class="item_header">
                                 <h6 class="item_title"><a href="/joomla_61332/index.php/120-alice-in-wonderland"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">Alice</span> <span class="item_title_part_1 item_title_part_even item_title_part_first_half">in</span> <span class="item_title_part_2 item_title_part_odd item_title_part_second_half item_title_part_last">Wonderland</span></a></h6>
                              </header>
                              <!-- Introtext -->
                              <div class="item_introtext">
                              </div>
                              <!-- info BOTTOM -->
                              <!-- Tags -->
                              <!-- More -->
                              <a class="btn btn-info" href="/joomla_61332/index.php/120-alice-in-wonderland">
                              <span>
                              Read more	</span>
                              </a>
                           </article>
                           <!-- end item -->
                        </div>
                        <!-- end spann -->
                        <div class="col-sm-3">
                           <article class="item column-2" id="item-155">
                              <!-- Intro image -->
                              <figure class="item_img img-intro img-intro__none">
                                 <a href="/joomla_61332/index.php/155-333-haunted">
                                 <img src="<?=$path_maincontent;?>blog-img6.jpg" alt=""/>
                                 </a>
                              </figure>
                              <!--  title/author -->
                              <header class="item_header">
                                 <h6 class="item_title"><a href="/joomla_61332/index.php/155-333-haunted"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">333</span> <span class="item_title_part_1 item_title_part_even item_title_part_second_half item_title_part_last">Haunted</span></a></h6>
                              </header>
                              <!-- Introtext -->
                              <div class="item_introtext">
                              </div>
                              <!-- info BOTTOM -->
                              <!-- Tags -->
                              <!-- More -->
                              <a class="btn btn-info" href="/joomla_61332/index.php/155-333-haunted">
                              <span>
                              Read more	</span>
                              </a>
                           </article>
                           <!-- end item -->
                        </div>
                        <!-- end spann -->
                        <div class="col-sm-3">
                           <article class="item column-3" id="item-10">
                              <!-- Intro image -->
                              <figure class="item_img img-intro img-intro__none">
                                 <a href="/joomla_61332/index.php/10-007-spectre">
                                 <img src="<?=$path_maincontent;?>blog-img7.jpg" alt=""/>
                                 </a>
                              </figure>
                              <!--  title/author -->
                              <header class="item_header">
                                 <h6 class="item_title"><a href="/joomla_61332/index.php/10-007-spectre"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">007</span> <span class="item_title_part_1 item_title_part_even item_title_part_second_half item_title_part_last">Spectre</span></a></h6>
                              </header>
                              <!-- Introtext -->
                              <div class="item_introtext">
                              </div>
                              <!-- info BOTTOM -->
                              <!-- Tags -->
                              <!-- More -->
                              <a class="btn btn-info" href="/joomla_61332/index.php/10-007-spectre">
                              <span>
                              Read more	</span>
                              </a>
                           </article>
                           <!-- end item -->
                        </div>
                        <!-- end spann -->
                        <div class="col-sm-3">
                           <article class="item column-4" id="item-157">
                              <!-- Intro image -->
                              <figure class="item_img img-intro img-intro__none">
                                 <a href="/joomla_61332/index.php/157-me-before-you">
                                 <img src="<?=$path_maincontent;?>blog-img8.jpg" alt=""/>
                                 </a>
                              </figure>
                              <!--  title/author -->
                              <header class="item_header">
                                 <h6 class="item_title"><a href="/joomla_61332/index.php/157-me-before-you"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">Me</span> <span class="item_title_part_1 item_title_part_even item_title_part_first_half">Before</span> <span class="item_title_part_2 item_title_part_odd item_title_part_second_half item_title_part_last">You</span></a></h6>
                              </header>
                              <!-- Introtext -->
                              <div class="item_introtext">
                              </div>
                              <!-- info BOTTOM -->
                              <!-- Tags -->
                              <!-- More -->
                              <a class="btn btn-info" href="/joomla_61332/index.php/157-me-before-you">
                              <span>
                              Read more	</span>
                              </a>
                           </article>
                           <!-- end item -->
                        </div>
                        <!-- end spann -->
                     </div>
                     <!-- end row -->
                     <div class="items-row cols-4 row">
                        <div class="col-sm-3">
                           <article class="item column-1" id="item-9">
                              <!-- Intro image -->
                              <figure class="item_img img-intro img-intro__none">
                                 <a href="/joomla_61332/index.php/9-mother-s-day">
                                 <img src="<?=$path_maincontent;?>blog-img9.jpg" alt=""/>
                                 </a>
                              </figure>
                              <!--  title/author -->
                              <header class="item_header">
                                 <h6 class="item_title"><a href="/joomla_61332/index.php/9-mother-s-day"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">Mother’s</span> <span class="item_title_part_1 item_title_part_even item_title_part_second_half item_title_part_last">Day</span></a></h6>
                              </header>
                              <!-- Introtext -->
                              <div class="item_introtext">
                              </div>
                              <!-- info BOTTOM -->
                              <!-- Tags -->
                              <!-- More -->
                              <a class="btn btn-info" href="/joomla_61332/index.php/9-mother-s-day">
                              <span>
                              Read more	</span>
                              </a>
                           </article>
                           <!-- end item -->
                        </div>
                        <!-- end spann -->
                        <div class="col-sm-3">
                           <article class="item column-2" id="item-154">
                              <!-- Intro image -->
                              <figure class="item_img img-intro img-intro__none">
                                 <a href="/joomla_61332/index.php/154-the-help">
                                 <img src="<?=$path_maincontent;?>blog-img10.jpg" alt=""/>
                                 </a>
                              </figure>
                              <!--  title/author -->
                              <header class="item_header">
                                 <h6 class="item_title"><a href="/joomla_61332/index.php/154-the-help"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">The</span> <span class="item_title_part_1 item_title_part_even item_title_part_second_half item_title_part_last">Help</span></a></h6>
                              </header>
                              <!-- Introtext -->
                              <div class="item_introtext">
                              </div>
                              <!-- info BOTTOM -->
                              <!-- Tags -->
                              <!-- More -->
                              <a class="btn btn-info" href="/joomla_61332/index.php/154-the-help">
                              <span>
                              Read more	</span>
                              </a>
                           </article>
                           <!-- end item -->
                        </div>
                        <!-- end spann -->
                        <div class="col-sm-3">
                           <article class="item column-3" id="item-13">
                              <!-- Intro image -->
                              <figure class="item_img img-intro img-intro__none">
                                 <a href="/joomla_61332/index.php/13-the-hunger-games">
                                 <img src="<?=$path_maincontent;?>blog-img11.jpg" alt=""/>
                                 </a>
                              </figure>
                              <!--  title/author -->
                              <header class="item_header">
                                 <h6 class="item_title"><a href="/joomla_61332/index.php/13-the-hunger-games"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">The</span> <span class="item_title_part_1 item_title_part_even item_title_part_first_half">Hunger</span> <span class="item_title_part_2 item_title_part_odd item_title_part_second_half item_title_part_last">Games</span></a></h6>
                              </header>
                              <!-- Introtext -->
                              <div class="item_introtext">
                              </div>
                              <!-- info BOTTOM -->
                              <!-- Tags -->
                              <!-- More -->
                              <a class="btn btn-info" href="/joomla_61332/index.php/13-the-hunger-games">
                              <span>
                              Read more	</span>
                              </a>
                           </article>
                           <!-- end item -->
                        </div>
                        <!-- end spann -->
                        <div class="col-sm-3">
                           <article class="item column-4" id="item-151">
                              <!-- Intro image -->
                              <figure class="item_img img-intro img-intro__none">
                                 <a href="/joomla_61332/index.php/151-everest">
                                 <img src="<?=$path_maincontent;?>blog-img12.jpg" alt=""/>
                                 </a>
                              </figure>
                              <!--  title/author -->
                              <header class="item_header">
                                 <h6 class="item_title"><a href="/joomla_61332/index.php/151-everest"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first item_title_part_last">Everest</span></a></h6>
                              </header>
                              <!-- Introtext -->
                              <div class="item_introtext">
                              </div>
                              <!-- info BOTTOM -->
                              <!-- Tags -->
                              <!-- More -->
                              <a class="btn btn-info" href="/joomla_61332/index.php/151-everest">
                              <span>
                              Read more	</span>
                              </a>
                           </article>
                           <!-- end item -->
                        </div>
                        <!-- end spann -->
                     </div>
                     <!-- end row -->
                     <footer class="pagination">
                        <ul class="pagination-list">
                           <li class="hidden-phone"><span class="pagenav">1</span></li>
                           <li class="hidden-phone"><a href="/joomla_61332/index.php?start=12" class="pagenav">2</a></li>
                           <li><a href="/joomla_61332/index.php?start=12" class="pagenav"><i class="icon-chevron-right fa fa-angle-right"></i></a></li>
                           <li><a href="/joomla_61332/index.php?start=12" class="pagenav"><i class="icon-forward fa fa-angle-double-right"></i></a></li>
                        </ul>
                     </footer>
                  </section>
               </main>
            </div>
            <!-- aside-right -->
            <div id="aside-right" class="col-sm-4">
               <div class="moduletable ">
                  <div class="module_container">
                     <header class='page_header'>
                        <h6 class="moduleTitle title"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">Popular</span> <span class="item_title_part_1 item_title_part_even item_title_part_second_half item_title_part_last">films</span></h6>
                     </header>
                     <div class="mod-newsflash-adv list mod-newsflash-adv__ cols-1" id="module_210">
                        <div class="row">
                           <article class="col-sm-12 item item_num0 item__module  " id="item_144">
                              <span class="dropcap">1.</span>
                              <div class="item_content">
                                 <!-- Item title -->
                                 <h6 class="item_title item_title__"><a href="/joomla_61332/index.php/65-home/popular-films/144-trolls-2016"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">Trolls</span> <span class="item_title_part_1 item_title_part_even item_title_part_second_half item_title_part_last">(2016)</span></a></h6>
                                 <!-- Read More link -->
                              </div>
                           </article>
                        </div>
                        <div class="row">
                           <article class="col-sm-12 item item_num1 item__module  " id="item_145">
                              <span class="dropcap">2.</span>
                              <div class="item_content">
                                 <!-- Item title -->
                                 <h6 class="item_title item_title__"><a href="/joomla_61332/index.php/65-home/popular-films/145-romance-1999"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">Romance</span> <span class="item_title_part_1 item_title_part_even item_title_part_second_half item_title_part_last">(1999)</span></a></h6>
                                 <!-- Read More link -->
                              </div>
                           </article>
                        </div>
                        <div class="row">
                           <article class="col-sm-12 item item_num2 item__module  " id="item_146">
                              <span class="dropcap">3.</span>
                              <div class="item_content">
                                 <!-- Item title -->
                                 <h6 class="item_title item_title__"><a href="/joomla_61332/index.php/65-home/popular-films/146-doctor-strange-2016"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">Doctor</span> <span class="item_title_part_1 item_title_part_even item_title_part_first_half">Strange</span> <span class="item_title_part_2 item_title_part_odd item_title_part_second_half item_title_part_last">(2016)</span></a></h6>
                                 <!-- Read More link -->
                              </div>
                           </article>
                        </div>
                        <div class="row">
                           <article class="col-sm-12 item item_num3 item__module  " id="item_147">
                              <span class="dropcap">4.</span>
                              <div class="item_content">
                                 <!-- Item title -->
                                 <h6 class="item_title item_title__"><a href="/joomla_61332/index.php/65-home/popular-films/147-keeping-up-with-the-joneses-2016"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">Keeping</span> <span class="item_title_part_1 item_title_part_even item_title_part_first_half">Up</span> <span class="item_title_part_2 item_title_part_odd item_title_part_first_half">with</span> <span class="item_title_part_3 item_title_part_even item_title_part_second_half">the</span> <span class="item_title_part_4 item_title_part_odd item_title_part_second_half">Joneses</span> <span class="item_title_part_5 item_title_part_even item_title_part_second_half item_title_part_last">(2016)</span></a></h6>
                                 <!-- Read More link -->
                              </div>
                           </article>
                        </div>
                        <div class="row">
                           <article class="col-sm-12 item item_num4 item__module  " id="item_148">
                              <span class="dropcap">5.</span>
                              <div class="item_content">
                                 <!-- Item title -->
                                 <h6 class="item_title item_title__"><a href="/joomla_61332/index.php/65-home/popular-films/148-the-bfg-2016"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">The</span> <span class="item_title_part_1 item_title_part_even item_title_part_first_half">BFG</span> <span class="item_title_part_2 item_title_part_odd item_title_part_second_half item_title_part_last">(2016)</span></a></h6>
                                 <!-- Read More link -->
                              </div>
                           </article>
                        </div>
                        <div class="row">
                           <article class="col-sm-12 item item_num5 item__module  " id="item_149">
                              <span class="dropcap">6.</span>
                              <div class="item_content">
                                 <!-- Item title -->
                                 <h6 class="item_title item_title__"><a href="/joomla_61332/index.php/65-home/popular-films/149-the-accountant-2016"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">The</span> <span class="item_title_part_1 item_title_part_even item_title_part_first_half">Accountant</span> <span class="item_title_part_2 item_title_part_odd item_title_part_second_half item_title_part_last">(2016)</span></a></h6>
                                 <!-- Read More link -->
                              </div>
                           </article>
                        </div>
                        <div class="row">
                           <article class="col-sm-12 item item_num6 item__module  lastItem" id="item_150">
                              <span class="dropcap">7.</span>
                              <div class="item_content">
                                 <!-- Item title -->
                                 <h6 class="item_title item_title__"><a href="/joomla_61332/index.php/65-home/popular-films/150-boo-a-madea-halloween-2016"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">Boo!</span> <span class="item_title_part_1 item_title_part_even item_title_part_first_half">A</span> <span class="item_title_part_2 item_title_part_odd item_title_part_first_half">Madea</span> <span class="item_title_part_3 item_title_part_even item_title_part_second_half">Halloween</span> <span class="item_title_part_4 item_title_part_odd item_title_part_second_half item_title_part_last">(2016)</span></a></h6>
                                 <!-- Read More link -->
                              </div>
                           </article>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
               </div>
               <div class="moduletable ">
                  <div class="module_container">
                     <header class='page_header'>
                        <h6 class="moduleTitle "><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first item_title_part_last">News</span></h6>
                     </header>
                     <div class="mod-newsflash-adv news mod-newsflash-adv__ cols-1" id="module_211">
                        <div class="row">
                           <article class="col-sm-12 item item_num0 item__module  " id="item_161">
                              <div class="item_content">
                                 <!-- Item title -->
                                 <h3 class="item_title item_title__"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">Adventure</span> <span class="item_title_part_1 item_title_part_even item_title_part_first_half">Movies:</span> <span class="item_title_part_2 item_title_part_odd item_title_part_first_half">Action</span> <span class="item_title_part_3 item_title_part_even item_title_part_first_half">Mixed</span> <span class="item_title_part_4 item_title_part_odd item_title_part_second_half">in</span> <span class="item_title_part_5 item_title_part_even item_title_part_second_half">Beautiful</span> <span class="item_title_part_6 item_title_part_odd item_title_part_second_half item_title_part_last">Locales</span></h3>
                                 <!-- Introtext -->
                                 <div class="item_introtext">
                                    Adventure movies suck a viewer into the movie and keep him glued to the edge of the seat until the end, in ...	
                                 </div>
                                 <time datetime="2016-11-21 08:47" class="item_published">
                                 November 21, 2016	</time>
                                 <!-- Read More link -->
                              </div>
                              <div class="clearfix"></div>
                           </article>
                        </div>
                        <div class="row">
                           <article class="col-sm-12 item item_num1 item__module  lastItem" id="item_162">
                              <div class="item_content">
                                 <!-- Item title -->
                                 <h3 class="item_title item_title__"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">The</span> <span class="item_title_part_1 item_title_part_even item_title_part_first_half">Wonder</span> <span class="item_title_part_2 item_title_part_odd item_title_part_first_half">World</span> <span class="item_title_part_3 item_title_part_even item_title_part_second_half">of</span> <span class="item_title_part_4 item_title_part_odd item_title_part_second_half">Kids’</span> <span class="item_title_part_5 item_title_part_even item_title_part_second_half item_title_part_last">Movies</span></h3>
                                 <!-- Introtext -->
                                 <div class="item_introtext">
                                    Online streaming movies are doing a great job in the development of kids by giving the opportunity to watch various ...	
                                 </div>
                                 <time datetime="2016-11-21 08:47" class="item_published">
                                 November 21, 2016	</time>
                                 <!-- Read More link -->
                              </div>
                              <div class="clearfix"></div>
                           </article>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

             </div>
        </div>