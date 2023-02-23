<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    body {
        color: #566787;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
		font-size: 13px;
	}
	.table-responsive {
        margin: 30px 0;
    }
	.table-wrapper {
		min-width: 1000px;
        background: #fff;
        padding: 20px 25px;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {        
		padding-bottom: 15px;
		background: #435d7d;
		color: #fff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn-group {
		float: right;
	}
	.table-title .btn {
		color: #fff;
		float: right;
		font-size: 13px;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 60px;
	}
	table.table tr th:last-child {
		width: 100px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
        margin: 0 5px;
    }
	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
		outline: none !important;
	}
	table.table td a:hover {
		color: #2196F3;
	}
	table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }    
	/* Custom checkbox */
	.custom-checkbox {
		position: relative;
	}
	.custom-checkbox input[type="checkbox"] {    
		opacity: 0;
		position: absolute;
		margin: 5px 0 0 3px;
		z-index: 9;
	}
	.custom-checkbox label:before{
		width: 18px;
		height: 18px;
	}
	.custom-checkbox label:before {
		content: '';
		margin-right: 10px;
		display: inline-block;
		vertical-align: text-top;
		background: white;
		border: 1px solid #bbb;
		border-radius: 2px;
		box-sizing: border-box;
		z-index: 2;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		content: '';
		position: absolute;
		left: 6px;
		top: 3px;
		width: 6px;
		height: 11px;
		border: solid #000;
		border-width: 0 3px 3px 0;
		transform: inherit;
		z-index: 3;
		transform: rotateZ(45deg);
	}
	.custom-checkbox input[type="checkbox"]:checked + label:before {
		border-color: #03A9F4;
		background: #03A9F4;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		border-color: #fff;
	}
	.custom-checkbox input[type="checkbox"]:disabled + label:before {
		color: #b8b8b8;
		cursor: auto;
		box-shadow: none;
		background: #ddd;
	}
	/* Modal styles */
	.modal .modal-dialog {
		max-width: 400px;
	}
	.modal .modal-header, .modal .modal-body, .modal .modal-footer {
		padding: 20px 30px;
	}
	.modal .modal-content {
		border-radius: 3px;
	}
	.modal .modal-footer {
		background: #ecf0f1;
		border-radius: 0 0 3px 3px;
	}
    .modal .modal-title {
        display: inline-block;
    }
	.modal .form-control {
		border-radius: 2px;
		box-shadow: none;
		border-color: #dddddd;
	}
	.modal textarea.form-control {
		resize: vertical;
	}
	.modal .btn {
		border-radius: 2px;
		min-width: 100px;
	}	
	.modal form label {
		font-weight: normal;
	}	
</style>

</script>
</head>
<body>
    <div class="container">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-xs-6">
							<h2>your <b>profile</b></h2>
						</div>
						<div class="col-xs-6">
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id], ['class' => 'btn btn-primary']) ?>	
                        <?= $this->Html->link(__('back'), ['action' => 'homepage'], ['class' => 'btn btn-danger']) ?>	
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>id</th>
							<th>firstname</th>
							<th>lastname</th>
							<th>email</th>
							<th>contact</th>
							<th>address</th>
							<th>image</th>
							<th>created date</th>
						</tr>
					</thead>
					<tbody>
						<tr>
                        <td><?= h($user->id) ?></td>
							<td><?= h($user->user_profile->first_name) ?></td>
							<td><?= h($user->user_profile->last_name) ?></td>
                            <td><?= h($user->email) ?></td>
                            <td><?= h($user->user_profile->contact) ?></td>
                            <td><?= h($user->user_profile->address) ?></td>
                            <td><?= $this->Html->image($user->user_profile->profile_image,['width'=>'100px']) ?></td>
                            <td><?= h($user->created_date) ?>
						</tr>
							
					</tbody>
				</table>
				
			</div>
		</div>        
    </div>
	

</body>
</html>  -->

   <!-- Header -->
   <header class="">
   <?=$this->Html->css(['bootstrap1.min'])?>

      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Online Store <em>Website</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
				<?= $this->Html->link(__(  'Home'), ['action' => 'homepage'],['class'=>'nav-link']) ?>
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item"><?= $this->Html->link(__(  'Products'), ['action' => 'productdetails'],['class'=>'nav-link']) ?></li>
                
                
                <?php
                      if($result1 == null){
                        ?>
                        <li class="nav-item"><?= $this->Html->link(__(  'Register'), ['action' => 'add'],['class'=>'nav-link']) ?></li>
                        <li class="nav-item"><?= $this->Html->link(__(  'login'), ['action' => 'login'],['class'=>'nav-link']) ?></li>
                        
                        <?php
                      }else{
                    ?>
                    <li class="nav-item"><?= $this->Html->link(__(  'logout'), ['action' => 'logout'],['class'=>'nav-link']) ?></li>

                  <?php } ?>
                  
                </ul>
              </div>
                    <?php
                      if($result1 == null){

                      }else{
                    ?>
              <?= $this->Html->image($result1->user_profile->profile_image,['width'=>'60px']) ?>
                   <div class="content1">
                <?= $this->Html->link( ucfirst($result1->user_profile->first_name), ['action' => 'view',$user1->id], ['class' => 'side-nav-item']) ?>
                <?php } ?>
            </div>
          </div>
        </nav>
      </header>
	<section style="background-color: #eee;">
  <div class="container py-5" >
    <div class="row" style="margin-top:100px">
      <div class="col-lg-4">
			<div class="card mb-4">
			<div class="card-body text-center">
				<?php echo $this->Html->image($user->user_profile->profile_image,['class'=>'profile-img'])?>
				<h5 class="my-3"><?= ucfirst($user->user_profile->first_name); ?></h5>
				<p class="text-muted mb-1"><?= h($user->email) ?></p>
				<p class="text-muted mb-4"><?= h($user->user_profile->address) ?></p>
				<div class="d-flex justify-content-center mb-2">
					<?= $this->Html->link(__('Edit Profile'), ['action' => 'edit', $user->id], ['class' => 'btn btn-primary']) ?>	

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




