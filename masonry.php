<!DOCTYPE html>
<html lang="en">

<?php include_once "parts/header.php"; ?>

<body>

<?php include_once "parts/nav.php"; ?>

    <div id="video-container">
        <div class="video-overlay"></div>
        <div class="video-content">
            <div class="inner">
              <h1>Welcome to <em>Highway</em></h1>
              <p>FREE CSS TEMPLATE by templatemo</p>
              <p>Homepage with masonry image gallery</p>
                <div class="scroll-icon">
                    <a class="scrollTo" data-scrollTo="masonry" href="#"><img src="img/scroll-icon.png" alt=""></a>
                </div>    
            </div>
        </div>
        <video autoplay="" loop="" muted>
        	<source src="highway-loop.mp4" type="video/mp4" />
        </video>
    </div>


    <div class="masonry-portfolio" id="masonry">
        <div class="container-fluid">
            <div class="masonry">
                <div class="item first-item col-md-4 col-sm-6 col-xs-12">
                  <a href="img/big_portfolio_item_1.png" data-lightbox="image-1"><div class="thumb">
                      <div class="hover-effect">
                          <div class="hover-content">
                              <h1>Succulents <em>chambray</em></h1>
                              <p>Awesome Subtittle Goes Here</p>
                          </div>
                      </div>
                      <div class="image">
                          <img src="img/masonry_item_1.png">
                      </div>
                  </div></a>
                </div>
                <div class="item col-md-4 col-sm-6 col-xs-12">
                  <a href="img/big_portfolio_item_2.png" data-lightbox="image-1"><div class="thumb">
                      <div class="hover-effect">
                          <div class="hover-content">
                              <h1>Biodiesel <em>squid</em></h1>
                              <p>Awesome Subtittle Goes Here</p>
                          </div>
                      </div>
                      <div class="image">
                          <img src="img/masonry_item_2.png">
                      </div>
                  </div></a>
                </div>
                <div class="item col-md-4 col-sm-6 col-xs-12">
                  <a href="img/big_portfolio_item_3.png" data-lightbox="image-1"><div class="thumb">
                      <div class="hover-effect">
                          <div class="hover-content">
                              <h1>raclette <em>taxidermy</em></h1>
                              <p>Awesome Subtittle Goes Here</p>
                          </div>
                      </div>
                      <div class="image">
                          <img src="img/masonry_item_3.png">
                      </div>
                  </div></a>
                </div>
                <div class="item col-md-4 col-sm-6 col-xs-12">
                  <a href="img/big_portfolio_item_5.png" data-lightbox="image-1"><div class="thumb">
                      <div class="hover-effect">
                          <div class="hover-content">
                              <h1>freegan <em>aesthetic</em></h1>
                              <p>Awesome Subtittle Goes Here</p>
                          </div>
                      </div>
                      <div class="image">
                          <img src="img/masonry_item_4.png">
                      </div>
                  </div></a>
                </div>
                <div class="item col-md-4 col-sm-6 col-xs-12">
                  <a href="img/big_portfolio_item_6.png" data-lightbox="image-1"><div class="thumb">
                      <div class="hover-effect">
                          <div class="hover-content">
                              <h1>taiyaki <em>vegan</em></h1>
                              <p>Awesome Subtittle Goes Here</p>
                          </div>
                      </div>
                      <div class="image">
                          <img src="img/masonry_item_5.png">
                      </div>
                  </div></a>
                </div>
                <div class="item col-md-4 col-sm-6 col-xs-12">
                  <a href="img/big_portfolio_item_9.png" data-lightbox="image-1"><div class="thumb">
                      <div class="hover-effect">
                          <div class="hover-content">
                              <h1>disrupt <em>street</em></h1>
                              <p>Awesome Subtittle Goes Here</p>
                          </div>
                      </div>
                      <div class="image">
                          <img src="img/masonry_item_6.png">
                      </div>
                  </div></a>
                </div>
                <div class="item last-item col-md-8 col-sm-6 col-xs-12">
                  <a href="img/big_portfolio_item_4.png" data-lightbox="image-1"><div class="thumb">
                      <div class="hover-effect">
                          <div class="hover-content">
                              <h1>humblebrag <em>brunch</em></h1>
                              <p>Awesome Subtittle Goes Here</p>
                          </div>
                      </div>
                      <div class="image">
                          <img src="img/masonry_item_7.png">
                      </div>
                  </div></a>
                </div>
            </div>
        </div>
    </div>

    <?php include_once "parts/footer.php"; ?>
    <?php include_once "parts/modal_menu.php"; ?>

</body>
</html>