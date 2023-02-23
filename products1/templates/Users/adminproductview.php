

</html>



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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<body>
    <div class="container-fluid">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-xs-6">
							<h2><?= h($product->id) ?></h2>
						</div>
						<div class="col-xs-6">
                            <?= $this->Html->link(__('back'), ['action' => 'adminpanel'], ['class' => 'btn btn-success']) ?>
                        <!-- <?= $this->Form->postLink(__('Delete '), ['action' => 'productdelete', $product->id ], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'btn btn-danger']) ?>					 -->
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>id</th>
							<th>product title</th>
							<th>product description</th>
							<th>product category</th>
							<th>product image</th>
							<th>product tags</th>
							<th>products status</th>
							<th>products created date</th>
							<!-- <th>Actions</th> -->
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?= h($product->id) ?></td>
							<td><?= h($product->product_title) ?></td>
							<td><?= h($product->product_description) ?></td>
							<td><?= h($product->product_category) ?></td>
							<td><?= $this->Html->image($product->product_image,['width'=>'100px']) ?></td>
							<td><?= h($product->product_tags) ?></td>
							<?php if($product->status ==1) :?>
                                 <td><?= ("Active") ?></td>
                                <?php else :?>
                                <td><?= ("Inactive") ?>
                                <?php endif;?> 
                                 </td>
							<td><?= h($product->created_date) ?></td>
							<!-- <td>
                            <h4 class="heading"><?= __('Actions') ?></h4>
                                <?= $this->Html->link(__('Edit'), ['action' => 'productedit', $product->id], ['class' => 'side-nav-item']) ?>
                                <?= $this->Html->link(__('List Products'), ['action' => 'adminpanel'], ['class' => 'side-nav-item']) ?>
							</td>
							 -->
						</tr>
						
					</tbody>
				</table>
                <div class="related">
                    <h4><?= __('Related Product Comments') ?></h4>
                    <?php if (!empty($product->product_comments)) : ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th><?= __('id') ?></th>
                                <th><?= __('Name') ?></th>
                                <th><?= __('Comments') ?></th>
                                <th><?= __('Created Date') ?></th>
                                <th><?= __('Modified Date') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
							<?php $number=1;?>
                            <?php foreach ($product->product_comments as $productComments) : ?>

                            <tr>
                                <td><?= h($number) ?></td>
                                <td><?= h($productComments->name) ?></td>
                                <td><?= h($productComments->comments) ?></td>
                                <td><?= h($productComments->created_date) ?></td>
                                <td><?= h($productComments->modified_date) ?></td>
                                <td class="actions">
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'commentdelete', $productComments->id ,$product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productComments->id)]) ?>
                                </td>
                            </tr>
							<?php $number++;?>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <?php endif; ?>
                </div>
			</div>
		</div>        
    </div>
</body>

