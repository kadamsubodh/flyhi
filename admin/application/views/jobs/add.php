<article class="content-box minimizer">
    <header>
        <h2>JOBS</h2>

        <nav>
            <ul class="tab-switch">
                <li><a id="list" class="tooltip" href="<?php echo base_url(); ?>jobs" title="List">List</a></li>
                <li><a id="add" class="tooltip" href="<?php echo base_url() . 'jobs/add'; ?>" title="Add">Add</a></li>
            </ul>
        </nav>
    </header>
    <section>

        <div>
            <h3>Add Jobs</h3>
            <?php
            echo form_open('jobs/add');

            echo form_fieldset('Add');

            echo '<dl>';

            echo '<dt>' . form_label('Job Title <span> * </span> ', 'title') . '</dt>';

            echo '<dd>' . form_input(array('id' => 'txttitle', 'name' => 'txttitle', 'class' => 'small'));

            echo form_error('txttitle') . '</dd>';

            echo '<dt>' . form_label('Experience <span> * </span> ', 'date') . '</dt>';

            echo '<dd>' . form_textarea(array('id' => 'txtexperience', 'name' => 'txtexperience', 'class' => 'large'));

            echo form_error('txtexperience') . '</dd>';

            echo '<dt>' . form_label('Job Description <span> * </span> ', 'description') . '</dt>';

            echo '<dd>' . form_textarea(array('id' => 'txtdescription', 'name' => 'txtdescription', 'class' => 'small'));
            ?>
            <script type="text/javascript">
                CKEDITOR.replace('txtdescription');
            </script>
            <?php
            echo form_error('txtdescription') . '</dd>';

//        echo '<dt>'.form_label('Status <span> * </span> ','status').'</dt>';
//        
//        echo '<dd>'.  form_dropdown('txtstatus',array('1'=>'Active','0'=>'Not Active'),'1');
//
//        echo form_error('txtstatus').'</dd>';

            echo '</dl>';

            echo form_fieldset_close();

            echo form_submit(array('id' => 'add', 'name' => 'add', 'value' => 'Add'));

            echo '  or  ';

            echo '<a href="' . base_url() . 'jobs" >' . form_button(array('id' => 'cancel', 'name' => 'cancel', 'value' => 'true', 'content' => 'Cancel')) . '</a>';

            echo form_close();
            ?>
        </div>
    </section>
</article>