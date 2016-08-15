<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Liên hệ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-form mar-top30">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Cảm ơn bạn đã liên hệ với chúng tôi. Chúng tôi sẽ hồi đáp bạn sớm nhất có thể.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <p>
            Nếu bạn có ý kiến đóng góp hoặc câu hỏi, vui lòng điền theo mẫu để phản hồi tới chúng tôi.
            Cảm ơn.
        </p>

        <div class="page-content">
            <div class="panel mar-bottom">

                <?php $form = ActiveForm::begin(['id' => 'contact-form mar-top30']); ?>

                    <?= $form->field($model, 'name')->textInput(['class'=>'input_text','placeholder'=>'Trần Văn A']) ?>

                    <?= $form->field($model, 'email')->textInput(['class'=>'input_text','placeholder'=> 'example@gmail.com']) ?>

                    <?= $form->field($model, 'subject')->textInput(['class'=>'input_text']) ?>

                    <?= $form->field($model, 'body')->textArea(['class'=>'message']) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="input_text">{image}</div><div class="input_text">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'button', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
