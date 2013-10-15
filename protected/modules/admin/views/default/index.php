<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

$this->breadcrumbs = array(
	Yii::t('admin', 'Admin'),
);?>
<h1><?php print Yii::t('admin', 'Dashboard'); ?></h1>
<hr/>
<table style="width: 50%;">
    <thead>
    <tr>
        <th colspan="3"><?php print Yii::t('admin', 'Administration'); ?></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php print Yii::t('admin', 'Categories'); ?></td>
        <td>
	        <a href="<?php echo Yii::app()->createUrl('admin/category/create');?>">
		        <?php print Yii::t('admin', 'Add new'); ?>
	        </a>
        </td>
        <td><a href="<?php echo Yii::app()->createUrl('admin/category/index');?>">
		        <?php print Yii::t('admin', 'List'); ?>
	        </a>
        </td>
    </tr>
    <tr>
        <td><?php print Yii::t('admin', 'Pages'); ?></td>
        <td>
	        <a href="<?php echo Yii::app()->createUrl('admin/page/create');?>">
		        <?php print Yii::t('admin', 'Add new'); ?>
	        </a>
        </td>
        <td>
	        <a href="<?php echo Yii::app()->createUrl('admin/page/index');?>">
		        <?php print Yii::t('admin', 'List'); ?>
	        </a>
        </td>
    </tr>
    <tr>
	    <td><?php echo Yii::t('admin', 'Partners') ?></td>
	    <td>
		    <a href="<?php echo Yii::app()->createUrl('admin/partners/create');?>">
			    <?php print Yii::t('admin', 'Add new'); ?>
		    </a>
	    </td>
	    <td>
		    <a href="<?php echo Yii::app()->createUrl('admin/partners/index');?>">
			    <?php print Yii::t('admin', 'List'); ?>
		    </a>
	    </td>
    </tr>
    </tbody>
</table>
