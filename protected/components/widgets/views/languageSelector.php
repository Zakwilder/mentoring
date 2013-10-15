<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

$this->widget('bootstrap.widgets.TbMenu', array(
	'type'    => 'pills',
	'stacked' => false,
	'htmlOptions' => array('class' => 'language-picker'),
	'items'   => $languages,
));