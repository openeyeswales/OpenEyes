<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

/**
 * This is the model class for table "patient_metadata_key".
 *
 * The followings are the available columns in table 'patient_metadata_key':
 * @property integer $id
 * @property string $key_name
 * @property string $key_label
 */
class PatientMetadataKey extends BaseActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ContactLabel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'patient_metadata_key';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('key_name, key_label', 'required'),
			array('name', 'length', 'max'=>40),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'options' => array(self::HAS_MANY, 'PatientMetadataKeyOption', 'key_id', 'order' => 'display_order asc'),
			'fieldType' => array(self::BELONGS_TO, 'PatientMetadataFieldType', 'field_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'key_name' => 'Key',
			'key_label' => 'Label',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('key_name',$this->name,true);
		$criteria->compare('key_label',$this->name,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

	public function getDisabled($patient=null)
	{
		foreach (PatientMetadataKey::model()->findAll() as $metadata_key) {
			if ($metadata_key->hide_fields) {
				$fields = explode(',',$metadata_key->hide_fields);

				if (in_array($this->key_name,$fields)) {
					$values = explode(',',$metadata_key->hide_fields_values);

					if (empty($_POST)) {
						if ($patient && in_array($patient->{$metadata_key->key_name},$values)) {
							return true;
						}
					} else {
						if (in_array(@$_POST[$metadata_key->key_name],$values)) {
							return true;
						}
					}
				}
			}
		}

		return false;
	}
}