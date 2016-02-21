<?php 
global $wpdb;

//$user_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->civicrm_contact" );


if( isset($_POST['submit']) ) {
  
$email = $_POST['email'];


//print_r($email);


//$email_existente= $wpdb->get_var("SELECT email FROM  civicrm_email  WHERE email='$email'");
$x =$wpdb->get_var("SELECT contact_id  FROM civicrm_group_contact WHERE contact_id = '$email' AND group_id='114'");



print_r($email_existente);
print_r($x);



  
 

if(empty($email)){
        
            echo "<script>alert('Preencha o campo email!'); window.location = './';</script>";

      }


      if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
     
         echo "<script>alert('O formato incorreto de email!'); window.location = './';</script>";


      }

      
if( $email != 1){
        
            echo "<script>alert('O email não se encontra registado!'); window.location = './';</script>";

      }else{

    //$max_contact_id= $wpdb->get_var("SELECT MAX(id) FROM civicrm_contact");
   // $contact_id=$max_contact_id + 1;

  

  //$wpdb->query("INSERT INTO civicrm_contact (id) VALUES ('$contact_id}')");
  //$wpdb->query("INSERT INTO civicrm_email (contact_id,email,is_primary,is_billing) VALUES ('{$contact_id}','{$email}','1','1')");
  //$wpdb->query("INSERT INTO civicrm_group_contact (group_id,contact_id,status) VALUES ('14','$contact_id','Added')");
  echo "<script>alert('Subscrição removida com sucesso!'); window.location = './';</script>";
}

}

?>



<?php
//$email_existente= $wpdb->get_var("SELECT MIN(contact_id) FROM  civicrm_email  WHERE email='$email'");



?>


<style type="text/css">
  
@media (max-width: 844px){
   
  .col-sm-6{

text-align: center;


  }
}
@media (max-width: 844px){
   
  .subscribeMe{

margin-left: 13%;


  }
}
@media (max-width: 1090px){
   
  footer {

/*text-align: center;*/


  }
}

</style>


     <div class="col-sm-6">
        <h3>SAIR DA NEWSLETTER</h3>
        <div align="center">
        <form id="NewsletterForm" method="post">
          <input width="30" type="text" class="subscribeMe" id="email" name="email" placeholder="Introduz o teu e-mail">
          <button role="submit" name="submit" id="submit">SAIR </button>
          <ul style="list-style-type: none;">
          <!--<li class="col-sm-12 col-md-6">
          <input type="checkbox" name="dcn" value="true" checked="checked"  width="20%"><label>Newsletter Semanal</label></li>
          <li class="col-sm-12 col-md-6"><input type="checkbox" name="tipr" value="true" width="20%"><label>Newsletter Mensal</label></li>
       -->
          </ul>
        </form>
        </div>
      </div>
      </div>
    </div>
  </section>



 














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






</body>


</html>
