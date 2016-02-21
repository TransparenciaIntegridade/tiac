<?php /* Smarty version 2.6.27, created on 2016-02-15 15:33:54
         compiled from CRM/Member/Form/MembershipView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Member/Form/MembershipView.tpl', 1, false),array('block', 'ts', 'CRM/Member/Form/MembershipView.tpl', 36, false),array('function', 'crmURL', 'CRM/Member/Form/MembershipView.tpl', 36, false),array('modifier', 'crmDate', 'CRM/Member/Form/MembershipView.tpl', 60, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><div class="crm-block crm-content-block crm-membership-view-form-block">
    <div class="crm-submit-buttons">
                <?php if (! ( $this->_tpl_vars['owner_contact_id'] && call_user_func ( array ( 'CRM_Core_Permission' , 'check' ) , 'edit memberships' ) ) && ( call_user_func ( array ( 'CRM_Core_Permission' , 'check' ) , "edit contributions of type ".($this->_tpl_vars['financialTypeId']) ) || $this->_tpl_vars['noACL'] )): ?>
      <?php $this->assign('urlParams', "reset=1&id=".($this->_tpl_vars['id'])."&cid=".($this->_tpl_vars['contact_id'])."&action=update&context=".($this->_tpl_vars['context'])); ?>
      <?php if (( $this->_tpl_vars['context'] == 'fulltext' || $this->_tpl_vars['context'] == 'search' ) && $this->_tpl_vars['searchKey']): ?>
      <?php $this->assign('urlParams', "reset=1&id=".($this->_tpl_vars['id'])."&cid=".($this->_tpl_vars['contact_id'])."&action=update&context=".($this->_tpl_vars['context'])."&key=".($this->_tpl_vars['searchKey'])); ?>
      <?php endif; ?>
            <a class="button" href="<?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/contact/view/membership','q' => $this->_tpl_vars['urlParams']), $this);?>
" accesskey="e" id="crm-membership-edit-button-top"><span><i class="crm-i fa-pencil"></i> <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Edit<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></a>
        <?php endif; ?>
        <?php if (! ( $this->_tpl_vars['owner_contact_id'] && call_user_func ( array ( 'CRM_Core_Permission' , 'check' ) , 'delete in CiviMember' ) ) && ( call_user_func ( array ( 'CRM_Core_Permission' , 'check' ) , "delete contributions of type ".($this->_tpl_vars['financialTypeId']) ) || $this->_tpl_vars['noACL'] )): ?>
            <?php $this->assign('urlParams', "reset=1&id=".($this->_tpl_vars['id'])."&cid=".($this->_tpl_vars['contact_id'])."&action=delete&context=".($this->_tpl_vars['context'])); ?>
      <?php if (( $this->_tpl_vars['context'] == 'fulltext' || $this->_tpl_vars['context'] == 'search' ) && $this->_tpl_vars['searchKey']): ?>
      <?php $this->assign('urlParams', "reset=1&id=".($this->_tpl_vars['id'])."&cid=".($this->_tpl_vars['contact_id'])."&action=delete&context=".($this->_tpl_vars['context'])."&key=".($this->_tpl_vars['searchKey'])); ?>
      <?php endif; ?>
            <a class="button" href="<?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/contact/view/membership','q' => $this->_tpl_vars['urlParams']), $this);?>
" id="crm-membership-delete-button-top"><span><i class="crm-i fa-trash"></i> <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Delete<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></a>
        <?php endif; ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array('location' => 'bottom')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
    <table class="crm-info-panel">
        <tr><td class="label"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Member<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td class="bold"><a href="<?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/contact/view','q' => "reset=1&cid=".($this->_tpl_vars['contact_id'])."&context=".($this->_tpl_vars['context'])), $this);?>
" title="<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>View contact summary<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>"><?php echo $this->_tpl_vars['displayName']; ?>
</td></tr>
        <?php if ($this->_tpl_vars['owner_display_name']): ?>
            <tr><td class="label"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>By Relationship<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><?php echo $this->_tpl_vars['relationship']; ?>
&nbsp;&nbsp;<a href="<?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/contact/view','q' => "reset=1&cid=".($this->_tpl_vars['owner_contact_id'])."&context=".($this->_tpl_vars['context'])), $this);?>
" title="<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>View primary member contact summary<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>"><?php echo $this->_tpl_vars['owner_display_name']; ?>
</a>&nbsp;</td></tr>
        <?php endif; ?>
        <tr><td class="label"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Membership Type<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><?php echo $this->_tpl_vars['membership_type']; ?>
</td></tr>
        <?php if ($this->_tpl_vars['has_related']): ?>
            <tr><td class="label"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Max related<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><?php echo $this->_tpl_vars['max_related']; ?>
</td></tr>
        <?php endif; ?>
        <tr><td class="label"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Status<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><?php echo $this->_tpl_vars['status']; ?>
</td></tr>
        <tr><td class="label"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Source<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><?php echo $this->_tpl_vars['source']; ?>
</td></tr>
  <?php if ($this->_tpl_vars['campaign']): ?><tr><td class="label"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Campaign<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><?php echo $this->_tpl_vars['campaign']; ?>
</td></tr><?php endif; ?>
        <tr><td class="label"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Member Since<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['join_date'])) ? $this->_run_mod_handler('crmDate', true, $_tmp) : smarty_modifier_crmDate($_tmp)); ?>
</td></tr>
        <tr><td class="label"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Start date<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['start_date'])) ? $this->_run_mod_handler('crmDate', true, $_tmp) : smarty_modifier_crmDate($_tmp)); ?>
</td></tr>
        <tr><td class="label"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>End date<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['end_date'])) ? $this->_run_mod_handler('crmDate', true, $_tmp) : smarty_modifier_crmDate($_tmp)); ?>
</td></tr>
        <tr><td class="label"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Auto-renew<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></td><td><?php echo $this->_tpl_vars['auto_renew']; ?>
</td></tr>
    </table>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Custom/Page/CustomDataView.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <?php if ($this->_tpl_vars['accessContribution'] && $this->_tpl_vars['rows']['0']['contribution_id']): ?>
        <div class="crm-accordion-wrapper">
              <div class="crm-accordion-header"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Related Contributions<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
              <div class="crm-accordion-body"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Contribute/Form/Selector.tpl", 'smarty_include_vars' => array('context' => 'Search')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
        </div>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['softCredit']): ?>
        <div class="crm-accordion-wrapper">
            <div class="crm-accordion-header"><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Related Soft Contributions<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
            <div class="crm-accordion-body"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Contribute/Page/ContributionSoft.tpl", 'smarty_include_vars' => array('context' => 'membership')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
        </div>
    <?php endif; ?>

    <?php if ($this->_tpl_vars['has_related']): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/Member/Form/MembershipRelated.tpl", 'smarty_include_vars' => array('context' => 'Search')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>

    <div class="crm-submit-buttons">
                <?php if (! ( $this->_tpl_vars['owner_contact_id'] && call_user_func ( array ( 'CRM_Core_Permission' , 'check' ) , 'edit memberships' ) ) && ( call_user_func ( array ( 'CRM_Core_Permission' , 'check' ) , "edit contributions of type ".($this->_tpl_vars['financialTypeId']) ) || $this->_tpl_vars['noACL'] )): ?>
          <?php $this->assign('urlParams', "reset=1&id=".($this->_tpl_vars['id'])."&cid=".($this->_tpl_vars['contact_id'])."&action=update&context=".($this->_tpl_vars['context'])); ?>
          <?php if (( $this->_tpl_vars['context'] == 'fulltext' || $this->_tpl_vars['context'] == 'search' ) && $this->_tpl_vars['searchKey']): ?>
            <?php $this->assign('urlParams', "reset=1&id=".($this->_tpl_vars['id'])."&cid=".($this->_tpl_vars['contact_id'])."&action=update&context=".($this->_tpl_vars['context'])."&key=".($this->_tpl_vars['searchKey'])); ?>
          <?php endif; ?>
          <a class="button" href="<?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/contact/view/membership','q' => $this->_tpl_vars['urlParams']), $this);?>
" accesskey="e" id="crm-membership-edit-button-bottom"><span><i class="crm-i fa-pencil"></i> <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Edit<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></a>
        <?php endif; ?>
        <?php if (! ( $this->_tpl_vars['owner_contact_id'] && call_user_func ( array ( 'CRM_Core_Permission' , 'check' ) , 'delete in CiviMember' ) ) && ( call_user_func ( array ( 'CRM_Core_Permission' , 'check' ) , "delete contributions of type ".($this->_tpl_vars['financialTypeId']) ) || $this->_tpl_vars['noACL'] )): ?>
          <?php $this->assign('urlParams', "reset=1&id=".($this->_tpl_vars['id'])."&cid=".($this->_tpl_vars['contact_id'])."&action=delete&context=".($this->_tpl_vars['context'])); ?>
          <?php if (( $this->_tpl_vars['context'] == 'fulltext' || $this->_tpl_vars['context'] == 'search' ) && $this->_tpl_vars['searchKey']): ?>
            <?php $this->assign('urlParams', "reset=1&id=".($this->_tpl_vars['id'])."&cid=".($this->_tpl_vars['contact_id'])."&action=delete&context=".($this->_tpl_vars['context'])."&key=".($this->_tpl_vars['searchKey'])); ?>
          <?php endif; ?>
          <a class="button" href="<?php echo CRM_Utils_System::crmURL(array('p' => 'civicrm/contact/view/membership','q' => $this->_tpl_vars['urlParams']), $this);?>
" id="crm-membership-delete-button-bottom"><span><i class="crm-i fa-trash"></i> <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Delete<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span></a>
        <?php endif; ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/formButtons.tpl", 'smarty_include_vars' => array('location' => 'bottom')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
</div>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>