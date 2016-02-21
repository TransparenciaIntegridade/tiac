<?php /* Smarty version 2.6.27, created on 2016-01-27 12:29:09
         compiled from string:%3C%21DOCTYPE+html+PUBLIC+%22-//W3C//DTD+XHTML+1.0+Transitional//EN%22+%22http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd%22%3E%0A%3Chtml+xmlns%3D%22http://www.w3.org/1999/xhtml%22%3E%0A%3Chead%3E%0A+%3Cmeta+http-equiv%3D%22Content-Type%22+content%3D%22text/html%3B+charset%3DUTF-8%22+/%3E%0A+%3Ctitle%3E%3C/title%3E%0A%3C/head%3E%0A%3Cbody%3E%0A%0A%7Bcapture+assign%3DheaderStyle%7Dcolspan%3D%222%22+style%3D%22text-align:+left%3B+padding:+4px%3B+border-bottom:+1px+solid+%23999%3B+background-color:+%23eee%3B%22%7B/capture%7D%0A%7Bcapture+assign%3DlabelStyle+%7Dstyle%3D%22padding:+4px%3B+border-bottom:+1px+solid+%23999%3B+background-color:+%23f7f7f7%3B%22%7B/capture%7D%0A%7Bcapture+assign%3DvalueStyle+%7Dstyle%3D%22padding:+4px%3B+border-bottom:+1px+solid+%23999%3B%22%7B/capture%7D%0A%0A%3Ccenter%3E%0A+%3Ctable+width%3D%22620%22+border%3D%220%22+cellpadding%3D%220%22+cellspacing%3D%220%22+id%3D%22crm-event_receipt%22+style%3D%22font-family:+Arial%2C+Verdana%2C+sans-serif%3B+text-align:+left%3B%22%3E%0A%0A++%3C%21--+BEGIN+HEADER+--%3E%0A++%3C%21--+You+can+add+table+row%28s%29+here+with+logo+or+other+header+elements+--%3E%0A++%3C%21--+END+HEADER+--%3E%0A%0A++%3C%21--+BEGIN+CONTENT+--%3E%0A%0A++%3Ctr%3E%0A+++%3Ctd%3E%0A++++%3Ctable+style%3D%22border:+1px+solid+%23999%3B+margin:+1em+0em+1em%3B+border-collapse:+collapse%3B+width:100%25%3B%22%3E%0A+++++%3Ctr%3E%0A++++++%3Ctd+%7B%24labelStyle%7D%3E%0A+++++++%7Bts%7DSubmitted+For%7B/ts%7D%0A++++++%3C/td%3E%0A++++++%3Ctd+%7B%24valueStyle%7D%3E%0A+++++++%7B%24displayName%7D%0A++++++%3C/td%3E%0A+++++%3C/tr%3E%0A+++++%3Ctr%3E%0A++++++%3Ctd+%7B%24labelStyle%7D%3E%0A+++++++%7Bts%7DDate%7B/ts%7D%0A++++++%3C/td%3E%0A++++++%3Ctd+%7B%24valueStyle%7D%3E%0A+++++++%7B%24currentDate%7D%0A++++++%3C/td%3E%0A+++++%3C/tr%3E%0A+++++%3Ctr%3E%0A++++++%3Ctd+%7B%24labelStyle%7D%3E%0A+++++++%7Bts%7DContact+Summary%7B/ts%7D%0A++++++%3C/td%3E%0A++++++%3Ctd+%7B%24valueStyle%7D%3E%0A+++++++%7B%24contactLink%7D%0A++++++%3C/td%3E%0A+++++%3C/tr%3E%0A%0A+++++%3Ctr%3E%0A++++++%3Cth+%7B%24headerStyle%7D%3E%0A+++++++%7B%24grouptitle%7D%0A++++++%3C/th%3E%0A+++++%3C/tr%3E%0A%0A+++++%7Bforeach+from%3D%24values+item%3Dvalue+key%3DvalueName%7D%0A++++++%3Ctr%3E%0A+++++++%3Ctd+%7B%24labelStyle%7D%3E%0A++++++++%7B%24valueName%7D%0A+++++++%3C/td%3E%0A+++++++%3Ctd+%7B%24valueStyle%7D%3E%0A++++++++%7B%24value%7D%0A+++++++%3C/td%3E%0A++++++%3C/tr%3E%0A+++++%7B/foreach%7D%0A++++%3C/table%3E%0A+++%3C/td%3E%0A++%3C/tr%3E%0A%0A+%3C/table%3E%0A%3C/center%3E%0A%0A%3C/body%3E%0A%3C/html%3E%0A */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'string:<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title></title>
</head>
<body>

{capture assign=headerStyle}colspan="2" style="text-align: left; padding: 4px; border-bottom: 1px solid #999; background-color: #eee;"{/capture}
{capture assign=labelStyle }style="padding: 4px; border-bottom: 1px solid #999; background-color: #f7f7f7;"{/capture}
{capture assign=valueStyle }style="padding: 4px; border-bottom: 1px solid #999;"{/capture}

<center>
 <table width="620" border="0" cellpadding="0" cellspacing="0" id="crm-event_receipt" style="font-family: Arial, Verdana, sans-serif; text-align: left;">

  <!-- BEGIN HEADER -->
  <!-- You can add table row(s) here with logo or other header elements -->
  <!-- END HEADER -->

  <!-- BEGIN CONTENT -->

  <tr>
   <td>
    <table style="border: 1px solid #999; margin: 1em 0em 1em; border-collapse: collapse; width:100%;">
     <tr>
      <td {$labelStyle}>
       {ts}Submitted For{/ts}
      </td>
      <td {$valueStyle}>
       {$displayName}
      </td>
     </tr>
     <tr>
      <td {$labelStyle}>
       {ts}Date{/ts}
      </td>
      <td {$valueStyle}>
       {$currentDate}
      </td>
     </tr>
     <tr>
      <td {$labelStyle}>
       {ts}Contact Summary{/ts}
      </td>
      <td {$valueStyle}>
       {$contactLink}
      </td>
     </tr>

     <tr>
      <th {$headerStyle}>
       {$grouptitle}
      </th>
     </tr>

     {foreach from=$values item=value key=valueName}
      <tr>
       <td {$labelStyle}>
        {$valueName}
       </td>
       <td {$valueStyle}>
        {$value}
       </td>
      </tr>
     {/foreach}
    </table>
   </td>
  </tr>

 </table>
</center>

</body>
</html>
', 1, false),array('block', 'ts', 'string:<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title></title>
</head>
<body>

{capture assign=headerStyle}colspan="2" style="text-align: left; padding: 4px; border-bottom: 1px solid #999; background-color: #eee;"{/capture}
{capture assign=labelStyle }style="padding: 4px; border-bottom: 1px solid #999; background-color: #f7f7f7;"{/capture}
{capture assign=valueStyle }style="padding: 4px; border-bottom: 1px solid #999;"{/capture}

<center>
 <table width="620" border="0" cellpadding="0" cellspacing="0" id="crm-event_receipt" style="font-family: Arial, Verdana, sans-serif; text-align: left;">

  <!-- BEGIN HEADER -->
  <!-- You can add table row(s) here with logo or other header elements -->
  <!-- END HEADER -->

  <!-- BEGIN CONTENT -->

  <tr>
   <td>
    <table style="border: 1px solid #999; margin: 1em 0em 1em; border-collapse: collapse; width:100%;">
     <tr>
      <td {$labelStyle}>
       {ts}Submitted For{/ts}
      </td>
      <td {$valueStyle}>
       {$displayName}
      </td>
     </tr>
     <tr>
      <td {$labelStyle}>
       {ts}Date{/ts}
      </td>
      <td {$valueStyle}>
       {$currentDate}
      </td>
     </tr>
     <tr>
      <td {$labelStyle}>
       {ts}Contact Summary{/ts}
      </td>
      <td {$valueStyle}>
       {$contactLink}
      </td>
     </tr>

     <tr>
      <th {$headerStyle}>
       {$grouptitle}
      </th>
     </tr>

     {foreach from=$values item=value key=valueName}
      <tr>
       <td {$labelStyle}>
        {$valueName}
       </td>
       <td {$valueStyle}>
        {$value}
       </td>
      </tr>
     {/foreach}
    </table>
   </td>
  </tr>

 </table>
</center>

</body>
</html>
', 27, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title></title>
</head>
<body>

<?php ob_start(); ?>colspan="2" style="text-align: left; padding: 4px; border-bottom: 1px solid #999; background-color: #eee;"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('headerStyle', ob_get_contents());ob_end_clean(); ?>
<?php ob_start(); ?>style="padding: 4px; border-bottom: 1px solid #999; background-color: #f7f7f7;"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('labelStyle', ob_get_contents());ob_end_clean(); ?>
<?php ob_start(); ?>style="padding: 4px; border-bottom: 1px solid #999;"<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('valueStyle', ob_get_contents());ob_end_clean(); ?>

<center>
 <table width="620" border="0" cellpadding="0" cellspacing="0" id="crm-event_receipt" style="font-family: Arial, Verdana, sans-serif; text-align: left;">

  <!-- BEGIN HEADER -->
  <!-- You can add table row(s) here with logo or other header elements -->
  <!-- END HEADER -->

  <!-- BEGIN CONTENT -->

  <tr>
   <td>
    <table style="border: 1px solid #999; margin: 1em 0em 1em; border-collapse: collapse; width:100%;">
     <tr>
      <td <?php echo $this->_tpl_vars['labelStyle']; ?>
>
       <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Submitted For<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
      </td>
      <td <?php echo $this->_tpl_vars['valueStyle']; ?>
>
       <?php echo $this->_tpl_vars['displayName']; ?>

      </td>
     </tr>
     <tr>
      <td <?php echo $this->_tpl_vars['labelStyle']; ?>
>
       <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Date<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
      </td>
      <td <?php echo $this->_tpl_vars['valueStyle']; ?>
>
       <?php echo $this->_tpl_vars['currentDate']; ?>

      </td>
     </tr>
     <tr>
      <td <?php echo $this->_tpl_vars['labelStyle']; ?>
>
       <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Contact Summary<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
      </td>
      <td <?php echo $this->_tpl_vars['valueStyle']; ?>
>
       <?php echo $this->_tpl_vars['contactLink']; ?>

      </td>
     </tr>

     <tr>
      <th <?php echo $this->_tpl_vars['headerStyle']; ?>
>
       <?php echo $this->_tpl_vars['grouptitle']; ?>

      </th>
     </tr>

     <?php $_from = $this->_tpl_vars['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['valueName'] => $this->_tpl_vars['value']):
?>
      <tr>
       <td <?php echo $this->_tpl_vars['labelStyle']; ?>
>
        <?php echo $this->_tpl_vars['valueName']; ?>

       </td>
       <td <?php echo $this->_tpl_vars['valueStyle']; ?>
>
        <?php echo $this->_tpl_vars['value']; ?>

       </td>
      </tr>
     <?php endforeach; endif; unset($_from); ?>
    </table>
   </td>
  </tr>

 </table>
</center>

</body>
</html>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>