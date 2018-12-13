<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'xPlanes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
	<div class="row">
		<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
			<div class="landing-content">
				<h1>Добро пожаловать на xPlanes Rustler Air War</h1>
				<p>Крупнейший симулятор воздушных боев на движке GTA San Andreas Multyplayer.<br>Участвуйте в воздушных боях с друзьями, создавайте кланы, зарабатывайте достижения. Все это на xPlanes RAW
				</p>
			</div>
			<a href="samp://95.213.236.203:7777" class="btn btn-md bg-blue" style="font-size:14px; text-transform: uppercase;">Подключиться</a>
			<a href="#signup" class="btn btn-md bg-blue" style="font-size:14px; text-transform: uppercase;">Купить аккаунт</a>
		</div>

		<div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-xs-12">
			<div class="registration-login-form">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#home" role="tab">
							<svg class="olymp-login-icon"><use xlink:href="/icon/icons.svg#olymp-login-icon"></use></svg>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#profile" role="tab">
							<svg class="olymp-register-icon"><use xlink:href="/icon/icons.svg#olymp-register-icon"></use></svg>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#signup" role="tab">
							<svg class="olymp-register-icon"><use xlink:href="/icon/icons.svg#olymp-register-icon"></use></svg>
						</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane " id="home" role="tabpanel" data-mh="log-tab">
						<div class="title h6">Мониторинг</div>

            <div class="monitor-info">
              <div class="monitor-info__title">xPlanes | Rustler Air War<span>95.213.236.203:7777</span></div>
              <div class="monitor-info__stats">
                <span>Игроков<br>онлайн</span>
                <span><?=count($players)?></span>
              </div>
            </div>
            <div class="detail-info">
              <div class="nameof">
                <span class="name">Никнейм</span>
                <span class="score">Уровень</span>
                <span class="ping">Клан</span>
              </div>
              <ul class="detail-info__list mCustomScrollbar" style="position:relative">
                <?php foreach($players as $player) : ?>
                <li>
                  <span class="name"><?=$player->pName?></span>
                  <span class="score"><?=$player->pScore?></span>
                  <span class="ping"><?=$player->pMember?></span>
                </li>
                <?php endforeach; ?>
              </ul>
            </div>


					</div>


					<div class="tab-pane" id="profile" role="tabpanel" data-mh="log-tab">
						<div class="title h6">Авторизация</div>
						<form class="content" action="/site/login" method="post">
              <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12">
                  <?php if($errors) : ?>
                  <p class="error-text">Неверный никнейм или пароль</p>
                  <?php endif; ?>
									<div class="form-group label-floating is-empty">
										<label class="control-label">Никнейм</label>
										<input class="form-control" name="LoginForm[username]" placeholder="" type="text" required>
									</div>
									<div class="form-group label-floating is-empty">
										<label class="control-label">Пароль</label>
										<input class="form-control" name="LoginForm[password]" placeholder="" type="password" required>
									</div>

									<div class="remember">

										<div class="checkbox">
											<label>
												<input name="optionsCheckboxes" name="LoginForm[rememberMe]" value="1" type="checkbox">
												Запомнить меня
											</label>
										</div>
										<a href="#" class="forgot">Забыли пароль?</a>
									</div>

									<button class="btn btn-lg btn-primary full-width">Войти</button>

									<!-- <div class="or"></div>

									<a href="#" class="btn btn-lg bg-facebook full-width btn-icon-left"><i class="fa fa-facebook" aria-hidden="true"></i>Login with Facebook</a>

									<a href="#" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fa fa-twitter" aria-hidden="true"></i>Login with Twitter</a>


									<p>Don’t you have an account? <a href="#">Register Now!</a> it’s really simple and you can start enjoing all the benefits!</p> -->
								</div>
							</div>
						</form>
					</div>

					<div class="tab-pane active" id="signup" role="tabpanel" data-mh="log-tab">
						<div class="title h6">Регистрация</div>
						<form class="content" action="/site/signup" method="post">
              <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
							<div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12">
                  <?php if($errors) : ?>
                  <p class="error-text">Неверный никнейм или пароль</p>
                  <?php endif; ?>
									<div class="form-group label-floating is-empty">
										<label class="control-label">Никнейм</label>
										<input class="form-control" name="LoginForm[username]" placeholder="" type="text" required>
									</div>
									<div class="form-group label-floating is-empty">
										<label class="control-label">E-Mail</label>
										<input class="form-control" name="LoginForm[email]" placeholder="" type="text" required>
									</div>
									<div class="form-group label-floating is-empty">
										<label class="control-label">Пароль</label>
										<input class="form-control" name="LoginForm[password]" placeholder="" type="password" required>
									</div>
									<div class="form-group label-floating is-empty">
										<label class="control-label">Промокод</label>
										<input class="form-control" name="LoginForm[password]" placeholder="" type="text">
									</div>
									<button class="btn btn-lg btn-primary full-width">Войти</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
