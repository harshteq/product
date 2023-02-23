<style>
    .gradient-custom {
/* fallback for old browsers */
background: #6a11cb;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
}
</style>


<section class="h-100 gradient-custom">
  

  <div class="container py-5">
    
    <div class="row d-flex justify-content-center my-4">   
      
      <div class="col-md-8">
        <div class="card mb-4">
            <?php if(count($cart) > 0){  ?>
              <div class="card-header py-3">
                <h5 class="mb-0">cart <?php echo count($cart) ?> items</h5>
              </div>    
          <?php $total=0; ?>    
          <?php  foreach($cart as $carts):?>
            <?php  $total  = $total+$carts->product->price?>
                  <div class="card-body">
                  <!-- Single item -->
                  <div class="row">
                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                              <!-- Image -->
                              <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                              <?= $this->Html->image($carts->product->product_image,['width'=>'180px','height'=>'180px'])?>
                                   <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                   </a>
                                 </div>
                                 <!-- Image -->
                                </div>
                                
                           <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                             <!-- Data -->
                             
                                          <p class="mb-2"><strong>Product name:<?= h($carts->product->product_title) ?></strong></p>
                                          <p class="mb-2">Description:<?= h($carts->product->product_description) ?></p>
                                          <p class="mb-2">category:<?=h($carts->product->product_category)?></p>
                                          <p class="mb-2">price:<?=h($carts->product->price)?></p>
                                             <?= $this->Form->postLink(__('<i class="fas fa-trash"></i>'), ['action' => 'delete', $carts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carts->id), 'escape'=>false,'class' => 'btn btn-sm btn-danger']) ?>
                                         
                                             
                                      </button>
                                    </button>
                                  <!-- Data -->
                              </div>
      
                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                      <!-- Quantity -->
                      <div class="d-flex mb-4" style="max-width: 300px">
                       
                      <?= $this->Form->postLink(__('<i class="fas fa-minus"></i>'), ['action' => 'decrease', $carts->id], ['escape'=>false,'class' => 'btn btn-sm btn-danger']) ?>

                      <?php echo $carts->quntity; ?>

                      <?= $this->Form->postLink(__('<i class="fas fa-plus"></i>'), ['action' => 'increase', $carts->id], ['escape'=>false,'class' => 'btn btn-sm btn-danger']) ?>
                      </div>

                </div>
                      <?php endforeach; } else{?>
                        <div class="card-header py-3">
                          <h5 class="mb-0">There is no items in the cart.</h5>
                        </div>                  
                      <?php } ?>
                      
                    </div>
                    
   
        </div> 
        
      
          </div>
          <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">Summary</h5>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <?php  foreach($cart as $cartss):?>
              <li
                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                Products price:
                <span><?=h($cartss->product->price)?></span>

              </li>
              <?php endforeach; ?>
              <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                Shipping
                <span>Gratis</span>
              </li>
              <li
                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                  <strong>Total amount</strong>
                  <strong>
                    <p class="mb-0">(including VAT)</p>
                  </strong>
                </div>
                <span><strong><?= $total ?></strong></span>
              </li>
            </ul>

            <button type="button" class="btn btn-primary btn-lg btn-block">
              Go to checkout
            </button>
          </div>
        </div>
          </div>
       </div>    
          
        </section>
        


