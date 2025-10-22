<section class="page-breadcumb-area bg-with-black">
    <div class="container text-center">
        <h2 class="title"><?php echo $this->lang->line('about'); ?> <?php echo $this->lang->line('school'); ?></h2>
        <ul class="links">
            <li><a href="<?php echo site_url(); ?>"><?php echo $this->lang->line('home'); ?></a></li>
            <li><a href="javascript:void(0);"><?php echo $this->lang->line('about'); ?> <?php echo $this->lang->line('school'); ?></a></li>
        </ul>
    </div>
</section>


<section class="top-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="top-banner-content">
                  <div class="sidebar-widgets">
                    <div class="widgets contact-info-widget">
                        <div class="widget-title">
                            <h4><?php echo "Instructions"; ?></h4>
                        </div>
                        <div class="widgets-content">
                          <ul>
                            <li>
                              <p><strong>STEP 1: </strong>Select YEAR/TERM</p>
                            </li>
                            <li>
                              <p><strong>STEP 2: </strong>SELECT YOUR CLASS/SESSION</p>
                            </li>
                            <li>
                              <p><strong>STEP 3: </strong>SELECT YOU ID/FULLNAME</p>
                            </li>
                            <li>
                              <p><strong>STEP 4: </strong>ENTER PIN NUMBER</p>
                            </li>
                            <li>
                              <p><strong>STEP 5: </strong>CLICK SUBMIT BUTTON</p>
                            </li>
                          </ul>
                        </div>

                    </div>
                </div>                   
                </div>
            </div>            
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-center">
                <div class="top-banner-img">
                    <div class="contact-form">
       <?php echo form_open(site_url('admin/result_verification'));?>
          <div class="form-row">
            <div class="form-group col-md-8">
              <label for="inputFirstName" class="col-form-label"><?php echo "Select YEAR/TERM and (EXAM NAME) "; ?></label>
              <select name="exam_id" class="form-control selectboxit"  onchange="get_enroll_class(this.value)" >
				<?php
				echo '<option value="' . 0 . '">' . "First select YEAR/TERM (EXAM NAME)". '</option>';
					$exams = $this->db->get('exam')->result_array();
					foreach($exams as $row):
				?>
            
				<option value="<?php echo $row['exam_id'];?>"><?php echo $row['year'].' '.$row['term'].' ('.$row['name'].')';?></option>
				<?php endforeach;?>
			</select>
            </div>            
          </div>
          <div class="form-row">
          <div class="form-group col-md-8">
              <label for="inputLastName" class="col-form-label">Select Your CLASS / SESSION</label>
              <select name="class_id" id="class_holder" class="form-control selectboxit" onchange="get_class_subject(this.value)">
				<option value="">- First select YEAR/TERM-</option>
				
			</select>
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group col-md-8">
              <label for="inputLastName" class="col-form-label">Select Your ID NUMBER/FULLNAME</label>
              <select name="student_id" id="students_holder" class="form-control selectboxit" onchange="get_student_id(this.value)">
					 <option value="0">- first Select CLASS/SESSION-</option>
				</select>
              </div>
          </div>
          
         
           <div class="form-row">
          <div class="form-group col-md-8">
            <label for="inputAddress" class="col-form-label">Enter PIN Number</label>
            <input type="text" class="form-control" id="pin_num" placeholder=""
              name="pin_num">
          </div>
          </div>
          
          <div class="form-group">
            <div class="g-recaptcha" data-sitekey="<?php echo $this->frontend_model->get_frontend_general_settings('recaptcha_site_key');?>"></div>
          </div>
          <button type="submit" class="btn btn-primary"><?php echo get_phrase('submit'); ?></button>
        </form>
              </div>                  
                </div>
            </div>
        </div>
    </div>
</section>

