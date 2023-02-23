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
</style>
  </head>

  <body>


    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand"><h2>Online Store <em>Website</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="homepage">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item active"><a class="nav-link" href="productsdetails">Products</a></li>
                <li class="nav-item"><?= $this->Html->link(__(  'contact us'), ['action' => 'index1'],['class'=>'nav-link']) ?></li>
                
                
                <?php
                      if($result1 == null){
                        ?>
                        <li class="nav-item"><a class="nav-link" href="add">Register</a></li>
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
            </ul>
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
    <?=$this->Html->image('heading-3-1920x500.jpg')?>
    </div>
    <div class="products">
      <div class="container">
        <div class="row">
        <?php foreach ($products as $product): ?> 
          <?php if($product->status==1):?>
          <div class="col-md-4">
            <div class="product-item">
              <a href="product-details.html"><?= $this->Html->image($product->product_image) ?></a>
              <div class="down-content">
              <h1>  <?= $this->Html->link(__( h($product->product_title )), ['action' => 'productview', $product->id]) ?></h1>
                <a href="product-details.html"><h4></h4></a>
                <p><?= h($product->product_description) ?></p>
                <h6> category: <?= h($product->product_category) ?></h6>
                <h6> price:  <?= h($product->price) ?></h6>
              </div>
            </div>
          </div>
          <?php endif;?>
          <?php endforeach; ?>
            </div>
          </div>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="contact-form">
              <form action="#" id="contact">
                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up location" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return location" required="">
                          </fieldset>
                       </div>
                  </div>

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up date/time" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return date/time" required="">
                          </fieldset>
                       </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter full name" required="">

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter email address" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter phone" required="">
                          </fieldset>
                       </div>
                  </div>
              </form>
           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Book Now</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>

</html>
