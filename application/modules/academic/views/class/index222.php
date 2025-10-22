<style>
.mycol{
	
	float:left;
	width:30%;
	}

</style>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-slideshare"></i><small> <?php echo $this->lang->line('manage_class'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">
                    
                    <ul  class="nav nav-tabs bordered">
                        <li class="<?php if(isset($list)){ echo 'active'; }?>"><a href="#tab_class_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('class'); ?> <?php echo $this->lang->line('list'); ?></a> </li>
                        <?php if(has_permission(ADD, 'academic', 'classes')){ ?>
                            <?php if(isset($edit)){ ?>
                                <li  class="<?php if(isset($add)){ echo 'active'; }?>"><a href="<?php echo site_url('academic/classes/add'); ?>"  aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?> <?php echo $this->lang->line('class'); ?></a> </li>                          
                             <?php }else{ ?>
                                 <li  class="<?php if(isset($add)){ echo 'active'; }?>"><a href="#tab_add_class"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?> <?php echo $this->lang->line('class'); ?></a> </li>                          
                             <?php } ?>
                           
                        <?php } ?> 
                        <?php if(isset($edit)){ ?>
                            <li onclick="addFields()"  class="active"><a href="#tab_edit_class"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> <?php echo $this->lang->line('class'); ?></a> </li>                          
                        <?php } ?>                
                    </ul>
                    <br/>
                    
                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php if(isset($list)){ echo 'active'; }?>" id="tab_class_list" >
                          <div class="" data-example-id="togglable-tabs">
                            <ul  class="nav nav-tabs bordered">
                              <li class="li-class-list">
                             <select  class="form-control col-md-7 col-xs-12 auto-width" name="school_id_filter" id="school_id_filter" onchange="get_class_by_school(this.value,'')">
                                        <option value="">--<?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('school'); ?>--</option> 
                                    <?php foreach($schools as $obj ){ ?>
                                        <option value="<?php echo $obj->id; ?>" <?php if(isset($filter_school_id) && $filter_school_id == $obj->id){ echo 'selected="selected"';} ?> > <?php echo $obj->school_name; ?></option>
                                    <?php } ?>   
                                </select>                            
                                <select  class="form-control col-md-7 col-xs-12 auto-width" name="class_id_filter" id="class_id_filter" onchange="get_student_by_class_sa(this.value);" >
                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>                                                                               
                                </select>
                                </li>
                            </ul>
                            </div>
                            <div class="x_content">
                          
                            
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('sl_no'); ?></th>
                                        <?php if($this->session->userdata('role_id') == SUPER_ADMIN){ ?>
                                            <th><?php echo $this->lang->line('school'); ?></th>
                                        <?php } ?>
                                        <th><?php echo $this->lang->line('class'); ?></th>
                                        <th><?php echo $this->lang->line('numeric'); ?> <?php echo $this->lang->line('name'); ?></th>
                                        <th><?php echo $this->lang->line('teacher'); ?></th>                                  
                                        <th><?php echo $this->lang->line('action'); ?></th>  
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php $count = 1; if(isset($classes) && !empty($classes)){ ?>
                                        <?php foreach($classes as $obj){ ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <?php if($this->session->userdata('role_id') == SUPER_ADMIN){ ?>
                                                <td><?php echo $obj->school_name; ?></td>
                                            <?php } ?>
                                            <td><?php echo $obj->name; ?></td>
                                            <td><?php echo $obj->numeric_name; ?></td>
                                            <td><?php echo $obj->teacher; ?></td>                                           
                                            <td>
                                                <?php if(has_permission(EDIT, 'academic', 'classes')){ ?>
                                                    <a href="<?php echo site_url('academic/classes/edit/'.$obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a>
                                                <?php } ?>
                                                <?php if(has_permission(DELETE, 'academic', 'classes')){ ?>
                                                    <a href="<?php echo site_url('academic/classes/delete/'.$obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                        </div>

                        <div  class="tab-pane fade in <?php if(isset($add)){ echo 'active'; }?>" id="tab_add_class">
                            <div class="x_content"> 
<?php echo form_open(site_url('academic/classes/add'), array('name' => 'add', 'id' => 'add', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                
                                <?php $this->load->view('layout/school_list_form'); ?>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?php echo $this->lang->line('class'); ?> <?php echo $this->lang->line('name'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="name"  id="add_name" value="<?php echo isset($post['name']) ?  $post['name'] : ''; ?>" placeholder="<?php echo $this->lang->line('class'); ?> <?php echo $this->lang->line('name'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('name'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numeric_name"><?php echo $this->lang->line('numeric'); ?> <?php echo $this->lang->line('name'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="numeric_name"  id="add_numeric_name" value="<?php echo isset($post['numeric_name']) ?  $post['numeric_name'] : ''; ?>" placeholder="<?php echo $this->lang->line('numeric'); ?> <?php echo $this->lang->line('name'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('numeric_name'); ?></div>
                                    </div>
                                </div>
                                
                                
                                                            
                                 <div class="ln_solid"></div>
                                 	<h3>Exam Results Settings</h3>
                        <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="teacher_id">Number Of Continuous Assessment Test<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
            <select onchange="addFields()"  class="form-control col-md-7 col-xs-12" id="member" name="no_cont_ass" required="required" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                            <option value="2" >One Cont Assessment Test</option>
                                            <option value="3" >Two Cont Assessment Test</option>
                                            <option value="4" >Three Cont Assessment Test</option>
                                            <option value="5" >Four Cont Assessment Test</option>
                                                                                   
                                        </select>
                                        <div class="help-block"><?php echo form_error('teacher_id'); ?></div>
                                    </div>
                                  </div>
                                  
                                  <div class="ln_solid"></div>
                                  <div  id="container">
								  </div>
                                   
							<div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Total Mark of Exam <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                           <input readonly  class="form-control col-md-7 col-xs-12"  name="exam_mark"  id="total_exam_num" value="" placeholder="100" required="required" type="number" autocomplete="off">
                                        
                                    </div>
                                </div>
                                  <div class="ln_solid"></div>
                                  
                                   <h3>Class Assessment Position Format</h3>
                            
                                    
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Position Format';?></label>
                                <div class="col-sm-5">
                                    <select name="position_format" class="form-control select2" style="width:100%;" data-validate="required" >
                                        
                                    	<option value="1"><?php echo 'Ordinal Format';?></option>
                                    	<option value="2"><?php echo 'Grade Format';?></option>
                                        
                                       
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Position Input';?></label>
                                <div class="col-sm-5">
                                    <select name="position_input" class="form-control select2" style="width:100%;" data-validate="required">
                                        
                                    	<option value="1"><?php echo 'Computerized Input';?></option>
                                    	<option value="2"><?php echo 'Manual Input';?></option>
                                        
                                       
                                    </select>
                                </div>
                            </div>
                                  <div class="ln_solid"></div>
                                  <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="teacher_id"><?php echo $this->lang->line('class'); ?> <?php echo $this->lang->line('teacher'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="teacher_id"  id="add_teacher_id" required="required" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                            <?php foreach($teachers as $obj ){ ?>
                                            <option value="<?php echo $obj->id; ?>" <?php echo isset($post['teacher_id']) && $post['teacher_id'] == $obj->id ?  'selected="selected"' : ''; ?>><?php echo $obj->name; ?></option>
                                            <?php } ?>                                            
                                        </select>
                                        <div class="help-block"><?php echo form_error('teacher_id'); ?></div>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                  
                                 
                                  
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="note"><?php echo $this->lang->line('note'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="note"  id="add_note" placeholder="<?php echo $this->lang->line('note'); ?>"><?php echo isset($post['note']) ?  $post['note'] : ''; ?></textarea>
                                        <div class="help-block"><?php echo form_error('note'); ?></div>
                                    </div>
                                </div>
                                
                                
                               
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url('academic/classes'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="instructions"><strong><?php echo $this->lang->line('instruction'); ?>: </strong> <?php echo $this->lang->line('add_class_instruction'); ?></div>
                                </div>
                            </div>                           
                            
                        </div>  

                        <?php if(isset($edit)){ ?>
                        <div class="tab-pane fade in active" id="tab_edit_class">
                            <div class="x_content"> 
                               <?php echo form_open(site_url('academic/classes/edit/'.$class->id), array('name' => 'edit', 'id' => 'edit', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                
                                <?php $this->load->view('layout/school_list_edit_form'); ?> 
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?php echo $this->lang->line('class'); ?> <?php echo $this->lang->line('name'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="name"  id="edit_name" value="<?php echo isset($class->name) ?  $class->name : $post['name']; ?>" placeholder="Class Name" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('name'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="numeric_name"><?php echo $this->lang->line('numeric'); ?> <?php echo $this->lang->line('name'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="numeric_name"  id="edit_numeric_name" value="<?php echo isset($class->numeric_name) ?  $class->numeric_name : $post['numeric_name']; ?>" placeholder="<?php echo $this->lang->line('numeric'); ?> <?php echo $this->lang->line('name'); ?>" required="required" type="text" autocomplete="off">
                                        <div class="help-block"><?php echo form_error('numeric_name'); ?></div>
                                    </div>
                                </div>
                                  <!------------------------ZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZ------------------------>
                                 <div class="ln_solid"></div>
                                 	<h3>Exam Results Settings</h3>
                        <div class="item form-group">
      						 <?php 
							 
							 $cat_ass_test = explode(":",$class->cat_ass_test);
							 $abbreviation = explode(":",$class->abbreviation);
							 $cont_mark = explode(":",$class->cont_mark);
							 //var_dump($class->cat_ass_test);
							  ?>
                                  

                                <div class="col-md-12 col-sm-6 col-xs-12">
                                
  								<div class="row form-group child_div"><div class="mycol">
                                <label>Name:1Cont-Ass Test</label>
                                <input type="text" class="form-control" name="cat_ass_test[]" value="<?php if (isset($cat_ass_test[0])){ echo $cat_ass_test[0];}?>">
                                </div>
                                <div class="mycol">
                                <label>Abbreviation</label>
                                <input type="text" class="form-control" name="abbreviation[]" value="<?php if (isset($abbreviation[0])){ echo $abbreviation[0];}?>">
                                </div>
                                <div class="mycol">
                                <label>Mark Assign</label>
                                <input type="number" class="form-control"  onkeyup="exam_mark_edit()" name="cont_mark[]" id="exammark11" value="<?php if (isset($cont_mark[0])){ echo $cont_mark[0];}?>">
                                </div>
                                </div>
                                
                                <div class="row form-group child_div">
                                <div class="mycol">
                                <label>Name:2Cont-Ass Test</label>
                                <input type="text" class="form-control" name="cat_ass_test[]" value="<?php if (isset($cat_ass_test[1])){ echo $cat_ass_test[1];}?>">
                                </div>
                                <div class="mycol">
                                <label>Abbreviation</label>
       <input type="text" class="form-control" name="abbreviation[]" value="<?php if (isset($abbreviation[1])){ echo $abbreviation[1];}?>">
                                </div>
                                <div class="mycol">
                                <label>Mark Assign</label>
                                <input type="number" class="form-control" onkeyup="exam_mark_edit()" name="cont_mark[]" id="exammark22" value="<?php if (isset($cont_mark[1])){ echo $cont_mark[1];}?>">
                                </div>
                                </div>
                                
                                <div class="row form-group child_div">
                                <div class="mycol">
                                <label>Name:3Cont-Ass Test</label>
                                <input type="text" class="form-control" name="cat_ass_test[]" value="<?php if (isset($cat_ass_test[2])){ echo $cat_ass_test[2];}?>">
                                </div>
                                <div class="mycol">
                                <label>Abbreviation</label>
                                <input type="text" class="form-control" name="abbreviation[]" value="<?php if (isset($abbreviation[2])){ echo $abbreviation[2];}?>">
                                </div>
                                <div class="mycol">
                                <label>Mark Assign</label>
                                <input type="number" class="form-control" onkeyup="exam_mark_edit()" name="cont_mark[]" id="exammark33" value="<?php if (isset($cont_mark[2])){ echo $cont_mark[2];}?>" >
                                </div>
                                </div>
                                
                                <div class="row form-group child_div">
                                <div class="mycol">
                                <label>Name:4Cont-Ass Test</label>
                                <input type="text" class="form-control" name="cat_ass_test[]" value="<?php if (isset($cat_ass_test[3])){ echo $cat_ass_test[3];}?>">
                                </div>
                                <div class="mycol">
                                <label>Abbreviation</label>
                                <input type="text" class="form-control"  name="abbreviation[]"  value="<?php if (isset($abbreviation[3])){ echo $abbreviation[3];}?>">
                                </div>
                                <div class="mycol">
                                <label>Mark Assign</label>
                                <input type="number" class="form-control" onkeyup="exam_mark_edit()" name="cont_mark[]" id="exammark44" value="<?php if (isset($cont_mark[3])){ echo $cont_mark[3];}?>" >
                                </div>
                                </div>
                                        
                                 </div>
                          </div>
                                  
                                  <div class="ln_solid"></div>
                                  
                                   
							<div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Total Mark of Exam <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                           <input readonly  class="form-control col-md-7 col-xs-12"  name="exam_mark"  id="total_exam_num_edit" value="" required="required" type="number" autocomplete="off">
                                        
                                    </div>
                                </div>
                                  <div class="ln_solid"></div>
                                
                                <!------------------------ZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZ------------------------>
                                
                         
                                   <h3>Class Assessment Position Format</h3>
                            
                                    
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Position Format';?></label>
                                <div class="col-sm-5">
                                    <select name="position_format" class="form-control select2" style="width:100%;" data-validate="required" >
                                        
 <option value="1"  <?php if($class->position_format == 1){ echo 'selected="selected"';} ?> ><?php echo 'Ordinal Format';?></option>
 <option value="2"  <?php if($class->position_format == 2){ echo 'selected="selected"';} ?>><?php echo 'Grade Format';?></option>
                                        
                                       
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo 'Position Input';?></label>
                                <div class="col-sm-5">
                                    <select name="position_input" class="form-control select2" style="width:100%;" data-validate="required">
                                        
                                    	<option value="1" <?php if($class->position_input == 1){ echo 'selected="selected"';} ?>><?php echo 'Computerized Input';?></option>
                                    	<option value="2"  <?php if($class->position_input == 2){ echo 'selected="selected"';} ?>><?php echo 'Manual Input';?></option>
                                        
                                       
                                    </select>
                                </div>
                            </div>
                                  <div class="ln_solid"></div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="teacher_id"><?php echo $this->lang->line('class'); ?>  <?php echo $this->lang->line('teacher'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
               <select  class="form-control col-md-7 col-xs-12"  name="teacher_id"  id="edit_teacher_id" required="required" >
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                            <?php foreach($teachers as $obj ){ ?>
                                            <option value="<?php echo $obj->id; ?>" <?php if($class->teacher_id == $obj->id){ echo 'selected="selected"';} ?> ><?php echo $obj->name; ?></option>
                                            <?php } ?>                                            
                                        </select>
                                        <div class="help-block"><?php echo form_error('teacher_id'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="note"><?php echo $this->lang->line('note'); ?></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="note"  id="note" placeholder="<?php echo $this->lang->line('note'); ?>"><?php echo isset($class->note) ?  $class->note : $post['note']; ?></textarea>
                                        <div class="help-block"><?php echo form_error('note'); ?></div>
                                    </div>
                                </div>
                                                             
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input type="hidden" name="id" id="id" value="<?php echo $class->id; ?>" />
                                        <a href="<?php echo site_url('academic/classes'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
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
window.onload = function() {
 exam_mark_edit();
};

        function exam_mark(){
			var numb1 = 0;
			var numb2 = 0;
			var numb3 = 0;
			if(document.getElementById("exammark1")){
			var numb1 = Number(document.getElementById("exammark1").value);
			}
			if(document.getElementById("exammark2")){
			var numb2 = Number(document.getElementById("exammark2").value);
			}
			if(document.getElementById("exammark3")){
			var numb3 = Number(document.getElementById("exammark3").value);
			}
			
			var result = 100 - ( numb1 + numb2 + numb3 );
			document.getElementById("total_exam_num").value = result;
			//alert(numb1+"yes ooooooooooooo");
			
			}
			
			   function exam_mark_edit(){
				  
			var numb1 = 0;
			var numb2 = 0;
			var numb3 = 0;
			var numb4 = 0;
			if(document.getElementById("exammark11")){
			var numb1 = Number(document.getElementById("exammark11").value);
			}
			if(document.getElementById("exammark22")){
			var numb2 = Number(document.getElementById("exammark22").value);
			}
			if(document.getElementById("exammark33")){
			var numb3 = Number(document.getElementById("exammark33").value);
			}
			if(document.getElementById("exammark44")){
			var numb4 = Number(document.getElementById("exammark44").value);
			}
			var result = 100 - ( numb1 + numb2 + numb3 + numb4);
			document.getElementById("total_exam_num_edit").value = result;
			//alert(numb1+"yes ooooooooooooo");
			
			}



function addFields2(){
	
	// alert("yesss oooo");
            // Number of inputs to create
            var number = document.getElementById("member2").value;
			<?php //$ss = $_GET['number'];?>
            // Container <div> where dynamic content will be placed
			
            var container = document.getElementById("container2");
            // Clear previous contents of the container
			
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (i=1;i<number;i++){
				var rank = "";
				if (i == 1){
					
				rank = "First";
					}
				if (i == 2){
					
				rank = "Second";
					}
				if (i == 3){
					
				 rank = "Third";
					}
				
			var condiv = document.createElement("div");
				condiv.className = "row form-group child_div";
				
				
				var input = document.createElement("input");
				
				var div1 = document.createElement("div");
				div1.className = "mycol";
				
				var inpdiv1 = document.createElement("div");
				inpdiv1.className = "input-group";
				
				var mylabel = document.createElement("label");	
			    mylabel.append("Name:" +i+ "Cont-Ass Test");
                input.type = "text";
				input.className = "form-control";
                //input.name = "member" + i;
					input.name = "cat_ass_test[]";
				input.value =  rank + " Continuous Assessment Test";
				
				
				
				
				var input2 = document.createElement("input");
				
				var div2 = document.createElement("div");
				div2.className = "mycol";
				
				var inpdiv2 = document.createElement("div");
				inpdiv2.className = "input-group";
				
				var mylabel2 = document.createElement("label");
				mylabel2.append("Abbreviation");
                input2.type = "text";
				input2.className = "form-control";
                input2.name = "abbreviation[]";
				input2.value = rank + " CAT";
				
				
				
				var input3 = document.createElement("input");
				
				var div3 = document.createElement("div");
				div3.className = "mycol";
				
				inpdiv3 = document.createElement("div");
				inpdiv3.className = "input-group";
				
				var mylabel3 = document.createElement("label");
				mylabel3.append("Mark Assign");
                input3.type = "number";
				input3.onchange = function(){
					exam_mark();
					};
				input3.className = "form-control";
                input3.name = "cont_mark[]";
				input3.id = "exammark" + i;
				input3.value = "fggg";
				
				
				container2.appendChild(condiv);
				condiv.appendChild(div1);
				div1.appendChild(mylabel);
				div1.appendChild(input);
				
				condiv.appendChild(div2);
				div2.appendChild(mylabel2);
				div2.appendChild(input2);
				
				condiv.appendChild(div3);
				div3.appendChild(mylabel3);
				div3.appendChild(input3);
			

			}
	
	
	}



  function addFields(){
	 // alert("yesss oooo");
            // Number of inputs to create
            var number = document.getElementById("member").value;
            // Container <div> where dynamic content will be placed
            var container = document.getElementById("container");
            // Clear previous contents of the container
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (i=1;i<number;i++){
				var rank = "";
				if (i == 1){
					
				rank = "First";
					}
				if (i == 2){
					
				rank = "Second";
					}
				if (i == 3){
					
				 rank = "Third";
					}
					if (i == 4){
					
				 rank = "Fourth";
					}
				
			var condiv = document.createElement("div");
				condiv.className = "row form-group child_div";
				
				
				var input = document.createElement("input");
				
				var div1 = document.createElement("div");
				div1.className = "mycol";
				
				var inpdiv1 = document.createElement("div");
				inpdiv1.className = "input-group";
				
				var mylabel = document.createElement("label");	
			    mylabel.append("Name:" +i+ "Cont-Ass Test");
                input.type = "text";
				input.className = "form-control";
                //input.name = "member" + i;
					input.name = "cat_ass_test[]";
				input.value =  rank + " Continuous Assessment Test";
				
				
				
				
				var input2 = document.createElement("input");
				
				var div2 = document.createElement("div");
				div2.className = "mycol";
				
				var inpdiv2 = document.createElement("div");
				inpdiv2.className = "input-group";
				
				var mylabel2 = document.createElement("label");
				mylabel2.append("Abbreviation");
                input2.type = "text";
				input2.className = "form-control";
                input2.name = "abbreviation[]";
				input2.value = rank + " CAT";
				
				
				
				var input3 = document.createElement("input");
				
				var div3 = document.createElement("div");
				div3.className = "mycol";
				
				inpdiv3 = document.createElement("div");
				inpdiv3.className = "input-group";
				
				var mylabel3 = document.createElement("label");
				mylabel3.append("Mark Assign");
                input3.type = "number";
				input3.onchange = function(){
					exam_mark();
					};
				input3.className = "form-control";
                input3.name = "cont_mark[]";
				input3.id = "exammark" + i;
				input3.value = 0;
				
				
				container.appendChild(condiv);
				condiv.appendChild(div1);
				div1.appendChild(mylabel);
				div1.appendChild(input);
				
				condiv.appendChild(div2);
				div2.appendChild(mylabel2);
				div2.appendChild(input2);
				
				condiv.appendChild(div3);
				div3.appendChild(mylabel3);
				div3.appendChild(input3);
			

				
            }
        }
		

</script>





<!-- Super admin js START  -->
 <script type="text/javascript">
     
    $("document").ready(function() {
         <?php if(isset($class) && !empty($class)){ ?>
            $("#edit_school_id").trigger('change');
         <?php } ?>
    });
     
    $('.fn_school_id').on('change', function(){
      
        var school_id = $(this).val();       
        var teacher_id = '';
        <?php if(isset($class) && !empty($class)){ ?>         
            teacher_id =  '<?php echo $class->teacher_id; ?>';
         <?php } ?> 
        
        if(!school_id){
           toastr.error('<?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('school'); ?>');
           return false;
        }
        
         $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_teacher_by_school'); ?>",
            data   : { school_id:school_id, teacher_id : teacher_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {    
                   if(teacher_id){
                       $('#edit_teacher_id').html(response);
                   }else{
                       $('#add_teacher_id').html(response); 
                   }
               }
            }
        });       
     
    }); 

    
  </script>
  <!-- Super admin js end -->

<!-- datatable with buttons -->
 <script type="text/javascript">
        $(document).ready(function() {
            
          $('#datatable-responsive').DataTable({
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