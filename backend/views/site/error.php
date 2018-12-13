<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="ui-block">
        <div class="ui-block-title">
					<h6 class="title"><?= Html::encode($this->title) ?></h6>
				</div>
				<div class="ui-block-content">

          <div class="alert alert-danger">
              <?= nl2br(Html::encode($message)) ?>
          </div>

          <p>
              The above error occurred while the Web server was processing your request.
          </p>
          <p>
              Please contact us if you think this is a server error. Thank you.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
