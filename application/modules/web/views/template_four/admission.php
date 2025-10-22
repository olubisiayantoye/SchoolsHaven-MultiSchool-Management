    <!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2><?php echo $this->lang->line('admission'); ?></h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>"><?php echo $this->lang->line('home'); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line('admission'); ?></li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->




<section class="page-contact-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="admission-form">
                    <div class="row"> 
                        <div class="col-md-10 col-sm-10 col-xs-12 ">
                            <div class="admission-address">
                                <div><h3><?php echo $school->school_name; ?></h3></div>                                
                                <div><?php echo $school->address; ?></div>
                                <div><?php echo $school->phone; ?></div>
                                <div><?php echo $school->email; ?></div>
                                <div><h4><?php echo $this->lang->line('admission_form'); ?></h4></div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <span class="student-picture"><?php echo $this->lang->line('photo'); ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12"><hr></div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 col-sm-12"><p class="admission-form-title"><strong><?php echo $this->lang->line('basic'); ?> <?php echo $this->lang->line('information'); ?>:</strong></p> </div>
                    </div>  
                    
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('student'); ?> <?php echo $this->lang->line('name'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>                    
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('admission_no'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('birth_date'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>                    
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('gender'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('blood_group'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>                    
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('religion'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 col-sm-12"><p class="admission-form-title"><strong><?php echo $this->lang->line('contact'); ?> <?php echo $this->lang->line('information'); ?>:</strong></p> </div>
                    </div>  
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('phone'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>                    
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('national_id'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('present'); ?> <?php echo $this->lang->line('address'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('permanent'); ?> <?php echo $this->lang->line('address'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-md-12 col-sm-12"><p class="admission-form-title"><strong><?php echo $this->lang->line('academic'); ?> <?php echo $this->lang->line('information'); ?>:</strong></p> </div>
                    </div>  
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('class'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('section'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('group'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('second'); ?> <?php echo $this->lang->line('language'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-md-12 col-sm-12"><p class="admission-form-title"><strong><?php echo $this->lang->line('previous'); ?> <?php echo $this->lang->line('school'); ?> <?php echo $this->lang->line('information'); ?>:</strong></p> </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('previous'); ?> <?php echo $this->lang->line('school'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('previous'); ?> <?php echo $this->lang->line('class'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                    </div>
                
                    
                    <div class="row">
                        <div class="col-md-12 col-sm-12"><p class="admission-form-title"><strong><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('information'); ?>:</strong></p> </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('name'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('phone'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('education'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('profession'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('father'); ?> <?php echo $this->lang->line('designation'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>                        
                    </div>
                    
                        
                    <div class="row">
                        <div class="col-md-12 col-sm-12"><p class="admission-form-title"><strong><?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('information'); ?>:</strong></p> </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('name'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('phone'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('education'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('profession'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('mother'); ?> <?php echo $this->lang->line('designation'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>                        
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 col-sm-12"><p class="admission-form-title"><strong><?php echo $this->lang->line('other'); ?> <?php echo $this->lang->line('information'); ?>:</strong></p> </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('email'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('health_condition'); ?> :</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('other_info'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                    </div>
                                     
                    <div class="row">
                        <div class="col-md-12 col-sm-12"><p class="admission-form-title"><strong><?php echo $this->lang->line('guardian'); ?> <?php echo $this->lang->line('information'); ?>:</strong></p> </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('guardian'); ?> <?php echo $this->lang->line('name'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('relation_with'); ?> :</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('phone'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('email'); ?> :</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('religion'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('profession'); ?> :</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('national_id'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('present'); ?> <?php echo $this->lang->line('address'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('permanent'); ?> <?php echo $this->lang->line('address'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-field">
                                <div class="field-title"><?php echo $this->lang->line('other_info'); ?>:</div> 
                                <div class="field-value"></div> 
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>         
        </div>
        <div class="row no-print">
            <div class="col-md-12 col-sm-12 text-center margin-top">
                <button class="btn btn-info" onclick="window.print();"><i class="fa fa-print"></i> <?php echo $this->lang->line('print'); ?></button>
            </div>
        </div>
    </div>
</section>
