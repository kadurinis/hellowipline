<?php
/**
 * Created by PhpStorm.
 * User: Igor
 * Date: 10.03.2017
 * Time: 13:08
 */

namespace app\models;


class Antenna extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'antenna';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function getAntennaName() {
        return $this->hasOne(Bs::className(), ['id' => 'ant_id']);
    }
}