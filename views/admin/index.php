<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\adminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admin Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Admin Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'post_id',
            'title:ntext',
            'content:ntext',
            //'username',
            'date_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php  //echo '<hr>'.$this->render('_search', ['model' => $searchModel]); ?>
</div>
