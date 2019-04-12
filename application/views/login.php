<?php //if($this->session->userdata('username')) {  redirect('home'); } ?>
<?php include("common/header.php"); ?>
<div class="container">
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>Transport Login</h2>
   <p>Please enter your Username and password</p>
   </div>
   <?php echo $this->session->flashdata('msg'); ?>
    <?php $attributes = array("class" => "m-t", "id" => "loginform", "name" => "loginform","onsubmit" =>"Login.disabled=true; Login.value ='Please wait...'; return true;");
      echo form_open("login", $attributes); ?>

        <div class="form-group">


            <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username'); ?>" placeholder="Username" required><span style="color:#FF0000;"><?=form_error('username'); ?></span>

        </div>

        <div class="form-group">

            <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password" required><span style="color:#FF0000;"><?=form_error('password'); ?></span>

        </div>
        <div class="forgot">
        <a href="reset.html">Forgot password?</a>
</div>
        <input type="submit" class="btn btn-primary" value="<?php echo $pageid; ?>">

    
    </div>

</div></div></div>


</body>
</html>
