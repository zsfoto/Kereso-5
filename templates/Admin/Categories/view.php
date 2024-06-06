<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
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
									<h3><i id="card-icon" class="fa fa-eye fa-spin"></i> <?= __('View') ?>: <?= __('Category') ?></h3>
									<?= __('The data marked with <span class="fw-bold text-danger">*</span> must be provided!') ?>
								</div>
								<div class="float-end ms-5">
									<?= $this->Html->link('<span class="btn btn-outline-secondary mt-1 me-1"><i class="fa fa-times"></i></span>',
										["controller" => "Categories", "action" => "index", "_full" => true],
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
<?php if (!empty($category->companies)) : ?>
												<li><?= $this->Html->link(__('Companies') . '...', ['controller' => 'Companies', 'action' => 'index', 'parent', 'category', $category->id], ['class' => 'dropdown-item']) ?></li>
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
													<?= $category->id ?><!-- 0.a -->
												</div>
											</div>
<?php } ?>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Name') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($category->name) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Slug') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($category->slug) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Keywords') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($category->keywords) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Keywords Slug') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($category->keywords_slug) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Icon Type') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($category->icon_type) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Icon') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($category->icon) ?>

												</div>
											</div>
											<div class="row"><!-- 2. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Action') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= h($category->action) ?>

												</div>
											</div>
<?php /*
											<div class="row"><!-- 6. -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Description') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Text->autoParagraph(h($category->description)) ?>

												</div>
											</div>
*/ ?>
<?php if($config['show_counters']){ ?>
											<div class="row"><!-- counter helper -->
												<label class="col-sm-2 col-form-label p-1 text-start text-sm-end"><?= __('Company Count') ?>:</label>
												<div class="col-sm-10 p-1">
													<?= $this->Number->format($category->company_count) ?><!-- 3.b -->
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
															<?= $this->Text->autoParagraph($category->description) ?>

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
<?php if (!empty($category->companies)): ?>
											<button class="nav-link active" id="nav-companies-tab" data-bs-toggle="tab" data-bs-target="#nav-companies" type="button" role="tab" aria-controls="nav-companies" aria-selected="true">
												<?= __('Companies') ?>
											</button>
<?php endif ?>
										</div>
									</nav>
								</div>

							</div><!-- /card header -->
								
							<div class="card-body p-1 pb-0">

								<div class="tab-content" id="nav-tabContent">

<?php if (!empty($category->companies)): ?>

									<div class="tab-pane fade show active p-0" id="nav-companies" role="tabpanel" aria-labelledby="nav-companies-tab" tabindex="0">

										<table class="table table-responsive-xl table-hover table-striped" style="">
											<thead class="thead-info">
												<tr>
<?php if($config['index_show_id']){ ?>
													<th class="number id"><?= __('Id') ?></th>
<?php } ?>
													<th class="please-change-type city-id"><?= __('City Id') ?></th>
													<th class="string name"><?= __('Name') ?></th>
													<th class="please-change-type slug"><?= __('Slug') ?></th>
													<th class="string title"><?= __('Title') ?></th>
													<th class="please-change-type description"><?= __('Description') ?></th>
													<th class="please-change-type keywords"><?= __('Keywords') ?></th>
													<th class="please-change-type keywords-slug"><?= __('Keywords Slug') ?></th>
													<th class="please-change-type email"><?= __('Email') ?></th>
													<th class="please-change-type phone"><?= __('Phone') ?></th>
													<th class="please-change-type address"><?= __('Address') ?></th>
<?php if($config['index_show_visible']){ ?>
													<th class="boolean visible"><?= __('Visible') ?></th>
<?php } ?>
<?php if($config['index_show_pos']){ ?>
													<th class="number pos"><?= __('Pos') ?></th>
<?php } ?>
<?php if($config['index_show_counters']){ ?>
													<th class="number category-count"><?= __('Category Count') ?></th>
<?php } ?>
<?php if($config['index_show_counters']){ ?>
													<th class="number person-count"><?= __('Person Count') ?></th>
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
												<?php foreach ($category->companies as $companies) : ?>

												<tr>
<?php if($config['index_show_id']){ ?>
													<td class="number id" value="<?= $companies->id ?>"><?= h($companies->id) ?></td>
<?php } ?>
													<td class="please-change-type city-id" value="<?= $companies->city_id ?>"><?= h($companies->city_id) ?></td>
													<td class="string name" value="<?= $companies->name ?>"><?= h($companies->name) ?></td>
													<td class="please-change-type slug" value="<?= $companies->slug ?>"><?= h($companies->slug) ?></td>
													<td class="string title" value="<?= $companies->title ?>"><?= h($companies->title) ?></td>
													<td class="please-change-type description" value="<?= $companies->description ?>"><?= h($companies->description) ?></td>
													<td class="please-change-type keywords" value="<?= $companies->keywords ?>"><?= h($companies->keywords) ?></td>
													<td class="please-change-type keywords-slug" value="<?= $companies->keywords_slug ?>"><?= h($companies->keywords_slug) ?></td>
													<td class="please-change-type email" value="<?= $companies->email ?>"><?= h($companies->email) ?></td>
													<td class="please-change-type phone" value="<?= $companies->phone ?>"><?= h($companies->phone) ?></td>
													<td class="please-change-type address" value="<?= $companies->address ?>"><?= h($companies->address) ?></td>
<?php if($config['index_show_visible']){ ?>
													<td class="boolean visible" value="<?= $companies->visible ?>"><?= h($companies->visible) ?></td>
<?php } ?>
<?php if($config['index_show_pos']){ ?>
													<td class="number pos" value="<?= $companies->pos ?>"><?= h($companies->pos) ?></td>
<?php } ?>
<?php if($config['index_show_counters']){ ?>
													<td class="number category-count" value="<?= $companies->category_count ?>"><?= h($companies->category_count) ?></td>
<?php } ?>
<?php if($config['index_show_counters']){ ?>
													<td class="number person-count" value="<?= $companies->person_count ?>"><?= h($companies->person_count) ?></td>
<?php } ?>
													<td class="please-change-type action" value="<?= $companies->action ?>"><?= h($companies->action) ?></td>
<?php if($config['index_show_created']){ ?>
													<td class="datetime created" value="<?= $companies->created ?>"><?= h($companies->created) ?></td>
<?php } ?>
<?php if($config['index_show_modified']){ ?>
													<td class="datetime modified" value="<?= $companies->modified ?>"><?= h($companies->modified) ?></td>
<?php } ?>
													<td class="actions">
														<?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Companies', 'action' => 'view', $companies->id], ["escape" => false, "role" => "button",  "class" => "btn btn-warning btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('View this item'), "data-original-title" => ""]) ?><!-- view button -->
														<?= $this->Html->link('<i class="fa fa-edit"></i>', ['controller' => 'Companies', 'action' => 'edit', $companies->id], ["escape" => false, "role" => "button", "class" => "btn btn-primary btn-sm", "data-toggle" => "tooltip", "data-placement" => "top", "title" => __('Edit this item'), "data-original-title" => ""]) ?><!-- edit button -->
														<?= $this->Form->postLink('<i class="fa fa-times"></i>', ['controller' => 'Companies', 'action' => 'delete', $companies->id], ["escape" => false, "role" => "button", "class" => "btn btn-danger btn-sm", "data-toggle" =>"tooltip", "data-placement" => "top", "title" => __('Delete this item'), "data-original-title" => "", "confirm" => __("Are you sure you want to delete # {0}?", $companies->id)]) ?><!-- delete button -->
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
