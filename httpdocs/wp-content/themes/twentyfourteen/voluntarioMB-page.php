<?php
/*
Template Name: VoluntarioMB
*/
?> 
<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>TIAC</title>
    <meta name="generator" content="Transparência e Integridade, Associação Cívica" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href="<?php echo get_site_url();?>/wp-content/themes/twentyfourteen/css/bootstrap.min.css" rel="stylesheet">
   <link href="<?php echo get_site_url();?>/wp-content/themes/twentyfourteen/css/style1.css" rel="stylesheet">
     <!-- <link href="<?php echo get_site_url();?>/wp-content/themes/wpbootstrap/css/demo.css" rel="stylesheet">-->
        <link href="<?php echo get_site_url();?>/wp-content/themes/twentyfourteen/css/common.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="<?php echo get_site_url();?>/wp-content/themes/twentyfourteen/css/styles.css" rel="stylesheet">
      <link href="<?php echo get_site_url();?>/wp-content/themes/twentyfourteen/css/style.css" rel="stylesheet">
      
        
          <!--<link href="<?php echo get_site_url();?>/wp-content/themes/twentyfourteen/js/modernizr.custom.72111.js" rel="stylesheet">
          -->
          <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <style type="text/css">



.entry-author-link,
.entry-permalink,
.entry-date,
.entry-meta {
    display: none;
}








.textarea1{
     /* background: rgba(255, 255, 255, 0.4) url(http://luismruiz.com/img/gemicon_message.png) no-repeat scroll 16px 16px; */
    width: 276px;
    height: 65px;
    border: 1px solid rgba(255,255,255,.6);
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box; 
    display:block;
    
    font-size:18px;
    color:#fff;
    padding-left:45px;
    padding-right:20px;
    padding-top:12px;
    margin-bottom:20px;
    overflow:hidden;
}



.form1 {
    margin-left:auto;
    margin-right:auto;
    width: 343px;
    height: 353px;
    padding:30px;
    border: 1px solid rgba(0,0,0,.2);
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    background: rgba(190, 190, 197, 0.5); 
    -moz-box-shadow: 0 0 13px 3px rgba(0,0,0,.5);
    -webkit-box-shadow: 0 0 13px 3px rgba(0,0,0,.5);
    box-shadow: 0 0 13px 3px rgba(0,0,0,.5);
    overflow: hidden; 
}



   
#button-blue{
    
    float:left;
    width: 100%;
    border: #fbfbfb solid 4px;
    cursor:pointer;
    background-color: #3498db;
    color:white;
    font-size:24px;
    padding-top:22px;
    padding-bottom:22px;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    transition: all 0.3s;
  margin-top:-4px;
  font-weight:700;
}

#button-blue:hover{
    background-color: rgba(0,0,0,0);
    color: #0493bd;
}
    
.submit:hover {
    color: #3498db;
}
    
.ease {
    width: 0px;
    height: 74px;
    background-color: #fbfbfb;
    -webkit-transition: .3s ease;
    -moz-transition: .3s ease;
    -o-transition: .3s ease;
    -ms-transition: .3s ease;
    transition: .3s ease;
}

.submit:hover .ease{
  width:100%;
  background-color:white;
}

@media only screen and (max-width: 580px) {
    #form-div{
        left: 3%;
        margin-right: 3%;
        width: 88%;
        margin-left: 0;
        padding-left: 3%;
        padding-right: 3%;
    }
}



.promos {
  padding-top: 100px;
  padding-bottom: 100px;
  clear: left; }
  .promos h2 {
    text-align: center;
    color: #3695d8; }
    .promos h2 strong {
     
      font-weight: normal; }
  .promos div.item {
    position: relative;
    float: left;
    width: 100%;
    min-height: 1px;
    padding-left: 15px;
    padding-right: 15px;
    position: relative;
    min-height: 1px;
    padding-left: 15px;
    padding-right: 15px;
    position: relative;
    min-height: 1px;
    padding-left: 15px;
    padding-right: 15px;
    text-align: center;
    padding-left: 80px;
    padding-right: 80px;
    margin-bottom: 30px; }
    @media (min-width: 768px) {
      .promos div.item {
        float: left;
        width: 50%; } }
    @media (min-width: 992px) {
      .promos div.item {
        float: left;
        width: 25%; } }
    @media (min-width: 992px) {
      .promos div.item {
        padding-left: 30px;
        padding-right: 30px;
        margin-bottom: 0px; } }
  .promos h3 {
    font-size: 18px;

    margin-top: 20px; }
    @media (min-width: 992px) {
      .promos h3 {
        height: 60px; } }
  @media (min-width: 992px) {
    .promos p {
      height: 110px; }
      .promos p.tall {
        height: 190px; } }


button, a.button {
    background-color: #9dba5a;;
    border-radius: 3px;
    
    color: #FFF;
    padding: 5px 10px 5px 10px;
    text-transform: uppercase;
    font-size: 16px;
    display: inline-block;
    cursor: pointer;
    text-align: center;
}


.btn-primary_donativo {
    color: #fff;
    background-color: #ffa500;
    border-color: #357ebd;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
.btn-circle.btn-lg {
  width: 50px;
  height: 50px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 25px;
}
.btn-circle.btn-xl {
    /*margin-left: 35%;*/
  width: 90px;
  height: 90px;
  padding: 30px 16px;
  font-size: 24px;
  line-height: 1.33;
  border-radius: 55px;
}





.row li {
  /*width: 33.3%;
  float: left;*/
}

img {
  border: 0 none;
  display: inline-block;
  height: auto;
  max-width: 100%;
  vertical-align: middle;
}

.grow { transition: all .2s ease-in-out; }
.grow:hover { transform: scale(1.5); }



.lead{
margin-left: 5%;
margin-right: 5%;
text-align: justify;

}

.head{
 
margin-left: 5%;
text-align: justify;
font-size:2.4rem;

}


/* ----- Image grids ----- */
ul.rig {
  list-style: none;
  font-size: 0px;
  margin-left: -2.5%; /* should match li left margin */
}
ul.rig li {
  display: inline-block;
  padding: 10px;
  margin: 0 0 2.5% 2.5%;
  background: #fff;
  border: 1px solid #ddd;
  font-size: 16px;
  font-size: 1rem;
  vertical-align: top;
  box-shadow: 0 0 5px #ddd;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
}
ul.rig li img {
  max-width: 100%;
  height: auto;
  margin: 0 0 10px;
}
ul.rig li h3 {
  margin: 0 0 5px;
}
ul.rig li p {
  font-size: 1.2em;
  line-height: 1.5em;
  color: #999;
}
/* class for 2 columns */
ul.rig.columns-2 li {
  width: 47.5%; /* this value + 2.5 should = 50% */
  height:410px; 
}
/* class for 3 columns */
ul.rig.columns-3 li {
  width: 30.83%; /* this value + 2.5 should = 33% */
}
/* class for 4 columns */
ul.rig.columns-4 li {
  width: 22.5%; /* this value + 2.5 should = 25% */
  height:340px; 
}

@media (max-width: 1199px) {
  .container {
    width: auto;
    padding: 0 10px;
  }
}

@media (max-width: 1199px) {
  .container {
    display: block;
    margin-left: 5%;
  }
  }

@media (max-width: 480px) {
  ul.grid-nav li {
    display: block;
    margin: 0 0 5px;
  }
  ul.grid-nav li a {
    display: block;
  }
  ul.rig {
    margin-left: 0;
  }
  ul.rig li {
    width: 100% !important; /* over-ride all li styles */
    margin: 0 0 20px;
  }
}


@media only screen and (max-width: 768px) {
h5{
font-size: 1.2rem;

}
}


.list
{
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
 
    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
}
    .list__item
    {
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    }

    
@media only screen and (max-width: 991px) {
.mapa, .inf_contactos{
text-align: center;

}
}
.social-links {
    text-align:center;
}

.social-links a{
    display: inline-block;
    width:100px;
    height: 100px;
    border: 2px solid #909090;
    border-radius: 90px;
    margin-right: 15px;
   background-color: #428bca;

}
.social-links a i{
    padding: 22px 11px;
    font-size: 75px;
    color: #fff;
}

/*  SECTIONS  */
.section {
  clear: both;
  padding: 0px;
  margin: 0px;
}

/*  COLUMN SETUP  */
.col {
  display: block;
  float:left;
  margin: 1% 0 1% 1.6%;
}
.col:first-child { margin-left: 0; }

/*  GROUPING  */
.group:before,
.group:after { content:""; display:table; }
.group:after { clear:both;}
.group { zoom:1; /* For IE 6/7 */ }
/*  GRID OF FOUR  */
.span_4_of_4 {
  width: 100%;
}
.span_3_of_4 {
  width: 74.6%;
}
.span_2_of_4 {
  width: 49.2%;
}
.span_1_of_4 {
  width: 23.8%;
}

/*  GO FULL WIDTH BELOW 480 PIXELS */
@media only screen and (max-width: 480px) {
  .col {  margin: 1% 0 1% 0%; }
  .span_1_of_4, .span_2_of_4, .span_3_of_4, .span_4_of_4 { width: 100%; }
}





a#example
{
 background: #444;
 border: 2px solid #444;
 padding: 5px 5px 5px 5px;
 font-family: arial, sans-serif;
 font-size: 12px;
 font-weight: bold;
 color: #fff; 
}
#example_obj
{
 background: #444;
 border: 2px solid #444;
 padding: 5px 5px 5px 5px;
 font-family: arial, sans-serif;
 font-size: 12px;
 font-weight: bold;
 color: #fff;
 display: none;
}



.carousel-caption {
    background: rgba(0, 0, 0, 0.35);
}
.carousel-caption {
    top: 0;
    bottom: auto;

}



 /*import font awesome css icon library*/
           /* @import url("https://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css");*/
input, select, textarea {
                background: none repeat scroll 0 0 #3695d8;
                border: 1px solid #CCC;
                color: #5e5e5e;
                display: block;
                font-family: arial, sans-serif;
                font-size: inherit;
                padding: 10px;
                /*width: 100%;*/
                box-sizing: border-box;
                font-size: 16px;
                margin: 0;
                height: 40px;
            }
            
            #searchtext {
                overflow: hidden;
            }
            
            a.search-submit-button {
                background: none repeat scroll 0 0 #fafafa;
                border-bottom: 1px solid #eeeeee;
                border-right: 1px solid #eeeeee;
                border-top: 1px solid #eeeeee;
                color: #5e5e5e !important;
                display: block;
                float: right;
                font-family: inherit;
                font-size: 20px;
                padding: 8px 10px;
                text-align: center;
                width: 45px;
                box-sizing: border-box;
                height: 40px;
            }
            
            #form-container {
                /* width: 60%; */
            }
            



    
  
  

@media (min-width: 992px){

  .carousel-controls {
  background-color: rgba(0, 0, 0, 0.8);
  padding-top: 10px;
  padding-bottom: 10px;
  z-index: 2;
}
}


@media (min-width: 1200px){
div.form-container {
  /*background-color: rgba(0, 0, 0, 0.8);
  padding-top: 10px;
  padding-bottom: 10px;
  z-index: 2;*/

  margin-top: 30px;
}
}


@media (max-width: 991px){
div.form-container {
  /*background-color: rgba(0, 0, 0, 0.8);
  padding-top: 10px;
  padding-bottom: 10px;
  z-index: 2;*/

  display: none;
}
}

@media (min-width: 991px) and (max-width: 1200px){
div.form-container {
  /*background-color: rgba(0, 0, 0, 0.8);
  padding-top: 10px;
  padding-bottom: 10px;
  z-index: 2;*/

  margin-top: 35px;
}
}


@media (min-width: 992px) {
.input-group {
  position: relative;
 
  margin-top: 10px;
}

}






@media (min-width: 992px) and (max-width: 1200px){
.nav>li>a {
  position: relative;
  display: block;
  padding: 15px 5px;
  margin-top: 10px;
  font-size: 1.2rem;
  margin-top: 0px;
}

}

@media (min-width: 1200px) and (max-width: 1319px){
.nav>li>a {
  position: relative;
  display: block;
  padding: 15px 5px;
 
}

}
@media (min-width: 1320px) {
.nav>li>a {
  position: relative;
  display: block;
  padding: 15px 15px;
  font-size: 1.5rem;
 
}

}

@media (min-width: 768px) and (max-width: 991px){
.nav>li>a {
  position: relative;
  display: block;
  padding: 15px 5px;
  margin-top: 0px;
  font-size: 0.8rem;
}

}
@media (min-width: 768px) and (max-width: 991px){
.input-group {
  position: relative;
 
  margin-top: 10px;
}

}


@media (min-width: 768px){
    .navbar-nav{
        margin: 0 auto;
        display: table;
        table-layout: fixed;
        float:none;
    }
}



body {
  /*padding-top: 40px; // same as header height*/
}


@media only screen and (min-width: 840px) {
  .hidden-desktop{
   display: none;
   }
}


@media only screen and (min-width: 840px) {
  .hidden-desktop{
   display: none;
   }
}


.verticalLine {
    border-left: thick solid #CCC;
    border-right: thick solid #CCC;
}

.scoopit-embed-post {
    width: auto !important;
}

.tales {
  width: 100%;
}
.carousel-inner{
  width:100%;
  max-height: 800px !important;
}


.imgHolder{
    display:inline-block;
    background:#000;
}
.item-fade{
    vertical-align:top;
    opacity: 1;
    transition: opacity .25s ease-in-out;
    -moz-transition: opacity .25s ease-in-out;
    -webkit-transition: opacity .25s ease-in-out;
}
.opacidade{
    opacity:0.3;
     transition: opacity .25s ease-in-out;
    -moz-transition: opacity .25s ease-in-out;
    -webkit-transition: opacity .25s ease-in-out;

}
.sem_opacidade{
    opacity:100%;
}
.teste
{

/*background-color: #CCC;*/
  opacity:100%;

}

.navbar-nav>li>.dropdown-menu {
  /*margin-top: 9px;*/
  border-top-right-radius: 0;
  border-top-left-radius: 0;

}


.dropdown-menu > li > a {
  border-bottom: 1px solid #cacaca;
  padding: 0 0 6px;
  margin: 0 25px;
  color: #878787;
  font-size: 14px;
margin-top: 8px;
}




    </style>


<!--FOOTER-->

<style type="text/css">

      @media (max-width: 767px) {
        #footer {
          margin-left: -20px;
          margin-right: -20px;
          padding-left: 20px;
          padding-right: 20px;
          text-align: center;
          padding-bottom: 10px;

        }
      }

       @media (max-width: 900px) {
        h3.titulo_ferramentas {
          margin-left: -29px;
        }
      }

      section#connect {
  padding-top: 20px;
  padding-bottom: 40px;
  background-color: #cccccc;
  clear: left;
}


@media (min-width: 992px){
section#connect form {
  text-align: center;
}


}

section#connect .container > div input[type=text] {
  float: left;
  padding: 5px;
  /*width: 60%;
  margin-left: auto;
  margin-right: auto;*/
}

input[type=text] {
  /*float: left;*/
  width: 160px;
  height: 30px;
  margin-right: 10px;
  margin-bottom: 10px;
  margin-top: 0;
  padding: 3px;
  border: 1px solid #878787;
  border-radius: 3px;
  color: #555;
  background: #FFF;
  
  font-size: 14px;
}
button, input, select, textarea {
  font-family: inherit;
  font-size: inherit;
  line-height: inherit;
}


section#connect .container > div button {
  padding-top: 3px;
  padding-bottom: 3px;
  width: 30%;
  margin-left: 5px;
  margin-top: 3px;
}

button {
  display: inline-block;
  border-radius: 3px;
  margin-left: auto;
  margin-right: auto;
  padding: 3px 10px 3px 10px;
  border: 0;
  text-transform: uppercase;
  color: #FFF;
  border-radius: 3px;
 
  background-color: #3695d8;
}

input[type=text] {
  /*float: left;*/
  width: 160px;
  height: 30px;
  margin-right: 10px;
  margin-bottom: 10px;
  margin-top: 0px;
  padding: 3px;
  border: 1px solid #878787;
  border-radius: 3px;
  color: #555;
  background: #FFF;
  
  font-size: 1.2rem;
}

.subscribeMe{
  float: left;
  width: 100px;
  height: 30px;
  /*margin-right: 10px;*/
  margin-bottom: 10px;
  margin-top: 5px;
  padding: 3px;
  border: 1px solid #878787;
  border-radius: 3px;
  color: #555;
  background: #FFF;

  
  font-size: 0.8rem;
}
footer div.container div ul {
  margin-left: 0;
  margin-top: 5px;
  padding-left: 0;
  font-size: 12px;
  line-height: 14px;
  list-style-type: none;
}

hr {
    width: 96%;
    color: #FFFF00;
    height: 1px;F
}


#line {
    float: left;
    width: 731px;
    height: 10px;
}

.page .headline {
    display: none;
}

 .page.page-id-7625 #masthead,
.page.page-id-7625 #footer-area {
  display: none;
}


</style>



<!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
<script type="text/javascript">
    window.cookieconsent_options = {"message":"Este site utiliza cookies para assegurar-lhe a melhor experiência de navegação no nosso site.","dismiss":"Entendi!","learnMore":"Saber mais","link":"https://transparencia.pt/politica-de-privacidade/","theme":"dark-bottom"};
</script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.9/cookieconsent.min.js"></script>
<!-- End Cookie Consent plugin -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-72358457-1', 'auto');
  ga('send', 'pageview');

</script>

  </head>
  <body >

    




<nav id="primary-navbar" class="navbar navbar-default navbar-fixed-top" data-backdrop="#primary-navbar-backdrop">
   <div class="a" style="background-color:#3695d8;width:100%;height: 28px;">




         
       
        <div class="container">
          
    
          <span style="border: 1px solid rgba(0, 0, 0, 0.2);
  border-width: 0 1px;
  padding: 2px 25px 2px;">

          
            <?php     
// Saudações     
/*if(date('G') >= 0 && date('G') < 11) {     
echo 'BOM DIA!<a href="//transparencia.pt/wp-admin/">INICIA SESSÂO</a>';     
} 
else if(date('G') >= 11 && date('G') < 18)
{     */
//echo 'BOA TARDE!';     
echo '<a href="//transparencia.pt/wp-admin/"><i style="color:#000000"><strong>INICIAR SESSÂO</strong></i></a>';     
//}  
//else{
//echo 'BOA NOITE!';  

//}   
?>
<!-- -->

</span>

          <div class="rw-words rw-words-1" >


            <span style="color:#fff"><a href="//transparencia.pt/novo-registo-associado/" style="color:#fff">JUNTA-TE A NÓS</a></span>
            <span style="color:#fff"><a href="//transparencia.pt/novo-registo-associado/" style="color:#fff">JUNTA-TE A NÓS</a></span>
            <span style="color:#fff"><a href="//transparencia.pt/novo-registo-associado/" style="color:#fff">JUNTA-TE A NÓS</a></span>
            <span style="color:#fff"><a href="//transparencia.pt/novo-registo-associado/" style="color:#fff">JUNTA-TE A NÓS</a></span>
            <span style="color:#fff"><a href="//transparencia.pt/novo-registo-associado/" style="color:#fff">JUNTA-TE A NÓS</a></span>
            <span style="color:#fff"><a href="//transparencia.pt/novo-registo-associado/" style="color:#fff">JUNTA-TE A NÓS</a></span>
            
          </div>


<p class="navbar-social navbar-right navbar-collapse collapse" style="  border: 1px solid rgba(0, 0, 0, 0.2);
  border-width: 0 1px;
  padding: 2px 15px 2px;" >
        <a href="https://www.facebook.com/transparenciapt" target="_blank"><i class="fa fa-facebook-square" style="font-size:1.5em;color:#FFFAFA; vertical-align: text-top;"></i></a>
        <a href="https://twitter.com/transparenciapt" target="_blank"><i class="fa fa-twitter-square" style="font-size:1.5em;color:#FFFAFA; vertical-align: text-top;"></i></a>
        <a href="https://pt.linkedin.com/company/transparencia-e-integridade-associacao-civica" target="_blank"><i class="fa fa-linkedin-square" style="font-size:1.5em;color:#FFFAFA; vertical-align: text-top;"></i></a>
        <a href="https://www.youtube.com/user/transparenciapt" target="_blank"><i class="fa fa-youtube-square" style="font-size:1.5em;color:#FFFAFA; vertical-align: text-top;"></i></a>
      </p>



   </div>
   
      </div>
      
      <div class="container">
        <div class="navbar-header">
          <button id="primary-navbar-toggle" type="button" class="navbar-toggle labeled collapsed" data-toggle="collapse" data-parent="#primary-navbar" data-target="#primary-navbar .navbar-main" aria-expanded="false" aria-controls="navbar">
            <span class="club-sandwich"></span>
            <label>MENU</label>
          </button>
          <!--<button id="primary-navbar-toggle-search" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-parent="#primary-navbar" data-target="#primary-navbar .navbar-search" aria-expaded="false" aria-controls="navbar-search" aria-expanded="false">
            <span class="sr-only">Toggle Search</span>
            <span class="glyphicon glyphicon-search"></span>
          </button>-->
          <a class="navbar-brand" href="/" ><img alt="" src="https://transparencia.pt/wp-content/themes/twentyfourteen/assets/img/logoRodape.png" width="200" height="60" style="margin-top:-18px"></a>
        </div>
        <ul class="nav navbar-main navbar-nav navbar-collapse collapse" data-toggler="#primary-navbar-toggle" aria-expanded="false" style="height: 1px;">
          <!--<li class="active"><a href="/">Home</a></li>-->
          <li class="dropdown">
            <a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true" onMouseOver="this.style.color='#3695d8'"
   onMouseOut="this.style.color='#999'">QUEM SOMOS<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
              <li><a href="<?php echo get_site_url();?>/sobre" onMouseOver="this.style.color='#3695d8'"
   onMouseOut="this.style.color='#999'">Sobre Nós</a></li>
              <li><a href="<?php echo get_site_url();?>/sobre#organizacao" onMouseOver="this.style.color='#3695d8'"
   onMouseOut="this.style.color='#999'">Organização</a></li>
              <li><a href="<?php echo get_site_url();?>/sobre#contas" onMouseOver="this.style.color='#3695d8'"
   onMouseOut="this.style.color='#999'">Prestação de Contas</a></li>
              <li><a href="<?php echo get_site_url();?>/sobre#estatutos" onMouseOver="this.style.color='#3695d8'"
   onMouseOut="this.style.color='#999'">Estatutos e Normas Internas</a></li>
              <li><a class="fecha" href="/#contactos" style="border-bottom:none;" onMouseOver="this.style.color='#3695d8'"
   onMouseOut="this.style.color='#999'">Contactos</a></li>
              
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true" onMouseOver="this.style.color='#3695d8'"
   onMouseOut="this.style.color='#999'">O QUE FAZEMOS<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo get_site_url();?>/o-que-fazemos" onMouseOver="this.style.color='#3695d8'"
   onMouseOut="this.style.color='#999'">O que é a corrupção?</a></li>
              <li><a href="<?php echo get_site_url();?>/o-que-fazemos#custos" onMouseOver="this.style.color='#3695d8'"
   onMouseOut="this.style.color='#999'">Quais os custos da corrupção?</a></li>
              <li><a href="<?php echo get_site_url();?>/o-que-fazemos#trabalho" onMouseOver="this.style.color='#3695d8'"
   onMouseOut="this.style.color='#999'">Como trabalhamos</a></li>
   <li><a href="<?php echo get_site_url();?>/o-que-fazemos#provedoria" onMouseOver="this.style.color='#3695d8'"
   onMouseOut="this.style.color='#999'" >Provedoria TIAC - Alerta Anticorrupção</a></li>
              <li><a href="<?php echo get_site_url();?>/o-que-fazemos#projetos"  onMouseOver="this.style.color='#3695d8'"
   onMouseOut="this.style.color='#999'" >Temas e projetos</a></li>
   <li><a href="<?php echo get_site_url();?>/o-que-fazemos#publicacoes"  onMouseOver="this.style.color='#3695d8'"
   onMouseOut="this.style.color='#999'" style="border-bottom:none;">Publicações</a></li>
   
              
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" onMouseOver="this.style.color='#3695d8'"
   onMouseOut="this.style.color='#999'">NOTÍCIAS<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              
              <!--<li><a href="//transparencia.pt/noticias#ultimas" onMouseOver="this.style.color='#3695d8'"
   onMouseOut="this.style.color='#999'">Últimas</a></li>-->
              <li><a href="//transparencia.pt/noticias#noticias_tiac" onMouseOver="this.style.color='#3695d8'"
   onMouseOut="this.style.color='#999'">Notícias TIAC</a></li>
              <li><a href="//transparencia.pt/noticias#opiniao" onMouseOver="this.style.color='#3695d8'"
   onMouseOut="this.style.color='#999'">Opinião</a></li>
              <li><a href="//transparencia.pt/noticias#newsletters" onMouseOver="this.style.color='#3695d8'"
   onMouseOut="this.style.color='#999'">Newsletters</a></li>
              <li><a href="//transparencia.pt/noticias#videos" onMouseOver="this.style.color='#3695d8'"
   onMouseOut="this.style.color='#999'" style="border-bottom:none;">Vídeos</a></li>
              
              
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" onMouseOver="this.style.color='#3695d8'"
   onMouseOut="this.style.color='#999'">PARTICIPA<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="<?php echo get_site_url();?>/participa#info" onMouseOver="this.style.color='#3695d8'"
   onMouseOut="this.style.color='#999'">Informa-te</a></li>
              <li><a href="<?php echo get_site_url();?>/participa#membro" onMouseOver="this.style.color='#3695d8'"
   onMouseOut="this.style.color='#999'">Torna-te Membro</a></li>
              <li><a href="<?php echo get_site_url();?>/participa#provedoria" onMouseOver="this.style.color='#3695d8'"
   onMouseOut="this.style.color='#999'">Reporta um Caso</a></li>
              <li style="display:none"><a href="<?php echo get_site_url();?>/participa#voluntario" onMouseOver="this.style.color='#3695d8'"
   onMouseOut="this.style.color='#999'">Voluntaria-te</a></li>
              <li><a href="<?php echo get_site_url();?>/participa#evento" onMouseOver="this.style.color='#3695d8'"
   onMouseOut="this.style.color='#999'">Organiza um evento</a></li>
              <li><a href="<?php echo get_site_url();?>/participa#apoio" style="border-bottom:none;" onMouseOver="this.style.color='#3695d8'"
   onMouseOut="this.style.color='#999'">Apoia-nos</a></li>
              
            </ul>
          </li>
          <li><a href="//transparencia.pt/seletor-pagamento" style="color:#FFA500"onMouseOver="this.style.color='#3695d8'"
   onMouseOut="this.style.color='#FFA500'"><strong>DONATIVO</strong></a></li>
       <form action="<?php echo home_url( '/' ); ?>" method="get" class="form-inline">
    <fieldset>
   <div class="input-group">
      <input type="text" name="s" id="search" placeholder="<?php _e("Procurar","wpbootstrap"); ?>" value="<?php the_search_query(); ?>" class="form-control" />
      <span class="input-group-btn">
        <button  style="border: none" type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search form-control-feedback" style="float:left;  "></i></button>
      </span>
    </div>
<!--
<form role="search" method="get" id="searchform" class="searchform" action="https://transparencia.pt/"> 
<label class="screen-reader-text" for="s">Search for:</label> 
<input type="text" value="" name="s" id="s" /> 
<input type="submit" id="searchsubmit" value="Search" /> 
</form>-->

    </fieldset>
</form>
          
        </ul>

        


      </div>
    </nav>


<div id="semFade">
<div class="teste">
  






           
        
     
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<!--<h1><?php the_title(); ?></h1>!-->
	  	<?php the_content(); ?>
     
<form style="margin-top:-300px;float:right;margin-right:30%;">
<div align="center">
<h4 >Guardar como PDF</h4>
    <input align="center" type="image" src="https://transparencia.pt/wp-content/themes/wpbootstrap/assets/img/print.gif"
        onclick="window.print()"> 
</form>
</div>
	<?php endwhile; else: ?>
		<p><?php _e('Sorry, this page does not exist.'); ?></p>
	<?php endif; ?>

  </div>
  
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
<script src="//transparencia.pt/wp-content/themes/twentyfourteen/js/bootstrap.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js?hl=pt'></script>
<script src="//transparencia.pt/wp-content/themes/twentyfourteen/css/js/toucheffects.js"></script>
<script src="//transparencia.pt/wp-content/themes/twentyfourteen/css/js/modernizr.custom.js"></script>

<script>

$(document).ready(function() {
        $('.carousel').carousel({
            interval: 5000,
            cycle: true
        });
    });
</script>

<script>
function projeto_desenvolvimento() {
    alert("Projeto em desenvolvimento!");
}

</script>
<script type="text/javascript">
var removeClass = true;
$(".dropdown-toggle").click(function () {
    $(".teste").toggleClass('opacidade');
    removeClass = false;
});



$('.container,#semFade').click(function () {
    if (removeClass) {
        $(".teste").removeClass('opacidade');
    }
    removeClass = true;
});





</script>

<!--<script type="text/javascript">
  WebFontConfig = { google: { families: [ 'Droid+Serif::latin' ] } };
  (function() {
  var wf = document.createElement('script');
  wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
    '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
  wf.type = 'text/javascript';
  wf.async = 'true';
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(wf, s);
})();

 </script>-->


<script language="javascript">


    function showOrHide() 
    {
        var div = document.getElementById("showOrHideDiv");
        if (div.style.display == "block") 
        {
            div.style.display = "none";
        }
        else 
        {
            div.style.display = "block";
        }
    } 
     function showOrHide1() 
    {
        var div = document.getElementById("showOrHideDiv1");
        if (div.style.display == "block") 
        {
            div.style.display = "none";
        }
        else 
        {
            div.style.display = "block";
        }
    } 
     function showOrHide2() 
    {
        var div = document.getElementById("showOrHideDiv2");
        if (div.style.display == "block") 
        {
            div.style.display = "none";
        }
        else 
        {
            div.style.display = "block";
        }
    } 
     function showOrHide3() 
    {
        var div = document.getElementById("showOrHideDiv3");
        if (div.style.display == "block") 
        {
            div.style.display = "none";
        }
        else 
        {
            div.style.display = "block";
        }
    } 
     function showOrHide4() 
    {
        var div = document.getElementById("showOrHideDiv4");
        if (div.style.display == "block") 
        {
            div.style.display = "none";
        }
        else 
        {
            div.style.display = "block";
        }
    } 
     function showOrHide5() 
    {
        var div = document.getElementById("showOrHideDiv5");
        if (div.style.display == "block") 
        {
            div.style.display = "none";
        }
        else 
        {
            div.style.display = "block";
        }
    } 
</script>
  <!--  <script type="text/javascript">
    $(function() {
  $('a[href*=#]:not([href=#]):not(.carousel-control)').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

</script>-->
<script language="javascript"> 
function toggle() {
  var ele = document.getElementById("toggleText");
  var text = document.getElementById("displayText");
  if(ele.style.display == "block") {
        ele.style.display = "none";
    text.innerHTML = "Mostrar";
    }
  else {
    ele.style.display = "block";
    text.innerHTML = "Esconder";
  }
} 
</script>
<script type="text/javascript">
  
$(window).scroll(function(){
  if($(document).scrollTop() > 380){//Here 200 may be not be exactly 200px
    $('.a').hide();
  }
  
   if($(document).scrollTop() < 380){//Here 200 may be not be exactly 200px
    $('.a').show();
  }
  
});


</script>

<script type="text/javascript">
  
 $(document).ready(function () {
  $(".navbar-nav li ul li a").click(function(event) {
    $(".navbar-collapse").collapse('hide');
  });
});



</script>

<?php 




wp_footer(); ?> 


