<!DOCTYPE html>
<html lang="en">

  <head>
<style>
  .my{
    margin-right:65px;
    margin-bottom:10px;
  }
</style>
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
  margin-right: 26px;

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
                <li class="nav-item active">
                    <a class="nav-link" href="homepage">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item"><?= $this->Html->link(__(  'Products'), ['action' => 'productdetails'],['class'=>'nav-link']) ?></li>
                <li class="nav-item"><?= $this->Html->link(__(  'contact us'), ['action' => 'index1'],['class'=>'nav-link']) ?></li>
                
                
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
            <?php
                      if($result1 == null){
                        ?>
                        <?= $this->Html->link(__('<i class="fas fa-shopping-cart"></i>'), ['controller'=>'cart','action' => 'index'],['class'=>'btn btn-lg btn-info my','escape'=>false]) ?>

            <?php }else{
            
            $a =count($cart)?>
         
            <?= $this->Html->link(__('<i class="fas fa-shopping-cart"></i><sup>('.$a.')</sup>'), ['controller'=>'cart','action' => 'index'],['class'=>'btn btn-lg btn-info my','escape'=>false]) ?>
          <?php } ?>
          
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
        <?= $this->Form->create(null,['class'=>'form-inline'],['type'=>'get'])?>
        <?= $this->Form->control('key',['label'=>false,'placeholder'=>'Search','class'=>'form-control','value'=>$this->request->getQuery('key')])?>&nbsp
        <?= $this->Form->button(__('Search'),['class'=>'btn btn-success']) ?>
        <?=$this->Form->end()?>

        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Featured Products</h2>
              <?= $this->Html->link(__('viewmore >'), ['action' => 'productdetails']) ?></a>
            </div>
          </div>
          
          <?php foreach ($products as $product): ?> 
            <?php if($product->status==1):?>
              <div class="col-md-4">
                <div class="product-item">
                  <a><?= $this->Html->image($product->product_image) ?></a>
                  <div class="down-content">
                    <h2><?= $this->Html->link(__( h($product->product_title )), ['action' => 'productview', $product->id]) ?></h2>
                    <h6> <?= h($product->product_category) ?></h6>
                    <p><?= h($product->product_description) ?></p>
                    <h6> price :<?= h($product->price) ?></h6>
                  </div>
                </div>
              </div>
              <?php endif;?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
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
              <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
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