<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>PHPJabbers.com | Free Online Store Website Template</title>

    <!-- Bootstrap core CSS -->
    <?=$this->Html->css(['bootstrap1.min'])?>

    <!-- Additional CSS Files -->
    <!-- <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css"> -->

    <?=$this->Html->css(['fontawesome','owl','style'])?>
    <style>

.padding{
        padding-top: 81px;
        margin-left: 53px;
    }
    </style>
    

  </head>

  <body>

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Online Store <em>Website</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="homepage">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item"><a class="nav-link" href="productdetails">Products</a></li>
                  <li class="nav-item"><a class="nav-link" href="add">Register</a></li>
                  <li class="nav-item"><a class="nav-link" href="login">login</a></li>

                </ul>
              </div>
          </div>
        </nav>
      </header>
      
      <!-- Page Content -->
      <div class="padding">
        <?=$this->Html->image('slider-image-1-1920x600.jpg')?>
      </div>
      <!-- Banner Starts Here -->
      <div class="banner header-text">
        <div class="owl-banner owl-carousel">
          <div class="banner-item-01">
            <?=$this->Html->image('slider-image-1-1920x600.jpg')?>
          <div class="text-content">
            <h4>Find your car today!</h4>
            <h2>Lorem ipsum dolor sit amet</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Fugiat Aspernatur</h4>
            <h2>Laboriosam reprehenderit ducimus</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Saepe Omnis</h4>
            <h2>Quaerat suscipit unde minus dicta</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Featured Products</h2>
              <a href="productdetails">view more <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          <?php foreach ($products as $product): ?> 
          <div class="col-md-4">
            <div class="product-item">
              <a href="product-details.html"><?= $this->Html->image($product->product_image) ?></a>
              <div class="down-content">
                <?= $this->Html->link(__( h($product->product_title )), ['action' => 'productview', $product->id]) ?>
                <a href="product-details.html"><h4></h4></a>
                <h6> <?= h($product->product_category) ?></h6>
                <p><?= h($product->product_description) ?></p>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>About Us</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <p>Lorem ipsum dolor sit amet, <a href="#">consectetur</a> adipisicing elit. Explicabo, esse consequatur alias repellat in excepturi inventore ad <a href="#">asperiores</a> tempora ipsa. Accusantium tenetur voluptate labore aperiam molestiae rerum excepturi minus in pariatur praesentium, corporis, aliquid dicta.</p>
              <ul class="featured-list">
                <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                <li><a href="#">Consectetur an adipisicing elit</a></li>
                <li><a href="#">It aquecorporis nulla aspernatur</a></li>
                <li><a href="#">Corporis, omnis doloremque</a></li>
              </ul>
              <a href="about-us.html" class="filled-button">Read More</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <?= $this->Html->image('about-1-570x350.jpg')?>
            </div>
          </div>
        </div>
      </div>
    </div>

    


    <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                  <h4>Lorem ipsum dolor sit amet, consectetur adipisicing.</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite author nulla.</p>
                </div>
                <div class="col-lg-4 col-md-6 text-right">
                  <a href="contact.html" class="filled-button">Contact Us</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright © 2020 Company Name - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>
</html>