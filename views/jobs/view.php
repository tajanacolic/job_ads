<div>

    <a class="button-details" href="/jobs/view/update?id=<?php echo $job['id'] ?>">Edit</a>

</div>

<div>

    <form style="display: inline-block" method="post" action="/jobs/view/delete">

        <input type="hidden" name="id" value="<?php echo $job['id'] ?>">

        <button type="submit" class="button-details">Delete</button>

    </form>

</div>

<h1 class="view-title"><?php echo $job['job_title'] ?></h1>

<h2 class="view-title2"><?php echo $job['job_requirements'] ?></h2>

<h3 class="view-title3"><?php echo $job['create_date'] . "  |  " . $job['job_type']
        . "  |  " . $job['job_location'] ?></h3>

<p class="view-description">

    <?php echo $job['job_description'] ?>

</p>

<?php include "_form2.php" ?>