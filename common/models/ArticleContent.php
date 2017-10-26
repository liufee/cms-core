<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-10-16 17:15
 */

namespace cms\common\models;

use Yii;

/**
 * This is the model class for table "{{%content}}".
 *
 * @property string $id
 * @property string $aid
 * @property string $content
 */
class ArticleContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_content}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aid'], 'required'],
            [['aid'], 'integer'],
            [['content'], 'string']
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
            'content' => yii::t('cms', 'Content'),
        ];
    }

    public function beforeSave($insert)
    {
        $this->content = str_replace(yii::$app->params['site']['url'], yii::$app->params['site']['sign'], $this->content);
        return true;
    }

    public function afterFind()
    {
        $this->content = str_replace(yii::$app->params['site']['sign'], yii::$app->params['site']['url'], $this->content);
    }

}
