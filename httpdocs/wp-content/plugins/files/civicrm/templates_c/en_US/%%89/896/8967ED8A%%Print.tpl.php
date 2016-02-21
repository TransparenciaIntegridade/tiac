<?php /* Smarty version 2.6.27, created on 2016-01-29 16:27:47
         compiled from CRM/Contact/Page/View/Print.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Contact/Page/View/Print.tpl', 1, false),array('block', 'ts', 'CRM/Contact/Page/View/Print.tpl', 38, false),array('function', 'crmURL', 'CRM/Contact/Page/View/Print.tpl', 36, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo '
<style type="text/css" media="screen, print">
<!--
  #crm-container div {
    font-size: 12px;
  }
-->
</style>
'; ?>

<form action="<?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/contact/view','q' => "&cid=".($this->_tpl_vars['contactId'])."&reset=1"), $this);?>
" method="post" id="Print1" >
  <div class="form-item">
       <span class="element-right"><input onclick="window.print(); return false" class="crm-form-submit default" name="_qf_Print_next" value="<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Print<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" type="submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="crm-form-submit" name="_qf_Print_back" value="<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Done<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" type="submit" /></span>
  </div>
</form>
<br />
<div class="solid-border-top"><br />
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Contact/Page/View/Summary.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <form action="<?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/contact/view','q' => "&cid=".($this->_tpl_vars['contactId'])."&reset=1"), $this);?>
" method="post" id="Print2" >
      <div class="form-item">
           <span class="element-right"><input onclick="window.print(); return false" class="crm-form-submit default" name="_qf_Print_next" value="<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Print<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" type="submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="crm-form-submit" name="_qf_Print_back" value="<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Done<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" type="submit" /></span>
      </div>
    </form>
</div>
<?php echo '
<script type="text/javascript">
cj(\'#mainTabContainer\').children(\':first\').remove();
cj(\'#contact-summary\' ).children(\':first\').remove();

</script>
'; ?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>