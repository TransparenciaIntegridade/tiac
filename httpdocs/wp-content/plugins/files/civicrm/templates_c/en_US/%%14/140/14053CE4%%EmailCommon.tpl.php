<?php /* Smarty version 2.6.27, created on 2016-01-29 16:51:57
         compiled from CRM/Contact/Form/Task/EmailCommon.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Contact/Form/Task/EmailCommon.tpl', 1, false),array('block', 'ts', 'CRM/Contact/Form/Task/EmailCommon.tpl', 30, false),array('function', 'help', 'CRM/Contact/Form/Task/EmailCommon.tpl', 31, false),array('modifier', 'crmAddClass', 'CRM/Contact/Form/Task/EmailCommon.tpl', 73, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<div class="crm-accordion-wrapper crm-html_email-accordion ">
<div class="crm-accordion-header">
    <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>HTML Format<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
    <?php echo smarty_function_help(array('id' => "id-message-text",'file' => "CRM/Contact/Form/Task/Email.hlp"), $this);?>

</div><!-- /.crm-accordion-header -->
 <div class="crm-accordion-body">
  <div class="helpIcon" id="helphtml">
    <input class="crm-token-selector big" data-field="html_message" />
    <?php echo smarty_function_help(array('id' => "id-token-html",'tplFile' => $this->_tpl_vars['tplFile'],'isAdmin' => $this->_tpl_vars['isAdmin'],'editor' => $this->_tpl_vars['editor'],'file' => "CRM/Contact/Form/Task/Email.hlp"), $this);?>

  </div>
  <div class="clear"></div>
    <div class='html'>
  <?php if ($this->_tpl_vars['editor'] == 'textarea'): ?>
      <div class="help description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>NOTE: If you are composing HTML-formatted messages, you may want to enable a Rich Text (WYSIWYG) editor (Administer &raquo; Customize Data & Screens &raquo; Display Preferences).<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
  <?php endif; ?>
  <?php echo $this->_tpl_vars['form']['html_message']['html']; ?>
<br />
    </div>
  </div><!-- /.crm-accordion-body -->
</div><!-- /.crm-accordion-wrapper -->

<div class="crm-accordion-wrapper crm-plaint_text_email-accordion collapsed">
<div class="crm-accordion-header">
  <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Plain-Text Format<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
  </div><!-- /.crm-accordion-header -->
 <div class="crm-accordion-body">
   <div class="helpIcon" id="helptext">
     <input class="crm-token-selector big" data-field="text_message" />
     <?php echo smarty_function_help(array('id' => "id-token-text",'tplFile' => $this->_tpl_vars['tplFile'],'file' => "CRM/Contact/Form/Task/Email.hlp"), $this);?>

   </div>
    <div class='text'>
      <?php echo $this->_tpl_vars['form']['text_message']['html']; ?>
<br />
    </div>
  </div><!-- /.crm-accordion-body -->
</div><!-- /.crm-accordion-wrapper -->
<div id="editMessageDetails" class="section">
    <div id="updateDetails" class="section" >
  <?php echo $this->_tpl_vars['form']['updateTemplate']['html']; ?>
&nbsp;<?php echo $this->_tpl_vars['form']['updateTemplate']['label']; ?>

    </div>
    <div class="section">
  <?php echo $this->_tpl_vars['form']['saveTemplate']['html']; ?>
&nbsp;<?php echo $this->_tpl_vars['form']['saveTemplate']['label']; ?>

    </div>
</div>

<div id="saveDetails" class="section">
   <div class="label"><?php echo $this->_tpl_vars['form']['saveTemplateName']['label']; ?>
</div>
   <div class="content"><?php echo ((is_array($_tmp=$this->_tpl_vars['form']['saveTemplateName']['html'])) ? $this->_run_mod_handler('crmAddClass', true, $_tmp, 'huge') : smarty_modifier_crmAddClass($_tmp, 'huge')); ?>
</div>
</div>

<?php if (! $this->_tpl_vars['noAttach']): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Form/attachment.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Mailing/Form/InsertTokens.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>