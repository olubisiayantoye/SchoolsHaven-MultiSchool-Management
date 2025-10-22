   <form method="post" action="">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="checkAl"> Select All</th>
                                        
                                        <?php if($this->session->userdata('role_id') == SUPER_ADMIN){ ?>
                                            <th><?php echo $this->lang->line('school'); ?></th>
                                        <?php } ?>
                                        <th><?php echo $this->lang->line('pin'); ?> <?php echo $this->lang->line('code'); ?></th>
                                        <th><?php echo $this->lang->line('date'); ?> <?php echo $this->lang->line('created'); ?></th>
                                        <th><?php echo $this->lang->line('number'); ?> of Usage</th>
                                        <th><?php echo $this->lang->line('status'); ?></th>
                                        <th><?php echo $this->lang->line('created'); ?> <?php echo $this->lang->line('by'); ?> </th>
                                        <th><?php echo $this->lang->line('action'); ?></th>                                            
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php $count = 1; if(isset($pin) && !empty($pin)){ ?>
                                        <?php foreach($pin as $obj){ ?>
                                        <tr>
                                         <td><input type="checkbox" id="checkItem" name="check[]" value="<?php //echo $row["userid"]; ?>"></td>
                                            
                                            <?php if($this->session->userdata('role_id') == SUPER_ADMIN){ ?>
                                                <td><?php echo $obj->school_id; ?></td>
                                            <?php } ?>
                                            <td><?php echo $obj->pin_number; ?></td>
                                            <td><?php echo date('d,M,Y',$obj->time_stamp); ?></td>
                                            <td><?php echo $obj->number_of_use; ?></td>
                                            <td><?php echo $obj->status; ?></td>
                                            <td><?php echo $obj->time_stamp; ?></td>
                                            <td>
                                                <?php if(has_permission(EDIT, 'check_exam', 'pin')){ ?>
                                                    <a href="<?php echo site_url('check_exam/pin/edit/'.$obj->pin_id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a>
                                                <?php } ?>
                                                <?php if(has_permission(VIEW, 'check_exam', 'pin')){ ?>
                                                    <a  onclick="get_subject_modal(<?php echo $obj->pin_id; ?>);"  data-toggle="modal" data-target=".bs-subject-modal-lg"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a>
                                                <?php } ?>
                                                <?php if(has_permission(DELETE, 'check_exam', 'pin')){ ?>
                                                    <a href="<?php echo site_url('check_exam/pin/delete/'.$obj->pin_id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                               <p align="center"><button type="submit" class="btn btn-success" name="save">DELETE</button> <button type="submit" class="btn btn-success" name="save">DELETE</button></p>
</form>


<script>
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
</script>