<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-10-16 17:15
 */

namespace cms\common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%article_meta}}".
 *
 * @property string $aid
 * @property string $keyName
 * @property string $value
 * @property string $ip
 * @property string $created_at
 */
class ArticleMeta extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'updatedAtAttribute' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_meta}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aid'], 'required'],
            [['aid', 'created_at'], 'integer'],
            [['key'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => yii::t('cms', 'ID'),
            'aid' => yii::t('cms', 'Aid'),
            'key' => yii::t('cms', 'Key'),
            'value' => yii::t('cms', 'Value'),
            'created_at' => yii::t('cms', 'Created At'),
        ];
    }
}
