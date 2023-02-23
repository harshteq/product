
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
	<div class="main-content">
		<div class="section__content section__content--p30">
		<div class="container-fluid">
		<div class="table-responsive">
			<div class="table-wrapper">
                <?= $this->Html->link(__('New category'), ['action' => 'addcategory'], ['class' => 'btn btn-success float-right']) ?>
                <div class="related">
                    <h1><?= __(' Product Categories') ?></h1>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Category name') ?></th>
                                <th><?= __('status') ?></th>
                                <th><?= __('Created Date') ?></th>
                                <th><?= __('Modified Date') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($productCategories as $productCategory): ?>
                <tr>
                    <td><?= $this->Number->format($productCategory->id) ?></td>
                    <td><?= h($productCategory->category_name) ?></td>
                    <?php if($productCategory->status==1) :?>
                    <td><?= $this->Form->postLink(__('active'), ['action' => 'productCategorystatus',$productCategory->id,$productCategory->status],
                     ['confirm' => __('Are you sure you want to inactive # {0}?', $productCategory->id)]) ?></td>
                     <?php else :?>
                     <td><?= $this->Form->postLink(__('inactive'), ['action' => 'productCategorystatus', $productCategory->id,$productCategory->status],
                     ['confirm' => __('Are you sure you want to active # {0}?', $productCategory->id)]) ?>
                    <?php endif;?> 
                    </td>
                    <td><?= h($productCategory->created_date) ?></td>
                    <td><?= h($productCategory->modified_date) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Edit'), ['action' => 'editcategory', $productCategory->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'deletecategory', $productCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productCategory->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                        </table>
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
                    </div>
                </div>
			</div>
		</div>  
              
    </div>
				 </div>
					 </div>
					


