<?php
/* @var $this yii\web\View */
$this->title = 'Статистика';
$user = Yii::$app->user->identity;
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
										<a href="/site/about" class="active">Статистика</a>
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
	<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<div class="ui-block">
			<div class="ui-block-content">
				<ul class="statistics-list-count">
					<li>
						<div class="points">
							<span>
								Рейтинг
							</span>
						</div>
						<div class="count-stat">
							<?=$user->pAllDamage?>
							<!-- <span class="indicator positive"> + 4.207</span> -->
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<div class="ui-block">
			<div class="ui-block-content">
				<ul class="statistics-list-count">
					<li>
						<div class="points">
							<span>
								Рейтинг в клане
							</span>
						</div>
						<div class="count-stat">
							<?=($user->pMember > 0 ? $user->pClanDamage : '-')?>
							<?=($user->pMember > 0 ? '<!--<span class="indicator negative"> - 12.352</span>-->' : '')?>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<div class="ui-block">
			<div class="ui-block-content">
				<ul class="statistics-list-count">
					<li>
						<div class="points">
							<span>
								Наличные
							</span>
						</div>
						<div class="count-stat">
							$<?=$user->pMoney?>
							<!-- <span class="indicator positive"> + 1.056</span> -->
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<div class="ui-block">
			<div class="ui-block-content">
				<ul class="statistics-list-count">
					<li>
						<div class="points">
							<span>
								В банке
							</span>
						</div>
						<div class="count-stat">
							$<?=$user->pBank?>
							<!-- <span class="indicator positive"> + 2.847</span> -->
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
</div>
<div class="container">
<div class="row">
	<div class="col-xl-8 push-xl-4 col-lg-8 push-lg-4 col-md-12 col-sm-12 col-xs-12">
		<div class="row">
			<div class="col-md-12">
				<div class="ui-block responsive-flex" data-mh="pie-chart" style="">
					<div class="ui-block-title">
						<div class="h6 title">Статистика</div>
						<!-- <div class="btn-group bootstrap-select form-control without-border"><button type="button" class="btn dropdown-toggle btn-secondary" data-toggle="dropdown" role="button" title="LAST 3 MONTH"><span class="filter-option pull-left">LAST 3 MONTH</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="0" class="selected"><a tabindex="0" class=" dropdown-item" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">LAST 3 MONTH</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class=" dropdown-item" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">LAST YEAR (2016)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><div class="form-group"><select class="selectpicker form-control without-border" size="0" tabindex="-98">
						<option value="CUR">LAST 3 MONTH</option>
						<option value="LY">LAST YEAR (2016)</option>
						</select><span class="material-input"></span></div></div> -->
						<div class="points align-right">
							<span>
								<span class="statistics-point bg-blue"></span>
								Активность
							</span>
						</div>
						<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg></a>
					</div>
					<div class="ui-block-content">
						<div class="chart-js chart-js-line-graphic"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
							<canvas id="line-graphic-chart" width="562" height="230" style="display: block; width: 281px; height: 115px;"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-lg-6">
						<div class="ui-block">
							<div class="ui-block-title">
								<div class="h6 title">Uptime</div>
								<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg></a>
							</div>
							<div class="ui-block-content">
								<div class="circle-progress circle-pie-chart">
									<?php $uptime = ($user->pAllTime <= 0 ? 0 : round(100 - ($user->pAFKTime/$user->pAllTime*100),1)); ?>
									<div class="pie-chart" data-value="<?=$uptime/100?>" data-startcolor="#38a9ff" data-endcolor="#317cb6">
										<div class="content"><?=$uptime?><span>%</span></div>
									</div>
								</div>
								<div class="chart-text">
									<h6>Активность</h6>
									<p>Ваша активность в момент прибывания на сервере.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="ui-block" data-mh="pie-chart" style="">
							<div class="ui-block-title">
								<div class="h6 title">Игровая активность</div>
								<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg></a>
							</div>
							<div class="ui-block-content">
								<div class="chart-with-statistic">
									<ul class="statistics-list-count">
										<li>
											<div class="points">
												<span>
													<span class="statistics-point bg-purple"></span>
													В небе
												</span>
											</div>
											<div class="count-stat"><?=round($user->pFlyTime/3600,2)?></div>
										</li>
										<li>
											<div class="points">
												<span>
													<span class="statistics-point bg-breez"></span>
													На земле
												</span>
											</div>
											<div class="count-stat"><?=round($user->pFootTime/3600,2)?></div>
										</li>
										<li>
											<div class="points">
												<span>
													<span class="statistics-point bg-primary"></span>
													AFK
												</span>
											</div>
											<div class="count-stat"><?=round($user->pAFKTime/3600,2)?></div>
										</li>
										<li>
											<div class="points">
												<span>
													<span class="statistics-point bg-yellow"></span>
													В бою
												</span>
											</div>
											<div class="count-stat"><?=round($user->pCombatTime/3600,2)?></div>
										</li>
									</ul>
									<div class="chart-js chart-js-pie-color"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
										<canvas id="pie-color-chart" width="338" height="338" style="display: block; width: 169px; height: 169px;"></canvas>
										<div class="general-statistics"><?=round($user->pAllTime/3600,2)?>
											<span>Часов проведенных<br>на сервере</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-4 pull-xl-8 col-lg-4 pull-lg-8 col-md-12 col-sm-12 col-xs-12">
		<div class="ui-block">
			<div class="ui-block-title">
				<h6 class="title">Персонаж</h6>
				<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg></a>
			</div>
			<div class="ui-block-content">
				<ul class="widget w-personal-info">
					<li>
						<span class="title">Email</span>
						<span class="text"><?=$user->pEmail?></span>
					</li>
					<li>
						<span class="title">Пол</span>
						<span class="text"><?=($user->pSex ? 'Мужской' : 'Женский')?></span>
					</li>
					<li>
						<span class="title">Скин</span>
						<span class="text"><?=$user->pSkin?></span>
					</li>
					<li>
						<span class="title">Уровень</span>
						<span class="text"><?=$user->pScore?></span>
					</li>
					<li>
						<span class="title">Exp</span>
						<span class="text"><?=$user->pExp?>/800</span>
					</li>
					<li>
						<span class="title">Рейтинг</span>
						<span class="text"><?=$user->pAllDamage?></span>
					</li>
				</ul>
			</div>
		</div>
		<div class="ui-block">
			<div class="ui-block-title">
				<h6 class="title">Транспорт</h6>
				<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg></a>
			</div>
			<div class="ui-block-content">
				<ul class="widget w-personal-info">
					<?php if($vehicle) : ?>
					<li>
						<span class="title">Модель</span>
						<span class="text">Rustler</span>
					</li>
					<li>
						<span class="title">Надпись</span>
						<span class="text"><?=$vehicle->vNumber?></span>
					</li>
					<li>
						<span class="title">Корпус</span>
						<span class="text"><?=($vehicle->vNeedFix == 0 ? ($vehicle->vHealth-200)+$vehicle->vArmour : $vehicle->vHealth-200)?>/<?=($vehicle->vHealth-200)+$vehicle->vArmour?></span>
					</li>
					<li>
						<span class="title">Топливо</span>
						<span class="text"><?=$vehicle->vFuel?>/565</span>
					</li>
					<li>
						<span class="title">Ракеты</span>
						<span class="text"><?=($vehicle->vRocketSystem ? $vehicle->vRockets . '/2' : 'Ракетная установка отсутствует')?></span>
					</li>
					<?php else : ?>
						<li>
							<span class="title">Нет</span>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
</div>
</div>
<?php

$alltime = $user->pAllTime;
$flytime = round($user->pFlyTime/3600,2);
$combattime = round($user->pCombatTime/3600,2);
$foottime = round($user->pFootTime/3600,2);
$afktime = round($user->pAFKTime/3600,2);

$script = <<< JS

var lineGraphicChart = document.getElementById("line-graphic-chart");

if (lineGraphicChart !== null) {
    var ctx_lg = lineGraphicChart.getContext("2d");
    var data_lg = {
        labels: ["00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00"],
        datasets: [
            {
                label: " - Активность",
                backgroundColor: "rgba(0,153,255,0.4)",
                borderColor: "rgba(0,153,255,0.8)",
                borderWidth: 4,
                pointBorderColor: "#0099ff",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 4,
                pointRadius: 0,
                pointHoverRadius: 8,
                data: [$user->pActivity]
            }]
    };

    var lineGraphicEl = new Chart(ctx_lg, {
        type: 'line',
        data: data_lg,
        options: {
            deferred: {           // enabled by default
                delay: 300        // delay of 500 ms after the canvas is considered inside the viewport
            },
            legend: {
                display: false
            },
            responsive: true,
            scales: {
                xAxes: [{
                    gridLines: {
                        color: "#f0f4f9"
                    },
                    ticks: {
                        fontColor: '#888da8'
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        beginAtZero:true,
                        fontColor: '#888da8'
                    }
                }]
            }
        }
    });
}

var pieColorChart = document.getElementById("pie-color-chart");

if (pieColorChart !== null) {
    var ctx_pc = pieColorChart.getContext("2d");
    var data_pc = {
        labels: ["В небе", "На земле", "AFK", "В бою"],
        datasets: [
            {
                data: [$flytime, $foottime, $afktime, $combattime],
                borderWidth: 0,
                backgroundColor: [
                    "#7c5ac2",
                    "#08ddc1",
                    "#ff5e3a",
                    "#ffd71b"
                ]
            }]
    };

    var pieColorEl = new Chart(ctx_pc, {
        type: 'doughnut',
        data: data_pc,
        options: {
            deferred: {           // enabled by default
                delay: 300        // delay of 500 ms after the canvas is considered inside the viewport
            },
            cutoutPercentage:93,
            legend: {
                display: false
            },
            animation: {
                animateScale: false
            }
        }
    });
}

JS;

$this->registerJs($script);

// $this->registerJsFile('/js/Chart.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
// $this->registerJsFile('/js/chartjs-plugin-deferred.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
// $this->registerJsFile('/js/circle-progress.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
// $this->registerJsFile('https://www.gstatic.com/charts/loader.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
// $this->registerJsFile('/js/run-chart.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
	
?>



