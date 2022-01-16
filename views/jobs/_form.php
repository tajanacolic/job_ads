<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<form style="padding-top: 100px" method="post">

    <div class="row">
        <div class="col-25">
            <label>Job title</label></div>
        <div class="col-75">
            <input type="text" name="job_title" placeholder="Eg. Software developer" value="<?php echo $job['job_title'] ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-25">
            <label>Job Type</label>
        </div>
        <div class="col-75">
            <input type="text" name="job_type" placeholder="Eg. Full time" value="<?php echo $job['job_type'] ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-25">
            <label>Job location</label>
        </div>
        <div class="col-75">
            <input type="text" name="job_location" placeholder="Eg. Bosnia and Herzegovina" value="<?php echo $job['job_location'] ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-25">
            <label for="subject">Job position requirements</label>
        </div>
        <div class="col-75">
            <textarea name="job_requirements" placeholder="This job position requires..." style="height:200px"><?php echo $job['job_requirements'] ?></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-25">
            <label for="subject">Job description</label>
        </div>
        <div class="col-75">
            <textarea name="job_description" placeholder="Write something..." style="height:200px"><?php echo $job['job_description'] ?></textarea>
        </div>
    </div>

    <br>

    <div class="row">
        <input type="submit" value="Submit">
    </div>

</form>