
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
	<section style="background-color: #eee;margin-top:100px">
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-4">
			<div class="card mb-4">
			<div class="card-body text-center">
				<?php echo $this->Html->image($user->user_profile->profile_image,['class'=>'profile-img'])?>
				<h5 class="my-3"><?= ucfirst($user->user_profile->first_name) ?></h5>
				<p class="text-muted mb-1"><?= h($user->email) ?></p>
				<p class="text-muted mb-4"><?= h($user->user_profile->address) ?></p>
				<div class="d-flex justify-content-center mb-2">
					<?= $this->Html->link(__('Edit Profile'), ['action' => 'adminedit', $user->id], ['class' => 'btn btn-primary']) ?>	

				</div>
			</div>
			</div>
      </div>
      <div class="col-lg-8">
			<div class="card mb-4">
			<div class="card-body">
				<div class="row">
				<div class="col-sm-3">
					<p class="mb-0">Full Name</p>
				</div>
				<div class="col-sm-9">
					<p class="text-muted mb-0"><?= ucfirst($user->user_profile->first_name) ?></p>
				</div>
				</div>
				<hr>
				<div class="row">
				<div class="col-sm-3">
					<p class="mb-0">Email</p>
				</div>
				<div class="col-sm-9">
					<p class="text-muted mb-0"><?= h($user->email) ?></p>
				</div>
				</div>
				<hr>
				<div class="row">
				<div class="col-sm-3">
					<p class="mb-0">Phone</p>
				</div>
				<div class="col-sm-9">
					<p class="text-muted mb-0"><?= h($user->user_profile->contact) ?></p>
				</div>
				</div>
				<hr>
				<div class="row">
				<div class="col-sm-3">
					<p class="mb-0">Mobile</p>
				</div>
				<div class="col-sm-9">
					<p class="text-muted mb-0"><?= h($user->user_profile->contact) ?></p>
				</div>
				</div>
				<hr>
				<div class="row">
				<div class="col-sm-3">
					<p class="mb-0">Address</p>
				</div>
				<div class="col-sm-9">
					<p class="text-muted mb-0"><?= h($user->user_profile->address) ?></p>
				</div>
				</div>
			</div>
			</div>
      </div>
    </div>
  </div>
</section>

</div>




