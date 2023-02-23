<!-- <?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<html>
  <head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.css" />
  </head>
  <body>
    <input id="cities" class="form-control" value="New York,London" data-role="tagsinput" type="text">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>
    <script>
      $(function() {
        $('#cities').tagsinput()
      });
    </script>
  </body>
</html>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="products form content">
            <?= $this->Form->create($product) ?>
            <fieldset>
                <legend><?= __('Add Product') ?></legend>
                <?php
                    echo $this->Form->control('product_title');
                    echo $this->Form->control('product_description');
                    echo $this->Form->control('product_category');
                    echo $this->Form->control('product_image');
                    echo $this->Form->control('product_tags',['id'=>'cities']);
                    echo $this->Form->control('status');
                    echo $this->Form->control('created_date');
                    echo $this->Form->control('modified_date');
                   echo' <input id="example" name="example" type="text" value="jQuery,Script,Net">';
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div> -->
<!doctype html>
<html lang="en">
	<head>
		<title>jQuery Tags Input Revisited Plugin</title>
		
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
		<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		
		<script src="src/jquery.tagsinput-revisited.js"></script>
		<link rel="stylesheet" href="src/jquery.tagsinput-revisited.css" />
		
		<style>
			* {
				box-sizing: border-box;
			}
		
			html {
				height: 100%;
				margin: 0;
			}
			
			body {
				min-height: 100%;
				font-family: sans-serif;
				padding: 20px;
				margin: 0;
			}
			
			label {
				display: block;
				padding: 20px 0 5px 0;
			}
		</style>
	</head>
	<body>
		<form id="form">
			
			
			<label>Tags input with autocomplete:</label>
			<input id="form-tags-4" name="tags-4" type="text" value="">
			

		</form>
		
		<script type="text/javascript">
			$(function() {
				$('#form-tags-4').tagsInput({
					'autocomplete': {
						source: [
							'apple',
							'banana',
							'orange',
							'pizza'
						]
					} 
				});
			});
		</script>
	</body>
</html>

