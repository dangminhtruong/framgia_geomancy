@extends('layouts.app')
@section('body_content')
	<div class="main-wrapper scrollspy-container">
			<div class="bg-light">
			
				<div class="create-tour-wrapper">

					<div class="container">
					
						<div class="row">
						
							<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
							
								<div class="form">
								
									<div class="create-tour-inner">
									
										<div class="promo-box-02 mb-40">
								
											<div class="icon">
												<i class="ti-plus"></i>
											</div>
											
											<h4>No account? Please sign-up now. It's free. </h4>
											
											<a href="#" class="btn">Sign Up</a>
											
										</div>
										
										<h4 class="section-title">About this blueprint</h4>
										<p>Compliment interested discretion estimating on stimulated apartments oh. Dear so sing when in find read of call. As distrusts behaviour abilities defective uncommonly.</p>
										
										<div class="row">
										
											<div class="col-xs-12 col-sm-12">
											
												<div class="form-group form-group-lg">
													<label>Title:</label>
													<input type="text" class="form-control"/>
												</div>
												
											</div>
										
											<div class="col-xs-12 col-sm-12">
											
												<div class="form-group">
													<label>Topic:</label>
													<input type="text" class="form-control" id="autocompleteTagging" value="Paris, Rome, Bangkok" placeholder="" />
												</div>
												
											</div>
											
											<div class="col-xs-12 col-sm-12">
											
												<div class="form-group">
													<label>Brief Description:</label>
													<textarea class="form-control" rows="5"></textarea>
												</div>
												
											</div>
											
											<div class="col-xs-12 col-sm-12">
											
												<div class="form-group">
													<label>Tags:</label>
													<input type="text" class="form-control" id="autocompleteTagging2" value="Lifestyle, Shopping, Backpack" placeholder="" />
												</div>
												
											</div>
											
										</div>
										
										<h5 class="text-uppercase">Is this tour best for?</h5>
										
										<div class="row gap-20">
											
											<div class="col-xs-12 col-sm-12">
											
												<label class="block">Tour style:</label>
												
												<div class="category-checkbox-wrapper clearfix mt-10 mb-15">
					
													<div class="category-checkbox-item">
														<div class="checkbox-block">
															<input id="checkbox_block-1" name="checkbox_block" type="checkbox" class="checkbox"/>
															<label class="" for="checkbox_block-1">
																<span class="category-checkbox-inner">
																	<span class="middle-outer">
																		<span class="middle-inner">
																			<span class="icon">
																				<i class="flaticon-travel-icons-mountain"></i>
																			</span>
																			Adventure
																		</span>
																	</span>
																</span>
															</label>
														</div>
													</div>
													
													<div class="category-checkbox-item">
														<div class="checkbox-block">
															<input id="checkbox_block-2" name="checkbox_block" type="checkbox" class="checkbox"/>
															<label class="" for="checkbox_block-2">
																<span class="category-checkbox-inner">
																	<span class="middle-outer">
																		<span class="middle-inner">
																			<span class="icon">
																				<i class="flaticon-travel-icons-island"></i>
																			</span>
																			Beach
																		</span>
																	</span>
																</span>
															</label>
														</div>
													</div>
													
													<div class="category-checkbox-item">
														<div class="checkbox-block">
															<input id="checkbox_block-3" name="checkbox_block" type="checkbox" class="checkbox"/>
															<label class="" for="checkbox_block-3">
																<span class="category-checkbox-inner">
																	<span class="middle-outer">
																		<span class="middle-inner">
																			<span class="icon">
																				<i class="flaticon-travel-icons-kayak"></i>
																			</span>
																			Kayak
																		</span>
																	</span>
																</span>
															</label>
														</div>
													</div>
													
													<div class="category-checkbox-item">
														<div class="checkbox-block">
															<input id="checkbox_block-4" name="checkbox_block" type="checkbox" class="checkbox"/>
															<label class="" for="checkbox_block-4">
																<span class="category-checkbox-inner">
																	<span class="middle-outer">
																		<span class="middle-inner">
																			<span class="icon">
																				<i class="flaticon-travel-icons-cocktail"></i>
																			</span>
																			Sweet
																		</span>
																	</span>
																</span>
															</label>
														</div>
													</div>
												
													<div class="category-checkbox-item">
														<div class="checkbox-block">
															<input id="checkbox_block-5" name="checkbox_block" type="checkbox" class="checkbox"/>
															<label class="" for="checkbox_block-5">
																<span class="category-checkbox-inner">
																	<span class="middle-outer">
																		<span class="middle-inner">
																			<span class="icon">
																				<i class="flaticon-travel-icons-mountain"></i>
																			</span>
																			Adventure
																		</span>
																	</span>
																</span>
															</label>
														</div>
													</div>
													
													<div class="category-checkbox-item">
														<div class="checkbox-block">
															<input id="checkbox_block-6" name="checkbox_block" type="checkbox" class="checkbox"/>
															<label class="" for="checkbox_block-6">
																<span class="category-checkbox-inner">
																	<span class="middle-outer">
																		<span class="middle-inner">
																			<span class="icon">
																				<i class="flaticon-travel-icons-island"></i>
																			</span>
																			Beach
																		</span>
																	</span>
																</span>
															</label>
														</div>
													</div>
													
													<div class="category-checkbox-item">
														<div class="checkbox-block">
															<input id="checkbox_block-7" name="checkbox_block" type="checkbox" class="checkbox"/>
															<label class="" for="checkbox_block-7">
																<span class="category-checkbox-inner">
																	<span class="middle-outer">
																		<span class="middle-inner">
																			<span class="icon">
																				<i class="flaticon-travel-icons-kayak"></i>
																			</span>
																			Kayak
																		</span>
																	</span>
																</span>
															</label>
														</div>
													</div>
													
													<div class="category-checkbox-item">
														<div class="checkbox-block">
															<input id="checkbox_block-8" name="checkbox_block" type="checkbox" class="checkbox"/>
															<label class="" for="checkbox_block-8">
																<span class="category-checkbox-inner">
																	<span class="middle-outer">
																		<span class="middle-inner">
																			<span class="icon">
																				<i class="flaticon-travel-icons-cocktail"></i>
																			</span>
																			Sweet
																		</span>
																	</span>
																</span>
															</label>
														</div>
													</div>
												
												</div>
												
											</div>
											
											<div class="col-xs-6 col-sm-6">
											
												<div class="form-group">
													<label>Service level:</label>
													<select class="selectpicker show-tick form-control" title="Select placeholder">
														<option value="0">Select Option 1</option>
														<option value="1">Select Option 2</option>
														<option value="2">Select Option 3</option>
														<option value="3">Select Option 4</option>
													</select>
												</div>
												
											</div>
											
											<div class="col-xs-6 col-sm-6">
											
												<div class="form-group">
													<label>Trip size:</label>
													<select class="selectpicker show-tick form-control" title="Select placeholder">
														<option value="0">Select Option 1</option>
														<option value="1">Select Option 2</option>
														<option value="2">Select Option 3</option>
														<option value="3">Select Option 4</option>
													</select>
												</div>
												
											</div>
											
											<div class="col-xs-6 col-sm-6">
											
												<div class="form-group">
													<label>Justice:</label>
													<select class="selectpicker show-tick form-control" title="Select placeholder">
														<option value="0">Select Option 1</option>
														<option value="1">Select Option 2</option>
														<option value="2">Select Option 3</option>
														<option value="3">Select Option 4</option>
													</select>
												</div>
												
											</div>
											
											<div class="col-xs-6 col-sm-6">
											
												<div class="form-group">
													<label>Household:</label>
													<select class="selectpicker show-tick form-control" title="Select placeholder">
														<option value="0">Select Option 1</option>
														<option value="1">Select Option 2</option>
														<option value="2">Select Option 3</option>
														<option value="3">Select Option 4</option>
													</select>
												</div>
												
											</div>
											
										</div>
										
										
										<div class="mb-30"></div>
										
										<h4 class="section-title">Trip detail</h4>
										
										<div class="row gap-20">
											
											<div class="col-xs-12 col-sm-5">
												
												<div class="form-group">
													<label>Meeting point</label>
													<input type="text" class="form-control" />
												</div>
												
											</div>
											
											<div class="col-xs-12 col-sm-3">
											
												<div class="form-group">
													<label>Meeting time</label>
													<input type="text" class="oh-timepicker form-control" />
												</div>
												
											</div>
											
											<div class="col-xs-12 col-sm-4">

												<div class="form-group form-spin-group">
													<label>Maximum travellers</label>
													<input type="text" class="form-control form-spin" value="1" /> 
												</div>
												
											</div>
											
											<div class="col-xs-12 col-sm-6">
												
												<div class="form-group">
													<label>Languages</label>
													<select class="selectpicker show-tick form-control" title="Select placeholder" data-selected-text-format="count > 6" data-done-button="true" data-done-button-text="OK" multiple>
														<option value="0">Select Option 1</option>
														<option value="1">Select Option 2</option>
														<option value="2">Select Option 3</option>
														<option value="3">Select Option 4</option>
													</select>
												</div>
												
											</div>
											
											<div class="col-xs-12 col-sm-6">
												
												<div class="form-group">
													<label>Transport</label>
													<select class="selectpicker show-tick form-control" title="Select placeholder" data-selected-text-format="count > 6" data-done-button="true" data-done-button-text="OK" multiple>
														<option value="0">Select Option 1</option>
														<option value="1">Select Option 2</option>
														<option value="2">Select Option 3</option>
														<option value="3">Select Option 4</option>
													</select>
												</div>
												
											</div>
											
											<div class="col-xs-12 col-sm-12">
												<div class="mt-10">
													<span class="block line-12">General enquire picture letters garrets on offices of no on. Say one hearing between excited evening all inhabit thought you?</span>
													<div class="clear mb-5"></div>
													<div class="radio-inline">
														<input id="yes_no-1-1" name="yes_no-1" type="radio" class="radio" checked />
														<label for="yes_no-1-1">Yes</label>
													</div>
													<div class="radio-inline">
														<input id="yes_no-1-2" name="yes_no-1" type="radio" class="radio"/>
														<label for="yes_no-1-2">No</label>
													</div>
												</div>
											</div>
											
											<div class="col-xs-12 col-sm-12">
												<div class="mt-20">
													<span class="block line-12">Dashwoods contented sportsmen at up no convinced cordially affection?</span>
													<div class="clear mb-5"></div>
													<div class="radio-inline">
														<input id="yes_no-2-1" name="yes_no-2" type="radio" class="radio" />
														<label for="yes_no-2-1">Yes</label>
													</div>
													<div class="radio-inline">
														<input id="yes_no-2-2" name="yes_no-2" type="radio" class="radio"/>
														<label for="yes_no-2-2">No</label>
													</div>
												</div>
											</div>
											
											<div class="col-xs-12 col-sm-12">
												<div class="mt-20">
													<span class="block line-12">General enquire picture letters garrets on offices of no on?</span>
													<div class="clear mb-5"></div>
													<div class="radio-inline">
														<input id="yes_no-3-1" name="yes_no-3" type="radio" class="radio" />
														<label for="yes_no-3-1">Yes</label>
													</div>
													<div class="radio-inline">
														<input id="yes_no-3-2" name="yes_no-3" type="radio" class="radio"/>
														<label for="yes_no-3-2">No</label>
													</div>
												</div>
											</div>
											
										</div>

										<div class="mb-40"></div>
										
										<h4 class="section-title">What's included?</h4>
										
										<div class="row checkbox-wrapper">
											<div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
												<div class="checkbox-block">
													<input id="filter_checkbox-1" name="filter_checkbox" type="checkbox" class="checkbox"/>
													<label class="" for="filter_checkbox-1">Checkbox One</label>
												</div>
											</div>
											<div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
												<div class="checkbox-block">
													<input id="filter_checkbox-2" name="filter_checkbox" type="checkbox" class="checkbox"/>
													<label class="" for="filter_checkbox-2">Checkbox Two</label>
												</div>
											</div>
											<div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
												<div class="checkbox-block">
													<input id="filter_checkbox-3" name="filter_checkbox" type="checkbox" class="checkbox"/>
													<label class="" for="filter_checkbox-3">Checkbox Three</label>
												</div>
											</div>
											<div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
												<div class="checkbox-block">
													<input id="filter_checkbox-4" name="filter_checkbox" type="checkbox" class="checkbox"/>
													<label class="" for="filter_checkbox-4">Checkbox Four</label>
												</div>
											</div>
											<div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
												<div class="checkbox-block">
													<input id="filter_checkbox-5" name="filter_checkbox" type="checkbox" class="checkbox"/>
													<label class="" for="filter_checkbox-5">Checkbox Five</label>
												</div>
											</div>
											<div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
												<div class="checkbox-block">
													<input id="filter_checkbox-6" name="filter_checkbox" type="checkbox" class="checkbox"/>
													<label class="" for="filter_checkbox-6">Checkbox Six</label>
												</div>
											</div>
											<div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
												<div class="checkbox-block">
													<input id="filter_checkbox-7" name="filter_checkbox" type="checkbox" class="checkbox"/>
													<label class="" for="filter_checkbox-7">Checkbox Seven</label>
												</div>
											</div>
											<div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
												<div class="checkbox-block">
													<input id="filter_checkbox-8" name="filter_checkbox" type="checkbox" class="checkbox"/>
													<label class="" for="filter_checkbox-8">Checkbox Eight</label>
												</div>
											</div>
											<div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
												<div class="checkbox-block">
													<input id="filter_checkbox-9" name="filter_checkbox" type="checkbox" class="checkbox"/>
													<label class="" for="filter_checkbox-9">Checkbox Nine</label>
												</div>
											</div>
										</div>
										
										<div class="mb-40"></div>
										
										<h4 class="section-title">What's excluded?</h4>
										
										<div class="row gap-15 mt-25">
											
											<div class="col-xs-12 col-xs-6 col-md-4">
												<div class="form-group">
													<input type="text" class="form-control">
												</div>
											</div>
											
											<div class="col-xs-12 col-xs-6 col-md-4">
												<div class="form-group">
													<input type="text" class="form-control">
												</div>
											</div>
											
											<div class="col-xs-12 col-xs-6 col-md-4">
												<div class="form-group">
													<input type="text" class="form-control">
												</div>
											</div>
											
											<div class="col-xs-12 col-xs-6 col-md-4">
												<div class="form-group">
													<input type="text" class="form-control">
												</div>
											</div>
											
											<div class="col-xs-12 col-xs-6 col-md-4">
												<div class="form-group">
													<input type="text" class="form-control">
												</div>
											</div>
											
											<div class="col-xs-12 col-xs-6 col-md-4">
												<div class="form-group">
													<input type="text" class="form-control">
												</div>
											</div>
											
											<div class="col-xs-12 col-xs-6 col-md-4">
												<div class="form-group">
													<input type="text" class="form-control">
												</div>
											</div>
											
											<div class="col-xs-12 col-xs-6 col-md-4">
												<div class="form-group">
													<input type="text" class="form-control">
												</div>
											</div>

											<div class="col-xs-12 col-xs-6 col-md-4">
												<div class="add-more-form">
													<span>Add/remove form</span> 
													<a href="#"><i class="ion-android-add-circle"></i></a> 
													<a href="#"><i class="ion-android-remove-circle"></i></a>
												</div>
											</div>
											
										</div>
										
										<div class="mb-30"></div>
										
										<h4 class="section-title">Gallery</h4>
										
										<div class="submite-list-box">
							
											<div id="file-submit" class="dropzone">
												<input name="file" type="file" multiple>
												<div class="dz-default dz-message"><span>Click or Drop Images Here</span></div>
											</div>
											
										</div>	

									</div>
								
									<div class="mb-50">
					
										<div class="checkbox-block font-icon-checkbox">
											<input id="term_accept-1" name="term_accept" type="checkbox" class="checkbox" />
											<label class="" for="term_accept-1">Am terminated it excellence invitation projection as. She graceful shy believed distance use nay. Lively is people so basket ladies window expect. <a href="#" class="font700">Terms &amp; Conditions</a></label>
										</div>
										
										<div class="mb-25"></div>
										
										<a href="requested-create-done.html" class="btn btn-primary btn-wide">Submit</a>
										<a href="#" class="btn btn-primary btn-wide btn-border">Save as draft</a>
										
									</div>
									
								</div>
								
							</div>
						
						</div>
						
					</div>
					
				</div>
			
			</div>

		</div>
@stop