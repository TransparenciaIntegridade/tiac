<?php /* Smarty version 2.6.27, created on 2016-01-27 12:25:38
         compiled from CRM/Contribute/Form/Contribution/ThankYou.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Contribute/Form/Contribution/ThankYou.tpl', 1, false),array('block', 'ts', 'CRM/Contribute/Form/Contribution/ThankYou.tpl', 59, false),array('block', 'crmRegion', 'CRM/Contribute/Form/Contribution/ThankYou.tpl', 137, false),array('modifier', 'crmMoney', 'CRM/Contribute/Form/Contribution/ThankYou.tpl', 107, false),array('modifier', 'crmDate', 'CRM/Contribute/Form/Contribution/ThankYou.tpl', 125, false),array('modifier', 'nl2br', 'CRM/Contribute/Form/Contribution/ThankYou.tpl', 260, false),array('modifier', 'truncate', 'CRM/Contribute/Form/Contribution/ThankYou.tpl', 300, false),array('function', 'crmURL', 'CRM/Contribute/Form/Contribution/ThankYou.tpl', 322, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php if ($this->_tpl_vars['action'] & 1024): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Contribute/Form/Contribution/PreviewHeader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/TrackingFields.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="crm-contribution-page-id-<?php echo $this->_tpl_vars['contributionPageID']; ?>
 crm-block crm-contribution-thankyou-form-block">
  <?php if ($this->_tpl_vars['thankyou_text']): ?>
    <div id="thankyou_text" class="crm-section thankyou_text-section">
      <?php echo $this->_tpl_vars['thankyou_text']; ?>

    </div>
  <?php endif; ?>

    <?php if ($this->_tpl_vars['friendText']): ?>
    <div id="tell-a-friend" class="crm-section friend_link-section">
      <a href="<?php echo $this->_tpl_vars['friendURL']; ?>
" title="<?php echo $this->_tpl_vars['friendText']; ?>
" class="button"><span>&raquo; <?php echo $this->_tpl_vars['friendText']; ?>
</span></a>
    </div><?php if (! $this->_tpl_vars['linkText']): ?><br /><br /><?php endif; ?>
  <?php endif; ?>
    <?php if ($this->_tpl_vars['linkText']): ?>
    <div class="crm-section create_pcp_link-section">
      <a href="<?php echo $this->_tpl_vars['linkTextUrl']; ?>
" title="<?php echo $this->_tpl_vars['linkText']; ?>
" class="button"><span>&raquo; <?php echo $this->_tpl_vars['linkText']; ?>
</span></a>
    </div><br /><br />
  <?php endif; ?>

  <div id="help">
        <?php if ($this->_tpl_vars['is_pay_later']): ?>
      <div class="bold"><?php echo $this->_tpl_vars['pay_later_receipt']; ?>
</div>
      <?php if ($this->_tpl_vars['is_email_receipt']): ?>
        <div>
          <?php if ($this->_tpl_vars['onBehalfEmail'] && ( $this->_tpl_vars['onBehalfEmail'] != $this->_tpl_vars['email'] )): ?>
            <?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['email'],'2' => $this->_tpl_vars['onBehalfEmail'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>An email confirmation with these payment instructions has been sent to %1 and to %2.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
          <?php else: ?>
            <?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['email'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>An email confirmation with these payment instructions has been sent to %1.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    <?php elseif ($this->_tpl_vars['contributeMode'] == 'notify' || ( $this->_tpl_vars['contributeMode'] == 'direct' && $this->_tpl_vars['is_recur'] )): ?>
      <div><?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['paymentProcessor']['name'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Your contribution has been submitted to %1 for processing. Please print this page for your records.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
        <?php if ($this->_tpl_vars['is_email_receipt']): ?>
      <div>
        <?php if ($this->_tpl_vars['onBehalfEmail'] && ( $this->_tpl_vars['onBehalfEmail'] != $this->_tpl_vars['email'] )): ?>
          <?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['email'],'2' => $this->_tpl_vars['onBehalfEmail'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>An email receipt will be sent to %1 and to %2 once the transaction is processed successfully.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        <?php else: ?>
          <?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['email'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>An email receipt will be sent to %1 once the transaction is processed successfully.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  <?php else: ?>
    <div><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Your transaction has been processed successfully. Please print this page for your records.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
      <?php if ($this->_tpl_vars['is_email_receipt']): ?>
        <div>
          <?php if ($this->_tpl_vars['onBehalfEmail'] && ( $this->_tpl_vars['onBehalfEmail'] != $this->_tpl_vars['email'] )): ?>
            <?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['email'],'2' => $this->_tpl_vars['onBehalfEmail'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>An email receipt has also been sent to %1 and to %2<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
          <?php else: ?>
            <?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['email'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>An email receipt has also been sent to %1<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
          <?php endif; ?>
        </div>
      <?php endif; ?>
  <?php endif; ?>
  </div>
  <div class="spacer"></div>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Contribute/Form/Contribution/MembershipBlock.tpl", 'smarty_include_vars' => array('context' => 'thankContribution')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <?php if ($this->_tpl_vars['amount'] >= 0 || $this->_tpl_vars['minimum_fee'] >= 0 || ( $this->_tpl_vars['priceSetID'] && $this->_tpl_vars['lineItem'] )): ?>
    <div class="crm-group amount_display-group">
      <?php if (! $this->_tpl_vars['useForMember']): ?>
        <div class="header-dark">
          <?php if (! $this->_tpl_vars['membershipBlock'] && $this->_tpl_vars['amount'] || ( $this->_tpl_vars['priceSetID'] && $this->_tpl_vars['lineItem'] )): ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Contribution Information<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php else: ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Membership Fee<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?>
        </div>
      <?php endif; ?>
      <div class="display-block">
        <?php if (! $this->_tpl_vars['useForMember']): ?>
          <?php if ($this->_tpl_vars['lineItem'] && $this->_tpl_vars['priceSetID']): ?>
            <?php if (! $this->_tpl_vars['amount']): ?><?php $this->assign('amount', 0); ?><?php endif; ?>
            <?php $this->assign('totalAmount', $this->_tpl_vars['amount']); ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Price/Page/LineItem.tpl", 'smarty_include_vars' => array('context' => 'Contribution')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          <?php elseif ($this->_tpl_vars['membership_amount']): ?>
            <?php echo $this->_tpl_vars['membership_name']; ?>
 <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Membership<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['membership_amount'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp) : smarty_modifier_crmMoney($_tmp)); ?>
</strong><br />
            <?php if ($this->_tpl_vars['amount']): ?>
              <?php if (! $this->_tpl_vars['is_separate_payment']): ?>
                <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Contribution Amount<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['amount'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp) : smarty_modifier_crmMoney($_tmp)); ?>
</strong><br />
              <?php else: ?>
                <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Additional Contribution<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['amount'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp) : smarty_modifier_crmMoney($_tmp)); ?>
</strong><br />
              <?php endif; ?>
            <?php endif; ?>
            <strong> -------------------------------------------</strong><br />
            <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Total<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['amount']+$this->_tpl_vars['membership_amount'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp) : smarty_modifier_crmMoney($_tmp)); ?>
</strong><br />
          <?php else: ?>
            <?php if ($this->_tpl_vars['totalTaxAmount']): ?>
              <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Tax Amount<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['totalTaxAmount'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp) : smarty_modifier_crmMoney($_tmp)); ?>
</strong><br />
            <?php endif; ?>
            <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Amount<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['amount'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp) : smarty_modifier_crmMoney($_tmp)); ?>
 <?php if ($this->_tpl_vars['amount_level']): ?> - <?php echo $this->_tpl_vars['amount_level']; ?>
 <?php endif; ?></strong><br />
          <?php endif; ?>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['receive_date']): ?>
          <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Date<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['receive_date'])) ? $this->_run_mod_handler('crmDate', true, $_tmp) : smarty_modifier_crmDate($_tmp)); ?>
</strong><br />
        <?php endif; ?>
        <?php if ($this->_tpl_vars['contributeMode'] != 'notify' && $this->_tpl_vars['is_monetary'] && ! $this->_tpl_vars['is_pay_later'] && $this->_tpl_vars['trxn_id']): ?>
          <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Transaction #<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo $this->_tpl_vars['trxn_id']; ?>
<br />
        <?php endif; ?>
        <?php if ($this->_tpl_vars['membership_trx_id']): ?>
          <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Membership Transaction #<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo $this->_tpl_vars['membership_trx_id']; ?>

        <?php endif; ?>

                <?php if ($this->_tpl_vars['is_recur']): ?>
          <?php if (! empty ( $this->_tpl_vars['auto_renew'] )): ?>             <?php $this->_tag_stack[] = array('crmRegion', array('name' => "contribution-thankyou-recur-membership")); $_block_repeat=true;smarty_block_crmRegion($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
              <br />
              <?php if ($this->_tpl_vars['frequency_interval'] > 1): ?>
                <strong><?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['frequency_interval'],'2' => $this->_tpl_vars['frequency_unit'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>This membership will be renewed automatically every %1 %2(s).<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></strong>
              <?php else: ?>
                <strong><?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['frequency_unit'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>This membership will be renewed automatically every %1.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></strong>
              <?php endif; ?>
              <div class="description crm-auto-renew-cancel-info">(<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>You will receive an email receipt which includes information about how to cancel the auto-renewal option.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>)</div>
            <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmRegion($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
          <?php else: ?>
            <?php $this->_tag_stack[] = array('crmRegion', array('name' => "contribution-thankyou-recur")); $_block_repeat=true;smarty_block_crmRegion($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
              <?php if ($this->_tpl_vars['installments'] > 1): ?>
                <?php if ($this->_tpl_vars['frequency_interval'] > 1): ?>
                  <p><strong><?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['frequency_interval'],'2' => $this->_tpl_vars['frequency_unit'],'3' => $this->_tpl_vars['installments'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>This recurring contribution will be automatically processed every %1 %2s for a total %3 installments (including this initial contribution).<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></strong></p>
                <?php else: ?>
                    <p><strong><?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['frequency_unit'],'2' => $this->_tpl_vars['installments'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>This recurring contribution will be automatically processed every %1 for a total %2 installments (including this initial contribution).<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></strong></p>
                  <?php endif; ?>
                <?php else: ?>
                  <?php if ($this->_tpl_vars['frequency_interval'] > 1): ?>
                    <p><strong><?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['frequency_interval'],'2' => $this->_tpl_vars['frequency_unit'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>This recurring contribution will be automatically processed every %1 %2s.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></strong></p>
                  <?php else: ?>
                    <p><strong><?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['frequency_unit'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>This recurring contribution will be automatically processed every %1.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></strong></p>
                  <?php endif; ?>
                <?php endif; ?>
                  <p>
                  <?php if ($this->_tpl_vars['is_email_receipt']): ?>
                    <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>You will receive an email receipt which includes information about how to update or cancel this recurring contribution.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                  <?php endif; ?>
                </p>
            <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmRegion($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
          <?php endif; ?>
        <?php endif; ?>

        <?php if ($this->_tpl_vars['is_pledge']): ?>
          <?php if ($this->_tpl_vars['pledge_frequency_interval'] > 1): ?>
            <p><strong><?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['pledge_frequency_interval'],'2' => $this->_tpl_vars['pledge_frequency_unit'],'3' => $this->_tpl_vars['pledge_installments'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>I pledge to contribute this amount every %1 %2s for %3 installments.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></strong></p>
          <?php else: ?>
            <p><strong><?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['pledge_frequency_interval'],'2' => $this->_tpl_vars['pledge_frequency_unit'],'3' => $this->_tpl_vars['pledge_installments'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>I pledge to contribute this amount every %2 for %3 installments.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></strong></p>
          <?php endif; ?>
          <p>
            <?php if ($this->_tpl_vars['is_pay_later']): ?>
              <?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['receiptFromEmail'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>We will record your initial pledge payment when we receive it from you. You will be able to modify or cancel future pledge payments at any time by logging in to your account or contacting us at %1.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
            <?php else: ?>
              <?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['receiptFromEmail'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Your initial pledge payment has been processed. You will be able to modify or cancel future pledge payments at any time by contacting us at %1.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['max_reminders']): ?>
              <?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['initial_reminder_day'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>We will send you a payment reminder %1 days prior to each scheduled payment date. The reminder will include a link to a page where you can make your payment online.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
            <?php endif; ?>
          </p>
        <?php endif; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['honor_block_is_active']): ?>
    <div class="crm-group honor_block-group">
      <div class="header-dark">
        <?php echo $this->_tpl_vars['soft_credit_type']; ?>

      </div>
      <div class="display-block">
       <div class="label-left crm-section honoree_profile-section">
          <strong><?php echo $this->_tpl_vars['honorName']; ?>
</strong></br>
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/UF/Form/Block.tpl", 'smarty_include_vars' => array('fields' => $this->_tpl_vars['honoreeProfileFields'],'prefix' => 'honor')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
      </div>
   </div>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['customPre']): ?>
    <fieldset class="label-left crm-profile-view">
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/UF/Form/Block.tpl", 'smarty_include_vars' => array('fields' => $this->_tpl_vars['customPre'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </fieldset>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['pcpBlock']): ?>
    <div class="crm-group pcp_display-group">
      <div class="header-dark">
        <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Contribution Honor Roll<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
      </div>
      <div class="display-block">
        <?php if ($this->_tpl_vars['pcp_display_in_roll']): ?>
          <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>List my contribution<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
          <?php if ($this->_tpl_vars['pcp_is_anonymous']): ?>
            <strong><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>anonymously<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>.</strong>
          <?php else: ?>
            <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>under the name<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <strong><?php echo $this->_tpl_vars['pcp_roll_nickname']; ?>
</strong><br/>
            <?php if ($this->_tpl_vars['pcp_personal_note']): ?>
              <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>With the personal note<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <strong><?php echo $this->_tpl_vars['pcp_personal_note']; ?>
</strong>
            <?php else: ?>
              <strong><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>With no personal note<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></strong>
            <?php endif; ?>
          <?php endif; ?>
        <?php else: ?>
          <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Don't list my contribution in the honor roll.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        <?php endif; ?>
        <br />
      </div>
    </div>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['onbehalfProfile']): ?>
    <div class="crm-group onBehalf_display-group label-left crm-profile-view">
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/UF/Form/Block.tpl", 'smarty_include_vars' => array('fields' => $this->_tpl_vars['onbehalfProfile'],'prefix' => 'onbehalf')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <div class="crm-section organization_email-section">
        <div class="label"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Organization Email<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
        <div class="content"><?php echo $this->_tpl_vars['onBehalfEmail']; ?>
</div>
        <div class="clear"></div>
       </div>
    </div>
  <?php endif; ?>

  <?php if (( $this->_tpl_vars['contributeMode'] != 'notify' && ( ! $this->_tpl_vars['is_pay_later'] || $this->_tpl_vars['isBillingAddressRequiredForPayLater'] ) && $this->_tpl_vars['is_monetary'] && ( $this->_tpl_vars['amount'] > 0 || $this->_tpl_vars['minimum_fee'] > 0 ) ) || $this->_tpl_vars['email']): ?>
    <?php if ($this->_tpl_vars['contributeMode'] != 'notify' && ( ! $this->_tpl_vars['is_pay_later'] || $this->_tpl_vars['isBillingAddressRequiredForPayLater'] ) && $this->_tpl_vars['is_monetary'] && ( $this->_tpl_vars['amount'] > 0 || $this->_tpl_vars['minimum_fee'] > 0 )): ?>
      <?php if ($this->_tpl_vars['billingName'] || $this->_tpl_vars['address']): ?>
        <div class="crm-group billing_name_address-group">
          <div class="header-dark">
            <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Billing Name and Address<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
          </div>
          <div class="crm-section no-label billing_name-section">
            <div class="content"><?php echo $this->_tpl_vars['billingName']; ?>
</div>
            <div class="clear"></div>
          </div>
          <div class="crm-section no-label billing_address-section">
            <div class="content"><?php echo ((is_array($_tmp=$this->_tpl_vars['address'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</div>
            <div class="clear"></div>
          </div>
        </div>
      <?php endif; ?>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['email']): ?>
      <div class="crm-group contributor_email-group">
        <div class="header-dark">
          <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Your Email<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        </div>
        <div class="crm-section no-label contributor_email-section">
          <div class="content"><?php echo $this->_tpl_vars['email']; ?>
</div>
          <div class="clear"></div>
        </div>
      </div>
    <?php endif; ?>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['contributeMode'] == 'direct' && ! $this->_tpl_vars['is_pay_later'] && $this->_tpl_vars['is_monetary'] && ( $this->_tpl_vars['amount'] > 0 || $this->_tpl_vars['minimum_fee'] > 0 )): ?>
    <?php $this->_tag_stack[] = array('crmRegion', array('name' => "contribution-thankyou-billing-block")); $_block_repeat=true;smarty_block_crmRegion($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
      <div class="crm-group credit_card-group">
        <div class="header-dark">
          <?php if ($this->_tpl_vars['paymentProcessor']['payment_type'] & 2): ?>
            <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Direct Debit Information<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
          <?php else: ?>
            <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Credit Card Information<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
          <?php endif; ?>
        </div>
        <?php if ($this->_tpl_vars['paymentProcessor']['payment_type'] & 2): ?>
          <div class="display-block">
            <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Account Holder<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo $this->_tpl_vars['account_holder']; ?>
<br />
            <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Bank Identification Number<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo $this->_tpl_vars['bank_identification_number']; ?>
<br />
            <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Bank Name<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo $this->_tpl_vars['bank_name']; ?>
<br />
            <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Bank Account Number<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo $this->_tpl_vars['bank_account_number']; ?>
<br />
          </div>
        <?php else: ?>
          <div class="crm-section no-label credit_card_details-section">
            <div class="content"><?php echo $this->_tpl_vars['credit_card_type']; ?>
</div>
            <div class="content"><?php echo $this->_tpl_vars['credit_card_number']; ?>
</div>
            <div class="content"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Expires<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['credit_card_exp_date'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 7, '') : smarty_modifier_truncate($_tmp, 7, '')))) ? $this->_run_mod_handler('crmDate', true, $_tmp) : smarty_modifier_crmDate($_tmp)); ?>
</div>
            <div class="clear"></div>
          </div>
        <?php endif; ?>
      </div>
    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmRegion($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
  <?php endif; ?>

  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Contribute/Form/Contribution/PremiumBlock.tpl", 'smarty_include_vars' => array('context' => 'thankContribution')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

  <?php if ($this->_tpl_vars['customPost']): ?>
    <fieldset class="label-left crm-profile-view">
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/UF/Form/Block.tpl", 'smarty_include_vars' => array('fields' => $this->_tpl_vars['customPost'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </fieldset>
  <?php endif; ?>

  <div id="thankyou_footer" class="contribution_thankyou_footer-section">
    <p>
      <?php echo $this->_tpl_vars['thankyou_footer']; ?>

    </p>
  </div>
  <?php if ($this->_tpl_vars['isShare']): ?>
    <?php ob_start(); ?><?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/contribute/transact','q' => ($this->_tpl_vars['qParams']),'a' => 1,'fe' => 1,'h' => 1), $this);?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('contributionUrl', ob_get_contents());ob_end_clean(); ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/SocialNetwork.tpl", 'smarty_include_vars' => array('url' => $this->_tpl_vars['contributionUrl'],'title' => $this->_tpl_vars['title'],'pageURL' => $this->_tpl_vars['contributionUrl'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php endif; ?>
</div>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>