<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
  <!-- BASICS -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>JANHIT</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>media/front/gogreen-template/css/isotope.css" media="screen" />
  <link rel="stylesheet" href="<?php echo base_url();?>media/front/gogreen-template/js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo base_url();?>media/front/gogreen-template/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url();?>media/front/gogreen-template/css/bootstrap-theme.css">
  <link href="<?php echo base_url();?>media/front/gogreen-template/css/responsive-slider.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url();?>media/front/gogreen-template/css/animate.css">
  <link rel="stylesheet" href="<?php echo base_url();?>media/front/gogreen-template/css/style.css">

  <link rel="stylesheet" href="<?php echo base_url();?>media/front/gogreen-template/css/font-awesome.min.css">
  <!-- skin -->
  <link rel="stylesheet" href="<?php echo base_url();?>media/front/gogreen-template/skin/default.css">
  <!-- =======================================================
    Theme Name: Green
    Theme URL: https://bootstrapmade.com/green-free-one-page-bootstrap-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>


  <div class="header">
    <section id="header" class="appear">

      <div class="navbar navbar-fixed-top" role="navigation" data-0="line-height:100px; height:100px; background-color:rgba(0,0,0,0.3);" data-300="line-height:60px; height:60px; background-color:rgba(0,0,0,1);">

          <div class="navbar-header" style="margin-left:15px;">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="fa fa-bars color-white"></span>
					</button>
            <img class="responsive" src="<?php echo base_url();?>media/front/images/logow150.png" width="200px;" >
          <h1><a class="navbar-brand" href="<?php echo base_url();?>" data-0="line-height:90px;" data-300="line-height:50px;"></a></h1>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav" data-0="margin-top:20px;" data-300="margin-top:5px;">
            <li class="active"><a href="<?php echo base_url();?>">Home</a></li>
            <li><a href="<?php echo base_url();?>signin">Login</a></li>
            <li><a href="<?php echo base_url();?>signup">Sign Up</a></li>
          </ul>
        </div>
      </div>
    </section>
  </div>


  <div class="slider">
    <div id="about-slider">
      <div id="carousel-slider" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators visible-xs">
          <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-slider" data-slide-to="1"></li>
          <li data-target="#carousel-slider" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
          <div class="item active">
            <img src="<?php echo base_url();?>media/front/gogreen-template/img/1.jpg" class="img-responsive" alt="">
            <div class="carousel-caption">
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
                <h2><span>OUR MISSION</span></h2>
              </div>
              <div class="col-md-10 col-md-offset-1">
                <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
                  <p>Plant a Tree, Grow a Tree, Save Future, Save Earth</p>
                </div>
              </div>
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.9s">

              </div>
            </div>
          </div>

          <div class="item">
            <img src="<?php echo base_url();?>media/front/gogreen-template/img/2.jpg" class="img-responsive" alt="">
            <div class="carousel-caption">
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.0s">
                <h2>TREE PLANTATION</h2>
              </div>
              <div class="col-md-10 col-md-offset-1">
                <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
                  <p>Save Trees, Save Environment</p>
                </div>
              </div>
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.6s">

              </div>
            </div>
          </div>

          <div class="item">
            <img src="<?php echo base_url();?>media/front/gogreen-template/img/3.jpg" class="img-responsive" alt="">
            <div class="carousel-caption">
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.0s">
                <h2>SAVE EARTH</h2>
              </div>
              <div class="col-md-10 col-md-offset-1">
                <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
                  <p>Save Trees, Save Environment</p>
                </div>
              </div>
              <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="1.6s">

              </div>
            </div>
          </div>


        </div>

        <a class="left carousel-control hidden-xs" href="<?php echo base_url();?>media/front/gogreen-template/#carousel-slider" data-slide="prev">
					<i class="fa fa-angle-left"></i>
				</a>

        <a class=" right carousel-control hidden-xs" href="<?php echo base_url();?>media/front/gogreen-template/#carousel-slider" data-slide="next">
					<i class="fa fa-angle-right"></i>
				</a>
      </div>
      <!--/#carousel-slider-->
    </div>
    <!--/#about-slider-->
  </div>
  <!--/#slider-->

  <!--about-->
  <section id="section-about">
    <div class="container">
      <div class="about">
        <div class="row mar-bot40">
          <div class="col-md-offset-3 col-md-6">
            <div class="title">
              <div class="wow bounceIn">
                <h2 class="section-heading animated" data-animation="bounceInUp">AWARENESS</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row">

          <div class="row-slider">
            <div class="col-lg-6 mar-bot30">
              <div class="responsive-slider" data-spy="responsive-slider" data-autoplay="true">
                <div class="slides" data-group="slides">
                  <ul>
                    <div class="slide-body" data-group="slide">
                      <li><img alt="" class="img-responsive" src="<?php echo base_url();?>media/front/gogreen-template/img/9.jpg" width="100%" height="350" /></li>
                      <li><img alt="" class="img-responsive" src="<?php echo base_url();?>media/front/gogreen-template/img/10.jpg" width="100%" height="350" /></li>
                      <li><img alt="" class="img-responsive" src="<?php echo base_url();?>media/front/gogreen-template/img/11.jpg" width="100%" height="350" /></li>
                      <li><img alt="" class="img-responsive" src="<?php echo base_url();?>media/front/gogreen-template/img/12.jpg" width="100%" height="350" /></li>
                    </div>
                  </ul>
                  <a class="slider-control left" href="<?php echo base_url();?>media/front/gogreen-template/#" data-jump="prev"><i class="fa fa-angle-left fa-2x"></i></a>
                  <a class="slider-control right" href="<?php echo base_url();?>media/front/gogreen-template/#" data-jump="next"><i class="fa fa-angle-right fa-2x"></i></a>

                </div>
              </div>
            </div>

            <div class="col-lg-6 ">
              <div class="company mar-left10">
                <h4>Cost of Oxygen and Trees</h4>
                <p>The common human being breathes the amount of oxygen in a day which is sufficient to fill the 3 oxygen cylinders.
One oxygen cylinder’s cost is 700 rupee ($10) so a common human consumes the oxygen of Rs 2100 ($30) per day. And in the year, it’s Rs 7,66,500 and in the lifespan of 65 years, a person consumes the oxygen of more than 5 crores.
We get the oxygen of crores in free of costs from trees, still we cut them. Think about it.</p>
              </div>
            </div>

          </div>
        </div>

      </div>

    </div>
  </section>
  <!--/about-->

  <!-- spacer section:testimonial -->
  <section id="testimonials-3" class="section" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="align-center">
            <div class="testimonial pad-top40 pad-bot40 clearfix">
              <h5>Earth is so big, a group of people can’t do enough to save Trees so we all have fresh and clear air all over the Earth. Join your hands with us and send us your valuable feedback and please at least Plant One Tree in your whole life and spread this message One Person One Tree</h5>
              <br/>
              <!--<span class="author">&mdash; Jouse Manuel <a href="<?php echo base_url();?>media/front/gogreen-template/#">www.jouse-manuel.com</a></span>-->
            </div>

          </div>
        </div>
      </div>

    </div>

  </section>


  <section id="footer" class="section footer">
    <div class="container">
      <div class="row animated opacity mar-bot0" data-andown="fadeIn" data-animation="animation">
        <div class="col-sm-12 align-center">
          <ul class="social-network social-circle">
            <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
            <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>

      <div class="row align-center copyright">
        <div class="col-sm-12">
          <p>&copy; GO GREEN SAVE GREEN</p>
          
        </div>
      </div>
    </div>

  </section>
  <a href="#header" class="scrollup"><i class="fa fa-chevron-up"></i></a>

  <script src="<?php echo base_url();?>media/front/gogreen-template/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  <script src="<?php echo base_url();?>media/front/gogreen-template/js/jquery.js"></script>
  <script src="<?php echo base_url();?>media/front/gogreen-template/js/jquery.easing.1.3.js"></script>
  <script src="<?php echo base_url();?>media/front/gogreen-template/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>media/front/gogreen-template/js/jquery.isotope.min.js"></script>
  <script src="<?php echo base_url();?>media/front/gogreen-template/js/jquery.nicescroll.min.js"></script>
  <script src="<?php echo base_url();?>media/front/gogreen-template/js/fancybox/jquery.fancybox.pack.js"></script>
  <script src="<?php echo base_url();?>media/front/gogreen-template/js/skrollr.min.js"></script>
  <script src="<?php echo base_url();?>media/front/gogreen-template/js/jquery.scrollTo.js"></script>
  <script src="<?php echo base_url();?>media/front/gogreen-template/js/jquery.localScroll.js"></script>
  <script src="<?php echo base_url();?>media/front/gogreen-template/js/stellar.js"></script>
  <script src="<?php echo base_url();?>media/front/gogreen-template/js/responsive-slider.js"></script>
  <script src="<?php echo base_url();?>media/front/gogreen-template/js/jquery.appear.js"></script>
  <script src="<?php echo base_url();?>media/front/gogreen-template/js/grid.js"></script>
  <script src="<?php echo base_url();?>media/front/gogreen-template/js/main.js"></script>
  <script src="<?php echo base_url();?>media/front/gogreen-template/js/wow.min.js"></script>
  <script>
    wow = new WOW({}).init();
  </script>
  <script src="<?php echo base_url();?>media/front/gogreen-template/contactform/contactform.js"></script>

</body>

</html>
