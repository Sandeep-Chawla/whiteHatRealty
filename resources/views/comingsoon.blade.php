<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'White Hat Realty')</title>

    <link rel="stylesheet" href="{{url('assets/libraries/css/bootstrap.min.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <script src="{{url('assets/libraries/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{url('assets/customs/css/style.css')}}">
    <script src="{{url('assets/libraries/js/jquery.js')}}"></script>
    <script src="{{url('assets/libraries/js/fontsawesome.js')}}"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />


    <style>
        :root {
            --cube-size: 150px;
            --text-size: 40px;
            --border-size: 20px;
            --gap: 1.8;
            --main-color: #2596be;
            --main-color-transparent: rgba(220, 100, 255, 0.4);
            --translateYLeft: 0;
            --translateYRight: 0;
            --duration: 1.7s;
        }

        @media (max-width: 768px) {
            :root {
                --cube-size: 100px;
                --text-size: 20px;
                --border-size: 15px;
            }
        }

        html {
            scroll-behavior: smooth;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        .preLoader {
            color: white;
            background-color: rgb(46, 45, 45);
            position: relative;
            display: flex;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
            padding: 100px 0 0;
            font-family: "Space Grotesk", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
            overflow: hidden;
        }

        .postLoader {
            background-color: #1b5577;
        }

        @keyframes moveInRight {
            0% {
                transform: translateX(-100%);
                opacity: 0;
            }

            100% {
                transform: translateX(0%);
                opacity: 1;
            }
        }

        .moveInRight {
            animation: moveInRight 1s forwards;
        }


        .background {
            position: absolute;
            top: -100%;
            left: -100%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at 100% 50%,
                    transparent 20%,
                    #00d4f0 21%,
                    #00d4f0 34%,
                    transparent 35%,
                    transparent),
                radial-gradient(circle at 0% 50%,
                    transparent 20%,
                    #00d4f0 21%,
                    #00d4f0 34%,
                    transparent 35%,
                    transparent) 0 -50px;
            background-size: 16px 20px;
            opacity: 0.07;
            animation: movingGradient 35s linear infinite;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: auto;
        }

        .cube {
            position: relative;
            top: -10vh;
            z-index: 2;
            transform-style: preserve-3d;
            transform: rotateX(20deg) rotateY(-135deg);
            animation: cubeRotation var(--duration) cubic-bezier(0, 0.5, 0.7, 1) infinite;
        }

        .cube,
        .bottom,
        .side {
            width: var(--cube-size);
            height: var(--cube-size);
        }

        .bottom,
        .side {
            position: absolute;
        }

        .bottom {
            background-color: var(--main-color);
            border-radius: 5px;
            box-shadow: 0 0 200px 0 var(--main-color-transparent);
            transform: translateY(calc(var(--cube-size) / var(--gap))) rotateX(-90deg);
        }

        .side {
            display: flex;
        }

        .side::after {
            content: "";
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.1);
            border: var(--border-size) solid var(--main-color);
            border-radius: 5px;
            box-shadow: 0 0 200px 0 var(--main-color-transparent);
        }

        .back {
            transform: translateZ(calc(var(--cube-size) / var(--gap) * -1)) rotateY(180deg);
        }

        .back::after {
            animation: cubeSideOut var(--duration) cubic-bezier(0.5, 1, 0.5, 1) infinite both;
        }

        .left {
            transform: translateX(calc(var(--cube-size) / var(--gap) * -1)) rotateY(-90deg);
            display: none;
        }

        .right {
            transform: translateX(calc(var(--cube-size) / var(--gap))) rotateY(90deg);
        }

        .right::after {
            animation: cubeSideIn var(--duration) cubic-bezier(0.5, 1, 0.5, 1) infinite both;
        }

        .front {
            transform: translateZ(calc(var(--cube-size) / var(--gap)));
            display: none;
        }

        @keyframes cubeRotation {

            0%,
            80% {
                transform: rotateX(20deg) rotateY(-135deg);
            }

            100% {
                transform: rotateX(20deg) rotateY(-45deg);
            }
        }

        @keyframes cubeSideIn {
            0% {
                transform: translateY(-100%);
                opacity: 0;
            }

            10%,
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes cubeSideOut {

            0%,
            80% {
                transform: translateY(0);
                opacity: 1;
            }

            100% {
                transform: translateY(-100%);
                opacity: 0;
            }
        }

        @keyframes movingGradient {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translate(50%, 50%);
            }
        }


        .postLoader {
            width: 100%;
        }


        .sections section {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 15px 15px 15px 40px;
            text-align: justify;
            margin: 20px 0;
        }

        section img {
            width: 70px;
            padding: 10px;

            position: relative;
        }



        .content {
            color: #fff;
        }

        .main-div {
            display: flex;
            justify-content: space-between;
        }

        .fixed-content {
            position: sticky;
            right: 0;
            top: 0;
            width: 90vh;
            z-index: 2;
            height: 100vh;
            transition: height 0.3s ease;
            overflow: hidden;
        }

        .fixed-content img {
            display: block;
            text-align: center;
            width: 100%;
            height: 12.5vh;
            padding: 10px;
        }



        .main-div {
            background: #1b5577;
            /* Set a specific height */
            min-height: 500px;

            /* Create the parallax scrolling effect */
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }


        .circle {
            position: absolute;
            top: 0;
            left: 0;
            border-radius: 50%;
            background: white;
            animation: ripple 15s infinite;
            box-shadow: 0px 0px 1px 0px #1b5577;
        }

        .small {
            width: 20vw;
            height: 20vh;
            left: -8vw;
            top: -2vh;
        }

        .medium {
            width: 200px;
            height: 200px;
            left: -90px;
            top: -90px;
        }

        .large {
            width: 350px;
            height: 350px;
            left: -140px;
            top: -140px;
        }

        .shade1 {
            opacity: 0.4;
        }

        .shade2 {
            opacity: 0.3;
        }

        .shade3 {
            opacity: 0.2;
        }



        @keyframes ripple {
            0% {
                transform: scale(0.8);
            }

            50% {
                transform: scale(1.2);
            }

            100% {
                transform: scale(0.8);
            }
        }

        .ripple-background {
            z-index: 1;
            position: fixed;
        }


        .seven-headers {

            font-size: 1.5rem;
            text-transform: uppercase;
        }








        #slider::-webkit-scrollbar {
            display: none;
        }

        #slider {
            padding: 30%;
            margin: auto;
            position: relative;
            width: 100%;
            overflow: hidden;
            background: rgba(0, 0, 0, 0.5);
        }

        #slider::before,
        #slider::after {
            background: linear-gradient(to right, rgb(68, 68, 68) 0%, rgba(83, 83, 83, 0) 100%);
            content: "";
            height: 100%;
            position: absolute;
            width: 15%;
            z-index: 2;
        }

        #slider::after {
            right: 0;
            top: 0;
            transform: rotateZ(180deg);
        }

        #slider::before {
            left: 0;
            top: 0;
        }

        #slideTrack {
            display: flex;
            width: calc(250px *15);
            animation-direction: alternate;
            animation-timing-function: linear;
        }

        #slideTrack div {
            position: relative;
            width: 100%;
            padding: 15px;
            display: flex;
            align-items: center;
            perspective: 100px;
        }

        iframe {
            width: 100%;
            transition: transform 1s;
        }

        iframe:hover {
            transform: translateZ(20px);
        }

        @keyframes slide {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(calc(-250px *12));
            }
        }

        .img {
            position: absolute;
            width: 90%;
            transition: all 2s;
        }

        #slideTrack div:hover .img {
            transform: translateY(-200px);
        }


        .icon2 {
            position: relative;
            top: 37px;
            left: 5px;
        }

        .inputfield {
            padding-left: 30px;
        }

        .background3 {
            background: #1a5577;
        }
    </style>
</head>

<body>
    <div class="preLoader">
        <div class="background"></div>
        <div class="wrapper">
            <div class="cube">
                <div class="bottom"> W</div>
                <div class="side back"></div>
                <div class="side left"></div>
                <div class="side right"></div>
                <div class="side front"></div>
            </div>
        </div>
    </div>
    <div class="postLoader">
        <div class="main-div">
            <div class="ripple-background">
                <div class="circle medium shade2"></div>
                <div class="circle large shade3"></div>
            </div>
            <div class="sections">
                <section id="W">
                    <div>
                        <img src="{{url('assets/images/w1.png')}}">
                    </div>
                    <div class="content">
                        <span class="seven-headers"> Wisdom:</span>
                        <p>
                            We navigate with wisdom, leveraging our knowledge and experience to steer through the twists
                            and
                            turns
                            of the market.
                        </p>
                    </div>
                </section>
                <section id="H1">
                    <div>
                        <img src="{{url('assets/images/h1.png')}}">
                    </div>
                    <div class="content">
                        <span class="seven-headers">Honesty:</span>
                        <p>
                            Transparency is our cornerstone in the real estate sphere. We believe in open dialogue and
                            integrity in
                            every
                            transaction, fostering trust with our clients and partners.
                        </p>
                    </div>
                </section>
                <section id="I">
                    <div>
                        <img src="{{url('assets/images/i1.png')}}">
                    </div>
                    <div class="content">
                        <span class="seven-headers">Innovation:</span>
                        <p>
                            At the heart of our real estate philosophy lies innovation. We embrace cutting-edge
                            technologies
                            and
                            imaginative
                            solutions to elevate the real estate experience for our clients. Staying ahead of the curve
                            is
                            not just
                            a goal; it's our
                            way of ensuring excellence in every property venture.
                        </p>

                    </div>
                </section>
                <section id="T1">
                    <div>
                        <img src="{{url('assets/images/t1.png')}}">
                    </div>
                    <div class="content">
                        <span class="seven-headers">Teamwork:</span>
                        <p>
                            Real estate is a team sport, and we thrive on collaboration.
                            Each member of our team brings a unique set of skills to the table, creating a tapestry of
                            expertise
                            that ensures
                            success in every endeavor.
                        </p>
                    </div>
                </section>
                <section id="E">
                    <div>
                        <img src="{{url('assets/images/e1.png')}}">
                    </div>
                    <div class="content">
                        <span class="seven-headers"> Excellence:</span>
                        <p>
                            We set the bar high and strive for excellence in every aspect of our business,
                            from impeccable client service to stellar property representation. It's not just about
                            meeting
                            expectations; it's about
                            exceeding them at every turn.
                        </p>
                    </div>
                </section>
                <section id="H2">
                    <div>
                        <img src="{{url('assets/images/sign1.png')}}">
                    </div>
                    <div class="content">
                        <span class="seven-headers"> Humanity:</span>
                        <p>
                            Beyond the bricks and mortar, real estate is about people.
                            We understand the emotional journey involved in property transactions and approach each
                            interaction with
                            empathy and
                            compassion.
                            Community is at the heart of what we do, and we're dedicated to making a positive impact
                            wherever we go.
                        </p>
                    </div>
                </section>
                <section id="A">
                    <div>
                        <img src="{{url('assets/images/i1.png')}}">
                    </div>
                    <div class="content">
                        <span class="seven-headers">Adaptability:</span>
                        <p>
                            In the ever-shifting landscape of real estate, adaptability is key.
                            We embrace change as an opportunity for growth, constantly evolving to meet the demands of
                            the
                            market
                            and provide
                            innovative solutions to our clients.
                        </p>

                    </div>
                </section>
                <section id="T2">
                    <div>
                        <img src="{{url('assets/images/t1.png')}}">
                    </div>
                    <div class="content">
                        <span class="seven-headers"> Trustworthiness:</span>
                        <p>
                            In real estate, trust is everything.
                            We honor our commitments and uphold our promises,
                            building a reputation for reliability and integrity that's as solid as the foundations we
                            represent.
                        </p>

                    </div>
                </section>
            </div>

            <div class="fixed-content">
                <img src="{{url('assets/images/w1.png')}}">
                <img src="{{url('assets/images/h1.png')}}">
                <img src="{{url('assets/images/i1.png')}}">
                <img src="{{url('assets/images/t1.png')}}">
                <img src="{{url('assets/images/e1.png')}}">
                <img src="{{url('assets/images/sign1.png')}}">
                <img src="{{url('assets/images/a1.png')}}">
                <img src="{{url('assets/images/t1.png')}}">
            </div>
        </div>
        <section id="slider" class="d-grid align-items-center gap-3 overflow-scroll">
            <div id="slideTrack" class="slide">
                <div>
                    <iframe src="https://www.youtube.com/embed/NBcXxd5w7mU?si=1TKnWLjFQMMWFjnU"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <img class="img"
                        src="https://images.unsplash.com/photo-1713184355726-d3a31d822fcc?q=80&w=1771&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="">
                </div>
                <div>
                    <iframe src="https://www.youtube.com/embed/rbg6pFERuWA?si=oXn55ZcYZudVUTK5"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div>
                    <iframe src="https://www.youtube.com/embed/xGSQRJ98nJA?si=pxBKzDiHLy5WgkEG"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div>
                    <iframe src="https://www.youtube.com/embed/mrReXTx2-_8?si=okpvSZJ0EMQgUzw0"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div>
                    <iframe src="https://www.youtube.com/embed/rOdoIajoU5U?si=vEw2fd-_gxTJ7joO"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div>
                    <iframe src="https://www.youtube.com/embed/UjcRtdG3RiQ?si=WRltu0G0R8YLPzBF"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div>
                    <iframe src="https://www.youtube.com/embed/DvCbI_DQ1P0?si=7FxTJ3h0gF83t25j"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div>
                    <iframe src="https://www.youtube.com/embed/u0mSrq_entE?si=vFgjSf5wE3jcuTQo"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div>
                    <iframe src="https://www.youtube.com/embed/w8gr4KqqCyY?si=HPHSsUsHlTdgHGKM"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div>
                    <iframe src="https://www.youtube.com/embed/SlTS4T5ZuAY?si=OwKaMHGVIJS1NgWl"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div>
                    <iframe src="https://www.youtube.com/embed/e6mWswP4fpk?si=dY_G9_FZr9ShNyB5"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div>
                    <iframe src="https://www.youtube.com/embed/Yq47X1eux8o?si=pVjACAhB4l7baSAx"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div>
                    <iframe src="https://www.youtube.com/embed/vvn74hPyoKA?si=3B2CsJ4Bknu_SI5G"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div>
                    <iframe src="https://www.youtube.com/embed/eXkZCJ31ylI?si=m0zYvpShlQC61JwC"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div>
                    <iframe src="https://www.youtube.com/embed/u0mSrq_entE?si=2PE-USHaSV6Zm5Qx"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </section>

        <section class="bg-light">
            <div class="container-fluid background3" style="height: auto;">
                <div class="row">
                    <div class="col-sm-6 p-5">
                        <h2 class="text-light">Get In Touch</h2>
                        <p class="text-light">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <div>
                            <h4 class="text-light">Address</h4>
                            <p class="text-light">Chandra Hieghts, Sector 107, Noida, Uttar Pradesh</p>
                            <hr class="text-light">
                        </div>
                        <div>
                            <h4 class="text-light">Phone</h4>
                            <p class="text-light">(+91) 8081503903</p>
                            <hr class="text-light">
                        </div>
                        <div>
                            <h4 class="text-light">Email</h4>
                            <p class="text-light">reshuverma@gmail.com</p>
                            <hr class="text-light">
                        </div>
                    </div>
                    <div class="col-sm-6 p-5">
                        <h1 class="text-center text-light">Contact Us</h1>


                        <form class="p-1 background3" action="" id="#myForm">
                            <div class="">
                                <span class="material-symbols-outlined icon2">
                                    person
                                </span>
                                <input type="name" class="form-control inputfield" id="name" placeholder="Name"
                                    name="name">

                            </div>
                            <div class="">
                                <span class="material-symbols-outlined icon2">
                                    call
                                </span>
                                <input type="text" class="form-control inputfield" id="mobile" placeholder="Mobile"
                                    name="mobile">
                            </div>
                            <div class="">
                                <span class="material-symbols-outlined icon2">
                                    mail
                                </span>
                                <input type="email" class="form-control inputfield" id="email" placeholder="Email ID"
                                    name="email">
                            </div>
                            <div class="">
                                <span class="material-symbols-outlined icon2">
                                    comment
                                </span>
                                <textarea name="message" id="message" cols="85" rows="5" placeholder="Message"
                                    class="form-control inputfield"></textarea>
                            </div><br>
                            <button class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
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
            $(".fixed-content").css("height", progress + "vh");
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
    </script>
</body>

</html>