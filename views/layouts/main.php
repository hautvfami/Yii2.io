<?php
use yii\helpers\Html;
use app\assets\AppAsset;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\helpers\Url;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset= "<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <link rel="SHORTCUT ICON" href="images/icon.ico">
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="header-wrap">
    <div class="header">
        <div class="logo"><h1>Đạihọc.tk</h1></div>
        <div class="menu">
            <ul>
                <li><a href="?r=site/index" class="active">Home</a></li>
                <li><a href="?r=site/about">About Us          </a></li>
<!--                <li><a href="?r=admin/index">Solutions          </a></li>-->
                <li><a href="?r=site/contact">Contact</a></li>
                <?php
                    if(!Yii::$app->user->isGuest&&Yii::$app->user->id==100) {
                        echo "<li>".Html::a('Admin', '?r=admin/index')."</li>";
                    }
                ?>
                <?php if (Yii::$app->user->isGuest):?>
                <li><a href="?r=site/login">Login</a></li>
                <?php endif?>
                <?php if (!Yii::$app->user->isGuest):?>
                <li>
                    <?php
//                    if(Yii::$app()->user['level']==0){
//                        echo 'ok';
//                    }
                    echo Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link']//add bootstrap vao cho button thanh link< có boot rồi, chua co đợi em tí
                    )
                    . Html::endForm()
                    ?>
                </li>
                <?php endif?>
            </ul>
        </div>
    </div>
</div><!---header-wrap--->

<div class="wrap">
    <div class="leftcol">
        <div class="search">
            <div class="title">
                <h1>Muốn tìm gì nào ^^</h1>
                <div class="search-input"><input name="" type="text" class="input-style"/></div>
                <div class="search-btn"><img src="images/search-btn.jpg" alt="search" /></div>
            </div>
        </div>

        <div class="block">
            <div class="panel">
                <div class="title">
                    <h1>Tài liệu</h1>
                </div>
                <div class="content">
                    <ul>
                        <?php
                            $list = \app\models\admin_post::find()->all();
                            foreach ($list as $title){
                                echo "<li><a href='?r=site/index&id=".$title->post_id."'>";
                                echo Html::encode($title->title);
                                echo "</a></li>";
                            }
                        ?>
<!--                        <li><a href="#">Sed do eiusmod tempor incididunt ut </a></li>-->
<!--                        <li><a href="#">Praesent sit amet purus ac ligula tem </a></li>-->
<!--                        <li><a href="#">Nam convallis mauris id eros condiment</a></li>-->
<!--                        <li><a href="#">Donec a sem sit amet neque iaculis p</a></li>-->
<!--                        <li><a href="#">Duis sit amet augue ut urna auctor rut</a></li>-->
<!--                        <li><a href="#">Ut fringilla scelerisque enim, nec he</a></li>-->
<!--                        <li class="bor-bottm-non"><a href="#">Donec vitae magna in turpis congue</a></li>-->
                    </ul>
                </div>
            </div>
        </div>

        <div class="block2">
            <div class="title"><h1>Quảng cáo</h1></div>
            <div class="panel">
                <img src="images/image1.jpg" alt="image" />
                <div class="content">
                    <p>0972.805.797</p>
                    <div class="button"><a href="#">Call</a></div>
                </div>
            </div>
            <div class="panel">
                <img src="images/image1.jpg" alt="image" />
                <div class="content">
                    <p>08888.1.1213</p>
                    <div class="button"><a href="#">Call</a></div>
                </div>
            </div>
            <div class="panel bor-bottm-non">
                <img src="images/image1.jpg" alt="image" />
                <div class="content">
                    <p>01266.277.126</p>
                    <div class="button"><a href="#">Call</a></div>
                </div>
            </div>
        </div>
    </div><!---leftcol--->
    <div class="rightcol" xmlns="http://www.w3.org/1999/html">
    <?= $content ?>
    </div>
</div>
<div class="footer-wrap">
    <div class="footer">
        <div class="bolg">
            <div class="title">
                <h1>Theo dõi</h1>
            </div>
            <div class="panel mar-right115">
                <div class="content">
                    <ul>
                        <li><img width="31" height="31" src="images/facebook.png" alt="icon" /></li>
                        <li>Facebook<br />xxx</li>
                    </ul>
                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s); js.id = id;
                            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                    <br><br><br><br>
                    <div class="fb-like" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
                </div>
            </div>
            <!-- End facebook like -->

            <div class="panel">
                <div class="content">
                    <ul>
                        <li><img width="31" height="31" src="images/google.png" alt="icon" /></li>
                        <li>Google<br />xxx</li>
                    </ul>
                    <br><br><br><br>
                    <!-- Đặt thẻ này vào nơi bạn muốn Nút +1 kết xuất. -->
                    <div class="g-plusone" data-size="medium" data-annotation="inline" data-width="300"></div>

                    <!-- Đặt thẻ này sau thẻ Nút +1 cuối cùng. -->
                    <script type="text/javascript">
                        window.___gcfg = {lang: 'vi'};

                        (function() {
                            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                            po.src = 'https://apis.google.com/js/platform.js';
                            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                        })();
                    </script>
                </div>
            </div>
        </div>

        <div class="quickcontact">
            <div class="title">
                <h1>Liên hệ</h1>
            </div>
            <div class="panel">
                <div class="content">
                    <ul>
                        <li><img src="images/icon1.png" alt="icon" /></li>
                        <li>Trần Văn Hậu<br />Teamleader</li>
                    </ul>
                    <p>Làm khoa học cống hiến trí tuệ muốn được xã hội ghi nhận, làm doanh nhân cống hiến sự tiện lợi muốn lợi nhuận.</p>
                    <p><span><a href="mailto:hautv.fami@gmail.com">Email: hautv.fami@gmail.com</a></span></p>
                    <!--<p><span>Tel: +84 972 805 797</span></p>-->
                </div>
            </div>
        </div>
    </div>
</div><!---footer--->
<div class="copyright-wrap">
    <div class="copyright">
        <div class="content">
            <p>© 2012 All Rights Reserved  |  Privacy Policy
                Designed by :<a href="#" class="active"> www.alltemplateneeds.com.</a>
            </p>
        </div>
    </div>
</div><!---copyright-wrap--->
</body>
</html>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>