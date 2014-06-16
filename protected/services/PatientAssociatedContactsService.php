<?php
/**
 * (C) OpenEyes Foundation, 2014
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (C) 2014, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

namespace services;

class PatientAssociatedContactsService extends DeclarativeModelService
{
	static protected $operations = array(self::OP_READ, self::OP_UPDATE, self::OP_CREATE, self::OP_SEARCH);

	static protected $search_params = array(
		'id' => self::TYPE_TOKEN,
		'identifier' => self::TYPE_TOKEN,
		'family' => self::TYPE_STRING,
		'given' => self::TYPE_STRING,
	);

	static protected $primary_model = 'Patient';

	static protected $model_map = array(
		'Patient' => array(
			'fields' => array(
				'contacts' => array(self::TYPE_LIST, 'contactAssignments', 'PatientAssociatedContact', 'PatientContactAssignment'),
			),
		),
		'PatientAssociatedContact' => array(
			'related_objects' => array(
				'contact' => array('contact_id', 'Contact'),
				'location' => array('loction_id', 'ContactLocation'),
			),
			'fields' => array(
				'title' => 'contact.title',
				'family_name' => 'contact.last_name',
				'given_name' => 'contact.first_name',
				'primary_phone' => 'contact.primary_phone',
				'institution_ref' => array(self::TYPE_REF, 'location.institution_id', 'Institution'),
				'site_ref' => array(self::TYPE_REF, 'location.site_id', 'Site'),
			),
		),
	);

	public function search(array $params)
	{
	}
}
