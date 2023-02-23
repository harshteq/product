
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
            <?= $this->Html->link(__('back'), ['action' => 'adminpanel'], ['class' => 'btn btn-primary my-4']) ?>

                <div class="row addrow">
                   
                    <div class="col-md-6 ">
                    
                        <?= $this->Form->create($productCategory,['id'=>'formid']) ?>
                        <fieldset>
                        <legend><?= __('Add Product Category') ?></legend>

                            <?= $this->Form->control('category_name', ['required' => true,'class'=>'form-control']) ?> 
                        
                        </fieldset>
                        <?= $this->Form->button(__('Add'),['class'=>'btn btn-primary mt-2 ']) ?>
                        <?= $this->Form->end() ?>
                    
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

  