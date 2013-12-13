<div class="container">
<?php echo $this->Session->flash(); ?>
    <?php echo $this->Form->create('User', array('class' => 'form-horizontal')); ?>
    
        <div class="control-group">
            <label class="control-label" for="inputEmail">ログインID</label>
            <div class="controls">
              <?php echo $this->Form->input('username', array('div' => false, 'label' => false, 'required' => 'required', 'placeholder' => 'メールアドレス')); ?>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="inputEmail">パスワード</label>
            <div class="controls">
                <?php echo $this->Form->input('password', array('div' => false, 'label' => false, 'required' => 'required', 'placeholder' => 'パスワード', 'type' => 'password')); ?>
            </div>
        </div>
        
        <div class="control-group">
            <div class="controls">
                <?php echo $this->Form->submit('ログイン</', array('class' => 'btn'))  ?> 
            </div>
        </div>
    <?php echo $this->Form->end(); ?>
</div>
<script type="text/javascript">
    $('#UserUsername').focus();
</script>