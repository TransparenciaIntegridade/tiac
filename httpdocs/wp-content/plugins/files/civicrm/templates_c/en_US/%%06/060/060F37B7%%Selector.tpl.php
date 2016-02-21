<?php /* Smarty version 2.6.27, created on 2016-02-11 00:17:09
         compiled from CRM/Activity/Selector/Selector.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Activity/Selector/Selector.tpl', 1, false),array('block', 'ts', 'CRM/Activity/Selector/Selector.tpl', 29, false),array('modifier', 'crmAddClass', 'CRM/Activity/Selector/Selector.tpl', 34, false),array('function', 'crmURL', 'CRM/Activity/Selector/Selector.tpl', 63, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><div class="crm-activity-selector-<?php echo $this->_tpl_vars['context']; ?>
">
  <div class="crm-accordion-wrapper crm-search_filters-accordion">
    <div class="crm-accordion-header">
    <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Filter by Activity Type<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
    </div><!-- /.crm-accordion-header -->
    <div class="crm-accordion-body">
      <div class="no-border form-layout-compressed activity-search-options">
          <div class="crm-contact-form-block-activity_type_filter_id crm-inline-edit-field">
            <?php echo $this->_tpl_vars['form']['activity_type_filter_id']['label']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['form']['activity_type_filter_id']['html'])) ? $this->_run_mod_handler('crmAddClass', true, $_tmp, 'big') : smarty_modifier_crmAddClass($_tmp, 'big')); ?>

          </div>
          <div class="crm-contact-form-block-activity_type_exclude_filter_id crm-inline-edit-field">
            <?php echo $this->_tpl_vars['form']['activity_type_exclude_filter_id']['label']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['form']['activity_type_exclude_filter_id']['html'])) ? $this->_run_mod_handler('crmAddClass', true, $_tmp, 'big') : smarty_modifier_crmAddClass($_tmp, 'big')); ?>

          </div>
      </div>
    </div><!-- /.crm-accordion-body -->
  </div><!-- /.crm-accordion-wrapper -->
  <table class="contact-activity-selector-<?php echo $this->_tpl_vars['context']; ?>
 crm-ajax-table" data-order='[[5,"desc"]]'>
    <thead>
    <tr>
      <th data-data="activity_type" class="crm-contact-activity-activity_type"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Type<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></th>
      <th data-data="subject" cell-class="crmf-subject crm-editable" class="crm-contact-activity_subject"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Subject<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></th>
      <th data-data="source_contact_name" class="crm-contact-activity-source_contact"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Added By<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></th>
      <th data-data="target_contact_name" data-orderable="false" class="crm-contact-activity-target_contact"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>With<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></th>
      <th data-data="assignee_contact_name" data-orderable="false" class="crm-contact-activity-assignee_contact"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Assigned<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></th>
      <th data-data="activity_date_time" class="crm-contact-activity-activity_date"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Date<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></th>
      <th data-data="status_id" cell-class="crmf-status_id crm-editable" cell-data-type="select" cell-data-refresh="true" class="crm-contact-activity-activity_status"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Status<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></th>
      <th data-data="links" data-orderable="false" class="crm-contact-activity-links">&nbsp;</th>
    </tr>
    </thead>
  </table>

  <?php echo '
    <script type="text/javascript">
      (function($) {
        var context = '; ?>
"<?php echo $this->_tpl_vars['context']; ?>
"<?php echo ';
        CRM.$(\'table.contact-activity-selector-\' + context).data({
          "ajax": {
            "url": '; ?>
'<?php echo CRM_Utils_System::crmURL(array('p' => "civicrm/ajax/contactactivity",'h' => 0,'q' => "snippet=4&context=".($this->_tpl_vars['context'])."&cid=".($this->_tpl_vars['contactId'])), $this);?>
'<?php echo ',
            "data": function (d) {
              d.activity_type_id = $(\'.crm-activity-selector-activity select#activity_type_filter_id\').val(),
              d.activity_type_exclude_id = $(\'.crm-activity-selector-activity select#activity_type_exclude_filter_id\').val()
            }
          }
        });
        $(function($) {
          $(\'.activity-search-options :input\').change(function(){
            CRM.$(\'.contact-activity-selector-activity\').DataTable().draw();
          });
        });
      })(CRM.$);
    </script>
  '; ?>

</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Case/Form/ActivityToCase.tpl", 'smarty_include_vars' => array('contactID' => $this->_tpl_vars['contactId'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>