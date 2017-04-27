<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

/**
 * Class SiteController
 * @package app\controllers
 */
class SiteController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        return 'This is root page';
    }

    /**
     * @return string
     */
    public function actionError()
    {
        return 'Error';
    }
}
