

<link href="<?php //echo VENDOR_URL; ?>resultcss/main.css" rel="stylesheet">
<style>
.form-control2 {
    display: block;
    width: 100%;
    padding: .5rem .75rem;
    font-size: 1rem;
    line-height: 1.25;
    color: #495057;
    background-color: #fff;
    background-image: none;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: .25rem;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
.container_r{
	

    margin-right: auto;
    margin-left: auto;
    padding-right: 15px;
    padding-left: 15px;
    width: 100%;

	}
	
	@media (min-width: 768px)
.container_r {
    max-width: 720px;
}
	.row_r{
	display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;

		
		}
		
		.col{
			
			}
			
			.map-wrapper, .contact-form-wrapper {
    background: #fff;
    padding: 20px;
    margin-bottom: 30px;
}
</style>




<div class="container_r">
        <div class="row_r">
            <div class="col">
                <div class="page-title">
                    <h1>Check Your Result</h1>
                    <hr>
                </div>
            </div>
        </div>
        <div class="row_r">
           <div class="col-lg-4 col-md-12">
                <div class="sidebar-widgets">
                    <div class="widgets contact-info-widget">
                        <div class="widget-title">
                            <h4>Instructions</h4>
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
            <div class="col-lg-8 col-md-12">
            <div class="contact-form-wrapper">
              <div class="contact-form2">
       <form class="" action="<?php echo site_url('checkmyresult/marksheet_print');?>" method="post" target="_blank">
          <div class="form-row">
            <div class="form-group col-md-8">
              <label for="inputFirstName" class="col-form-label2">Select YEAR/TERM and (EXAM NAME) </label>
              <select name="exam_id" class="form-control2 selectboxit2" onchange="get_enroll_class(this.value)">
				<option value="0">First select YEAR/TERM (EXAM NAME)</option>            
				<option value="8">2017-2018 Third Term (2017-2018 THIRD TERM EXAMINATION)</option>
				            
				<option value="9">2018-2019 First Term (FIRST TERM EXAMINATION REPORT SHEET FOR 2018-2019 ACADEMIC SESSION)</option>
				            
				<option value="10">2018-2019 First Term (SECOND TERM REPORT SHEET FOR 2018-2019 ACADEMIC SESSION)</option>
							</select>
            </div>            
          </div>
          <div class="form-row">
          <div class="form-group col-md-8">
              <label for="inputLastName" class="col-form-label2">Select Your CLASS / SESSION</label>
              <select name="class_id" id="class_holder" class="form-control2 selectboxit" onchange="get_class_subject(this.value)">
				<option value="">- First select YEAR/TERM-</option>
				
			</select>
            </div>
          </div>
          
          <div class="form-row">
            <div class="form-group col-md-8">
              <label for="inputLastName" class="col-form-label2">Select Your ID NUMBER/FULLNAME</label>
              <select name="student_id" id="students_holder" class="form-control2 selectboxit" onchange="get_student_id(this.value)">
					 <option value="0">- first Select CLASS/SESSION-</option>
				</select>
              </div>
          </div>
          
         
           <div class="form-row">
          <div class="form-group col-md-8">
            <label for="inputAddress" class="col-form-label2">Enter PIN Number</label>
            <input type="text" class="form-control2" id="pin_num" placeholder="" name="pin_num">
          </div>
          </div>
          
          <div class="form-group">
            <div class="g-recaptcha" data-sitekey=""></div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
              </div>
              
              
              
              
              
            </div>
          </div>
        </div>
        
</div>

