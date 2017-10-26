<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-15 21:16
 */

namespace cms\common\models;

use Yii;

/**
 * This is the model class for table "{{%friend_link}}".
 *
 * @property string $id
 * @property string $name
 * @property string $image
 * @property string $url
 * @property string $target
 * @property string $sort
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class FriendlyLink extends \yii\db\ActiveRecord
{

    const DISPLAY_YES = 1;
    const DISPLAY_NO = 0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%friendly_link}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['target'], 'string'],
            [['sort', 'status', 'created_at', 'updated_at'], 'integer'],
            [['sort'], 'compare', 'compareValue' => 0, 'operator' => '>='],
            [['name', 'url'], 'string', 'max' => 255],
            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif, webp'],
            [['name', 'url'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => yii::t('cms', 'ID'),
            'name' => yii::t('cms', 'Name'),
            'image' => yii::t('cms', 'Image'),
            'url' => yii::t('cms', 'Url'),
            'target' => yii::t('cms', 'Target'),
            'sort' => yii::t('cms', 'Sort'),
            'status' => yii::t('cms', 'Is Display'),
            'created_at' => yii::t('cms', 'Created At'),
            'updated_at' => yii::t('cms', 'Updated At'),
        ];
    }
}
