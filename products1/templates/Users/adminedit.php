<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>



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
        <?= $this->Html->link(__('back'), ['action' => 'adminview',$user->id], ['class' => 'btn btn-primary']) ?>
        <div class="row">
            <div class="col-md-4 mt-5">
                <?php echo $this->Html->image($user->user_profile->profile_image) ?>
            </div>
            <div class="col-md-6 register">
                <?= $this->Form->create($user,['enctype'=>'multipart/form-data','id'=>'formid']) ?>
            <fieldset>
                <legend><?= __('Edit admin') ?></legend>
                
                    <?php echo $this->Form->control('email',['class'=>'form-control']);?>
                    <?php echo $this->Form->control('user_profile.first_name',['class'=>'form-control']);?>
                    <?php echo $this->Form->control('user_profile.last_name',['class'=>'form-control']);?>
                    <?php echo $this->Form->control('user_profile.contact',['class'=>'form-control']);?>
                    <?php echo $this->Form->control('user_profile.address',['class'=>'form-control']);?>
                    <?php echo $this->Form->control('user_profile.change_image',['type'=>'file','class'=>'form-control']);?>
                    
            </fieldset>
            <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success my-3']) ?>
            <?= $this->Form->end() ?>
         </div>
                <div class='col-md-2'></div>
        </div>
    </div>    
                
<!-- 
    <div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            
        </div>
    </div>
</div> -->