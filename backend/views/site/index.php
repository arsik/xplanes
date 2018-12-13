<?php
/* @var $this yii\web\View */
use backend\models\Clans;
$this->title = 'Профиль';
?>
<!-- Top Header -->
<div class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb">
						<img src="/<?=$user->photo_bg?>" alt="nature">
					</div>
					<div class="profile-section">
						<div class="row">
							<div class="col-lg-5 col-md-5 ">
								<ul class="profile-menu">
									<li>
										<a href="/news">Новости</a>
									</li>
									<li>
										<a href="/site/about">Статистика</a>
									</li>
									<li>
										<a href="/site/friends?action=all">Друзья</a>
									</li>
								</ul>
							</div>
							<div class="col-lg-5 offset-lg-2 col-md-5 offset-md-2">
								<ul class="profile-menu">
									<li>
										<a href="/site/support">Поддержка</a>
									</li>
									<li>
										<a href="/faq?id=3">FAQ</a>
									</li>
									<li style="opacity:0;">
										<div class="more">
										<svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg>
										<ul class="more-dropdown more-with-triangle">
											<li>
												<a href="#">Report Profile</a>
											</li>
											<li>
												<a href="#">Block Profile</a>
											</li>
										</ul>
									</div>
								</li>
							</ul>
							<div class="control-block-button">
								<?php if($user->id != Yii::$app->user->identity->id) : ?>
								<?php if($haveFriend && $haveFriend->status == \backend\models\Friendship::STATUS_REQUEST) : ?>
								<a href="#" class="btn btn-control btn-grey-superlight" disabled>
									<i class="fa fa-user-plus s-icon white"></i>
								</a>
								<?php elseif($haveFriend && $haveFriend->status == \backend\models\Friendship::STATUS_FRIEND) : ?>
								<a href="/site/remove-friend?id=<?=$user->id?>" class="btn btn-control bg-primary">
									<i class="fa fa-user-times s-icon white"></i>
								</a>
								<?php else : ?>
								<a href="/site/add-friend?id=<?=$user->id?>" class="btn btn-control bg-blue">
									<i class="fa fa-user-plus s-icon white"></i>
								</a>
								<?php endif; ?>
								<a href="#" class="btn btn-control bg-purple">
									<i class="fa fa-envelope s-icon white"></i>
								</a>
								<?php else : ?>
								<div class="btn btn-control bg-primary more">
									<i class="fa fa-gears s-icon white"></i>
									<ul class="more-dropdown more-with-triangle triangle-bottom-right">
										<li>
											<a href="#" data-toggle="modal" data-target="#update-header-photo">Изменить фото профиля</a>
										</li>
										<li>
											<a href="#" data-toggle="modal" data-target="#update-header-photobg">Изменить фон профиля</a>
										</li>
									</ul>
								</div>
								<?php endif; ?>
							</div>
						</div>
						<div class="top-header-author">
							<a href="/" class="author-thumb">
								<img src="/<?=$user->photo?>" class="img-responsive" alt="author">
							</a>
							<div class="author-content">
								<a href="/" class="h4 author-name"><?=$user->pName?></a>
								<div class="country"><?=($user->pOnline > 0 ? '<span class="online-text">Online<i class="fa fa-plane"></i></span>' : 'Offline')?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- ... end Top Header -->
<div class="container">
<div class="row">
	<!-- Main Content -->
	<div class="col-xl-6 push-xl-3 col-lg-12 push-lg-0 col-md-12 col-sm-12 col-xs-12">
		<div id="newsfeed-items-grid">
			<div class="ui-block">
				<article class="hentry post">
					<div class="post__author author vcard inline-items">
						<img src="/<?=$user->photo?>" alt="author">
						<div class="author-date">
							<a class="h6 post__author-name fn" href="/"><?=$user->pName?></a>
							<div class="post__date">
								<time class="published" datetime="2017-03-24T18:18">
								19 часа назад
								</time>
							</div>
						</div>
						<!-- <div class="more"><i class="fa fa-ellipsis-h s-icon"></i>
							<ul class="more-dropdown">
								<li>
									<a href="#">Редактировать</a>
								</li>
								<li>
									<a href="#">Удалить</a>
								</li>
							</ul>
						</div> -->
					</div>
					<p>У вас новое достижение: &quot;Новичок&quot;</p>
					<div class="post-additional-info inline-items">
						<a href="#" class="post-add-icon inline-items">
							<i class="fa fa-heart s-icon"></i>
							<span>0</span>
						</a>
						<!-- <ul class="friends-harmonic">
									<li>
												<a href="#">
															<img src="/img/noavatar.jpg" class="img-responsive" alt="friend">
												</a>
									</li>
									<li>
												<a href="#">
															<img src="/img/noavatar.jpg" class="img-responsive" alt="friend">
												</a>
									</li>
									<li>
												<a href="#">
															<img src="/img/noavatar.jpg" class="img-responsive" alt="friend">
												</a>
									</li>
									<li>
												<a href="#">
															<img src="/img/noavatar.jpg" class="img-responsive" alt="friend">
												</a>
									</li>
									<li>
												<a href="#">
															<img src="/img/noavatar.jpg" class="img-responsive" alt="friend">
												</a>
									</li>
						</ul> -->
						<!-- <div class="names-people-likes">
									<a href="#">Jenny</a>, <a href="#">Robert</a> and
									<br>6 more liked this
						</div> -->
						<div class="comments-shared">
							<a href="#" class="post-add-icon inline-items">
								<i class="fa fa-comment-o s-icon"></i>
								<span>0</span>
							</a>
							<a href="#" class="post-add-icon inline-items">
								<i class="fa fa-share s-icon"></i>
								<span>0</span>
							</a>
						</div>
					</div>
					<!-- <div class="control-block-button post-control-button">
								<a href="#" class="btn btn-control featured-post">
											<i class="fa fa-heart-o s-icon white"></i>
								</a>
								<a href="#" class="btn btn-control">
											<i class="fa fa-comment-o s-icon white"></i>
								</a>
								<a href="#" class="btn btn-control">
											<i class="fa fa-share s-icon white"></i>
								</a>
					</div> -->
				</article>
			</div>
			<div class="ui-block">
				<article class="hentry post">
					<div class="post__author author vcard inline-items">
						<img src="/<?=$user->photo?>" alt="author">
						<div class="author-date">
							<a class="h6 post__author-name fn" href="/"><?=$user->pName?></a>
							<div class="post__date">
								<time class="published" datetime="2017-03-24T18:18">
								19 часа назад
								</time>
							</div>
						</div>
						<!-- <div class="more"><i class="fa fa-ellipsis-h s-icon"></i>
							<ul class="more-dropdown">
								<li>
									<a href="#">Редактировать</a>
								</li>
								<li>
									<a href="#">Удалить</a>
								</li>
							</ul>
						</div> -->
					</div>
					<p>Вы успешно зарегистрировались на сервере xPlanes</p>
					<div class="post-additional-info inline-items">
						<a href="#" class="post-add-icon inline-items">
							<i class="fa fa-heart s-icon"></i>
							<span>0</span>
						</a>
						<!-- <ul class="friends-harmonic">
									<li>
												<a href="#">
															<img src="/img/noavatar.jpg" class="img-responsive" alt="friend">
												</a>
									</li>
									<li>
												<a href="#">
															<img src="/img/noavatar.jpg" class="img-responsive" alt="friend">
												</a>
									</li>
									<li>
												<a href="#">
															<img src="/img/noavatar.jpg" class="img-responsive" alt="friend">
												</a>
									</li>
									<li>
												<a href="#">
															<img src="/img/noavatar.jpg" class="img-responsive" alt="friend">
												</a>
									</li>
									<li>
												<a href="#">
															<img src="/img/noavatar.jpg" class="img-responsive" alt="friend">
												</a>
									</li>
						</ul> -->
						<!-- <div class="names-people-likes">
									<a href="#">Jenny</a>, <a href="#">Robert</a> and
									<br>6 more liked this
						</div> -->
						<div class="comments-shared">
							<a href="#" class="post-add-icon inline-items">
								<i class="fa fa-comment-o s-icon"></i>
								<span>0</span>
							</a>
							<a href="#" class="post-add-icon inline-items">
								<i class="fa fa-share s-icon"></i>
								<span>0</span>
							</a>
						</div>
					</div>
					<!-- <div class="control-block-button post-control-button">
								<a href="#" class="btn btn-control featured-post">
											<i class="fa fa-heart-o s-icon white"></i>
								</a>
								<a href="#" class="btn btn-control">
											<i class="fa fa-comment-o s-icon white"></i>
								</a>
								<a href="#" class="btn btn-control">
											<i class="fa fa-share s-icon white"></i>
								</a>
					</div> -->
				</article>
			</div>
		</div>
		<a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="/site/error" data-container="newsfeed-items-grid"><svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg></a>
	</div>
	<!-- ... end Main Content -->
	<!-- Left Sidebar -->
	<div class="col-xl-3 pull-xl-6 col-lg-6 pull-lg-0 col-md-6 col-sm-12 col-xs-12">
		<?php if($user->id == Yii::$app->user->identity->id) : ?>
		<div class="ui-block" style="background-color:#38a9ff;">
			<div class="widget w-action">
				<div class="content">
					<h6 class="title">Мониторинг</h6>
					<ul class="monitor-main">
						<li>Игроков: <?=count($players)?></li>
						<?php
						$friendsOnline = 0;
						foreach($players as $player) {
						foreach($friends as $friend) {
						if($player->id == $friend->user_id_from || $player->id == $friend->user_id_to) {
						$friendsOnline++;
						}
						}
						}
						?>
						<li>Друзей на сервере: <?=$friendsOnline?></li>
						<?php
						$membersOnline = 0;
						foreach($players as $player) {
						if($user->pMember != 0 && $player->pMember == $user->pMember) {
						$membersOnline++;
						}
						}
						?>
						<li>Онлайн клана: <?=$membersOnline?></li>
					</ul>
					<div style="display:flex;justify-content:center;">
						<a href="samp://95.213.236.203:7777" class="btn btn-md-2 btn-border-think custom-color c-white full-width">Подключиться<div class="ripple-container"></div></a>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="ui-block">
			<div class="ui-block-title">
				<h6 class="title">Информация</h6>
			</div>
			<div class="friend-item">
				<!-- <div class="friend-header-thumb">
							<img src="https://theme.crumina.net/html-olympus/img/friend10.jpg" alt="friend">
				</div> -->
				<div class="friend-item-content">
					<!-- <div class="more">
					<svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg>
					<ul class="more-dropdown">
						<li>
							<a href="#">Report Profile</a>
						</li>
						<li>
							<a href="#">Block Profile</a>
						</li>
						<li>
							<a href="#">Turn Off Notifications</a>
						</li>
					</ul>
				</div> -->
				<div class="friend-avatar">
					<!-- <div class="author-thumb">
								<img src="https://theme.crumina.net/html-olympus/img/avatar17.jpg" alt="author">
					</div> -->
					<div class="author-content">
						<a href="#" class="h5 author-name">Sarah Hetfield</a>
						<div class="country">Los Angeles, CA</div>
					</div>
				</div>
				<div class="swiper-container swiper-swiper-unique-id-1 initialized swiper-container-horizontal" id="swiper-unique-id-1">
					<div class="swiper-wrapper" style="width: 1104px; transform: translate3d(-828px, 0px, 0px); transition-duration: 0ms;"><div class="swiper-slide swiper-slide-duplicate swiper-slide-next swiper-slide-duplicate-prev" data-swiper-slide-index="1" style="width: 276px;">
						<p class="friend-about" data-swiper-parallax="-500" style="transform: translate3d(-500px, 0px, 0px); transition-duration: 0ms;">
							&nbsp;
						</p>
						<div class="friend-since" data-swiper-parallax="-100" style="transform: translate3d(-100px, 0px, 0px); transition-duration: 0ms;">
							<span>Дата регистрации:</span>
							<div class="h6">Недоступно.</div>
						</div>
					</div>
					<div class="swiper-slide swiper-slide-duplicate-active" data-swiper-slide-index="0" style="width: 276px;padding-top:40px;">
						<div class="friend-count" data-swiper-parallax="-500" style="transform: translate3d(-500px, 0px, 0px); transition-duration: 0ms;">
							<?php
							$clan = Clans::findOne(['id' => $user->pMember]);
							?>
							<a <?=(count($clan) > 0 ? 'href="/clan?id='.$user->pMember.'"' : '')?> class="friend-count-item">
								<div class="h6"><?=(count($clan) > 0 ? '<span style="color:#' . $clan->color . '">' . $clan->shortName . '</span>' : 'Нет')?></div>
								<div class="title">Клан</div>
							</a>
							<a href="#" class="friend-count-item">
								<div class="h6"><?=$user->pScore?></div>
								<div class="title">LVL</div>
							</a>
							<a href="#" class="friend-count-item">
								<div class="h6"><?=$user->number_shorten($user->pAllDamage, 0)?></div>
								<div class="title">PWR</div>
							</a>
						</div>
						<!-- <div class="control-block-button" data-swiper-parallax="-100" style="transform: translate3d(-100px, 0px, 0px); transition-duration: 0ms;">
									<a href="#" class="btn btn-control bg-blue">
												<i class="fa fa-user-plus"></i>
									</a>
									<a href="#" class="btn btn-control bg-purple">
												<i class="fa fa-envelope"></i>
									</a>
						</div> -->
					</div>
					<div class="swiper-slide swiper-slide-prev swiper-slide-duplicate-next" data-swiper-slide-index="1" style="width: 276px;">
						<p class="friend-about" data-swiper-parallax="-500" style="transform: translate3d(-500px, 0px, 0px); transition-duration: 0ms;">
							&nbsp;
						</p>
						<div class="friend-since" data-swiper-parallax="-100" style="transform: translate3d(-100px, 0px, 0px); transition-duration: 0ms;">
							<span>Дата регистрации:</span>
							<div class="h6">Недоступно.</div>
						</div>
					</div>
					<div class="swiper-slide swiper-slide-duplicate swiper-slide-active" data-swiper-slide-index="0" style="width: 276px;">
						<div class="friend-count" data-swiper-parallax="-500" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
							<a href="#" class="friend-count-item">
								<div class="h6">49</div>
								<div class="title">Friends</div>
							</a>
							<a href="#" class="friend-count-item">
								<div class="h6">132</div>
								<div class="title">Photos</div>
							</a>
							<a href="#" class="friend-count-item">
								<div class="h6">5</div>
								<div class="title">Videos</div>
							</a>
						</div>
						<div class="control-block-button" data-swiper-parallax="-100" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
							<a href="#" class="btn btn-control bg-blue">
							<svg class="olymp-happy-face-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/icon/icons.svg#olymp-happy-face-icon"></use></svg>
						</a>
						<a href="#" class="btn btn-control bg-purple">
						<svg class="olymp-chat---messages-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/icon/icons.svg#olymp-chat---messages-icon"></use></svg>
					</a>
				</div>
			</div></div>
			<!-- If we need pagination -->
			<div class="swiper-pagination pagination-swiper-unique-id-1 swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span class="swiper-pagination-bullet"></span></div>
		</div>
	</div>
</div>
</div>
<div class="ui-block">
<?php 
	$achievements = explode(",", $user->pAchievements); 
	$haveAchievements = 0;
	
	for($i = 0; $i < count($achievements); $i++)
	{
		if($achievements[$i] > 0) $haveAchievements++;
	}
?>
<div class="ui-block-title">
	<h6 class="title">Достижения (<?=$haveAchievements?>/100)</h6>
</div>
<div class="ui-block-content">
	<?php if($haveAchievements > 0) : ?>
	<ul class="widget w-badges">
	<?php

		for($i = 0; $i < count($achievements); $i++)
		{
			if($achievements[$i] > 0 && $i == 0)
			{
				$achievement_score_image = $user->getAchievementScoreImage($achievements[0]);
				$achievement_score_title = $user->getAchievementScoreTitle($achievements[0]);
				echo('
					<li>
						<a href="#" data-toggle="tooltip" data-placement="top" data-original-title="'.$achievement_score_title.'">
							<img src="'.$achievement_score_image.'" class="img-responsive">
						</a>
					</li>
				');
			}
			else if($achievements[$i] > 0 && $i == 1)
			{
				$achievement_time_image = $user->getAchievementTimeImage($achievements[1]);
				$achievement_time_title = $user->getAchievementTimeTitle($achievements[1]);
				echo('
					<li>
						<a href="#" data-toggle="tooltip" data-placement="top" data-original-title="'.$achievement_time_title.'">
							<img src="'.$achievement_time_image.'" class="img-responsive">
						</a>
					</li>
				');
			}
		}

	?>
	</ul>
	<p></p>
	<?php else : ?>
	<p>Нет достижений</p>
	<?php endif; ?>
	<ul class="widget w-badges">
		<!-- <li>
					<a href="24-CommunityBadges.html">
								<img src="/img/badge1.png" alt="author">
								<div class="label-avatar bg-primary">2</div>
					</a>
		</li>
		<li>
					<a href="24-CommunityBadges.html">
								<img src="/img/badge4.png" alt="author">
					</a>
		</li>
		<li>
					<a href="24-CommunityBadges.html">
								<img src="/img/badge3.png" alt="author">
								<div class="label-avatar bg-blue">4</div>
					</a>
		</li>
		<li>
					<a href="24-CommunityBadges.html">
								<img src="/img/badge6.png" alt="author">
					</a>
		</li>
		<li>
					<a href="24-CommunityBadges.html">
								<img src="/img/badge11.png" alt="author">
					</a>
		</li>
		<li>
					<a href="24-CommunityBadges.html">
								<img src="/img/badge8.png" alt="author">
					</a>
		</li>
		<li>
					<a href="24-CommunityBadges.html">
								<img src="/img/badge10.png" alt="author">
					</a>
		</li>
		<li>
					<a href="24-CommunityBadges.html">
								<img src="/img/badge13.png" alt="author">
								<div class="label-avatar bg-breez">2</div>
					</a>
		</li>
		<li>
					<a href="24-CommunityBadges.html">
								<img src="/img/badge7.png" alt="author">
					</a>
		</li>
		<li>
					<a href="24-CommunityBadges.html">
								<img src="/img/badge12.png" alt="author">
					</a>
		</li> -->
	</ul>
	<div style="display:flex;justify-content:center;">
		<a href="#" class="btn btn-md-2 btn-border-think custom-color c-grey full-width">Посмотреть все<div class="ripple-container"></div></a>
	</div>
</div>
</div>
<div class="ui-block">
<div class="ui-block-title">
	<h6 class="title">YouTube</h6>
</div>
<div class="ui-block-content">
	<ul class="widget w-last-video">
		<li>
			<a href="https//youtube.com/watch?v=QM6ix3BD0OY" class="play-video play-video--small">
				<i class="fa fa-youtube-play"></i>
			</a>
			<img src="/youtube/1.webp" alt="video">
			<div class="video-content">
				<div class="title">Воздушные бои в SAMP? Обзор проект xPlanes</div>
				<time class="published" datetime="2017-03-24T18:18">6:35</time>
			</div>
			<div class="overlay"></div>
		</li>
		<li>
			<a href="https//youtube.com/watch?v=_FAC0LOFHkY" class="play-video play-video--small">
				<i class="fa fa-youtube-play"></i>
			</a>
			<img src="/youtube/2.webp" alt="video">
			<div class="video-content">
				<div class="title">War Thunder в SAMP - xPlanes</div>
				<time class="published" datetime="2017-03-24T18:18">3:56</time>
			</div>
			<div class="overlay"></div>
		</li>
	</ul>
</div>
</div>
</div>
<!-- ... end Left Sidebar -->
<!-- Right Sidebar -->
<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
<div class="ui-block">
<div class="ui-block-title">
	<h6 class="title">Друзья (<?=count($friends)?>)</h6>
</div>
<div class="ui-block-content">
	<ul class="widget w-faved-page">
		<?php
		if(count($friends)) :
		$limit = 9;
		foreach($friends as $friend) :
		if($limit == 0) break;
		if($friend->user_id_from == $user->id) $fid = $friend->user_id_to;
		else $fid = $friend->user_id_from;
		$f_user = \common\models\User::findOne(['id' => $fid]);
		?>
		<li>
			<a href="/site/profile?nickname=<?=$f_user->pName?>" data-toggle="tooltip" data-placement="top" data-original-title="<?=$f_user->pName?>">
				<img src="/<?=$f_user->photo?>" class="img-responsive" alt="<?=$f_user->pName?>">
			</a>
		</li>
		<?php $limit--; endforeach; if(count($friends) > 9) : ?>
		<li class="all-users">
			<a href="#">+<?=count($friends)-9?></a>
		</li>
		<?php endif; else : ?>
		<p align="center">Нет друзей</p>
		<?php endif; ?>
		<!-- <li class="all-users">
					<a href="#">+74</a>
		</li> -->
	</ul>
</div>
</div>
<div class="ui-block">
<div class="widget w-create-fav-page">
	<div class="icons-block">
		<i class="fa fa-star-o s-icon white" data-toggle="tooltip" data-placement="right" data-original-title="FAV PAGE"></i>
		<a href="#" class="more"><i class="fa fa-ellipsis-h s-icon white"></i></a>
	</div>
	<div class="content">
		<span>#Магазин</span>
		<h3 class="title">Появилась возможность создания клана оффлайн</h3>
		<a href="/site/donate?type=clan" class="btn btn-bg-secondary btn-sm">Подробнее</a>
	</div>
</div>
</div>
</div>
<!-- ... end Right Sidebar -->
</div>
</div>