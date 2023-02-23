
<div class="container add ">
    <div class="row addrow">
        <div class="col-md-6 mt-2">
            
            <?php echo $this->Html->image('bg-img.jpg')?>
           
        </div>
        <div class="col-md-4 register">
         
            <?= $this->Form->create($user,['enctype'=>'multipart/form-data','id'=>'formid']) ?>
            <fieldset>
            <legend><?= __('User Registration Form') ?></legend>

                    <?php echo $this->Form->control('user_profile.first_name',['required'=>'false','class'=>'form-control']);?>
                    <?php echo $this->Form->control('user_profile.last_name',['required'=>'false','class'=>'form-control']);?>
                    <?php echo $this->Form->control('user_profile.contact',['required'=>'false','class'=>'form-control']);?>
                    <?php echo $this->Form->control('user_profile.address',['required'=>'false','class'=>'form-control']);?>
                    <?php echo $this->Form->control('user_profile.profile_image',['type'=>'file','class'=>'form-control']);?>
                    <?php echo $this->Form->control('email',['required'=>'false','class'=>'form-control']);?>
                    <?php echo $this->Form->control('password',['required'=>'false','class'=>'form-control']);?>
            
            </fieldset>
            <?= $this->Form->button(__('Register'),['class'=>'btn btn-primary mt-2 ']) ?>
            <!-- <?= $this->Form->button(__('Register with ajax'),['class'=>'btn btn-primary mt-2 ','id'=>'submitbyajax']) ?> -->
            <?= $this->Form->end() ?>
            <p>If you are existing user please <?= $this->Html->link(__('Click Here'), ['action' => 'login']) ?>  to login </p>
           
        </div>
        <div class="col-md-2"></div>

    </div>
</div>
<!-- 
<script>
    $('#formid').on('submit',function(e){
        e.preventDefault();

        var formData =new FormData(this);
        
        $.ajax({
            url:'http://localhost:8765/users/add',
            method:'POST',
            data:formData,
            contentType:false,
            processData:false,
            success:function(data){
                alert('data submit succesfully');
            }



        });

    });
</script> -->


