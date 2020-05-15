<div id="sendakglink" class="modal fade" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">
											<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-paper-plane"></i>
										</span>	Send Acknowledgement letter  
											<!--	<small>local data source</small> -->
											</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
										
										<div class="row">
								<div class="col">
									<div class="alert alert-light alert-elevate fade show" role="alert">
										<div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
										<div class="alert-text">
											Please enter the email address you want to send the acknowledgement letter. 
										</div>
									</div>
								</div>
							</div>
										
										
<!--begin::Form-->
										<form class="kt-form kt-form--label-right" method="post">
											<div class="kt-portlet__body">
											
												<div class="form-group row form-group-marginless kt-margin-t-20 kt-margin-b-20">
													
													<label class="col-lg-2 col-form-label">Email:</label>
													<div class="col-lg-8">
													<div class="input-group">
															<div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-envelope"></i></span></div>
															<input type="text" name="email" class="form-control" placeholder="Email">
														
															<input type="hidden" name="id" id="id" >
															
														</div>
														<span class="form-text text-muted">Please enter your Email:</span>
													
													</div>
											

												  
												</div>
	
	
											</div>
											<div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<div class="row">
														<div class="col-lg-5"></div>
														<div class="col-lg-7">
															<button type="button" class="btn btn-brand" id="sendakgemail">Send</button>
															<button type="reset" class="btn btn-secondary">Clear</button>
														</div>
													</div>
												</div>
											</div>
										</form>

										<!--end::Form-->
										
										</div>
										
										<div class="modal-footer kt-hidden">
											<button type="button" class="btn btn-clean btn-bold btn-upper btn-font-md" data-dismiss="modal">Close</button>
											<button type="button" class="btn btn-default btn-bold btn-upper btn-font-md">Submit</button>
										</div>
									</div>
								</div>
							</div>