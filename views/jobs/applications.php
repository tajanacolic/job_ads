<table class="table table-hover table-borderless">
    <tbody>

    <?php foreach ($apps as $i => $app) { ?>

        <tr>
            <td class="title"> <?php echo $app['job_name'] . " " . $app['job_surname']?> </td>
            <td class="rest"> <?php echo $app['job_id'] ?> </td>
            <td>

                <a class="button-details" href="/jobs/applications/view?app_id=<?php echo $app['app_id'] ?>">Details</a>

            </td>
        </tr>

    <?php } ?>

    </tbody>
</table>
