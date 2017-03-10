<?php
/**
 * Created by PhpStorm.
 * User: Igor
 * Date: 10.03.2017
 * Time: 13:01
 */

namespace app\models;


class Device extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'device';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['dev'], 'string', 'max' => 255],
        ];
    }

   public function getDeviceName() {
        return $this->hasOne(Bs::className(), ['id' => 'dev_id']);
    }

}