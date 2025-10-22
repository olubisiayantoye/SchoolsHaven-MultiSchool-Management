<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
 <link href="<?php echo VENDOR_URL; ?>resultcss/bootstrap.min.css" rel="stylesheet">
 <link href="<?php echo VENDOR_URL; ?>resultcss/main.css" rel="stylesheet">
  <script src="<?php echo JS_URL; ?>jquery.min.js"></script>


 

</head>

<body>
<div id="myDIV" class="loading"><font color="#FF0000">PLEASE WAIT STILL Loading.................</font></div> 
<div class="container">
        <div class="row">
            <div class="col">
                <div class="page-title">
                    <h1>Check Your Result</h1>
                    <hr>
                </div>
            </div>
        </div>
        <div class="row">
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
              <div class="contact-form">
              
       <form action="<?php echo site_url('checkmyresult/result_verification');?>" method="post" target="_blank">
       
          <div class="form-row">
            <div class="form-group col-md-8">
              <label for="inputFirstName" class="col-form-label">Select YEAR/TERM and (EXAM NAME) </label>
              <select name="exam_id" class="form-control selectboxit" onchange="get_enroll_class(this.value)">
              <option value="" >Select ( SESSION YEAR/TERM )</option>
                <?php foreach($exams as $obj){ ?>
                
				<option value="<?php echo $obj->id; ?>"><?php echo $obj->session_year.'-'.$obj->term; ?></option>
                            
				<?php } ?>
                
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
            <input type="text" class="form-control" id="pin_num" placeholder="" name="pin_num">
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
<script type="text/javascript">
window.onload($('#myDIV').hide());

	function get_enroll_class(exam_id) {

		if (exam_id !== '') {
	$.ajax({
            url: '<?php echo site_url('result/get_enroll_class/');?>' + exam_id ,
			
			beforeSend: function(){
				 // Handle the beforeSend event
				  $('#myDIV').show();
				  
			   },
            success: function(response)
            {
                jQuery('#class_holder').html(response);
				 $('#myDIV').hide();
            }
        });
	  }
		
		}




	function get_class_subject(class_id) {
		
	if (class_id !== '') {
	$.ajax({
            url: '<?php echo site_url('result/get_class_students_result/');?>' + class_id ,
			
			beforeSend: function(){
				 // Handle the beforeSend event
				  $('#myDIV').show();
				  
			   },
            success: function(response)
            {
                jQuery('#students_holder').html(response);
				$('#myDIV').hide();
            }
        });
	  }
	}
	

</script>

</body>
</html>
