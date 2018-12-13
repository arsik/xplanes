<?php
/* @var $this yii\web\View */

$this->title = "FAQ";
?>
<div class="container">
	<div class="row">
		<div class="col-xl-9 push-xl-3 col-lg-12 push-lg-0 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block responsive-flex">
        <div class="your-profile">
					<div class="ui-block-title ui-block-title-small">
						<h6 class="title"><?=$currentCategory->title?></h6>
					</div>

          <?php foreach($questions as $question) : ?>

					<div id="accordion-<?=$question->id?>" role="tablist" aria-multiselectable="true">
						<div class="card">
							<div class="card-header" role="tab" id="headingOne">
								<h6 class="mb-0">
									<a data-toggle="collapse" data-parent="#accordion-<?=$question->id?>" href="#collapseOne-<?=$question->id?>" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
										<?=$question->title?>
										<svg class="olymp-dropdown-arrow-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/icon/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
									</a>
								</h6>
							</div>
							<div id="collapseOne-<?=$question->id?>" class="collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="">
                <div class="ui-block-content">
                  <?=$question->answer?>
                </div>
							</div>
						</div>
					</div>

          <?php endforeach; ?>

				</div>
			</div>
		</div>
		<div class="col-xl-3 pull-xl-9 col-lg-12 pull-lg-0 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block">
        <div class="your-profile">
          <?php foreach($categories as $category) : ?>
					<a href="/faq?id=<?=$category->id?>" class="title h6 ui-block-title" style="border-bottom:none;margin:0;<?=($category->id == $currentCategory->id ? 'background-color:#f9f9f9;' : '')?>">
						<?=$category->title?>
					</a>
          <?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>
