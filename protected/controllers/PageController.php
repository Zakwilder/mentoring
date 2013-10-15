<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Page controller.
 *
 * @package Yiitrn\modules\admin\controllers\Page
 * @author  Eugene Zakursky <Eugene.Zakursky@sigmaukraine.com>
 */
class PageController extends Controller
{
	/**
	 * Default layout for PageController.
	 *
	 * @var string
	 */
	public $layout = 'column1';

	/**
	 * Displays full page.
	 *
	 * @param string $slug Slug of the page.
	 *
	 * @return void
	 *
	 * @throws CHttpException Page visibility error.
	 */
	public function actionView($slug)
	{
		$model = Page::model()->findByAttributes(array('slug' => $slug));
		if ($model->visibility == 0) {
			throw new CHttpException(500, Yii::t('front', 'This page is not visible'));
		}
		$comment = $this->newComment($model->id);

		$this->render('view', array('model' => $model, 'comment' => $comment));
	}

	/**
	 * Manages new comment.
	 *
	 * @param integer $id Page id.
	 *
	 * @return Comments
	 */
	protected function newComment($id)
	{
		$comment = new Comments();
		if (isset($_POST['Comments'])) {
			$comment->attributes = $_POST['Comments'];
			if ($_POST['Comments']['parent_id'] != null) {
				$comment->parent_id = $_POST['Comments']['parent_id'];
			}
			if (isset(Yii::app()->user->service)) {
				$user = User::model()->findByAttributes(array('identity' => Yii::app()->user->id));
				$comment->author_id = $user->id;
			}
			else {
				$comment->author_id = Yii::app()->user->id;
			}

			$comment->page_id = $id;
			if ($comment->validate()) {
				$comment->save();
				$this->refresh();
			}
		}
		return $comment;
	}

}
