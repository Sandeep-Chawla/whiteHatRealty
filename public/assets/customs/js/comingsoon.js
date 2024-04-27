$(window).on("load", function () {
    $('.preLoader').delay(100).fadeOut("slow");

});
$(document).on("scroll", function () {
    var pixels = $(document).scrollTop();
    var windowHeight = $(window).height();

    $(".sections section").each(function () {
        var sectionTop = $(this).offset().top;
        var sectionHeight = $(this).outerHeight();
        var sectionId = $(this).attr('id');

        if (pixels + windowHeight >= sectionTop && pixels <= sectionTop + sectionHeight) {
            $('#' + sectionId + ' img').addClass('moveInRight');
        } else {
            $('#' + sectionId + ' img').removeClass('moveInRight');
        }
    });
    var pageHeight = $(document).height() - $(window).height();
    var progress = Math.ceil(100 * (pixels / pageHeight / 12.5) + 1) * 12.5;
    if($(document).width()>768){
                $(".fixed-content").css("width", progress + "vw");
            }
            else{
                $(".fixed-content").css("height", progress + "vh");
            }
});



var slide = $(".slide");
var currentPosition = 0;
var animationDuration = 60000; // 40 seconds in milliseconds

function startAnimation() {
    slide.css({
        "animation": "slide " + (animationDuration / 1000) + "s infinite",
        "animation-play-state": "running"
    });
}

function pauseAnimation() {
    currentPosition = getCurrentPosition();
    slide.css({
        "animation-play-state": "paused"
    });
}

function resumeAnimation() {
    slide.css({
        "animation": "slide " + (animationDuration / 1000) + "s infinite",
        "animation-play-state": "running",
        "animation-delay": "-" + (currentPosition / 360) + "s" // Adjust delay based on current position
    });
}

function getCurrentPosition() {
    var transformValue = slide.css("transform");
    if (transformValue !== "none") {
        var matrix = transformValue.match(/matrix.*\((.+)\)/)[1].split(', ');
        return parseInt(matrix[4]); // Extract X translate value
    } else {
        return 0;
    }
}

slide.on("mouseenter", function () {
    pauseAnimation();
});

slide.on("mouseleave", function () {
    resumeAnimation();
});

startAnimation();



//particle js query
particlesJS('particles_effect',

    {
        "particles": {
            "number": {
                "value": 80,
                "density": {
                    "enable": true,
                    "value_area": 800
                }
            },
            "color": {
                "value": "#ffffff"
            },
            "shape": {
                "type": "circle",
                "stroke": {
                    "width": 0,
                    "color": "#000000"
                },
                "polygon": {
                    "nb_sides": 5
                },
                "image": {
                    "src": "img/github.svg",
                    "width": 100,
                    "height": 100
                }
            },
            "opacity": {
                "value": 0.5,
                "random": false,
                "anim": {
                    "enable": false,
                    "speed": 1,
                    "opacity_min": 0.1,
                    "sync": false
                }
            },
            "size": {
                "value": 5,
                "random": true,
                "anim": {
                    "enable": false,
                    "speed": 40,
                    "size_min": 0.1,
                    "sync": false
                }
            },
            "line_linked": {
                "enable": true,
                "distance": 150,
                "color": "#ffffff",
                "opacity": 0.4,
                "width": 1
            },
            "move": {
                "enable": true,
                "speed": 6,
                "direction": "none",
                "random": false,
                "straight": false,
                "out_mode": "out",
                "attract": {
                    "enable": false,
                    "rotateX": 600,
                    "rotateY": 1200
                }
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {
                    "enable": true,
                    "mode": "repulse"
                },
                "onclick": {
                    "enable": true,
                    "mode": "push"
                },
                "resize": true
            },
            "modes": {
                "grab": {
                    "distance": 400,
                    "line_linked": {
                        "opacity": 1
                    }
                },
                "bubble": {
                    "distance": 400,
                    "size": 40,
                    "duration": 2,
                    "opacity": 8,
                    "speed": 3
                },
                "repulse": {
                    "distance": 200
                },
                "push": {
                    "particles_nb": 4
                },
                "remove": {
                    "particles_nb": 2
                }
            }
        },
        "retina_detect": true,
        "config_demo": {
            "hide_card": false,
            "background_color": "#b61924",
            "background_image": "",
            "background_position": "50% 50%",
            "background_repeat": "no-repeat",
            "background_size": "cover"
        }
    }

);
