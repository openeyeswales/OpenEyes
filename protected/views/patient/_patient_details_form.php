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

$auto_hos_num = $this->isAutoHosNum();
?>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'before'=>'hos_num'))?>
			<div class="row data-row">
				<div class="large-4 column">
					<div class="data-label"><?php echo Patient::model()->getAttributeLabel('hos_num')?>:</div>
				</div>
				<div class="large-8 column">
					<div class="data-value">
						<?php echo CHtml::textField('hos_num',$patient->hos_num, ($auto_hos_num? array('disabled' =>'disabled'): array()))?>
						<div class="row data-row">
							<div class="large-3 column">
								<div class="data-label">Automatic :</div>
							</div>

							<div class="large-9 column"><?php
							echo CHtml::checkBox('auto_hos_num',$auto_hos_num);
						?> </div>
						</div>
					</div>
				</div>
			</div>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'after'=>'hos_num'))?>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'before'=>'nhs_num'))?>
			<div class="row data-row">
				<div class="large-4 column">
					<div class="data-label"><?php echo Patient::model()->getAttributeLabel('nhs_num')?>:</div>
				</div>
				<div class="large-8 column">
					<div class="data-value">
						<?php echo CHtml::textField('nhs_num',$patient->nhs_num)?>
					</div>
				</div>
			</div>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'after'=>'nhs_num'))?>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'before'=>'title'))?>
			<div class="row data-row">
				<div class="large-4 column">
					<div class="data-label"><?php echo Contact::model()->getAttributeLabel('title')?>:</div>
				</div>
				<div class="large-8 column">
					<div class="data-value">
						<?php echo CHtml::textField('title',$contact->title)?>
					</div>
				</div>
			</div>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'after'=>'title'))?>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'before'=>'first_name'))?>
			<div class="row data-row">
				<div class="large-4 column">
					<div class="data-label"><?php echo Contact::model()->getAttributeLabel('first_name')?>:</div>
				</div>
				<div class="large-8 column">
					<div class="data-value">
						<?php echo CHtml::textField('first_name',$contact->first_name)?>
					</div>
				</div>
			</div>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'after'=>'first_name'))?>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'before'=>'last_name'))?>
			<div class="row data-row">
				<div class="large-4 column">
					<div class="data-label"><?php echo Contact::model()->getAttributeLabel('last_name')?>:</div>
				</div>
				<div class="large-8 column">
					<div class="data-value">
						<?php echo CHtml::textField('last_name',$contact->last_name)?>
					</div>
				</div>
			</div>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'after'=>'last_name'))?>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'before'=>'address1'))?>
			<div class="row data-row">
				<div class="large-4 column">
					<div class="data-label"><?php echo Address::model()->getAttributeLabel('address1')?>:</div>
				</div>
				<div class="large-8 column">
					<?php echo CHtml::textField('address1',$address->address1)?>
				</div>
			</div>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'after'=>'address1'))?>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'before'=>'address2'))?>
			<div class="row data-row">
				<div class="large-4 column">
					<div class="data-label"><?php echo Address::model()->getAttributeLabel('address2')?>:</div>
				</div>
				<div class="large-8 column">
					<?php echo CHtml::textField('address2',$address->address2)?>
				</div>
			</div>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'after'=>'address2'))?>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'before'=>'city'))?>
			<div class="row data-row">
				<div class="large-4 column">
					<div class="data-label"><?php echo Address::model()->getAttributeLabel('city')?>:</div>
				</div>
				<div class="large-8 column">
					<?php echo CHtml::textField('city',$address->city)?>
				</div>
			</div>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'after'=>'city'))?>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'before'=>'county'))?>
			<div class="row data-row">
				<div class="large-4 column">
					<div class="data-label"><?php echo Address::model()->getAttributeLabel('county')?>:</div>
				</div>
				<div class="large-8 column">
					<?php echo CHtml::textField('county',$address->county)?>
				</div>
			</div>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'after'=>'county'))?>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'before'=>'postcode'))?>
			<div class="row data-row">
				<div class="large-4 column">
					<div class="data-label"><?php echo Address::model()->getAttributeLabel('postcode')?>:</div>
				</div>
				<div class="large-8 column">
					<?php echo CHtml::textField('postcode',$address->postcode)?>
				</div>
			</div>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'after'=>'postcode'))?>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'before'=>'country_id'))?>
			<div class="row data-row">
				<div class="large-4 column">
					<div class="data-label"><?php echo Address::model()->getAttributeLabel('country_id')?>:</div>
				</div>
				<div class="large-8 column">
					<?php echo CHtml::dropDownList('country_id',$address->country_id,CHtml::listData(Country::model()->findAll(array('order' => 'name asc')),'id','name'))?>
				</div>
			</div>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'after'=>'country_id'))?>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'before'=>'dob'))?>
			<div class="row data-row">
				<div class="large-4 column">
					<div class="data-label"><?php echo $patient->getAttributeLabel('dob')?>:</div>
				</div>
				<div class="large-8 column">
					<div class="data-value">
						<div class="patient-dob">
							<?php echo CHtml::textField('dob_day',$patient->dob_day,array('placeholder' => 'DD','disabled' => $patient->ageIsApproximate ? 'disabled' : ''))?>
							<?php echo CHtml::textField('dob_month',$patient->dob_month,array('placeholder' => 'MM','disabled' => $patient->ageIsApproximate ? 'disabled' : ''))?>
							<?php echo CHtml::textField('dob_year',$patient->dob_year,array('placeholder' => 'YYYY','disabled' => $patient->ageIsApproximate ? 'disabled' : ''))?>
						</div>
					</div>
				</div>
			</div>
			<div class="row field-row">
				<div class="large-4 column">
					<div class="data-label"></div>
				</div>
				<div class="large-8 column">
					<div class="data-value">
						<?php echo CHtml::checkBox('dob_dn',$patient->ageIsApproximate)?>
						<label for="dob_dn">
							I don't know
						</label>
					</div>
				</div>
			</div>
			<div class="row field-row approximateAge"<?php if (!$patient->ageIsApproximate) {?> style="display: none"<?php }?>>
				<div class="large-4 column">
					<div class="data-label">Approximate age:</div>
				</div>
				<div class="large-8 column">
					<div class="data-value">
						<?php echo CHtml::textField('age_years',$patient->years)?>
						<label for="age_years">
							years
						</label>
						<?php echo CHtml::textField('age_months',$patient->months)?>
						<label for="age_months">
							months
						</label>
					</div>
				</div>
			</div>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'after'=>'dob'))?>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'before'=>'date_of_death'))?>
			<div class="row data-row">
				<div class="large-4 column">
					<div class="data-label"><?php echo $patient->getAttributeLabel('date_of_death')?>:</div>
				</div>
				<div class="large-8 column">
					<div class="data-value patient-dod">
						<?php echo CHtml::textField('dod_day',$patient->dod_day,array('placeholder' => 'DD'))?>
						<?php echo CHtml::textField('dod_month',$patient->dod_month,array('placeholder' => 'MM'))?>
						<?php echo CHtml::textField('dod_year',$patient->dod_year,array('placeholder' => 'YYYY'))?>
					</div>
				</div>
			</div>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'after'=>'date_of_death'))?>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'before'=>'gender'))?>
			<div class="row data-row">
				<div class="large-4 column">
					<div class="data-label"><?php echo $patient->getAttributeLabel('gender_id')?>:</div>
				</div>
				<div class="large-8 column">
					<div class="data-value">
						<?php foreach (Gender::model()->findAll() as $gender) {?>
							<?php echo CHtml::radioButton('gender_id',$patient->gender_id == $gender->id,array('value' => $gender->id))?> <?php echo $gender->name?>
						<?php }?>
					</div>
				</div>
			</div>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'after'=>'gender'))?>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'before'=>'ethnic_group_id'))?>
			<div class="row data-row">
				<div class="large-4 column">
					<div class="data-label"><?php echo $patient->getAttributeLabel('ethnic_group_id')?>:</div>
				</div>
				<div class="large-8 column">
					<div class="data-value">
						<?php echo CHtml::dropDownList('ethnic_group_id',$patient->ethnic_group_id,CHtml::listData(EthnicGroup::model()->findAll(array('order' => 'name asc')),'id','name'),array('empty' => '- Unknown -'))?>
					</div>
				</div>
			</div>
			<?php echo $this->renderPartial('_patient_metadata_edit',array('patient'=>$patient,'after'=>'ethnic_group_id'))?>
