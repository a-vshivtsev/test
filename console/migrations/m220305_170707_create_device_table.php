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
            'serial' => $this->string()->notNull()->unique(),
            'store_id' => $this->integer(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

        $this->addForeignKey(
            'fk-device-store_id',
            'device',
            'store_id',
            'store',
            'id',
            'SET NULL',
            'CASCADE',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropForeignKey(
            'fk-device-store_id',
            'device'
        );

        $this->dropTable('{{%device}}');
    }
}
