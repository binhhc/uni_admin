<body class="login">
    <h1></h1>
    <div class="container">
        <h3>ユーザーログイン</h3>
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->Form->create('User', array('class' => 'form-horizontal')); ?>
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="inputEmail">ログインID</label>
                    <div class="controls">
                      <?php echo $this->Form->input('username', array('class' => 'input-large input-block-level', 'div' => false, 'label' => false, 'required' => false, 'placeholder' => 'メールアドレス')); ?>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="inputEmail">パスワード</label>
                    <div class="controls">
                        <?php echo $this->Form->input('password', array('class' => 'input-large input-block-level','div' => false, 'label' => false, 'required' => false, 'placeholder' => 'パスワード', 'type' => 'password')); ?>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <?php echo $this->Form->button('<i class="fa fa-sign-in"></i> ログイン', array('class' => 'btn btn-large btn-primary'), array('escape' => false,'type' => 'submit'));  ?> 
                    </div>
                </div>
            </fieldset>
            <?php echo $this->Form->end(); ?>
    </div>
</body>
<script type="text/javascript">
    $('#UserUsername').focus();
</script>