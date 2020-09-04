<?php echo $header; ?>
<body class="skin-1">
    <!-- #section:basics/navbar.layout -->
<?php echo $topheader; 

?>
    </div>

    <!-- /section:basics/navbar.layout -->
    <div class="main-container" id="main-container">
      <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
      </script>

      <!-- #section:basics/sidebar -->
<?php echo $sidemenu; 

?>
      </div>
  
      <!-- /section:basics/sidebar -->
      <div class="main-content">
        <!-- #section:basics/content.breadcrumbs -->
        <div class="breadcrumbs" id="breadcrumbs">
          <script type="text/javascript">
            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
          </script>

          <ul class="breadcrumb">
            <li>
              <i class="ace-icon fa fa-home home-icon"></i>
              <a href="<?php echo base_url(); ?>auth/dashboard">Home</a>
            </li>

            <li>
              <a href="<?php echo base_url(); ?>auth/user_list">Admin Users</a>
            </li>
            <li class="active">Create</li>
          </ul><!-- /.breadcrumb -->

          <!-- #section:basics/content.searchbox -->
          <div class="nav-search" id="nav-search">
            <form class="form-search">
              <span class="input-icon">
                <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                <i class="ace-icon fa fa-search nav-search-icon"></i>
              </span>
            </form>
          </div><!-- /.nav-search -->

          <!-- /section:basics/content.searchbox -->
        </div>

        <!-- /section:basics/content.breadcrumbs -->
        <div class="page-content">
          <!-- #section:settings.box -->


          <!-- /section:settings.box -->
              <div class="page-header">
            <h1>
              Admin Create
              <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Add Record
              </small>
            </h1>
          </div><!-- /.page-header -->
    <div class="row">

<?php

if ($this->session->flashdata('message')) { 

 echo '<div class="alert alert-block alert-success">'.$this->session->flashdata('message').'</div>';

} 
else if($this->session->flashdata('success'))
{

 echo '<div class="alert alert-block alert-success">'.$this->session->flashdata('success').'</div>';

}
else if($this->session->flashdata('error'))
{

 echo '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>';

}
else if($this->session->flashdata('warning'))
{

 echo '<div class="alert alert-block alert">'.$this->session->flashdata('warning').'</div>';

}else{
if($message!=''){

  echo '<div class="alert alert-block alert-success">'.$message.'</div>';
}
}

 ?>

            <div class="col-xs-12">
              <!-- PAGE CONTENT BEGINS -->
        
        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>auth/create_user">


                      <div class="row">
<div class="col-xs-4">
                <!-- #section:elements.form -->
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> First Name</label>

                  <div class="col-sm-8">
                    <input type="text" id="form-field-1"   name="first_name"   class="col-xs-12 col-sm-12" />
                  </div>
                </div>

                                 </div>


                                 <div class="col-xs-4">
                <!-- #section:elements.form -->
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Last Name</label>

                  <div class="col-sm-8">
                    <input type="text" id="form-field-1"   name="last_name"   class="col-xs-12 col-sm-12" />
                  </div>
                </div>

                                 </div>

                                       <div class="col-xs-4">
                <!-- #section:elements.form -->
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Email </label>

                  <div class="col-sm-8">
                    <input type="email" id="form-field-1" name="email"  placeholder="Email"   class="col-xs-12 col-sm-12" />
                  </div>
                </div>

                                 </div>

                      <div class="col-xs-4">
                <!-- #section:elements.form -->
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Username </label>

                  <div class="col-sm-8">
                    <input type="text" id="form-field-1"   name="identity" class="col-xs-12 col-sm-12" />
                       <?php  echo form_error('identity');?>
                  </div>
                </div>

                                 </div>


                                       <div class="col-xs-4">
                <!-- #section:elements.form -->
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Company </label>

                  <div class="col-sm-8">
                    <input type="text" id="form-field-1" name="company"  placeholder="Company"   class="col-xs-12 col-sm-12" />
                  </div>
                </div>

                                 </div>


                                       <div class="col-xs-4">
                <!-- #section:elements.form -->
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Tel </label>

                  <div class="col-sm-8">
                    <input type="text" id="form-field-1" name="phone"  placeholder="Telephone"   class="col-xs-12 col-sm-12" />
                  </div>
                </div>

                                 </div>




<div class="col-xs-4">
                <!-- #section:elements.form -->
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Password </label>

                  <div class="col-sm-8">
                    <input type="password" id="form-field-1"  name="password"    class="col-xs-12 col-sm-12" />
                  </div>
                </div>

                                 </div>


                                 <div class="col-xs-4">
                <!-- #section:elements.form -->
                <div class="form-group">
                  <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Confirm Password </label>

                  <div class="col-sm-8">
                    <input type="password" id="form-field-1"  name="password_confirm"    class="col-xs-12 col-sm-12" />
                  </div>
                </div>

                                 </div>
   

                                 </div>



  

      <div class="clearfix form-actions">
                  <div class="col-md-offset-3 col-md-9">
                    <button class="btn btn-info" type="submit" name="submit">
                      <i class="ace-icon fa fa-check bigger-110"></i>
                      Submit
                    </button>

                    &nbsp; &nbsp; &nbsp;
                    <button class="btn" type="reset">
                      <i class="ace-icon fa fa-undo bigger-110"></i>
                      Reset
                    </button>
                  </div>
                </div>
      </form>



              <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.page-content -->
      </div><!-- /.main-content -->


<?php echo $footer; ?>

      <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
      </a>
    </div><!-- /.main-container -->

    <!-- basic scripts -->

<script type="text/javascript" src="<?php echo base_url(); ?>admin_theme/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
</script>

    <!--[if !IE]> -->
    <script type="text/javascript">
      window.jQuery || document.write("<script src='<?php echo base_url(); ?>admin_theme/assets/js/jquery.min.js'>"+"<"+"/script>");
    </script>

    <!-- <![endif]-->

    <!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='<?php echo base_url(); ?>admin_theme/assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url(); ?>admin_theme/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>
    <script src="<?php echo base_url(); ?>admin_theme/assets/js/bootstrap.min.js"></script>

    <!-- page specific plugin scripts -->

    <!--[if lte IE 8]>
      <script src="<?php echo base_url(); ?>admin_theme/assets/js/excanvas.min.js"></script>
    <![endif]-->
    <script src="<?php echo base_url(); ?>admin_theme/assets/js/jquery-ui.custom.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_theme/assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_theme/assets/js/chosen.jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_theme/assets/js/fuelux/fuelux.spinner.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_theme/assets/js/date-time/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_theme/assets/js/date-time/bootstrap-timepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_theme/assets/js/date-time/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_theme/assets/js/date-time/daterangepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_theme/assets/js/date-time/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_theme/assets/js/bootstrap-colorpicker.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_theme/assets/js/jquery.knob.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_theme/assets/js/jquery.autosize.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_theme/assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_theme/assets/js/jquery.maskedinput.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_theme/assets/js/bootstrap-tag.min.js"></script>

    <!-- ace scripts -->
    <script src="<?php echo base_url(); ?>admin_theme/assets/js/ace-elements.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_theme/assets/js/ace.min.js"></script>

    <!-- inline scripts related to this page -->
        <!-- inline scripts related to this page -->
    <script type="text/javascript">
      jQuery(function($) {


      
      
        $('.chosen-select').chosen({allow_single_deselect:true}); 
        //resize the chosen on window resize
        $(window).on('resize.chosen', function() {
          var w = $('.chosen-select').parent().width();
          $('.chosen-select').next().css({'width':w});
        }).trigger('resize.chosen');
      
        $('#chosen-multiple-style').on('click', function(e){
          var target = $(e.target).find('input[type=radio]');
          var which = parseInt(target.val());
          if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
           else $('#form-field-select-4').removeClass('tag-input-style');
        });
      
      
        $('[data-rel=tooltip]').tooltip({container:'body'});
        $('[data-rel=popover]').popover({container:'body'});
        
        $('textarea[class*=autosize]').autosize({append: "\n"});
        $('textarea.limited').inputlimiter({
          remText: '%n character%s remaining...',
          limitText: 'max allowed : %n.'
        });
      
        $.mask.definitions['~']='[+-]';
        $('.input-mask-date').mask('99/99/9999');
        $('.input-mask-phone').mask('(999) 999-9999');
        $('.input-mask-eyescript').mask('~9.99 ~9.99 999');
        $(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
      
      
      
      
        
        $('#id-input-file-1 , #id-input-file-2').ace_file_input({
          no_file:'No File ...',
          btn_choose:'Choose',
          btn_change:'Change',
          droppable:false,
          onchange:null,
          thumbnail:false 
   
        });

      
      
        $('#id-input-file-3').ace_file_input({
          style:'well',
          btn_choose:'Drop files here or click to choose',
          btn_change:null,
          no_icon:'ace-icon fa fa-cloud-upload',
          droppable:true,
          thumbnail:'small'

          ,
          preview_error : function(filename, error_code) {
          }
      
        }).on('change', function(){

        });
        
      

        $('#id-file-format').removeAttr('checked').on('change', function() {
          var whitelist_ext, whitelist_mime;
          var btn_choose
          var no_icon
          if(this.checked) {
            btn_choose = "Drop images here or click to choose";
            no_icon = "ace-icon fa fa-picture-o";
      
            whitelist_ext = ["jpeg", "jpg", "png", "gif" , "bmp"];
            whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
          }
          else {
            btn_choose = "Drop files here or click to choose";
            no_icon = "ace-icon fa fa-cloud-upload";
            
            whitelist_ext = null;//all extensions are acceptable
            whitelist_mime = null;//all mimes are acceptable
          }
          var file_input = $('#id-input-file-3');
          file_input
          .ace_file_input('update_settings',
          {
            'btn_choose': btn_choose,
            'no_icon': no_icon,
            'allowExt': whitelist_ext,
            'allowMime': whitelist_mime
          })
          file_input.ace_file_input('reset_input');
          
          file_input
          .off('file.error.ace')
          .on('file.error.ace', function(e, info) {

          });
        
        });
      
        $('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
        .on('change', function(){
          //alert(this.value)
        });
        $('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up', icon_down:'ace-icon fa fa-caret-down'});
        $('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus smaller-75', icon_down:'ace-icon fa fa-minus smaller-75', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
   
      
      
        //datepicker plugin
        //link
        $('.date-picker').datepicker({
          autoclose: true,
          todayHighlight: true
        })
        //show datepicker when clicking on the icon
        .next().on(ace.click_event, function(){
          $(this).prev().focus();
        });
      
        //or change it into a date range picker
        $('.input-daterange').datepicker({autoclose:true});
      
      
        //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
        $('input[name=date-range-picker]').daterangepicker({
          'applyClass' : 'btn-sm btn-success',
          'cancelClass' : 'btn-sm btn-default',
          locale: {
            applyLabel: 'Apply',
            cancelLabel: 'Cancel',
          }
        })
        .prev().on(ace.click_event, function(){
          $(this).next().focus();
        });
      
      
        $('#timepicker1').timepicker({
          minuteStep: 1,
          showSeconds: true,
          showMeridian: false
        }).next().on(ace.click_event, function(){
          $(this).prev().focus();
        });
        
        $('#date-timepicker1').datetimepicker().next().on(ace.click_event, function(){
          $(this).prev().focus();
        });
        
      
        $('#colorpicker1').colorpicker();
      
        $('#simple-colorpicker-1').ace_colorpicker();

      
      
        $(".knob").knob();
        
        
        var tag_input = $('#form-field-tags');
        try{
          tag_input.tag(
            {
            placeholder:tag_input.attr('placeholder'),
            //enable typeahead by specifying the source array
            //source: ace.vars['US_STATES'],//defined in ace.js >> ace.enable_search_ahead

            }
          );
      
          //programmatically add a new
          var $tag_obj = $('#form-field-tags').data('tag');
          $tag_obj.add('Programmatically Added');
        }
        catch(e) {

          tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
         
        }
      
      });
    </script>
    
  </body>
</html>

