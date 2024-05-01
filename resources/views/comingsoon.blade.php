<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'White Hat Realty')</title>

    <link rel="stylesheet" href="{{url('assets/libraries/css/bootstrap.min.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="{{url('assets/libraries/css/fonts.css')}}" rel="stylesheet">
    <script src="{{url('assets/libraries/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{url('assets/customs/css/style.css')}}">
    <script src="{{url('assets/libraries/js/jquery.js')}}"></script>
    <script src="{{url('assets/libraries/js/fontsawesome.js')}}"></script>
    <script src="{{url('assets/libraries/js/particles.js')}}"></script>
    <link rel="stylesheet" href="{{url('assets/customs/css/comingsoon.css')}}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />


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
            .sections section:nth-child(even) {
                flex-direction: column-reverse;
            }

            :root {
                --cube-size: 100px;
                --text-size: 20px;
                --border-size: 15px;
            }

            .glass {
                padding: 4rem !important;
                width: 100%;
            }

            .px-5 {
                padding: 0 !important;
            }

            .glass p {
                margin: 0;
                line-height: 1;

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
            position: fixed;
            display: flex;
            top: 0;
            left: 0;
            justify-content: center;
            height: 100vh;
            width: 100%;
            overflow: hidden;
            padding: 100px 0 0;
            font-family: "Space Grotesk", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
            overflow: hidden;
            z-index: 999;
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

        .sections {
            width: 80%;
        }

        .sections section {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin: 20px 0;
        }

        section img {
            width: 70px;
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
            z-index: 2;
            height: 100vh;
            transition: height 0.3s ease;
            overflow: hidden;
        }

        .fixed-content img {
            display: block;
            text-align: center;
            height: 12vh;
            padding: 10px;
            transition: transform 0.5s;
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
            color: white;
            font-size: 1.5rem;
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

        .btnCustom {
            z-index: 1;
            font-size: 17px;
            background: transparent;
            border: none;
            padding: 1em 1.5em;
            color: #ffedd3;
            text-transform: uppercase;
            position: relative;
            transition: 0.5s ease;
            cursor: pointer;
        }

        .btnCustom::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            height: 2px;
            width: 0;
            background-color: #ffc506;
            transition: 0.5s ease;
        }

        .btnCustom:hover {
            color: #1e1e2b;
            transition-delay: 0.5s;
        }

        .btnCustom:hover::before {
            width: 100%;
        }

        .btnCustom::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            height: 0;
            width: 100%;
            background-color: #ffc506;
            transition: 0.4s ease;
            z-index: -1;
        }

        .btnCustom:hover::after {
            height: 100%;
            transition-delay: 0.4s;
            color: aliceblue;
        }

        .margin {
            margin-top: 30px;
        }

        .glass {
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(2.5px);
            -webkit-backdrop-filter: blur(2.5px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        #coming {
            position: relative;
            padding: 1rem;
            top: 0;
        }

        .bg-img {
            display: none;
        }

        .contents {
            display: none;
        }

        @media (min-width: 768px) {
            .customHeads {
                background: #1a5577;
            }

            .fixed-content img {
                height: 9vh;
            }

            .sections section:nth-child(even) {
                flex-direction: row;
            }

            .contents {
                display: block;
            }

            .bg-img {
                display: block;
                width: 100%;
                position: absolute;
                height: 100%;
            }

            .main-div {
                flex-direction: column;
            }

            .fixed-content {
                bottom: 0;
                display: flex;
                height: auto !important;
                background-color: #1b5577;
                transition: width 0.5s ease;
                margin: auto;

            }

            .seven-headers {
                font-size: 2rem;
            }

            .sections {
                width: 100%;
            }

            .sections section {
                flex-direction: row;
                justify-content: space-evenly;
                align-items: center;
            }

            .content {
                width: 50%;
                font-size: 1.5rem;
                line-height: 1;
            }

            section img {
                width: 120px;
            }

            .glass {
                margin: 2rem 4rem;
                padding: 3rem 0rem;
                width: 45%;
            }

            #coming {
                clip-path: polygon(0 0, 64% 0, 54% 100%, 0% 100%);
            }
        }

        #txt {
            display: flex;
            align-items: center;
            justify-content: center;
            flex: 1;
            font-family: sans-serif;
            letter-spacing: 3.5px;
            font-size: 3.5rem;
            font-weight: 700;
            position: relative;
            transform-style: preserve-3d;
            perspective: 100px;
            -webkit-transform-style: preserve-3d;
            -webkit-perspective: 100px;
        }

        #txt>b {
            box-shadow: 0 .4rem .3rem -.3rem #aaa;
            color: #979c9f;
            background: linear-gradient(#aaf, #acf, #afc);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            transform-origin: bottom;
            /* transform:rotateX(-85deg); */
            -webkit-transform-origin: bottom;
            /* -webkit-transform:rotateX(-85deg); */
            animation: getUp 7s;
        }

        #txt>b:nth-child(2) {
            animation-delay: .25s;
        }

        #txt>b:nth-child(3) {
            animation-delay: .5s;
        }

        #txt>b:nth-child(4) {
            animation-delay: .75s;
        }

        #txt>b:nth-child(5) {
            animation-delay: 1s;
        }

        #txt>b:nth-child(6) {
            animation-delay: 1.25s;
        }

        #txt>b:nth-child(7) {
            animation-delay: 1.5s;
        }

        #txt>b:nth-child(8) {
            animation-delay: 1.75s;
        }

        @keyframes getUp {

            0%,
            10%,
            50% {
                transform: rotateX(-35deg);
            }

            100% {
                transform: rotateX(0);
            }
        }

        #linesvg {
            width: 90%;
            position: absolute;
            margin: auto;
            top: 30vh;
            left: 9vw;
        }

        .nav {
            box-shadow: 0 0 10px rgba(0 0 0 / 20%);
            width: 100%;
            height: auto;
            opacity: 0;
            background: #1b5577;
            position: sticky;
            top: 0;
            z-index: 25
        }

        .nav img {
            margin: auto;
            width: 320px;
            height: 100px;
            object-fit: cover
        }

        #vision {
            min-height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="preLoader">
        <div class="background"></div>
        <div class="wrapper">
            <div class="cube">
                <div class="bottom"></div>
                <div class="side back"></div>
                <div class="side left"></div>
                <div class="side right"></div>
                <div class="side front"></div>
            </div>
            <div class="txt" id="txt">
                <b>W</b><b>H</b><b>I</b><b>T</b><b>E</b><b>H</b><b>A</b><b>T</b>
            </div>
            <div class="h1">Whitehat Realty</div> 
        </div>
    </div>
    <div class="postLoader">

        <section class="contents">
            <div class="container">
                <svg id="linesvg" viewBox="0 0 1223 5300" fill="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <path id="motionPath" class="st0" d="M214.587,133.47 C210.605,323.045 975.71,681.403 977.383,834.576 985.408,1165.939 151.8,1046.671 151.8,1512.836 151.8,1706.49 928.793,1989.615 928.793,2183.305 928.793,2651.256 160.137,2446.057 160.137,2885.769 160.137,3046.423 952.908,3411.76 952.908,3572.452 952.908,4057.827 163.366,3661.804 163.366,4224.795 163.366,4741.996 813.844,4387.092 813.844,4904.315" stroke="url('#gradient')" stroke-width="8" />
                    <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" stop-color="#05a" />
                        <stop offset="100%" stop-color="#0a5" />
                    </linearGradient>
                    <image id="motionSVG" class="card-img" href="https://theservtech.com/hodler-gallery/wp-content/uploads/2022/10/black1.png" height="70" width="70" x="-500" y="-500" />
                </svg>
            </div>

        </section>
        <div class="main-div">
            <div id="particles_effect" class="particles-effect"></div>
            <div class="ripple-background">
                <div class="circle medium shade2"></div>
                <div class="circle large shade3"></div>
            </div>
            <div class="sections">
                <section id="W">
                    <div class="d-flex align-items-end customHeads ">
                        <span class="initials">W</span>
                        <span class="seven-headers">isdom:</span>
                    </div>
                    <div class="content">
                        <p>
                            We navigate with wisdom, leveraging our knowledge and experience to steer through the twists
                            and
                            turns
                            of the market.
                        </p>
                    </div>
                </section>
                <section id="H1">
                    <div class="content">
                        <p>
                            Transparency is our cornerstone in the real estate sphere. We believe in open dialogue and
                            integrity in
                            every
                            transaction, fostering trust with our clients and partners.
                        </p>
                    </div>
                    <div class="d-flex align-items-end customHeads ">
                        <span class="initials">H</span>
                        <span class="seven-headers">onesty:</span>
                    </div>
                </section>
                <section id="I">
                    <div class="d-flex align-items-end customHeads ">
                        <span class="initials">I</span>
                        <span class="seven-headers">nnovation:</span>
                    </div>
                    <div class="content">
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
                    <div class="content">
                        <p>
                            Real estate is a team sport, and we thrive on collaboration.
                            Each member of our team brings a unique set of skills to the table, creating a tapestry of
                            expertise
                            that ensures
                            success in every endeavor.
                        </p>
                    </div>
                    <div class="d-flex align-items-end customHeads ">
                        <span class="initials">T</span>
                        <span class="seven-headers">eamwork:</span>
                    </div>
                </section>
                <section id="E">
                    <div class="d-flex align-items-end customHeads ">
                        <span class="initials">E</span>
                        <span class="seven-headers">xcellence:</span>
                    </div>
                    <div class="content">
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
                    <div class="content">
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
                    <div class="d-flex align-items-end customHeads ">
                        <span class="initials">H</span>
                        <span class="seven-headers">umanity:</span>
                    </div>
                </section>
                <section id="A">
                    <div class="d-flex align-items-end customHeads ">
                        <span class="initials">A</span>
                        <span class="seven-headers">daptability:</span>
                    </div>
                    <div class="content">
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
                    <div class="content">
                        <p>
                            In real estate, trust is everything.
                            We honor our commitments and uphold our promises,
                            building a reputation for reliability and integrity that's as solid as the foundations we
                            represent.
                        </p>
                    </div>
                    <div class="d-flex align-items-end customHeads ">
                        <span class="initials">T</span>
                        <span class="seven-headers">rustworthiness:</span>
                    </div>
                </section>
            </div>

            <div class="fixed-content">
                <div><img src="{{url('assets/images/w-01.png')}}"></div>
                <div><img src="{{url('assets/images/h-01.png')}}"></div>
                <div><img src="{{url('assets/images/i-01.png')}}"></div>
                <div><img src="{{url('assets/images/t-01.png')}}"></div>
                <div><img src="{{url('assets/images/e-01.png')}}"></div>
                <div><img src="{{url('assets/images/sign-01.png')}}"></div>
                <div><img src="{{url('assets/images/a-01.png')}}"></div>
                <div><img src="{{url('assets/images/t-01.png')}}"></div>
            </div>
        </div>
        <navbar class="nav">
            <img src="{{url('assets/images/logo.png')}}" alt="" srcset="">
        </navbar>
        <section id="vision">
            <div class="p-5">
                <div class="container">
                    <h3 class="text-light h1">Our Vision</h3>
                    <p class="text-light">
                        The aim of Whitehat Realty is to redefine the real estate experience by blending expertise with innovation, fostering trust, and prioritizing the human element in every transaction. We strive to provide exceptional service, exceed expectations, and make a positive impact in the real estate market
                    </p>
                </div>
            </div>
        </section>
        <section>
            <div id="youtube"> 
            </div>
            <div class="text-center mt-5">
                <button class="btn btn-warning" id="loadMore" page_id="1">Load More</button>
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


                        <form class="p-1 background3" action="{{route('contact-mail')}}" method="POST" id="myForm">
                            @csrf
                            <div class="">
                                <span class="material-symbols-outlined icon2">
                                    person
                                </span>
                                <input type="name" class="form-control inputfield" id="name" placeholder="Name" name="name">

                            </div>
                            <div class="">
                                <label for="mobile">
                                    <span class="material-symbols-outlined icon2">
                                        call
                                    </span>
                                </label>
                                <input type="text" class="form-control inputfield" id="mobile" placeholder="Mobile" name="mobile">
                            </div>
                            <div class="">
                                <span class="material-symbols-outlined icon2">
                                    mail
                                </span>
                                <input type="email" class="form-control inputfield" id="email" placeholder="Email ID" name="email">
                            </div>
                            <div class="margin">
                                <textarea name="message" id="message" cols="5" rows="5" placeholder="Message" class="form-control"></textarea>
                            </div><br>
                            <div>

                            </div>
                            <button class="btnCustom">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </section>
        <div class="position-relative ">
            <img class="bg-img" src="{{url('assets/images/coming.jpeg')}}" alt="" class="w-100 h-100 ">
            <div id="coming" class="top-0 w-100 h-100 bg-dark ">
                <div class="glass">
                    <div class="text-light h1 px-5">Our Website is coming soon</div>
                    <p class="text-light px-5">We are working hard to finish the development of this site. Contact Us to know more Details</p>


                    <form class="p-1 px-5" action="" id="#myForm">
                        <div class="">
                            <span class="material-symbols-outlined icon2">
                                person
                            </span>
                            <input type="name" class="form-control inputfield" id="name" placeholder="Name" name="name">

                        </div>
                        <div class="">
                            <span class="material-symbols-outlined icon2">
                                call
                            </span>
                            <input type="text" class="form-control inputfield" id="mobile" placeholder="Mobile" name="mobile">
                        </div>
                        <div class="">
                            <span class="material-symbols-outlined icon2">
                                mail
                            </span>
                            <input type="email" class="form-control inputfield" id="email" placeholder="Email ID" name="email">
                        </div>
                        <div class="margin">
                            <textarea name="message" id="message" cols="85" rows="5" placeholder="Message" class="form-control"></textarea>
                        </div><br>
                        <button class="btnCustom">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script src="{{url('assets/customs/js/comingsoon.js')}}">
    </script>
    <script src="{{url('assets/libraries/js/gsap.min.js')}}"></script>
    <script src="{{url('assets/libraries/js/scrolltrigger.min.js')}}"></script>
    <script src="{{url('assets/libraries/js/motion.min.js')}}"></script>
    <script src="{{url('assets/libraries/js/drawsvg.js')}}"></script>
    <!-- <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/MotionPathHelper.min.js"></script> -->
    <!-- <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/DrawSVGPlugin3.min.js"></script> -->
    <script>
        var animation;

        gsap.registerPlugin( DrawSVGPlugin, ScrollTrigger);
        gsap.defaults({
            ease: "none"
        });
        const main = gsap.timeline({
                scrollTrigger: {
                    trigger: "#linesvg",
                    scrub: true,
                    start: "top center",
                    end: "bottom bottom"
                }
            })
            .from("#motionPath", {
                drawSVG: 0,
                duration: 4
            }, 0)

        gsap.to('.nav', {
            scrollTrigger: {
                trigger: "#vision",
                //  markers:true,
                scrub: true,
                start: "top +=200px",
                end: "+=100px +=200px",
            },
            opacity: 1,
        })
        $(window).resize(function() {
            ScrollTrigger.refresh();
        })
        if ($(document).width() < 768) {
            const images = document.querySelectorAll('.fixed-content img');
            $(".sections section").each(function(i) {
                gsap.from(images[i], {
                    scrollTrigger: {
                        trigger: this,
                        start: "center center",
                        end: "center center",
                        scrub: true
                    },
                    x: 100
                })
            })
        } else {
            const images = document.querySelectorAll('.fixed-content img');
            $(".sections section").each(function(i) {
                gsap.from(images[i], {
                    scrollTrigger: {
                        trigger: this,
                        start: "center center",
                        end: "center center",
                        scrub: true,
                    },
                    y: 100
                })
            })
        }

        $(document).on('click','#loadMore',function(){
            $(this).html('Loading....')
            let page = parseInt($(this).attr('page_id'));
            $.ajax({
                url: '{{route("load-video")}}?page='+page,
                method: 'GET',
                success: function(data) {
                    if(data.data.next_page_url == null){ $('#loadMore').remove()};
                    page++;
                    $("#loadMore").html('Load More')
                    $("#loadMore").attr('page_id',page);
                    $.each(data.data.data, function(index, data) {
                        let html = `<div class="slide2 f2" style="background-image:url('storage/${data.thumbnail}')">
                            <iframe src="${data.video_source}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            <div>
                                <h5>${data.title}</h5>
                                <p>${data.description}</p>
                                <h4>${data.created_at}</h4>
                            </div>
                        </div>`;
                     $("#youtube").append(html)
                    });
                }
            });
        })
        
    </script>

</body>

</html>