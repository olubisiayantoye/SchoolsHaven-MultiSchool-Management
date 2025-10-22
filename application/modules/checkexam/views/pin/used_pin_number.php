<form method="post" action="">
    <table id="datatable-responsive2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th><input type="checkbox" id="checkAl2"> Select All</th>
                
                <?php if($this->session->userdata('role_id') == SUPER_ADMIN){ ?>
                    <th><?php echo $this->lang->line('school'); ?></th>
                <?php } ?>
                <th><?php echo $this->lang->line('pin'); ?> <?php echo $this->lang->line('code'); ?></th>
                <th><?php echo $this->lang->line('view'); ?> <?php echo $this->lang->line('by'); ?></th>
                <th><?php echo $this->lang->line('number'); ?> of Usage</th>
                <th><?php echo $this->lang->line('exam'); ?></th>
                <th><?php echo $this->lang->line('view'); ?> <?php echo $this->lang->line('date'); ?> </th>
                                                           
            </tr>
        </thead>
        <tbody>   
            <?php $count = 1; if(isset($pin) && !empty($pin)){ ?>
                <?php foreach($used_pin as $obj){ ?>
                <tr>
                 <td><input type="checkbox" id="checkItem2" name="check2[]" value="<?php echo $obj->pin_id; ?>"></td>
                    
                    <?php if($this->session->userdata('role_id') == SUPER_ADMIN){ ?>
                        <td><?php echo $obj->school_name; ?></td>
                    <?php } ?>
                    <td><?php echo $obj->pin_number; ?></td>
                    <td><?php echo $obj->admission_no.' - '.$obj->surname.' '.$obj->name; ?></td>
                    <td><?php echo $obj->card_usage; ?></td>
                    <td><?php echo $obj->status; ?></td>
                    <td><?php echo date('d M,Y H:i:s',$obj->time_stamp); ?></td>
                    
                </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
    <p align="center">
   <button type="submit" class="btn btn-success" name="action2" value="renew">RENEW</button>
  <button type="submit" class="btn btn-success" name="action2" value="block">BLOCK</button> 		  <button type="submit" class="btn btn-success" name="action2" value="delete">DELETE</button>
              </p>
</form>


<script>
$("#checkAl2").click(function () {
$("input[name='check2[]']").not(this).prop('checked', this.checked);
});
</script>


<!-- datatable with buttons -->
 <script type="text/javascript">
        $(document).ready(function() {
          $('#datatable-responsive2').DataTable({
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
        
       function get_subject_by_class(url){          
           if(url){
               window.location.href = url; 
           }
       }
       
    $("#add").validate();     
    $("#edit").validate();     
</script>

