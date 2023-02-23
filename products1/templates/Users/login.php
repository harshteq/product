
<div class="container add ">
    <div class="row addrow">
        
        <div class="col-md-6">
            
            <?php echo $this->Html->image('bg-img.jpg')?>
           
        </div>
        <div class="col-md-4 register mt-4">
         
            <?= $this->Form->create(null,['id'=>'formid']) ?>
            <fieldset>
            <legend><?= __('Login Form') ?></legend>

                <?= $this->Form->control('email', ['required' => true,'class'=>'form-control']) ?>
                <?= $this->Form->control('password', ['required' => true,'class'=>'form-control']) ?> 
            
            </fieldset>
            <?= $this->Form->button(__('Login'),['class'=>'btn btn-primary mt-2 ']) ?>
            <?= $this->Form->end() ?><br>
            <p>If you are not a user please <?= $this->Html->link(__('Click Here'), ['action' => 'add']) ?>  to Regsiter </p>
           
        </div>
        <div class="col-md-2"></div>
    </div>
</div>