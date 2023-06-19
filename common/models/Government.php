<?php

namespace common\models;

use yii\db\ActiveRecord;

class Government extends ActiveRecord
{
    // Define the table name associated with this model
    public static function tableName()
    {
        return 'government';
    }

    // Define the validation rules for the attributes
    public function rules()
    {
        return [
            [['ministry', 'department', 'sub_category', 'organizational_location'], 'required'],
            [['giz_interventions_history', 'focal_person_contact_details', 'physical_address'], 'string'],
            [['ministry', 'department', 'sub_category', 'organizational_location'], 'string', 'max' => 255],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ministry' => 'Ministry',
            'department' => 'Department',
            'sub_category' => 'Sub Category',
            'organizational_location' => 'Organizational Location',
            'giz_interventions_history' => 'Giz Interventions History',
            'focal_person_contact_details' => 'Focal Person Contact Details',
            'physical_address' => 'Physical Address',
        ];
    }           
}
