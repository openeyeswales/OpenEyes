<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2012
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2012, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

/**
 * A class that all OpenEyes active record classes should extend.
 *
 * Currently its only purpose is to remove all html tags to
 * prevent XSS.
 */
class BaseActiveRecord extends CActiveRecord
{

	/**
	 * Audit log
	 */
	public function behaviors() {
		if(Yii::app()->params['audit_trail']) {
			return array(
				'LoggableBehavior' => array(
					'class' => 'application.behaviors.LoggableBehavior',
				),
			);
		} else {
			return array();
		}
	}
	
	/**
	 * Strips all html tags out of attributes to be saved.
	 * @return boolean
	 */
	protected function beforeSave() {
		$primaryKey = $this->tableSchema->primaryKey;
		foreach ($this->attributes as $name => $value) {
			// The '!empty' check is to prevent it populating NULL values, e.g. episode.end_date was changing from NULL to 0000-00-00 00:00:00.
			if(!empty($value) && ($primaryKey !== $name || (is_array($primaryKey) && !in_array($name, $primaryKey)))) {
				$this->$name = strip_tags($value);
			}
		}

		// Detect nullable foreign keys and replace "" with null (to fix html dropdowns breaking contraints)
		foreach ($this->tableSchema->foreignKeys as $field => $stuff) {
			if ($this->tableSchema->columns[$field]->allowNull && !$this->{$field}) {
				$this->{$field} = null;
			}
		}

		return parent::beforeSave();
	}
	
	/**
	 * @param boolean $runValidation
	 * @param array $attributes
	 * @param boolean $allow_overriding - if true allows created/modified user/date to be set and saved via the model (otherwise gets overriden)
	 * @return boolean
	 */
	public function save($runValidation=true, $attributes=null, $allow_overriding=false)
	{
		$user_id = null;

		try {
			if (isset(Yii::app()->user)) {
				$user_id = Yii::app()->user->id;
			}
		} catch (Exception $e) {
		}

		if (Yii::app()->params['database_timestamp_timezone'] != ini_get('date.timezone')) {
			if ($this->created_date) {
				$this->created_date = $this->convertTimestamp($this->created_date,ini_get('date.timezone'),Yii::app()->params['database_timestamp_timezone']);
			}
			if ($this->last_modified_date) {
				$this->last_modified_date = $this->convertTimestamp($this->last_modified_date,ini_get('date.timezone'),Yii::app()->params['database_timestamp_timezone']);
			}
		}

		$now_timestamp = $this->getTimestamp();

		if ($this->getIsNewRecord() || !isset($this->id)) {
			if (!$allow_overriding || $this->created_user_id == 1) {
				// Set creation properties
				if ($user_id === NULL) {
					// Revert to the admin user
					$this->created_user_id = 1;
				} else {
					$this->created_user_id = $user_id;
				}
			}
			if (!$allow_overriding || $this->created_date == "1900-01-01 00:00:00") {
				$this->created_date = $now_timestamp;
			}
		}

		try {
			if (!$allow_overriding || $this->last_modified_user_id == 1) {
				// Set the last_modified_user_id and last_modified_date fields
				if ($user_id === NULL) {
					// Revert to the admin user
					// need this try/catch block here to make older migrations pass with this hook in place
					$this->last_modified_user_id = 1;
				} else {
					$this->last_modified_user_id = $user_id;
				}
			}
			if (!$allow_overriding || $this->last_modified_date == "1900-01-01 00:00:00") {
				$this->last_modified_date = $now_timestamp;
			}
		} catch (Exception $e) {
		}

		return parent::save($runValidation, $attributes);
	}

	protected function afterSave() {
		if (Yii::app()->params['database_timestamp_timezone'] != ini_get('date.timezone')) {
			foreach (array('created_date','last_modified_date') as $field) {
				if ($this->hasAttribute($field)) {
					$this->$field = $this->convertTimestamp($this->$field,Yii::app()->params['database_timestamp_timezone'],ini_get('date.timezone'));
				}
			}
		}
	}

	public function getTimestamp() {
		if (Yii::app()->params['database_timestamp_timezone'] != ini_get('date.timezone')) {
			$timestamp = $this->convertTimestamp(date('Y-m-d H:i:s'),ini_get('date.timezone'),Yii::app()->params['database_timestamp_timezone']);
		} else {
			$timestamp = date('Y-m-d H:i:s');
		}
		return $timestamp;
	}

	public function convertTimestamp($timestamp,$from_timezone,$to_timezone) {
		$original_timezone = ini_get('date.timezone');
		ini_set('date.timezone',$from_timezone);
		$ts = strtotime($timestamp);
		ini_set('date.timezone',$to_timezone);
		$timestamp = date('Y-m-d H:i:s',$ts);
		ini_set('date.timezone',$original_timezone);
		return $timestamp;
	}

	/**
	 * Returns a date field in NHS format
	 * @param string $attribute
	 * @return string
	 */
	public function NHSDate($attribute, $empty_string = '-') {
		if($value = $this->getAttribute($attribute)) {
			return Helper::convertMySQL2NHS($value, $empty_string);
		}
	}

	public function NHSDateAsHTML($attribute, $empty_string = '-') {
		if($value = $this->getAttribute($attribute)) {
			return Helper::convertMySQL2HTML($value, $empty_string);
		}
	}

	public function getAuditAttributes() {
		$attributes = array();

		foreach ($this->getAttributes() as $key => $value) {
			$attributes[$key] = $this->{$key};
		}

		return serialize($attributes);
	}

	protected function afterFind() {
		// Munge timestamps coming out of the database if they've been stored in a timezone other than the current date.timezone setting
		if (Yii::app()->params['database_timestamp_timezone'] != ($current_timezone = ini_get('date.timezone'))) {
			foreach (array('created_date','last_modified_date') as $field) {
				if ($this->hasAttribute($field)) {
					ini_set('date.timezone',Yii::app()->params['database_timestamp_timezone']);
					$timestamp = strtotime($this->$field);
					ini_set('date.timezone',$current_timezone);
					$this->$field = date('Y-m-d H:i:s',$timestamp);
				}
			}
		}
	}
}
