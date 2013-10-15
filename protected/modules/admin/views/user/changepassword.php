<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Base template for user`s page.
 *
 * @package Yiitrn\Protected\Modules\Admin\Views\User
 * @author  Alexander Bespalko <alexander.bespalko@sigmaukraine.com>
 */
?>
<h3><?php echo Yii::t('admin', 'Change password'); ?></h3>
<h4><?php echo Yii::t('admin', 'User') . ' - ' . $user->username; ?></h4>
<?php echo $this->renderPartial('_changepasswordform', array('model' => $model, 'passwordRecovery' => true)); ?>