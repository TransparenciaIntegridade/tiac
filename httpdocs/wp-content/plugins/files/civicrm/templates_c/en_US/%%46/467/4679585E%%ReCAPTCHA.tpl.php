<?php /* Smarty version 2.6.27, created on 2016-02-11 00:58:45
         compiled from CRM/common/ReCAPTCHA.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/common/ReCAPTCHA.tpl', 1, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php if ($this->_tpl_vars['recaptchaHTML']): ?>
<?php echo '
<script type="text/javascript">
var RecaptchaOptions = {'; ?>
<?php echo $this->_tpl_vars['recaptchaOptions']; ?>
<?php echo '};
</script>
'; ?>

<div class="crm-section recaptcha-section">
    <table class="form-layout-compressed">
        <tr>
          <td class="recaptcha_label">&nbsp;</td>
          <td><?php echo $this->_tpl_vars['recaptchaHTML']; ?>
</td>
       </tr>
    </table>
</div>
<?php endif; ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>