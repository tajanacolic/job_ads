<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<h1 class="view-title">Please Sign in</h1>
<form style="padding-top: 100px" method="post">

  <div class="row">
      <div class="col-25">
          <label>Username</label></div>
      <div class="col-75">
          <input type="text" name="username"  value="<?php echo $admin['username'] ?>">
      </div>
  </div>

  <div class="row">
      <div class="col-25">
          <label>Password</label></div>
      <div class="col-75">
          <input type="password" name="password" value="<?php echo $admin['password'] ?>">
      </div>
  </div>
  <div class="row">
        <input type="submit" class="signinbutton" value="Sign in">
  </div>
</form>