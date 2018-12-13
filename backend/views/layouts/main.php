<?php
/* @var $this \yii\web\View */
/* @var $content string */
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use backend\models\Friendship;
use common\models\User;
AppAsset::register($this);
$user = Yii::$app->user->identity;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<head>
		<title><?= Html::encode($this->title) ?></title>
		<!-- Required meta tags always come first -->
		<meta charset="<?= Yii::$app->charset ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<link rel="icon" type="image/png" href="/favicon.png" />
		<?= Html::csrfMetaTags() ?>
		<!-- Main Font -->
		<script src="/js/webfontloader.min.js"></script>
		<script>
		WebFont.load({
		google: {
		families: ['Roboto:300,400,500,700:latin']
		}
		});
		</script>
		<?php $this->head() ?>
	</head>
	<body>
		<?php $this->beginBody() ?>
		<!-- Fixed Sidebar Left -->
		<div class="fixed-sidebar">
			<div class="fixed-sidebar-left sidebar--small" id="sidebar-left">
				<a href="/" class="logo">
					<img src="/img/logo.png" alt="Olympus">
				</a>
				<div class="mCustomScrollbar" data-mcs-theme="dark">
					<ul class="left-menu">
						<li>
							<a href="#" class="js-sidebar-open">
								<i class="olymp-menu-icon left-menu-icon fa fa-bars" data-toggle="tooltip" data-placement="right"   data-original-title="ОТКРЫТЬ МЕНЮ"></i>
								<!-- <svg class="olymp-menu-icon left-menu-icon"  data-toggle="tooltip" data-placement="right"   data-original-title="ОТКРЫТЬ МЕНЮ"><use xlink:href="/icon/icons.svg#olymp-menu-icon"></use></svg> -->
							</a>
						</li>
						<li>
							<a href="/">
								<i class="olymp-menu-icon left-menu-icon fa fa-user" data-toggle="tooltip" data-placement="right"   data-original-title="ПРОФИЛЬ"></i>
							</a>
						</li>
						<li>
							<a href="/site/about">
								<i class="olymp-menu-icon left-menu-icon fa fa-line-chart" data-toggle="tooltip" data-placement="right"   data-original-title="СТАТИСТИКА"></i>
							</a>
						</li>
						<li>
							<a href="/site/rating">
								<i class="olymp-menu-icon left-menu-icon fa fa-bar-chart" data-toggle="tooltip" data-placement="right"   data-original-title="РЕЙТИНГИ"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="olymp-menu-icon left-menu-icon fa fa-newspaper-o" data-toggle="tooltip" data-placement="right"   data-original-title="НОВОСТИ"></i>
							</a>
						</li>
						<li>
							<a href="/site/friends?action=all">
								<i class="olymp-menu-icon left-menu-icon fa fa-user-plus" data-toggle="tooltip" data-placement="right"   data-original-title="ДРУЗЬЯ"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="olymp-menu-icon left-menu-icon fa fa-users" data-toggle="tooltip" data-placement="right"   data-original-title="КЛАНЫ"></i>
							</a>
						</li>
						<li>
							<a href="/site/donate?type=money">
								<i class="olymp-menu-icon left-menu-icon fa fa-dollar" data-toggle="tooltip" data-placement="right"   data-original-title="МАГАЗИН" style="color:#0099ff; font-size: 22px !important;"></i>
							</a>
						</li>
						<li>
							<a href="/partner">
								<i class="olymp-menu-icon left-menu-icon fa fa-youtube-play" data-toggle="tooltip" data-placement="right"   data-original-title="ПАРТНЕРСТВО" style="color:#ff0000;font-size: 22px !important;"></i>
							</a>
						</li>
						<li>
							<a href="//vk.com/x.planes">
								<i class="olymp-menu-icon left-menu-icon fa fa-vk" data-toggle="tooltip" data-placement="right"   data-original-title="СООБЩЕСТВО В ВК"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1">
				<a href="/" class="logo">
					<img src="/img/logo.png" alt="xPlanes">
					<h6 class="logo-title">xPlanes</h6>
				</a>
				<div class="mCustomScrollbar" data-mcs-theme="dark">
					<ul class="left-menu">
						<li>
							<a href="#" class="js-sidebar-open">
								<i class="olymp-menu-icon left-menu-icon fa fa-close"></i>
								<span class="left-menu-title">Закрыть меню</span>
							</a>
						</li>
						<li>
							<a href="/">
								<i class="olymp-menu-icon left-menu-icon fa fa-user"></i>
								<span class="left-menu-title">Профиль</span>
							</a>
						</li>
						<li>
							<a href="/site/about">
								<i class="olymp-menu-icon left-menu-icon fa fa-line-chart"></i>
								<span class="left-menu-title">Статистика</span>
							</a>
						</li>
						<li>
							<a href="/site/rating">
								<i class="olymp-menu-icon left-menu-icon fa fa-bar-chart"></i>
								<span class="left-menu-title">Рейтинги</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="olymp-menu-icon left-menu-icon fa fa-newspaper-o"></i>
								<span class="left-menu-title">Новости</span>
							</a>
						</li>
						<li>
							<a href="/site/friends?action=all">
								<i class="olymp-menu-icon left-menu-icon fa fa-user-plus"></i>
								<span class="left-menu-title">Друзья</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="olymp-menu-icon left-menu-icon fa fa-users"></i>
								<span class="left-menu-title">Кланы</span>
							</a>
						</li>
						<li>
							<a href="/site/donate?type=money">
								<i class="olymp-menu-icon left-menu-icon fa fa-dollar" style="color:#0099ff;"></i>
								<span class="left-menu-title">Магазин</span>
							</a>
						</li>
						<li>
							<a href="/partner">
								<i class="olymp-menu-icon left-menu-icon fa fa-youtube-play" style="color:#ff0000;"></i>
								<span class="left-menu-title">Партнерство</span>
							</a>
						</li>
						<li>
							<a href="//vk.com/x.planes" target="_blank">
								<i class="olymp-menu-icon left-menu-icon fa fa-vk"></i>
								<span class="left-menu-title">Сообщество в Вк</span>
							</a>
						</li>
					</ul>
					<!-- <div class="profile-completion">
						<div class="skills-item">
							<div class="skills-item-info">
								<span class="skills-item-title">Мониторинг сервера</span>
								<span class="skills-item-count"><span class="count-animate" data-speed="1000" data-refresh-interval="50" data-to="76" data-from="0"></span><span class="units">76%</span></span>
							</div>
							<div class="skills-item-meter">
								<span class="skills-item-meter-active bg-primary" style="width: 76%"></span>
							</div>
						</div>
						
					</div> -->
				</div>
			</div>
		</div>
		<!-- ... end Fixed Sidebar Left -->
		<!-- Fixed Sidebar Left -->
		<div class="fixed-sidebar fixed-sidebar-responsive">
			<div class="fixed-sidebar-left sidebar--small" id="sidebar-left-responsive">
				<a href="#" class="logo js-sidebar-open">
					<img src="/img/logo.png" alt="xPlanes">
				</a>
			</div>
			<div class="fixed-sidebar-left sidebar--large" id="sidebar-left-1-responsive">
				<a href="#" class="logo">
					<img src="/img/logo.png" alt="xPlanes">
					<h6 class="logo-title">xPlanes</h6>
				</a>
				<div class="mCustomScrollbar" data-mcs-theme="dark">
					<div class="control-block">
						<div class="author-page author vcard inline-items">
							<div class="author-thumb">
								<img alt="author" src="/<?=$user->photo?>" class="avatar img-responsive" width="40">
								<span class="icon-status online"></span>
							</div>
							<a href="/" class="author-name fn">
								<div class="author-title">
								<?=$user->pName?> <svg class="olymp-dropdown-arrow-icon"><use xlink:href="/icon/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
							</div>
							<span class="author-subtitle"><?=$user->pEmail?></span>
						</a>
					</div>
				</div>
				<div class="ui-block-title ui-block-title-small">
					<h6 class="title">Основное меню</h6>
				</div>
				<ul class="left-menu">
					<li>
						<a href="#" class="js-sidebar-open">
							<i class="olymp-menu-icon left-menu-icon fa fa-close"></i>
							<span class="left-menu-title">Закрыть меню</span>
						</a>
					</li>
					<li>
						<a href="/">
							<i class="olymp-menu-icon left-menu-icon fa fa-user"></i>
							<span class="left-menu-title">Профиль</span>
						</a>
					</li>
					<li>
						<a href="/site/about">
							<i class="olymp-menu-icon left-menu-icon fa fa-line-chart"></i>
							<span class="left-menu-title">Статистика</span>
						</a>
					</li>
					<li>
						<a href="/site/rating">
							<i class="olymp-menu-icon left-menu-icon fa fa-bar-chart"></i>
							<span class="left-menu-title">Рейтинги</span>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="olymp-menu-icon left-menu-icon fa fa-newspaper-o"></i>
							<span class="left-menu-title">Новости</span>
						</a>
					</li>
					<li>
						<a href="/site/friends?action=all">
							<i class="olymp-menu-icon left-menu-icon fa fa-user-plus"></i>
							<span class="left-menu-title">Друзья</span>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="olymp-menu-icon left-menu-icon fa fa-users"></i>
							<span class="left-menu-title">Кланы</span>
						</a>
					</li>
				</ul>
				<div class="ui-block-title ui-block-title-small">
					<h6 class="title">Профиль</h6>
				</div>
				<ul class="account-settings">
					<!-- <li>
						<a href="#">
							<i class="fa fa-gear s-icon left-menu-icon"></i>
							<span>Настройки</span>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-star s-icon left-menu-icon"></i>
							<span>Избранные</span>
						</a>
					</li> -->
					<li>
						<a href="/site/logout">
							<i class="fa fa-sign-out s-icon left-menu-icon"></i>
							<span>Выйти</span>
						</a>
					</li>
				</ul>
				<!-- <div class="ui-block-title ui-block-title-small">
						<h6 class="title">About Olympus</h6>
				</div>
				<ul class="about-olympus">
						<li>
								<a href="#">
										<span>Terms and Conditions</span>
								</a>
						</li>
						<li>
								<a href="#">
										<span>FAQs</span>
								</a>
						</li>
						<li>
								<a href="#">
										<span>Careers</span>
								</a>
						</li>
						<li>
								<a href="#">
										<span>Contact</span>
								</a>
						</li>
				</ul> -->
			</div>
		</div>
	</div>
	<!-- ... end Fixed Sidebar Left -->
	<!-- Fixed Sidebar Right -->
	<div class="fixed-sidebar right fixed-sidebar-responsive">
		<div class="fixed-sidebar-right sidebar--small" id="sidebar-right-responsive">
			<a href="#" class="olympus-chat inline-items js-chat-open">
			<svg class="olymp-chat---messages-icon"><use xlink:href="/icon/icons.svg#olymp-chat---messages-icon"></use></svg>
		</a>
	</div>
</div>
<!-- ... end Fixed Sidebar Right -->
<!-- Header -->
<header class="header" id="site-header">
	<div class="page-title">
		<h6>xPlanes</h6>
	</div>
	<div class="header-content-wrapper">
		<form class="search-bar w-search notification-list friend-requests">
			<div class="form-group with-button">
				<input class="form-control" placeholder="Поиск по серверу..." type="text">
				<button>
			<svg class="olymp-magnifying-glass-icon"><use xlink:href="/icon/icons.svg#olymp-magnifying-glass-icon"></use></svg>
			</button>
		</div>
	</form>
	<!-- <a href="#" class="link-find-friend">Найти</a> -->
	<div class="control-block">
		<?php $friendRequests = Friendship::find()->where(['user_id_to' => $user->id, 'status' => Friendship::STATUS_REQUEST])->all(); ?>
		<div class="control-icon more has-items">
			<i class="fa fa-user-plus s-icon"></i>
			<?php if(count($friendRequests) > 0) : ?>
			<div class="label-avatar bg-blue"><?=count($friendRequests)?></div>
			<?php endif; ?>
			<div class="more-dropdown more-with-triangle triangle-top-center">
				<div class="ui-block-title ui-block-title-small">
					<h6 class="title">Заявки в друзья</h6>
					<a href="#">Найти друзей</a>
					<a href="#">Настройки</a>
				</div>
				<div class="mCustomScrollbar" data-mcs-theme="dark">
					<ul class="notification-list friend-requests">
						<?php
						if(count($friendRequests) > 0) :
						foreach($friendRequests as $fr) :
						$userRequest = User::findOne(['id' => $fr->user_id_from]);
						?>
						<li>
							<div class="author-thumb">
								<img src="/<?=$userRequest->photo?>" class="img-responsive" alt="<?=$userRequest->pName?>">
							</div>
							<div class="notification-event">
								<a href="/site/profile?nickname=<?=$userRequest->pName?>" class="h6 notification-friend"><?=$userRequest->pName?></a>
								<span class="chat-message-item">Хочет добавить вас в друзья</span>
							</div>
							<span class="notification-icon">
								<a href="/site/accept-friend?id=<?=$userRequest->id?>" class="accept-request">
									<i class="fa fa-check s-icon white"></i>
								</a>
								<a href="/site/reject-friend?id=<?=$userRequest->id?>" class="accept-request request-del">
									<i class="fa fa-times s-icon white"></i>
								</a>
							</span>
							<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg>
						</div>
					</li>
					<?php endforeach; else : ?>
					<li>
						<span>Нет заявок</span>
					</li>
					<?php endif; ?>
				</ul>
			</div>
			<a href="/site/friends?action=requests" class="view-all bg-blue">Посмотреть все</a>
		</div>
	</div>
	<div class="control-icon more has-items">
		<i class="fa fa-envelope s-icon"></i>
		<!-- <div class="label-avatar bg-purple">0</div> -->
		<div class="more-dropdown more-with-triangle triangle-top-center">
			<div class="ui-block-title ui-block-title-small">
				<h6 class="title">Сообщения</h6>
				<a href="#">Пометить все прочитанными</a>
				<a href="#">Настройки</a>
			</div>
			<div class="mCustomScrollbar" data-mcs-theme="dark">
				<ul class="notification-list chat-message">
					<!-- <li class="message-unread">
							<div class="author-thumb">
									<img src="/img/avatar59-sm.jpg" alt="author">
							</div>
							<div class="notification-event">
									<a href="#" class="h6 notification-friend">Diana Jameson</a>
									<span class="chat-message-item">Hi James! It’s Diana, I just wanted to let you know that we have to reschedule...</span>
									<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 часа назад</time></span>
							</div>
							<span class="notification-icon">
								<svg class="olymp-chat---messages-icon"><use xlink:href="/icon/icons.svg#olymp-chat---messages-icon"></use></svg>
						</span>
						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg>
					</div>
			</li>
			<li>
					<div class="author-thumb">
							<img src="/img/avatar60-sm.jpg" alt="author">
					</div>
					<div class="notification-event">
							<a href="#" class="h6 notification-friend">Jake Parker</a>
							<span class="chat-message-item">Great, I’ll see you tomorrow!.</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 часа назад</time></span>
					</div>
					<span class="notification-icon">
						<svg class="olymp-chat---messages-icon"><use xlink:href="/icon/icons.svg#olymp-chat---messages-icon"></use></svg>
				</span>
				<div class="more">
					<svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg>
			</div>
	</li>
	<li>
			<div class="author-thumb">
					<img src="/img/avatar61-sm.jpg" alt="author">
			</div>
			<div class="notification-event">
					<a href="#" class="h6 notification-friend">Elaine Dreyfuss</a>
					<span class="chat-message-item">We’ll have to check that at the office and see if the client is on board with...</span>
					<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 9:56pm</time></span>
			</div>
				<span class="notification-icon">
					<svg class="olymp-chat---messages-icon"><use xlink:href="/icon/icons.svg#olymp-chat---messages-icon"></use></svg>
			</span>
		<div class="more">
			<svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg>
	</div>
</li>
<li class="chat-group">
	<div class="author-thumb">
			<img src="/img/avatar11-sm.jpg" alt="author">
			<img src="/img/avatar12-sm.jpg" alt="author">
			<img src="/img/avatar13-sm.jpg" alt="author">
			<img src="/img/avatar10-sm.jpg" alt="author">
	</div>
	<div class="notification-event">
			<a href="#" class="h6 notification-friend">You, Faye, Ed &amp; Jet +3</a>
			<span class="last-message-author">Ed:</span>
			<span class="chat-message-item">Yeah! Seems fine by me!</span>
			<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 16th at 10:23am</time></span>
	</div>
		<span class="notification-icon">
			<svg class="olymp-chat---messages-icon"><use xlink:href="/icon/icons.svg#olymp-chat---messages-icon"></use></svg>
		</span>
	<div class="more">
		<svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg>
	</div>
</li> -->
<li>Нет сообщений</li>
</ul>
</div>
<a href="#" class="view-all bg-purple">Посмотреть все</a>
</div>
</div>
<div class="control-icon more has-items">
<i class="fa fa-bell s-icon"></i>
<!-- <div class="label-avatar bg-primary">0</div> -->
<div class="more-dropdown more-with-triangle triangle-top-center">
<div class="ui-block-title ui-block-title-small">
<h6 class="title">Уведомления</h6>
<a href="#">Пометить все прочитаннымм</a>
<a href="#">Настройки</a>
</div>
<div class="mCustomScrollbar" data-mcs-theme="dark">
<ul class="notification-list">
<!-- <li>
	<div class="author-thumb">
		<img src="/img/avatar62-sm.jpg" alt="author">
	</div>
	<div class="notification-event">
		<div><a href="#" class="h6 notification-friend">Mathilda Brinker</a> commented on your new <a href="#" class="notification-link">profile status</a>.</div>
		<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 часа назад</time></span>
	</div>
		<span class="notification-icon">
			<svg class="olymp-comments-post-icon"><use xlink:href="/icon/icons.svg#olymp-comments-post-icon"></use></svg>
		</span>
	<div class="more">
		<svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg>
		<svg class="olymp-little-delete"><use xlink:href="/icon/icons.svg#olymp-little-delete"></use></svg>
	</div>
</li>
<li class="un-read">
	<div class="author-thumb">
		<img src="/img/avatar63-sm.jpg" alt="author">
	</div>
	<div class="notification-event">
		<div>You and <a href="#" class="h6 notification-friend">Nicholas Grissom</a> just became friends. Write on <a href="#" class="notification-link">his wall</a>.</div>
		<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">9 часа назад</time></span>
	</div>
		<span class="notification-icon">
			<svg class="olymp-happy-face-icon"><use xlink:href="/icon/icons.svg#olymp-happy-face-icon"></use></svg>
		</span>
	<div class="more">
		<svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg>
		<svg class="olymp-little-delete"><use xlink:href="/icon/icons.svg#olymp-little-delete"></use></svg>
	</div>
</li>
<li class="with-comment-photo">
	<div class="author-thumb">
		<img src="/img/avatar64-sm.jpg" alt="author">
	</div>
	<div class="notification-event">
		<div><a href="#" class="h6 notification-friend">Sarah Hetfield</a> commented on your <a href="#" class="notification-link">photo</a>.</div>
		<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 5:32am</time></span>
	</div>
		<span class="notification-icon">
			<svg class="olymp-comments-post-icon"><use xlink:href="/icon/icons.svg#olymp-comments-post-icon"></use></svg>
		</span>
	<div class="comment-photo">
		<img src="/img/comment-photo1.jpg" alt="photo">
		<span>“She looks incredible in that outfit! We should see each...”</span>
	</div>
	<div class="more">
		<svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg>
		<svg class="olymp-little-delete"><use xlink:href="/icon/icons.svg#olymp-little-delete"></use></svg>
	</div>
</li>
<li>
	<div class="author-thumb">
		<img src="/img/avatar65-sm.jpg" alt="author">
	</div>
	<div class="notification-event">
		<div><a href="#" class="h6 notification-friend">Green Goo Rock</a> invited you to attend to his event Goo in <a href="#" class="notification-link">Gotham Bar</a>.</div>
		<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 5th at 6:43pm</time></span>
	</div>
		<span class="notification-icon">
			<svg class="olymp-happy-face-icon"><use xlink:href="/icon/icons.svg#olymp-happy-face-icon"></use></svg>
		</span>
	<div class="more">
		<svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg>
		<svg class="olymp-little-delete"><use xlink:href="/icon/icons.svg#olymp-little-delete"></use></svg>
	</div>
</li>
<li>
	<div class="author-thumb">
		<img src="/img/avatar66-sm.jpg" alt="author">
	</div>
	<div class="notification-event">
		<div><a href="#" class="h6 notification-friend">James Summers</a> commented on your new <a href="#" class="notification-link">profile status</a>.</div>
		<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 2nd at 8:29pm</time></span>
	</div>
		<span class="notification-icon">
			<svg class="olymp-heart-icon"><use xlink:href="/icon/icons.svg#olymp-heart-icon"></use></svg>
		</span>
	<div class="more">
		<svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg>
		<svg class="olymp-little-delete"><use xlink:href="/icon/icons.svg#olymp-little-delete"></use></svg>
	</div>
</li> -->
<li>Нет уведомлений</li>
</ul>
</div>
<a href="#" class="view-all bg-primary">Посмотреть все</a>
</div>
</div>
<div class="author-page author vcard inline-items more">
<div class="author-thumb">
<img alt="author" src="/<?=$user->photo?>" class="avatar" style="max-width:40px;">
<span class="icon-status online"></span>
<div class="more-dropdown more-with-triangle">
<div class="mCustomScrollbar" data-mcs-theme="dark">
<div class="ui-block-title ui-block-title-small">
<h6 class="title">Профиль</h6>
</div>
<ul class="account-settings">
<!-- <li>
<a href="#">
<i class="fa fa-gear s-icon left-menu-icon"></i>
<span>Настройки</span>
</a>
</li>
<li>
<a href="#">
<i class="fa fa-star s-icon left-menu-icon"></i>
<span>Избранные</span>
</a>
</li>
<li> -->
<a href="/site/logout">
<i class="fa fa-sign-out s-icon left-menu-icon"></i>
<span>Выйти</span>
</a>
</li>
</ul>
<!-- <div class="ui-block-title ui-block-title-small">
	<h6 class="title">Chat Settings</h6>
</div>
<ul class="chat-settings">
	<li>
		<a href="#">
			<span class="icon-status online"></span>
			<span>Online</span>
		</a>
	</li>
	<li>
		<a href="#">
			<span class="icon-status away"></span>
			<span>Away</span>
		</a>
	</li>
	<li>
		<a href="#">
			<span class="icon-status disconected"></span>
			<span>Disconnected</span>
		</a>
	</li>
	<li>
		<a href="#">
			<span class="icon-status status-invisible"></span>
			<span>Invisible</span>
		</a>
	</li>
</ul>
<div class="ui-block-title ui-block-title-small">
	<h6 class="title">Custom Status</h6>
</div>
<form class="form-group with-button custom-status">
	<input class="form-control" placeholder="" type="text" value="Space Cowboy">
	<button class="bg-purple">
		<svg class="olymp-check-icon"><use xlink:href="/icon/icons.svg#olymp-check-icon"></use></svg>
	</button>
</form>
<div class="ui-block-title ui-block-title-small">
	<h6 class="title">About Olympus</h6>
</div>
<ul>
	<li>
		<a href="#">
			<span>Terms and Conditions</span>
		</a>
	</li>
	<li>
		<a href="#">
			<span>FAQs</span>
		</a>
	</li>
	<li>
		<a href="#">
			<span>Careers</span>
		</a>
	</li>
	<li>
		<a href="#">
			<span>Contact</span>
		</a>
	</li>
</ul> -->
</div>
</div>
</div>
<a href="/" class="author-name fn">
<div class="author-title">
<?=Yii::$app->user->identity->pName?> <svg class="olymp-dropdown-arrow-icon"><use xlink:href="/icon/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
</div>
<span class="author-subtitle"><?=Yii::$app->user->identity->pEmail?></span>
</a>
</div>
</div>
</div>
</header>
<!-- ... end Header -->
<!-- Responsive Header -->
<header class="header header-responsive" id="site-header-responsive">
<div class="header-content-wrapper">
<ul class="nav nav-tabs mobile-app-tabs" role="tablist">
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#request" role="tab">
<div class="control-icon has-items">
<i class="fa fa-user-plus s-icon"></i>
<?php if(count($friendRequests) > 0) : ?>
<div class="label-avatar bg-blue"><?=count($friendRequests)?></div>
<?php endif; ?>
</div>
</a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#chat" role="tab">
<div class="control-icon has-items">
<i class="fa fa-envelope s-icon"></i>
<!-- <div class="label-avatar bg-purple">0</div> -->
</div>
</a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#notification" role="tab">
<div class="control-icon has-items">
<i class="fa fa-bell s-icon"></i>
<!-- <div class="label-avatar bg-primary">0</div> -->
</div>
</a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#search" role="tab">
<svg class="olymp-magnifying-glass-icon"><use xlink:href="/icon/icons.svg#olymp-magnifying-glass-icon"></use></svg>
<svg class="olymp-close-icon"><use xlink:href="/icon/icons.svg#olymp-close-icon"></use></svg>
</a>
</li>
</ul>
</div>
<!-- Tab panes -->
<!-- <div class="tab-content tab-content-responsive">
	<div class="tab-pane " id="request" role="tabpanel">
		<div class="mCustomScrollbar" data-mcs-theme="dark">
			<div class="ui-block-title ui-block-title-small">
				<h6 class="title">FRIEND REQUESTS</h6>
				<a href="#">Find Friends</a>
				<a href="#">Settings</a>
			</div>
			<ul class="notification-list friend-requests">
				<li>
					<div class="author-thumb">
						<img src="/img/avatar55-sm.jpg" alt="author">
					</div>
					<div class="notification-event">
						<a href="#" class="h6 notification-friend">Tamara Romanoff</a>
						<span class="chat-message-item">Mutual Friend: Sarah Hetfield</span>
					</div>
								<span class="notification-icon">
									<a href="#" class="accept-request">
										<span class="icon-add without-text">
											<svg class="olymp-happy-face-icon"><use xlink:href="/icon/icons.svg#olymp-happy-face-icon"></use></svg>
										</span>
									</a>
									<a href="#" class="accept-request request-del">
										<span class="icon-minus">
											<svg class="olymp-happy-face-icon"><use xlink:href="/icon/icons.svg#olymp-happy-face-icon"></use></svg>
										</span>
									</a>
								</span>
					<div class="more">
						<svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg>
					</div>
				</li>
				<li>
					<div class="author-thumb">
						<img src="/img/avatar56-sm.jpg" alt="author">
					</div>
					<div class="notification-event">
						<a href="#" class="h6 notification-friend">Tony Stevens</a>
						<span class="chat-message-item">4 Friends in Common</span>
					</div>
								<span class="notification-icon">
									<a href="#" class="accept-request">
										<span class="icon-add without-text">
											<svg class="olymp-happy-face-icon"><use xlink:href="/icon/icons.svg#olymp-happy-face-icon"></use></svg>
										</span>
									</a>
									<a href="#" class="accept-request request-del">
										<span class="icon-minus">
											<svg class="olymp-happy-face-icon"><use xlink:href="/icon/icons.svg#olymp-happy-face-icon"></use></svg>
										</span>
									</a>
								</span>
					<div class="more">
						<svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg>
					</div>
				</li>
				<li class="accepted">
					<div class="author-thumb">
						<img src="/img/avatar57-sm.jpg" alt="author">
					</div>
					<div class="notification-event">
						You and <a href="#" class="h6 notification-friend">Mary Jane Stark</a> just became friends. Write on <a href="#" class="notification-link">her wall</a>.
					</div>
								<span class="notification-icon">
									<svg class="olymp-happy-face-icon"><use xlink:href="/icon/icons.svg#olymp-happy-face-icon"></use></svg>
								</span>
					<div class="more">
						<svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg>
						<svg class="olymp-little-delete"><use xlink:href="/icon/icons.svg#olymp-little-delete"></use></svg>
					</div>
				</li>
				<li>
					<div class="author-thumb">
						<img src="/img/avatar58-sm.jpg" alt="author">
					</div>
					<div class="notification-event">
						<a href="#" class="h6 notification-friend">Stagg Clothing</a>
						<span class="chat-message-item">9 Friends in Common</span>
					</div>
								<span class="notification-icon">
									<a href="#" class="accept-request">
										<span class="icon-add without-text">
											<svg class="olymp-happy-face-icon"><use xlink:href="/icon/icons.svg#olymp-happy-face-icon"></use></svg>
										</span>
									</a>
									<a href="#" class="accept-request request-del">
										<span class="icon-minus">
											<svg class="olymp-happy-face-icon"><use xlink:href="/icon/icons.svg#olymp-happy-face-icon"></use></svg>
										</span>
									</a>
								</span>
					<div class="more">
						<svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg>
					</div>
				</li>
			</ul>
			<a href="#" class="view-all bg-blue">Check all your Events</a>
		</div>
</div> -->
<!-- <div class="tab-pane " id="chat" role="tabpanel">
	<div class="mCustomScrollbar" data-mcs-theme="dark">
		<div class="ui-block-title ui-block-title-small">
			<h6 class="title">Chat / Messages</h6>
			<a href="#">Mark all as read</a>
			<a href="#">Settings</a>
		</div>
		<ul class="notification-list chat-message">
			<li class="message-unread">
				<div class="author-thumb">
					<img src="/img/avatar59-sm.jpg" alt="author">
				</div>
				<div class="notification-event">
					<a href="#" class="h6 notification-friend">Diana Jameson</a>
					<span class="chat-message-item">Hi James! It’s Diana, I just wanted to let you know that we have to reschedule...</span>
					<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 часа назад</time></span>
				</div>
							<span class="notification-icon">
								<svg class="olymp-chat---messages-icon"><use xlink:href="/icon/icons.svg#olymp-chat---messages-icon"></use></svg>
							</span>
				<div class="more">
					<svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg>
				</div>
			</li>
			<li>
				<div class="author-thumb">
					<img src="/img/avatar60-sm.jpg" alt="author">
				</div>
				<div class="notification-event">
					<a href="#" class="h6 notification-friend">Jake Parker</a>
					<span class="chat-message-item">Great, I’ll see you tomorrow!.</span>
					<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 часа назад</time></span>
				</div>
							<span class="notification-icon">
								<svg class="olymp-chat---messages-icon"><use xlink:href="/icon/icons.svg#olymp-chat---messages-icon"></use></svg>
							</span>
				<div class="more">
					<svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg>
				</div>
			</li>
			<li>
				<div class="author-thumb">
					<img src="/img/avatar61-sm.jpg" alt="author">
				</div>
				<div class="notification-event">
					<a href="#" class="h6 notification-friend">Elaine Dreyfuss</a>
					<span class="chat-message-item">We’ll have to check that at the office and see if the client is on board with...</span>
					<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 9:56pm</time></span>
				</div>
								<span class="notification-icon">
									<svg class="olymp-chat---messages-icon"><use xlink:href="/icon/icons.svg#olymp-chat---messages-icon"></use></svg>
								</span>
				<div class="more">
					<svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg>
				</div>
			</li>
			<li class="chat-group">
				<div class="author-thumb">
					<img src="/img/avatar11-sm.jpg" alt="author">
					<img src="/img/avatar12-sm.jpg" alt="author">
					<img src="/img/avatar13-sm.jpg" alt="author">
					<img src="/img/avatar10-sm.jpg" alt="author">
				</div>
				<div class="notification-event">
					<a href="#" class="h6 notification-friend">You, Faye, Ed &amp; Jet +3</a>
					<span class="last-message-author">Ed:</span>
					<span class="chat-message-item">Yeah! Seems fine by me!</span>
					<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 16th at 10:23am</time></span>
				</div>
								<span class="notification-icon">
									<svg class="olymp-chat---messages-icon"><use xlink:href="/icon/icons.svg#olymp-chat---messages-icon"></use></svg>
								</span>
				<div class="more">
					<svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg>
				</div>
			</li>
		</ul>
		<a href="#" class="view-all bg-purple">View All Messages</a>
	</div>
</div> -->
<!-- <div class="tab-pane " id="notification" role="tabpanel">
	<div class="mCustomScrollbar" data-mcs-theme="dark">
		<div class="ui-block-title ui-block-title-small">
			<h6 class="title">Notifications</h6>
			<a href="#">Mark all as read</a>
			<a href="#">Settings</a>
		</div>
		<ul class="notification-list">
			<li>
				<div class="author-thumb">
					<img src="/img/avatar62-sm.jpg" alt="author">
				</div>
				<div class="notification-event">
					<div><a href="#" class="h6 notification-friend">Mathilda Brinker</a> commented on your new <a href="#" class="notification-link">profile status</a>.</div>
					<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 часа назад</time></span>
				</div>
								<span class="notification-icon">
									<svg class="olymp-comments-post-icon"><use xlink:href="/icon/icons.svg#olymp-comments-post-icon"></use></svg>
								</span>
				<div class="more">
					<svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg>
					<svg class="olymp-little-delete"><use xlink:href="/icon/icons.svg#olymp-little-delete"></use></svg>
				</div>
			</li>
			<li class="un-read">
				<div class="author-thumb">
					<img src="/img/avatar63-sm.jpg" alt="author">
				</div>
				<div class="notification-event">
					<div>You and <a href="#" class="h6 notification-friend">Nicholas Grissom</a> just became friends. Write on <a href="#" class="notification-link">his wall</a>.</div>
					<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">9 часа назад</time></span>
				</div>
								<span class="notification-icon">
									<svg class="olymp-happy-face-icon"><use xlink:href="/icon/icons.svg#olymp-happy-face-icon"></use></svg>
								</span>
				<div class="more">
					<svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg>
					<svg class="olymp-little-delete"><use xlink:href="/icon/icons.svg#olymp-little-delete"></use></svg>
				</div>
			</li>
			<li class="with-comment-photo">
				<div class="author-thumb">
					<img src="/img/avatar64-sm.jpg" alt="author">
				</div>
				<div class="notification-event">
					<div><a href="#" class="h6 notification-friend">Sarah Hetfield</a> commented on your <a href="#" class="notification-link">photo</a>.</div>
					<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 5:32am</time></span>
				</div>
								<span class="notification-icon">
									<svg class="olymp-comments-post-icon"><use xlink:href="/icon/icons.svg#olymp-comments-post-icon"></use></svg>
								</span>
				<div class="comment-photo">
					<img src="/img/comment-photo1.jpg" alt="photo">
					<span>“She looks incredible in that outfit! We should see each...”</span>
				</div>
				<div class="more">
					<svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg>
					<svg class="olymp-little-delete"><use xlink:href="/icon/icons.svg#olymp-little-delete"></use></svg>
				</div>
			</li>
			<li>
				<div class="author-thumb">
					<img src="/img/avatar65-sm.jpg" alt="author">
				</div>
				<div class="notification-event">
					<div><a href="#" class="h6 notification-friend">Green Goo Rock</a> invited you to attend to his event Goo in <a href="#" class="notification-link">Gotham Bar</a>.</div>
					<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 5th at 6:43pm</time></span>
				</div>
								<span class="notification-icon">
									<svg class="olymp-happy-face-icon"><use xlink:href="/icon/icons.svg#olymp-happy-face-icon"></use></svg>
								</span>
				<div class="more">
					<svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg>
					<svg class="olymp-little-delete"><use xlink:href="/icon/icons.svg#olymp-little-delete"></use></svg>
				</div>
			</li>
			<li>
				<div class="author-thumb">
					<img src="/img/avatar66-sm.jpg" alt="author">
				</div>
				<div class="notification-event">
					<div><a href="#" class="h6 notification-friend">James Summers</a> commented on your new <a href="#" class="notification-link">profile status</a>.</div>
					<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 2nd at 8:29pm</time></span>
				</div>
								<span class="notification-icon">
									<svg class="olymp-heart-icon"><use xlink:href="/icon/icons.svg#olymp-heart-icon"></use></svg>
								</span>
				<div class="more">
					<svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg>
					<svg class="olymp-little-delete"><use xlink:href="/icon/icons.svg#olymp-little-delete"></use></svg>
				</div>
			</li>
		</ul>
		<a href="#" class="view-all bg-primary">View All Notifications</a>
	</div>
</div>
<div class="tab-pane " id="search" role="tabpanel">
		<form class="search-bar w-search notification-list friend-requests">
			<div class="form-group with-button">
				<input class="form-control js-user-search" placeholder="Search here people or pages..." type="text">
			</div>
		</form>
</div> -->
</div>
<!-- ... end  Tab panes -->
</header>
<!-- ... end Responsive Header -->
<div class="header-spacer"></div>
<?php if(isset($this->params['breadcrumbs'])) : ?>
<div class="container">
<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="ui-block">
<div class="ui-block-content">
<?= Breadcrumbs::widget([
'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>
<?= Alert::widget() ?>
</div>
</div>
</div>
</div>
</div>
<?php endif; ?>
<?= $content ?>
<!-- Window-popup Update Header Photo -->
<div class="modal fade" id="update-header-photo">
<div class="modal-dialog ui-block window-popup update-header-photo">
<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
<svg class="olymp-close-icon"><use xlink:href="/icon/icons.svg#olymp-close-icon"></use></svg>
</a>
<div class="ui-block-title">
<h6 class="title">Загрузка новой фотографии профиля</h6>
</div>
<div class="upload-photo-container">
<a class="upload-photo-item btn file-btn">
<i class="fa fa-desktop s-icon"></i>
<h6>Загрузить фото</h6>
<span>Выберите фотографию с вашего компьютера<br>&nbsp;</span>
<input type="file" id="upload" value="Choose a file" accept="image/*" />
</a>
<div class="upload-demo-wrap">
<div id="upload-demo"></div>
<button class="upload-result btn btn-primary">Сохранить</button>
</div>
</div>
</div>
</div>
<div class="modal fade" id="update-header-photobg">
<div class="modal-dialog ui-block window-popup update-header-photobg">
<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
<svg class="olymp-close-icon"><use xlink:href="/icon/icons.svg#olymp-close-icon"></use></svg>
</a>
<div class="ui-block-title">
<h6 class="title">Загрузка новой фотографии обложки профиля</h6>
</div>
<div class="upload-photo-container">
<a class="upload-photo-item btn file-btn">
<i class="fa fa-desktop s-icon"></i>
<h6>Загрузить фото</h6>
<span>Выберите фотографию с вашего компьютера<br>&nbsp;</span>
<input type="file" id="uploadbg" value="Choose a file" accept="image/*" />
</a>
<div class="upload-demo-wrapbg">
<div id="upload-demobg"></div>
<button class="upload-resultbg btn btn-primary">Сохранить</button>
</div>
</div>
</div>
</div>
<!-- ... end Window-popup Update Header Photo -->
<!-- Window-popup Choose from my Photo -->
<div class="modal fade" id="choose-from-my-photo">
<div class="modal-dialog ui-block window-popup choose-from-my-photo">
<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
<svg class="olymp-close-icon"><use xlink:href="/icon/icons.svg#olymp-close-icon"></use></svg>
</a>
<div class="ui-block-title">
<h6 class="title">Коллекция фото</h6>
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
<li class="nav-item">
<a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true">
<svg class="olymp-photos-icon"><use xlink:href="/icon/icons.svg#olymp-photos-icon"></use></svg>
</a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-expanded="false">
<svg class="olymp-albums-icon"><use xlink:href="/icon/icons.svg#olymp-albums-icon"></use></svg>
</a>
</li>
</ul>
</div>
<!-- <div class="ui-block-content">
	<div class="tab-content">
		<div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">
			<div class="choose-photo-item" data-mh="choose-item">
				<div class="radio">
					<label class="custom-radio">
						<img src="/img/choose-photo1.jpg" alt="photo">
						<input type="radio" name="optionsRadios">
					</label>
				</div>
			</div>
			<div class="choose-photo-item" data-mh="choose-item">
				<div class="radio">
					<label class="custom-radio">
						<img src="/img/choose-photo2.jpg" alt="photo">
						<input type="radio" name="optionsRadios">
					</label>
				</div>
			</div>
			<div class="choose-photo-item" data-mh="choose-item">
				<div class="radio">
					<label class="custom-radio">
						<img src="/img/choose-photo3.jpg" alt="photo">
						<input type="radio" name="optionsRadios">
					</label>
				</div>
			</div>
			<div class="choose-photo-item" data-mh="choose-item">
				<div class="radio">
					<label class="custom-radio">
						<img src="/img/choose-photo4.jpg" alt="photo">
						<input type="radio" name="optionsRadios">
					</label>
				</div>
			</div>
			<div class="choose-photo-item" data-mh="choose-item">
				<div class="radio">
					<label class="custom-radio">
						<img src="/img/choose-photo5.jpg" alt="photo">
						<input type="radio" name="optionsRadios">
					</label>
				</div>
			</div>
			<div class="choose-photo-item" data-mh="choose-item">
				<div class="radio">
					<label class="custom-radio">
						<img src="/img/choose-photo6.jpg" alt="photo">
						<input type="radio" name="optionsRadios">
					</label>
				</div>
			</div>
			<div class="choose-photo-item" data-mh="choose-item">
				<div class="radio">
					<label class="custom-radio">
						<img src="/img/choose-photo7.jpg" alt="photo">
						<input type="radio" name="optionsRadios">
					</label>
				</div>
			</div>
			<div class="choose-photo-item" data-mh="choose-item">
				<div class="radio">
					<label class="custom-radio">
						<img src="/img/choose-photo8.jpg" alt="photo">
						<input type="radio" name="optionsRadios">
					</label>
				</div>
			</div>
			<div class="choose-photo-item" data-mh="choose-item">
				<div class="radio">
					<label class="custom-radio">
						<img src="/img/choose-photo9.jpg" alt="photo">
						<input type="radio" name="optionsRadios">
					</label>
				</div>
			</div>
			<a href="#" class="btn btn-secondary btn-lg btn--half-width">Отмена</a>
			<a href="#" class="btn btn-primary btn-lg btn--half-width">Выбрать</a>
		</div>
		<div class="tab-pane" id="profile" role="tabpanel" aria-expanded="false">
			<div class="choose-photo-item" data-mh="choose-item">
				<figure>
					<img src="/img/choose-photo10.jpg" alt="photo">
					<figcaption>
						<a href="#">South America Vacations</a>
						<span>Last Added: 2 часа назад</span>
					</figcaption>
				</figure>
			</div>
			<div class="choose-photo-item" data-mh="choose-item">
				<figure>
					<img src="/img/choose-photo11.jpg" alt="photo">
					<figcaption>
						<a href="#">Photoshoot Summer 2016</a>
						<span>Last Added: 5 weeks ago</span>
					</figcaption>
				</figure>
			</div>
			<div class="choose-photo-item" data-mh="choose-item">
				<figure>
					<img src="/img/choose-photo12.jpg" alt="photo">
					<figcaption>
						<a href="#">Amazing Street Food</a>
						<span>Last Added: 6 минут назад</span>
					</figcaption>
				</figure>
			</div>
			<div class="choose-photo-item" data-mh="choose-item">
				<figure>
					<img src="/img/choose-photo13.jpg" alt="photo">
					<figcaption>
						<a href="#">Graffity & Street Art</a>
						<span>Last Added: 16 часов назад</span>
					</figcaption>
				</figure>
			</div>
			<div class="choose-photo-item" data-mh="choose-item">
				<figure>
					<img src="/img/choose-photo14.jpg" alt="photo">
					<figcaption>
						<a href="#">Amazing Landscapes</a>
						<span>Last Added: 13 минут назад</span>
					</figcaption>
				</figure>
			</div>
			<div class="choose-photo-item" data-mh="choose-item">
				<figure>
					<img src="/img/choose-photo15.jpg" alt="photo">
					<figcaption>
						<a href="#">The Majestic Canyon</a>
						<span>Last Added: 57 минут назад</span>
					</figcaption>
				</figure>
			</div>
			<a href="#" class="btn btn-secondary btn-lg btn--half-width">Cancel</a>
			<a href="#" class="btn btn-primary btn-lg disabled btn--half-width">Confirm Photo</a>
		</div>
	</div>
</div> -->
</div>
</div>
<!-- ... end Window-popup Choose from my Photo -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>