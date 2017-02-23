<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "carservice".
 *
 * @property integer $id
 * @property string $car_id
 * @property string $date_service_s
 * @property string $date_service_e
 * @property string $provider
 * @property string $user_request
 * @property string $areatype
 * @property string $orther
 * @property string $markers
 */
class Carservice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'carservice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orther'], 'string'],
            [['date_service_s','date_service_e'], 'required'],
             [['provider'], 'string', 'max' => 255,],
            [['car_id','user_request', 'areatype', 'markers'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'car_id' => 'ทะเบียนรถ',
            'date_service_s' => 'วันที่เริ่มใช้',
            'date_service_e' => 'วันที่สิ้นสุด',
            'provider' => 'คนขับรถ',
            'user_request' => 'ผู้ขอใช้รถ',
            'areatype' => 'พื้นที่',
            'orther' => 'หมายเหตุ',
            'markers' => 'จุดหมาย',
        ];
    }
}
