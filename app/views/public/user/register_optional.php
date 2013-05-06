 <?php $reg_id = $this->input->get('reg_id'); ?>
 <div id="register-optional">
 <div id="progress-bar">
<img src="<?php echo base_url(); ?>assets/images/step1done.png" alt="Almost Done" />
</div>
<!--Display Errors-->
<?php echo validation_errors('<p class="error">'); ?>
<?php if($this->session->flashdata('images_folder')) : ?>
    <?php echo '<p class="error">' .$this->session->flashdata('images_folder') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('email_yes_send')) : ?>
    <?php echo '<p class="success_verybig">' .$this->session->flashdata('email_yes_send') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('email_no_send')) : ?>
    <?php echo '<p class="error_big">' .$this->session->flashdata('email_no_send') . '</p>'; ?>
<?php endif; ?>
    <?php if($this->session->flashdata('images_avatars_folder')) : ?>
    <?php echo '<p class="error">' .$this->session->flashdata('images_avatars_folder') . '</p>'; ?>
    <?php endif; ?>
 <h2>Optional Info</h2>
                <p>This info is optional but it helps us and others get to know you better. It will also count towards your profile completeness</p>
                <p><a class="skip" href="<?php echo base_url(); ?>register_invite">Skip For Now</a>
                    <?php echo form_open('register_optional'); ?>
                     <?php echo form_hidden('reg_id', $reg_id); ?>
                        <div id="form-half">
                            
                            <?php echo form_label('Relationship Status', 'relationship_status'); ?><br />
                            <?php $options = array(
                  				'single'  => 'Single',
                  				'in_relationship'    => 'In a Relationship',
                  				'open_relationship'    => 'Open Relationship',
                  				'engaged'   => 'Engaged',
                  				'married' => 'Married',
                  				'complicated' => 'It\'s Complicated',
                  				'widowed' => 'Widowed',
                  				'separated' => 'Separated',
                  				'divorced' => 'Divorced',
                				);
                			?>
                			<?php echo form_dropdown('relationship_status',$options,'Select'); ?>
                          
                            <br /><br />
                            <?php echo form_label('Where are you from?', 'where_from'); ?><br />
                    		<?php echo form_input('where_from',set_value('where_from')); ?>
                         
                            <br /><br />
                            <?php echo form_label('Where do you live?', 'where_live'); ?><br />
                    		<?php echo form_input('where_live',set_value('where_live')); ?>
                       
                        </div><!--form-half end-->
                        <div id="form-half">
                            <?php echo form_label('About Me', 'about_me'); ?>
                           <?php echo form_textarea('about_me'); ?>
                         
                            <br /><br />
                            <?php echo form_label('Occupation', 'occupation'); ?><br />
                            <?php echo form_input('occupation',set_value('occupation')); ?>
                        </div><!--form-half end-->
                        <div class="clr"></div>
                        <h3>Contact Info & Social Media</h3>
                        <p>These fields are optional and will be displayed on your profile</p>
                        <div id="form-half">
                           <?php echo form_label('Website', 'website'); ?><br />
                            <?php echo form_input('website',set_value('website')); ?>
                            <br /><br />
                            <?php echo form_label('Mobile Phone', 'mobile_phone'); ?><br />
                            <?php echo form_input('mobile_phone',set_value('mobile_phone')); ?>
                           
                        </div><!--form-half end-->
                        <div id="form-half">
                           <?php echo form_label('Facebook', 'facebook'); ?><br />
                            <?php echo form_input('facebook',set_value('facebook')); ?>
                          
                            <br /><br />
                            <?php echo form_label('Twitter Username', 'twitter'); ?><br />
                            <?php echo form_input('twitter',set_value('twitter')); ?>
                          
                        </div><!--form-half end-->
                        <div class="clr"></div>
                        <h3>Hobbies & Interest</h3>
                        <p>These fields are optional and will be displayed on your profile</p>
                        <div id="form-half">
                           <?php echo form_label('Favorite Hobbies', 'hobbies'); ?><br />
                            <?php echo form_input('hobbies',set_value('hobbies')); ?>
                         
                            <br /><br />
                            <?php echo form_label('Favorite Movies', 'movies'); ?><br />
                            <?php echo form_input('movies',set_value('movies')); ?>
                        
                        </div><!--form-half end-->
                        <div id="form-half">
                           <?php echo form_label('Favorite Music', 'music'); ?><br />
                            <?php echo form_input('music',set_value('music')); ?>
                         
                        </div><!--form-half end-->
                        <div class="clr"></div>
                        <br />
                        <input name="next" class="med-blue-btn" type="submit" value="Next" />

                    <?php echo form_close(); ?>
                    <div class="clr"></div>
                    <?php // echo 'Register ID: ' .$reg_id; //DEBUG ?>
                </div><!--register1-->