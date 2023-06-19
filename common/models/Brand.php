<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "brand".
 *
 * @property int $brand_id
 * @property string $brand_name
 * @property string|null $main_products
 * @property string|null $purchasing_capacity
 * @property string|null $main_purchasing_markets
 * @property string|null $main_sales_markets
 * @property int|null $giz_interventions_history_id
 * @property int|null $focal_person_contact_id
 * @property int|null $physical_address_id
 */
class Brand extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'brand';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brand_name'], 'required'],
            [['giz_interventions_history_id', 'focal_person_contact_id', 'physical_address_id'], 'integer'],
            [['brand_name', 'main_products', 'purchasing_capacity', 'main_purchasing_markets', 'main_sales_markets'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand_name' => 'Brand Name',
            'main_products' => 'Main Products',
            'purchasing_capacity' => 'Purchasing Capacity',
            'main_purchasing_markets' => 'Main Purchasing Markets',
            'main_sales_markets' => 'Main Sales Markets',
            'giz_interventions_history_id' => 'Giz Interventions History ID',
            'focal_person_contact_id' => 'Focal Person Contact ID',
            'physical_address_id' => 'Physical Address ID',
        ];
    }
}
