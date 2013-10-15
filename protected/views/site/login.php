<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('front', 'Login');

$this->breadcrumbs = array(
	Yii::t('front', 'Login'),
);
?>

<?php if (Yii::app()->user->hasFlash('passwordChanged')):?>
	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('passwordChanged'); ?>
	</div>
<?php endif; ?>
<p><?php print Yii::t('front', 'Please fill out the following form with your login credentials'); ?>:</p>

<div class="form">
	<?php
	foreach (Yii::app()->user->getFlashes() as $key => $message) {
		echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
	}
	?>
<?php
$form = $this->beginWidget('CActiveForm', array(
	'id' => 'login-form',
	'enableAjaxValidation' => false,
));
?>
    <p class="note"><?php print Yii::t('front', 'Fields with {asterix} are required.', array('{asterix}' => '<span class="required">*</span>')); ?></p>

    <div class="row">
        <?php echo $form->labelEx($model, 'username'); ?>
        <?php echo $form->textField($model, 'username'); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password'); ?>
        <?php echo $form->error($model, 'password'); ?>
        <p class="hint">
	        <?php print Yii::t('front', ' Hint: You may login with {login}', array('{login}' => '<tt>demo/demo</tt>')); ?>.
        </p>
    </div>

    <div class="row rememberMe">
        <?php echo $form->checkBox($model, 'rememberMe'); ?>
        <?php echo $form->label($model, 'rememberMe'); ?>
        <?php echo $form->error($model, 'rememberMe'); ?>
    </div>

    <div class="row submit">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => Yii::t('front', 'Login'))) ?>
	    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'link', 'url' => Yii::app()->controller->createUrl('/site/register'), 'label' => Yii::t('front', 'Register'))) ?>

    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<h2> <?php print Yii::t('front', 'Do you already have an account on one of these sites? Click the logo to log in with it here:');?></h2>
<?php Yii::app()->eauth->renderWidget(); ?>
