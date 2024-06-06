<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */
use Cake\Core\Configure;

$prefix = strtolower( $this->request->getParam('prefix') ?? '' );
$controller = $this->request->getParam('controller');
$action = $this->request->getParam('action');

$global_config = (array) Configure::read('Theme.' . $prefix . '.config.template.view');
$local_config = [
	// #################################### More config params in: \JeffAdmin5\config\config.php ####################################
	//'show_related_tables'	=> false,
	//'show_id' 			=> false,	// for view form
	//'show_pos' 	 		=> false,	// for view form
	//'show_counters' 		=> false,	// for view form
	//'index_show_id' 		=> false,	// for related tables
	//'index_show_visible' 	=> false,	// for related tables
	//'index_show_counters'	=> false,	// for related tables
];
$config = array_merge($global_config, $local_config);
?>
				<div class="view row">
					<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
						<div class="card mb-3">

							<div class="card-header">
								<div class="float-start">
									<h3><i id="card-icon" class="fa fa-eye fa-spin"></i> <?= __('View') ?>: <?= __('Person') ?></h3>
									<?= __('The data marked with <span class="fw-bold text-danger">*</span> must be provided!') ?>
								</div>
								<div class="float-end ms-5">
									<?= $this->Html->link('<span class="btn btn-outline-secondary mt-1 me-1"><i class="fa fa-times"></i></span>',
										["controller" => "Persons", "action" => "index", "_full" => true],
										["escape" => false, "role" => "button"]
									) ?>
								</div>

								<div class="form-tab float-end">
									<ul class="nav nav-tabs mt-1" id="myTab" role="tablist">
										<li class="nav-item" role="presentation">
											<button class="nav-link active" id="tab-first" data-bs-toggle="tab" data-bs-target="#tabPanelMain" type="button" role="tab" aria-controls="tabPanelMain" aria-selected="true"><?= __('Basic data') ?></button>
										</li>

										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tabDescription" data-bs-toggle="tab" data-bs-target="#tabPanelDescription" type="button" role="tab" aria-controls="tabPanelDescription" aria-selected="false"><?= __('Description') ?></button>
										</li>

<?php /*
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="tab-more" data-bs-toggle="tab" data-bs-target="#tab-panel-more" type="button" role="tab" aria-controls="tab-panel-more" aria-selected="false"><?= __('More') ?></button>
										</li>
*/ ?>

										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><?= __('Related tables') ?></a>
											<ul class="dropdown-menu">
<?php if (!empty($person->emails)) : ?>
												<li><?= $this->Html->link(__('Emails') . '...', ['controller' => 'Emails', 'action' => 'index', 'parent', 'person', $person->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
<?php if (!empty($person->personopenings)) : ?>
												<li><?= $this->Html->link(__('Personopenings') . '...', ['controller' => 'Personopenings', 'action' => 'index', 'parent', 'person', $person->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
<?php if (!empty($person->phones)) : ?>
												<li><?= $this->Html->link(__('Phones') . '...', ['controller' => 'Phones', 'action' => 'index', 'parent', 'person', $person->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
											</ul>
										</li>

									</ul>
								</div>

							</div><!-- /card header -->
							
							<div class="card-body">
								<form>
									<div class="tab-content" id="tabContent"><!-- T.1. -->
										
										<div class="tab-pane fade show active" id="tabPanelMain" role="tabpanel" aria-labelledby="tab-first" tabindex="0">
<?php if($config['show_id']){ ?>
											<div class="row"><!-- 3. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end">#<?= __('id') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $person->id ?><!-- 0.a -->
												</div>
											</div>
<?php } ?>
											<div class="row"><!-- 1. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Company') ?>:</label>
												<div class="col-sm-10 p-1 link">
													<?= $person->hasValue('company') ? $this->Html->link($person->company->title, ['controller' => 'Companies', 'action' => 'view', $person->company->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span>
												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Name') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($person->name) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Slug') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($person->slug) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Title') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($person->title) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Email') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($person->email) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Email2') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($person->email2) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Keywords') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($person->keywords) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Keywords Slug') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($person->keywords_slug) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Action') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($person->action) ?>

												</div>
											</div>
<?php /*
											<div class="row"><!-- 6. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Description') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Text->autoParagraph(h($person->description)) ?>

												</div>
											</div>
*/ ?>

										</div><!-- /.1.TAB -->
										
										<!-- TAB for: Description text field -->
										<div class="tab-pane fade" id="tabPanelDescription" role="tabpanel" aria-labelledby="tabDescription" tabindex="0">
											<div class="row">
												<div class="col-sm-12">
													<div class="row">
														<div id="readMoreDescription" class="col-sm-12 p-2 text read-more">
															<?= $this->Text->autoParagraph($person->description) ?>

														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- /.TAB for: Description text field-->
										

<?php /*
											
										<div class="tab-pane fade" id="tab-panel-more" role="tabpanel" aria-labelledby="tab-more" tabindex="0">
											<div class="row"><!-- T.3. -->
												<div class="col-sm-12">
													<h3>Tab 3 content</h3>
													
												</div>
											</div>
										</div><!-- /.3.TAB -->
*/ ?>

									</div><!-- /.TAB PANEL -->

								</form>
							</div><!-- /card body -->
									
						    <div class="card-footer">
								<!--button type="submit" class="btn btn-outline-secondary">&larr;&nbsp;Vissza a listához</button-->
							</div><!-- /card footer -->

						</div><!-- end card-->
                    </div>

				</div>

<?php /*
	############################################################################################################################################################
	#################################################################                  #########################################################################
	#################################################################  Related tebles  #########################################################################
	#################################################################                  #########################################################################
	############################################################################################################################################################
*/ ?>
<?php if($config['show_related_tables']): ?>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="card mb-3">

							<div class="card-header">
							
								<div class="float-start">
									<h3><i class="fa fa-table"></i> <?= __('Related tables') ?></h3>
									<?= __('Here you can see the latest records related to the above item.') ?>
								</div>

								<div class="form-tab float-end">
									<nav>
										<div class="nav nav-tabs mt-1" id="nav-tab" role="tablist">
<?php if (!empty($person->emails)): ?>
											<button class="nav-link active" id="nav-emails-tab" data-bs-toggle="tab" data-bs-target="#nav-emails" type="button" role="tab" aria-controls="nav-emails" aria-selected="true">
												<?= __('Emails') ?>
											</button>
<?php endif ?>
<?php if (!empty($person->personopenings)): ?>
											<button class="nav-link" id="nav-personopenings-tab" data-bs-toggle="tab" data-bs-target="#nav-personopenings" type="button" role="tab" aria-controls="nav-personopenings" aria-selected="true">
												<?= __('Personopenings') ?>
											</button>
<?php endif ?>
<?php if (!empty($person->phones)): ?>
											<button class="nav-link" id="nav-phones-tab" data-bs-toggle="tab" data-bs-target="#nav-phones" type="button" role="tab" aria-controls="nav-phones" aria-selected="true">
												<?= __('Phones') ?>
											</button>
<?php endif ?>
										</div>
									</nav>
								</div>

							</div><!-- /card header -->
								
							<div class="card-body p-1 pb-0">

								<div class="tab-content" id="nav-tabContent">

<?php if (!empty($person->emails)): ?>

									<div class="tab-pane fade show active p-0" id="nav-emails" role="tabpanel" aria-labelledby="nav-emails-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="please-change-type person-id"><?= __('Person Id') ?></th>
													<th class="string name"><?= __('Name') ?></th>
													<th class="please-change-type email"><?= __('Email') ?></th>
													<th class="please-change-type action"><?= __('Action') ?></th>
<?php if($config['index_show_pos']){ ?>
													<th class="number pos"><?= __('Pos') ?></th>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<th class="boolean visible"><?= __('Visible') ?></th>
<?php } ?>
<?php if($config['index_show_created']){ ?>
													<th class="datetime created"><?= __('Created') ?></th>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<th class="datetime modified"><?= __('Modified') ?></th>
<?php } ?>
													<th class="actions"><?= __('Actions') ?></th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($person->emails as $emails) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $emails->id ?>"><?= h($emails->id) ?></td>
<?php } ?>
													<td class="please-change-type person-id" value="<?= $emails->person_id ?>"><?= h($emails->person_id) ?></td>
													<td class="string name" value="<?= $emails->name ?>"><?= h($emails->name) ?></td>
													<td class="please-change-type email" value="<?= $emails->email ?>"><?= h($emails->email) ?></td>
													<td class="please-change-type action" value="<?= $emails->action ?>"><?= h($emails->action) ?></td>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $emails->pos ?>"><?= h($emails->pos) ?></td>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $emails->visible ?>"><?= h($emails->visible) ?></td>
<?php } ?>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $emails->created ?>"><?= h($emails->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $emails->modified ?>"><?= h($emails->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Emails', 'action' => 'view', $emails->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Emails', 'action' => 'edit', $emails->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Emails', 'action' => 'delete', $emails->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $emails->id)]) ?><!-- delete button -->
													</td>
												</tr>
												<?php endforeach ?>

											</tbody>
										</table>

									</div><!-- /tab pane -->
<?php endif ?>
<?php if (!empty($person->personopenings)): ?>

									<div class="tab-pane fade p-0" id="nav-personopenings" role="tabpanel" aria-labelledby="nav-personopenings-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="please-change-type person-id"><?= __('Person Id') ?></th>
													<th class="string name"><?= __('Name') ?></th>
													<th class="please-change-type open-from"><?= __('Open From') ?></th>
													<th class="please-change-type open-to"><?= __('Open To') ?></th>
													<th class="please-change-type open-comment"><?= __('Open Comment') ?></th>
<?php if($config['index_show_pos']){ ?>
													<th class="number pos"><?= __('Pos') ?></th>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<th class="boolean visible"><?= __('Visible') ?></th>
<?php } ?>
													<th class="please-change-type action"><?= __('Action') ?></th>
<?php if($config['index_show_created']){ ?>
													<th class="datetime created"><?= __('Created') ?></th>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<th class="datetime modified"><?= __('Modified') ?></th>
<?php } ?>
													<th class="actions"><?= __('Actions') ?></th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($person->personopenings as $personopenings) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $personopenings->id ?>"><?= h($personopenings->id) ?></td>
<?php } ?>
													<td class="please-change-type person-id" value="<?= $personopenings->person_id ?>"><?= h($personopenings->person_id) ?></td>
													<td class="string name" value="<?= $personopenings->name ?>"><?= h($personopenings->name) ?></td>
													<td class="please-change-type open-from" value="<?= $personopenings->open_from ?>"><?= h($personopenings->open_from) ?></td>
													<td class="please-change-type open-to" value="<?= $personopenings->open_to ?>"><?= h($personopenings->open_to) ?></td>
													<td class="please-change-type open-comment" value="<?= $personopenings->open_comment ?>"><?= h($personopenings->open_comment) ?></td>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $personopenings->pos ?>"><?= h($personopenings->pos) ?></td>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $personopenings->visible ?>"><?= h($personopenings->visible) ?></td>
<?php } ?>
													<td class="please-change-type action" value="<?= $personopenings->action ?>"><?= h($personopenings->action) ?></td>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $personopenings->created ?>"><?= h($personopenings->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $personopenings->modified ?>"><?= h($personopenings->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Personopenings', 'action' => 'view', $personopenings->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Personopenings', 'action' => 'edit', $personopenings->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Personopenings', 'action' => 'delete', $personopenings->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $personopenings->id)]) ?><!-- delete button -->
													</td>
												</tr>
												<?php endforeach ?>

											</tbody>
										</table>

									</div><!-- /tab pane -->
<?php endif ?>
<?php if (!empty($person->phones)): ?>

									<div class="tab-pane fade p-0" id="nav-phones" role="tabpanel" aria-labelledby="nav-phones-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="please-change-type person-id"><?= __('Person Id') ?></th>
<?php if($config['index_show_counters']){ ?>
													<th class="number phone-country"><?= __('Phone Country') ?></th>
<?php } ?>
													<th class="please-change-type phone-area"><?= __('Phone Area') ?></th>
													<th class="please-change-type phone-number"><?= __('Phone Number') ?></th>
													<th class="please-change-type phone-annex"><?= __('Phone Annex') ?></th>
<?php if($config['index_show_pos']){ ?>
													<th class="number pos"><?= __('Pos') ?></th>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<th class="boolean visible"><?= __('Visible') ?></th>
<?php } ?>
													<th class="please-change-type action"><?= __('Action') ?></th>
<?php if($config['index_show_created']){ ?>
													<th class="datetime created"><?= __('Created') ?></th>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<th class="datetime modified"><?= __('Modified') ?></th>
<?php } ?>
													<th class="actions"><?= __('Actions') ?></th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($person->phones as $phones) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $phones->id ?>"><?= h($phones->id) ?></td>
<?php } ?>
													<td class="please-change-type person-id" value="<?= $phones->person_id ?>"><?= h($phones->person_id) ?></td>
<?php if($config['index_show_counters']){ ?>
													<td class="number phone-country" value="<?= $phones->phone_country ?>"><?= h($phones->phone_country) ?></td>
<?php } ?>
													<td class="please-change-type phone-area" value="<?= $phones->phone_area ?>"><?= h($phones->phone_area) ?></td>
													<td class="please-change-type phone-number" value="<?= $phones->phone_number ?>"><?= h($phones->phone_number) ?></td>
													<td class="please-change-type phone-annex" value="<?= $phones->phone_annex ?>"><?= h($phones->phone_annex) ?></td>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $phones->pos ?>"><?= h($phones->pos) ?></td>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $phones->visible ?>"><?= h($phones->visible) ?></td>
<?php } ?>
													<td class="please-change-type action" value="<?= $phones->action ?>"><?= h($phones->action) ?></td>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $phones->created ?>"><?= h($phones->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $phones->modified ?>"><?= h($phones->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Phones', 'action' => 'view', $phones->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Phones', 'action' => 'edit', $phones->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Phones', 'action' => 'delete', $phones->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $phones->id)]) ?><!-- delete button -->
													</td>
												</tr>
												<?php endforeach ?>

											</tbody>
										</table>

									</div><!-- /tab pane -->
<?php endif ?>

								</div><!-- /tab content -->

							</div><!-- /card body -->

						    <div class="card-footer">
								<!-- Bottom text! -->
							</div><!-- /card footer -->
							
						</div><!-- end card -->
                    </div><!-- end col -->
				</div><!-- end row -->
<?php endif // $config['show_related_tables'] ?>

<?php
	$this->Html->css(
		[
			//// 'JeffAdmin5./assets/plugins/',
		],
		['block' => true]
	);

	$this->Html->script(
		[
			//// 'JeffAdmin5./assets/plugins/',
		],
		['block' => 'scriptBottom']
	);
?>

<?php $this->Html->scriptStart(['block' => 'javaScriptBottom']) ?>

<?php $this->Html->scriptEnd() ?>
