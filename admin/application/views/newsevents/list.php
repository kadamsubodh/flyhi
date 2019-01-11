<script type="text/javascript" src="<?php echo base_url()."public/admin/js/common.js"; ?>" ></script>

<article class="content-box minimizer">
    <header>
        <h2>NEWS CONTENT</h2>

        <nav>
            <ul class="tab-switch">
                <li><a id="list" class="tooltip" href="<?php echo base_url(); ?>newsevents" title="List">List</a></li>
                <li><a id="add" class="tooltip" href="<?php echo base_url() . 'newsevents/add'; ?>" title="Add">Add</a></li>
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
                        foreach ($data as $key=>$news) { ?>
                            <tr>
                                <td><?php echo $key+1; ?></td>
                                <td><?php echo $news['title']; ?></td>
                                <td>
                                    <?php
                                    if ($news['status'] == 1) {
                                        echo "Active";
                                    } else {
                                        echo "Deactive";
                                    }
                                    ?></td>
                                <td><?php echo $news['createdOn']; ?></td>
                                <td>
                                    <ul class="actions">
                                        <li><a class="edit tooltip" href="<?php echo base_url(); ?>newsevents/edit/<?php echo $news['id']; ?>" title="Edit News & Events">Edit</a></li>
                                        <li><a class="delete tooltip" href="javascript:void(0);" name="<?php echo base_url() . 'newsevents/delete/' . $news['id']; ?>" title="Delete News & Events">Delete</a></li>
                                    </ul>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="5">No Records for News & Events.</td>
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