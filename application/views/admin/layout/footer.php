          
        <form action="<?php echo base_url('admin/dashboard/resetStatus');?>" method="post" onsubmit="return confirm('Are you sure you want to reset all status?');">
        	<!-- CSRF token -->
            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
        	<label style="font-size: 15px"> Reset Students Status  :</label>
        	<button class="btn-sm" type="submit"> Reset  </button>
        </form>
         
