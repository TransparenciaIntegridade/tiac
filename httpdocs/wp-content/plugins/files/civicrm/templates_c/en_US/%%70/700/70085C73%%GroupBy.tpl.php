<?php /* Smarty version 2.6.27, created on 2016-01-31 22:50:42
         compiled from CRM/Report/Form/Tabs/GroupBy.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Report/Form/Tabs/GroupBy.tpl', 1, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>  <div id="report-tab-group-by-elements" class="civireport-criteria">
    <?php $this->assign('count', '0'); ?>
    <table class="report-layout">
      <tr class="crm-report crm-report-criteria-groupby">
        <?php $_from = $this->_tpl_vars['groupByElements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dnc'] => $this->_tpl_vars['gbElem']):
?>
        <?php $this->assign('count', ($this->_tpl_vars['count']+1)); ?>
        <td width="25%" <?php if ($this->_tpl_vars['form']['fields'][$this->_tpl_vars['gbElem']]): ?>"<?php endif; ?>>
        <?php echo $this->_tpl_vars['form']['group_bys'][$this->_tpl_vars['gbElem']]['html']; ?>

        <?php if ($this->_tpl_vars['form']['group_bys_freq'][$this->_tpl_vars['gbElem']]['html']): ?>:<br>
          &nbsp;&nbsp;<?php echo $this->_tpl_vars['form']['group_bys_freq'][$this->_tpl_vars['gbElem']]['label']; ?>
&nbsp;<?php echo $this->_tpl_vars['form']['group_bys_freq'][$this->_tpl_vars['gbElem']]['html']; ?>

        <?php endif; ?>
        </td>
        <?php if (!($this->_tpl_vars['count'] % 4)): ?>
      </tr><tr class="crm-report crm-report-criteria-groupby">
        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
        <?php if (!(!($this->_tpl_vars['count'] % 4))): ?>
          <td colspan="4 - ($count % 4)"></td>
        <?php endif; ?>
      </tr>
    </table>
  </div>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>