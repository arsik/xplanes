<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
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



<div class="content-bg-wrap" style="background: #444 url(http://i.imgur.com/qpRSxQI.jpg) no-repeat center center / cover;">
	<div class="content-bg"></div>
</div>

<style type="text/css">

  .content-bg-wrap::before {
    position: absolute;
    left: 0; right: 0;
    top: 0; bottom: 0;
    background: rgba(0,0,0,.5);
    content: " ";
    display: block;
  }
</style>

<!-- Landing Header -->

<div class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12">
			<div id="site-header-landing" class="header-landing">
				<a href="/" class="logo">
					<img src="/img/logo.png" alt="xPlanes">
					<h5 class="logo-title">xPlanes</h5>
				</a>

				<!-- <ul class="profile-menu">
					<li>
						<a href="#">About Us</a>
					</li>
					<li>
						<a href="#">Careers</a>
					</li>
					<li>
						<a href="#">FAQS</a>
					</li>
					<li>
						<a href="#">Help & Support</a>
					</li>
					<li>
						<a href="#" class="js-expanded-menu">
							<svg class="olymp-menu-icon"><use xlink:href="/icon/icons.svg#olymp-menu-icon"></use></svg>
							<svg class="olymp-close-icon"><use xlink:href="/icon/icons.svg#olymp-close-icon"></use></svg>
						</a>
					</li>
				</ul> -->
			</div>
		</div>
	</div>
</div>

<a href="//www.free-kassa.ru/"><img src="//www.free-kassa.ru/img/fk_btn/14.png"></a>

<!-- ... end Landing Header -->

<!-- Login-Registration Form  -->

<?= $content ?>

<!-- ... end Login-Registration Form  -->



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
