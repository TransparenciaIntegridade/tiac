<?php /* Smarty version 2.6.27, created on 2016-02-11 14:12:40
         compiled from CRM/Member/Form/MembershipCommon.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Member/Form/MembershipCommon.tpl', 1, false),array('block', 'ts', 'CRM/Member/Form/MembershipCommon.tpl', 27, false),array('function', 'help', 'CRM/Member/Form/MembershipCommon.tpl', 6, false),array('modifier', 'crmAddClass', 'CRM/Member/Form/MembershipCommon.tpl', 45, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php if (! $this->_tpl_vars['membershipMode']): ?>
  <?php if ($this->_tpl_vars['accessContribution'] && $this->_tpl_vars['action'] != 2): ?>
    <table>
      <tr class="crm-<?php echo $this->_tpl_vars['formClass']; ?>
-form-block-contribution-contact">
        <td class="label"><?php echo $this->_tpl_vars['form']['is_different_contribution_contact']['label']; ?>
</td>
        <td><?php echo $this->_tpl_vars['form']['is_different_contribution_contact']['html']; ?>
&nbsp;&nbsp;<?php echo smarty_function_help(array('id' => "id-contribution_contact"), $this);?>
</td>
      </tr>
      <tr id="record-different-contact">
        <td>&nbsp;</td>
        <td>
          <table class="compressed">
            <tr class="crm-<?php echo $this->_tpl_vars['formClass']; ?>
-form-block-soft-credit-type">
              <td class="label"><?php echo $this->_tpl_vars['form']['soft_credit_type_id']['label']; ?>
</td>
              <td><?php echo $this->_tpl_vars['form']['soft_credit_type_id']['html']; ?>
</td>
            </tr>
            <tr class="crm-<?php echo $this->_tpl_vars['formClass']; ?>
-form-block-soft-credit-contact-id">
              <td class="label"><?php echo $this->_tpl_vars['form']['soft_credit_contact_id']['label']; ?>
</td>
              <td><?php echo $this->_tpl_vars['form']['soft_credit_contact_id']['html']; ?>
</td>
            </tr>
          </table>
        </td>
      </tr>

        <tr class="crm-<?php echo $this->_tpl_vars['formClass']; ?>
-form-block-total_amount">
          <td class="label"><?php echo $this->_tpl_vars['form']['total_amount']['label']; ?>
</td>
          <td><?php echo $this->_tpl_vars['form']['total_amount']['html']; ?>
<br />
            <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Membership payment amount. A contribution record will be created for this amount.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span><div class="totaltaxAmount"></div></td>
        </tr>
        <tr class="crm-<?php echo $this->_tpl_vars['formClass']; ?>
-form-block-receive_date">
          <td class="label"><?php echo $this->_tpl_vars['form']['receive_date']['label']; ?>
</td>
          <td><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/jcalendar.tpl", 'smarty_include_vars' => array('elementName' => 'receive_date')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
        </tr>
        <tr class="crm-<?php echo $this->_tpl_vars['formClass']; ?>
-form-block-financial_type_id">
          <td class="label"><?php echo $this->_tpl_vars['form']['financial_type_id']['label']; ?>
</td>
          <td><?php echo $this->_tpl_vars['form']['financial_type_id']['html']; ?>
<br/>
            <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Select the appropriate financial type for this payment.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
          </td>
        </tr>
        <tr class="crm-<?php echo $this->_tpl_vars['formClass']; ?>
-form-block-payment_instrument_id">
          <td class="label"><?php echo $this->_tpl_vars['form']['payment_instrument_id']['label']; ?>
<span class='marker'>*</span></td>
          <td><?php echo $this->_tpl_vars['form']['payment_instrument_id']['html']; ?>
 <?php echo smarty_function_help(array('id' => 'payment_instrument_id','file' => "CRM/Contribute/Page/Tab.hlp"), $this);?>
</td>
        </tr>
        <tr id="checkNumber" class="crm-<?php echo $this->_tpl_vars['formClass']; ?>
-form-block-check_number">
          <td class="label"><?php echo $this->_tpl_vars['form']['check_number']['label']; ?>
</td>
          <td><?php echo ((is_array($_tmp=$this->_tpl_vars['form']['check_number']['html'])) ? $this->_run_mod_handler('crmAddClass', true, $_tmp, 'six') : smarty_modifier_crmAddClass($_tmp, 'six')); ?>
</td>
        </tr>

        <?php if ($this->_tpl_vars['action'] != 2): ?>
          <tr class="crm-<?php echo $this->_tpl_vars['formClass']; ?>
-form-block-trxn_id">
            <td class="label"><?php echo $this->_tpl_vars['form']['trxn_id']['label']; ?>
</td>
            <td><?php echo $this->_tpl_vars['form']['trxn_id']['html']; ?>
</td>
          </tr>
        <?php endif; ?>
        <tr class="crm-<?php echo $this->_tpl_vars['formClass']; ?>
-form-block-contribution_status_id">
          <td class="label"><?php echo $this->_tpl_vars['form']['contribution_status_id']['label']; ?>
</td>
          <td><?php echo $this->_tpl_vars['form']['contribution_status_id']['html']; ?>
</td>
        </tr>
      </table>
    </fieldset></td></tr>
  <?php endif; ?>

<?php else: ?>
  <?php if (! empty ( $this->_tpl_vars['form']['auto_renew'] )): ?>
    <tr id="autoRenew" class="crm-<?php echo $this->_tpl_vars['formClass']; ?>
-form-block-auto_renew">
      <td class="label"> <?php echo $this->_tpl_vars['form']['auto_renew']['label']; ?>
 <?php echo smarty_function_help(array('id' => "id-auto_renew",'file' => "CRM/Member/Form/Membership.hlp",'action' => $this->_tpl_vars['action']), $this);?>
 </td>
      <td> <?php echo $this->_tpl_vars['form']['auto_renew']['html']; ?>
 </td>
    </tr>
  <?php endif; ?>
  <tr class="crm-member-<?php echo $this->_tpl_vars['formClass']; ?>
-form-block-financial_type_id">
    <td class="label"><?php echo $this->_tpl_vars['form']['financial_type_id']['label']; ?>
</td>
    <td><?php echo $this->_tpl_vars['form']['financial_type_id']['html']; ?>
<br/>
      <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Select the appropriate financial type for this payment.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></td>
  </tr>
  <tr class="crm-<?php echo $this->_tpl_vars['formClass']; ?>
-form-block-total_amount">
    <td class="label"><?php echo $this->_tpl_vars['form']['total_amount']['label']; ?>
</td>
    <td><?php echo $this->_tpl_vars['form']['total_amount']['html']; ?>
<br />
      <span class="description"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Membership payment amount.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span><div class="totaltaxAmount"></div>
    </td>
  </tr>
  <tr class="crm-membership-form-block-contribution-contact">
    <td class="label"><?php echo $this->_tpl_vars['form']['is_different_contribution_contact']['label']; ?>
</td>
    <td><?php echo $this->_tpl_vars['form']['is_different_contribution_contact']['html']; ?>
&nbsp;&nbsp;<?php echo smarty_function_help(array('id' => "id-contribution_contact"), $this);?>
</td>
  </tr>
  <tr id="record-different-contact">
    <td>&nbsp;</td>
    <td>
      <table class="compressed">
        <tr class="crm-membership-form-block-soft-credit-type">
                    <td class="label"><?php echo $this->_tpl_vars['form']['soft_credit_type_id']['label']; ?>
</td>
          <td><?php echo $this->_tpl_vars['form']['soft_credit_type_id']['html']; ?>
</td>
        </tr>
        <tr class="crm-membership-form-block-soft-credit-contact-id">
          <td class="label"><?php echo $this->_tpl_vars['form']['soft_credit_contact_id']['label']; ?>
</td>
          <td><?php echo $this->_tpl_vars['form']['soft_credit_contact_id']['html']; ?>
</td>
        </tr>
      </table>
    </td>
  </tr>
  <tr class="crm-membership-form-block-billing">
    <td colspan="2">
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'CRM/Core/BillingBlockWrapper.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </td>
  </tr>

  <div class="spacer"></div>
<?php endif; ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>