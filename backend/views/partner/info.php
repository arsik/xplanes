<?php
/* @var $this yii\web\View */

$this->title = "Информация о партнерстве с каналом " . $user->channelName;
?>
<div class="container">
	<div class="row">
		<div class="col col-lg-4 col-md-6 col-sm-12 col-12">
			<div class="ui-block">
				
				<!-- Friend Item -->
				
				<div class="friend-item">
					<div class="friend-header-thumb">
						<img src="<?=$user->channelPhoto?>" alt="<?=$user->channelName?>">
					</div>
				
					<div class="friend-item-content">
				
						<!-- <div class="more">
							<svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
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
							<div class="author-thumb">
								<img src="<?=$user->channelPhoto?>" alt="<?=$user->channelName?>">
							</div>
							<div class="author-content">
								<a href="#" class="h5 author-name"><?=$user->channelName?></a>
								<div class="country"><?=$user->pName?></div>
							</div>
						</div>
				
						<div class="swiper-container swiper-swiper-unique-id-0 initialized swiper-container-horizontal" id="swiper-unique-id-0">
							<div class="swiper-wrapper" style="width: 780px; transform: translate3d(-195px, 0px, 0px); transition-duration: 0ms;"><div class="swiper-slide swiper-slide-duplicate swiper-slide-prev swiper-slide-duplicate-next" data-swiper-slide-index="1" style="width: 195px;">
									<div class="friend-since" data-swiper-parallax="-100" style="transform: translate3d(-100px, 0px, 0px); transition-duration: 0ms;">
										<span>Промокод:</span>
										<div class="h6"><?=$user->channelPromocode?></div>
									</div>
								</div>
								<div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" style="width: 195px;">
									<div class="friend-count" data-swiper-parallax="-500" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
										<a href="#" class="friend-count-item">
											<div class="h6"><?=$referals?></div>
											<div class="title">Рефералов</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6"><?=$referalsPayers?></div>
											<div class="title">Покупок</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6"><?=$money?>₽</div>
											<div class="title">Денег к выводу</div>
										</a>
									</div>
									<div class="control-block-button" data-swiper-parallax="-100" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
										<a href="#" class="btn btn-control bg-blue">
											<i class="fa fa-envelope s-icon white"></i>
										</a>
				
										<a href="#" class="btn btn-control bg-purple">
											<i class="fa fa-dollar s-icon white"></i>
										</a>
				
									</div>
								</div>
				
								<div class="swiper-slide swiper-slide-next swiper-slide-duplicate-prev" data-swiper-slide-index="1" style="width: 195px;">
									<div class="friend-since" data-swiper-parallax="-100" style="transform: translate3d(-100px, 0px, 0px); transition-duration: 0ms;">
										<span>Промокод:</span>
										<div class="h6"><?=$user->channelPromocode?></div>
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
											<svg class="olymp-happy-face-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
										</a>
				
										<a href="#" class="btn btn-control bg-purple">
											<svg class="olymp-chat---messages-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
										</a>
				
									</div>
								</div></div>
				
							<!-- If we need pagination -->
							<div class="swiper-pagination pagination-swiper-unique-id-0 swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span><span class="swiper-pagination-bullet"></span></div>
						</div>
					</div>
				</div>
				<!-- ... end Friend Item -->					
			</div>
		</div>
		<div class="col col-lg-8 col-md-6 col-sm-12 col-12">
			<div class="ui-block responsive-flex" data-mh="pie-chart" style="">
				<div class="ui-block-title">
					<div class="h6 title">Статистика</div>
					<div class="points align-right">
						<span>
							<span class="statistics-point bg-blue"></span>
							Количество рефералов
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
</div>


<?php

$script = <<< JS

var lineGraphicChart = document.getElementById("line-graphic-chart");

function getDates()
{
	var dates = [];
	var timestamp = Date.now();

	for(var i = 0; i < 23; i++)
	{
		var date = new Date(timestamp);
		var obj = "" + (date.getDate() < 10 ? "0" : "") + date.getDate() + "." + ((date.getMonth()+1) < 10 ? "0" : "") + (date.getMonth()+1) + "." + date.getFullYear() + "";
	    dates.push(obj);
	    timestamp = timestamp-86400000;
	}
	console.log(dates);
	return [].concat(dates).reverse();
}

if (lineGraphicChart !== null) {
    var ctx_lg = lineGraphicChart.getContext("2d");
    var data_lg = {
        labels: getDates(),
        datasets: [
            {
                label: " - Рефералов",
                backgroundColor: "rgba(0,153,255,0.4)",
                borderColor: "rgba(0,153,255,0.8)",
                borderWidth: 4,
                pointBorderColor: "#0099ff",
                pointBackgroundColor: "#fff",
                pointBorderWidth: 4,
                pointRadius: 0,
                pointHoverRadius: 8,
                data: [$dates]
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

JS;

$this->registerJs($script);

// $this->registerJsFile('/js/Chart.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
// $this->registerJsFile('/js/chartjs-plugin-deferred.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
// $this->registerJsFile('/js/circle-progress.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
// $this->registerJsFile('https://www.gstatic.com/charts/loader.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
// $this->registerJsFile('/js/run-chart.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
	
?>





<style type="text/css">
	.btn-control {
		line-height: 50px;
	}
</style>