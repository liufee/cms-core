<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-04-13 12:49
 */

namespace cms\backend\controllers;

use yii;
use yii\helpers\FileHelper;


class ClearController extends \yii\web\Controller
{

    /**
     * 清除后台缓存
     *
     * @return string
     */
    public function actionBackend()
    {
        FileHelper::removeDirectory(yii::getAlias('@runtime/cache'));
        Yii::$app->getSession()->setFlash('success', yii::t('cms', 'Success'));
        return $this->render('clear');
    }

    /**
     * 清除后台缓存
     *
     * @return string
     */
    public function actionFrontend()
    {
        FileHelper::removeDirectory(yii::getAlias('@frontend/runtime/cache'));
        Yii::$app->getSession()->setFlash('success', yii::t('cms', 'Success'));
        return $this->render('clear');
    }


}