<?php

namespace common\models;

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
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    \yii\db\BaseActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    \yii\db\BaseActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],

                ],
                //'value' => new \yii\db\Expression('NOW()'),
                'value' => function()
                {
                    return gmdate("Y-m-d H:i:s");
                },
            ],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['serial'], 'required'],
            [['store_id'], 'integer'],
            [['created_at'], 'safe'],
            [['updated_at'], 'safe'],
            [['serial'], 'string'],
            [['serial'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'serial' => 'Serial number',
            'store_id' => 'Store',
            'created_at' => 'Date',
        ];
    }

    public function getStore()
    {
        return $this->hasOne(Store::className(), ['id' => 'store_id']);
    }

    public function getStoreName()
    {
        return (isset($this->store)) ? $this->store->name : 'empty';
    }
}
