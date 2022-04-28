<?php

namespace app\components;

use app\models\QueueStatuses;

class QueueStatusesLog
{


    private QueueStatuses $model;

    public function __construct($data)
    {
        $this->model = new QueueStatuses();
        $this->model->load($data, '');
    }


    /**
     * Return true if all ok
     * @return bool
     */
    public function save()
    {
        if ($this->checkChanges()) {
            return $this->model->save();
        }
        return false;
    }

    private function checkChanges()
    {
        $lastModel = $this->getLastQueueStatus();
        if (!$lastModel) {
            return true;
        }
        $oldData = $lastModel->getAttributes(null, ['id', 'created_at']);
        $newData = $this->model->getAttributes(null, ['id', 'created_at']);
        foreach ($newData as $key => $value) {
            if ($value != ($oldData[$key] ?? null)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @return QueueStatuses|null
     */
    private function getLastQueueStatus()
    {
        return QueueStatuses::find()->orderBy(['id' => SORT_DESC])->one();
    }
}