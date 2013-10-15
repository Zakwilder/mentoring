<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/* @var $this CategoryController */
/* @var $model Category */

$this->menu = array(
	array('label' => Yii::t('admin', 'List Category'), 'url' => array('index')),
	array('label' => Yii::t('admin', 'Create Category'), 'url' => array('create')),
	array('label' => Yii::t('admin', 'View Category'), 'url' => array('view', 'id' => $model->id)),
	array('label' => Yii::t('admin', 'Manage Category'), 'url' => array('admin')),
);
?>

<h1><?php print Yii::t('admin', 'Update Category'); ?>
	<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>