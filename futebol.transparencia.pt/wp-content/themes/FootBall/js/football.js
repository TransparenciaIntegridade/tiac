Cufon.replace('.header .logo .blogname', { fontFamily: 'HandelGothicEF', fontStyle:'italic', color: '-linear-gradient(#D4D4D4, #ffffff, #6B6B6B)', textShadow: '2px 2px #000000' });
Cufon.replace('.header .logo .blogdesc', { fontFamily: 'HandelGothicEF', fontSize:'10px', color: '#FFFFFF', textShadow: '1px 1px #000000' });
Cufon.replace('.navigation ul li a', { fontFamily: '', fontSize:'16px', hover:'true' });
Cufon.replace('.loginbox h3', { fontFamily: 'HandelGothicEF', fontStyle:'italic', fontSize:'24px', color: '-linear-gradient(#D4D4D4, #ffffff, #6B6B6B)', textShadow: '2px 1px #666666' });
Cufon.replace('.mainHeading h3', { fontFamily: 'HandelGothicEF', fontStyle:'italic', fontSize:'24px', color: '-linear-gradient(#D4D4D4, #ffffff, #6B6B6B)', textShadow: '1px 1px #000000' });
Cufon.replace('.widget .widget_heading h3', { fontFamily: 'HandelGothicEF', fontStyle:'italic', fontSize:'16px', color: '-linear-gradient(#D4D4D4, #ffffff, #6B6B6B)', textShadow: '1px 1px #666666' });
jQuery.noConflict();
jQuery (document).ready(function (){
	
	var hGContent = jQuery ('#content').height();	
	jQuery ("#rc2Cols").height(hGContent-170);
	//alert(hGContent);
	
})