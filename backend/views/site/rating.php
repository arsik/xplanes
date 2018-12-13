<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = "Рейтинги";
?>
<div class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Рейтинг игроков</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>

				<ul class="notification-list friend-requests">
          <?php
          	$count = 0;
            foreach($users as $user) :

            	$count++;
                $clan = '-';
                if($user->pMember > 0) {
                    $full = 0;
                    for($i = 0; $i < count($clans); $i++) {
                        if($clans[$i]->id == $user->pMember) {
                            $full = $i;
                            break;
                        }
                    }
                    $clan = '<a href="/clan?id='.$clans[$full]->id.'"><span style="color:#' . $clans[$full]->color . '">[' . $clans[$full]->shortName . '] ' . $clans[$full]->name . '</span></a>';
                }

          ?>
					<li>
						<div class="number-rating">
							<?=$count?>
						</div>
						<div class="author-thumb">
							<img src="/<?=$user->photo?>" class="img-responsive" alt="<?=$user->pName?>">
						</div>
						<div class="notification-event">
							<a href="/site/profile?nickname=<?=$user->pName?>" class="h6 notification-friend"><?=$user->pName?></a>
							<span class="chat-message-item"><?=$clan?></span>
						</div>
			            <div class="notification-icon rating-block">
			              <span><?=$user->pScore?></span>
			              <span><?=$user->pAllDamage?></span>
			            </div>
						<!-- <span class="notification-icon">
							<a href="#" class="accept-request">
								<span class="icon-add">
									<svg class="olymp-happy-face-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="icons/icons.svg#olymp-happy-face-icon"></use></svg>
								</span>
								Accept Friend Request
							</a>
							<a href="#" class="accept-request request-del">
								<span class="icon-minus">
									<svg class="olymp-happy-face-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="icons/icons.svg#olymp-happy-face-icon"></use></svg>
								</span>
							</a>
						</span>
						<div class="more">
							<svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="icons/icons.svg#olymp-three-dots-icon"></use></svg>
							<svg class="olymp-little-delete"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="icons/icons.svg#olymp-little-delete"></use></svg>
						</div> -->
					</li>
          <?php endforeach; ?>
				</ul>
			</div>
    </div>
  </div>
</div>
