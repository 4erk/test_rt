<?php

namespace app\models;

use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "queue_statuses".
 *
 * @property int         $id
 * @property string|null $s_name
 * @property string|null $c_name
 * @property string|null $c_id
 * @property string|null $a_type
 * @property string|null $direction
 * @property string|null $activation
 * @property string|null $c_state
 * @property string|null $control
 * @property int|null    $created_at
 */
class QueueStatuses extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'queue_statuses';
    }

    public function behaviors()
    {
        return [
            [
                'class'      => AttributeBehavior::class,
                'attributes' => [ActiveRecord::EVENT_BEFORE_INSERT => 'created_at'],
                'value'      => static function () {
                    return time();
                }
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at'], 'integer'],
            [['s_name', 'c_name'], 'string', 'max' => 512],
            [['c_id', 'direction', 'activation', 'c_state', 'control'], 'string', 'max' => 32],
            [['a_type'], 'string', 'max' => 128],
            [['c_name', 's_name', 'c_id', 'a_type', 'direction', 'activation', 'c_state', 'control'], 'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            's_name'     => 'S Name',
            'c_name'     => 'C Name',
            'c_id'       => 'C ID',
            'a_type'     => 'A Type',
            'direction'  => 'Direction',
            'activation' => 'Activation',
            'c_state'    => 'C State',
            'control'    => 'Control',
            'created_at' => 'Created At',
        ];
    }
}
