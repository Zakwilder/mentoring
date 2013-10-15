<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Base template for user`s page.
 *
 * @package Yiitrn\Protected\Views\User
 * @author  Eugene Zakursky <Eugene.Zakursky@sigmaukraine.com>
 */
?>
<?php
$this->widget('bootstrap.widgets.TbBox', array(
	'title' => Yii::t('front', 'Change password'),
	'headerIcon' => 'icon-pencil',
	'headerButtons' => array(
		array(
			'class' => 'bootstrap.widgets.TbButtonGroup',
			'buttons' => array(
				array('label' => Yii::t('front', 'Save'), 'type' => 'primary',
					'htmlOptions' => array(
						'onclick' => '$("form").submit();'
					),),
				array('label' => Yii::t('front', 'Cancel'), 'url' => $this->createUrl('user/profile'), 'buttonType' => 'link', 'type' => 'info'),
			)
		),
	),
	'content' => $this->renderPartial('admin.views.user._changepasswordform', array('model' => $model), true)
));
?>