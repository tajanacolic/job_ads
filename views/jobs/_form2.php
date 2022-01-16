<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<h1 class="view-title-app">Send application</h1>

<div class="container">

    <form style="padding-top: 100px" method="post">

        <div class="row">
            <div class="col-25">
                <label>Name</label></div>
            <div class="col-75">
                <input type="text" name="app_name" placeholder="Eg. John">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label>Surname</label>
            </div>
            <div class="col-75">
                <input type="text" name="app_surname" placeholder="Eg. Doe">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label>Email address</label>
            </div>
            <div class="col-75">
                <input type="email" name="app_email" placeholder="Eg. john@example.com">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label>Phone number</label>
            </div>
            <div class="col-75">
                <input type="tel" name="app_tel" placeholder="Eg. +657 653 987">
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label>Upload CV</label>
            </div>
            <div class="col-75">
                <input type="file" name="app_cv">
            </div>
        </div>

        <br>

        <div class="row">
            <input type="submit" value="Submit">
        </div>

    </form>

</div>