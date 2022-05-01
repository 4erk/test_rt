<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%queue_statuses}}`.
 */
class m220428_103513_create_queue_statuses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%queue_statuses}}', [
            'id'         => $this->bigPrimaryKey(),
            's_name'     => $this->string(512)->notNull(),
            'c_name'     => $this->string(512)->notNull(),
            'c_id'       => $this->string(32)->notNull(),
            'a_type'     => $this->string(128)->notNull(),
            'direction'  => $this->string(32)->notNull(),
            'activation' => $this->string(32)->notNull(),
            'c_state'    => $this->string(32)->notNull(),
            'control'    => $this->string(32)->notNull(),
            'created_at' => $this->bigInteger(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%queue_statuses}}');
    }
}
