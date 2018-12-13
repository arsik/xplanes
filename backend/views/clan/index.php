<?php
/* @var $this yii\web\View */

use backend\models\Friendship;

$this->title = $clan->name;
?>
<div class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="top-header top-header-favorit">
					<div class="top-header-thumb">
						<img src="/img/top-header1.jpg" alt="nature">
						<div class="top-header-author" style="max-width: none ;display: flex; bottom: 20px;">
							<div class="author-thumb">
								<img src="/img/noavatar.jpg" alt="author">
							</div>
							<div class="author-content">
								<a href="#" class="h3 author-name"><span style="color:#<?=$clan->color?>;">[<?=$clan->shortName?>]</span> <?=$clan->name?></a>
								<div class="country"><?=$clan->liderName?></div>
							</div>
						</div>
					</div>
					<div class="profile-section">
						<div class="row">
							<div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-12 offset-md-0">
								<ul class="profile-menu">
									<li>
										<a href="#" class="active">О клане</a>
									</li>
									<li>
										<a href="#">Статистика</a>
									</li>
								</ul>
							</div>
						</div>

						<div class="control-block-button clan">
							<a href="#" class="btn btn-control bg-primary">
								<svg class="olymp-star-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/icon/icons.svg#olymp-star-icon"></use></svg>
							</a>

							<a href="#" class="btn btn-control bg-purple">
								<svg class="olymp-chat---messages-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/icon/icons.svg#olymp-chat---messages-icon"></use></svg>
							</a>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xl-9 push-xl-3 col-lg-12 push-lg-0 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block responsive-flex">
				<div class="ui-block-title">
					<div class="h6 title">Участники клана (0)</div>
					<form class="w-search">
						<div class="form-group with-button is-empty">
							<input class="form-control" type="text" placeholder="Поиск по участникам...">
							<button>
								<svg class="olymp-magnifying-glass-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/icon/icons.svg#olymp-magnifying-glass-icon"></use></svg>
							</button>
						<span class="material-input"></span></div>
					</form>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
			</div>

			<div class="row">

        <?php foreach($members as $member) : ?>
				<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
					<div class="ui-block">
						<div class="friend-item">
							<div class="friend-header-thumb">
								<img src="/<?=$member->photo_bg?>" alt="<?=$member->pName?>">
							</div>

							<div class="friend-item-content">

								<div class="more">
									<svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg>
									<ul class="more-dropdown">
										<li>
											<a href="#">Пожаловаться</a>
										</li>
										<li>
											<a href="#">Заблокировать</a>
										</li>
									</ul>
								</div>
								<div class="friend-avatar">
									<div class="author-thumb">
										<img src="/<?=$member->photo?>" class="img-responsive" alt="author">
									</div>
									<div class="author-content">
										<a href="/site/profile?nickname=<?=$member->pName?>" class="h5 author-name"><?=$member->pName?></a>
										<div class="country"><?=($member->pOnline ? 'Online' : 'Offline')?></div>
									</div>
								</div>

								<div class="swiper-container swiper-swiper-unique-id-0 initialized swiper-container-horizontal" id="swiper-unique-id-0" style="min-height:172px;">
									<div class="swiper-wrapper" style="width: 780px; transform: translate3d(-195px, 0px, 0px); transition-duration: 0ms;">
										<div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" style="width: 195px;">
											<div class="friend-count" data-swiper-parallax="-500" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
												<a href="#" class="friend-count-item">
													<div class="h6"><?=$member->pScore?></div>
													<div class="title">LVL</div>
												</a>
                        <a href="#" class="friend-count-item">
													<div class="h6"><?=$member->getRank($member->pClanDamage)?></div>
													<div class="title">Ранг</div>
												</a>
												<a href="#" class="friend-count-item">
													<div class="h6"><?=$member->number_shorten($member->pClanDamage, 0)?></div>
													<div class="title">CPWR</div>
												</a>
											</div>
											<div class="control-block-button clans" data-swiper-parallax="-100" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
                        <?php if($member->id != Yii::$app->user->identity->id) :
                              $haveFriend = Friendship::find()->where(['user_id_from' => $member->id])->orWhere(['user_id_to' => $member->id])->one();
                        ?>
                          <?php if($haveFriend && $haveFriend->status == \backend\models\Friendship::STATUS_REQUEST) : ?>
            							<a href="#" class="btn btn-control btn-grey-superlight" disabled>
            								<i class="fa fa-user-plus s-icon white"></i>
            							</a>
                          <?php elseif($haveFriend && $haveFriend->status == \backend\models\Friendship::STATUS_FRIEND) : ?>
                          <a href="/site/remove-friend?id=<?=$member->id?>" class="btn btn-control bg-primary">
            								<i class="fa fa-user-times s-icon white"></i>
            							</a>
                          <?php else : ?>
                          <a href="/site/add-friend?id=<?=$member->id?>" class="btn btn-control bg-blue">
            								<i class="fa fa-user-plus s-icon white"></i>
            							</a>
                          <?php endif; ?>

            							<a href="#" class="btn btn-control bg-purple">
            								<i class="fa fa-envelope s-icon white"></i>
            							</a>
                        <?php endif; ?>

											</div>
										</div>

										<div class="swiper-slide swiper-slide-next swiper-slide-duplicate-prev" data-swiper-slide-index="1" style="width: 195px;">
											<div class="friend-since" data-swiper-parallax="-100" style="transform: translate3d(100px, 0px, 0px); transition-duration: 0ms;">
												<span>Дата регистрации:</span>
												<div class="h6">Недоступно.</div>
											</div>
										</div>
									<div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="0" style="width: 195px;">
											<div class="friend-count" data-swiper-parallax="-500" style="transform: translate3d(500px, 0px, 0px); transition-duration: 0ms;">
												<a href="#" class="friend-count-item">
													<div class="h6">52</div>
													<div class="title">Friends</div>
												</a>
												<a href="#" class="friend-count-item">
													<div class="h6">240</div>
													<div class="title">Photos</div>
												</a>
												<a href="#" class="friend-count-item">
													<div class="h6">16</div>
													<div class="title">Videos</div>
												</a>
											</div>
											<div class="control-block-button" data-swiper-parallax="-100" style="transform: translate3d(100px, 0px, 0px); transition-duration: 0ms;">
												<a href="#" class="btn btn-control bg-blue">
													<svg class="olymp-happy-face-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/icon/icons.svg#olymp-happy-face-icon"></use></svg>
												</a>

												<a href="#" class="btn btn-control bg-purple">
													<svg class="olymp-chat---messages-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/icon/icons.svg#olymp-chat---messages-icon"></use></svg>
												</a>

											</div>
										</div></div>

									<!-- If we need pagination -->
									<div class="swiper-pagination pagination-swiper-unique-id-0 swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span class="swiper-pagination-bullet"></span></div>
								</div>
							</div>
						</div>
					</div>
				</div>
        <?php endforeach; ?>

			</div>

			<!-- <nav aria-label="Page navigation example">
				<ul class="pagination justify-content-center">
					<li class="page-item disabled">
						<a class="page-link" href="#" tabindex="-1">Previous</a>
					</li>
					<li class="page-item"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item"><a class="page-link" href="#">...</a></li>
					<li class="page-item"><a class="page-link" href="#">12</a></li>
					<li class="page-item">
						<a class="page-link" href="#">Next</a>
					</li>
				</ul>
			</nav> -->

		</div>

		<div class="col-xl-3 pull-xl-9 col-lg-12 pull-lg-0 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Информация</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
				<div class="ui-block-content">
					<ul class="widget w-personal-info item-block">
						<li>
							<span class="title">Участников:</span>
							<span class="text"><?=$clan->members?></span>
						</li>
						<li>
							<span class="title">Рейтинг:</span>
							<span class="text"><?=$clan->cScore?></span>
						</li>
						<li>
							<span class="title">Последняя активность:</span>
							<span class="text"><?=date('d.m.Y', $clan->activity)?></span>
						</li>
					</ul>
				</div>
			</div>

			<!-- <div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Additional Info</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
				<div class="ui-block-content">
					<ul class="widget w-personal-info item-block">
						<li>
							<span class="title">Additional Info:</span>
							<span class="text">We are open for gigs all over the country. If you are interested,
								please contact us via our website or send us an email to gigs@ggrock.com
							</span>
						</li>
						<li>
							<span class="title">Since:</span>
							<span class="text">Founded in 1996</span>
						</li>
						<li>
							<span class="title">Joined Olympus:</span>
							<span class="text">September 14th, 2012</span>
						</li>
						<li>
							<span class="title">Phone Number:</span>
							<span class="text">(044) 555 - 6943 - 5789</span>
						</li>
					</ul>
				</div>
			</div> -->
		</div>
	</div>
</div>
