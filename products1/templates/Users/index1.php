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
    }
    .content1{
      font-size: 25px;
  color: red;
  width: 78px;
  height: 65px;

}
    
    </style>
    

  </head>

  <body>

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand"><h2>Online Store <em>Website</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
           
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="homepage">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item"><?= $this->Html->link(__(  'Products'), ['action' => 'productdetails'],['class'=>'nav-link']) ?></li>
                <li class="nav-item active"><a class="nav-link" href="productsdetails">contact us</a></li>
                
                
                <?php
                      if($result1 == null){
                        ?>
                        <li class="nav-item"><?= $this->Html->link(__(  'Register'), ['action' => 'add'],['class'=>'nav-link']) ?></li>
                        <li class="nav-item"><?= $this->Html->link(__(  'login'), ['action' => 'login'],['class'=>'nav-link']) ?></li>
                        
                        <?php
                      }else{
                    ?>
                    <li class="nav-item"><?= $this->Html->link(__(  'logout'), ['action' => 'logout'],['class'=>'nav-link']) ?></li>

                  <?php } ?>
                  
                </ul>
              </div>
                    <?php
                      if($result1 == null){

                      }else{
                    ?>
              <?= $this->Html->image($result1->user_profile->profile_image,['width'=>'60px']) ?>
                   <div class="content1">
                <?= $this->Html->link( h($result1->user_profile->first_name), ['action' => 'view',$user1->id], ['class' => 'side-nav-item']) ?>
                <?php } ?>
            </div>
          </div>
        </nav>
      </header>
    <!-- Page Content -->
    <div class="page-heading contact-heading header-text" style="background-image: url(assets/images/heading-4-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Lorem ipsum dolor</h4>
              <h2>Contact Us</h2>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="find-us">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our Location on Maps</h2>
            </div>
          </div>
          <div class="col-md-8">
<!-- How to change your own map point
	1. Go to Google Maps
	2. Click on your location point
	3. Click "Share" and choose "Embed map" tab
	4. Copy only URL and paste it within the src="" field below
-->
            <div id="map">
              <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="330px" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-4">
            <div class="left-content">
              <h4>About our office</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisic elit. Sed voluptate nihil eumester consectetur similiqu consectetur.<br><br>Lorem ipsum dolor sit amet, consectetur adipisic elit. Et, consequuntur, modi mollitia corporis ipsa voluptate corrupti.</p>
              <ul class="social-icons">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-behance"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="send-message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Send us a Message</h2>
            </div>
          </div>
          <div class="col-md-8">
            <div class="contact-form">
            <?php echo $this->Form->create($contact);?>
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                    <?php echo $this->Form->control('name',['class'=>'form-control','label'=>false,'placeholder'=>'name']);?>
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                    <?php echo $this->Form->control('email',['class'=>'form-control','label'=>false,'placeholder'=>'Email address']);?>

                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                    <?php echo $this->Form->textarea('body',['class'=>'form-control','label'=>false,'placeholder'=>'Your Message']);?>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                   <?php  echo $this->Form->button('Submit',['class'=>'filled-button']);?>
                    </fieldset>
                  </div>
                </div>
                <?php echo $this->Form->end();?>
            </div>
          </div>
          <div class="col-md-4">
            <img src="assets/images/team_01.jpg" class="img-fluid" alt="">

            <h5 class="text-center" style="margin-top: 15px;"></h5>
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
