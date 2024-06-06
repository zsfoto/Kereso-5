<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company $company
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
									<h3><i id="card-icon" class="fa fa-eye fa-spin"></i> <?= __('View') ?>: <?= __('Company') ?></h3>
									<?= __('The data marked with <span class="fw-bold text-danger">*</span> must be provided!') ?>
								</div>
								<div class="float-end ms-5">
									<?= $this->Html->link('<span class="btn btn-outline-secondary mt-1 me-1"><i class="fa fa-times"></i></span>',
										["controller" => "Companies", "action" => "index", "_full" => true],
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
<?php if (!empty($company->categories)) : ?>
												<li><?= $this->Html->link(__('Categories') . '...', ['controller' => 'Categories', 'action' => 'index', 'parent', 'company', $company->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
<?php if (!empty($company->companyopenings)) : ?>
												<li><?= $this->Html->link(__('Companyopenings') . '...', ['controller' => 'Companyopenings', 'action' => 'index', 'parent', 'company', $company->id], ['class' => 'dropdown-item']) ?></li>
<?php endif ?>
<?php if (!empty($company->persons)) : ?>
												<li><?= $this->Html->link(__('Persons') . '...', ['controller' => 'Persons', 'action' => 'index', 'parent', 'company', $company->id], ['class' => 'dropdown-item']) ?></li>
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
													<?= $company->id ?><!-- 0.a -->
												</div>
											</div>
<?php } ?>
											<div class="row"><!-- 1. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('City') ?>:</label>
												<div class="col-sm-10 p-1 link">
													<?= $company->hasValue('city') ? $this->Html->link($company->city->name, ['controller' => 'Cities', 'action' => 'view', $company->city->id]) : '' ?><span class="external-link-icon"><i class="fa fa-external-link" aria-hidden="true"></i></span>
												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Name') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($company->name) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Slug') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($company->slug) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Title') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($company->title) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Keywords') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($company->keywords) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Keywords Slug') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($company->keywords_slug) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Email') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($company->email) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Phone') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($company->phone) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Address') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($company->address) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Action') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($company->action) ?>

												</div>
											</div>
<?php /*
											<div class="row"><!-- 6. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Description') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Text->autoParagraph(h($company->description)) ?>

												</div>
											</div>
*/ ?>
<?php if($config['show_counters']){ ?>
											<div class="row"><!-- counter helper -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Category Count') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($company->category_count) ?><!-- 3.b -->
												</div>
											</div>
<?php } ?>

<?php if($config['show_counters']){ ?>
											<div class="row"><!-- counter helper -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Person Count') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($company->person_count) ?><!-- 3.b -->
												</div>
											</div>
<?php } ?>


										</div><!-- /.1.TAB -->
										
										<!-- TAB for: Description text field -->
										<div class="tab-pane fade" id="tabPanelDescription" role="tabpanel" aria-labelledby="tabDescription" tabindex="0">
											<div class="row">
												<div class="col-sm-12">
													<div class="row">
														<div id="readMoreDescription" class="col-sm-12 p-2 text read-more">
															<?= $this->Text->autoParagraph($company->description) ?>

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
<?php if (!empty($company->categories)): ?>
											<button class="nav-link active" id="nav-categories-tab" data-bs-toggle="tab" data-bs-target="#nav-categories" type="button" role="tab" aria-controls="nav-categories" aria-selected="true">
												<?= __('Categories') ?>
											</button>
<?php endif ?>
<?php if (!empty($company->companyopenings)): ?>
											<button class="nav-link" id="nav-companyopenings-tab" data-bs-toggle="tab" data-bs-target="#nav-companyopenings" type="button" role="tab" aria-controls="nav-companyopenings" aria-selected="true">
												<?= __('Companyopenings') ?>
											</button>
<?php endif ?>
<?php if (!empty($company->persons)): ?>
											<button class="nav-link" id="nav-persons-tab" data-bs-toggle="tab" data-bs-target="#nav-persons" type="button" role="tab" aria-controls="nav-persons" aria-selected="true">
												<?= __('Persons') ?>
											</button>
<?php endif ?>
										</div>
									</nav>
								</div>

							</div><!-- /card header -->
								
							<div class="card-body p-1 pb-0">

								<div class="tab-content" id="nav-tabContent">

<?php if (!empty($company->categories)): ?>

									<div class="tab-pane fade show active p-0" id="nav-categories" role="tabpanel" aria-labelledby="nav-categories-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="string name"><?= __('Name') ?></th>
													<th class="please-change-type slug"><?= __('Slug') ?></th>
													<th class="please-change-type description"><?= __('Description') ?></th>
													<th class="please-change-type keywords"><?= __('Keywords') ?></th>
													<th class="please-change-type keywords-slug"><?= __('Keywords Slug') ?></th>
													<th class="please-change-type icon-type"><?= __('Icon Type') ?></th>
													<th class="please-change-type icon"><?= __('Icon') ?></th>
<?php if($config['index_show_pos']){ ?>
													<th class="number pos"><?= __('Pos') ?></th>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<th class="boolean visible"><?= __('Visible') ?></th>
<?php } ?>
<?php if($config['index_show_counters']){ ?>
													<th class="number company-count"><?= __('Company Count') ?></th>
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
												<?php foreach ($company->categories as $categories) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $categories->id ?>"><?= h($categories->id) ?></td>
<?php } ?>
													<td class="string name" value="<?= $categories->name ?>"><?= h($categories->name) ?></td>
													<td class="please-change-type slug" value="<?= $categories->slug ?>"><?= h($categories->slug) ?></td>
													<td class="please-change-type description" value="<?= $categories->description ?>"><?= h($categories->description) ?></td>
													<td class="please-change-type keywords" value="<?= $categories->keywords ?>"><?= h($categories->keywords) ?></td>
													<td class="please-change-type keywords-slug" value="<?= $categories->keywords_slug ?>"><?= h($categories->keywords_slug) ?></td>
													<td class="please-change-type icon-type" value="<?= $categories->icon_type ?>"><?= h($categories->icon_type) ?></td>
													<td class="please-change-type icon" value="<?= $categories->icon ?>"><?= h($categories->icon) ?></td>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $categories->pos ?>"><?= h($categories->pos) ?></td>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $categories->visible ?>"><?= h($categories->visible) ?></td>
<?php } ?>
<?php if($config['index_show_counters']){ ?>
													<td class="number company-count" value="<?= $categories->company_count ?>"><?= h($categories->company_count) ?></td>
<?php } ?>
													<td class="please-change-type action" value="<?= $categories->action ?>"><?= h($categories->action) ?></td>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $categories->created ?>"><?= h($categories->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $categories->modified ?>"><?= h($categories->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Categories', 'action' => 'view', $categories->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Categories', 'action' => 'edit', $categories->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Categories', 'action' => 'delete', $categories->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $categories->id)]) ?><!-- delete button -->
													</td>
												</tr>
												<?php endforeach ?>

											</tbody>
										</table>

									</div><!-- /tab pane -->
<?php endif ?>
<?php if (!empty($company->companyopenings)): ?>

									<div class="tab-pane fade p-0" id="nav-companyopenings" role="tabpanel" aria-labelledby="nav-companyopenings-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="please-change-type company-id"><?= __('Company Id') ?></th>
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
												<?php foreach ($company->companyopenings as $companyopenings) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $companyopenings->id ?>"><?= h($companyopenings->id) ?></td>
<?php } ?>
													<td class="please-change-type company-id" value="<?= $companyopenings->company_id ?>"><?= h($companyopenings->company_id) ?></td>
													<td class="string name" value="<?= $companyopenings->name ?>"><?= h($companyopenings->name) ?></td>
													<td class="please-change-type open-from" value="<?= $companyopenings->open_from ?>"><?= h($companyopenings->open_from) ?></td>
													<td class="please-change-type open-to" value="<?= $companyopenings->open_to ?>"><?= h($companyopenings->open_to) ?></td>
													<td class="please-change-type open-comment" value="<?= $companyopenings->open_comment ?>"><?= h($companyopenings->open_comment) ?></td>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $companyopenings->pos ?>"><?= h($companyopenings->pos) ?></td>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $companyopenings->visible ?>"><?= h($companyopenings->visible) ?></td>
<?php } ?>
													<td class="please-change-type action" value="<?= $companyopenings->action ?>"><?= h($companyopenings->action) ?></td>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $companyopenings->created ?>"><?= h($companyopenings->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $companyopenings->modified ?>"><?= h($companyopenings->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Companyopenings', 'action' => 'view', $companyopenings->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Companyopenings', 'action' => 'edit', $companyopenings->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Companyopenings', 'action' => 'delete', $companyopenings->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $companyopenings->id)]) ?><!-- delete button -->
													</td>
												</tr>
												<?php endforeach ?>

											</tbody>
										</table>

									</div><!-- /tab pane -->
<?php endif ?>
<?php if (!empty($company->persons)): ?>

									<div class="tab-pane fade p-0" id="nav-persons" role="tabpanel" aria-labelledby="nav-persons-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="please-change-type company-id"><?= __('Company Id') ?></th>
													<th class="string name"><?= __('Name') ?></th>
													<th class="please-change-type slug"><?= __('Slug') ?></th>
													<th class="string title"><?= __('Title') ?></th>
													<th class="please-change-type description"><?= __('Description') ?></th>
													<th class="please-change-type email"><?= __('Email') ?></th>
													<th class="please-change-type email2"><?= __('Email2') ?></th>
													<th class="please-change-type keywords"><?= __('Keywords') ?></th>
													<th class="please-change-type keywords-slug"><?= __('Keywords Slug') ?></th>
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
												<?php foreach ($company->persons as $persons) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $persons->id ?>"><?= h($persons->id) ?></td>
<?php } ?>
													<td class="please-change-type company-id" value="<?= $persons->company_id ?>"><?= h($persons->company_id) ?></td>
													<td class="string name" value="<?= $persons->name ?>"><?= h($persons->name) ?></td>
													<td class="please-change-type slug" value="<?= $persons->slug ?>"><?= h($persons->slug) ?></td>
													<td class="string title" value="<?= $persons->title ?>"><?= h($persons->title) ?></td>
													<td class="please-change-type description" value="<?= $persons->description ?>"><?= h($persons->description) ?></td>
													<td class="please-change-type email" value="<?= $persons->email ?>"><?= h($persons->email) ?></td>
													<td class="please-change-type email2" value="<?= $persons->email2 ?>"><?= h($persons->email2) ?></td>
													<td class="please-change-type keywords" value="<?= $persons->keywords ?>"><?= h($persons->keywords) ?></td>
													<td class="please-change-type keywords-slug" value="<?= $persons->keywords_slug ?>"><?= h($persons->keywords_slug) ?></td>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $persons->pos ?>"><?= h($persons->pos) ?></td>
<?php } ?>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $persons->visible ?>"><?= h($persons->visible) ?></td>
<?php } ?>
													<td class="please-change-type action" value="<?= $persons->action ?>"><?= h($persons->action) ?></td>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $persons->created ?>"><?= h($persons->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $persons->modified ?>"><?= h($persons->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Persons', 'action' => 'view', $persons->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Persons', 'action' => 'edit', $persons->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Persons', 'action' => 'delete', $persons->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $persons->id)]) ?><!-- delete button -->
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
