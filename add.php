<?php
/**
 * Add job form
 * 
 * Template displays add job form
 * 
 * 
 * @author Greg Winiarski
 * @package Templates
 * @subpackage JobBoard
 * 
 */
/* @var $form Wpjb_Form_AddJob */
/* @var $can_post boolean User has job posting priviledges */
?>

<div class="where-am-i">
    <h2><?php _e('Add job', 'jobeleon'); ?></h2>
</div><!-- .where-am-i -->

<div id="wpjb-main" class="wpjb-page-add">

    <?php if ($can_post): ?>

        <?php wpjb_add_job_steps(); ?>
        <?php wpjb_flash() ?>
        <form class="wpjb-form" action="<?php echo wpjb_link_to("step_preview") ?>" method="post" enctype="multipart/form-data">

            <?php echo $form->renderHidden() ?>
               <?php $abc=0;?>
            <?php foreach ($form->getReordered() as $group): ?>

                <?php /* @var $group stdClass */ ?> 
             
                <fieldset class="wpjb-fieldset-<?php esc_attr_e($group->getName()) ?>" id="<?php echo $abc++ ;?>">
                    
            <legend><?php esc_html_e($group->title) ?></legend>
                    <?php foreach ($group->getReordered() as $name => $field): ?>
                        <?php /* @var $field Daq_Form_Element */ ?>
                        <div class="<?php wpjb_form_input_features($field) ?>">

                            <label class="wpjb-label">
                                <?php esc_html_e($field->getLabel()) ?>
                                <?php if ($field->isRequired()): ?><span class="wpjb-required">*</span><?php endif; ?>
                            </label>

                            <div class="wpjb-field">
                                <?php wpjb_form_render_input($form, $field) ?>
                                <?php wpjb_form_input_hint($field) ?>
                                <?php wpjb_form_input_errors($field) ?>
                            </div>

                        </div>
                    <?php endforeach; ?>
                </fieldset>
            
               
            
            <?php endforeach; ?>
            
            
            <fieldset>
                <div>
                    <?php if ($show_pricing): ?>

                        <table id="wpjb_pricing">
                            <tbody>
                                <tr>
                                    <td colspan="2"><legend class="wpjb-empty"><?php _e("Total cost", "jobeleon"); ?></legend></td>
                                </tr>

                                <tr>
                                    <td><?php _e("Listing cost", "jobeleon") ?>:</td>
                                    <td><span id="wpjb-listing-cost">-</span></td>
                                </tr>
                                <tr>
                                    <td><?php _e("Discount", "jobeleon") ?>:</td>
                                    <td><span id="wpjb-listing-discount">-</span></td>
                                </tr>
                                <tr>
                                    <td><strong><?php _e("Total", "jobeleon") ?>:</strong></td>
                                    <td><strong><span id="wpjb-listing-total">-</span></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php endif; ?>
                    <span class="next" id="next" > NEXT </span>
                    
                    <input type="submit" class="wpjb-submit" name="wpjb_preview" id="wpjb_submit" value="<?php _e("Preview", "jobeleon") ?>" />
                    <span class="wpjb-submit-info">
                        <?php _e("or", "jobeleon") ?>
                        <a href="<?php esc_attr_e(wpjb_link_to("step_reset")) ?>"><?php _e("Reset add job form", "jobeleon") ?></a>
                    </span>
                </div>
            </fieldset>

        </form>
    <?php endif; ?>

</div>
            
<!-- ----------------------------------------------------- start -------------------------------------------------------------- -->

<!-- --------------------------------------------  STYLE START---------------- ----------------------- -->

<style>
#wpjb-step li{width:25%;height: 38px;}
#wpjb-step li:last-child{ -moz-box-sizing: border-box;    background: none repeat scroll 0 0 #F8F9F9;    border: 5px solid #E5E6EA;    border-radius: 35px 35px 35px 35px;    display: block;    line-height: 25px;    margin: 0 auto 1em;    position: relative;    text-align: center;    width: 35px;    z-index: 10;}
#wpjb-step > li:last-child {margin-left: 56px !important;    text-align: center !important;}
.top { float: left;    margin-top: 17px;}
.next{ background: none repeat scroll 0 0 #9ECF32;    border: medium none;    border-radius: 5px 5px 5px 5px;    color: #FFFFFF;    font-size: 13px;    font-weight: 700;    margin: 0;    padding: 11px;    text-transform: uppercase;    cursor:pointer;}
</style>    

<!--  --------------------------------------------  STYLE END---------------- ----------------------- -->

<!--  --------------------------------------------  SCRIPT START---------------- ----------------------- -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script>
   $(document).ready(function(){
      var steps = $('.wpjb-form fieldset');
      var count = steps.size();
                    
                    
              /* ------------------------------- Please define value for n ------------------------------------  */      
              
                                var n=1;         // Numbers of the field's section you want to show on first form
                                
              /* ------------------------------------------------------------------------------------------------ */ 
               
        
        
       var i = 0;  
       var j = 0;  
       if (count >= n)
          {
              $("#wpjb_submit").hide();
              $(".wpjb-form fieldset").hide();
                     while ( i < n ) {
                                        document.getElementById(i).style.display = 'block';
                                         i++; // Increment i
                                     }
                              
            
              $(".wpjb-form fieldset:last-child").show();
              $(".next").show();
                         
           }
              
 $(".next").click(function(){

	 if(document.getElementById('company_name').value=='') {
	if ($(".wpjb-element-name-company_name").find('.ce').length == 0)
 {
	 $( ".wpjb-element-name-company_name" ).append( "<ul class='ce'  style='color:#ff0000;'><li>Field cannot be empty</li></ul>" );
 }
//return false;
}

if(document.getElementById('e_int_address').value=='') {
		if ($(".wpjb-element-name-e_int_address").find('.ce').length == 0)
 {
	 $( ".wpjb-element-name-e_int_address" ).append( "<ul class='ce' style='color:#ff0000;'><li>Field cannot be empty</li></ul>" );
 }
//return false;
}

if(document.getElementById('job_city').value=='') {
		if ($(".wpjb-element-name-job_city").find('.ce').length == 0)
 {
	 $( ".wpjb-element-name-job_city" ).append( "<ul class='ce' style='color:#ff0000;'><li>Field cannot be empty</li></ul>" );
 }

}

if(document.getElementById('company_email').value=='') {
		if ($(".wpjb-element-name-company_email").find('.ce').length == 0)
 {
	 $( ".wpjb-element-name-company_email" ).append( "<ul class='ce' style='color:#ff0000;'><li>Field cannot be empty</li></ul>" );
 }

}

if(document.getElementById('e_int_address').value=='' || document.getElementById('e_int_address').value=='' || document.getElementById('job_city').value=='' || document.getElementById('company_email').value==''  ) {
 
 return false;

}
            
              $("#wpjb_submit").show();
              $(".wpjb-form fieldset").show();
                     while ( j < n) {
                                        document.getElementById(j).style.display = 'none';
                                         j++; // Increment i
                                    }
              $(".wpjb-form fieldset:last-child").show();
              $(".next").hide(); 
              $("#wpjb-step li:nth-child(2)").addClass('wpjb-current-step');
              $("#wpjb-step:after").append('width', '300px', 'important');
              if ($("li:nth-child(2)").hasClass("wpjb-current-step")) 
                  { 

                       $( "div #over" ).replaceWith( "<style>#wpjb-step:after { width : 300px !important; } </style>" );

                  }
});
              $("#wpjb-step li:first").after('<li>2.Next</li>');  
              $("#wpjb-step li:last").html("4 <span class='top'> 4.Done </span>");
              $("#wpjb-step li:nth-child(3)").html("<span class='top1'> 3.preview </span>");  
});
</script>
<!--  --------------------------------------------  SCRIPT END---------------- ----------------------- -->            
<div id="over">
<style> #wpjb-step:after { background: none repeat scroll 0 0 #9ECF32; width: 100px !important; }</style>
 </div>
<!--  --------------------------------------------   END---------------- ----------------------- --> 