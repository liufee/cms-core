<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-10-16 17:15
 */

namespace cms\common\models;

use common\models\meta\ArticleMetaLike;
use common\models\meta\ArticleMetaTag;
use Yii;
use common\libs\Constants;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%article}}".
 *
 * @property integer $id
 * @property integer $cid
 * @property integer $type
 * @property string $title
 * @property string $sub_title
 * @property string $summary
 * @property string $thumb
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 * @property integer $status
 * @property integer $sort
 * @property integer $author_id
 * @property string $author_name
 * @property integer $scan_count
 * @property integer $comment_count
 * @property integer $can_comment
 * @property integer $visibility
 * @property string $password
 * @property integer $flag_headline
 * @property integer $flag_recommend
 * @property integer $flag_slide_show
 * @property integer $flag_special_recommend
 * @property integer $flag_roll
 * @property integer $flag_bold
 * @property integer $flag_picture
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property ArticleContent[] $articleContents
 */
class Article extends \yii\db\ActiveRecord
{
    const ARTICLE = 0;
    const SINGLE_PAGE = 2;

    const ARTICLE_PUBLISHED = 1;
    const ARTICLE_DRAFT = 0;

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cid', 'type', 'status', 'sort', 'author_id', 'can_comment', 'visibility'], 'integer'],
            [['cid', 'sort', 'author_id'], 'compare', 'compareValue' => 0, 'operator' => '>='],
            [['title', 'status'], 'required'],
            [['can_comment', 'visibility'], 'default', 'value' => Constants::YesNo_Yes],
            [['thumb'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif, webp'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [
                [
                    'title',
                    'sub_title',
                    'summary',
                    'thumb',
                    'seo_title',
                    'seo_keywords',
                    'seo_description',
                    'author_name',
                    'tag'
                ],
                'string',
                'max' => 255
            ],
            [
                [
                    'flag_headline',
                    'flag_recommend',
                    'flag_slide_show',
                    'flag_special_recommend',
                    'flag_roll',
                    'flag_bold',
                    'flag_picture',
                    'status',
                    'can_comment'
                ],
                'in',
                'range' => [0, 1]
            ],
            [['visibility'], 'in', 'range' => array_keys(Constants::getArticleVisibility())],
            [['type'], 'default', 'value'=>self::ARTICLE, 'on'=>'article'],
            [['type'], 'default', 'value'=>self::SINGLE_PAGE, 'on'=>'page'],
            [['password'], 'string', 'max'=>20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return [
            'article' => [
                'cid',
                'type',
                'title',
                'sub_title',
                'summary',
                'content',
                'thumb',
                'seo_title',
                'seo_keywords',
                'seo_description',
                'status',
                'sort',
                'author_id',
                'author_name',
                'created_at',
                'updated_at',
                'scan_count',
                'comment_count',
                'can_comment',
                'visibility',
                'tag',
                'flag_headline',
                'flag_recommend',
                'flag_slide_show',
                'flag_special_recommend',
                'flag_roll',
                'flag_bold',
                'flag_picture',
                'password'
            ],
            'page' => [
                'type',
                'title',
                'sub_title',
                'summary',
                'seo_title',
                'content',
                'seo_keywords',
                'seo_description',
                'status',
                'can_comment',
                'visibility',
                'tag',
                'sort'
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => yii::t('cms', 'ID'),
            'cid' => yii::t('cms', 'Category Id'),
            'type' => yii::t('cms', 'Type'),
            'title' => yii::t('cms', 'Title'),
            'sub_title' => yii::t('cms', 'Sub Title'),
            'summary' => yii::t('cms', 'Summary'),
            'content' => yii::t('cms', 'Content'),
            'thumb' => yii::t('cms', 'Thumb'),
            'seo_title' => yii::t('cms', 'Seo Title'),
            'seo_keywords' => yii::t('cms', 'Seo Keyword'),
            'seo_description' => yii::t('cms', 'Seo Description'),
            'status' => yii::t('cms', 'Status'),
            'can_comment' => yii::t('cms', 'Can Comment'),
            'visibility' => yii::t('cms', 'Visibility'),
            'sort' => yii::t('cms', 'Sort'),
            'tag' => yii::t('cms', 'Tag'),
            'author_id' => yii::t('cms', 'Author Id'),
            'author_name' => yii::t('cms', 'Author'),
            'created_at' => yii::t('cms', 'Created At'),
            'updated_at' => yii::t('cms', 'Updated At'),
            'flag_headline' => yii::t('cms', 'Is Headline'),
            'flag_recommend' => yii::t('cms', 'Is Recommend'),
            'flag_special_recommend' => yii::t('cms', 'Is Special Recommend'),
            'flag_slide_show' => yii::t('cms', 'Is Slide Show'),
            'flag_roll' => yii::t('cms', 'Is Roll'),
            'flag_bold' => yii::t('cms', 'Is Bold'),
            'flag_picture' => yii::t('cms', 'Is Picture'),
            'password' => yii::t('cms', 'Password'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'cid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleContent()
    {
        return $this->hasOne(ArticleContent::className(), ['aid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleLikes()
    {
        $tempModel = new ArticleMetaLike();
        return $this->hasMany(ArticleMetaLike::className(), ['aid' => 'id'])->where(['key'=>$tempModel->keyName]);
    }

    public function getArticleTags()
    {
        $tempModel = new ArticleMetaTag();
        return $this->hasMany(ArticleMetaLike::className(), ['aid' => 'id'])->where(['key'=>$tempModel->keyName]);
    }

    /**
     * @return integer
     */
    public function getArticleLikeCount()
    {
        return $this->getArticleLikes()->count('id');
    }

    public function afterFind()
    {
        parent::afterFind();
        if ($this->thumb) {
            $this->thumb = str_replace(yii::$app->params['site']['sign'], yii::$app->params['site']['url'], $this->thumb);
        }
    }
    
}
