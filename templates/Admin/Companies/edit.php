<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company $company
 * @var string[]|\Cake\Collection\CollectionInterface $cities
 * @var string[]|\Cake\Collection\CollectionInterface $categories
 */
?>
<?php
use Cake\Core\Configure;
use Cake\I18n\FrozenTime;

$this->Form->setTemplates(Configure::read('Templates.form'));
$this->assign('title', __('Edit') . ' ' . __('Company'));
?>
				<div id="form-row" class="companies row">
					<div class="col-xs-12 col-xl-10">
						<div class="card mb-3">
							<div class="card-header">

								<div class="float-start">
									<h3><i id="card-icon" class="fa fa-edit fa-spin"></i> <?= __('Edit') ?>: <?= __('Company') ?></h3>
									<?= __('The data marked with <span class="fw-bold text-danger">*</span> must be provided!') ?>
								</div>

								<div class="float-end ms-5">
									<?= $this->Html->link('<span class="btn btn-outline-secondary mt-1 me-1"><i class="fa fa-times"></i></span>',
										["controller" => "Companies", "action" => "index", "_full" => true],
										["escape" => false, "role" => "button"]
									); ?>

								</div>

								<div class="form-tab float-end">
									<ul class="nav nav-tabs mt-1" id="myTab" role="tablist">
										<li class="nav-item" role="presentation">
											<button class="nav-link active" id="tabMain" data-bs-toggle="tab" data-bs-target="#tabPanelMain" type="button" role="tab" aria-controls="tabPanelMain" aria-selected="true"><?= __('Basic data') ?></button>
										</li>

										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tabDescription" data-bs-toggle="tab" data-bs-target="#tabPanelDescription" type="button" role="tab" aria-controls="tabPanelDescription" aria-selected="false"><?= __('Description') ?></button>
										</li>

<?php /*
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tabSecond" data-bs-toggle="tab" data-bs-target="#tabPanelSecond" type="button" role="tab" aria-controls="tabPanelSecond" aria-selected="false"><?= __('Memo') ?></button>
										</li>
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tabMore" data-bs-toggle="tab" data-bs-target="#tabPanelMore" type="button" role="tab" aria-controls="tabPanelMore" aria-selected="false"><?= __('More') ?></button>
										</li>
*/ ?>

									</ul>
								</div>

							</div>

							<?= $this->Form->create($company, ['id' => 'main-form']) ?>
							
								<?php //= $this->Form->control('_csrfToken', ['name' => '_csrfToken', 'type' => 'hidden', 'value' => $this->request->getAttribute('csrfToken')] ) ?>

								<div class="card-body">
								
									<div class="tab-content" id="tabContent">
										
										<div class="tab-pane fade show active" id="tabPanelMain" role="tabpanel" aria-labelledby="tabMain" tabindex="0">

											<!-- 1. SELECT: city_id: integer  required -->
											<div class="mb-3 form-group row select required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="city-id"><?= __('City') ?> <span style="font-weight: normal;">(<?= __('Max') . ' ' . $max_distance ?> km)</span>:</label>
												<div class="col-md-3">
													<?= $this->Form->control('city_id', ['options' => $cities, 'placeholder' => __('Please select city'), 'class' => 'form-control select2', 'data-live-search' => true, 'data-container' => 'body', 'data-size' => '10', 'empty' => false]);	?>

												</div>
												<div class="col-md-1 text-end pt-1">
													<?= __('Lat') ?>: 
												</div>
												<div class="col-md-2">
													<?= $this->Form->control('latitude', ['label' => __('Latitude'), 'placeholder' => __('Latitude'), 'class' => 'form-control', 'empty' => false, 'autofocus' => false]); ?>
												</div>
												<div class="col-md-1 text-end pt-1">
													<?= __('Long') ?>: 
												</div>
												<div class="col-md-2">
													<?= $this->Form->control('longitude', ['label' => __('Longitude'), 'placeholder' => __('Longitude'), 'class' => 'form-control', 'empty' => false, 'autofocus' => false]); ?>
												</div>
											</div>

											<!-- 2. STRING: address: string  -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end" for="address"><?= __('Address') ?>:</label>
												<div class="col-md-7 pt-0">
													<?= $this->Form->control('address', ['label' => __('Address'), 'placeholder' => __('Address'), 'class' => 'form-control btn-xs', 'empty' => true]); ?>

												</div>
												<div class="col-md-2 text-end">
													<!-- a href="#collapseMap" role="button" class="btn btn-success btn-sm mt-1 me-1"><span class="btn-label"><i class="fa fa-plus"></i></span><?= __('Map') ?>&nbsp;</a-->
													<a id="btbMap" class="btn btn-primary" data-bs-toggle="collapse" href="#collapseMap" role="button" aria-expanded="false" aria-controls="collapseMap">Show map</a>
												</div>
											</div>

											<div class="collapse p-2 pb-1 mb-4" id="collapseMap" style="background-color: lightgray;">
												<!-- 2. STRING: keywords: string  -->
												<div class="mb-3 form-group row text required">
													<label class="col-form-label col-md-2 pt-1 text-start text-md-end" for="keywords"><?= __('Map') ?>:</label>
													<div class="col-md-9">
														<?= $this->Form->control('keywords', ['label' => __('Map'), 'placeholder' => __('Keywords'), 'class' => 'form-control', 'empty' => true]); ?>

													</div>
												</div>
											</div>

											<!-- 8. ELSE: action: char  required not in ['string', 'integer', 'datetime', 'date', 'time', 'boolean'] -->
											<?php //$this->Form->control('action', ['class' => 'form-control']); ?>
											<!-- 9. MULTISELECT: categories -->
											<div class="mb-3 form-group row select">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end" for="categories"><?= __('Categories') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('categories._ids', ['class' => 'form-control', 'placeholder' => __('Categories'), 'options' => $categories, 'data-live-search' => false, 'data-actions-box' => false, 'data-container' => 'body', 'data-size' => '6']); ?>
												</div>
											</div>
											
											<!-- 2. STRING: name: string  required -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="name"><?= __('Name') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('name', ['label' => __('Name'), 'placeholder' => __('Name'), 'class' => 'form-control', 'empty' => false, 'autofocus' => true]); ?>

												</div>
											</div>

											<!-- 2. STRING: title: string  -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end" for="title"><?= __('Title') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('title', ['label' => __('Title'), 'placeholder' => __('Title'), 'class' => 'form-control', 'empty' => true]); ?>

												</div>
											</div>

											<!-- 2. STRING: keywords: string  -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end" for="keywords"><?= __('Keywords') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('keywords', ['label' => __('Keywords'), 'placeholder' => __('Keywords'), 'class' => 'form-control', 'empty' => true]); ?>

												</div>
											</div>

											<!-- 2. STRING: email: string  -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end" for="email"><?= __('Email') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('email', ['label' => __('Email'), 'placeholder' => __('Email'), 'class' => 'form-control', 'empty' => true]); ?>

												</div>
											</div>

											<!-- 2. STRING: email: string  -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end" for="email"><?= __('Web') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('web', ['label' => __('Web'), 'placeholder' => __('Web'), 'class' => 'form-control', 'empty' => true]); ?>

												</div>
											</div>

											<!-- 2. STRING: phone: string  -->
											<div class="mb-3 form-group row text required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end" for="phone"><?= __('Phone') ?>:</label>
												<div class="col-md-9">
													<?= $this->Form->control('phone', ['label' => __('Phone'), 'placeholder' => __('Phone'), 'class' => 'form-control', 'empty' => true]); ?>

												</div>
											</div>

											<!-- 7. BOOLEAN: visible: boolean  required -->
											<div class="mb-3 form-group row checkbox">
												<div class="col-sm-2 col-form-label required"></div>
												<div class="col-sm-10">
													<?= $this->Form->control('visible', ['empty' => false]); ?>

												</div>
											</div>

											<!-- 3. INTEGER: pos: integer  required -->
											<div class="mb-3 form-group row number required">
												<label class="col-form-label col-md-2 pt-1 text-start text-md-end required" for="pos"><?= __('Pos') ?>:</label>
												<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xxl-4">
													<?= $this->Form->control('pos', ['class' => 'form-control', 'placeholder' => __('Pos'), 'data-decimals' => '0', 'min' => '0', 'max' => '999999999999', 'step' => '1', 'empty' => false]); ?>

												</div>
											</div>

										</div><!-- /.tabPanelMain -->
										
										
										<!-- TabPanel: tabPanelDescription -->
										<!-- 10. TEXT: description: text  -->
										<div class="tab-pane fade" id="tabPanelDescription" role="tabpanel" aria-labelledby="tabDescription" tabindex="0">
											<div class="row mb-3">
												<div class="col-sm-12">
													<?= $this->Form->control('description', ['id' => 'description', 'label' => false, 'class' => 'summernote', 'empty' => true]); ?>

												</div>
											</div>
										</div><!-- /.TabPanel: tabPanelDescription -->

<?php /*											
										<div class="tab-pane fade" id="tabPanelMore" role="tabpanel" aria-labelledby="tabMore" tabindex="0">
											<h3>More content come here...</h3>

										</div><!-- /.N.TAB -->
*/ ?>

									</div><!-- /.TAB PANEL -->
										
								</div>

								<div class="card-footer text-center">
									<?= $this->Form->button('<span class="btn-label"><i class="fa fa-save"></i></span>' . __('Save'), ["escapeTitle" => false, "type" => "submit", "class" => "btn btn-primary me-4"]) ?>
									
									<?= $this->Html->link('<span class="btn-label"><i class="fa fa-arrow-up"></i></span>' . __("Cancel"),
										["controller" => "Companies", "action" => "index", "_full" => true],
										["escape" => false, "role" => "button", "class" => "btn btn-outline-secondary"]
									); ?>
									
								</div>

							<?= $this->Form->end() ?>

						</div><!-- end card-->
                    </div>


				</div>			


<?php
	$this->Html->css(
		[
			"jeffAdmin5./assets/plugins/tempus-dominus-6.0.0/dist/css/tempus-dominus.min",
			"jeffAdmin5./assets/plugins/summernote-0.8.18-dist/summernote-lite.min",
			"jeffAdmin5./assets/plugins/bootstrap-select-main/docs/docs/dist/css/bootstrap-select.min",
			"jeffAdmin5./assets/plugins/icheck-1.0.3/skins/all",

			// "jeffAdmin5./assets/plugins/select2-4.1.0-rc.0/dist/css/select2.min",	// If you want to use Select 2, but it's not finish!!!
			// "jeffAdmin5./assets/css/select2-bootstrap-5-theme.min",					// If you want to use Select 2, but it's not finish!!!
		],
		['block' => true]);


	$this->Html->script(
		[
			"jeffAdmin5./assets/js/popper",
			"jeffAdmin5./assets/plugins/tempus-dominus-6.0.0/dist/js/tempus-dominus.min",	// Must be loaded the popper.js !!
			"jeffAdmin5./assets/plugins/bootstrap-input-spinner-bs-5/src/bootstrap-input-spinner",
			"jeffAdmin5./assets/plugins/summernote-0.8.18-dist/summernote-lite.min",
			"jeffAdmin5./assets/plugins/summernote-0.8.18-dist/lang/summernote-hu-HU",
			//'jeffAdmin5./assets/plugins/jReadMore-master/dist/read-more.min',
			"jeffAdmin5./assets/plugins/bootstrap-select-main/docs/docs/dist/js/bootstrap-select.min",
			"jeffAdmin5./assets/plugins/bootstrap-select-main/docs/docs/dist/js/i18n/defaults-hu_HU.min",
			"jeffAdmin5./assets/plugins/icheck-1.0.3/icheck.min",
			
			//'jeffAdmin5./assets/plugins/select2-4.1.0-rc.0/dist/js/select2.full.min',	// If you want to use Select 2, but it's not finish!!!
			//'jeffAdmin5./assets/plugins/select2-4.1.0-rc.0/dist/js/i18n/hu',			// If you want to use Select 2, but it's not finish!!!
		],
		['block' => 'scriptBottom']
	); ?>
		
<?php
	// SELECT: https://developer.snapappointments.com/bootstrap-select/examples/
?>

<?php $this->Html->scriptStart(['block' => 'javaScriptBottom']); ?>

	jeffAdminInitSelectPicker()
	jeffAdminInitInputSpinner()
	jeffAdminInitSummerNote('description', 400, '<?= __("Here you can write the note") ?>...') // Init SummerNote for description.
	jeffAdminInitICheck('icheckbox_flat-blue');

	$(document).ready( function(){
		
		var csrfToken = $('meta[name="csrfToken"]').attr('content');
		
		$('#button-submit').click( function(){
			$('#main-form').submit();
		});
		
		$('#city-id').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
			let id = $(this).val();
			let latitude = '';
			let longitude = '';

			$.ajax({
				dataType: 'json',
				headers: { 'X-XSRF-TOKEN' : csrfToken },
				beforeSend: function (xhr) {
					xhr.setRequestHeader('X-CSRF-Token', csrfToken);
				},
				type: "POST",
				url: "/api-v1/cities/getGeoCoordinates/" + id + ".json",
				success: function(response){
					$("#latitude").val(response.latitude);
					$("#longitude").val(response.longitude);
				}
			});			

<?php /*
				//data: JSON.stringify({ id: id }),
				//dataType: "json",
				
				//$( "#result" ).empty().append( response );
*/ ?>

		});

		$("#collapseMap").on('hide.bs.collapse', function () {
			$("#btbMap").text('Show map');
		})

		$("#collapseMap").on('show.bs.collapse', function () {
			$("#btbMap").text('Hide map');
		})

	});			

	//const collapseMap = document.getElementById('collapseMap')
	//collapseMap.addEventListener('hide.bs.collapse', event => {
	//	$("#btbMap").text('Show map');
	//	//console.log(event);
	//})
	//collapseMap.addEventListener('show.bs.collapse', event => {
	//	$("#btbMap").text('Hide map');
	//	//console.log(event);
	//})


<?php $this->Html->scriptEnd(['block' => 'javaScriptBottom']); ?>
