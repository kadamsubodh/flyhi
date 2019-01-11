<script type="text/javascript" src="<?php echo base_url()."public/admin/js/common.js"; ?>" ></script>

<article class="content-box minimizer">
    <header>
        <h2>NEWS CONTENT</h2>

        <nav>
            <ul class="tab-switch">
                <li><a id="list" class="tooltip" href="<?php echo base_url(); ?>jobs" title="List">List</a></li>
                <li><a id="add" class="tooltip" href="<?php echo base_url() . 'jobs/add'; ?>" title="Add">Add</a></li>
            </ul>
        </nav>
    </header>
    <section>

        <div>
            <h3 class="clearfix">News & Events List</h3>
            <table>
                <thead>
                    <tr>
                        <th>Sr.no</th>
                        <th>Title</th>
                        <th>State</th>
                        <th>Added On</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($data) && count($data) > 0) {
                        foreach ($data as $ky=>$jobs) { ?>
                            <tr>
                                <td><?php echo $ky+1; ?></td>
                                <td><?php echo $jobs['title']; ?></td>
                                <td>
                                    <?php
                                    if ($jobs['status'] == 1) {
                                        echo "Active";
                                    } else {
                                        echo "Deactive";
                                    }
                                    ?>
                                </td>
                                <td><?php echo $jobs['createdOn']; ?></td>
                                <td>
                                    <ul class="actions">
                                        <li><a class="edit tooltip" href="<?php echo base_url(); ?>jobs/edit/<?php echo $jobs['id']; ?>" title="Edit Job Opportunities">Edit</a></li>
                                        <li><a class="delete tooltip" href="javascript:void(0);" name="<?php echo base_url() . 'jobs/delete/' . $jobs['id']; ?>" title="Delete Job Opportunities">Delete</a></li>
                                    </ul>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="5">No Records for Job Opportunity.</td>
                        </tr>
<?php } ?>
                </tbody>
                <tfoot>
                <thead>
                    <tr>
                        <th>Sr.no</th>
                        <th>Title</th>
                        <th>State</th>
                        <th>Added On</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tr><td colspan="7"><?php echo $this->pagination->create_links(); ?></td></tr>
                </tfoot>
            </table>
        </div>
    </section>
</article>