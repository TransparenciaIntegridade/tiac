<?php /* Smarty version 2.6.27, created on 2016-01-29 16:51:57
         compiled from CRM/Contact/Form/Task/Email.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Contact/Form/Task/Email.tpl', 1, false),array('block', 'ts', 'CRM/Contact/Form/Task/Email.tpl', 30, false),array('function', 'help', 'CRM/Contact/Form/Task/Email.tpl', 36, false),array('function', 'crmURL', 'CRM/Contact/Form/Task/Email.tpl', 116, false),array('modifier', 'crmAddClass', 'CRM/Contact/Form/Task/Email.tpl', 77, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><div class="crm-block crm-form-block crm-contactEmail-form-block">
<div class="crm-submit-buttons"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array('location' => 'top')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
<?php if ($this->_tpl_vars['suppressedEmails'] > 0): ?>
    <div class="status">
        <p><?php $this->_tag_stack[] = array('ts', array('count' => $this->_tpl_vars['suppressedEmails'],'plural' => 'Email will NOT be sent to %count contacts - (no email address on file, or communication preferences specify DO NOT EMAIL, or contact is deceased).')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Email will NOT be sent to %count contact - (no email address on file, or communication preferences specify DO NOT EMAIL, or contact is deceased).<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></p>
    </div>
<?php endif; ?>
<table class="form-layout-compressed">
    <tr class="crm-contactEmail-form-block-fromEmailAddress">
       <td class="label"><?php echo $this->_tpl_vars['form']['fromEmailAddress']['label']; ?>
</td>
       <td><?php echo $this->_tpl_vars['form']['fromEmailAddress']['html']; ?>
 <?php echo smarty_function_help(array('id' => "id-from_email",'file' => "CRM/Contact/Form/Task/Email.hlp",'isAdmin' => $this->_tpl_vars['isAdmin']), $this);?>
</td>
    </tr>
    <tr class="crm-contactEmail-form-block-recipient">
       <td class="label"><?php if ($this->_tpl_vars['single'] == false): ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Recipient(s)<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php else: ?><?php echo $this->_tpl_vars['form']['to']['label']; ?>
<?php endif; ?></td>
       <td>
         <?php echo $this->_tpl_vars['form']['to']['html']; ?>
<?php if ($this->_tpl_vars['noEmails'] == true): ?>&nbsp;&nbsp;<?php echo $this->_tpl_vars['form']['emailAddress']['html']; ?>
<?php endif; ?>
       </td>
    </tr>
    <tr class="crm-contactEmail-form-block-cc_id" <?php if (! $this->_tpl_vars['form']['cc_id']['value']): ?>style="display:none;"<?php endif; ?>>
      <td class="label"><?php echo $this->_tpl_vars['form']['cc_id']['label']; ?>
</td>
      <td>
        <?php echo $this->_tpl_vars['form']['cc_id']['html']; ?>

        <a class="crm-hover-button clear-cc-link" rel="cc_id" title="<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Clear<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" href="#"><span class="icon ui-icon-close"></span></a>
      </td>
    </tr>
    <tr class="crm-contactEmail-form-block-bcc_id" <?php if (! $this->_tpl_vars['form']['bcc_id']['value']): ?>style="display:none;"<?php endif; ?>>
      <td class="label"><?php echo $this->_tpl_vars['form']['bcc_id']['label']; ?>
</td>
      <td>
        <?php echo $this->_tpl_vars['form']['bcc_id']['html']; ?>

        <a class="crm-hover-button clear-cc-link" rel="bcc_id" title="<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Clear<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>" href="#"><span class="icon ui-icon-close"></span></a>
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <div>
          <a href="#" rel="cc_id" class="add-cc-link crm-hover-button" <?php if ($this->_tpl_vars['form']['cc_id']['value']): ?>style="display:none;"<?php endif; ?>><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Add CC<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>&nbsp;&nbsp;
          <a href="#" rel="bcc_id" class="add-cc-link crm-hover-button" <?php if ($this->_tpl_vars['form']['bcc_id']['value']): ?>style="display:none;"<?php endif; ?>><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Add BCC<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></a>
        </div>
      </td>
    </tr>

<?php if ($this->_tpl_vars['emailTask']): ?>
    <tr class="crm-contactEmail-form-block-template">
        <td class="label"><?php echo $this->_tpl_vars['form']['template']['label']; ?>
</td>
        <td><?php echo $this->_tpl_vars['form']['template']['html']; ?>
</td>
    </tr>
<?php endif; ?>
    <tr class="crm-contactEmail-form-block-subject">
       <td class="label"><?php echo $this->_tpl_vars['form']['subject']['label']; ?>
</td>
       <td>
         <?php echo ((is_array($_tmp=$this->_tpl_vars['form']['subject']['html'])) ? $this->_run_mod_handler('crmAddClass', true, $_tmp, 'huge') : smarty_modifier_crmAddClass($_tmp, 'huge')); ?>
&nbsp;
         <input class="crm-token-selector big" data-field="subject" />
         <?php echo smarty_function_help(array('id' => "id-token-subject",'tplFile' => $this->_tpl_vars['tplFile'],'isAdmin' => $this->_tpl_vars['isAdmin'],'file' => "CRM/Contact/Form/Task/Email.hlp"), $this);?>

       </td>
    </tr>
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Contact/Form/Task/EmailCommon.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="spacer"> </div>

<?php if ($this->_tpl_vars['single'] == false): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Contact/Form/Task.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['suppressedEmails'] > 0): ?>
   <?php $this->_tag_stack[] = array('ts', array('count' => $this->_tpl_vars['suppressedEmails'],'plural' => 'Email will NOT be sent to %count contacts.')); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Email will NOT be sent to %count contact.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php endif; ?>
<div class="crm-submit-buttons"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array('location' => 'bottom')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
</div>
<script type="text/javascript">

<?php echo '
CRM.$(function($) {
  var $form = $("form.'; ?>
<?php echo $this->_tpl_vars['form']['formClass']; ?>
<?php echo '");

  $(\'.add-cc-link\', $form).click(function(e) {
    e.preventDefault();
    var type = $(this).attr(\'rel\');
    $(this).hide();
    $(\'.crm-contactEmail-form-block-\'+type, $form).show();
  });

  $(\'.clear-cc-link\', $form).click(function(e) {
    e.preventDefault();
    var type = $(this).attr(\'rel\');
    $(\'.add-cc-link[rel=\'+type+\']\', $form).show();
    $(\'.crm-contactEmail-form-block-\'+type, $form).hide().find(\'input.crm-ajax-select\').select2(\'data\', []);
  });

  var sourceDataUrl = "'; ?>
<?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/ajax/checkemail','q' => 'id=1','h' => 0), $this);?>
<?php echo '";

  function emailSelect(el, prepopulate) {
    $(el, $form).data(\'api-entity\', \'contact\').css({width: \'40em\', \'max-width\': \'90%\'}).crmSelect2({
      minimumInputLength: 1,
      multiple: true,
      ajax: {
        url: sourceDataUrl,
        data: function(term) {
          return {
            name: term
          };
        },
        results: function(response) {
          return {
            results: response
          };
        }
      }
    }).select2(\'data\', prepopulate);
  }

  '; ?>

  var toContact = <?php if ($this->_tpl_vars['toContact']): ?><?php echo $this->_tpl_vars['toContact']; ?>
<?php else: ?>''<?php endif; ?>,
    ccContact = <?php if ($this->_tpl_vars['ccContact']): ?><?php echo $this->_tpl_vars['ccContact']; ?>
<?php else: ?>''<?php endif; ?>,
    bccContact = <?php if ($this->_tpl_vars['bccContact']): ?><?php echo $this->_tpl_vars['bccContact']; ?>
<?php else: ?>''<?php endif; ?>;
  <?php echo '
  emailSelect(\'#to\', toContact);
  emailSelect(\'#cc_id\', ccContact);
  emailSelect(\'#bcc_id\', bccContact);
});


</script>
'; ?>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>