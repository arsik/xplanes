<?php
/* @var $this yii\web\View */

$this->title = "Партнерство";
?>
<div class="main-header">
	<div class="content-bg-wrap bg-account"></div>
	<div class="container">
		<div class="row">
			<div class="col col-lg-8 m-auto col-md-8 col-sm-12 col-12">
				<div class="main-header-content">
					<h1>Партнерство</h1>
					<p>Добро пожаловать на страницу партнерства! Здесь вы можете оформить партнерство и создать свой промокод.<br>В дальнейшем люди которые ввели этот промокод будут получать бонус в размере $30 000,<br> а Вы будете получать процент в размере 25% от суммы их покупок в Магазине .</p>
				</div>
			</div>
		</div>
	</div>
	<img class="img-bottom" src="/img/blog_bottom.png" alt="friends">
</div>
<div class="container">
	<div class="row">
		<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Зарегистрируйте свой YouTube канал</h6>
				</div>
				<div class="ui-block-content">

					
					<!-- Change Password Form -->
					
					<form method="POST" action="/partner/create">
						<input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>">
						<div class="row">

							<?php if(isset($error) && strlen($error) > 0) : ?>
							<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating error-dial">
									<?=$error?>
								</div>
							</div>
							<?php endif; ?>
					
							<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Ссылка на канал</label>
									<input class="form-control" placeholder="" type="text" value="" name="Partner[link]">
								<span class="material-input"></span></div>
							</div>
					
							<div class="col col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group label-floating is-empty">
									<label class="control-label">Промокод</label>
									<input class="form-control" placeholder="" type="text" name="Partner[promocode]" style="text-transform: uppercase;">
								<span class="material-input"></span></div>
							</div>
							<!-- <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group label-floating is-empty">
									<label class="control-label">Confirm New Password</label>
									<input class="form-control" placeholder="" type="password">
								<span class="material-input"></span></div>
							</div> -->

							<div class="col col-lg-12 col-sm-12 col-sm-12 col-12">

								<fieldset class="form-group">
									<select class="selectpicker form-control" name="Partner[payment]">
										<option value="">Способ вывода средств</option>
										<option value="VISA/MasterCard">VISA/MasterCard</option>
										<option value="QIWI">QIWI</option>
										<option value="Webmoney">Webmoney</option>
										<option value="YandexMoney">YandexMoney</option>
									</select>
								</fieldset>

							</div>

					
							<div class="col col-lg-12 col-sm-12 col-sm-12 col-12">
								<div class="remember">
					
									<div class="checkbox">
										<label>
											<input name="optionsCheckboxes" type="checkbox" name="Partner[rules]"><span class="checkbox-material"><!-- <span class="check"></span> --></span>
											Соглашаюсь с правилами проекта
										</label>
									</div>
					
									<!-- <a href="#" class="forgot">Forgot my Password</a> -->
								</div>
							</div>
					
							<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<button class="btn btn-primary btn-lg full-width">Продолжить</button>
							</div>
					
						</div>
					</form>
					
					<!-- ... end Change Password Form -->
				</div>
			</div>
		</div>

		<div class="col col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12  responsive-display-none">
			<div class="ui-block">

				
				
				<!-- Your Profile  -->
				
				<div class="your-profile">
					<div class="ui-block-title ui-block-title-small">
						<h6 class="title">Информация</h6>
					</div>
				
					<div id="accordion" role="tablist" aria-multiselectable="true">
						<div class="card">
							<div class="card-header" role="tab" id="headingOne">
								<h6 class="mb-0">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										Требования к каналу
									</a>
								</h6>
							</div>
				
							<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
								<ul class="your-profile-menu">
									<li>
										Минимальное кол-во подписчиков: 100
									</li>
									<li>
										Минимальное кол-во просмотров видео: 100
									</li>
									<li>
										Канал игровой тематики.
									</li>
									<li>
										Поддержка одной из представленных платежных систем.
									</li>
								</ul>
							</div>
						</div>
					</div>
				
					<!-- <div class="ui-block-title">
						<a href="33-YourAccount-Notifications.html" class="h6 title">Notifications</a>
						<a href="#" class="items-round-little bg-primary">8</a>
					</div>
					<div class="ui-block-title">
						<a href="34-YourAccount-ChatMessages.html" class="h6 title">Chat / Messages</a>
					</div>
					<div class="ui-block-title">
						<a href="35-YourAccount-FriendsRequests.html" class="h6 title">Friend Requests</a>
						<a href="#" class="items-round-little bg-blue">4</a>
					</div>
					<div class="ui-block-title ui-block-title-small">
						<h6 class="title">FAVOURITE PAGE</h6>
					</div>
					<div class="ui-block-title">
						<a href="36-FavPage-SettingsAndCreatePopup.html" class="h6 title">Create Fav Page</a>
					</div>
					<div class="ui-block-title">
						<a href="36-FavPage-SettingsAndCreatePopup.html" class="h6 title">Fav Page Settings</a>
					</div> -->
				</div>
				
				<!-- ... end Your Profile  -->
				

			</div>
		</div>
	</div>
</div>

<style type="text/css">
	.main-header {
		max-width: 100%;
	}
	.header-spacer {
		height: 70px;
	}
	.bg-account {
    	background-image: url(https://theme.crumina.net/html-olympus/img/top-header3.png);
	}

	.content-bg-wrap {
	    position: absolute;
	    top: 0;
	    left: 0;
	    right: 0;
	    bottom: 0;
	    width: 100%;
	    height: 100%;
	    margin: 0;
	    box-sizing: border-box;
	    -webkit-animation: slide 50s linear infinite;
	    animation: slide 50s linear infinite;
	    will-change: background-position;
	    background-size: contain;
	}
	.error-dial {
		background: #ff5e3a;
	    color: #fff;
	    padding: 1.1rem;
	    border-radius: 0.25rem;
	    font-size: 14px;
	}
	.your-profile-menu li {
		margin-bottom: 20px;
	}
</style>