<?php echo $mainheader;  ?>
<body class="skin-1">
		<!-- #section:basics/navbar.layout -->
<?php echo $topheader; ?>
		</div>

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!-- #section:basics/sidebar -->
<?php echo $sidemenu; ?>

			<!-- /section:basics/sidebar -->
			</div>
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
							<a href="<?php echo base_url(); ?>auth/user_list">Users</a>
						</li>
						<li class="active">List</li>
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


					<!-- /section:settings.box -->


					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->
<div class="row">
<div class="col-xs-12">
							<div class="widget-box">
										<div class="widget-header widget-header-small">
											<h5 class="widget-title lighter">Search Here</h5>
										</div>

										<div class="widget-body">
											<div class="widget-main">
						<form class="form-search" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>auth/user_list">
													<div class="row">
																		<div class="col-xs-12 col-sm-3">
															<div class="input-group">
				<select name="group"  class="form-control" id="form-field-select-1"   > 
<option value="">Select User Group</option>
<?php for($i=0;$i<count($usergroups);$i++){ ?>
<option value="<?php echo $usergroups[$i]['id'];  ?>" ><?php echo $usergroups[$i]['name'];  ?></option>
<?php } ?>
											</select>														
															</div>
															</div>


														<div class="col-xs-12 col-sm-4">
															<div class="input-group">
																<input type="text" class="form-control search-query"  value="<?php echo $keyword; ?>" name="keyword" placeholder="Type your query" />
																<span class="input-group-btn">
																	<button type="submit" name="submit"  class="btn btn-purple btn-sm">
																		Search
																		<i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
																	</button>
																</span>
															</div>
															</div>
<div class="col-xs-12 col-sm-4">
											<a class="btn btn-app btn-primary btn-xs radius-4" href="<?php echo base_url(); ?>auth/create_user">
											<i class="ace-icon fa fa-pencil-square-o bigger-160"></i>

											Create
											<span class="badge badge-transparent">
											
											</span>
										</a>
										<button class="btn btn-app btn-success btn-xs radius-4"  type="submit" name="publish" value="submitted">
											<i class="ace-icon fa fa-eye bigger-160"></i>

											Publish
											<span class="badge badge-transparent">
											
											</span>
										</button>
										
										<button class="btn btn-app btn-warning btn-xs radius-4" type="submit" name="unpublish" value="submitted">
											<i class="ace-icon fa fa-eye-slash bigger-160"></i>

											Unpublish
											<span class="badge badge-transparent">
											
											</span>
										</button>
										
										<button class="btn btn-app btn-danger btn-xs radius-4" type="submit" name="delete" value="submitted">
											<i class="ace-icon fa fa-trash-o bigger-160"></i>

											Delete
											<span class="badge badge-transparent">
												
											</span>
										</button>


													</div>		

													</div>
												
											</div>
										</div>
									</div>
</div>


</div></br>

		
<div class="row">

<?php echo $messagebar;  ?>

</div>

						<div class="table-header">
								User Listings
									</div>

					
  <?php 


  if($count > 0){ 

  	?>
							<div class="row">
								<div class="col-xs-12">
									<table id="sample-table-1" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th class="center">
													<label class="position-relative">
														<input type="checkbox" class="ace" onclick="checkAll(this);" />
														<span class="lbl"></span>
													</label>
												</th>
												<th>Name</th>
								
												<th>Email</th>
												<th>Groups</th>
								


												<th class="hidden-480">Status</th>

												<th></th>
											</tr>
										</thead>
  <input type="hidden" name="count" id="count" value="<?php echo count($users);?>" />
										<tbody>
											<?php 
										

for($i=0;$i<count($users);$i++){

											 	?>
											<tr>
												<td class="center">
													<label class="position-relative">
														<input type="checkbox" class="ace" name="chkId<?php echo $i;?>" id="chkId<?php echo $i;?>" value="<?php echo $users[$i]['id'];?>"  />
														<span class="lbl"></span>
													</label>
												</td>
  <input type="hidden" name="id<?php echo $i;?>" value="<?php echo $users[$i]['id'];?>" />

										       <td><?php echo htmlspecialchars($users[$i]['first_name'],ENT_QUOTES,'UTF-8');?> <?php echo htmlspecialchars($users[$i]['last_name'],ENT_QUOTES,'UTF-8');?></td>
 
            <td><?php echo htmlspecialchars($users[$i]['email'],ENT_QUOTES,'UTF-8');?></td>
			<td>
				<?php
				$ci =&get_instance();
   $ci->load->model('admingroup_model');
  $user_groups =  $ci->admingroup_model->get_users_groups($users[$i]['id']); 
//$user_groups = $model_admingroup->get_users_groups($user->id);
				?>
				<?php for($k=0;$k<count($user_groups);$k++){

//$groupdet = $model_admingroup->get_groupdetails($group->id);

 $groupdet =  $ci->admingroup_model->get_groupdetails($user_groups[$k]['group_id']); 

					?>
	<?php //echo anchor("auth/edit_group/".$user_groups[$i]['group_id'], htmlspecialchars($groupdet->name,ENT_QUOTES,'UTF-8')) ;?>
<?php  echo $groupdet['name'];   ?>

	<br />
                <?php } ?>
			</td>
								


											
												<td class="hidden-480">
												

											

<?php if($users[$i]['active']==1){ ?>

<span class="label label-success">Active</span>
<?php }else {?>
<span class="label label-important ">Inactive</span>
<?php } ?>


 
												</td>

												<td>
													<div class="hidden-sm hidden-xs btn-group">
													<a class="btn btn-xs btn-info" href="<?php echo base_url(); ?>auth/edit_user/<?php echo $users[$i]['id']; ?>">
															<i class="ace-icon fa fa-pencil bigger-120"></i>
														</a>
					

														<a href="#modal-form<?php echo $users[$i]['id']; ?>" role="button" class="btn btn-xs btn-pink" data-toggle="modal">View Details</a>

														<button class="btn btn-xs btn-success" id="id-btn-publish<?php echo $users[$i]['id']; ?>">
															<i class="ace-icon fa fa-check bigger-120"></i>
														</button>
			                                           <button class="btn btn-xs btn-warning" id="id-btn-unpublish<?php echo $users[$i]['id']; ?>">
															<i class="ace-icon fa  fa-eye-slash bigger-120"></i>
														</button>
											

														<button class="btn btn-xs btn-danger"  id="id-btn-dialog<?php echo $users[$i]['id']; ?>">
															<i class="ace-icon fa fa-trash-o bigger-120"></i>
														</button>

											
													</div>

													<div class="hidden-md hidden-lg">
														<div class="inline position-relative">
															<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
																<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
															</button>

															<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
													

														<li>
																	<a href="<?php echo base_url(); ?>auth/edit_user/<?php echo $users[$i]['id']; ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
																		<span class="green">
																			<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																		</span>
																	</a>
																</li> 
																	<li>
																	<a href="#modal-form<?php echo $user->id; ?>" role="button" class="btn btn-xs btn-pink" data-toggle="modal">
																		<span class="green">
																			<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																		</span>
																	</a>
																</li>

																<li>
																	<button class="tooltip-error" data-rel="tooltip" title="Delete" id="id-btn-dialog<?php echo $users[$i]['id']; ?>">
																		<span class="red">
																			<i class="ace-icon fa fa-trash-o bigger-120"></i>
																		</span>
																	</button>
																</li>

																		<li>
																	<button  class="tooltip-success" data-rel="tooltip" title="Publish" id="id-btn-publish<?php echo $users[$i]['id']; ?>">
																		<span class="green">
																			<i class="ace-icon fa fa-check bigger-120"></i>
																		</span>
																	</button>
																</li>

																					<li>
																	<button class="tooltip-success" data-rel="tooltip" title="Unpublish" id="id-btn-unpublish<?php echo $users[$i]['id']; ?>">
																		<span class="green">
																			<i class="ace-icon fa fa-eye-slash bigger-120"></i>
																		</span>
																	</button>
																</li>


															</ul>
														</div>
													</div>
												</td>

											</tr>


			<div id="modal-form<?php echo $users[$i]['id']; ?>" class="modal" tabindex="-1">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="blue bigger">View Customer Details</h4>
										</div>

										<div class="modal-body">
											<div class="row">
										
<input type="hidden" name="userid" value="<?php echo $users[$i]['id']; ?>"/>
												<div class="col-xs-12 col-sm-12">

											<!-- 				<div class="form-group">
														<label for="form-field-username">Photo</label>

														<div>
												<p> <img src="../uploads/<?php echo $records[$i]['photo']; ?>" width="150px" height="150px"></p>
														</div>
													</div> -->
													<div class="form-group">
														<label for="form-field-username">First Name</label>

														<div>
												<p> <?php echo $users[$i]['first_name']; ?></p>
														</div>
													</div>

																		<div class="form-group">
														<label for="form-field-username">Last Name</label>

														<div>
															<?php echo $users[$i]['last_name']; ?>
														</div>
													</div>

													<div class="form-group">
														<label for="form-field-username">Email</label>

														<div>
															<?php echo $users[$i]['email']; ?>
														</div>
													</div>
										

															<div class="form-group">
														<label for="form-field-username">Phone</label>

														<div>
															<?php echo $users[$i]['phone']; ?>
														</div>
													</div>
			<div class="form-group">
														<label for="form-field-username">Company</label>

														<div>
															<?php echo $users[$i]['company']; ?>  
														</div>
													</div>

													<div class="form-group">
														<label for="form-field-username">Username</label>

														<div>
															<?php


															 echo $users[$i]['username']; ?>  
														</div>
													</div>
			<div class="form-group">
														<label for="form-field-username">Login ip</label>

														<div>
															<?php


															 echo $users[$i]['ip_address']; ?>  
														</div>
													</div>


											
												</div>
											</div>
										</div>

										<div class="modal-footer">
											<button class="btn btn-sm" data-dismiss="modal">
												<i class="ace-icon fa fa-times"></i>
												Close
											</button>

										
										</div>
									</div>
								</div>
							</div>
	<?php } ?>
		
										</tbody>
									</table>
									</form>
								</div><!-- /.span -->
							</div><!-- /.row -->

										<div class="modal-footer no-margin-top">
								

<?php  echo $pagelinks; ?> 
										</div>


																				<?php }else{  ?>


<div class="alert alert-block alert-danger">

								Sorry...No Records Found..

							</div>

										<?php } ?>


							<!-- PAGE CONTENT ENDS -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.page-content -->
			</div><!-- /.main-content -->

			<div id="dialog-confirm" class="hide">
										<div class="alert alert-info bigger-110">
											These items will be permanently deleted and cannot be recovered.
										</div>

										<div class="space-6"></div>

										<p class="bigger-110 bolder center grey">
											<i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
											Are you sure?
										</p>
									</div><!-- #dialog-confirm -->


												<div id="publish-confirm" class="hide">
										<div class="alert alert-info bigger-110">
											These items will be Published.
										</div>

										<div class="space-6"></div>

										<p class="bigger-110 bolder center grey">
											<i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
											Are you sure?
										</p>
									</div><!-- #dialog-confirm -->

												<div id="unpublish-confirm" class="hide">
										<div class="alert alert-info bigger-110">
											These items will be Unpublished.
										</div>

										<div class="space-6"></div>

										<p class="bigger-110 bolder center grey">
											<i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
											Are you sure?
										</p>
									</div><!-- #dialog-confirm -->


									<div class="article"> </div>
<?php echo $footer; ?>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

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
<script src="<?php echo base_url(); ?>admin_theme/assets/js/util.js" type="text/javascript"></script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url(); ?>admin_theme/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url(); ?>admin_theme/assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="<?php echo base_url(); ?>admin_theme/assets/js/jquery-ui.min.js"></script>
		<script src="<?php echo base_url(); ?>admin_theme/assets/js/jquery.ui.touch-punch.min.js"></script>

		<!-- ace scripts -->
		<script src="<?php echo base_url(); ?>admin_theme/assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url(); ?>admin_theme/assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			
				$( "#datepicker" ).datepicker({
					showOtherMonths: true,
					selectOtherMonths: false,
					//isRTL:true,
			
					
					/*
					changeMonth: true,
					changeYear: true,
					
					showButtonPanel: true,
					beforeShow: function() {
						//change button colors
						var datepicker = $(this).datepicker( "widget" );
						setTimeout(function(){
							var buttons = datepicker.find('.ui-datepicker-buttonpane')
							.find('button');
							buttons.eq(0).addClass('btn btn-xs');
							buttons.eq(1).addClass('btn btn-xs btn-success');
							buttons.wrapInner('<span class="bigger-110" />');
						}, 0);
					}
			*/
				});
			
			
				//override dialog's title function to allow for HTML titles
				$.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
					_title: function(title) {
						var $title = this.options.title || '&nbsp;'
						if( ("title_html" in this.options) && this.options.title_html == true )
							title.html($title);
						else title.text($title);
					}
				}));
			
						
			<?php for($i=0;$i<count($users);$i++){ ?>
				$( "#id-btn-dialog<?php echo $users[$i]['id']; ?>" ).on('click', function(e) {
					e.preventDefault();
				
					$( "#dialog-confirm" ).removeClass('hide').dialog({
						resizable: false,
						modal: true,
						title: "<div class='widget-header'><h4 class='smaller'><i class='icon-warning-sign red'></i>Delete Record?</h4></div>",
						title_html: true,
						buttons: [
							{
								html: "<i class='icon-trash bigger-110'></i>&nbsp; Delete this item",
								"class" : "btn btn-danger btn-mini",
								click: function() {
									$('.article').load("<?php echo base_url(); ?>auth/del_user/?id=<?php echo $users[$i]['id']; ?>");
									$( this ).dialog( "close" );
								}
							}
							,
							{
								html: "<i class='icon-remove bigger-110'></i>&nbsp; Cancel",
								"class" : "btn btn-mini",
								click: function() {
									$( this ).dialog( "close" );
								}
							}
						]
					});
				});
			
			
		<?php } ?>

		<?php for($i=0;$i<count($users);$i++){ ?>
				$( "#id-btn-unpublish<?php echo $users[$i]['id']; ?>" ).on('click', function(e) {
					e.preventDefault();
				
					$( "#unpublish-confirm" ).removeClass('hide').dialog({
						resizable: false,
						modal: true,
						title: "<div class='widget-header'><h4 class='smaller'><i class='icon-warning-sign red'></i>UnPublish Record?</h4></div>",
						title_html: true,
						buttons: [
							{
								html: "<i class='icon-trash bigger-110'></i>&nbsp; UnPublish",
								"class" : "btn btn-danger btn-mini",
								click: function() {

									$('.article').load("<?php echo base_url(); ?>auth/unpublish_user/?id=<?php echo $users[$i]['id']; ?>");
									$( this ).dialog( "close" );
								}
							}
							,
							{
								html: "<i class='icon-remove bigger-110'></i>&nbsp; Cancel",
								"class" : "btn btn-mini",
								click: function() {
									$( this ).dialog( "close" );
								}
							}
						]
					});
				});
			
			
			<?php } ?>

			<?php for($i=0;$i<count($users);$i++){ ?>
				$( "#id-btn-publish<?php echo $users[$i]['id']; ?>" ).on('click', function(e) {
					e.preventDefault();
				
					$( "#publish-confirm" ).removeClass('hide').dialog({
						resizable: false,
						modal: true,
						title: "<div class='widget-header'><h4 class='smaller'><i class='icon-warning-sign red'></i>Publish Record?</h4></div>",
						title_html: true,
						buttons: [
							{
								html: "<i class='icon-trash bigger-110'></i>&nbsp; Publish",
								"class" : "btn btn-danger btn-mini",
								click: function() {
									$('.article').load("<?php echo base_url(); ?>auth/publish_user/?id=<?php echo $users[$i]['id']; ?>");
									$( this ).dialog( "close" );
								}
							}
							,
							{
								html: "<i class='icon-remove bigger-110'></i>&nbsp; Cancel",
								"class" : "btn btn-mini",
								click: function() {
									$( this ).dialog( "close" );
								}
							}
						]
					});
				});
			
			
			<?php } ?>
			
				$( "#id-btn-dialog2" ).on('click', function(e) {
					e.preventDefault();
				
					$( "#dialog-confirm2" ).removeClass('hide').dialog({
						resizable: false,
						modal: true,
						title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Empty the recycle bin?</h4></div>",
						title_html: true,
						buttons: [
							{
								html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; Delete all items",
								"class" : "btn btn-danger btn-xs",
								click: function() {
									$( this ).dialog( "close" );
								}
							}
							,
							{
								html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Cancel",
								"class" : "btn btn-xs",
								click: function() {
									$( this ).dialog( "close" );
								}
							}
						]
					});
				});
			
						$('#modal-form').on('shown.bs.modal', function () {
					$(this).find('.chosen-container').each(function(){
						$(this).find('a:first-child').css('width' , '210px');
						$(this).find('.chosen-drop').css('width' , '210px');
						$(this).find('.chosen-search input').css('width' , '200px');
					});
				})


							$('#modal-form input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'ace-icon fa fa-cloud-upload',
					droppable:true,
					thumbnail:'large'
				})
			
				
				

					
			});
		</script>
	</body>
</html>