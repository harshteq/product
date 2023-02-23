<aside class="menu-sidebar d-none d-lg-block">
   <!-- <?php echo substr($_SERVER['SCRIPT_NAME'],strpos($_SERVER['SCRIPT_NAME'],"/")+1);?> -->
            <div class="logo">
            
              <?= ucfirst($data->user_profile->first_name)?>&nbsp&nbsp
               <?= $this->Html->image($data->user_profile->profile_image,['width'=>'70px']) ?>
            </a>
        </div>
        <?php


        ?>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li class="active has-sub">

                        <i class="fas fa-table"></i><?= $this->Html->link(__('Dash board'), ['action' => 'adminpanel']) ?>
                    </li>
                    <li>
                        <i class="fas fa-table"></i> <?= $this->Html->link(__('View Profile'), ['action' => 'adminview', $data->id]) ?>
                    </li>
                    <li>
                         <i class="fas fa-table"></i><?= $this->Html->link(__('Add Category'), ['action' => 'addcategory']) ?>
                        </li>
                        <li>
                        <i class="fas fa-table"></i><?= $this->Html->link(__('Product Categories'), ['action' => 'viewcategory']) ?>
                        </li>
                        <li>
                        <i class="fas fa-table"></i><?= $this->Html->link(__('Add New Product'), ['action' => 'productadd']) ?>
                        </li>
                        <li>
                                <i class="far fa-check-square"></i><?= $this->Html->link(__('User Listing'), ['action' => 'userlist']) ?>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>