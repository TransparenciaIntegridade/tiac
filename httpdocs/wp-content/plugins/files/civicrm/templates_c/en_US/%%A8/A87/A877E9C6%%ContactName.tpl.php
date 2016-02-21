<?php /* Smarty version 2.6.27, created on 2016-01-28 14:55:29
         compiled from CRM/Contact/Form/Inline/ContactName.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Contact/Form/Inline/ContactName.tpl', 1, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo $this->_tpl_vars['form']['oplock_ts']['html']; ?>

<div class="crm-inline-edit-form">
  <div class="crm-inline-button">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </div>
  <?php if ($this->_tpl_vars['contactType'] == 'Individual'): ?>
    <?php if ($this->_tpl_vars['form']['prefix_id']): ?>
      <div class="crm-inline-edit-field">
        <?php echo $this->_tpl_vars['form']['prefix_id']['label']; ?>
<br/>
        <?php echo $this->_tpl_vars['form']['prefix_id']['html']; ?>

      </div>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['form']['formal_title']): ?>
      <div class="crm-inline-edit-field">
        <?php echo $this->_tpl_vars['form']['formal_title']['label']; ?>
<br/>
        <?php echo $this->_tpl_vars['form']['formal_title']['html']; ?>

      </div>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['form']['first_name']): ?>
      <div class="crm-inline-edit-field">
        <?php echo $this->_tpl_vars['form']['first_name']['label']; ?>
<br />
        <?php echo $this->_tpl_vars['form']['first_name']['html']; ?>

      </div>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['form']['middle_name']): ?>
      <div class="crm-inline-edit-field">
        <?php echo $this->_tpl_vars['form']['middle_name']['label']; ?>
<br />
        <?php echo $this->_tpl_vars['form']['middle_name']['html']; ?>

      </div>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['form']['last_name']): ?>
      <div class="crm-inline-edit-field">
        <?php echo $this->_tpl_vars['form']['last_name']['label']; ?>
<br />
        <?php echo $this->_tpl_vars['form']['last_name']['html']; ?>

      </div>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['form']['suffix_id']): ?>
      <div class="crm-inline-edit-field">
        <?php echo $this->_tpl_vars['form']['suffix_id']['label']; ?>
<br/>
        <?php echo $this->_tpl_vars['form']['suffix_id']['html']; ?>

      </div>
    <?php endif; ?>
  <?php elseif ($this->_tpl_vars['contactType'] == 'Organization'): ?>
    <div class="crm-inline-edit-field"><?php echo $this->_tpl_vars['form']['organization_name']['label']; ?>
&nbsp;
    <?php echo $this->_tpl_vars['form']['organization_name']['html']; ?>
</div>
  <?php elseif ($this->_tpl_vars['contactType'] == 'Household'): ?>
    <div class="crm-inline-edit-field"><?php echo $this->_tpl_vars['form']['household_name']['label']; ?>
&nbsp;
    <?php echo $this->_tpl_vars['form']['household_name']['html']; ?>
</div>
  <?php endif; ?>
</div>
<div class="clear"></div>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>