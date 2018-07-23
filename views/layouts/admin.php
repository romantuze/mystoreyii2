<?php
  /* @var $this \yii\web\View */
  /* @var $content string */
  
  use app\widgets\Alert;
  use yii\helpers\Html;
  use yii\bootstrap\Nav;
  use yii\bootstrap\NavBar;
  use yii\widgets\Breadcrumbs;
  use yii\helpers\Url;
  use app\assets\AppAsset;
  
  AppAsset::register($this);
  ?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
  <head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
  </head>
  <body>
    <?php $this->beginBody() ?>
    <div class="container">
      <header class="header">
        <div class="row">
          <div class="col-md-6">
            <div class="logo">
              <img src="images/logo.png" alt="">
              <span>Интернет магазин снаряжения</span>
            </div>
          </div>
          <div class="col-md-3">
            <div class="search-form">
              <div class="input-group">
                <div class="input-group-addon">Поиск</div>
                <input type="text" class="form-control" placeholder="">
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="header-cart">Ваша корзина пуста</div>
          </div>
        </div>
      </header>
      <?php
        NavBar::begin([
            'brandLabel' => 'menu',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items' => [
                ['label' => 'Главная', 'url' => ['/site/index']],
                ['label' => 'Статьи', 'url' => ['/admin/article']],
                ['label' => 'Категории статей', 'url' => ['/admin/ArticleCategory']],
            ],
        ]);
        NavBar::end();
        ?>
      <main class="main">
        <div class="row">
          <div class="col-md-12">
            <div class="main-page">
              <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
              <?= Alert::widget() ?>
              <?= $content ?>
            </div>
          </div>
        </div>
      </main>
    </div>
    <footer class="footer">
      <div class="footer-text">
        <p>Internet Magazin copyringts <?= date('Y') ?></p>
        <p><?= Yii::powered() ?></p>
      </div>
    </footer>
    <?php $this->endBody() ?>
  </body>
</html>
<?php $this->endPage() ?>