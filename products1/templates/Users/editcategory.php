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
                              
                                    <?= $this->Html->link(__('logout'), ['action' => 'logout']) ?>
                             </div>    
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container add ">
        <div class="row">
            <div class="col-md-4">
            <?php echo $this->Html->image('bg-img.jpg')?>          
          </div>
            <div class="col-md-6 register">
            <?= $this->Form->create($productCategory,['id'=>'formid']) ?>
            <fieldset>
                <legend><?= __('Edit Product Category') ?></legend>

                <?php echo $this->Form->control('category_name',['class'=>'form-control']);?>
                
            </fieldset>
            <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success my-3']) ?>
            <?= $this->Form->end() ?>
                </div>
                <div class='col-md-2'></div>
        </div>
    </div>    
                

