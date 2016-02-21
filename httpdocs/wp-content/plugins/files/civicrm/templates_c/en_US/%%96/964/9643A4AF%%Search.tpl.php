<?php /* Smarty version 2.6.27, created on 2016-01-28 16:45:52
         compiled from CRM/Contribute/Form/Search.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Contribute/Form/Search.tpl', 1, false),array('block', 'ts', 'CRM/Contribute/Form/Search.tpl', 32, false),array('modifier', 'crmAddClass', 'CRM/Contribute/Form/Search.tpl', 38, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php $this->assign('showBlock', "'searchForm'"); ?>
<?php $this->assign('hideBlock', "'searchForm_show'"); ?>
<div class="crm-block crm-form-block crm-contribution-search-form-block">
  <div class="crm-accordion-wrapper crm-contribution_search_form-accordion <?php if ($this->_tpl_vars['rows']): ?>collapsed<?php endif; ?>">
      <div class="crm-accordion-header crm-master-accordion-header">
          <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Edit Search Criteria<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
       </div><!-- /.crm-accordion-header -->
      <div class="crm-accordion-body">
        <?php echo '<table class="form-layout"><tr><td class="font-size12pt" colspan="2">                    '; ?><?php echo $this->_tpl_vars['form']['sort_name']['label']; ?><?php echo '&nbsp;&nbsp;'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['form']['sort_name']['html'])) ? $this->_run_mod_handler('crmAddClass', true, $_tmp, 'twenty') : smarty_modifier_crmAddClass($_tmp, 'twenty')); ?><?php echo '&nbsp;&nbsp;&nbsp;'; ?><?php echo $this->_tpl_vars['form']['buttons']['html']; ?><?php echo '</td></tr><tr>'; ?><?php if ($this->_tpl_vars['form']['contact_tags']): ?><?php echo '<td><label>'; ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo 'Contributor Tag(s)'; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '</label>'; ?><?php echo $this->_tpl_vars['form']['contact_tags']['html']; ?><?php echo '</td>'; ?><?php else: ?><?php echo '<td>&nbsp;</td>'; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['form']['group']): ?><?php echo '<td><label>'; ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php echo 'Contributor Group(s)'; ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php echo '</label>'; ?><?php echo $this->_tpl_vars['form']['group']['html']; ?><?php echo '</td>'; ?><?php else: ?><?php echo '<td>&nbsp;</td>'; ?><?php endif; ?><?php echo '</tr>'; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Contribute/Form/Search/Common.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo '<tr><td colspan="2">'; ?><?php echo $this->_tpl_vars['form']['buttons']['html']; ?><?php echo '</td></tr></table>'; ?>

      </div><!-- /.crm-accordion-body -->
    </div><!-- /.crm-accordion-wrapper -->
</div><!-- /.crm-form-block -->
<?php if ($this->_tpl_vars['rowsEmpty'] || $this->_tpl_vars['rows']): ?>
<div class="crm-content-block">
<?php if ($this->_tpl_vars['rowsEmpty']): ?>
<div class="crm-results-block crm-results-block-empty">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Contribute/Form/Search/EmptyResults.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['rows']): ?>
    <div class="crm-results-block">
                    <div class="crm-search-tasks crm-event-search-tasks">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/searchResultTasks.tpl", 'smarty_include_vars' => array('context' => 'Contribution')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>

          <div id="contributionSearch" class="crm-search-results">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Contribute/Form/Selector.tpl", 'smarty_include_vars' => array('context' => 'Search')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </div>
        </div>
<?php endif; ?>

</div>
<?php endif; ?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>