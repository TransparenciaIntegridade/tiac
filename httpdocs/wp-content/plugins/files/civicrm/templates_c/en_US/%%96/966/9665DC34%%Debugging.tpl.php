<?php /* Smarty version 2.6.27, created on 2016-02-11 00:14:16
         compiled from CRM/Admin/Form/Setting/Debugging.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Admin/Form/Setting/Debugging.tpl', 1, false),array('block', 'ts', 'CRM/Admin/Form/Setting/Debugging.tpl', 28, false),array('function', 'docURL', 'CRM/Admin/Form/Setting/Debugging.tpl', 28, false),array('function', 'help', 'CRM/Admin/Form/Setting/Debugging.tpl', 36, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><div class="crm-block crm-form-block crm-debugging-form-block">
<div class="help">
    <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>In addition to the settings on this screen, there are a number of settings you can add to your sites's settings file (civicrm.settings.php) to provide additional debugging information.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <?php echo smarty_function_docURL(array('page' => 'Debugging for developers','resource' => 'wiki'), $this);?>

</div>
<div class="crm-submit-buttons"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array('location' => 'top')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
         <table class="form-layout">
            <?php if ($this->_tpl_vars['form']['userFrameworkLogging']): ?>
            <tr class="crm-debugging-form-block-userFrameworkLogging">
                <td class="label"><?php echo $this->_tpl_vars['form']['userFrameworkLogging']['label']; ?>
</td>
                <td><?php echo $this->_tpl_vars['form']['userFrameworkLogging']['html']; ?>
<br />
                <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Set this value to <strong>Yes</strong> if you want CiviCRM error/debugging messages to appear in the Drupal error logs<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <?php echo smarty_function_help(array('id' => 'userFrameworkLogging'), $this);?>
</span></td>
            </tr>
            <?php endif; ?>
            <tr class="crm-debugging-form-block-debug">
                <td class="label"><?php echo $this->_tpl_vars['form']['debug_enabled']['label']; ?>
</td>
                <td><?php echo $this->_tpl_vars['form']['debug_enabled']['html']; ?>
<br />
                <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><strong>This feature should NOT be enabled for production sites.</strong><br />Set this value to <strong>Yes</strong> if you want to use one of CiviCRM's debugging tools.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?> <?php echo smarty_function_help(array('id' => 'debug'), $this);?>
</span></td>
            </tr>
            <tr class="crm-debugging-form-block-backtrace">
                <td class="label"><?php echo $this->_tpl_vars['form']['backtrace']['label']; ?>
</td>
                <td><?php echo $this->_tpl_vars['form']['backtrace']['html']; ?>
<br />
                <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><strong>This feature should NOT be enabled for production sites.</strong><br />Set this value to <strong>Yes</strong> if you want to display a backtrace listing when a fatal error is encountered.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></td>
            </tr>
            <tr class="crm-debugging-form-block-fatalErrorHandler">
                <td class="label"><?php echo $this->_tpl_vars['form']['fatalErrorHandler']['label']; ?>
</td>
                <td><?php echo $this->_tpl_vars['form']['fatalErrorHandler']['html']; ?>
<br />
                <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Enter the path and class for a custom PHP error-handling function if you want to override built-in CiviCRM error handling for your site.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></td>
            </tr>
        </table>
        <div class="crm-submit-buttons"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array('location' => 'bottom')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
<div class="spacer"></div>
</div>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>