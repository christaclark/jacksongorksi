<form action="<?php echo home_url(); ?>/" id="searchform" method="get">
	<input class="wmb95" type="text" id="s" name="s" value="<?php _e('To search type and hit enter', 'silver') ?>" onfocus="if(this.value=='<?php _e('To search type and hit enter', 'silver') ?>')this.value='';" onblur="if(this.value=='')this.value='<?php _e('To search type and hit enter', 'silver') ?>';" autocomplete="off" />
	<input type="submit" value="Search" id="searchsubmit" class="hidden" />
</form>