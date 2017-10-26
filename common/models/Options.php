<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-15 21:16
 */

namespace cms\common\models;

use Yii;
use common\helpers\FileDependencyHelper;

/**
 * This is the model class for table "{{%options}}".
 *
 * @property integer $id
 * @property integer $type
 * @property string $name
 * @property string $value
 * @property integer $input_type
 * @property string $tips
 * @property integer $autoload
 * @property integer $sort
 */
class Options extends \yii\db\ActiveRecord
{

    const TYPE_SYSTEM = 0;
    const TYPE_CUSTOM = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%options}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'input_type', 'autoload', 'sort'], 'integer'],
            [['name', 'input_type', 'autoload'], 'required'],
            [['name'], 'unique'],
            [
                ['name'],
                'match',
                'pattern' => '/^[a-zA-Z][0-9_]*/',
                'message' => yii::t('cms', 'Must begin with alphabet and can only includes alphabet,_,and number')
            ],
            [['value'], 'string'],
            [['name', 'tips'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => yii::t('cms', 'ID'),
            'type' => yii::t('cms', 'Type'),
            'name' => yii::t('cms', 'Name'),
            'value' => yii::t('cms', 'Value'),
            'input_type' => yii::t('cms', 'Input Type'),
            'tips' => yii::t('cms', 'Tips'),
            'autoload' => yii::t('cms', 'Autoload'),
            'sort' => yii::t('cms', 'Sort'),
        ];
    }

    /**
     * @return array
     */
    public function getNames()
    {
        return array_keys($this->attributeLabels());
    }

    /**
     * @inheritdoc
     */
    public function afterSave($insert, $changedAttributes)
    {
        $object = yii::createObject([
            'class' => FileDependencyHelper::className(),
            'fileName' => 'options.txt',
        ]);
        $object->updateFile();
        parent::afterSave($insert, $changedAttributes);
    }

}
