<?php

namespace app\controllers;

use app\components\QueueStatusesLog;
use app\models\QueueStatuses;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class QueueStatusController extends Controller
{
    public function actionAdd()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data                       = Yii::$app->request->post('QueueStatuses');
        return (new QueueStatusesLog($data))->save();
    }

    public function actionIndex()
    {
        $model = new QueueStatuses();
        return $this->render('index', ['model' => $model]);
    }

}
