<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%device}}`.
 */
class m220305_170707_create_device_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%device}}', [
            'id' => $this->primaryKey(),
            'sn' => $this->string(32)->notNull()->unique(),
            'store_id' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%device}}');
    }
}
