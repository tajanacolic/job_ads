<div>

    <form style="display: inline-block" method="post" action="/jobs/applications/view/delete">

        <input type="hidden" name="app_id" value="<?php echo $app['app_id'] ?>">

        <button type="submit" class="button-details">Delete</button>

    </form>

</div>

<h1 class="view-title"><?php echo $app['job_name'] . ' ' . $app['job_surname'] ?></h1>

<h2 class="view-title2"><?php echo $app['job_email'] . "  |  " . $app['job_tel']?></h2>

<h3 class="view-title3"><?php echo "Job ad ID: " . $app['job_id'] ?></h3>

<a class="button-details" href="/jobs/view?id=<?php echo $app['job_id'] ?>">Job ad</a>

<a class="button-details" href="/../../<?php echo $app['job_cv'] ?>">Download CV</a>