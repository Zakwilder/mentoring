<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

?>

<?php
$this->beginWidget('bootstrap.widgets.TbBox', array(
	'title' => Yii::t('front', 'User Profile'),
	'headerIcon' => 'icon-home',
	'headerButtons' => array(
		array(
			'class' => 'bootstrap.widgets.TbButtonGroup',
			'type' => 'primary',
			'buttons' => array(
				array('label' => Yii::t('front', 'Edit profile'), 'url' => array('user/edit')),
				array('label' => Yii::t('front', 'Change password'), 'url' => array('user/changepassword')),
				array('label' => Yii::t('front', 'Premium shop'), 'url' => array('user/premium')),
			)
		),
	)));
?>
<table>
<tr>
	<td>
		<?php echo $model->username?>
	</td>
</tr>
<tr>
	<td>
		<?php echo $model->email?>
	</td>
</tr>
<tr>
	<td>
		<?php echo $model->profile?>
	</td>
</tr>
</table>
<?php $this->endWidget();?>