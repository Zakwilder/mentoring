<?php

/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Migration alter tables "Category", "Pages" to add i18n logic.
 *
 * @package Yiitrn\migrations
 * @author  aprogonniy <alexey.progonniy@sigmaukraine.com>
 */
class m130426_142052_pages_categories_internationalization extends CDbMigration
{

	/**
	 * Commences migration.
	 *
	 * @return void
	 */
	public function up()
	{
		/*
		 * Category table changes
		 */
		$this->renameColumn('tbl_category', 'title', 'title_en');
		$this->renameColumn('tbl_category', 'description', 'description_en');
		$this->addColumn('tbl_category', 'title_ru', 'varchar(100) not null');
		$this->addColumn('tbl_category', 'description_ru', 'varchar(255) not null');

		/*
		 * Page table changes
		 */
		$this->renameColumn('tbl_page', 'title', 'title_en');
		$this->renameColumn('tbl_page', 'content', 'content_en');
		$this->addColumn('tbl_page', 'title_ru', 'varchar(100) not null unique');
		$this->addColumn('tbl_page', 'content_ru', 'varchar(255) not null');
	}

	/**
	 * Discards migration.
	 *
	 * @return boolean
	 */
	public function down()
	{
		/*
		 * Category table changes
		 */
		$this->renameColumn('tbl_category', 'title_en', 'title');
		$this->renameColumn('tbl_category', 'description_en', 'description');
		$this->dropColumn('tbl_category', 'title_ru');
		$this->dropColumn('tbl_category', 'description_ru');

		/*
		 * Page table changes
		 */
		$this->renameColumn('tbl_page', 'title_en', 'title');
		$this->renameColumn('tbl_page', 'content_en', 'content');
		$this->dropColumn('tbl_page', 'title_ru');
		$this->dropColumn('tbl_page', 'content_ru');

		return true;
	}

}