<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-08-30 18:10
 */
namespace cms\api\models;

class Article extends \cms\common\models\Article
{
    public function fields()
    {
        return [
            'title',
            "description" => "summary",
            "content" => function($model){
                return $model->articleContent->content;
            }
        ];
    }
}