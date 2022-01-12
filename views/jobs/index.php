<table class="table table-hover table-borderless">
    <tbody>

    <?php foreach ($jobs as $i => $job) { ?>

        <tr>
            <th scope="row">  </th>
            <td class="title"> <?php echo $job['job_title'] ?> </td>
            <td class="rest"> <?php echo $job['create_date'] . "  |  " . $job['job_type']
                    . "  |  " . $job['job_location'] ?> </td>
            <td class="rest"> <?php echo $job['job_requirements'] ?> </td>
            <td>

                <a href="" class="btn btn-sm btn-secondary">Details</a>

            </td>
        </tr>

    <?php } ?>

    </tbody>
</table>
