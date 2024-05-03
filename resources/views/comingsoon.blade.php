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

        @media (max-width: 500px) {
            .fixing img {
                height: 4vh !important;
                width: 7vw;
                padding: 0 !important;
            }

            .typing_text {
                font-size: 1rem;
                line-height: 1.5rem;
                width: 100%;
            }

            .slide2 {
                width: 90%;
                height: 40vw;
            }

            iframe {
                height: 40vw;
            }

            #youtube {
                justify-content: center;
            }

            .sections section {
                width: 90%;
                margin: auto;
            }

            .initials {
                font-size: 5rem;
            }

            .seven-headers {
                font-size: 1rem !important;
            }

            .glass {
                width: 100%;
            }

            .sections section:nth-child(even) {
                flex-direction: column-reverse;
            }

            .fixed-content {
                width: 0;
            }

            .content p {
                padding: 20px;
            }
        }

        @media (min-width: 501px) and (max-width: 768px) {
            .fixed-content {
                width: 0;
            }

            .content p {
                padding: 20px;
            }

            .slide2 {
                width: 47%;
                height: 20vw;
            }

            iframe {
                height: 20vw;
            }

            .sections section:nth-child(even) {
                flex-direction: column-reverse;
            }

            :root {
                --cube-size: 100px;
                --text-size: 20px;
                --border-size: 15px;
            }

            .glass {
                padding: 2rem !important;
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

        .content {
            margin-top: 20px;
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
            width: 100%;
            margin: auto;
        }

        .sections section {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: justify;
            margin-top: 10px !important;
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
            top: 45px;
            left: 15px;
            margin-bottom: -45px
        }

        .inputfield {
            padding: 10px;
            border-left: 0;
        }

        .form-control:focus,
        .inputfield:focus {
            box-shadow: none;
            outline: none;
            border: 1px solid #ced4da;
            border-left: 0;
        }

        .input-group:focus-within {
            border-bottom: 2px solid #1b5577 !important;
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
            width: 80%;
            margin: auto;
        }

        #coming {
            position: relative;
            padding: 2vw 0;
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
                height: 5vw;
                max-height: 5vw;
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
                background-position: center 50vh;
            }

            .seven-headers {
                font-size: 2rem;
            }

            .sections {
                width: 100%;
            }

            .sections section {
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
                margin: auto;
                width: 80%;
                text-align: justify;
            }

            .content {
                width: 50%;
                font-size: 1.2rem;
                background-repeat: no-repeat;
                background-position: center;
                line-height: 1.9rem;
                background-size: 80%;
            }

            section img {
                width: 120px;
            }

            .glass {
                margin: 2rem 10vw;
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
            opacity: 1;
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
        .content p {
            background-color: rgb(37 101 139 / 70%);
            padding: 50px;
            border-radius: 20px
        }

        .line {
            position: relative;
            top: 0;
            height: 1px;
            width: 90%;
            left: 0;
            border: 1px dashed #fff;
            display: block
        }

        .line::before {
            content: '';
            width: 1px;
            height: 45vh;
            border: 1px dashed #fff;
            top: -45vh;
            position: relative;
            right: 0;
            transform: rotate(-180deg);
            display: block
        }

        .line::after {
            content: '';
            position: relative;
            width: 1px;
            height: 45vh;
            text-align: right;
            border: 1px dashed #fff;
            top: -45vh;
            left: 100%;
            display: block;
        }
        .fixing {
            position: fixed !important;
            background-color: transparent;
            background-image: url(assets/images/coming-soon2.png);
            margin: 0 auto;
            left: 0;
            height: 30vh !important;
            transition: all 1s ease-in-out;
            background-position: center;
            background-repeat: no-repeat;
            width: 100% !important;
            display: flex;
            background-size: contain;
            top: 10vh;
            align-items: center;
            justify-content: center;

        }

        .coming-img {
            position: sticky;
            top: 38vh;
            opacity: 0.3;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="preLoader">
        <div class="up"> <img src="{{url('assets/images/logo.png')}}" alt="" srcset=""></div>
        <div class="down"><img src="{{url('assets/images/logo.png')}}" alt="" srcset=""></div>
    </div>
    <div class="postLoader">
        <div class="main-div">
            <div id="particles_effect" class="particles-effect"></div>
            <div class="ripple-background">
                <div class="circle medium shade2"></div>
                <div class="circle large shade3"></div>
            </div>
            <div class="sections">
                <section id="W">
                    <div class="d-flex align-items-end customHeads ">
                        <span class="seven-headers"><span class="initials">W</span>isdom:</span>
                    </div>
                    <div class="content" style="background-image: url('assets/images/shadows/w-01.png')">
                        <p>
                            We navigate with wisdom, leveraging our knowledge and experience to steer through the twists
                            and
                            turns
                            of the market.
                        </p>
                    </div>
                </section>
                <div class="container">
                    <span class="line"></span>
                </div>
                <section id="H1">
                    <div class="content" style="background-image: url('assets/images/shadows/h-02.png')">
                        <p>
                            Transparency is our cornerstone in the real estate sphere. We believe in open dialogue and
                            integrity in
                            every
                            transaction, fostering trust with our clients and partners.
                        </p>
                    </div>
                    <div class="d-flex align-items-end customHeads ">
                        <span class="seven-headers"><span class="initials">H</span>onesty:</span>
                    </div>

                </section>
                <div class="container">
                    <span class="line" style="transform: rotateX(180deg);"></span>
                </div>
                <section id="I">

                    <div class="d-flex align-items-end customHeads ">
                        <span class="seven-headers"><span class="initials">I</span>nnovation:</span>
                    </div>
                    <div class="content" style="background-image: url('assets/images/shadows/i-02.png')">

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
                <div class="container">
                    <span class="line"></span>
                </div>
                <section id="T1">
                    <div class="content" style="background-image: url('assets/images/shadows/t-02.png')">
                        <p>
                            Real estate is a team sport, and we thrive on collaboration.
                            Each member of our team brings a unique set of skills to the table, creating a tapestry of
                            expertise
                            that ensures
                            success in every endeavor.
                        </p>
                    </div>
                    <div class="d-flex align-items-end customHeads ">
                        <span class="seven-headers"><span class="initials">T</span>eamwork:</span>
                    </div>
                </section>
                <div class="container">
                    <span class="line" style="transform: rotateX(180deg);"></span>
                </div>
                <section id="E">
                    <div class="d-flex align-items-end customHeads ">
                        <span class="seven-headers"><span class="initials">E</span>xcellence:</span>
                    </div>
                    <div class="content" style="background-image: url('assets/images/shadows/e-02.png')">
                        <p>
                            We set the bar high and strive for excellence in every aspect of our business,
                            from impeccable client service to stellar property representation. It's not just about
                            meeting
                            expectations; it's about
                            exceeding them at every turn.
                        </p>
                    </div>
                </section>
                <div class="container">
                    <span class="line"></span>
                </div>
                <section id="H2">
                    <div class="content" style="background-image: url('assets/images/shadows/h-02.png')">
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
                        <span class="seven-headers"><span class="initials">H</span>umanity:</span>
                    </div>
                </section>
                <div class="container">
                    <span class="line" style="transform: rotateX(180deg);"></span>
                </div>
                <section id="A">
                    <div class="d-flex align-items-end customHeads ">
                        <span class="seven-headers"><span class="initials">A</span>daptability:</span>
                    </div>
                    <div class="content" style="background-image: url('assets/images/shadows/a-01.png')">
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
                <div class="container">
                    <span class="line"></span>
                </div>
                <section id="T2">
                    <div class="content" style="background-image: url('assets/images/shadows/t-02.png')">
                        <p>
                            In real estate, trust is everything.
                            We honor our commitments and uphold our promises,
                            building a reputation for reliability and integrity that's as solid as the foundations we
                            represent.
                        </p>
                    </div>
                    <div class="d-flex align-items-end customHeads ">
                        <span class="seven-headers"><span class="initials">T</span>rustworthiness:</span>
                    </div>
                </section>
            </div>

            <div class="fixed-content" id="fixed">
                <div><img src="{{url('assets/images/w-01.png')}}"></div>
                <div><img src="{{url('assets/images/h-01.png')}}"></div>
                <div><img src="{{url('assets/images/i-01.png')}}"></div>
                <div><img src="{{url('assets/images/t-01.png')}}"></div>
                <div><img src="{{url('assets/images/e-01.png')}}"></div>
                <div><img style="margin-top:3px" src="{{url('assets/images/sign-01.png')}}"></div>
                <div><img src="{{url('assets/images/a-01.png')}}"></div>
                <div><img src="{{url('assets/images/t-01.png')}}"></div>
            </div>
        </div>
        <section class="section-typing_text">
            <div class="typing_text-heading" id="typing">
                <span class="typing_text"></span><span class="cursor">_</span>
            </div>
        </section>
        <section>
            <div id="youtube">
            </div>
            <div class="text-center m-5">
                <button class="btn btn-warning" id="loadMore" page_id="1">Load More</button>

            </div>
        </section>
        <section class="bg-light">
            <div class="contactSection">
                <div class="locationSection">
                    <div>
                        <h3>Let's Chat</h3>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s,
                        </p>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="material-symbols-outlined p-3">
                            location_on
                        </span>
                        <p class="p-3">Chandra Hieghts, Sector 107, Noida, Uttar Pradesh</p>
                    </div>
                </div>
                <div class="card formSection bg-light">
                    <div class="card-body ">
                        <form class="p-5" action="{{ route('contact-mail') }}" method="POST" id="myForm">
                            @csrf


                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white">
                                        <span class="material-symbols-outlined">person</span>
                                    </span>
                                </div>
                                <input type="text" class="form-control inputfield @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" name="name" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white">
                                        <span class="material-symbols-outlined">phone</span>
                                    </span>
                                </div>
                                <input type="text" class="form-control inputfield @error('mobile') is-invalid @enderror" id="mobile" placeholder="Mobile" name="mobile" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white">
                                        <span class="material-symbols-outlined">mail</span>
                                    </span>
                                </div>
                                <input type="email" class="form-control inputfield @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" required>
                            </div>


                            <div class="input-group mb-3">
                                <label for="message"></label>
                                <textarea name="message" id="message" rows="5" placeholder="Message" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary form-control">Submit</button>
                        </form>

                    </div>

                </div>
            </div>
        </section>
    </div>
    <script src="{{url('assets/customs/js/comingsoon.js')}}">
    </script>
    <script src="{{url('assets/libraries/js/gsap.min.js')}}"></script>
    <script src="{{url('assets/libraries/js/scrolltrigger.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/TextPlugin.min.js"></script>
    <script>
        var animation;

        gsap.registerPlugin(ScrollTrigger, TextPlugin);
        gsap.defaults({
            ease: "none"
        });
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
                        scrub: true,
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

        $(document).on('click', '#loadMore', function() {
            $(this).html('Loading....')
            let page = parseInt($(this).attr('page_id'));
            $.ajax({
                url: '{{route("load-video")}}?page=' + page,
                method: 'GET',
                success: function(data) {
                    if (data.data.next_page_url == null) {
                        $('#loadMore').remove()
                    };
                    page++;
                    $("#loadMore").html('Load More')
                    $("#loadMore").attr('page_id', page);
                    $.each(data.data.data, function(index, data) {
                        let html = `<div class="slide2 f2" style="background-image:url('storage/${data.thumbnail}')">
                            <iframe src="${data.video_source}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            <div>
                                <h5>${data.title}</h5>
                                <p class='text-light'>${data.description}</p>
                                <h4>${data.created_at}</h4>
                            </div>
                        </div>`;
                        $("#youtube").append(html)
                    });
                }
            });
        })
    </script>
    <script>
        gsap.to(".typing_text", {
            text: {
                value: 'The aim of Whitehat Realty is to redefine the real estate experience by blending expertise with innovation, fostering trust, and prioritizing the human element in every transaction. We strive to provide exceptional service, exceed expectations, and make a positive impact in the real estate market Be Ready !! As we unfold the mystery and history of the Indian Real Estate Market. Till then you can explore us through our YouTube Channel'
            },
            scrollTrigger: {
                trigger: ".typing_text-heading",
                pin: ".typing_text-heading",
                start: "top =+300px",
                end: "bottom top",
                scrub: true,
                onEnter: function() {
                    // When the trigger enters the viewport
                    document.querySelector("#fixed").classList.add("fixing");
                },
                onEnterBack: function() {
                    // When the trigger enters the viewport
                    document.querySelector("#fixed").classList.add("fixing");
                },
                onLeaveBack: function() {
                    // When the trigger leaves the viewport
                    document.querySelector("#fixed").classList.remove("fixing");
                },
                onLeave: function() {
                    // When the trigger leaves the viewport
                    document.querySelector("#fixed").classList.remove("fixing");
                }
            }
        });
    </script>
</body>

</html>