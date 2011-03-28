<?php
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/phrase.js');
Yii::app()->clientScript->registerCoreScript('jquery');

$this->renderPartial('base');

$form = $this->beginWidget('CActiveForm', array(
    'id'=>'clinical-create',
    'enableAjaxValidation'=>false,
));

echo CHtml::hiddenField('action', 'create');
echo CHtml::hiddenField('event_type_id', $eventTypeId);

/**
 * Loop through all the possible element types and display
 */
foreach ($siteElementTypeObjects as $siteElementType) {
	$className = $siteElementType->possibleElementType->elementType->class_name;
	// @todo - this shouldn't be here
	$element = new $className(Yii::app()->user->id, $this->firm);

	echo $this->renderPartial(
		'/elements/' .
			$siteElementType->possibleElementType->elementType->class_name .
			'/_form/' .
			$siteElementType->view_number,
		array('model' => $element, 'form' => $form)
	);
}

echo CHtml::submitButton('Create event');

$this->endWidget();