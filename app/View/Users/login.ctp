<div class="login-box">
    <?php echo $this->Form->create('User'); ?>
    <p class="header">ログイン</p>
    <?php echo $this->Session->flash(); ?>
    <p> 
        <?php echo $this->Form->input('username', array('div' => false, 'label' => 'ログインID', 'required' => 'required', 'placeholder' => 'メールアドレス')); ?>
    </p>
    <p> 
        <?php echo $this->Form->input('password', array('div' => false, 'label' => 'パスワード', 'required' => 'required', 'placeholder' => 'パスワード', 'type' => 'password')); ?>
    </p>
    <p class="login button"> 
        <button type="submit" class="btn btn-info"><i class="icon-off icon-white"></i> ログイン</button>
    </p>
    <?php echo $this->Form->end(); ?>
</div>
<script type="text/javascript">
    $('#UserUsername').focus();
</script>