<?php /* Smarty version 2.6.27, created on 2016-02-11 13:37:33
         compiled from CRM/Contribute/Form/ContributionCharts.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'crmScope', 'CRM/Contribute/Form/ContributionCharts.tpl', 1, false),array('block', 'ts', 'CRM/Contribute/Form/ContributionCharts.tpl', 36, false),)), $this); ?>
<?php $this->_tag_stack[] = array('crmScope', array('extensionKey' => "")); $_block_repeat=true;smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php if ($this->_tpl_vars['hasContributions']): ?>
<div id="chartData">
<table class="chart">
  <tr class="crm-contribution-form-block-open_flash_chart">
     <td>
         <?php if ($this->_tpl_vars['hasByMonthChart']): ?>
                          <div id="open_flash_chart_by_month"></div>
         <?php else: ?>
       <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>There were no contributions during the selected year.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
         <?php endif; ?>
     </td>
     <td>
                   <div id="open_flash_chart_by_year"></div>
     </td>
  </tr>
</table>
<div class="form-layout-compressed" >
<table >
      <td class="label"><?php echo $this->_tpl_vars['form']['select_year']['label']; ?>
</td><td><?php echo $this->_tpl_vars['form']['select_year']['html']; ?>
</td>
      <td class="label"><?php echo $this->_tpl_vars['form']['chart_type']['label']; ?>
</td><td><?php echo $this->_tpl_vars['form']['chart_type']['html']; ?>
</td>
</table>
</div>
<?php else: ?>
 <div class="messages status no-popup">
    <?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>There are no live contribution records to display.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
 </div>
<?php endif; ?>

<?php if ($this->_tpl_vars['hasOpenFlashChart']): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "CRM/common/openFlashChart.tpl", 'smarty_include_vars' => array('contriChart' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script type="text/javascript">

  CRM.$(function($) {
      buildChart( );
  });

  function buildChart( ) {
     var chartData = '; ?>
<?php echo $this->_tpl_vars['openFlashChartData']; ?>
<?php echo ';
     cj.each( chartData, function( chartID, chartValues ) {

   var xSize   = eval( "chartValues.size.xSize" );
   var ySize   = eval( "chartValues.size.ySize" );
   var divName = eval( "chartValues.divName" );

   createSWFObject( chartID, divName, xSize, ySize, \'loadData\' );
     });
  }

  function loadData( chartID ) {
     var allData = '; ?>
<?php echo $this->_tpl_vars['openFlashChartData']; ?>
<?php echo ';
     var data    = eval( "allData." + chartID + ".object" );
     return JSON.stringify( data );
  }

  function byMonthOnClick( barIndex ) {
     var allData = '; ?>
<?php echo $this->_tpl_vars['openFlashChartData']; ?>
<?php echo ';
     var url     = eval( "allData.by_month.on_click_urls.url_" + barIndex );
     if ( url ) window.location.href = url;
  }

  function byYearOnClick( barIndex ) {
     var allData = '; ?>
<?php echo $this->_tpl_vars['openFlashChartData']; ?>
<?php echo ';
     var url     = eval( "allData.by_year.on_click_urls.url_" + barIndex );
     if ( url ) window.location.href = url;
  }

 </script>
'; ?>

<?php endif; ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_crmScope($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>