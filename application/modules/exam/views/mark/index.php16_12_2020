<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-file-text-o"></i><small> <?php echo $this->lang->line('manage_mark'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
            
           <div class="x_content quick-link">
         
                 <span><?php echo $this->lang->line('quick_link'); ?>:</span>
                <?php if(has_permission(VIEW, 'exam', 'mark')){ ?>
                    <a href="<?php echo site_url('exam/mark'); ?>"><?php echo $this->lang->line('manage_mark'); ?></a>
                <?php } ?>
                <?php if(has_permission(VIEW, 'exam', 'examresult')){ ?>
                   | <a href="<?php echo site_url('exam/examresult'); ?>"><?php echo $this->lang->line('exam_term'); ?> <?php echo $this->lang->line('result'); ?></a>                 
                <?php } ?>
                <?php if(has_permission(VIEW, 'exam', 'finalresult')){ ?>
                   | <a href="<?php echo site_url('exam/finalresult'); ?>"><?php echo $this->lang->line('exam_final_result'); ?></a>                 
                <?php } ?>
                <?php if(has_permission(VIEW, 'exam', 'meritlist')){ ?>
                   | <a href="<?php echo site_url('exam/meritlist'); ?>"><?php echo $this->lang->line('merit_list'); ?></a>                 
                <?php } ?>   
                <?php if(has_permission(VIEW, 'exam', 'marksheet')){ ?>
                   | <a href="<?php echo site_url('exam/marksheet'); ?>"><?php echo $this->lang->line('mark_sheet'); ?></a>
                <?php } ?>
                 <?php if(has_permission(VIEW, 'exam', 'resultcard')){ ?>
                   | <a href="<?php echo site_url('exam/resultcard'); ?>"><?php echo $this->lang->line('result_card'); ?></a>
                <?php } ?>   
                <?php if(has_permission(VIEW, 'exam', 'mail')){ ?>
                   | <a href="<?php echo site_url('exam/mail'); ?>"><?php echo $this->lang->line('mark_send_by_email'); ?></a>                    
                <?php } ?>
                <?php if(has_permission(VIEW, 'exam', 'text')){ ?>
                   | <a href="<?php echo site_url('exam/text'); ?>"><?php echo $this->lang->line('mark_send_by_sms'); ?></a>                  
                <?php } ?>
                <?php if(has_permission(VIEW, 'exam', 'resultemail')){ ?>
                   | <a href="<?php echo site_url('exam/resultemail/index'); ?>"> <?php echo $this->lang->line('result'); ?> <?php echo $this->lang->line('email'); ?></a>                    
                <?php } ?>
                <?php if(has_permission(VIEW, 'exam', 'resultsms')){ ?>
                   | <a href="<?php echo site_url('exam/resultsms/index'); ?>"> <?php echo $this->lang->line('result'); ?> <?php echo $this->lang->line('sms'); ?></a>                  
                <?php } ?>
            </div>
            
            
            
            <div class="x_content"> 
                <?php echo form_open_multipart(site_url('exam/mark/index'), array('name' => 'mark', 'id' => 'mark', 'class' => 'form-horizontal form-label-left'), ''); ?>
                <div class="row">
                    
                    <div class="col-md-10 col-sm-10 col-xs-12">
                    
                    <?php $this->load->view('layout/school_list_filter'); ?>   
                        
                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="item form-group"> 
                            <div><?php echo $this->lang->line('exam'); ?>  <span class="required">*</span></div>
                            <select  class="form-control col-md-7 col-xs-12" name="exam_id" id="exam_id"  required="required">
                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                <?php if(isset($exams) && !empty($exams)) { ?>
                                    <?php foreach ($exams as $obj) { ?>
                                    <option value="<?php echo $obj->id; ?>" <?php if(isset($exam_id) && $exam_id == $obj->id){ echo 'selected="selected"';} ?>><?php echo $obj->title; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                            <div class="help-block"><?php echo form_error('exam_id'); ?></div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="item form-group"> 
                            <div><?php echo $this->lang->line('class'); ?>  <span class="required">*</span></div>
                            <select  class="form-control col-md-7 col-xs-12" name="class_id" id="class_id"  required="required" onchange="get_section_subject_by_class(this.value,'','');">
                          
                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                <?php foreach ($classes as $obj) { ?>
                                    <?php if(isset($classes) && !empty($classes)) { ?>
                                    <option value="<?php echo $obj->id; ?>" <?php if(isset($class_id) && $class_id == $obj->id){ echo 'selected="selected"';} ?>><?php echo $obj->name; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                            <div class="help-block"><?php echo form_error('class_id'); ?></div>
                        </div>
                    </div>
                      
                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="item form-group"> 
                            <div><?php echo $this->lang->line('section'); ?> <span class="required">*</span></div>
                            <select  class="form-control col-md-7 col-xs-12" onchange="get_subject_by_section(this.value);" name="section_id" id="section_id" required="required" >                                
                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                            </select>
                            <div class="help-block"><?php echo form_error('section_id'); ?></div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="item form-group"> 
                            <div><?php echo $this->lang->line('subject'); ?>  <span class="required">*</span></div>
                            <select  class="form-control col-md-7 col-xs-12" name="subject_id" id="subject_id" required="required">                                
                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                            </select>
                            <div class="help-block"><?php echo form_error('subject_id'); ?></div>
                        </div>
                    </div>
                    </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                       <div class="form-group"><br/>
                       <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('find'); ?></button>
                        </div>
                        			</div>
                
                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group"><br/>
                           <button id="generate" name="generate" value="generate" type="submit" class="btn btn-success col-md-7 col-xs-12"><?php echo $this->lang->line('generate'); ?></button>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>

           <?php  if (isset($students) && !empty($students)) { ?><!------------------start show ------------------------>
            <div class="x_content">             
                <div class="row">
                    <div class="col-sm-4  col-sm-offset-4 layout-box">
                        <p>
                            <h4><?php echo $this->lang->line('exam_mark').' '.$term; ?></h4>
                            <h4><?php echo $session; ?></h4>                            
                        </p>
                        <p>
          <h5><?php echo $this->lang->line('subject'); ?> :<?php echo $subject.' / '.$subject2; ?> </h5>                          
                        </p>
                    </div>
                </div>            
            </div>
            
            
            
            <div class="x_content">
            <div class="" data-example-id="togglable-tabs">
              <ul  class="nav nav-tabs bordered">
              <li class="<?php if(isset($list)){ echo 'active'; }?>"><a href="#tab_mark_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('mark'); ?> <?php echo $this->lang->line('list'); ?></a> </li>
               <?php if(has_permission(UPLOAD, 'exam', 'mark')){ ?>
<li  class="<?php if(isset($upload)){ echo 'active'; }?>"><a href="#tab_upload_mark"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('upload'); ?> <?php echo $this->lang->line('mark'); ?></a> </li> <?php } ?>
                        </ul>
             <br/>
            <div class="tab-content">
                        <div  class="tab-pane fade in <?php if(isset($list)){ echo 'active'; }?>" id="tab_mark_list" >
								<?php echo form_open(site_url('exam/mark/add'), array('name' => 'addmark', 'id' => 'addmark', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                <?php //var_dump($class_ass->cat_ass_test);die();?>
                                
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                <th rowspan="3"><?php echo $this->lang->line('admission_no'); ?></th>
                                <th rowspan="3"><?php echo $this->lang->line('surname'); ?></th>
                               
                                <?php
							
                                if (isset($class_ass) && !empty($class_ass)) {
                                
                                $ccl= explode(":",$class_ass->cat_ass_test);
                                $ccl2 = array_filter($ccl);
                                $lenth = count($ccl2);
                                //var_dump($ccl2);
                                for($xx= 0; $xx < $lenth;$xx++){
                                echo '<th>'.$ccl[$xx].'</th>';
                                
                                }
                                } 
                                ?>
                                <th><?php echo $this->lang->line('exam'); ?></th>                                
                                <th ><?php echo $this->lang->line('total'); ?></th>                                           
                                <th rowspan="3"><?php echo $this->lang->line('comment'); ?></th>                                            
                                </tr>
                                
                                
                                <tr>
                                <!--obatainable mark ##############################################start-->
                                 <?php
                                if (isset($class_ass) && !empty($class_ass)) {
                                	
                                $obb= explode(":",$class_ass->cont_mark);
								$total_cas = array_sum ($obb);
								$ccl33= explode(":",$class_ass->cat_ass_test);
                                $ccl233 = array_filter($ccl33);
                                $lenth33 = count($ccl233);
                               
                                //var_dump($ccl2);
                                for($xx= 0; $xx < $lenth33;$xx++){  ?>
                              
                <th>Obtainable Mark<input name="" type="text" value=" <?php echo $obb[$xx];?>" class="form-control form-mark col-md-4 col-xs-6 fn_mark_total" required="required" readonly /></th>
                               <?php }
                                } 
                                ?>
                                 <!--obatainable mark ##############################################end-->
                
                <th>Obtainable Mark<input name="" type="text" value="<?php echo $class_ass->exam_mark ;?>" class="form-control form-mark col-md-7 col-xs-12 fn_mark_total" required="required" readonly /></th>
                <th>Obtainable Mark<input name="" type="text" value="<?php echo ($total_cas + $class_ass->exam_mark) ;?>" class="form-control form-mark col-md-7 col-xs-12 fn_mark_total" required="required" readonly /></th>
                                </tr>
                                
                                <tr>                           
                                      <!-- just label obatainable mark ##############################################start-->                                    
                           <?php
						    if (isset($class_ass) && !empty($class_ass)) {
                                	
                              	$ccl44= explode(":",$class_ass->cat_ass_test);
                                $ccl244 = array_filter($ccl44);
                                $lenth44 = count($ccl244);
                                for($xx= 0; $xx < $lenth44;$xx++){ 
						   
						   echo "<th>".$this->lang->line('obtained').' '.$this->lang->line('mark').' '." &#8681;</th>";
						   
						    }
                                } 
						    ?>                                            
                                                                         
                               <!-- just label obatainable mark ##############################################end-->                                          
                                                                      
                                <th><?php echo $this->lang->line('obtained').' '.$this->lang->line('mark'); ?> &#8681;</th>                                            
                                                                     
                                <th><?php echo $this->lang->line('obtained').' '.$this->lang->line('mark'); ?> &#8681;</th>                                           
                                                                  
                                </tr>
                                </thead>
                                <tbody id="fn_mark">   
                                
                                <?php
                                $count = 1;
                                if (isset($students) && !empty($students)) {
                                ?>
                                <?php foreach ($students as $obj) { ?>
                                <?php  $mark = get_exam_mark($school_id, $obj->student_id, $academic_year_id, $exam_id, $class_id, $section_id, $subject_id); ?>
                                <?php  $attendance = get_exam_attendance($school_id, $obj->student_id, $academic_year_id, $exam_id, $class_id, $section_id, $subject_id); ?>
                                <tr>
                                <td><?php echo $obj->admission_no; ?></td>
                                <td><?php echo '<strong>'.ucfirst($obj->surname).'</strong>';//ucfirst($obj->student_name); ?></td>
                               <input type="hidden" value="<?php echo $obj->student_id; ?>"  name="students[]" />
                                <!--written #--First Continuous Assessment Test--||||||||||||||||||||||||||||||--> 
                                <?php
						    if (isset($class_ass) && !empty($class_ass)) {
                                	
                              	$ccl44= explode(":",$class_ass->cat_ass_test);
                                $ccl244 = array_filter($ccl44);
                                $lenth44 = count($ccl244); if( $lenth44 >= 1) {?>
                                
                                <td>
                                    <?php if(!empty($attendance)){ ?>
                                    <input type="hidden" value="1"  name="cat_1" />
                                    <input type="hidden" value="<?php echo $obb[0];?>"  name="written_mark" />
                                        <input type="number" min="0" max="<?php echo $obb[0];?>"  id="written_obtain_<?php echo $obj->student_id; ?>"  itemid="<?php echo $obj->student_id; ?>"  value="<?php if(!empty($mark) && $mark->written_obtain > 0 ){ echo $mark->written_obtain; }else{ echo ''; } ?>"  name="written_obtain[<?php echo $obj->student_id; ?>]" class="form-control form-mark col-md-7 col-xs-12 fn_mark_total"   autocomplete="off"/>
                                    <?php }else{ ?>
                                        <input readonly="readonly" type="number" value="0"  name="written_obtain[<?php echo $obj->student_id; ?>]" class="form-control form-mark col-md-7 col-xs-12" />
                                    <?php } ?>
                                </td>
                                
                                 <?php }
                                } 
                                ?>
                                
                                 <!--written #--First Continuous Assessment Test--||||||||||||||||||||||end   |--> 
                                 
                                 <!--tutorial #--Second Continuous Assessment Test--||||||||||||||||||||||||||||||||||||||||--> 
                          <?php
						    if (isset($class_ass) && !empty($class_ass)) {
                                	
                              	$ccl44= explode(":",$class_ass->cat_ass_test);
                                $ccl244 = array_filter($ccl44);
                                $lenth44 = count($ccl244); if( $lenth44 >= 2) {?>
                                <td>
                                    <?php if(!empty($attendance)){ ?>
                                    <input type="hidden" value="2"  name="cat_2" />
                                    <input type="hidden" value="<?php echo $obb[1];?>"  name="tutorial_mark" />
                                    <input type="number" min="0" max="<?php echo $obb[1];?>"   id="tutorial_obtain_<?php echo $obj->student_id; ?>" itemid="<?php echo $obj->student_id; ?>"   value="<?php if(!empty($mark) && $mark->tutorial_obtain > 0 ){ echo $mark->tutorial_obtain; }else{ echo ''; } ?>"  name="tutorial_obtain[<?php echo $obj->student_id; ?>]" class="form-control form-mark col-md-7 col-xs-12 fn_mark_total"  autocomplete="off"/>
                                    <?php }else{ ?>
                                        <input readonly="readonly" type="number" value="0"  name="tutorial_obtain[<?php echo $obj->student_id; ?>]" class="form-control form-mark col-md-7 col-xs-12"  />
                                    <?php } ?>
                                </td>
                                
                                   <?php }
                                } 
                                ?>
                                
                                 <!--tutorial #--Second Continuous Assessment Test--|||||||||||||||||||||||||||||||||||||end   |--> 
                                 
                                 <!--practical #--Third Continuous Assessment Test--|||||||||||||||||||||||||||||||||||||||||||||--> 
                          <?php
						    if (isset($class_ass) && !empty($class_ass)) {
                                	
                              	$ccl44= explode(":",$class_ass->cat_ass_test);
                                $ccl244 = array_filter($ccl44);
                                $lenth44 = count($ccl244); if( $lenth44 >= 3 ) { ?>
                                <td>
                                    <?php if(!empty($attendance)){ ?>
                                    <input type="hidden" value="3"  name="cat_3" />
                                    <input type="hidden" value="<?php echo $obb[2];?>"  name="practical_mark" />
                                        <input type="number" min="0" max="<?php echo $obb[2];?>"   id="practical_obtain_<?php echo $obj->student_id; ?>" itemid="<?php echo $obj->student_id; ?>"   value="<?php if(!empty($mark) && $mark->practical_obtain > 0 ){ echo $mark->practical_obtain; }else{ echo ''; } ?>"  name="practical_obtain[<?php echo $obj->student_id; ?>]" class="form-control form-mark col-md-7 col-xs-12 fn_mark_total"   autocomplete="off"/>
                                    <?php }else{ ?>
                                        <input readonly="readonly" type="number" value="0"  name="practical_obtain[<?php echo $obj->student_id; ?>]" class="form-control form-mark col-md-7 col-xs-12"  autocomplete="off"/>
                                    <?php } ?>
                                </td>
                                
                                    <?php  }
                                } 
                                ?>
                                 <!--practical #--Third Continuous Assessment Test|||||||||||||||||||||||||||||||||||||||||end   |--> 
                                 
                                 
                                 
                                  <!--vivan #--Fourth Continuous Assessment Test--|||||||||||||||||||||||||||||||||||||||||||||--> 
                          <?php
						    if (isset($class_ass) && !empty($class_ass)) {
                                	
                              	$ccl44= explode(":",$class_ass->cat_ass_test);
                                $ccl244 = array_filter($ccl44);
                                $lenth44 = count($ccl244); if( $lenth44 >= 4 ) { ?>
                                <td>
                                    <?php if(!empty($attendance)){ ?>
                                    <input type="hidden" value="4"  name="cat_4" />
                                    <input type="hidden" value="<?php echo $obb[3]+ $class_ass->exam_mark ;?>"  name="viva_mark" />
                                        <input type="number" min="0" max="<?php echo  $class_ass->exam_mark ;?>"  id="viva_obtain_<?php echo $obj->student_id; ?>" itemid="<?php echo $obj->student_id; ?>"  value="<?php if(!empty($mark) && $mark->viva_obtain > 0 ){ echo $mark->viva_obtain; }else{ echo ''; } ?>"  name="viva_obtain[<?php echo $obj->student_id; ?>]" class="form-control form-mark col-md-7 col-xs-12 fn_mark_total"   autocomplete="off"/>
                                    <?php }else{ ?>
                                        <input readonly="readonly" type="number" value="0"  name="viva_obtain[<?php echo $obj->student_id; ?>]" class="form-control form-mark col-md-7 col-xs-12"   autocomplete="off"/>
                                    <?php } ?>
                                </td>
                                
                                    <?php  }
                                } 
                                ?>
                                 <!--vivan #--Fourth Continuous Assessment Test|||||||||||||||||||||||||||||||||||||||||end   |--> 
                                 
                                 
                                 
                                 
                                 
                                 
                                 <!--total exam == EXAM ||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||--> 
                         
                                <td>
                                    <?php if(!empty($attendance)){ ?>
                                    
                                     <?php //var_dump($class_ass->exam_mark); die(); ?>
                           <input type="hidden" value="<?php echo $class_ass->exam_mark ;?>"  name="exam_mark" />
                                        <input type="number" min="0" max="<?php echo  $class_ass->exam_mark ;?>"  id="exam_obtain_<?php echo $obj->student_id; ?>" itemid="<?php echo $obj->student_id; ?>"  value="<?php if(!empty($mark) && $mark->exam_obtain > 0 ){ echo $mark->exam_obtain; }else{ echo ''; } ?>"  name="exam_obtain[<?php echo $obj->student_id; ?>]" class="form-control form-mark col-md-7 col-xs-12 fn_mark_total"   autocomplete="off"/>
                                    <?php }else{ ?>
                                        <input readonly="readonly" type="number" value="0"  name="exam_obtain[<?php echo $obj->student_id; ?>]" class="form-control form-mark col-md-7 col-xs-12"   autocomplete="off"/>
                                    <?php } ?>
                                </td> 
                                 <!--total exam == EXAM ||||||||||||||||||||||||||||||||||||||||||||||||||||end   |-->
                                                                   
                           
                                <td>
                                    <?php if(!empty($attendance)){ ?>
                                   
                 <input type="hidden" value="<?php echo ($total_cas + $class_ass->exam_mark) ;?>"  name="exam_total_mark" />
                  <input readonly="readonly" type="number" min="0" max="<?php echo ($total_cas + $class_ass->exam_mark) ;?>"  id="obtain_total_mark_<?php echo $obj->student_id; ?>" value="<?php if(!empty($mark) && $mark->obtain_total_mark > 0 ){ echo $mark->obtain_total_mark; }else{ echo ''; } ?>"  name="obtain_total_mark[<?php echo $obj->student_id; ?>]" class="form-control form-mark col-md-7 col-xs-12"  autocomplete="off"/>
                                    <?php }else{ ?>
                                        <input readonly="readonly" type="number" value=""  name="obtain_total_mark[<?php echo $obj->student_id; ?>]" class="form-control form-mark col-md-7 col-xs-12"   autocomplete="off"/>
                                    <?php } ?>
                                </td>                                    
                              
                                <td>
                                    <?php if(!empty($attendance)){ ?>
                                        <input type="text"  id="remark_<?php echo $obj->student_id; ?>" value="<?php if(!empty($mark) && $mark->remark != '' ){ echo $mark->remark; }else{ echo ''; } ?>"  name="remark[<?php echo $obj->student_id; ?>]" class="form-control form-mark col-md-7 col-xs-12"  autocomplete="off"/>
                                    <?php }else{ ?>
                                        <input readonly="readonly" type="text" value="Absent"  name="remark[<?php echo $obj->student_id; ?>]" class="form-control form-mark col-md-7 col-xs-12"   autocomplete="off"/>
                                    <?php } ?>
                                </td>
                                </tr>
                                <?php } ?>
                                <?php }else{ ?>
                                <tr>
                                <td colspan="15" align="center"><?php echo $this->lang->line('no_data_found'); ?></td>
                                </tr>
                                <?php } ?>
                                </tbody>
                                </table>
                                
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                <div class="col-md-6 col-md-offset-5">
                                <?php  if (isset($students) && !empty($students)) { ?>
                                <input type="hidden" value="<?php echo $school_id; ?>"  name="school_id" />
                                <input type="hidden" value="<?php echo $exam_id; ?>"  name="exam_id" />
                                <input type="hidden" value="<?php echo $class_id; ?>"  name="class_id" />
                                <input type="hidden" value="<?php echo $section_id; ?>"  name="section_id" />
                                <input type="hidden" value="<?php echo $subject_id; ?>"  name="subject_id" />
                                <input type="hidden" value="<?php echo $academic_year_id; ?>"  name="academic_year_id" />                        
                                <a href="<?php echo site_url('exam/mark'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                <?php } ?>
                                </div>
                                </div>
                                <?php echo form_close(); ?>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="instructions"><strong><?php echo $this->lang->line('instruction'); ?>: </strong> <?php echo $this->lang->line('exam_mark_instruction'); ?></div>
                                </div>
                        </div>
                        <div  class="tab-pane fade in <?php if(isset($upload)){ echo 'active'; }?>" id="tab_upload_mark">
                        <div class="x_content"> 
                               <?php echo form_open_multipart(site_url('exam/mark/upload'), array('name' => 'add', 'id' => 'add', 'class'=>'form-horizontal form-label-left'), ''); ?>
                               
                                 <?php  if (isset($students) && !empty($students)) { ?>
                                <input type="hidden" value="<?php echo $school_id; ?>"  name="school_id" />
                                <input type="hidden" value="<?php echo $exam_id; ?>"  name="exam_id" />
                                <input type="hidden" value="<?php echo $class_id; ?>"  name="class_id" />
                                <input type="hidden" value="<?php echo $section_id; ?>"  name="section_id" />
                                <input type="hidden" value="<?php echo $subject_id; ?>"  name="subject_id" />
                                <input type="hidden" value="<?php echo $academic_year_id; ?>"  name="academic_year_id" />
                       			<?php } ?>
                                <div class="row">                                      
   
                                     <div class="col-md-2 col-sm-2 col-xs-12">
                                         <div class="item form-group">
                                             <label for="">&nbsp;</label>
                 <a  class="btn btn-success btn-md"><?php echo 'Click Upload'  //$this->lang->line('generate_csv'); ?></a>
                                         </div>
                                     </div> 
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                         <div class="item form-group">
                                             <label ><?php echo $this->lang->line('csv_file'); ?>&nbsp;</label>
                                            <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                <input  class="form-control col-md-7 col-xs-12"  name="student_bulkmark"  id="student_bulkmark" type="file">
                                            </div>
                                         </div>
                                     </div>
                                </div>
                                
                                                            
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a  href="<?php echo site_url('exam/mark'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                                
                                
                                
                            </div>
                        </div>
                        
                
                </div><!--lll_____tab-content_____llll-->
            </div> 
            
          </div>  <!--llllllllllllllltogglr tabllllllllllllllllllllllllllllllllllllllllllllllllll-->
            
            
            
             <?php } ?><!------------------End show ------------------------>
        </div>
    </div>
</div>
 
<!-- Super admin js START  -->
 <script type="text/javascript">
        
    $("document").ready(function() {
         <?php if(isset($school_id) && !empty($school_id)){ ?>               
            $(".fn_school_id").trigger('change');
         <?php } ?>
    });
    
    $('.fn_school_id').on('change', function(){
      
        var school_id = $(this).val();
        var exam_id = '';
        var class_id = '';
        
        <?php if(isset($school_id) && !empty($school_id)){ ?>
            exam_id =  '<?php echo $exam_id; ?>';           
            class_id =  '<?php echo $class_id; ?>';           
         <?php } ?> 
           
        if(!school_id){
           toastr.error('<?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('school'); ?>');
           return false;
        }
       
       $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_exam_by_school'); ?>",
            data   : { school_id:school_id, exam_id:exam_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               { 
                    $('#exam_id').html(response);  
                   get_class_by_school(school_id,class_id); 
               }
            }
        });
    }); 

   function get_class_by_school(school_id, class_id){       
         
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_class_by_school'); ?>",
            data   : { school_id:school_id, class_id:class_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {
                    $('#class_id').html(response); 
               }
            }
        }); 
   }  
   
  </script>
<!-- Super admin js end -->

 <script type="text/javascript">     
  
    <?php if(isset($class_id) && isset($section_id)){ ?>
        get_section_subject_by_class('<?php echo $class_id; ?>', '<?php echo $section_id; ?>', '<?php echo $subject_id; ?>');
    <?php } ?>
    
    function get_section_subject_by_class(class_id, section_id, subject_id){       
        
        var school_id = $('#school_id').val();      
             
        if(!school_id){
           toastr.error('<?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('school'); ?>');
           return false;
        } 
        
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_section_by_class'); ?>",
            data   : {school_id:school_id, class_id : class_id , section_id: section_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {
                  $('#section_id').html(response);
               }
            }
        }); 
        
          
    }
	
  
  $(document).ready(function(){
  
       $('#fn_total_mark').keyup(function(){    
	    
          var student_id = $(this).attr('itemid');
          var written_mark       = $('#written_mark_'+student_id).val() ?  parseFloat($('#written_mark_'+student_id).val()) : 0;
          var written_obtain     = $('#written_obtain_'+student_id).val() ? parseFloat($('#written_obtain_'+student_id).val()) : 0;
          var tutorial_mark      = $('#tutorial_mark_'+student_id).val() ? parseFloat($('#tutorial_mark_'+student_id).val()) : 0;
          var tutorial_obtain    = $('#tutorial_obtain_'+student_id).val() ? parseFloat($('#tutorial_obtain_'+student_id).val()) : 0;
          var practical_mark     = $('#practical_mark_'+student_id).val() ? parseFloat($('#practical_mark_'+student_id).val()) : 0;
          var practical_obtain   = $('#practical_obtain_'+student_id).val() ? parseFloat($('#practical_obtain_'+student_id).val()) : 0;
          var viva_mark          = $('#viva_mark_'+student_id).val() ? parseFloat($('#viva_mark_'+student_id).val()) : 0;
          var viva_obtain        = $('#viva_obtain_'+student_id).val() ? parseFloat($('#viva_obtain_'+student_id).val()) : 0;
          
          $('#exam_total_mark_'+student_id).val(written_mark+tutorial_mark+practical_mark+viva_mark);
          $('#obtain_total_mark_'+student_id).val(written_obtain+tutorial_obtain+practical_obtain+viva_obtain);
                              
       }); 
      
  }); 
  
 $("#mark").validate();  
 $("#addmark").validate();  
</script>


<script type="text/javascript">
function get_subject_by_section(section_id){ 
 var school_id = $('#school_id').val();
 var class_id = $('#class_id').val();  

 $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_subject_by_section_class'); ?>",
            data   : {school_id:school_id, class_id : class_id , section_id: section_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {
                  $('#subject_id').html(response);
               }
            }
        }); 
}
</script>

<style>
#datatable-responsive label.error{display: none !important;}
</style>



