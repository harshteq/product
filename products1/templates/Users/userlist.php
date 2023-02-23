


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
                <div class="related">
                    <h1><?= __(' ALL USERS') ?></h1>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('firstname') ?></th>
                                <th><?= __('lastname') ?></th>
                                <th><?= __('email') ?></th>
                                <th><?= __('contact') ?></th>
                                <th><?= __('address') ?></th>
                                <th><?= __('profile image') ?></th>
                                <th><?= __('status') ?></th>
                                <th><?= __('Created Date') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($users as $user): 
                        if($user->user_type==1){
                            continue;
                        }
                    ?>
                    
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->user_profile->first_name) ?></td>
                    <td><?= h($user->user_profile->last_name) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->user_profile->contact) ?></td>
                    <td><?= h($user->user_profile->address) ?></td>
                    <td><?= $this->Html->image($user->user_profile->profile_image,['width'=>'100px']) ?></td>
                    <?php if($user->status==1) :?>
                    <td><?= $this->Form->postLink(__('active'), ['action' => 'userstatus',$user->id,$user->status],
                     ['confirm' => __('Are you sure you want to inactive # {0}?', $user->id)]) ?></td>
                     <?php else :?>
                     <td><?= $this->Form->postLink(__('inactive'), ['action' => 'userstatus', $user->id,$user->status],
                     ['confirm' => __('Are you sure you want to active # {0}?', $user->id)]) ?>
                    <?php endif;?> 
                    </td>
                    <td><?= h($user->created_date) ?></td>
                    <td class="actions">
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
					


