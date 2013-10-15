<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/* @var $this UserController */
/* @var $model User */

Yii::app()->clientScript->registerScript('submit', "
function submit()
{
    $('#user-form').submit();
}
");

?>

<?php
$this->widget('bootstrap.widgets.TbBox', array(
	'title' => Yii::t('front', 'Edit profile'),
	'headerIcon' => 'icon-pencil',
	'headerButtons' => array(
		array(
			'class' => 'bootstrap.widgets.TbButtonGroup',
			'buttons' => array(
				array('label' => Yii::t('front', 'Save'), 'type' => 'primary',
				'htmlOptions' => array(
					'onclick' => '$("#user-form").submit();'
				),),
				array('label' => Yii::t('front', 'Cancel'), 'url' => array('profile'), 'buttonType' => 'link', 'type' => 'info'),
			)
		),
	),
	'content' => $this->renderPartial('_form', array('model' => $model), true)
));
?>