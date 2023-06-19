<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "factory".
 *
 * @property int $id
 * @property string|null $size
 * @property string|null $products
 * @property string|null $production_capacity
 * @property string|null $main_markets
 * @property string|null $brands
 * @property string|null $giz_interventions
 * @property int|null $focal_person_contact_details_id
 * @property int|null $address_id
 * @property int|null $organization_id
 */
class Factory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'factory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['focal_person_contact_details_id', 'address_id', 'organization_id'], 'integer'],
            [['size', 'products', 'production_capacity', 'main_markets', 'brands', 'giz_interventions'], 'string', 'max' => 255],
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
            'production_capacity' => 'Production Capacity',
            'main_markets' => 'Main Markets',
            'brands' => 'Brands',
            'giz_interventions' => 'Giz Interventions',
            'focal_person_contact_details_id' => 'Focal Person Contact Details ID',
            'address_id' => 'Address ID',
            'organization_id' => 'Organization ID',
        ];
    }
}
