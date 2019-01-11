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
            <h3>Add News & Events</h3>
            <?php
            
            $postData = $this->session->flashdata('data') != "" ? $this->session->flashdata('data') : "";
            echo "<pre>"; print_r($this->session->flashdata('data')); echo "</pre>";
            echo form_open('newsevents/add');

            echo form_fieldset('Add');

            echo '<dl>';

            echo '<dt>' . form_label('Title <span> * </span> ', 'title') . '</dt>';

            echo '<dd>' . form_input(array('id' => 'txttitle', 'name' => 'txttitle', 'class' => 'small required','value' => isset($postData['txttitle']) && $postData['txttitle'] !="" ? $postData['txttitle'] : "" ));

            echo form_error('txttitle') . '</dd>';

            echo '<dt>' . form_label('Date <span> * </span> ', 'date') . '</dt>';

            echo '<dd>' . form_input(array('id' => 'txtdate', 'name' => 'txtdate', 'class' => 'small datepicker required'));

            echo form_error('txtdate') . '</dd>';

            echo '<dt>' . form_label('Description <span> * </span> ', 'description') . '</dt>';

            echo '<dd>' . form_textarea(array('id' => 'txtdescription', 'name' => 'txtdescription', 'class' => 'small required'));
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

            echo '<a href="' . base_url() . 'newsevents" >' . form_button(array('id' => 'cancel', 'name' => 'cancel', 'value' => 'true', 'content' => 'Cancel')) . '</a>';

            echo form_close();
            ?>
        </div>
    </section>
</article>