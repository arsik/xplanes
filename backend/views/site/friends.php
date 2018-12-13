<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = "Все друзья (" . count($friends) . ")";

$action = $_GET['action'];
switch ($action) {
  case 'requests':
    $this->title = "Заявки в друзья (" . count($friends) . ")";
    break;
  case 'following':
    $this->title = "Исходящие заявки (" . count($friends) . ")";
    break;
  case 'followers':
    $this->title = "Подписчики (" . count($friends) . ")";
    break;
}

?>
<div class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block responsive-flex">
				<div class="ui-block-title">
					<div class="h6 title">Друзья</div>
					<form class="w-search">
						<div class="form-group with-button is-empty">
							<input class="form-control" type="text" placeholder="Начните вводить имя друга...">
							<button>
								<svg class="olymp-magnifying-glass-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/icon/icons.svg#olymp-magnifying-glass-icon"></use></svg>
							</button>
						<span class="material-input"></span></div>
					</form>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title"><?=$this->title?></h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
				<ul class="notification-list friend-requests">
          <?php
            foreach($friends as $friend) :
              if($friend->user_id_from == $user->id) $fid = $friend->user_id_to;
              else $fid = $friend->user_id_from;
              $f_user = \common\models\User::findOne(['id' => $fid]);
          ?>
					<li>
						<div class="author-thumb">
							<img src="/<?=$f_user->photo?>" class="img-responsive" alt="author">
						</div>
						<div class="notification-event">
							<a href="/site/profile?nickname=<?=$f_user->pName?>" class="h6 notification-friend"><?=$f_user->pName?></a>
							<span class="chat-message-item"><?=($f_user->pOnline ? 'Online' : 'Offline')?></span>
						</div>
            <?php
              switch ($action) {
                  case 'all': {
                      echo('<span class="notification-icon icon-norm-block">
                        <a href="#" class="accept-request icon-norm" style="width:auto;">
                          <span><i class="fa fa-envelope s-icon white"></i></span>
                          Написать сообщение
                        </a>
                        <a href="/site/remove-friend?id='.$f_user->id.'" class="accept-request request-del">
                          <span><i class="fa fa-user-times s-icon white"></i></span>
                        </a>
                      </span>');
                      break;
                  }
                  case 'requests': {
                      echo('<span class="notification-icon icon-norm-block">
                        <a href="/site/accept-friend?id='.$f_user->id.'" class="accept-request">
                          <span><i class="fa fa-check s-icon white"></i></span>
                        </a>
                        <a href="/site/reject-friend?id='.$f_user->id.'" class="accept-request request-del">
                          <span><i class="fa fa-times s-icon white"></i></span>
                        </a>
                      </span>');
                      break;
                  }
                  case 'following': {
                      echo('<span class="notification-icon icon-norm-block">
                        <a href="#" class="accept-request icon-norm" style="width:auto;">
                          <span><i class="fa fa-envelope s-icon white"></i></span>
                          Написать сообщение
                        </a>
                        <a href="/site/decline-friend?id='.$f_user->id.'" class="accept-request request-del">
                          <span><i class="fa fa-user-times s-icon white"></i></span>
                        </a>
                      </span>');
                      break;
                  }
                  case 'followers': {
                      echo('<span class="notification-icon icon-norm-block">
                        <a href="#" class="accept-request icon-norm request-del" style="width:auto;">
                          <span><i class="fa fa-envelope s-icon white"></i></span>
                          Написать сообщение
                        </a>
                        <a href="/site/accept-friend?id='.$f_user->id.'" class="accept-request">
                          <span><i class="fa fa-check s-icon white"></i></span>
                        </a>
                      </span>');
                      break;
                  }
              }
            ?>
						<!-- <div class="more">
							<svg class="olymp-three-dots-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/icon/icons.svg#olymp-three-dots-icon"></use></svg>
							<svg class="olymp-little-delete"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/icon/icons.svg#olymp-little-delete"></use></svg>
						</div> -->
					</li>
          <?php endforeach; ?>
				</ul>
			</div>
		</div>
		<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12">
      <div class="ui-block">
				<div class="your-profile">
					<div class="ui-block-title">
						<a href="/site/friends?action=all" class="h6 title">Все друзья</a>
					</div>
          <div class="ui-block-title">
						<a href="/site/friends?action=requests" class="h6 title">Заявки в друзья</a>
						<span class="items-round-little bg-blue"><?=$countRequests?></span>
					</div>
          <div class="ui-block-title">
						<a href="/site/friends?action=following" class="h6 title">Исходящие заявки</a>
						<span class="items-round-little bg-orange"><?=$countFollowing?></span>
					</div>
          <div class="ui-block-title">
						<a href="/site/friends?action=followers" class="h6 title">Подписчики (<?=$countFollowers?>)</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
