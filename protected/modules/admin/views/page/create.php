<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/* @var $this PageController */
/* @var $model Page */


$this->menu = array(
	array('label' => Yii::t('admin', 'List Page'), 'url' => array('index')),
	array('label' => Yii::t('admin', 'Manage Page'), 'url' => array('admin')),
);
?>

<h1><?php print Yii::t('admin', 'Create Page'); ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>