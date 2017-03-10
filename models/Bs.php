<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bs".
 *
 * @property integer $id
 * @property string $name
 * @property integer $dev_id
 * @property integer $ant_id
 */
class Bs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dev_id', 'ant_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'dev_id' => 'Устройство',
            'ant_id' => 'Антенна',
        ];
    }

    public function getdevicename() {
        return $this->hasOne(Device::className(), ['id' => 'dev_id']);
    }

    public function getantennaname() {
        return $this->hasOne(Antenna::className(), ['id' => 'ant_id']);
    }
}
