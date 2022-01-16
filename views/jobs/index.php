<table class="table table-hover table-borderless">
    <tbody>

    <?php foreach ($jobs as $i => $job) { ?>

        <tr>
            <td class="title"> <?php echo $job['job_title'] ?> </td>
            <td class="rest"> <?php echo $job['create_date'] . "  |  " . $job['job_type']
                    . "  |  " . $job['job_location'] ?> </td>
            <td class="rest"> <?php echo $job['job_requirements'] ?> </td>
            <td>

                <a class="button-details" href="/jobs/view?id=<?php echo $job['id'] ?>">Details</a>

            </td>
        </tr>

    <?php } ?>

    </tbody>
</table>
