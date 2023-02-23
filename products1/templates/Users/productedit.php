<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>


<div class="page-wrapper">

<!-- MENU SIDEBAR-->
<?php echo $this->element('flash/side_bar')?>

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
    <div class="container add ">
        <div class="row">
            <div class="col-md-4 mt-5">
                <?php echo $this->Html->image($product->product_image) ?>
            </div>
            <div class="col-md-6 register">
                <?= $this->Form->create($product,['enctype'=>'multipart/form-data','id'=>'formid']) ?>
                <fieldset>
                    <legend><?= __('Edit Product') ?></legend>
                    <?php echo $this->Form->control('product_title',['class'=>'form-control','required'=>false]);?><br>
                    <?php echo $this->Form->textarea('product_description',['class'=>'form-control','required'=>false]);?>
                    <?php echo '<label for="product category">Product Category</label>';?>
                    <select name="product_category" id=""  class="form-control">
                        <option value="<?= h($product->product_category) ?>"><?= h($product->product_category) ?></option>
                        <?php foreach ($productCategories as $productCategory): ?>
                            <option value="<?= h($productCategory->category_name) ?>"><?= h($productCategory->category_name) ?></option>  
                            <?php endforeach;?>
                        </select>
                        <?php echo $this->Form->control('edit_image',['type'=>'file','class'=>'form-control','required'=>false]);?>
                        <?php echo $this->Form->control('product_tags',['class'=>'form-control','required'=>false]);?>
                    </fieldset>
                    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary my-3']) ?>
                    <?= $this->Form->end() ?>
                </div>
                <div class='col-md-2'></div>
        </div>
    </div>    
                

