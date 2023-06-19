<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "association".
 *
 * @property int $id
 * @property string $name
 * @property string|null $objective
 * @property string|null $main_services
 * @property string|null $membership
 * @property string|null $giz_interventions_history
 * @property string|null $focal_person_contact_details
 * @property string|null $physical_address
 */
class Association extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'association';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['objective', 'main_services', 'membership', 'giz_interventions_history', 'focal_person_contact_details', 'physical_address'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'objective' => 'Objective',
            'main_services' => 'Main Services',
            'membership' => 'Membership',
            'giz_interventions_history' => 'Giz Interventions History',
            'focal_person_contact_details' => 'Focal Person Contact Details',
            'physical_address' => 'Physical Address',
        ];
    }
}
