<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/* @var $this CategoryController */
/* @var $model Category */


$this->menu = array(
	array('label' => Yii::t('admin', 'List Category'), 'url' => array('index')),
	array('label' => Yii::t('admin', 'Manage Category'), 'url' => array('admin')),
);
?>

<h1><?php print Yii::t('admin', 'Create Category'); ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>