<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "multiplier".
 *
 * @property int $id
 * @property string|null $size
 * @property string|null $products
 * @property string|null $giz_interventions
 * @property int|null $focal_person_contact_details_id
 * @property int|null $address_id
 * @property int|null $organization_id
 */
class Multiplier extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'multiplier';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['focal_person_contact_details_id', 'address_id', 'organization_id'], 'integer'],
            [['size', 'products', 'giz_interventions'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'size' => 'Size',
            'products' => 'Products',
            'giz_interventions' => 'Giz Interventions',
            'focal_person_contact_details_id' => 'Focal Person Contact Details ID',
            'address_id' => 'Address ID',
            'organization_id' => 'Organization ID',
        ];
    }
}
