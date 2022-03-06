<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "device".
 *
 * @property int $id
 * @property string $sn
 * @property int|null $store_id
 * @property int $created_at
 */
class Device extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'device';
    }



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sn', 'created_at'], 'required'],
            [['store_id', 'created_at'], 'integer'],
            [['sn'], 'string', 'max' => 32],
            [['sn'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sn' => 'Sn',
            'store_id' => 'Store ID',
            'created_at' => 'Created At',
        ];
    }
}
