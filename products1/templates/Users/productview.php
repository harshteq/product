
<style>
  .fa-solid, .fas {
  font-weight: 1;
  font-size: 30px;
  padding-left: -2px;
}
  .my{
    margin-right:40px;
    margin-left:50px;
  }
</style>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>PHPJabbers.com | Free Online Store Website Template</title>

    <?=$this->Html->css(['bootstrap1.min'])?>
        <?=$this->Html->css(['fontawesome','owl','style','milligram.min'])?>
  </head>
        <style>
         .products{
          font-size:15px;
         } 
        </style>

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
                <li class="nav-item">
                <a  href="homepage"> <?= $this->Html->link(__('home'), ['action' => 'homepage'], ['class' => "nav-link"]) ?>
                </li> 
                 
                <li class="nav-item active"><a  href="homepage"> <?= $this->Html->link(__('products'), ['action' => 'productdetails'], ['class' => "nav-link"]) ?>
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
          
          </ul>
          </div>
                    
                  </nav>
                </header>
    
    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Lorem ipsum dolor sit amet</h4>
              <h2>Product Details</h2>
            </div>
          </div>
        </div>
    </div>
</div>
<div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-xs-12">
            <div>
            <?= $this->Html->image($product->product_image,['class'=>"img-fluid wc-image"]) ?> 
            </div>
          </div>
          <div class="col-md-8 col-xs-12">
              <form action="#" method="post" class="form"> 
                <div class="col-sm-8">
                <p class="lead">
                  <h3>Title : <?= h($product->product_title) ?></h3>
                </p>
                <p class="lead">
                  <h3>Description : <?= h($product->product_description) ?></h3>
                </p>
                <p class="lead">
                  <h3> category : <?= h($product->product_category) ?></h3>
                </p>
                <p class="lead">
                  <h3> price : <?= h($product->price) ?></h3>
                </p>
                <div class="row">
                  <div class="col-sm-8">
                      <p class="lead">
                        <h3>posted date : <?= h($product->created_date) ?></h3>
                      </p>
                      <?php $a=0; $b=0; foreach($product->reaction as $reaction ){
                          $a = $a + $reaction->upvote;
                          $b = $b + $reaction->downvote;
                      }
                      ?>  
                      <?= $this->Html->link(__('<i class="fa-sharp fa-solid fa-thumbs-up"></i>'), ['controller'=>'Reaction','action' => 'add',$product->id],['escape'=>false]) ?><?php echo $a ?>
                      
                      <?= $this->Html->link(__('<i class="fa-sharp fa-solid fa-thumbs-down"></i>'), ['controller'=>'Reaction','action' => 'dislike',$product->id],['escape'=>false]) ?><?php echo $b ?>
                    </div>
                    
                  </div>
                </div>
        </div>
        <div class="col-sm-8">
               

                  <div class="row">
                    <div class="col-sm-6 mt-4">
                      <?= $this->Html->link(__('Add to Cart'), ['controller'=>'cart','action' => 'add',$product->id],['class'=>'btn btn-lg btn-info']) ?>
                      <div class="form-group">
                        </div>
                    </div>
                  </div>
                </div>

    </div>
    <div class="related">
        <h2><?= __('Related Product Comments') ?></h2>
        <?php if (!empty($product->product_comments)) : ?>
            <div class="table-responsive">
                <table>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <th><?= __('name') ?></th>
                        <th><?= __('Comments') ?></th>
                        <th><?= __('Created Date') ?></th>
                    </tr>
                    <?php foreach ($product->product_comments as $productComments) : ?>
                    <tr>
                        <td><?= h($productComments->id) ?></td>
                        <td><?= h($productComments->name) ?></td>
                        <td><?= h($productComments->comments) ?></td>
                        <td><?= h($productComments->created_date) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <?php endif; ?>
        </div>
        <?= $this->Form->create($productComment) ?><br>
        <fieldset>
            <legend><h1><?= __('Add Product Comment') ?></h1></legend>
            <br>
            <?php
            echo $this->Form->textarea('comments');
  
            ?>
            <br>
            <br>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>



            </form>
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
