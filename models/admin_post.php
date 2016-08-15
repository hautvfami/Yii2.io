<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $post_id
 * @property string $title
 * @property string $content
 * @property string $username
 * @property string $date_time
 */
class admin_post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'string'],
            [['date_time'], 'safe'],
            [['username'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
            'title' => 'Title',
            'content' => 'Content',
            'username' => 'Username',
            'date_time' => 'Date Time',
        ];
    }
}
