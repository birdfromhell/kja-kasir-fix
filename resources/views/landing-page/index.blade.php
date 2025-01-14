<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KJA KASIR</title>

  <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
  <!--- End favicon-->

  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:wght@100..900&display=swap" rel="stylesheet">
  <!-- End google font  -->

<link rel="stylesheet" href="{{ asset('assets/landing-page/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/landing-page/css/bootstrap-icons.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/landing-page/css/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('assets/landing-page/css/swiper-bundle.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/landing-page/css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('assets/landing-page/css/custom-font.css') }}">
<link rel="stylesheet" href="{{ asset('assets/landing-page/css/fontawesome.css') }}">
<link rel="stylesheet" href="{{ asset('assets/landing-page/css/aos.css') }}">
<link rel="stylesheet" href="{{ asset('assets/landing-page/css/slick.css') }}">
<link rel="stylesheet" href="{{ asset('assets/landing-page/css/splitting.css') }}">
<link rel="stylesheet" href="{{ asset('assets/landing-page/css/icomoon.css') }}">

  <!-- Code Editor  -->

<link rel="stylesheet" href="{{ asset('assets/landing-page/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('assets/landing-page/css/app.min.css') }}">
</head>

<body class="light">

  <div class="sofax-preloader-wrap">
    <div class="sofax-preloader">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>

  <!-- progress bar -->

  <div class="progress-bar-container">
    <div class="progress-bar"></div>
  </div>

  <!-- progress circle -->
  <div class="paginacontainer">
    <div class="progress-wrap">
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
      <div class="top-arrow">
        <img src="{{ asset('assets/landing-page/images/arrowtop.png') }}" alt="">
      </div>
    </div>
  </div>
  <!-- End All Js -->



  <header class="site-header sofax-header-section site-header--menu-center" id="sticky-menu">
    <div class="container">
      <nav class="navbar site-navbar">
        <!-- Brand Logo-->
        <div class="brand-logo">
          <a href="{{ url('/') }}">
              <img src="{{ asset('assets/dashboard/images/logo.png') }}" alt="" class="light-version-logo" width="100" height="70">
          </a>
        </div>

        <div class="menu-block-wrapper">
          <div class="menu-overlay"></div>
          <nav class="menu-block" id="append-menu-header">
            <div class="mobile-menu-head">
              <div class="go-back">
                <i class="fa fa-angle-left"></i>
              </div>
              <div class="current-menu-title"></div>
              <div class="mobile-menu-close">&times;</div>
            </div>
            <ul class="site-menu-main">

              <li class="nav-item">
                <a href="#home" class="nav-link-item">Home</a>
              </li>
              <li class="nav-item">
                <a href="#service" class="nav-link-item">service</a>
              </li>
              <li class="nav-item">
                <a href="#pricing" class="nav-link-item">Pricing</a>
              </li>
              <li class="nav-item">
                <a href="#integration" class="nav-link-item">Integration</a>
              </li>
              <li class="nav-item">
                <a href="#testimonial" class="nav-link-item">Testimonial</a>
              </li>

            </ul>
          </nav>
        </div>

        <div class="header-btn header-btn-l1 ms-auto d-none d-xs-inline-flex">
          <a class="sofax-default-btn pill sofax-header-btn" data-text="Get started" href="{{ url('/app/user/register') }}">
            <span class="button-wraper">Get Started</span>
          </a>
        </div>
        <!-- mobile menu trigger -->
        <div class="mobile-menu-trigger ">
          <span></span>
        </div>
        <!--/.Mobile Menu Hamburger Ends-->
      </nav>
    </div>
  </header>
  <!--End landex-header-section -->

  <div id="home" class="sofax-hero-section overflow-hidden">
    <div class="container">
      <div class="sofax-hero-content center">
        <h1 class="slider-custom-anim-left" data-ani="slider-custom-anim-left" data-ani-delay="0.3s">Best platfrom to manage your sales</h1>
        <p>The best platform for you will depend on factors such as your business size, budget, integration needs and specific sales processes. Offering visual pipeline management sales reporting & email interation.</p>
      </div>
      <div class="sofax-subscription-field blog-details-subscribe-btn">
        <input type="email" placeholder="Enter your email ">
        <button id="sofax-subscription-btn" type="submit">Start a 14 days free trail</button>
      </div>
      <div class="sofax-rating-icon">
        <ul>
          <li>
            <img src="{{ asset('assets/landing-page/images/v1/rattingful.svg') }}" alt="">
          </li>
          <li>
            <img src="{{ asset('assets/landing-page/images/v1/rattingful.svg') }}" alt="">
          </li>
          <li>
            <img src="{{ asset('assets/landing-page/images/v1/rattingful.svg') }}" alt="">
          </li>
          <li>
            <img src="{{ asset('assets/landing-page/images/v1/rattingful.svg') }}" alt="">
          </li>
          <li>
            <img src="{{ asset('assets/landing-page/images/v1/rattinghalf.svg') }}" alt="">
          </li>
          <li>
            4.8/5 rating software trusted by users
          </li>
        </ul>
      </div>
      <div class="sofax-hero-thumb1">
        <img src="{{ asset('assets/landing-page/images/v1/img.png') }}" alt="">
        <div class="sofax-hero-shape">
          <img src="{{ asset('assets/landing-page/images/v1/shape1.png') }}" alt="shape">
        </div>
        <div class="sofax-hero-shape2">
            <img src="{{ asset('assets/landing-page/images/v1/shape2.png') }}" alt="shape">
        </div>
      </div>
    </div>
  </div>
  <!-- End sofax hero section -->
  <section class="sofax-slider-section">
    <div class="container">
      <div class="sofax-title-section">
        <h4>Trusted by 1600+ of the world's most popular companies</h4>
      </div>
<div class="sofax-brand-slider">
  <div class="sofax-logo-icon-item">
    <img src="{{ asset('assets/landing-page/images/v1/waverio.png') }}" alt="">
  </div>
  <div class="sofax-logo-icon-item">
    <img src="{{ asset('assets/landing-page/images/v1/logoipsum.png') }}" alt="">
  </div>
  <div class="sofax-logo-icon-item">
    <img src="{{ asset('assets/landing-page/images/v1/alterbone.png') }}" alt="">
  </div>
  <div class="sofax-logo-icon-item">
    <img src="{{ asset('assets/landing-page/images/v1/carbonia.png') }}" alt="">
  </div>
  <div class="sofax-logo-icon-item">
    <img src="{{ asset('assets/landing-page/images/v1/tinygone.png') }}" alt="">
  </div>
</div>
    </div>
  </section>
  <!--  end brand logo section -->
  <div id="service" class="section sofax-section-padding bg-light">
    <div class="container">
      <div class="sofax-section-title max-width-770">
        <div class="row">
          <div class="col-xl-8 col-lg-8">
            <div class="tg-heading-subheading animation-style3">
              <h2>Solution to organize your sales in one place</h2>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 d-flex justify-content-end align-items-center">
            <div class="sofax-title-btn">
              <a class="sofax-default-btn pill" data-text="View all services" href="service.html">
                <span class="button-wraper">View all services</span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-4 col-md-6">
          <div class="sofax-iconbox-wrap">
            <div class="sofax-iconbox-icon">
              <img src="assets/images/v1/icon3.png" alt="">
            </div>
            <div class="sofax-iconbox-data">
              <h4>Workflow Automation</h4>
              <p>Repetitive a tasks & workflows, such as email communications, follow-up, & data entry, freeing up sales.</p>
              <a class="sofax-icon-btn" href="single-service.html">More details <img src="assets/images/v1/arrow-right.png" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="sofax-iconbox-wrap">
            <div class="sofax-iconbox-icon">
              <img src="assets/images/v1/icon2.png" alt="">
            </div>
            <div class="sofax-iconbox-data">
              <h4>Lead Management</h4>
              <p>Tracking, qualifying and nurturing to customers or leads throughout their journey in the sales pipeline.</p>
              <a class="sofax-icon-btn" href="single-service.html">More details <img src="assets/images/v1/arrow-right.png" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="sofax-iconbox-wrap">
            <div class="sofax-iconbox-icon">
              <img src="assets/images/v1/icon1.png" alt="">
            </div>
            <div class="sofax-iconbox-data">
              <h4>Sales Forecasting</h4>
              <p>Analyzing past sales data, including sales volume, revenue customers to demographics & seasonality.</p>
              <a class="sofax-icon-btn" href="single-service.html">More details <img src="assets/images/v1/arrow-right.png" alt=""></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end service section -->
  <div class="sofax-section-padding2">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="sofax-content-img box-shadow mb-130">
            <img src="assets/images/v1/contentthumb1.png" alt="">
            <div class="sofax-card-shape">
              <img src="assets/images/v1/card.png" alt="">
            </div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="sofax-default-content tac ml-50 mb-130">
            <div class="tg-heading-subheading animation-style3">
              <h2>Optimize your sales without any hassle</h2>
            </div>
            <p>Sales forecasting, & analytics that enable users to streamline their sales workflows, identify areas for improvement and also make data-driven. </p>
            <div class="extra-mt">
              <div class="sofax-iconbox-wrap2">
                <div class="sofax-iconbox-icon2">
                  <img src="assets/images/v1/check-circle.png" alt="">
                </div>
                <div class="sofax-iconbox-data2">
                  <h4>Streamline processes</h4>
                  <p>Automate repetitive tasks such as lead nurturing, follow- ups and order to the processing with using salesphere.</p>
                </div>
              </div>
              <div class="sofax-iconbox-wrap2">
                <div class="sofax-iconbox-icon2">
                  <img src="assets/images/v1/check-circle.png" alt="">
                </div>
                <div class="sofax-iconbox-data2">
                  <h4>Understand your audience</h4>
                  <p>Utilize salesphere to gather data and insights about your target audience. Their needs preferences & pain points.</p>
                </div>
              </div>
              <div class="sofax-iconbox-wrap2">
                <div class="sofax-iconbox-icon2">
                  <img src="assets/images/v1/check-circle.png" alt="">
                </div>
                <div class="sofax-iconbox-data2">
                  <h4>Utilize customer data</h4>
                  <p>Use this data to understand your customers preferences behaviors and pain the points,tailor your sales pitches.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-5 order-lg-2">
          <div class="sofax-content-img2 position-ralatiove ml-31">
            <img src="assets/images/v1/contentimg2.png" alt="">
            <div class="sofax-content-shape-v1">
              <img src="assets/images/v1/shape3.png" alt="">
            </div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="sofax-default-content mr-80 tac fs-19">
            <h2>Use sales insights to drive your strategy</h2>
            <p>These are just a few examp & the best choice for you will depend on the factors such as your budget your team & the specific features you need.</p>
            <div class="extra-mt">
              <div class="sofax-iconbox-wrap2">
                <div class="sofax-iconbox-icon2">
                  <img src="assets/images/v1/icon9.png" alt="">
                </div>
                <div class="sofax-iconbox-data2">
                  <h4>Time saved in closing deals</h4>
                  <p>You'll save time managing and closing deals by having a centralized hub for all your sales activities.</p>
                </div>
              </div>
              <div class="sofax-iconbox-wrap2">
                <div class="sofax-iconbox-icon2">
                  <img src="assets/images/v1/icon4.png" alt="">
                </div>
                <div class="sofax-iconbox-data2">
                  <h4>Quick access of data & communication</h4>
                  <p>Quickly access all the information you need to close deals. Have contact details for each prospect in one place.</p>
                </div>
              </div>
            </div>
            <div class="extra-mt">
              <a class="sofax-default-btn pill" data-text="Get started" href="contact-us.html">
                <span class="button-wraper">Get started</span>
              </a>
            </div>
            <div class="sofax-content-shape-v1">
              <img src="assets/images/v1/shape3.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end content1 section -->
  <section id="pricing" class="section sofax-section-padding bg-light">
    <div class="container">
      <div class="sofax-section-title center pb-50">
        <div class="tg-heading-subheading animation-style3">
          <h2>Discover the right price plan for you</h2>
        </div>
      </div>
      <div class="pricing-btn">
        <label>Per Month</label>
        <div class="toggle-btn">
          <input class="form-check-input btn-toggle price-deck-trigger" type="checkbox" id="flexSwitchCheckDefault" data-pricing-trigger data-target="#table-price-value" checked>
        </div>
        <label>Per Year</label>
      </div>
      <div class="row" id="table-price-value" data-pricing-dynamic data-value-active="monthly">
        <div class="col-xl-4 col-md-6">
          <div class="sofax-pricing-wrap wow fadeInUpX" data-wow-delay="0.1s">
            <div class="sofax-pricing-header">
              <img src="{{ asset('assets/landing-page/images/v1/icon7.png') }}" alt="">
              <h4>Essential</h4>
            </div>
            <div class="sofax-pricing-price">
              <h2>$</h2>
              <div class="sofax-price-value dynamic-value" data-active="19" data-monthly="19" data-yearly="39"></div>
              <p class="dynamic-value" data-active="/Per Month" data-monthly="/Per Month" data-yearly="/Per Yearly"></p>
            </div>
            <div class="sofax-pricing-body">
              <h5>Key features:</h5>
              <ul>
                <li><img src="{{ asset('assets/landing-page/images/v1/icon8.png') }}" alt="">Lead, deal, contact, calendar and pipeline management</li>
                <li><img src="{{ asset('assets/landing-page/images/v1/icon8.png') }}" alt="">Seamless data import and 400+ integrations</li>
                <li><img src="{{ asset('assets/landing-page/images/v1/icon8.png') }}" alt="">24/7, multi-language support</li>
              </ul>
            </div>
            <div class="sofax-pricing-footer">
              <a class="sofax-default-btn outline-btn d-block pill" href="contact-us.html">Purchase now</a>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="sofax-pricing-wrap wow fadeInUpX active" data-wow-delay="0.2s">
            <div class="sofax-pricing-header">
              <img src="{{ asset('assets/landing-page/images/v1/icon5.png') }}" alt="">
              <h4>Professional</h4>
            </div>
            <div class="sofax-pricing-price">
              <h2>$</h2>
              <div class="sofax-price-value dynamic-value" data-active="49" data-monthly="49" data-yearly="69"></div>
              <p class="dynamic-value" data-active="/Per Month" data-monthly="/Per Month" data-yearly="/Per Yearly"></p>
            </div>
            <div class="sofax-pricing-body">
              <h5>Key features:</h5>
              <ul>
                <li><img src="{{ asset('assets/landing-page/images/v1/icon8.png') }}" alt="">Full email sync with templates, open, click tracking & emailing</li>
                <li><img src="{{ asset('assets/landing-page/images/v1/icon8.png') }}" alt="">Automations builder, including email sequences</li>
                <li><img src="{{ asset('assets/landing-page/images/v1/icon8.png') }}" alt="">Meeting, email and video call </li>
              </ul>
            </div>
            <div class="sofax-pricing-footer">
              <a class="sofax-default-btn d-block pill btn-hover" href="contact-us.html">Purchase now</a>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="sofax-pricing-wrap wow fadeInUpX" data-wow-delay="0.3s">
            <div class="sofax-pricing-header">
              <img src="{{ asset('assets/landing-page/images/v1/icon6.png') }}" alt="">
              <h4>Enterprise</h4>
            </div>
            <div class="sofax-pricing-price">
              <h2>$</h2>
              <div class="sofax-price-value dynamic-value" data-active="129" data-monthly="129" data-yearly="199"></div>
              <p class="dynamic-value" data-active="/Per Month" data-monthly="/Per Month" data-yearly="/Per Yearly"></p>
            </div>
            <div class="sofax-pricing-body">
              <h5>Key features:</h5>
              <ul>
                <li><img src="{{ asset('assets/landing-page/images/v1/icon8.png') }}" alt="">Streamlined lead routing and account access control</li>
                <li><img src="{{ asset('assets/landing-page/images/v1/icon8.png') }}" alt="">Document and contract management with e-signatures</li>
                <li><img src="{{ asset('assets/landing-page/images/v1/icon8.png') }}" alt="">Revenue forecasts & reporting</li>
              </ul>
            </div>
            <div class="sofax-pricing-footer">
              <a class="sofax-default-btn outline-btn d-block pill" href="contact-us.html">Purchase now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end pricing section -->
  <section id="integration" class="sofax-section-padding2 dark-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="integration-social-icon wow fadeInUpX">
            <img src="assets/images/v1/icon10.png" alt="">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="sofax-default-content tac light-color">
            <div class="tg-heading-subheading animation-style3">
              <h2>Integrate your tech stack & many tools</h2>
            </div>
            <p>Integrating with the apps that drive your business. Seamlessly connect with your favorite or new tools with tailored recommendations.</p>
            <div class="extra-mt">
              <a class="sofax-default-btn pill" data-text="View all integrations" href="contact-us.html">
                <span class="button-wraper">View all integrations </span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end integration section -->
  <section id="testimonial" class="sofax-section-padding2">
    <div class="container">
      <div class="sofax-section-title center">
        <div class="tg-heading-subheading animation-style3">
          <h2>See what our users have to say about it</h2>
        </div>
      </div>
    </div>
    <div class="sofax-testimonial-slider">
      <div class="sofax-testimonial-content">
        <div class="sofax-testimonial-rating">
          <ul>
            <li>
              <img src="{{ asset('assets/landing-page/images/v1/rattingful.svg') }}" alt="">
            </li>
            <li>
              <img src="{{ asset('assets/landing-page/images/v1/rattingful.svg') }}" alt="">
            </li>
            <li>
              <img src="{{ asset('assets/landing-page/images/v1/rattingful.svg') }}" alt="">
            </li>
            <li>
              <img src="{{ asset('assets/landing-page/images/v1/rattingful.svg') }}" alt="">
            </li>
            <li>
              <img src="{{ asset('assets/landing-page/images/v1/rattinghalf.svg') }}" alt="">
            </li>
          </ul>
        </div>
        <div class="sofax-testimonial-data">
          <p>Great results enjoyable to the works with & most importanly enabled us to the presence on the website needed conduct business.</p>
        </div>
        <div class="sofax-testimonial-author">
          <div class="sofax-testimonial-author-thumb">
            <img src="assets/images/v1/member1.png" alt="">
          </div>
          <div class="sofax-testimonial-author-data">
            <h5>Derrick Turner</h5>
            <p>Co-Founder</p>
          </div>
        </div>
      </div>
      <div class="sofax-testimonial-content">
        <div class="sofax-testimonial-rating">
          <ul>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
          </ul>
        </div>
        <div class="sofax-testimonial-data">
          <p>I am a would need more details to a provide relevant informatio business clients' reviews are feedback from in a individuals or companies.</p>
        </div>
        <div class="sofax-testimonial-author">
          <div class="sofax-testimonial-author-thumb">
            <img src="assets/images/v1/member2.png" alt="">
          </div>
          <div class="sofax-testimonial-author-data">
            <h5>Wellim Selith </h5>
            <p>Web Developer</p>
          </div>
        </div>
      </div>
      <div class="sofax-testimonial-content">
        <div class="sofax-testimonial-rating">
          <ul>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
          </ul>
        </div>
        <div class="sofax-testimonial-data">
          <p>It’s an all-in-one solution to that the has turbocharged the growth. The lead generation & capbilities. our partner & result spesk.</p>
        </div>
        <div class="sofax-testimonial-author">
          <div class="sofax-testimonial-author-thumb">
            <img src="assets/images/v1/member3.png" alt="">
          </div>
          <div class="sofax-testimonial-author-data">
            <h5>Semits Johan</h5>
            <p>Web Developer</p>
          </div>
        </div>
      </div>
      <div class="sofax-testimonial-content">
        <div class="sofax-testimonial-rating">
          <ul>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
          </ul>
        </div>
        <div class="sofax-testimonial-data">
          <p>Great results enjoyable to the works with & most importanly enabled us to the presence on the website needed conduct business.</p>
        </div>
        <div class="sofax-testimonial-author">
          <div class="sofax-testimonial-author-thumb">
            <img src="assets/images/v1/member1.png" alt="">
          </div>
          <div class="sofax-testimonial-author-data">
            <h5>Derrick Turner</h5>
            <p>Co-Founder</p>
          </div>
        </div>
      </div>
      <div class="sofax-testimonial-content">
        <div class="sofax-testimonial-rating">
          <ul>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
          </ul>
        </div>
        <div class="sofax-testimonial-data">
          <p>I am a would need more details to a provide relevant informatio business clients' reviews are feedback from in a individuals or companies.</p>
        </div>
        <div class="sofax-testimonial-author">
          <div class="sofax-testimonial-author-thumb">
            <img src="assets/images/v1/member2.png" alt="">
          </div>
          <div class="sofax-testimonial-author-data">
            <h5>Wellim Selith </h5>
            <p>Web Developer</p>
          </div>
        </div>
      </div>
    </div>
    <div class="sofax-testimonial-slider-2">
      <div class="sofax-testimonial-content">
        <div class="sofax-testimonial-rating">
          <ul>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
          </ul>
        </div>
        <div class="sofax-testimonial-data">
          <p>Great results enjoyable to the works with & most importanly enabled us to the presence on the website needed conduct business.</p>
        </div>
        <div class="sofax-testimonial-author">
          <div class="sofax-testimonial-author-thumb">
            <img src="assets/images/v1/member1.png" alt="">
          </div>
          <div class="sofax-testimonial-author-data">
            <h5>Derrick Turner</h5>
            <p>Co-Founder</p>
          </div>
        </div>
      </div>
      <div class="sofax-testimonial-content">
        <div class="sofax-testimonial-rating">
          <ul>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
          </ul>
        </div>
        <div class="sofax-testimonial-data">
          <p>I am a would need more details to a provide relevant informatio business clients' reviews are feedback from in a individuals or companies.</p>
        </div>
        <div class="sofax-testimonial-author">
          <div class="sofax-testimonial-author-thumb">
            <img src="assets/images/v1/member2.png" alt="">
          </div>
          <div class="sofax-testimonial-author-data">
            <h5>Wellim Selith </h5>
            <p>Web Developer</p>
          </div>
        </div>
      </div>
      <div class="sofax-testimonial-content">
        <div class="sofax-testimonial-rating">
          <ul>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
          </ul>
        </div>
        <div class="sofax-testimonial-data">
          <p>It’s an all-in-one solution to that the has turbocharged the growth. The lead generation & capbilities. our partner & result spesk.</p>
        </div>
        <div class="sofax-testimonial-author">
          <div class="sofax-testimonial-author-thumb">
            <img src="assets/images/v1/member3.png" alt="">
          </div>
          <div class="sofax-testimonial-author-data">
            <h5>Semits Johan</h5>
            <p>Web Developer</p>
          </div>
        </div>
      </div>
      <div class="sofax-testimonial-content">
        <div class="sofax-testimonial-rating">
          <ul>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
          </ul>
        </div>
        <div class="sofax-testimonial-data">
          <p>Great results enjoyable to the works with & most importanly enabled us to the presence on the website needed conduct business.</p>
        </div>
        <div class="sofax-testimonial-author">
          <div class="sofax-testimonial-author-thumb">
            <img src="assets/images/v1/member1.png" alt="">
          </div>
          <div class="sofax-testimonial-author-data">
            <h5>Derrick Turner</h5>
            <p>Co-Founder</p>
          </div>
        </div>
      </div>
      <div class="sofax-testimonial-content">
        <div class="sofax-testimonial-rating">
          <ul>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
          </ul>
        </div>
        <div class="sofax-testimonial-data">
          <p>I am a would need more details to a provide relevant informatio business clients' reviews are feedback from in a individuals or companies.</p>
        </div>
        <div class="sofax-testimonial-author">
          <div class="sofax-testimonial-author-thumb">
            <img src="assets/images/v1/member2.png" alt="">
          </div>
          <div class="sofax-testimonial-author-data">
            <h5>Wellim Selith </h5>
            <p>Web Developer</p>
          </div>
        </div>
      </div>
      <div class="sofax-testimonial-content">
        <div class="sofax-testimonial-rating">
          <ul>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
            <li>
              <img src="assets/images/v1/rattingful.svg" alt="">
            </li>
          </ul>
        </div>
        <div class="sofax-testimonial-data">
          <p>Great results enjoyable to the works with & most importanly enabled us to the presence on the website needed conduct business.</p>
        </div>
        <div class="sofax-testimonial-author">
          <div class="sofax-testimonial-author-thumb">
            <img src="assets/images/v1/member1.png" alt="">
          </div>
          <div class="sofax-testimonial-author-data">
            <h5>Derrick Turner</h5>
            <p>Co-Founder</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end testimonial section -->
  <section class="sofax-section-padding2 bg-light">
    <div class="container">
      <div class="sofax-cta-content">
        <div class="tg-heading-subheading animation-style3">
          <h2>Driving business growth with a new experience</h2>
        </div>
        <p>Start tracking your sales pipeline, manage leads, and automate your entire sales process in one place so you can easily focus on selling.</p>
        <div class="extra-mt">
          <a class="sofax-default-btn pill" data-text="Create a free account" href="sign-up.html">
            <span class="button-wraper">Create a free account</span>
          </a>
          <span class="cta-bottom">Full access. No credit card needed.</span>
        </div>
        <div class="sofax-cta-shape">
          <img src="assets/images/v1/shape4.png" alt="">
        </div>
      </div>
    </div>
  </section>
  <!-- end cta section -->






  <footer class="sofax-footer-section">
    <div class="container">
      <div class="sofax-footer-top">
        <div class="row">
          <div class="col-xl-4 col-md-12">
            <div class="sofax-footer-wrap mr-15">
              <a href="index.html"><img src="assets/images/logo/logo-dark.svg" alt=""></a>
              <p>Sofax is best softwere platform manage your sales depends on your specific business needs budget & industry.</p>
              <div class="sofax-social-icon">
                <ul>
                  <li>
                    <a href="https://www.twitter.com/">
                      <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.96447 7.24539L16.1975 0H14.7205L9.30833 6.29107L4.98567 0H0L6.5367 9.51321L0 17.1111H1.47711L7.19246 10.4675L11.7575 17.1111H16.7432L9.9641 7.24539H9.96447ZM7.94136 9.59702L7.27906 8.64972L2.00933 1.11194H4.27809L8.53082 7.19517L9.19312 8.14247L14.7212 16.0497H12.4524L7.94136 9.59739V9.59702Z" fill="#0E0E0E" />
                      </svg>
                    </a>
                  </li>
                  <li>
                    <a href="https://www.facebook.com/">
                      <svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.88663 0.00357362L7.65153 0C5.14046 0 3.5177 1.65905 3.5177 4.22688V6.17575H1.27039C1.0762 6.17575 0.918945 6.33263 0.918945 6.52614V9.34984C0.918945 9.54335 1.07638 9.70005 1.27039 9.70005H3.5177V16.8251C3.5177 17.0187 3.67495 17.1754 3.86914 17.1754H6.80123C6.99543 17.1754 7.15268 17.0185 7.15268 16.8251V9.70005H9.7803C9.9745 9.70005 10.1318 9.54335 10.1318 9.34984L10.1328 6.52614C10.1328 6.43323 10.0957 6.34425 10.0299 6.27849C9.9641 6.21274 9.87444 6.17575 9.7812 6.17575H7.15268V4.52367C7.15268 3.72961 7.34257 3.3265 8.3806 3.3265L9.88627 3.32597C10.0803 3.32597 10.2375 3.16909 10.2375 2.97575V0.353788C10.2375 0.160634 10.0805 0.00393098 9.88663 0.00357362Z" fill="#0E0E0E" />
                      </svg>
                    </a>
                  </li>
                  <li>
                    <a href="https://www.instagram.com/">
                      <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.043 0H5.9475C3.14256 0 0.86792 2.26664 0.86792 5.06173V11.1358C0.86792 13.9309 3.14256 16.1975 5.9475 16.1975H12.043C14.8479 16.1975 17.1226 13.9309 17.1226 11.1358V5.06173C17.1226 2.26664 14.8479 0 12.043 0ZM15.5987 11.1358C15.5987 13.0896 14.0037 14.679 12.043 14.679H5.9475C3.98678 14.679 2.39179 13.0896 2.39179 11.1358V5.06173C2.39179 3.1079 3.98678 1.51852 5.9475 1.51852H12.043C14.0037 1.51852 15.5987 3.1079 15.5987 5.06173V11.1358Z" fill="#0E0E0E" />
                        <path d="M9.00312 4.05713C6.75896 4.05713 4.93945 5.87024 4.93945 8.10651C4.93945 10.3428 6.75896 12.1559 9.00312 12.1559C11.2473 12.1559 13.0668 10.3428 13.0668 8.10651C13.0668 5.87024 11.2473 4.05713 9.00312 4.05713ZM9.00312 10.6374C7.60319 10.6374 6.46333 9.50153 6.46333 8.10651C6.46333 6.71049 7.60319 5.57565 9.00312 5.57565C10.4031 5.57565 11.5429 6.71049 11.5429 8.10651C11.5429 9.50153 10.4031 10.6374 9.00312 10.6374Z" fill="#0E0E0E" />
                        <path d="M13.3527 4.29821C13.653 4.29821 13.8964 4.05602 13.8964 3.75726C13.8964 3.4585 13.653 3.21631 13.3527 3.21631C13.0525 3.21631 12.8091 3.4585 12.8091 3.75726C12.8091 4.05602 13.0525 4.29821 13.3527 4.29821Z" fill="#0E0E0E" />
                      </svg>
                    </a>
                  </li>
                  <li>
                    <a href="https://bd.linkedin.com/">
                      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.877 15.0112V15.0106H15.8807V9.49947C15.8807 6.8034 15.2983 4.72656 12.1353 4.72656C10.6147 4.72656 9.59433 5.55805 9.17775 6.34633H9.13377V4.97826H6.13477V15.0106H9.25755V10.0429C9.25755 8.73498 9.50637 7.47022 11.1318 7.47022C12.7335 7.47022 12.7573 8.96289 12.7573 10.1268V15.0112H15.877Z" fill="#0E0E0E" />
                        <path d="M1.0498 4.99463H4.17636V15.0269H1.0498V4.99463Z" fill="#0E0E0E" />
                        <path d="M2.62114 0C1.62147 0 0.810303 0.808321 0.810303 1.80448C0.810303 2.80063 1.62147 3.62586 2.62114 3.62586C3.62081 3.62586 4.43198 2.80063 4.43198 1.80448C4.43135 0.808321 3.62018 0 2.62114 0V0Z" fill="#0E0E0E" />
                      </svg>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-4">
            <div class="sofax-footer-menu ml-100 sofax-footer-active">
              <h5>Company</h5>
              <ul>
                <li><a href="about-us.html">About Us</a></li>
                <li><a href="contact-us.html">Contact US</a></li>
                <li><a href="contact-us.html">Privacy Policy</a></li>
                <li><a href="terms&condition.html">Terms & Conditions</a></li>
              </ul>
            </div>
          </div>
          <div class="col-xl-2 col-md-4">
            <div class="sofax-footer-menu ml-50">
              <h5>Utility pages</h5>
              <ul>
                <li><a href="contact-us.html">Instructions</a></li>
                <li><a href="contact-us.html">Style guide</a></li>
                <li><a href="404.html">404 Pages</a></li>
                <li><a href="contact-us.html">Licenses</a></li>
              </ul>
            </div>
          </div>
          <div class="col-xl-3 col-md-4">
            <div class="sofax-footer-menu sofax-footer-active">
              <h5>Download Now</h5>
              <a class="social-icon" href="https://www.apple.com/app-store/">
                <img src="assets/images/v1/app-store.png" alt="">
              </a>
              <a class="social-icon" href="https://playstore.com/">
                <img src="assets/images/v1/play-store.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="sofax-footer-bottom center">
        <p>© 2024 KJA-KASIR All Rights Reserved.</p>
      </div>
    </div>
  </footer>





<!-- scripts -->
<script src="{{ asset('assets/landing-page/js/jquery-3.7.1.js') }}"></script>
<script src="{{ asset('assets/landing-page/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/landing-page/js/aos.js') }}"></script>
<script src="{{ asset('assets/landing-page/js/menu/menu.js') }}"></script>
<script src="{{ asset('assets/landing-page/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/landing-page/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/landing-page/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/landing-page/js/countdown.js') }}"></script>
<script src="{{ asset('assets/landing-page/js/slick.js') }}"></script>
<script src="{{ asset('assets/landing-page/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/landing-page/js/modernizr.min.js') }}"></script>
<script src="{{ asset('assets/landing-page/js/countdown.js') }}"></script>
<script src="{{ asset('assets/landing-page/js/skill-bar.js') }}"></script>
<script src="{{ asset('assets/landing-page/js/pricing-switcher.js') }}"></script>
<script src="{{ asset('assets/landing-page/js/top-to-bottom.js') }}"></script>
<script src="{{ asset('assets/landing-page/js/gsap.js') }}"></script>
<script src="{{ asset('assets/landing-page/js/ScrollTrigger.js') }}"></script>
<script src="{{ asset('assets/landing-page/js/SplitText.js') }}"></script>
<script src="{{ asset('assets/landing-page/js/gsap-animation.js') }}"></script>
<!-- <script src="{{ asset('assets/landing-page/js/scrollsmooth.js') }}"></script> -->
<script src="{{ asset('assets/landing-page/js/accordion.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyArZVfNvjnLNwJZlLJKuOiWHZ6vtQzzb1Y"></script>

  <script src="{{ asset('assets/landing-page/js/app.js') }}"></script>

</body>
</html>
