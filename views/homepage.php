<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <title>Maybach Academy | Excellence • Integrity • Community</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html,
    body {
      font-family:
        Inter,
        system-ui,
        -apple-system,
        "Segoe UI",
        Roboto,
        "Helvetica Neue",
        Arial;
      /* background:wheat */
      overflow-x: hidden;
    }

    .site-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 30px;
      min-height: 80px;
      background: linear-gradient(to right,
          navy,
          rgb(6, 94, 94),
          rgb(24, 59, 24));
      position: sticky;
      top: 0;
      z-index: 1000;
      padding: 1rem 2rem 0.5rem;
      /* real breathing space */
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 15px;
      text-decoration: none;
    }

    .brand img {
      width: 75px;
      /* smaller logo */
      height: 75px;
      object-fit: contain;
      border-radius: 8px;
      background: #b47b4c;
    }

    .brand .title {
      color: white;
      font-weight: 700;
      font-size: 1.4rem;
      line-height: 1.1;
    }

    .brand .sub-title {
      display: block;
      font-size: 0.75rem;
      margin-top: 4px;
      opacity: 0.9;
      color: #ccc;
    }

    h1 span {
      color: #ff7200;
      /* font-size: 2.5rem; */
    }

    .nav-list {
      display: flex;
      align-items: center;
      gap: 20px;
      list-style: none;
      font-size: 0.95rem;
      white-space: nowrap;
      padding: 0;
      /* REMOVE 20px */
    }

    .nav-list li a {
      padding: 8px 14px;
      border-radius: 6px;
      text-decoration: none;
      color: white;
      font-weight: 700;
      transition: 0.2s ease;
      white-space: nowrap;
      /* PREVENT TEXT BREAK */
    }

    .nav-list li a:hover {
      background: #976236;
    }

    .cta {
      padding: 8px 14px;
      background: #ff7200;
      color: #fff;
      border-radius: 8px;
      font-weight: 700;
      text-decoration: none;
    }

    /* ---------- HAMBURGER ---------- */
    .hamburger {
      display: none;
      font-size: 1.8rem;
      background: none;
      border: none;
      color: white;
      cursor: pointer;
    }

    /* --------Marquee------ */

    .bounce-box {
      width: 100%;
      height: 45px;
      background: linear-gradient(to right,
          navy,
          rgb(6, 94, 94),
          rgb(24, 59, 24));
      display: flex;
      align-items: center;
      overflow: hidden;
      padding: 0 20px;
      margin: 0;
      /* removed space */
      position: relative;
    }

    /* Bouncing movement */
    .bounce-text {
      white-space: nowrap;
      display: inline-block;
      font-size: 20px;
      font-weight: bold;
      font-style: italic;
      color: #ffffff;
      animation: marquee 15s linear infinite;
    }

    @keyframes marquee {
      0% {
        transform: translateX(100vw);
      }

      100% {
        transform: translateX(-100%);
      }
    }

    /* Glow effect */
    .glow {
      text-shadow:
        0 0 10px #ffffff,
        0 0 20px #00e0ff,
        0 0 30px #00e0ff,
        0 0 40px #00e0ff;
    }

    /* @keyframes bounce {
        from {
          transform: translateX(0);
        }
        to {
          transform: translateX(calc(100% - 100vw));
        }
      } */
    .cont {
      position: relative;
      width: 100%;
      height: 85vh;
      overflow: hidden;
    }

    .cont img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .text {
      position: absolute;
      bottom: 15%;
      right: 8%;
      max-width: 600px;
    }

    .text h2 {
      font-size: 3.2rem;
      color: #ff7200;
      text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
    }

    .text h3 {
      font-size: 1.5rem;
      color: #ff7200;
      text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
    }

    .cont img:hover {
      cursor: pointer;
      /* transform: scale(1.08); */
    }

    .btn {
      display: inline-block;
      padding: 12px 18px;
      font-size: 1.05rem;
      color: white;
      border-radius: 8px;
      margin-top: 18px;
      text-decoration: none;
      background: linear-gradient(to bottom,
          black,
          rgb(15, 120, 182),
          purple);
      transition: 0.3s ease;
    }

    .btn span {
      font-size: 1.2rem;
    }

    .contain {
      width: 100%;
      display: flex;
      gap: 40px;
      padding: 80px 8%;
    }

    .contain-1,
    .contain-2 {
      flex: 1;
      background: #fff;
      border-radius: 16px;
      overflow: hidden;
      transition: 0.3s ease;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }

    .contain-1:hover,
    .contain-2:hover {
      transform: translateY(-6px);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
    }

    .contain img {
      width: 100%;
      height: 45vh;
      max-height: 320px;
      object-fit: cover;
    }

    .contain p {
      padding: 20px;
      font-size: 1rem;
      line-height: 1.6;
    }

    .welcome {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 100px 20px;
      background-image: url(../public/images/picx.jpg);
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    .welcome h1 {
      margin-top: 100px;
      font-size: 4rem;
      font-family: "Times New Roman", Times, serif;
      align-self: center;
      color: #fff;
    }

    hr {
      margin-top: 30px;
      width: 300px;
      height: 5px;
      align-self: center;
      background-color: yellow;
    }

    .welcome p {
      color: white;
      align-self: center;
      margin-top: 30px;
      font-size: 2rem;
      text-align: center;
      font-family: "Times New Roman", Times, serif;
    }

    .keys {
      display: flex;
      justify-content: center;
      flex-direction: column;
    }

    .card {
      display: flex;
      gap: 40px;
      padding: 80px 8%;
    }

    .card>div {
      flex: 1;
      background: #fff;
      border-radius: 18px;
      padding: 30px;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      transition: 0.3s ease;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }

    .card>div:hover {
      transform: translateY(-8px);
      box-shadow: 0 18px 40px rgba(0, 0, 0, 0.15);
    }

    .card img {
      width: 120px;
      height: 120px;
      object-fit: contain;
      margin-bottom: 20px;
    }

    .card h2 {
      font-size: 1.5rem;
      margin-bottom: 15px;
    }

    .card p {
      font-size: 1rem;
      line-height: 1.6;
      margin-bottom: 20px;
    }

    .card-btn {
      display: inline-block;
      padding: 12px 18px;
      background: rgb(15, 120, 182);
      color: white;
      border-radius: 10px;
      margin-top: 15px;
      text-decoration: none;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .card-btn:hover {
      background: #0d5c8c;
    }

    .unique {
      display: flex;
      gap: 60px;
      padding: 100px 8%;
      align-items: center;
    }

    .src {
      flex: 1;
    }

    .src img {
      width: 100%;
      height: 60vh;
      max-height: 500px;
      object-fit: cover;
      border-radius: 20px;
    }

    .learn {
      flex: 1;
    }

    .learn h1 {
      font-size: 2.5rem;
      margin-bottom: 20px;
    }

    .learn p {
      font-size: 1rem;
      line-height: 1.7;
    }

    .src2 {
      display: flex;
      gap: 15px;
      align-items: flex-start;
      margin-bottom: 15px;
    }

    .src2 img {
      width: 35px;
      height: 35px;
    }

    .learn hr {
      width: 280px;
      height: 5px;
      background-color: yellow;
    }

    .learn h2 {
      background-color: rgb(15, 120, 182);
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      margin-top: 10px;
    }

    .learn a {
      text-decoration: none;
    }

    .youtube {
      width: 100%;
      height: auto;
      /* border: 1px solid green; */
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 20px;
      padding: 60px 20px;
      gap: 15px;
      background: #d6c4b5;
      border-radius: 30px;
    }

    .youtube h1 {
      font-size: clamp(1.8rem, 4vw, 3rem);
      font-family: "Times New Roman", Times, serif;
    }

    .youtube p {
      font-size: 1.5rem;
      font-family: "Times New Roman", Times, serif;
      text-align: center;
    }

    .responsive-video {
      width: 90%;
      max-width: 700px;
      height: auto;
      border-radius: 15px;
    }

    .check {
      width: 100%;
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 20px;
      border-radius: 10px;
    }

    /* Base button style */
    .action-btn {
      width: 280px;
      height: 48px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.05rem;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      color: white;
      position: relative;
      overflow: hidden;
      transition: 0.3s ease;
    }

    /* Individual colors */
    .btn1 {
      background: navy;
    }

    .btn2 {
      background: black;
      z-index: 1;
    }

    .btn3 {
      background: rgb(15, 120, 182);
    }

    /* Gallery glow sweep effect */
    .btn2::before {
      content: "";
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(120deg, transparent, #ff7200, transparent);
      transition: 0.6s;
      z-index: -1;
    }

    .btn2:hover::before {
      left: 100%;
    }

    .pixs {
      display: flex;
      gap: 20px;
      padding: 60px 8%;
    }

    .pixs div {
      flex: 1;
      border-radius: 16px;
      overflow: hidden;
      aspect-ratio: 4 / 3;
      /* ← magic line */
    }

    .pixs img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: 0.3s ease;
    }

    .pixs img:hover {
      transform: scale(1.05);
    }

    .love {
      width: 100%;
      padding: 100px 8%;
      display: flex;
      flex-direction: column;
      align-items: center;
      background-color: navy;
      gap: 40px;
    }

    .love a {
      text-decoration: none;
    }

    .love h1 {
      font-size: 3rem;
      color: white;
    }

    .love p {
      font-size: 1.3rem;
      color: white;
      text-align: center;
    }

    .love hr {
      width: 200px;
      height: 5px;
      background-color: yellow;
    }

    .love h2 {
      margin-top: 20px;
      padding: 15px 30px;
      border-radius: 8px;
      background-color: white;
      color: navy;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .love h2:hover {
      background-color: #ff7200;
      color: white;
    }

    .cont-profile {
      width: 100%;
      /* height: 650px; */
      /* border: 1px solid red; */
      display: flex;
      flex-direction: row;
      justify-content: center;
      /* margin-top: 40px; */
      gap: 30px;
      padding: 60px 8%;
    }

    .cont-profile>div {
      flex: 1;
      padding: 30px;
      border-radius: 18px;
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(6px);
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .profile-1 p,
    .profile-2 p,
    .profile-3 p {
      text-align: left;
      margin-top: 20px;
    }

    .contact-icon1 {
      width: 8rem;
      height: 8rem;
      background: rgb(64, 64, 197);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      cursor: pointer;
      /* transition: 0.25s; */
    }

    .contact-icon2 {
      width: 8rem;
      height: 8rem;
      background: skyblue;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      cursor: pointer;
      /* transition: 0.25s; */
    }

    .contact-icon3 {
      width: 8rem;
      height: 8rem;
      background: #ff7200;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      cursor: pointer;
      /* transition: 0.25s; */
    }

    .contact-icon svg {
      width: 80px;
      height: 80px;
    }

    /* --footer-- */

    footer {
      background: #111;
      color: white;
      padding: 40px 20px;
      font-family: Arial, sans-serif;
      position: relative;
      z-index: 1;
    }

    .footer-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 25px;
    }

    .footer-logo img {
      width: 70px;
      height: 70px;
      border-radius: 50%;
      background-color: #b47b4c;
    }

    .footer-logo h2 {
      margin-top: 10px;
      font-size: 22px;
    }

    .footer-social ul,
    .footer-legal ul {
      list-style: none;
      padding: 0;
    }

    .footer-social ul li,
    .footer-legal ul li {
      margin-bottom: 6px;
    }

    .footer-social ul li a,
    .footer-legal ul li a {
      color: #ccc;
      text-decoration: none;
    }

    .footer-social ul li a:hover,
    .footer-legal ul li a:hover {
      color: white;
    }

    /* .footer-map iframe {
          width: 100%;
          height: 150px;
          border: none;
          border-radius: 5px;
      } */

    .footer-bottom {
      margin-top: 25px;
      border-top: 1px solid #444;
      padding-top: 15px;
      text-align: center;
      font-size: 14px;
      color: #bbb;
    }

    .fa-brands {
      font-size: 1.5rem;
    }

    /* ---------- */

    /* Remove default list & spacing */

    /* Dropdown - vertical list */
    .dropdown {
      position: relative;
    }

    .dropdown-menu {
      display: none;
      position: absolute;
      top: 100%;
      left: 0;
      /* anchor under its parent */
      background: white;
      min-width: 220px;
      width: max-content;
      padding: 15px;
      border-radius: 12px;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
      flex-direction: column;
      z-index: 999;
    }

    /* Each dropdown menu item */

    .dropdown-menu li {
      padding: 2px 0;
      width: 100%;
      /* ENSURE ITEMS STAY INSIDE */
      list-style: none;
    }

    .dropdown-menu li a {
      font-size: 16px;
      color: #003366;
      display: block;
    }

    .dropdown-menu li a:hover {
      color: #0074d9;
    }

    /* SHOW DROPDOWN ON HOVER */
    @media (min-width: 901px) {
      .dropdown:hover .dropdown-menu {
        display: flex;
      }
    }

    /* --------MEDIA QUERY------- */

    @media screen and (max-width: 900px) {
      .site-header {
        padding: 0.8rem 1rem 0.5rem;
        /* real breathing space */
      }

      /* NAV */
      .hamburger {
        display: block;
      }

      .nav-wrapper {
        position: absolute;
        top: 80px;
        right: 0;
        width: 100%;
        background: linear-gradient(to bottom, navy, rgb(6, 94, 94));
        display: none;
      }

      .nav-wrapper.active {
        display: block;
      }

      .nav-list {
        flex-direction: column;
        align-items: stretch;
        /* IMPORTANT */
        gap: 15px;
        padding: 20px;
      }

      .nav-list>li {
        text-align: center;
      }

      /* MOBILE DROPDOWN FIX */
      .dropdown-menu {
        width: 100%;
        position: static;
        display: none;
        background: rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(4px);
        box-shadow: none;
        padding: 10px 0;
        border-radius: 8px;
      }

      .dropdown.active .dropdown-menu {
        display: block;
      }

      .dropdown-menu li a {
        color: white;
      }

      .dropdown-menu li {
        text-align: center;
      }

      /* HERO */
      /* HERO MOBILE REBALANCED */
      .cont {
        height: 80vh;
      }

      .text {
        position: absolute;
        bottom: 12%;
        left: 50%;
        transform: translateX(-50%);
        width: 92%;
        text-align: center;
      }

      .text h2 {
        font-size: 2.5rem;
      }

      .text h3 {
        font-size: 1.3rem;
        margin-top: 10px;
      }

      .btn {
        font-size: 1.15rem;
        padding: 14px 22px;
        margin-top: 22px;
      }

      .bounce-box {
        padding: 0;
        /* remove side padding on mobile */
      }

      .bounce-text {
        animation: marquee 12s linear infinite;
        /* optional: faster on mobile */
      }

      /* STACK SECTIONS */
      .card,
      .contain,
      .unique,
      .cont-profile,
      .pixs {
        flex-direction: column;
        align-items: center;
      }

      /* FIX PIXS MOBILE */
      .pixs {
        padding: 40px 20px;
        gap: 25px;
      }

      .pixs div {
        width: 100%;
        max-width: 500px;
        aspect-ratio: 4 / 3;
      }

      .contain-1,
      .contain-2 {
        width: 90%;
      }

      .src img {
        height: 300px;
      }

      /* YOUTUBE BUTTONS */
      .check {
        flex-direction: column;
        align-items: center;
      }

      .action-btn {
        width: 85%;
      }

      /* WELCOME TEXT */
      .welcome h1 {
        font-size: 2rem;
      }

      .welcome p {
        font-size: 1rem;
      }
    }
  </style>
</head>

<body>
  <header class="site-header">
    <a href="#" class="brand">
      <img src="../public/images/mmglogo.png" alt="Maybach Academy logo" />
      <div>
        <h1 class="title">MAY<span>BACH</span> ACADEMY</h1>
        <span class="sub-title">Excellence • Integrity • Community</span>
      </div>
    </a>

    <button
      class="hamburger"
      id="hamburger"
      aria-label="Toggle navigation"
      aria-expanded="false">
      <i class="fa-solid fa-bars"></i>
    </button>

    <nav class="nav-wrapper" id="navMenu">
      <ul class="nav-list">
        <li><a href="./homepage.html" class="active">HOME</a></li>

        <li class="dropdown">
          <a href="./aboutus.html">ABOUT US</a>
          <ul class="dropdown-menu">
            <li><a href="./aboutus.html">OUR MISSION</a></li>
            <li><a href="#">BOARD & SCHOOL HISTORY</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="./program.html">PROGRAMS</a>
          <ul class="dropdown-menu">
            <li><a href="./program.html">PROGRAM OVERVIEW</a></li>
            <li><a href="#">MIDDLE SCHOOL AND HIGH SCHOOL</a></li>
          </ul>
        </li>

        <li><a href="./contact.html">CONTACT</a></li>
        <li><a href="./admission.html">ADMISSIONS</a></li>
        <li><a href="./login.html">SIGN IN</a></li>

        <li class="mobile-apply">
          <a href="./apply.html" class="cta">APPLY</a>
        </li>
      </ul>
    </nav>
  </header>
  <div class="bounce-box">
    <div class="bounce-text glow">
      WELCOME TO MAYBACH ACADEMY. THE FUTURE IS OURS!
    </div>
  </div>

  <div class="cont">
    <img src="../public/images/kids3.jpg" alt="Photo" />
    <div class="text">
      <h2>A Community of Learning <br />Unlike Any Other</h2>
      <h3>
        Maybach Academy provides a life-centered, hands-on <br />approach to
        special education
      </h3>
      <a href="#" class="btn">LEARN MORE &nbsp; <span>&RightArrow;</span></a>
    </div>
  </div>

  <div class="contain">
    <div class="contain-1">
      <img src="../public/images/kids4.jpg" alt="" />
      <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam
        eaque, incidunt cupiditate, perspiciatis porro beatae suscipit
        adipisci expedita libero eveniet corporis nemo deleniti commodi
        maiores nam quam consequatur eos modi!
      </p>
    </div>

    <div class="contain-2">
      <img src="../public/images/kids1.jpg" alt="" />
      <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam
        eaque, incidunt cupiditate, perspiciatis porro beatae suscipit
        adipisci expedita libero eveniet corporis nemo deleniti commodi
        maiores nam quam consequatur eos modi!
      </p>
    </div>
  </div>

  <div class="welcome">
    <h1>Welcome to Maybach Academy</h1>
    <hr />

    <p>
      We are a private non-profit school for students in middle and high
      school with <br />complex language, learning and/or cognitive
      disabilities. Our mission is to provide <br />our students with the
      academic, occupational and social skills needed to be self-reliant,<br />
      confident and contributing members of their communities.
    </p>

    <div class="keys">
      <h1>Our Keys to Success</h1>

      <hr />
    </div>
  </div>

  <div class="card">
    <div class="card-1">
      <img src="../public/images/rempic.png" alt="" />
      <h2>88% Student Employment <br />Rate</h2>
      <p>
        The primary focus of Maybach Academy is to make sure our students have
        jobs when they graduate, and our employment rate proves our success
      </p>
      <a href="#" class="card-btn">LEARN MORE &nbsp; <span>&RightArrow;</span></a>
    </div>

    <div class="card-2">
      <img src="../public/images/respic.jpg" alt="" />
      <h2>6:1 Student to Teacher <br />Ratio</h2>
      <p>
        We ensure small class size which allows each student the attention
        they require to succeed in school. Excellent learning is our most
        priority
      </p>
      <a href="#" class="card-btn">LEARN MORE &nbsp; <span>&RightArrow;</span></a>
    </div>

    <div class="card-3">
      <img src="../public/images/shakepic.jpg" alt="" />
      <h2>Partnership With Global <br />Employers</h2>
      <p>
        We partner with employers from all over the world to deliver hands-on
        learning experiences for our students. We always aim higher in all
        endeavors.
      </p>
      <a href="#" class="card-btn">LEARN MORE &nbsp; <span>&RightArrow;</span></a>
    </div>
  </div>

  <div class="unique">
    <div class="src">
      <img src="../public/images/kids3.jpg" alt="" />
    </div>

    <div class="learn">
      <div>
        <h1>What Makes Us Unique</h1>
        <hr />
      </div>

      <div class="src2">
        <img src="../public/images/done2.png" alt="" />
        <p>
          Students are provided with hands-on learning using specialized
          curriculum
        </p>
      </div>

      <div class="src2">
        <img src="../public/images/done2.png" alt="" />
        <p>
          Students are taught life and social skills integrated into the
          classroom
        </p>
      </div>

      <div class="src2">
        <img src="../public/images/done2.png" alt="" />
        <p>
          Students are taught work skills through job training experiences in
          the community
        </p>
      </div>

      <div class="src2">
        <img src="../public/images/done2.png" alt="" />
        <p>
          Students are matched with internships based on their interests and
          abilities
        </p>
      </div>

      <div class="src2">
        <img src="../public/images/done2.png" alt="" />
        <p>
          Bridges Program provides transition from high school to adulthood
        </p>
      </div>

      <div class="src2">
        <img src="../public/images/done2.png" alt="" />
        <p>
          An individualized learning and transition plan is developed for
          every student
        </p>
      </div>

      <a href="">
        <h2>DISCOVER MORE ABOUT US</h2>
      </a>
    </div>
  </div>

  <div class="youtube">
    <h1>Meet Our Students</h1>
    <video controls class="responsive-video">
      <source
        src="../public/videos/WhatsApp Video 2025-11-27 at 3.29.50 PM.mp4" />
    </video>
    <p>
      Our students are what makes the Maybach Academy community great. We take
      pride <br />in having one of the greatest learning communities in
      diaspora, and we'd love for <br />you to be a part of it!
    </p>
  </div>

  <div class="check">
    <a href="#" class="action-btn btn1">VIEW ADMISSIONS</a>
    <a href="./scrollbar.html" class="action-btn btn2">OUR GALLERY</a>
    <a href="#" class="action-btn btn3">SUPPORT US</a>
  </div>
  <div class="pixs">
    <div class="pic1">
      <img src="../public/images/kids6.jpg" />
    </div>

    <div class="pic2">
      <img src="../public/images/bus7.jpg" />
    </div>
    <div class="pic3">
      <img src="../public/images/bus8.jpg" />
    </div>
  </div>

  <div class="love">
    <h1>Loved by Students and Parents Alike</h1>
    <p>
      Maybach Academy provides an incredible learning community for our
      students and <br />
      families. But don't just take our word for it, check out some
      testimonials from our <br />community members!
    </p>
    <hr />

    <div class="cont-profile">
      <div class="profile-1">
        <div class="contact-icon1">
          <!-- Profile SVG Icon -->
          <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.8"
            stroke-linecap="round"
            stroke-linejoin="round">
            <circle cx="12" cy="7" r="4"></circle>
            <path d="M5.5 20a6.5 6.5 0 0 1 13 0"></path>
          </svg>
        </div>
        <p>
          "Our son is THRIVING at Maybach <br />Academy. He is so confident
          and happy <br />and responsible and mature. He loves <br />school!
          He loves his teachers and his <br />peers. He has gained
          immeasurably. This <br />is his third year attending Maybach
          <br />Academy. It has been a life saver. Our <br />family is so
          happy to be part of the <br />Maybach Academy community."<br />
          <br />
          - Parent of Student
        </p>
      </div>

      <div class="profile-2">
        <div class="contact-icon2">
          <!-- Profile SVG Icon -->
          <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.8"
            stroke-linecap="round"
            stroke-linejoin="round">
            <circle cx="12" cy="7" r="4"></circle>
            <path d="M5.5 20a6.5 6.5 0 0 1 13 0"></path>
          </svg>
        </div>
        <p>
          "Maybach Academy has been a wonderful experience for our family. Our
          son would not be the young man that he is today if it was not for
          the support we have received from the staff at Maybach Academy. The
          staff at Maybach Academy are very supportive and they show each
          child special attention depending on their disability. The life
          skills approach has really helped my son learn many things that will
          help him succeed in life after attending Philips Academy. I
          definitely recommend you checking Maybach Academy out and consider
          having your child attend. It is a very positive atmosphere that
          helps children with Learning Disabilities." <br /><br />
          - Parent of Student
        </p>
      </div>
      <div class="profile-3">
        <div class="contact-icon3">
          <!-- Profile SVG Icon -->
          <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="1.8"
            stroke-linecap="round"
            stroke-linejoin="round">
            <circle cx="12" cy="7" r="4"></circle>
            <path d="M5.5 20a6.5 6.5 0 0 1 13 0"></path>
          </svg>
        </div>
        <p>
          "This school has been terrific. The staff is wonderful with the
          perfect balance of kindness and authority. The children really care
          for each other. My child has made so many friends at Maybach. The
          teachers are beyond amazing, they truly love what they do. There is
          no other place in Charlotte or the surrounding area like Philips, if
          this school fits your child's disability, please check it out. Our
          entire family is so glad we did." <br /><br />
          - Parent of Student
        </p>
      </div>
    </div>
    <a href="contact.html">
      <h2>CONTACT US TODAY</h2>
    </a>
  </div>

  <?php require_once "../includes/footer.php"; ?>

  <script>
    (function() {
      // Wait for the DOM to be ready
      document.addEventListener("DOMContentLoaded", function() {
        const hamburger = document.getElementById("hamburger");
        const navMenu = document.getElementById("navMenu");

        if (!hamburger || !navMenu) return;

        // Toggle mobile menu
        hamburger.addEventListener("click", function(e) {
          e.stopPropagation(); // prevent any accidental bubbling
          navMenu.classList.toggle("active");
          const expanded = this.getAttribute("aria-expanded") === "true";
          this.setAttribute("aria-expanded", !expanded);
        });

        // Handle dropdowns and close menu when a link is clicked
        document.querySelectorAll(".nav-list > li > a").forEach((link) => {
          link.addEventListener("click", (e) => {
            if (window.innerWidth <= 900) {
              const parentLi = link.parentElement;

              if (parentLi.classList.contains("dropdown")) {
                e.preventDefault(); // stay on page, only toggle dropdown
                // Close other dropdowns
                document.querySelectorAll(".dropdown").forEach((drop) => {
                  if (drop !== parentLi) drop.classList.remove("active");
                });
                parentLi.classList.toggle("active");
              } else {
                // Regular link – close the whole menu
                navMenu.classList.remove("active");
                hamburger.setAttribute("aria-expanded", "false");
              }
            }
          });
        });

        // Optional: close menu when clicking outside (for better UX)
        document.addEventListener("click", function(e) {
          if (
            window.innerWidth <= 900 &&
            navMenu.classList.contains("active")
          ) {
            if (
              !navMenu.contains(e.target) &&
              !hamburger.contains(e.target)
            ) {
              navMenu.classList.remove("active");
              hamburger.setAttribute("aria-expanded", "false");
            }
          }
        });
      });

      // Date & time functions (unchanged, but moved inside DOMContentLoaded)
      function updateStaticDate() {
        const now = new Date();
        const dateEl = document.getElementById("date");
        const yearEl = document.getElementById("year");
        const copyYearEl = document.getElementById("copyYear");
        if (dateEl) dateEl.textContent = "Date: " + now.toLocaleDateString();
        if (yearEl) yearEl.textContent = "Year: " + now.getFullYear();
        if (copyYearEl) copyYearEl.textContent = now.getFullYear();
      }

      function updateTime() {
        const timeEl = document.getElementById("time");
        if (timeEl)
          timeEl.textContent = "Time: " + new Date().toLocaleTimeString();
      }

      // Run date/time after DOM is ready as well
      document.addEventListener("DOMContentLoaded", function() {
        updateStaticDate();
        updateTime();
        setInterval(updateTime, 1000);
      });
    })();
  </script>
</body>

</html>