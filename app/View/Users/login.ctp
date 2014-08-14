
<script type="text/javascript">
    $('#UserUsername').focus();
</script>
<?php
    echo $this->Html->css(array('jquery-ui', 'bootstrap', 'font-awesome', 'style', 'widgets'));
?>

<!-- Form area -->
<div class="admin-form">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <!-- Widget starts -->
            <div class="widget worange">
              <!-- Widget head -->
                <div class="widget-head">
                    <i class="icon-lock"></i> ユーザーログイン
                </div>
            <div class="widget-content">
                <div class="padd">
                    <?php echo $this->Session->flash(); ?>
                    <!-- Login form -->
                    <?php echo $this->Form->create('User', array('class' => 'form-horizontal')); ?>
                        <!-- Email -->
                        <div class="form-group">
                            <label class="control-label col-lg-3" for="inputEmail">ログインID</label>
                            <div class="col-lg-9">
                                <?php echo $this->Form->input('username', array('class' => 'input-large form-control', 'div' => false, 'label' => false, 'required' => false, 'placeholder' => 'メールアドレス')); ?>
                            </div>
                        </div>
                        <!-- Password -->
                        <div class="form-group">
                            <label class="control-label col-lg-3" for="inputPassword">パスワード</label>
                            <div class="col-lg-9">
                                <?php echo $this->Form->input('password', array('class' => 'input-large form-control','div' => false, 'label' => false, 'required' => false, 'placeholder' => 'パスワード', 'type' => 'password')); ?>
                            </div>
                        </div>
                        <!-- Remember me checkbox and sign in button -->
                        <div class="form-group">
                        </div>
                            <div class="col-lg-9 col-lg-offset-2">
                                <?php echo $this->Form->button('<i class="fa fa-sign-in"></i> ログイン', array('class' => 'btn btn-large btn-primary'), array('escape' => false,'type' => 'submit'));  ?>
                            </div>
                        <br>
                    <?php echo $this->Form->end(); ?>

                </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>