<?php echo $this->element('common-header'); ?> 
<?php echo $this->element('admin-header'); ?> 
<?php //echo $this->element($sidebar.'-sidebar'); ?> 
<?php echo $this->element($sidebar.'-sidebar', array('categories' => $categories)); ?>
<?php echo $this->fetch('content'); ?>
<?php echo $this->element('common-footer'); ?> 
