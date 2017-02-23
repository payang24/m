<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "research".
 *
 * @property integer $id
 * @property string $researchname
 * @property string $researchtype
 * @property string $provider
 * @property string $abstract
 * @property string $date_sever
 * @property string $content
 */
class Research extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'research';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            [['abstract', 'researchtype','researchname','provider'], 'required'],
            [['date_sever'], 'required'] ,
            // [['researchname', 'researchtype', 'provider'], 'required', 'max' => 255],
            [['content','attachment'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'researchname' => 'ชื่อวิจัย',
            'researchtype' => 'ประเภทงานวิจัย',
            'provider' => 'ผู้จัดทำวิจัย',
            'abstract' => 'บทคัดย่อ',
            'date_sever' => 'วันที่สร้าง',
            'content' => 'เนื้อหา',
            'attachment' => 'เอกสารแนบ',
        ];
    }
}
