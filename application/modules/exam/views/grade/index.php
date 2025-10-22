<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-graduation-cap"></i><small> <?php echo $this->lang->line('manage_grade'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content quick-link">
                 <span><?php echo $this->lang->line('quick_link'); ?>:</span>
                <?php if(has_permission(VIEW, 'exam', 'grade')){ ?>
                    <a href="<?php echo site_url('exam/grade/'); ?>"><?php echo $this->lang->line('exam_grade'); ?></a>
                <?php } ?> 
                <?php if(has_permission(VIEW, 'exam', 'exam')){ ?>
                   | <a href="<?php echo site_url('exam/index'); ?>"><?php echo $this->lang->line('exam_term'); ?></a>
                <?php } ?> 
                <?php if(has_permission(VIEW, 'exam', 'schedule')){ ?>
                   | <a href="<?php echo site_url('exam/schedule/index'); ?>"><?php echo $this->lang->line('exam'); ?> <?php echo $this->lang->line('schedule'); ?></a>
                <?php } ?> 
                <?php if(has_permission(VIEW, 'exam', 'suggestion')){ ?>
                   | <a href="<?php echo site_url('exam/suggestion/index'); ?>"><?php echo $this->lang->line('exam'); ?> <?php echo $this->lang->line('suggestion'); ?> </a>
                <?php } ?> 
                <?php if(has_permission(VIEW, 'exam', 'attendance')){ ?>
                   | <a href="<?php echo site_url('exam/attendance/'); ?>"><?php echo $this->lang->line('exam'); ?> <?php echo $this->lang->line('attendance'); ?></a>                    
                <?php } ?> 
            </div>
            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">                    
                    <ul  class="nav nav-tabs bordered">
                        <li class="<?php if(isset($list)){ echo 'active'; }?>"><a href="#tab_grade_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('exam_grade'); ?> <?php echo $this->lang->line('list'); ?></a> </li>
                        <?php if(has_permission(ADD, 'exam', 'grade')){ ?>
                        
                            <?php if(isset($edit)){ ?>
                                <li  class="<?php if(isset($add)){ echo 'active'; }?>"><a href="<?php echo site_url('exam/grade/add'); ?>"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?> <?php echo $this->lang->line('exam_grade'); ?></a> </li>                          
                             <?php }else{ ?>
                                 <li  class="<?php if(isset($add)){ echo 'active'; }?>"><a href="#tab_add_grade"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?> <?php echo $this->lang->line('exam_grade'); ?></a> </li>                          
                             <?php } ?>
                        <?php } ?>  
                        <?php if(isset($edit)){ ?>
                            <li  class="active"><a href="#tab_edit_grade"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> <?php echo $this->lang->line('exam_grade'); ?></a> </li>                          
                        <?php } ?>   
                            
                        <li class="li-class-list">
                            <?php if($this->session->userdata('role_id') == SUPER_ADMIN){  ?> 
     <select  class="form-control col-md-7 col-xs-12 auto-width" onchange="get_class_by_school(this.value);" name="filter_school_id" id="filter_school_id">                                  
                                    <option value="">--<?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('school'); ?>--</option> 
                                    <?php foreach($schools as $obj ){ ?>
                                        <option value="<?php echo $obj->id; ?>" <?php if(isset($filter_school_id) && $filter_school_id == $obj->id){ echo 'selected="selected"';} ?> > <?php echo $obj->school_name; ?></option>
                                    <?php } ?>                                            
                                </select>
                            <?php } ?> 
                         
 <select  class="form-control col-md-7 col-xs-12 auto-width" onchange="get_grade_by_class(this.value);"  name="filter_class_id" id="filter_class_id" required="required" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                            <?php if(isset($classes) && !empty($classes)){ ?>
                                                <?php foreach($classes as $obj ){ ?>
                                                <option value="<?php echo $obj->id; ?>" <?php echo isset($post['class_id']) && $post['class_id'] == $obj->id ?  'selected="selected"' : ''; ?>><?php echo $obj->name; ?></option>
                                                <?php } ?>                                            
                                            <?php } ?>                                            
                                        </select> 
                                        
                        </li>
                                          
                    </ul>
                    <br/>
                    
                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php if(isset($list)){ echo 'active'; }?>" id="tab_grade_list" >
                            <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('sl_no'); ?></th>
                                        <?php if($this->session->userdata('role_id') == SUPER_ADMIN){ ?>
                                            <th><?php echo $this->lang->line('school'); ?></th>
                                        <?php } ?>
                                         <th><?php echo $this->lang->line('class'); ?></th>
                                        <th><?php echo $this->lang->line('exam_grade'); ?></th>
                                        <th><?php echo $this->lang->line('grade_point'); ?></th>
                                        <th><?php echo $this->lang->line('mark_from'); ?></th>
                                        <th><?php echo $this->lang->line('mark_to'); ?></th>
                                        <th><?php echo $this->lang->line('note'); ?></th>
                                        <th><?php echo $this->lang->line('action'); ?></th>                                            
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php $count = 1; if(isset($grades) && !empty($grades)){ ?>
                                        <?php foreach($grades as $obj){ ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <?php if($this->session->userdata('role_id') == SUPER_ADMIN){ ?>
                                                <td><?php echo $obj->school_name; ?></td>
                                            <?php } ?>
                                            <td><?php echo $obj->class_name; ?></td>
                                            <td><?php echo $obj->name; ?></td>
                                            <td><?php echo $obj->point; ?></td>
                                            <td><?php echo $obj->mark_from; ?></td>
                                            <td><?php echo $obj->mark_to; ?></td>
                                            <td><?php echo $obj->note; ?></td>
                                            <td>
                                                <?php if(has_permission(EDIT, 'exam', 'grade')){ ?>
                                                    <a href="<?php echo site_url('exam/grade/edit/'.$obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a>
                                                <?php } ?>                                               
                                                <?php if(has_permission(DELETE, 'exam', 'grade')){ ?>
                                                    <a href="<?php echo site_url('exam/grade/delete/'.$obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                        </div>

                        <div  class="tab-pane fade in <?php if(isset($add)){ echo 'active'; }?>" id="tab_add_grade">
                            <div class="x_content"> 
                                
                               <?php echo form_open(site_url('exam/grade/add'), array('name' => 'add', 'id' => 'add', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                
                                <?php $this->load->view('layout/school_list_form'); ?>
                                
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class_id"><?php echo $this->lang->line('class'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="class_id" id="class_id" required="required" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                            <?php if(isset($classes) && !empty($classes)){ ?>
                                                <?php foreach($classes as $obj ){ ?>
                                                <option value="<?php echo $obj->id; ?>" <?php echo isset($post['class_id']) && $post['class_id'] == $obj->id ?  'selected="selected"' : ''; ?>><?php echo $obj->name; ?></option>
                                                <?php } ?>                                            
                                            <?php } ?>                                            
                                        </select>
                                        <div class="help-block"><?php echo form_error('class_id'); ?></div>
                                    </div>
                                </div>
                                
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?php echo $this->lang->line('exam_grade'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    
 <select  class="form-control col-md-7 col-xs-12" onchange="get_value_for_inputs(this.value);"  name="name" id="name" required="required" >
                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                <option value="A1">-- A1 -- Excellent OR Distinction</option>
                                <option value="B2">--B2--</option>
                                <option value="B3">--B3--</option>
                                <option value="C4">--C4--</option>
                                <option value="C5">--C5--</option>
                                <option value="C6">--C6--</option>
                                <option value="D7">--D7--</option>
                                <option value="E8">--E8--</option>
                                <option value="F9">--F9--</option>
                                <option value="A">--A--</option>
                                <option value="B">--B--</option>
                                <option value="C">--C--</option>
                                <option value="D">--D--</option>
                                <option value="P">--P--</option>
                                <option value="E">--E--</option>
                                <option value="F">--F--</option> 
                                </select>                     
                                       
                                        <div class="help-block"><?php echo form_error('name'); ?></div>
                                    </div>
                                </div>                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="note"><?php echo $this->lang->line('note'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                   <input    class="form-control col-md-7 col-xs-12"  name="note"  id="note" placeholder="<?php echo $this->lang->line('note'); ?>" value="<?php echo isset($post['note']) ?  $post['note'] : ''; ?>">
                                        <div class="help-block"><?php echo form_error('note'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="point"><?php echo $this->lang->line('grade_point'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="point"  id="point" value="<?php echo isset($post['point']) ?  $post['point'] : ''; ?>" placeholder="<?php echo $this->lang->line('grade_point'); ?>"  type="number" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('point'); ?></div>
                                    </div>
                                </div>
                          
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mark_from"><?php echo $this->lang->line('mark_from'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="mark_from"  id="mark_from" value="<?php echo isset($post['mark_from']) ?  $post['mark_from'] : ''; ?>" placeholder="<?php echo $this->lang->line('mark_from'); ?>" required="required" type="number" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('mark_from'); ?></div>
                                    </div>
                                </div>
                          
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mark_to"><?php echo $this->lang->line('mark_to'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="mark_to"  id="mark_to" value="<?php echo isset($post['mark_to']) ?  $post['mark_to'] : ''; ?>" placeholder="<?php echo $this->lang->line('mark_to'); ?>" required="required" type="number" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('mark_to'); ?></div>
                                    </div>
                                </div>                          
                                
                                
                               
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url('exam/grade'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  

                        <?php if(isset($edit)){ ?>
                        <div class="tab-pane fade in active" id="tab_edit_grade">
                            <div class="x_content"> 
                               <?php echo form_open(site_url('exam/grade/edit/'.$grade->id), array('name' => 'edit', 'id' => 'edit', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                
                                <?php $this->load->view('layout/school_list_edit_form'); ?>  
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?php echo $this->lang->line('exam_grade'); ?> <span class="required">*</span>
                                    </label>
                                    
                                    
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        
               <select  class="form-control col-md-7 col-xs-12" onchange="get_value_for_inputs(this.value);"  name="name" id="name" required="required" >
                              
    <option value="A1" <?php if($grade->name=="A1"){echo 'selected="selected"'; }?>>-- A1 -- Excellent OR Distinction</option>
    <option value="B2" <?php if($grade->name=="B2"){echo 'selected="selected"'; }?>>--B2--</option>
    <option value="B3" <?php if($grade->name=="B3"){echo 'selected="selected"'; }?>>--B3--</option>
    <option value="C4" <?php if($grade->name=="C4"){echo 'selected="selected"'; }?>>--C4--</option>
    <option value="C5" <?php if($grade->name=="C5"){echo 'selected="selected"'; }?>>--C5--</option>
    <option value="C6" <?php if($grade->name=="C6"){echo 'selected="selected"'; }?>>--C6--</option>
    <option value="D7" <?php if($grade->name=="D7"){echo 'selected="selected"'; }?>>--D7--</option>
    <option value="E8" <?php if($grade->name=="E8"){echo 'selected="selected"'; }?>>--E8--</option>
    <option value="F9" <?php if($grade->name=="F9"){echo 'selected="selected"'; }?>>--F9--</option>
    <option value="A" <?php if($grade->name=="A"){echo 'selected="selected"'; }?>>--A--</option>
    <option value="B" <?php if($grade->name=="B"){echo 'selected="selected"'; }?>>--B--</option>
    <option value="C" <?php if($grade->name=="C"){echo 'selected="selected"'; }?>>--C--</option>
    <option value="D" <?php if($grade->name=="D"){echo 'selected="selected"'; }?>>--D--</option>
    <option value="E" <?php if($grade->name=="E"){echo 'selected="selected"'; }?>>--E--</option>
    <option value="F" <?php if($grade->name=="F"){echo 'selected="selected"'; }?>>--F--</option> 
                                </select>
                                        <div class="help-block"><?php echo form_error('name'); ?></div>
                                    </div>
                                    
                                    
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="point"><?php echo $this->lang->line('grade_point'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="point"  id="point" value="<?php echo isset($grade->point) ?  $grade->point : $post['point']; ?>" placeholder="<?php echo $this->lang->line('grade_point'); ?>"  type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('point'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mark_from"><?php echo $this->lang->line('mark_from'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="mark_from"  id="mark_from" value="<?php echo isset($grade->mark_from) ?  $grade->mark_from : $post['mark_from']; ?>" placeholder="<?php echo $this->lang->line('mark_from'); ?>" required="required" type="number" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('mark_from'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mark_to"><?php echo $this->lang->line('mark_to'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="mark_to"  id="mark_to" value="<?php echo isset($grade->mark_to) ?  $grade->mark_to : $post['mark_to']; ?>" placeholder="<?php echo $this->lang->line('mark_to'); ?>" required="required" type="number" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('mark_to'); ?></div>
                                    </div>
                                </div>                                
                                                                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="note"><?php echo $this->lang->line('note'); ?></label>
                                   
                                    
                                     <div class="col-md-6 col-sm-6 col-xs-12">
                   <input    class="form-control col-md-7 col-xs-12"  name="note"  id="note" placeholder="<?php echo $this->lang->line('note'); ?>" value="<?php echo isset($grade->note) ?  $grade->note : $post['note']; ?>">
                                        <div class="help-block"><?php echo form_error('note'); ?></div>
                                    </div>
                                </div>
                                                             
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input type="hidden" value="<?php echo isset($grade) ? $grade->id : $id; ?>" name="id" />
                                        <a  href="<?php echo site_url('exam/grade'); ?>"  class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('update'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  
                        <?php } ?>
                                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 <script type="text/javascript">
 
 $(document).ready(function() {
 $('.fn_school_id').on('change', function(){
	 
	  var school_id = $(this).val(); 
	   
	   
	   $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_class_by_school'); ?>",
            data   : { school_id:school_id },               
            async  : false,
            success: function(response){                                                   
               if(response)
               { 
                    $('#class_id').html(response);                     
               }
            }
        });
	 
	 })
 });
 
 
 	function get_value_for_inputs(gradevalue){
	 
	  if(gradevalue == "A1"){ 
		note.value = 'Excellent';
		point.value = "";
		mark_from.value = 75;
		mark_to.value = 100;
		}
		if(gradevalue == "B2"){ 
		note.value = 'Very Good';
		point.value = "";
		mark_from.value = 70;
		mark_to.value = 74;
		}
		if(gradevalue == "B3"){ 
		note.value = 'Good';
		point.value = "";
		mark_from.value = 65;
		mark_to.value = 69;
		}
		if(gradevalue == "C4"){ 
		note.value = 'Credit';
		point.value = "";
		mark_from.value = 60;
		mark_to.value = 64;
		}
		if(gradevalue == "C5"){ 
		note.value = 'Credit';
		point.value = "";
		mark_from.value = 55;
		mark_to.value = 59;
		}
		if(gradevalue == "C6"){ 
		note.value = 'Credit';
		point.value = "";
		mark_from.value = 50;
		mark_to.value = 54;
		}	
	 	if(gradevalue == "D7"){ 
		note.value = 'Pass';
		point.value = "";
		mark_from.value = 45;
		mark_to.value = 49;
		}	
		if(gradevalue == "E8"){ 
		note.value = 'Pass';
		point.value = "";
		mark_from.value = 40;
		mark_to.value = 44;
		}	
		if(gradevalue == "F9"){ 
		note.value = 'Fail';
		point.value = "";
		mark_from.value = 0;
		mark_to.value = 41;
		}	
		
		
		if(gradevalue == "A"){ 
		note.value = 'Excellent';
		point.value = 5;
		mark_from.value = 70;
		mark_to.value = 100;
		}	
		if(gradevalue == "B"){ 
		note.value = 'Very good';
		point.value = 4;
		mark_from.value = 60;
		mark_to.value = 69;
		}	
		if(gradevalue == "C"){ 
		note.value = 'Good';
		point.value = 3;
		mark_from.value = 50;
		mark_to.value = 59;
		}	
		if(gradevalue == "D"){ 
		note.value = 'Pass';
		point.value = 2;
		mark_from.value = 45;
		mark_to.value = 49;
		}
		if(gradevalue == "E"){ 
		note.value = 'Fair';
		point.value = 1;
		mark_from.value = 40;
		mark_to.value = 44;
		}
		if(gradevalue == "F"){ 
		note.value = 'Fail';
		point.value = 0;
		mark_from.value = 0;
		mark_to.value = 39;
		}			
 			}
			
			
function get_class_by_school(school_id){       
         
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_class_by_school'); ?>",
            data   : { school_id:school_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {  
                   $('#filter_class_id').html(response);  
				                                    
               }
            }
        }); 
   }
   
   
 function get_grade_by_class(class_id){  
	alert("yuyuyuyuyuyy"); 
	
	var school_id = document.getElementById('add_school_id').value;
	       
        if(class_id){           
            window.location.href = '<?php echo site_url('exam/grade/index/'); ?>'+class_id+'/'+school_id; 
        }else{
             window.location.href = '<?php echo site_url('exam/grade/index'); ?>';
        }
    }     
   
   
</script>

 <script type="text/javascript">
        $(document).ready(function() {
          $('#datatable-responsive').DataTable( {
              dom: 'Bfrtip',
              iDisplayLength: 15,
              buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdfHtml5',
                  'pageLength'
              ],
              search: true,              
              responsive: true
          });
        });
        
    $("#add").validate();     
    $("#edit").validate();  
	
	 
 
		
		
    
    
</script>
