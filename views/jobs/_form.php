<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form action="" method="post">

    <?php if ($job['job_image']): ?>

        <img src="/<?php echo $job['job_image'] ?>" class="update-image">

    <?php endif; ?>

    <div class="row">
        <div class="col-25">
            <label for="file">Choose image</label>
        </div>
        <div class="col-75">
            <input type="file" name="image">
        </div>
    </div>

    <div class="row">
        <div class="col-25">
            <label>Job title</label></div>
        <div class="col-75">
            <input type="text" name="title" placeholder="Eg. Software developer" value="<?php echo $job ['job_title'] ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-25">
            <label>Job Type</label>
        </div>
        <div class="col-75">
            <input type="text" name="type" placeholder="Eg. Full time" value="<?php echo $job ['job_type'] ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-25">
            <label>Job location</label>
        </div>
        <div class="col-75">
            <input type="text" name="place" placeholder="Eg. Bosnia and Herzegovina" value="<?php echo $job ['job_location'] ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-25">
            <label for="subject">Job position requirements</label>
        </div>
        <div class="col-75">
            <textarea name="requirements" placeholder="This job position requires..." style="height:200px" value="<?php echo $job ['job_requirements'] ?>"></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-25">
            <label for="subject">Job description</label>
        </div>
        <div class="col-75">
            <textarea name="description" placeholder="Write something..." style="height:200px" value="<?php echo $job ['job_description'] ?>"></textarea>
        </div>
    </div>

    <br>

    <div class="row">
        <input type="submit" value="Submit">
    </div>

</form>