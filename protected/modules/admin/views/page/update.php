<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/* @var $this PageController */
/* @var $model Page */

$this->menu = array(
	array('label' => Yii::t('admin', 'List Page'), 'url' => array('index')),
	array('label' => Yii::t('admin', 'Create Page'), 'url' => array('create')),
	array('label' => Yii::t('admin', 'View Page'), 'url' => array('view', 'id' => $model->id)),
	array('label' => Yii::t('admin', 'Manage Page'), 'url' => array('admin')),
);
?>

<h1>Update Page <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>