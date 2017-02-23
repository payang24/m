<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property integer $id
 * @property string $date_serve
 * @property string $product_list
 * @property integer $unit
 * @property string $price
 * @property string $cost
 * @property string $lucre
 * @property string $remain
 * @property string $type
 * @property string $notes
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'unit'], 'integer'],
            [['date_serve'], 'safe'],
            [['product_list', 'notes'], 'string', 'max' => 255],
            [['price', 'cost', 'lucre', 'remain'], 'string', 'max' => 9],
            [['type'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_serve' => 'วันที่',
            'product_list' => 'รายการสินค้า',
            'unit' => 'จำนวน',
            'price' => 'ราคา',
            'cost' => 'ราคาทุน',
            'lucre' => 'กำไร',
            'remain' => 'คงเหลือ',
            'type' => 'สถานะ',
            'notes' => 'หมายเหตุ',
        ];
    }

    /**
     * @inheritdoc
     * @return ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductQuery(get_called_class());
    }
}
