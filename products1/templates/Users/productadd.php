<style>
   .error-message{
    color:red;
   }
</style>
    <div class="page-wrapper">

        <!-- MENU SIDEBAR-->
        <?php echo $this->element('flash/side_bar')?>
        <!-- END MENU SIDEBAR-->
        
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                             
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                      
                                            <?= $this->Html->link(__('logout'), ['action' => 'logout'],['class'=>'btn btn-primary']) ?>
                                     </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="container add ">
            <div class="row">
                
                        <div class="col-md-6">
                           <?php echo $this->Html->image('bg-img.jpg')?>
                        </div>
                        <div class="col-md-6 register">
                            <?= $this->Form->create($product,['enctype'=>'multipart/form-data','id'=>'formid']) ?>
                            <fieldset>
                                <legend><h1><?= __('Add Product') ?></h1></legend>
                                
                                    <?php echo $this->Form->control('product_title',['class'=>'form-control','required'=>false]);?><br>
                                    <?php echo $this->Form->control('product_description',['class'=>'form-control','required'=>false]);?>
                                    <?php echo '<label for="product category">Product Category</label>';?>
                                
                                    <select name="product_category" id=""  class="form-control ">

                                        <option value="" disabled selected>choose category</option>
                                 
                                    <?php foreach ($productCategories as $productCategory): ?>
                                        <?php if($productCategory->status == 1):?>
                                        <option value="<?= h($productCategory->category_name) ?>"><?= h($productCategory->category_name) ?></option>  
                                        <?php endif;?>
                                        <?php endforeach;?>
                                        </select>
                                        <?php echo $this->Form->error('product_category') ?>    
                                    <?php echo $this->Form->control('product_image',['type'=>'file','class'=>'form-control','required'=>false]);?>
                                    <?php echo $this->Form->control('product_tags',['class'=>'form-control','required'=>false]);?>
                                    <?php echo $this->Form->control('price',['class'=>'form-control','required'=>false]);?>
                    
                            </fieldset>
                            <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary my-3']) ?>
                            <?= $this->Form->end() ?>
                       
                </div>
            </div>
            </div>
            <!-- END MAIN CONTENT-->    
            <!-- END PAGE CONTAINER-->
        </div>

    </div>





