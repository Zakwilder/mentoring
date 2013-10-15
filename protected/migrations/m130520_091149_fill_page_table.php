<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * This migration fills table "Page".
 *
 * @package Yiitrn\migrations
 * @author  Eugene Zakursky <Eugene.Zakursky@sigmaukraine.com>
 */
class m130520_091149_fill_page_table extends CDbMigration
{

	/**
	 * Commences migration.
	 *
	 * @return void
	 */
	public function safeUp()
	{
		$category = Category::model()->findByAttributes(array('slug' => 'yii-framework-documentation'));

		$this->addColumn('tbl_page', 'preview_ru', 'TEXT');
		$this->addColumn('tbl_page', 'preview_en', 'TEXT');

		$this->insert('tbl_page', array(
			'title_en'  => 'Model-View-Controller (MVC)',
			'title_ru'  => 'Модель-Представление-Контроллер (MVC)',
			'slug'      => 'model-view-controller',
			'visibility' => 1,
			'date_created' => date('Y-m-d'),
			'date_updated' => date('Y-m-d'),
			'category_id' => $category->id,
			'preview_ru' => '
				Yii использует шаблон проектирования Модель-Представление-Контроллер (MVC, Model-View-Controller), который широко применяется в веб-программировании.
			',
			'preview_en' => '
				Yii implements the model-view-controller (MVC) design pattern, which is widely adopted in Web programming.
			',
			'content_en' => '
				<p><p>Yii implements the model-view-controller (MVC) design pattern, which is widely adopted in Web programming. MVC aims to separate business logic from user interface considerations, so that developers can more easily change each part without affecting the other. In MVC, the model represents the information (the data) and the business rules; the view contains elements of the user interface such as text, form inputs; and the controller manages the communication between the model and the view.</p><p>Besides implementing MVC, Yii also introduces a front-controller, called&nbsp;<code>Application</code>, which encapsulates the execution context for the processing of a request. Application collects some information about a user request and then dispatches it to an appropriate controller for further handling.</p><p>The following diagram shows the static structure of a Yii application:</p><p>Static structure of Yii application</p><img src="http://www.yiiframework.com/tutorial/image?type=guide&amp;version=1.1&amp;lang=en&amp;file=structure.png" alt="Static structure of Yii application" style=""><p></p><h2>1. A Typical Workflow&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.mvc#a-typical-workflow"></a></h2><p>The following diagram shows a typical workflow of a Yii application when it is handling a user request:</p><p>Typical workflow of a Yii application</p><img src="http://www.yiiframework.com/tutorial/image?type=guide&amp;version=1.1&amp;lang=en&amp;file=flow.png" alt="Typical workflow of a Yii application"><p></p><ol><li>A user makes a request with the URL&nbsp;<code>http://www.example.com/index.php?r=post/show&amp;id=1</code>&nbsp;and the Web server handles the request by executing the bootstrap script&nbsp;<code>index.php</code>.</li><li>The bootstrap script creates an&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.application">Application</a>&nbsp;instance and runs it.</li><li>The Application obtains detailed user request information from an&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.application#application-component">application component</a>&nbsp;named&nbsp;<code>request</code>.</li><li>The application determines the requested&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.controller">controller</a>&nbsp;and&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.controller#action">action</a>&nbsp;with the help of an application component named&nbsp;<code>urlManager</code>. For this example, the controller is&nbsp;<code>post</code>, which refers to the&nbsp;<code>PostController</code>&nbsp;class; and the action is&nbsp;<code>show</code>, whose actual meaning is determined by the controller.</li><li>The application creates an instance of the requested controller to further handle the user request. The controller determines that the action&nbsp;<code>show</code>&nbsp;refers to a method named&nbsp;<code>actionShow</code>&nbsp;in the controller class. It then creates and executes filters (e.g. access control, benchmarking) associated with this action. The action is executed if it is allowed by the filters.</li><li>The action reads a&nbsp;<code>Post</code>&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.model">model</a>&nbsp;whose ID is&nbsp;<code>1</code>&nbsp;from the database.</li><li>The action renders a&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.view">view</a>&nbsp;named&nbsp;<code>show</code>&nbsp;with the&nbsp;<code>Post</code>&nbsp;model.</li><li>The view reads and displays the attributes of the&nbsp;<code>Post</code>&nbsp;model.</li><li>The view executes some&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.view#widget">widgets</a>.</li><li>The view rendering result is embedded in a&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.view#layout">layout</a>.</li><li>The action completes the view rendering and displays the result to the user.</li></ol><br></p>
			',
			'content_ru' => '
				<p>Yii использует шаблон проектирования Модель-Представление-Контроллер (MVC, Model-View-Controller), который широко применяется в веб-программировании.</p><p>MVC предназначен для разделения бизнес-логики и пользовательского интерфейса, чтобы разработчики могли легко изменять отдельные части приложения, не затрагивая другие. В архитектуре MVC модель предоставляет данные и правила бизнес-логики, представление отвечает за пользовательский интерфейс (например, текст, поля ввода), а контроллер обеспечивает взаимодействие между моделью и представлением.</p><p>Помимо этого, Yii использует фронт-контроллер, называемый приложением (application), который инкапсулирует контекст обработки запроса. Приложение собирает информацию о запросе и передает её для дальнейшей обработки соответствующему контроллеру.</p><p>Следующая диаграмма отображает структуру приложения Yii:</p><p>СТАТИЧЕСКАЯ СТРУКТУРА ПРИЛОЖЕНИЯ YII</p><img src="http://yiiframework.com.ua/assets/83ecb715/structure.png" alt="Статическая структура приложения Yii"><p></p><h2>Типичная последовательность работы приложения Yii</h2><p>Следующая диаграмма описывает типичную последовательность процесса обработки пользовательского запроса приложением:</p><p>ТИПИЧНАЯ ПОСЛЕДОВАТЕЛЬНОСТЬ РАБОТЫ ПРИЛОЖЕНИЯ YII</p><img src="http://yiiframework.com.ua/assets/83ecb715/flow.png" alt="Типичная последовательность работы приложения Yii"><p></p><ol><li>Пользователь осуществляет запрос посредством URL&nbsp;<code>http://www.example.com/index.php?r=post/show&amp;id=1</code>, и веб-сервер обрабатывает его, запуская скрипт инициализации&nbsp;<code>index.php</code>.</li><li>Скрипт инициализации создает экземпляр&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.application">приложения</a>&nbsp;и запускает его на выполнение.</li><li>Приложение получает подробную информацию о запросе пользователя от&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.application#application-component">компонента приложения</a>&nbsp;<code>request</code>.</li><li>Приложение определяет запрошенные&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.controller">контроллер</a>&nbsp;и&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.controller#action">действие</a>&nbsp;при помощи компонента&nbsp;<code>urlManager</code>. В данном примере контроллером будет&nbsp;<code>post</code>, относящийся к классу&nbsp;<code>PostController</code>, а действием —&nbsp;<code>show</code>, суть которого определяется контроллером.</li><li>Приложение создаёт экземпляр запрашиваемого контроллера для дальнейшей обработки запроса пользователя. Контроллер определяет соответствие действия&nbsp;<code>show</code>&nbsp;методу&nbsp;<code>actionShow</code>&nbsp;в классе контроллера. Далее создаются и применяются фильтры (например, access control, benchmarking), связанные с данным действием, и, если фильтры позволяют, действие выполняется.</li><li>Действие считывает из базы данных&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.model">модель</a>&nbsp;<code>Post</code>&nbsp;с ID равным&nbsp;<code>1</code>.</li><li>Действие подключает&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.view">представление</a>&nbsp;<code>show</code>, передавая в него модель&nbsp;<code>Post</code>.</li><li>Представление получает и отображает атрибуты модели&nbsp;<code>Post</code>.</li><li>Представление подключает некоторые&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.view#widget">виджеты</a>.</li><li>Сформированное представление вставляется в&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.view#layout">макет страницы</a>.</li><li>Действие завершает формирование представления и выводит результат пользователю.</li></ol>
			',
		));
		$this->insert('tbl_page', array(
			'title_en'  => 'Entry script',
			'title_ru'  => 'Входной скрипт',
			'slug'      => 'entry-script',
			'visibility' => 1,
			'date_created' => date('Y-m-d'),
			'date_updated' => date('Y-m-d'),
			'category_id' => $category->id,
			'preview_en' => '
				The entry script is the bootstrap PHP script that handles user requests initially. It is the only PHP script that end users can directly request to execute.
			',
			'preview_ru' => '
				Входной скрипт — это PHP-скрипт, выполняющий первоначальную обработку пользовательского запроса. Это единственный PHP-скрипт, к которому может обращаться конечный пользователь.
			',
			'content_en' => '
				<p></p><p>The entry script is the bootstrap PHP script that handles user requests initially. It is the only PHP script that end users can directly request to execute.</p><p>In most cases, the entry script of a Yii application contains code that is as simple as this:</p><p></p><div><pre>// remove the following line when in production mode
				defined("YII_DEBUG") or define("YII_DEBUG",true);
				// include Yii bootstrap file
				require_once("path/to/yii/framework/yii.php");
				// create application instance and run
				$configFile="path/to/config/file.php"";
				Yii::createWebApplication($configFile)-&gt;run();</pre><p></p></div><p>The script first includes the Yii framework bootstrap file&nbsp;<code>yii.php</code>. It then creates a Web application instance with the specified configuration and runs it.</p><h2>1. Debug Mode&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.entry#debug-mode"></a></h2><p>A Yii application can run in either debug or production mode, as determined by the value of the constant<code>YII_DEBUG</code>. By default, this constant value is defined as&nbsp;<code>false</code>, meaning production mode. To run in debug mode, define this constant as&nbsp;<code>true</code>&nbsp;before including the&nbsp;<code>yii.php</code>&nbsp;file. Running the application in debug mode is less efficient because it keeps many internal logs. On the other hand, debug mode is also more helpful during the development stage because it provides richer debugging information when an error occurs.</p><ol><li></li></ol>
			',
			'content_ru' => '
				<p></p><p></p><p>Входной скрипт — это PHP-скрипт, выполняющий первоначальную обработку пользовательского запроса. Это единственный PHP-скрипт, к которому может обращаться конечный пользователь.</p><p>В большинстве случаев входной скрипт приложения Yii содержит простой код:</p><p></p><div><pre>// в production режиме эту строку необходимо удалить
				defined("YII_DEBUG") or define("YII_DEBUG",true);
				// подключаем файл инициализации Yii
				require_once("path/to/yii/framework/yii.php");
				// создаем экземпляр приложения и запускаем его
				$configFile="path/to/config/file.php";
				Yii::createWebApplication($configFile)-&gt;run();</pre><p></p></div><p>Сначала скрипт подключает файл инициализации фреймворка&nbsp;<code>yii.php</code>, затем создаёт экземпляр приложения с установленными параметрами и запускает его на исполнение.</p><h2>Режим отладки</h2><p>Приложение может выполняться в отладочном (debug) или рабочем (production) режиме в зависимости от значения константы&nbsp;<code>YII_DEBUG</code>.</p><p>По умолчанию её значение установлено в&nbsp;<code>false</code>, что означает рабочий режим. Для запуска в режиме отладки установите значение константы в&nbsp;<code>true</code>&nbsp;до подключения файла&nbsp;<code>yii.php</code>. Работа приложения в режиме отладки не столь эффективна из-за ведения множества внутренних логов. С другой стороны, данный режим очень полезен на стадии разработки, т.к. предоставляет большое количество отладочной информации при возникновении ошибок.</p><ol><li></li></ol>
			',
		));
		$this->insert('tbl_page', array(
			'title_en'  => 'Application',
			'title_ru'  => 'Приложение',
			'slug'      => 'application',
			'visibility' => 1,
			'date_created' => date('Y-m-d'),
			'date_updated' => date('Y-m-d'),
			'category_id' => $category->id,
			'preview_en' => '
				The application object encapsulates the execution context within which a request is processed.
			',
			'preview_ru' => '
				Объект приложения (application) инкапсулирует контекст выполнения запроса.
			',
			'content_en' => '
				<p></p><p></p><p></p><p>The application object encapsulates the execution context within which a request is processed. Its main task is to collect some basic information about the request, and dispatch it to an appropriate controller for further processing. It also serves as the central place for keeping application-level configuration settings. For this reason, the application object is also called the&nbsp;<code>front-controller</code>.</p><p>The application object is instantiated as a singleton by the&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.entry">entry script</a>. The application singleton can be accessed at any place via&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/YiiBase#app">Yii::app()</a>.</p><h2>1. Application Configuration&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.application#application-configuration"></a></h2><p>By default, the application object is an instance of&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CWebApplication">CWebApplication</a>. To customize it, we normally provide a configuration settings file (or array) to initialize its property values when it is being instantiated. An alternative way of customizing it is to extend&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CWebApplication">CWebApplication</a>.</p><p>The configuration is an array of key-value pairs. Each key represents the name of a property of the application instance, and each value the corresponding property"s initial value. For example, the following configuration array sets the&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CApplication#name">name</a>&nbsp;and&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CWebApplication#defaultController">defaultController</a>&nbsp;properties of the application.</p><p></p><div><pre>array(
					"name"=&gt;"Yii Framework",
			    "defaultController"=&gt;"site",
			)</pre><p></p></div><p>We usually store the configuration in a separate PHP script (e.g.&nbsp;<code>protected/config/main.php</code>). Inside the script, we return the configuration array as follows:</p><p></p><div><pre>return array(...);</pre><p></p></div><p>To apply the configuration, we pass the configuration file name as a parameter to the application"s constructor, or to&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/Yii#createWebApplication">Yii::createWebApplication()</a>&nbsp;in the following manner, usually in the&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.entry">entry script</a>:</p><p></p><div><pre>$app=Yii::createWebApplication($configFile);</pre><p></p></div><blockquote><p><strong>Tip:</strong>&nbsp;If the application configuration is very complex, we can split it into several files, each returning a portion of the configuration array. Then, in the main configuration file, we can call PHP&nbsp;<code>include()</code>to include the rest of the configuration files and merge them into a complete configuration array.</p></blockquote><h2>2. Application Base Directory&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.application#application-base-directory"></a></h2><p>The application base directory is the root directory under which all security-sensitive PHP scripts and data reside. By default, it is a subdirectory named&nbsp;<code>protected</code>&nbsp;that is located under the directory containing the entry script. It can be customized by setting the&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CWebApplication#basePath">basePath</a>&nbsp;property in the&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.application#application-configuration">application configuration</a>.</p><p>Contents under the application base directory should be protected against being accessed by Web users. With<a href="http://httpd.apache.org/">Apache HTTP server</a>, this can be done easily by placing an&nbsp;<code>.htaccess</code>&nbsp;file under the base directory. The content of the&nbsp;<code>.htaccess</code>&nbsp;file would be as follows:</p><pre>deny from all
			</pre><h2>3. Application Components&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.application#application-components"></a></h2><p>The functionality of the application object can easily be customized and enriched using its flexible component architecture. The object manages a set of application components, each implementing specific features. For example, it performs some initial processing of a user request with the help of the&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CUrlManager">CUrlManager</a>&nbsp;and<a href="http://www.yiiframework.com/doc/api/1.1/CHttpRequest">CHttpRequest</a>&nbsp;components.</p><p>By configuring the&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CApplication#components">components</a>&nbsp;property of the application instance, we can customize the class and property values of any application component used. For example, we can configure the&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CMemCache">CMemCache</a>&nbsp;component so that it can use multiple memcache servers for caching, like this:</p><p></p><div><pre>array(
			    ......
			    "components"=&gt;array(
			        ......
			        "cache"=&gt;array(
			            "class"=&gt;"CMemCache",
			            "servers"=&gt;array(
			                array("host"=&gt;"server1", "port"=&gt;11211, "weight"=&gt;60),
			                array("host"=&gt;"server2", "port"=&gt;11211, "weight"=&gt;40),
			            ),
			        ),
			    ),
			)</pre><p></p></div><p>In the above, we added the&nbsp;<code>cache</code>&nbsp;element to the&nbsp;<code>components</code>&nbsp;array. The&nbsp;<code>cache</code>&nbsp;element states that the class of the component is&nbsp;<code>CMemCache</code>&nbsp;and its&nbsp;<code>servers</code>&nbsp;property should be initialized as such.</p><p>To access an application component, use&nbsp;<code>Yii::app()-&gt;ComponentID</code>, where&nbsp;<code>ComponentID</code>&nbsp;refers to the ID of the component (e.g.&nbsp;<code>Yii::app()-&gt;cache</code>).</p><p>An application component may be disabled by setting&nbsp;<code>enabled</code>&nbsp;to false in its configuration. Null is returned when we access a disabled component.</p><blockquote><p><strong>Tip:</strong>&nbsp;By default, application components are created on demand. This means an application component may not be created at all if it is not accessed during a user request. As a result, the overall performance may not be degraded even if an application is configured with many components. Some application components (e.g.&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CLogRouter">CLogRouter</a>) may need to be created regardless of whether they are accessed or not. To do so, list their IDs in the&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CApplication#preload">preload</a>&nbsp;application property.</p></blockquote><h2>4. Core Application Components&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.application#core-application-components"></a></h2><p>Yii predefines a set of core application components to provide features common among Web applications. For example, the&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CWebApplication#request">request</a>&nbsp;component is used to collect information about a user request and provide information such as the requested URL and cookies. By configuring the properties of these core components, we can change the default behavior of nearly every aspect of Yii.</p><p>Here is a list the core components that are pre-declared by&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CWebApplication">CWebApplication</a>:</p><ul><li><p><a href="http://www.yiiframework.com/doc/api/1.1/CWebApplication#assetManager">assetManager</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CAssetManager">CAssetManager</a>&nbsp;- manages the publishing of private asset files.</p></li><li><p><a href="http://www.yiiframework.com/doc/api/1.1/CWebApplication#authManager">authManager</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CAuthManager">CAuthManager</a>&nbsp;- manages role-based access control (RBAC).</p></li><li><p><a href="http://www.yiiframework.com/doc/api/1.1/CApplication#cache">cache</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CCache">CCache</a>&nbsp;- provides data caching functionality. Note, you must specify the actual class (e.g.<a href="http://www.yiiframework.com/doc/api/1.1/CMemCache">CMemCache</a>,&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CDbCache">CDbCache</a>). Otherwise, null will be returned when you access this component.</p></li><li><p><a href="http://www.yiiframework.com/doc/api/1.1/CWebApplication#clientScript">clientScript</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CClientScript">CClientScript</a>&nbsp;- manages client scripts (javascript and CSS).</p></li><li><p><a href="http://www.yiiframework.com/doc/api/1.1/CApplication#coreMessages">coreMessages</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CPhpMessageSource">CPhpMessageSource</a>&nbsp;- provides translated core messages used by the Yii framework.</p></li><li><p><a href="http://www.yiiframework.com/doc/api/1.1/CApplication#db">db</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CDbConnection">CDbConnection</a>&nbsp;- provides the database connection. Note, you must configure its&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CDbConnection#connectionString">connectionString</a>property in order to use this component.</p></li><li><p><a href="http://www.yiiframework.com/doc/api/1.1/CApplication#errorHandler">errorHandler</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CErrorHandler">CErrorHandler</a>&nbsp;- handles uncaught PHP errors and exceptions.</p></li><li><p><a href="http://www.yiiframework.com/doc/api/1.1/CApplication#format">format</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CFormatter">CFormatter</a>&nbsp;- formats data values for display purpose.</p></li><li><p><a href="http://www.yiiframework.com/doc/api/1.1/CApplication#messages">messages</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CPhpMessageSource">CPhpMessageSource</a>&nbsp;- provides translated messages used by the Yii application.</p></li><li><p><a href="http://www.yiiframework.com/doc/api/1.1/CWebApplication#request">request</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CHttpRequest">CHttpRequest</a>&nbsp;- provides information related to user requests.</p></li><li><p><a href="http://www.yiiframework.com/doc/api/1.1/CApplication#securityManager">securityManager</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CSecurityManager">CSecurityManager</a>&nbsp;- provides security-related services, such as hashing and encryption.</p></li><li><p><a href="http://www.yiiframework.com/doc/api/1.1/CWebApplication#session">session</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CHttpSession">CHttpSession</a>&nbsp;- provides session-related functionality.</p></li><li><p><a href="http://www.yiiframework.com/doc/api/1.1/CApplication#statePersister">statePersister</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CStatePersister">CStatePersister</a>&nbsp;- provides the mechanism for persisting global state.</p></li><li><p><a href="http://www.yiiframework.com/doc/api/1.1/CWebApplication#urlManager">urlManager</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CUrlManager">CUrlManager</a>&nbsp;- provides URL parsing and creation functionality.</p></li><li><p><a href="http://www.yiiframework.com/doc/api/1.1/CWebApplication#user">user</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CWebUser">CWebUser</a>&nbsp;- carries identity-related information about the current user.</p></li><li><p><a href="http://www.yiiframework.com/doc/api/1.1/CWebApplication#themeManager">themeManager</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CThemeManager">CThemeManager</a>&nbsp;- manages themes.</p></li></ul><h2>5. Application Life Cycle&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.application#application-life-cycle"></a></h2><p>When handling a user request, an application will undergo the following life cycle:</p><ol><li><p>Pre-initialize the application with&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CApplication#preinit">CApplication::preinit()</a>;</p></li><li><p>Set up the class autoloader and error handling;</p></li><li><p>Register core application components;</p></li><li><p>Load application configuration;</p></li><li><p>Initialize the application with&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CApplication#init">CApplication::init()</a></p><ul><li>Register application behaviors;</li><li>Load static application components;</li></ul></li><li><p>Raise an&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CApplication#onBeginRequest">onBeginRequest</a>&nbsp;event;</p></li><li><p>Process the user request:</p><ul><li>Collect information about the request;</li><li>Create a controller;</li><li>Run the controller;</li></ul></li><li><p>Raise an&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CApplication#onEndRequest">onEndRequest</a>&nbsp;event;</p></li></ol><ol><li></li></ol>
			',
			'content_ru' => '
				<p>Объект приложения (application) инкапсулирует контекст выполнения запроса. Основная задача приложения — собрать информацию о запросе и передать её соответствующему контроллеру для дальнейшей обработки. Также приложение является централизованным хранилищем конфигурации приложения. Именно поэтому объект приложения также называют&nbsp;<code>фронт-контроллером</code>.</p><p>Объект приложения создаётся&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.entry">входным скриптом</a>&nbsp;как&nbsp;<code>одиночка (singleton)</code>. Экземпляр приложения доступен из любой его точки посредством&nbsp;<a href="http://www.yiiframework.com/doc/api/YiiBase#app">Yii::app()</a>.</p><h2>Конфигурация приложения</h2><p>По умолчанию объект приложения — это экземпляр класса&nbsp;<a href="http://www.yiiframework.com/doc/api/CWebApplication">CWebApplication</a>, который может быть настроен с использованием конфигурационного файла (или массива). Необходимые значения свойств устанавливаются в момент создания экземпляра приложения. Альтернативный путь настройки приложения — расширение класса&nbsp;<a href="http://www.yiiframework.com/doc/api/CWebApplication">CWebApplication</a>.</p><p>Конфигурация — это массив пар ключ-значение, где каждый ключ представляет собой имя свойства экземпляра приложения, а значение — начальное значение соответствующего свойства. Например, следующая конфигурация устанавливает значения свойств приложения&nbsp;<a href="http://www.yiiframework.com/doc/api/CApplication#name">name</a>&nbsp;и<a href="http://www.yiiframework.com/doc/api/CWebApplication#defaultController">defaultController</a>:</p><p></p><div><pre>array(
				    "name"=&gt;"Yii Framework",
				    "defaultController"=&gt;"site",
				)</pre><p></p></div><p>Обычно конфигурация хранится в отдельном PHP-скрипте (например,&nbsp;<code>protected/config/main.php</code>). Скрипт возвращает конфигурационный массив:</p><p></p><div><pre>return array(…);</pre><p></p></div><p>Чтобы воспользоваться конфигурацией, необходимо передать имя конфигурационного файла в качестве аргумента конструктору приложения или методу&nbsp;<a href="http://www.yiiframework.com/doc/api/Yii#createWebApplication">Yii::createWebApplication()</a>, как показано ниже. Обычно это делается во&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.entry">входном скрипте</a>:</p><p></p><div><pre>$app=Yii::createWebApplication($configFile);</pre><p></p></div><blockquote><p><strong>Подсказка:</strong>&nbsp;Если конфигурация очень громоздкая, можно разделить ее на несколько файлов, каждый из которых возвращает часть конфигурационного массива. Затем в основном конфигурационном файле необходимо подключить эти файлы, используя&nbsp;<code>include()</code>, и соединить массивы-части в единый конфигурационный массив.</p></blockquote><h2>Базовая директория приложения</h2><p>Базовой директорией приложения называется корневая директория, содержащая все основные, с точки зрения безопасности, PHP-скрипты и данные. По умолчанию это поддиректория&nbsp;<code>protected</code>, находящаяся в директории, содержащей входной скрипт. Изменить её местоположение можно, установив свойство&nbsp;<a href="http://www.yiiframework.com/doc/api/CWebApplication#basePath">basePath</a>&nbsp;в&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.application#application-configuration">конфигурации приложения</a>.</p><p>Содержимое базовой директории должно быть закрыто от доступа из веб. При использовании веб-сервера&nbsp;<a href="http://httpd.apache.org/">Apache HTTP server</a>&nbsp;это можно сделать путем добавления в базовую директорию файла&nbsp;<code>.htaccess</code>&nbsp;следующего содержания:</p><pre>deny from all
				</pre><h2>Компоненты приложения</h2><p>Функциональность объекта приложения может быть легко модифицирована и расширена благодаря компонентной архитектуре. Приложение управляет набором компонентов, каждый из которых имеет специфические возможности. Например, приложение производит предварительную обработку запроса пользователя, используя компоненты&nbsp;<a href="http://www.yiiframework.com/doc/api/CUrlManager">CUrlManager</a>&nbsp;и&nbsp;<a href="http://www.yiiframework.com/doc/api/CHttpRequest">CHttpRequest</a>.</p><p>Изменяя значение свойства&nbsp;<a href="http://www.yiiframework.com/doc/api/CApplication#components">components</a>, можно настроить классы и значения свойств любого компонента, используемого приложением. Например, можно сконфигурировать компонент&nbsp;<a href="http://www.yiiframework.com/doc/api/CMemCache">CMemCache</a>&nbsp;так, чтобы он использовал несколько memcache-серверов для кэширования:</p><p></p><div><pre>array(
				    …
				    "components"=&gt;array(
				        …
				        "cache"=&gt;array(
				            "class"=&gt;"CMemCache",
				            "servers"=&gt;array(
				                array("host"=&gt;"server1", "port"=&gt;11211, "weight"=&gt;60),
				                array("host"=&gt;"server2", "port"=&gt;11211, "weight"=&gt;40),
				            ),
				        ),
				    ),
				)</pre><p></p></div><p>В данном примере мы добавили элемент&nbsp;<code>cache</code>&nbsp;к массиву&nbsp;<code>components</code>. Элемент&nbsp;<code>cache</code>&nbsp;указывает, что классом компонента является<code>CMemCache</code>, а также устанавливает его свойство&nbsp;<code>servers</code>.</p><p>Для доступа к компоненту приложения используйте&nbsp;<code>Yii::app()-&gt;ComponentID</code>, где&nbsp;<code>ComponentID</code>&nbsp;— это идентификатор компонента (например,&nbsp;<code>Yii::app()-&gt;cache</code>).</p><p>Компонент может быть деактивирован путем установки параметра&nbsp;<code>enabled</code>&nbsp;в его конфигурации равным false. При обращении к деактивированному компоненту будет возвращен null.</p><blockquote><p><strong>Подсказка:</strong>&nbsp;По умолчанию компоненты приложения создаются по требованию. Это означает, что экземпляр компонента может быть не создан вообще в случае, если это не требуется при обработке пользовательского запроса. В результате общая производительность приложения может не пострадать, даже если в конфигурации указано множество компонентов.</p></blockquote><p>При необходимости обязательного создания экземпляров компонентов (например,&nbsp;<a href="http://www.yiiframework.com/doc/api/CLogRouter">CLogRouter</a>) вне зависимости от того, используются они или нет, укажите их идентификаторы в значении конфигурационного свойства&nbsp;<a href="http://www.yiiframework.com/doc/api/CApplication#preload">preload</a>.</p><h2>Ключевые компоненты приложения</h2><p>Yii предопределяет набор компонентов ядра, которые предоставляют возможности, необходимые для большинства веб-приложений. Например, компонент&nbsp;<a href="http://www.yiiframework.com/doc/api/CWebApplication#request">request</a>&nbsp;используется для сбора информации о запросе пользователя и предоставляет различную информацию, такую как URL и cookies. Задавая свойства компонентов, можно изменять стандартное поведение Yii практически как угодно.</p><p>Далее перечислены ключевые компоненты, предопределенные классом&nbsp;<a href="http://www.yiiframework.com/doc/api/CWebApplication">CWebApplication</a>:</p><ul><li><p><a href="http://www.yiiframework.com/doc/api/CWebApplication#assetManager">assetManager</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/CAssetManager">CAssetManager</a>&nbsp;— управляет публикацией файлов ресурсов (asset files);</p></li><li><p><a href="http://www.yiiframework.com/doc/api/CWebApplication#authManager">authManager</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/CAuthManager">CAuthManager</a>&nbsp;— контролирует доступ на основе ролей (RBAC);</p></li><li><p><a href="http://www.yiiframework.com/doc/api/CApplication#cache">cache</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/CCache">CCache</a>&nbsp;— предоставляет возможности кэширования данных; учтите, что вы должны указать используемый класс (например,<a href="http://www.yiiframework.com/doc/api/CMemCache">CMemCache</a>,&nbsp;<a href="http://www.yiiframework.com/doc/api/CDbCache">CDbCache</a>), иначе при обращении к компоненту будет возвращен null;</p></li><li><p><a href="http://www.yiiframework.com/doc/api/CWebApplication#clientScript">clientScript</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/CClientScript">CClientScript</a>&nbsp;— управляет клиентскими скриптами (JavaScript и CSS);</p></li><li><p><a href="http://www.yiiframework.com/doc/api/CApplication#coreMessages">coreMessages</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/CPhpMessageSource">CPhpMessageSource</a>&nbsp;— предоставляет переводы системных сообщений Yii-фреймворка;</p></li><li><p><a href="http://www.yiiframework.com/doc/api/CApplication#db">db</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/CDbConnection">CDbConnection</a>&nbsp;— обслуживает соединение с базой данных; обратите внимание, что для использования компонента необходимо установить свойство&nbsp;<a href="http://www.yiiframework.com/doc/api/CDbConnection#connectionString">connectionString</a>;</p></li><li><p><a href="http://www.yiiframework.com/doc/api/CApplication#errorHandler">errorHandler</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/CErrorHandler">CErrorHandler</a>&nbsp;— обрабатывает не пойманные ошибки и исключения PHP;</p></li><li><p><a href="http://www.yiiframework.com/doc/api/CApplication#format">format</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/CFormatter">CFormatter</a>&nbsp;— форматирует данные для их последующего отображения.</p></li><li><p><a href="http://www.yiiframework.com/doc/api/CApplication#messages">messages</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/CPhpMessageSource">CPhpMessageSource</a>&nbsp;— предоставляет переводы сообщений, используемых в Yii-приложении;</p></li><li><p><a href="http://www.yiiframework.com/doc/api/CWebApplication#request">request</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/CHttpRequest">CHttpRequest</a>&nbsp;— содержит информацию о пользовательском запросе;</p></li><li><p><a href="http://www.yiiframework.com/doc/api/CApplication#securityManager">securityManager</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/CSecurityManager">CSecurityManager</a>&nbsp;— предоставляет функции, связанные с безопасностью (например, хеширование, шифрование);</p></li><li><p><a href="http://www.yiiframework.com/doc/api/CWebApplication#session">session</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/CHttpSession">CHttpSession</a>&nbsp;— обеспечивает функциональность, связанную с сессиями;</p></li><li><p><a href="http://www.yiiframework.com/doc/api/CApplication#statePersister">statePersister</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/CStatePersister">CStatePersister</a>&nbsp;— предоставляет метод для сохранения глобального состояния;</p></li><li><p><a href="http://www.yiiframework.com/doc/api/CWebApplication#urlManager">urlManager</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/CUrlManager">CUrlManager</a>&nbsp;— предоставляет функции парсинга и формирования URL;</p></li><li><p><a href="http://www.yiiframework.com/doc/api/CWebApplication#user">user</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/CWebUser">CWebUser</a>&nbsp;— предоставляет идентификационную информацию текущего пользователя;</p></li><li><p><a href="http://www.yiiframework.com/doc/api/CWebApplication#themeManager">themeManager</a>:&nbsp;<a href="http://www.yiiframework.com/doc/api/CThemeManager">CThemeManager</a>&nbsp;— управляет темами оформления.</p></li></ul><h2>Жизненный цикл приложения</h2><p>Жизненный цикл приложения при обработке пользовательского запроса выглядит следующим образом:</p><ol><li><p>Предварительная инициализация приложения через&nbsp;<a href="http://www.yiiframework.com/doc/api/CApplication#preinit">CApplication::preinit()</a>.</p></li><li><p>Инициализация автозагрузчика классов и обработчика ошибок.</p></li><li><p>Регистрация компонентов ядра.</p></li><li><p>Загрузка конфигурации приложения.</p></li><li><p>Инициализация приложения&nbsp;<a href="http://www.yiiframework.com/doc/api/CApplication#init">CApplication::init()</a>:</p><ul><li>регистрация поведений приложения;</li><li>загрузка статических компонентов приложения.</li></ul></li><li><p>Вызов события&nbsp;<a href="http://www.yiiframework.com/doc/api/CApplication#onBeginRequest">onBeginRequest</a>.</p></li><li><p>Обработка запроса:</p><ul><li>сбор информации о запросе;</li><li>создание контроллера;</li><li>запуск контроллера.</li></ul></li><li><p>Вызов события&nbsp;<a href="http://www.yiiframework.com/doc/api/CApplication#onEndRequest">onEndRequest</a>.</p></li></ol><ol><li></li></ol>
			',
		));
		$this->insert('tbl_page', array(
			'title_en'  => 'Controller',
			'title_ru'  => 'Контроллер',
			'slug'      => 'controller',
			'visibility' => 1,
			'date_created' => date('Y-m-d'),
			'date_updated' => date('Y-m-d'),
			'category_id' => $category->id,
			'preview_en' => '
				A controller is an instance of CController or of a class that extends CController. It is created by the application object when the user requests it.
			',
			'preview_ru' => '
				Контроллер (controller) — это экземпляр класса CController или унаследованного от него класса. Он создается объектом приложения в случае, когда пользователь его запрашивает.
			',
			'content_en' => '
				<p><p>A&nbsp;<code>controller</code>&nbsp;is an instance of&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CController">CController</a>&nbsp;or of a class that extends&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CController">CController</a>. It is created by the application object when the user requests it. When a controller runs, it performs the requested action, which usually brings in the needed models and renders an appropriate view. An&nbsp;<code>action</code>, in its simplest form, is just a controller class method whose name starts with&nbsp;<code>action</code>.</p><p>A controller has a default action. When the user request does not specify which action to execute, the default action will be executed. By default, the default action is named as&nbsp;<code>index</code>. It can be changed by setting the public instance variable,&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CController#defaultAction">CController::defaultAction</a>.</p><p>The following code defines a&nbsp;<code>site</code>&nbsp;controller, an&nbsp;<code>index</code>&nbsp;action (the default action), and a&nbsp;<code>contact</code>&nbsp;action:</p><p></p><div><pre>class SiteController extends CController
			{
			    public function actionIndex()
			    {
			        // ...
			    }

			    public function actionContact()
			    {
			        // ...
			    }
			}</pre><p></p></div><h2>1. Route&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.controller#route"></a></h2><p>Controllers and actions are identified by IDs. A Controller ID is in the format&nbsp;<code>path/to/xyz</code>, which corresponds to the controller class file&nbsp;<code>protected/controllers/path/to/XyzController.php</code>, where the token&nbsp;<code>xyz</code>should be replaced by actual names; e.g.&nbsp;<code>post</code>&nbsp;corresponds to<code>protected/controllers/PostController.php</code>. Action ID is the action method name without the&nbsp;<code>action</code>prefix. For example, if a controller class contains a method named&nbsp;<code>actionEdit</code>, the ID of the corresponding action would be&nbsp;<code>edit</code>.</p><p>Users request a particular controller and action in terms of route. A route is formed by concatenating a controller ID and an action ID, separated by a slash. For example, the route&nbsp;<code>post/edit</code>&nbsp;refers to<code>PostController</code>&nbsp;and its&nbsp;<code>edit</code>&nbsp;action. By default, the URL&nbsp;<code>http://hostname/index.php?r=post/edit</code>would request the post controller and the edit action.</p><blockquote><p><strong>Note:</strong>&nbsp;By default, routes are case-sensitive. It is possible to make routes case-insensitive by setting<a href="http://www.yiiframework.com/doc/api/1.1/CUrlManager#caseSensitive">CUrlManager::caseSensitive</a>&nbsp;to false in the application configuration. When in case-insensitive mode, make sure you follow the convention that directories containing controller class files are in lowercase, and both&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CWebApplication#controllerMap">controller map</a>&nbsp;and&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CController#actions">action map</a>&nbsp;have lowercase keys.</p></blockquote><p>An application can contain&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.module">modules</a>. The route for a controller action inside a module is in the format<code>moduleID/controllerID/actionID</code>. For more details, see the&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.module">section about modules</a>.</p><h2>2. Controller Instantiation&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.controller#controller-instantiation"></a></h2><p>A controller instance is created when&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CWebApplication">CWebApplication</a>&nbsp;handles an incoming request. Given the ID of the controller, the application will use the following rules to determine what the controller class is and where the class file is located.</p><ul><li><p>If&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CWebApplication#catchAllRequest">CWebApplication::catchAllRequest</a>&nbsp;is specified, a controller will be created based on this property, and the user-specified controller ID will be ignored. This is mainly used to put the application in maintenance mode and display a static notice page.</p></li><li><p>If the ID is found in&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CWebApplication#controllerMap">CWebApplication::controllerMap</a>, the corresponding controller configuration will be used to create the controller instance.</p></li><li><p>If the ID is in the format&nbsp;<code>"path/to/xyz"</code>, the controller class name is assumed to be&nbsp;<code>XyzController</code>&nbsp;and the corresponding class file is&nbsp;<code>protected/controllers/path/to/XyzController.php</code>. For example, a controller ID&nbsp;<code>admin/user</code>&nbsp;would be mapped to the controller class&nbsp;<code>UserController</code>&nbsp;and the class file<code>protected/controllers/admin/UserController.php</code>. If the class file does not exist, a 404<a href="http://www.yiiframework.com/doc/api/1.1/CHttpException">CHttpException</a>&nbsp;will be raised.</p></li></ul><p>When&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.module">modules</a>&nbsp;are used, the above process is slightly different. In particular, the application will check whether or not the ID refers to a controller inside a module, and if so, the module instance will be created first, followed by the controller instance.</p><h2>3. Action&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.controller#action"></a></h2><p>As previously noted, an action can be defined as a method whose name starts with the word&nbsp;<code>action</code>. A more advanced technique is to define an action class and ask the controller to instantiate it when requested. This allows actions to be reused and thus introduces more reusability.</p><p>To define a new action class, do the following:</p><p></p><div><pre>class UpdateAction extends CAction
			{
			    public function run()
			    {
			        // place the action logic here
			    }
			}</pre><p></p></div><p>To make the controller aware of this action, we override the&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CController#actions">actions()</a>&nbsp;method of our controller class:</p><p></p><div><pre>class PostController extends CController
			{
			    public function actions()
			    {
			        return array(
			            "edit"=&gt;"application.controllers.post.UpdateAction",
			        );
			    }
			}</pre><p></p></div><p>In the above, we use the path alias&nbsp;<code>application.controllers.post.UpdateAction</code>&nbsp;to specify that the action class file is&nbsp;<code>protected/controllers/post/UpdateAction.php</code>.</p><p>By writing class-based actions, we can organize an application in a modular fashion. For example, the following directory structure may be used to organize the code for controllers:</p><pre>protected/
			    controllers/
			        PostController.php
			        UserController.php
			        post/
			            CreateAction.php
			            ReadAction.php
			            UpdateAction.php
			        user/
			            CreateAction.php
			            ListAction.php
			            ProfileAction.php
			            UpdateAction.php
			</pre><h3>Action Parameter Binding</h3><p>Since version 1.1.4, Yii has added support for automatic action parameter binding. That is, a controller action method can define named parameters whose value will be automatically populated from&nbsp;<code>$_GET</code>&nbsp;by Yii.</p><p>To illustrate how this works, let"s assume we need to write a&nbsp;<code>create</code>&nbsp;action for&nbsp;<code>PostController</code>. The action requires two parameters:</p><ul><li><code>category</code>: an integer indicating the category ID under which the new post will be created;</li><li><code>language</code>: a string indicating the language code that the new post will be in.</li></ul><p>We may end up with the following boring code for the purpose of retrieving the needed parameter values from<code>$_GET</code>:</p><p></p><div><pre>class PostController extends CController
				{
					public function actionCreate()
					{
						if(isset($_GET["category"]))
							$category=(int)$_GET["category"];
						else
							throw new CHttpException(404,"invalid request");

						if(isset($_GET["language"]))
							$language=$_GET["language"];
						else
							$language="en";

						// ... fun code starts here ...
					}
				}</pre><p></p></div><p>Now using the action parameter feature, we can achieve our task more pleasantly:</p><p></p><div><pre>class PostController extends CController
				{
					public function actionCreate($category, $language="en")
					{
						$category=(int)$category;

						// ... fun code starts here ...
					}
				}</pre><p></p></div><p>Notice that we add two parameters to the action method&nbsp;<code>actionCreate</code>. The name of these parameters must be exactly the same as the ones we expect from&nbsp;<code>$_GET</code>. The&nbsp;<code>$language</code>&nbsp;parameter takes a default value&nbsp;<code>en</code>&nbsp;in case the request does not include such a parameter. Because&nbsp;<code>$category</code>&nbsp;does not have a default value, if the request does not include a&nbsp;<code>category</code>&nbsp;parameter, a&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CHttpException">CHttpException</a>&nbsp;(error code 400) will be thrown automatically.</p><p>Starting from version 1.1.5, Yii also supports array type detection for action parameters. This is done by PHP type hinting using syntax like the following:</p><p></p><div><pre>class PostController extends CController
				{
					public function actionCreate(array $categories)
					{
						// Yii will make sure that $categories is an array
					}
				}</pre><p></p></div><p>That is, we add the keyword&nbsp;<code>array</code>&nbsp;in front of&nbsp;<code>$categories</code>&nbsp;in the method parameter declaration. By doing so, if&nbsp;<code>$_GET["categories"]</code>&nbsp;is a simple string, it will be converted into an array consisting of that string.</p><blockquote><p><strong>Note:</strong>&nbsp;If a parameter is declared without the&nbsp;<code>array</code>&nbsp;type hint, it means the parameter must be a scalar (i.e., not an array). In this case, passing in an array parameter via&nbsp;<code>$_GET</code>&nbsp;would cause an HTTP exception.</p></blockquote><p>Starting from version 1.1.7, automatic parameter binding also works for class-based actions. When the&nbsp;<code>run()</code>method of an action class is defined with some parameters, they will be populated with the corresponding named request parameter values. For example,</p><p></p><div><pre>class UpdateAction extends CAction
				{
					public function run($id)
					{
						// $id will be populated with $_GET["id"]
					}
				}</pre><p></p></div><h2>4. Filter&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.controller#filter"></a></h2><p>Filter is a piece of code that is configured to be executed before and/or after a controller action executes. For example, an access control filter may be executed to ensure that the user is authenticated before executing the requested action; a performance filter may be used to measure the time spent executing the action.</p><p>An action can have multiple filters. The filters are executed in the order that they appear in the filter list. A filter can prevent the execution of the action and the rest of the unexecuted filters.</p><p>A filter can be defined as a controller class method. The method name must begin with&nbsp;<code>filter</code>. For example, a method named&nbsp;<code>filterAccessControl</code>&nbsp;defines a filter named&nbsp;<code>accessControl</code>. The filter method must have the right signature:</p><p></p><div><pre>public function filterAccessControl($filterChain)
				{
					// call $filterChain-&gt;run() to continue filter and action execution
				}</pre><p></p></div><p>where&nbsp;<code>$filterChain</code>&nbsp;is an instance of&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CFilterChain">CFilterChain</a>&nbsp;which represents the filter list associated with the requested action. Inside a filter method, we can call&nbsp;<code>$filterChain-&gt;run()</code>&nbsp;to continue filter and action execution.</p><p>A filter can also be an instance of&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CFilter">CFilter</a>&nbsp;or its child class. The following code defines a new filter class:</p><p></p><div><pre>class PerformanceFilter extends CFilter
				{
					protected function preFilter($filterChain)
					{
						// logic being applied before the action is executed
						return true; // false if the action should not be executed
					}

					protected function postFilter($filterChain)
					{
						// logic being applied after the action is executed
					}
				}</pre><p></p></div><p>To apply filters to actions, we need to override the&nbsp;<code>CController::filters()</code>&nbsp;method. The method should return an array of filter configurations. For example,</p><p></p><div><pre>class PostController extends CController
				{
				......
					public function filters()
					{
						return array(
							"postOnly + edit, create",
							array(
								"application.filters.PerformanceFilter - edit, create",
								"unit"=&gt;"second",
			            ),
			        );
			    }
				}</pre><p></p></div><p>The above code specifies two filters:&nbsp;<code>postOnly</code>&nbsp;and&nbsp;<code>PerformanceFilter</code>. The&nbsp;<code>postOnly</code>&nbsp;filter is method-based (the corresponding filter method is defined in&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CController">CController</a>&nbsp;already); while the&nbsp;<code>PerformanceFilter</code>&nbsp;filter is object-based. The path alias&nbsp;<code>application.filters.PerformanceFilter</code>&nbsp;specifies that the filter class file is&nbsp;<code>protected/filters/PerformanceFilter</code>. We use an array to configure&nbsp;<code>PerformanceFilter</code>&nbsp;so that it may be used to initialize the property values of the filter object. Here the&nbsp;<code>unit</code>&nbsp;property of&nbsp;<code>PerformanceFilter</code>will be initialized as&nbsp;<code>"second"</code>.</p><p>Using the plus and the minus operators, we can specify which actions the filter should and should not be applied to. In the above, the&nbsp;<code>postOnly</code>&nbsp;filter will be applied to the&nbsp;<code>edit</code>&nbsp;and&nbsp;<code>create</code>&nbsp;actions, while<code>PerformanceFilter</code>&nbsp;filter will be applied to all actions EXCEPT&nbsp;<code>edit</code>&nbsp;and&nbsp;<code>create</code>. If neither plus nor minus appears in the filter configuration, the filter will be applied to all actions.</p><br></p>
			',
			'content_ru' => '
				<p></p><p></p><p><code>Контроллер (controller)</code>&nbsp;— это экземпляр класса&nbsp;<a href="http://www.yiiframework.com/doc/api/CController">CController</a>&nbsp;или унаследованного от него класса. Он создается объектом приложения в случае, когда пользователь его запрашивает. При запуске контроллер выполняет соответствующее действие, что обычно подразумевает создание соответствующих моделей и отображение необходимых представлений. В самом простом случае&nbsp;<code>действие</code>&nbsp;— это метод класса контроллера, название которого начинается на&nbsp;<code>action</code>.</p><p>У контроллера есть действие по умолчанию, которое выполняется в случае, когда пользователь не указывает действие при запросе. По умолчанию это действие называется&nbsp;<code>index</code>. Изменить его можно путём установки значения&nbsp;<a href="http://www.yiiframework.com/doc/api/CController#defaultAction">CController::defaultAction</a>.</p><p>Следующий код определяет контроллер&nbsp;<code>site</code>&nbsp;с действиями&nbsp;<code>index</code>&nbsp;(действие по умолчанию) и&nbsp;<code>contact</code>:</p><p></p><div><pre>class SiteController extends CController
				{
				    public function actionIndex()
				    {
				        // ...
				    }

				    public function actionContact()
				    {
				        // ...
				    }
				}</pre><p></p></div><h2>Маршрут</h2><p>Контроллеры и действия опознаются по их идентификаторам. Идентификатор контроллера — это запись формата&nbsp;<code>path/to/xyz</code>, соответствующая файлу класса контроллера&nbsp;<code>protected/controllers/path/to/XyzController.php</code>, где&nbsp;<code>xyz</code>&nbsp;следует заменить реальным названием класса (например,&nbsp;<code>post</code>&nbsp;соответствует&nbsp;<code>protected/controllers/PostController.php</code>). Идентификатор действия — это название метода без префикса&nbsp;<code>action</code>. Например, если класс контроллера содержит метод&nbsp;<code>actionEdit</code>, то идентификатор соответствующего действия —&nbsp;<code>edit</code>.</p><p>Пользователь обращается к контроллеру и действию посредством маршрута (route). Маршрут формируется путём объединения идентификаторов контроллера и действия, отделенных косой чертой. Например, маршрут&nbsp;<code>post/edit</code>&nbsp;указывает на действие&nbsp;<code>edit</code>контроллера&nbsp;<code>PostController</code>, и по умолчанию URL&nbsp;<code>http://hostname/index.php?r=post/edit</code>&nbsp;приведёт к вызову именно этих контроллера и действия.</p><blockquote><p><strong>Примечание:</strong>&nbsp;По умолчанию маршруты чувствительны к регистру. Это возможно изменить путём установки свойства<a href="http://www.yiiframework.com/doc/api/CUrlManager#caseSensitive">CUrlManager::caseSensitive</a>&nbsp;равным false в конфигурации приложения. В режиме, не чувствительном к регистру, убедитесь, что названия директорий, содержащих файлы классов контроллеров, указаны в нижнем регистре, а также, что&nbsp;<a href="http://www.yiiframework.com/doc/api/CWebApplication#controllerMap">controller map</a>&nbsp;и<a href="http://www.yiiframework.com/doc/api/CController#actions">action map</a>&nbsp;используют ключи в нижнем регистре.</p></blockquote><p>Приложение может содержать&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.module">модули</a>. Маршрут к действию контроллера внутри модуля задаётся в формате<code>moduleID/controllerID/actionID</code>. Более подробно это описано в&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.module">разделе о модулях</a>.</p><h2>Создание экземпляра контроллера</h2><p>Экземпляр контроллера создаётся, когда&nbsp;<a href="http://www.yiiframework.com/doc/api/CWebApplication">CWebApplication</a>&nbsp;обрабатывает входящий запрос. Получив идентификатор контроллера, приложение использует следующие правила для определения класса контроллера и его местоположения:</p><ul><li><p>если установлено свойство&nbsp;<a href="http://www.yiiframework.com/doc/api/CWebApplication#catchAllRequest">CWebApplication::catchAllRequest</a>, контроллер будет создан на основе этого свойства, а контроллер, запрошенный пользователем, будет проигнорирован. Как правило, это используется для установки приложения в режим технического обслуживания и отображения статической страницы с соответствующим сообщением;</p></li><li><p>если идентификатор контроллера обнаружен в&nbsp;<a href="http://www.yiiframework.com/doc/api/CWebApplication#controllerMap">CWebApplication::controllerMap</a>, то для создания экземпляра контроллера будет использована соответствующая конфигурация контроллера;</p></li><li><p>если идентификатор контроллера соответствует формату&nbsp;<code>"path/to/xyz"</code>, то имя класса контроллера определяется как&nbsp;<code>XyzController</code>, а соответствующий класс как&nbsp;<code>protected/controllers/path/to/XyzController.php</code>. Например, идентификатор контроллера&nbsp;<code>admin/user</code>будет соответствовать классу контроллера —&nbsp;<code>UserController</code>&nbsp;и файлу&nbsp;<code>protected/controllers/admin/UserController.php</code>. Если файл не существует, будет сгенерировано исключение&nbsp;<a href="http://www.yiiframework.com/doc/api/CHttpException">CHttpException</a>&nbsp;с кодом ошибки 404.</p></li></ul><p>При использовании&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.module">модулей</a>&nbsp;процесс, описанный выше, будет выглядеть несколько иначе. В частности, приложение проверит, соответствует ли идентификатор контроллеру внутри модуля. Если соответствует, то сначала будет создан экземпляр модуля, а затем экземпляр контроллера.</p><h2>Действие</h2><p>Как было упомянуто выше, действие — это метод, имя которого начинается на&nbsp;<code>action</code>. Более продвинутый способ — создать класс действия и указать контроллеру создавать экземпляр этого класса при необходимости. Такой подход позволяет использовать действия повторно.</p><p>Для создания класса действия необходимо выполнить следующее:</p><p></p><div><pre>class UpdateAction extends CAction
				{
				    public function run()
				    {
				        // некоторая логика действия
				    }
				}</pre><p></p></div><p>Чтобы контроллер знал об этом действии, необходимо переопределить метод&nbsp;<a href="http://www.yiiframework.com/doc/api/CController#actions">actions()</a>&nbsp;в классе контроллера:</p><p></p><div><pre>class PostController extends CController
				{
				    public function actions()
				    {
				        return array(
				            "edit"=&gt;"application.controllers.post.UpdateAction",
				        );
				    }
				}</pre><p></p></div><p>В приведённом коде мы используем псевдоним маршрута&nbsp;<code>application.controllers.post.UpdateAction</code>&nbsp;для указания файла класса действия<code>protected/controllers/post/UpdateAction.php</code>. Создавая действия, основанные на классах, можно организовать приложение в модульном стиле. Например, следующая структура директорий может быть использована для организации кода контроллеров:</p><pre>protected/
				    controllers/
				        PostController.php
				        UserController.php
				        post/
				            CreateAction.php
				            ReadAction.php
				            UpdateAction.php
				        user/
				            CreateAction.php
				            ListAction.php
				            ProfileAction.php
				            UpdateAction.php
				</pre><h3>Привязка параметров действий</h3><p>Начиная с версии 1.1.4, в Yii появилась поддержка автоматической привязки параметров к действиям контроллера. То есть можно задать именованные параметры, в которые автоматически будут попадать соответствующие значения из&nbsp;<code>$_GET</code>.</p><p>Для того чтобы показать, как это работает, предположим, что нам нужно реализовать действие&nbsp;<code>create</code>&nbsp;контроллера&nbsp;<code>PostController</code>. Действие принимает два параметра:</p><ul><li><code>category</code>: ID категории, в которой будет создаваться запись (целое число);</li><li><code>language</code>: строка, содержащая код языка, который будет использоваться в записи.</li></ul><p>Скорее всего, для получения параметров из&nbsp;<code>$_GET</code>&nbsp;в контроллере нам придётся написать следующий скучный код:</p><p></p><div><pre>class PostController extends CController
				{
				    public function actionCreate()
				    {
				        if(isset($_GET["category"]))
				            $category=(int)$_GET["category"];
				        else
				            throw new CHttpException(404,"неверный запрос");

				        if(isset($_GET["language"]))
				            $language=$_GET["language"];
				        else
				            $language="en";

				        // … действительно полезная часть кода …
				    }
				}</pre><p></p></div><p>Используя параметры действий, мы можем получить более приятный код:</p><p></p><div><pre>class PostController extends CController
				{
				    public function actionCreate($category, $language="en")
				    {
				        $category=(int)$category;

				        // … действительно полезная часть кода …
				    }
				}</pre><p></p></div><p>Мы добавляем два параметра методу&nbsp;<code>actionCreate</code>. Имя каждого должно в точности совпадать с одним из ключей в&nbsp;<code>$_GET</code>. Параметру<code>$language</code>&nbsp;задано значение по умолчанию&nbsp;<code>en</code>, которое используется, если в запросе соответствующий параметр отсутствует. Так как<code>$category</code>&nbsp;не имеет значения по умолчанию, в случае отсутствия соответствующего параметра в запросе будет автоматически выброшено исключение&nbsp;<a href="http://www.yiiframework.com/doc/api/CHttpException">CHttpException</a>&nbsp;(с кодом ошибки 400).</p><p>Начиная с версии 1.1.5, Yii поддерживает указание массивов в качестве параметров действий. Использовать их можно следующим образом:</p><p></p><div><pre>class PostController extends CController
				{
				    public function actionCreate(array $categories)
				    {
				        // Yii приведёт $categories к массиву
				    }
				}</pre><p></p></div><p>Мы добавляем ключевое слово&nbsp;<code>array</code>&nbsp;перед параметром&nbsp;<code>$categories</code>. В результате, если параметр&nbsp;<code>$_GET["categories"]</code>&nbsp;является простой строкой, то он будет приведён к массиву, содержащему исходную строку.</p><blockquote><p><strong>Примечание:</strong>&nbsp;Если параметр объявлен без указания типа&nbsp;<code>array</code>, то он должен быть скалярным (т.е. не массивом). В этом случае передача массива через&nbsp;<code>$_GET</code>&nbsp;параметр приведёт к исключению HTTP.</p></blockquote><p>Начиная с версии 1.1.7, автоматическая привязка параметров работает и с действиями, оформленными в виде классов. Если метод&nbsp;<code>run()</code>&nbsp;в классе действия описать с параметрами, то эти параметры наполняются соответствующими значениями из HTTP-запроса:</p><p></p><div><pre>class UpdateAction extends CAction
				{
				    public function run($id)
				    {
				        // $id будет заполнен значением из $_GET["id"]
				    }
				}</pre><p></p></div><h2>Фильтры</h2><p>Фильтр — это часть кода, которая может выполняться до или после выполнения действия контроллера в зависимости от конфигурации. Например, фильтр контроля доступа может проверять, аутентифицирован ли пользователь перед тем, как будет выполнено запрошенное действие. Фильтр, контролирующий производительность, может быть использован для определения времени, затраченного на выполнение действия.</p><p>Действие может иметь множество фильтров. Фильтры запускаются в том порядке, в котором они указаны в списке фильтров, при этом фильтр может предотвратить выполнение действия и следующих за ним фильтров.</p><p>Фильтр может быть определён как метод класса контроллера. Имя метода должно начинаться на&nbsp;<code>filter</code>. Например, метод<code>filterAccessControl</code>&nbsp;определяет фильтр&nbsp;<code>accessControl</code>. Метод фильтра должен выглядеть так:</p><p></p><div><pre>public function filterAccessControl($filterChain)
				{
				    // для выполнения последующих фильтров и выполнения действия вызовите метод $filterChain-&gt;run()
				}</pre><p></p></div><p>где&nbsp;<code>$filterChain</code>&nbsp;— экземпляр класса&nbsp;<a href="http://www.yiiframework.com/doc/api/CFilterChain">CFilterChain</a>, представляющего собой список фильтров, ассоциированных с запрошенным действием. В коде фильтра можно вызвать&nbsp;<code>$filterChain-&gt;run()</code>&nbsp;для того, чтобы продолжить выполнение последующих фильтров и действия.</p><p>Фильтр также может быть экземпляром класса&nbsp;<a href="http://www.yiiframework.com/doc/api/CFilter">CFilter</a>&nbsp;или его производного. Следующий код определяет новый класс фильтра:</p><p></p><div><pre>class PerformanceFilter extends CFilter
				{
				    protected function preFilter($filterChain)
				    {
				        // код, выполняемый до выполнения действия
				        return true; // false — для случая, когда действие не должно быть выполнено
				    }

				    protected function postFilter($filterChain)
				    {
				        // код, выполняемый после выполнения действия
				    }
				}</pre><p></p></div><p>Для того чтобы применить фильтр к действию, необходимо переопределить метод&nbsp;<code>CController::filters()</code>, возвращающий массив конфигураций фильтров. Например:</p><p></p><div><pre>class PostController extends CController
				{
				    …
				    public function filters()
				    {
				        return array(
				            "postOnly + edit, create",
				            array(
				                "application.filters.PerformanceFilter - edit, create",
				                "unit"=&gt;"second",
				            ),
				        );
				    }
				}</pre><p></p></div><p>Данный код определяет два фильтра:&nbsp;<code>postOnly</code>&nbsp;и&nbsp;<code>PerformanceFilter</code>. Фильтр&nbsp;<code>postOnly</code>&nbsp;задан как метод (соответствующий метод уже определен в&nbsp;<a href="http://www.yiiframework.com/doc/api/CController">CController</a>), в то время как&nbsp;<code>PerformanceFilter</code>&nbsp;— фильтр на базе класса. Псевдоним&nbsp;<code>application.filters.PerformanceFilter</code>указывает на файл класса фильтра —&nbsp;<code>protected/filters/PerformanceFilter</code>. Для конфигурации&nbsp;<code>PerformanceFilter</code>&nbsp;используется массив, что позволяет задать начальные значения свойств фильтра. В данном случае свойство&nbsp;<code>unit</code>&nbsp;фильтра&nbsp;<code>PerformanceFilter</code>&nbsp;будет инициализировано значением&nbsp;<code>"second"</code>.</p><p>Используя операторы&nbsp;<code>"+"</code>&nbsp;и&nbsp;<code>"-"</code>&nbsp;можно указать, к каким действиям должен и не должен быть применён фильтр. В приведённом примере<code>postOnly</code>&nbsp;будет применён к действиям&nbsp;<code>edit</code>&nbsp;и&nbsp;<code>create</code>, а&nbsp;<code>PerformanceFilter</code>&nbsp;— ко всем действиям,&nbsp;<em>кроме</em>&nbsp;<code>edit</code>&nbsp;и&nbsp;<code>create</code>. Если операторы<code>"+"</code>&nbsp;и&nbsp;<code>"-"</code>&nbsp;не указаны, фильтр будет применён ко всем действиям.</p><br><p></p>
			',
		));
		$this->insert('tbl_page', array(
			'title_en'  => 'Model',
			'title_ru'  => 'Модель',
			'slug'      => 'model',
			'visibility' => 1,
			'date_created' => date('Y-m-d'),
			'date_updated' => date('Y-m-d'),
			'category_id' => $category->id,
			'preview_en' => '
				A model is an instance of CModel or a class that extends CModel. Models are used to keep data and their relevant business rules.
			',
			'preview_ru' => '
				Модель (model) — это экземпляр класса CModel или класса, унаследованного от него. Модель используется для хранения данных и применимых к ним бизнес-правил.
			',
			'content_en' => '
				<p><p>A model is an instance of&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CModel">CModel</a>&nbsp;or a class that extends&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CModel">CModel</a>. Models are used to keep data and their relevant business rules.</p><p>A model represents a single data object. It could be a row in a database table or an html form with user input fields. Each field of the data object is represented by an attribute of the model. The attribute has a label and can be validated against a set of rules.</p><p>Yii implements two kinds of models: Form models and active records. They both extend from the same base class,&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CModel">CModel</a>.</p><p>A form model is an instance of&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CFormModel">CFormModel</a>. Form models are used to store data collected from user input. Such data is often collected, used and then discarded. For example, on a login page, we can use a form model to represent the username and password information that is provided by an end user. For more details, please refer to&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/form.overview">Working with Forms</a></p><p>Active Record (AR) is a design pattern used to abstract database access in an object-oriented fashion. Each AR object is an instance of&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CActiveRecord">CActiveRecord</a>&nbsp;or of a subclass of that class, representing a single row in a database table. The fields in the row are represented as properties of the AR object. Details about AR can be found in&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/database.ar">Active Record</a>.</p><br></p>
			',
			'content_ru' => '
				<p></p><p></p><p>Модель (model) — это экземпляр класса&nbsp;<a href="http://www.yiiframework.com/doc/api/CModel">CModel</a>&nbsp;или класса, унаследованного от него. Модель используется для хранения данных и применимых к ним бизнес-правил.</p><p>Модель представляет собой отдельный объект данных. Это может быть запись таблицы базы данных или HTML-форма с полями для ввода данных. Каждое поле объекта данных представляется атрибутом модели. Каждый атрибут имеет текстовую метку и может быть проверен на корректность, используя набор правил.</p><p>Yii предоставляет два типа моделей: модель формы и Active Record. Оба типа являются наследниками базового класса&nbsp;<a href="http://www.yiiframework.com/doc/api/CModel">CModel</a>.</p><p>Модель формы — это экземпляр класса&nbsp;<a href="http://www.yiiframework.com/doc/api/CFormModel">CFormModel</a>. Она используется для хранения данных, введённых пользователем. Как правило, мы получаем эти данные, обрабатываем, а затем избавляемся от них. Например, на странице авторизации модель такого типа может быть использована для представления информации об имени пользователя и пароле. Подробное описание работы с формами приведено в разделе&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/form.overview">Работа с формами</a>.</p><p>Active Record (AR) — это шаблон проектирования, используемый для абстрагирования доступа к базе данных в объектно-ориентированной форме. Каждый объект AR является экземпляром класса&nbsp;<a href="http://www.yiiframework.com/doc/api/CActiveRecord">CActiveRecord</a>&nbsp;или класса, унаследованного от него, и представляет отдельную строку в таблице базы данных. Поля этой строки соответствуют свойствам AR-объекта. Подробнее с AR-моделью можно ознакомиться в разделе&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/database.ar">Active Record</a>.</p><br><p></p>
			',
		));
		$this->insert('tbl_page', array(
			'title_en'  => 'View',
			'title_ru'  => 'Представление',
			'slug'      => 'view',
			'visibility' => 1,
			'date_created' => date('Y-m-d'),
			'date_updated' => date('Y-m-d'),
			'category_id' => $category->id,
			'content_en' => '
				<p></p><p></p><p></p><p>A view is a PHP script consisting mainly of user interface elements. It can contain PHP statements, but it is recommended that these statements should not alter data models and should remain relatively simple. In the spirit of separating of logic and presentation, large chunks of logic should be placed in controllers or models rather than in views.</p><p>A view has a name which is used to identify the view script file when rendering. The name of a view is the same as the name of its view script. For example, the view name&nbsp;<code>edit</code>&nbsp;refers to a view script named&nbsp;<code>edit.php</code>. To render a view, call&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CController#render">CController::render()</a>&nbsp;with the name of the view. The method will look for the corresponding view file under the directory&nbsp;<code>protected/views/ControllerID</code>.</p><p>Inside the view script, we can access the controller instance using&nbsp;<code>$this</code>. We can thus&nbsp;<code>pull</code>&nbsp;in any property of the controller by evaluating&nbsp;<code>$this-&gt;propertyName</code>&nbsp;in the view.</p><p>We can also use the following&nbsp;<code>push</code>&nbsp;approach to pass data to the view:</p><p></p><div><pre>$this-&gt;render("edit", array(
			    "var1"=&gt;$value1,
			    "var2"=&gt;$value2,
			));</pre><p></p></div><p>In the above, the&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CController#render">render()</a>&nbsp;method will extract the second array parameter into variables. As a result, in the view script we can access the local variables&nbsp;<code>$var1</code>&nbsp;and&nbsp;<code>$var2</code>.</p><h2>1. Layout&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.view#layout"></a></h2><p>Layout is a special view that is used to decorate views. It usually contains parts of a user interface that are common among several views. For example, a layout may contain a header and a footer, and embed the view in between, like this:</p><p></p><div><pre>......header here......
			&lt;?php echo $content; ?&gt;
			......footer here......</pre><p></p></div><p>where&nbsp;<code>$content</code>&nbsp;stores the rendering result of the view.</p><p>Layout is implicitly applied when calling&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CController#render">render()</a>. By default, the view script<code>protected/views/layouts/main.php</code>&nbsp;is used as the layout. This can be customized by changing either<a href="http://www.yiiframework.com/doc/api/1.1/CWebApplication#layout">CWebApplication::layout</a>&nbsp;or&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CController#layout">CController::layout</a>. To render a view without applying any layout, call<a href="http://www.yiiframework.com/doc/api/1.1/CController#renderPartial">renderPartial()</a>&nbsp;instead.</p><h2>2. Widget&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.view#widget"></a></h2><p>A widget is an instance of&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CWidget">CWidget</a>&nbsp;or a child class of&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CWidget">CWidget</a>. It is a component that is mainly for presentational purposes. A widget is usually embedded in a view script to generate a complex, yet self-contained user interface. For example, a calendar widget can be used to render a complex calendar user interface. Widgets facilitate better reusability in user interface code.</p><p>To use a widget, do as follows in a view script:</p><p></p><div><pre>&lt;?php $this-&gt;beginWidget("path.to.WidgetClass"); ?&gt;
			...body content that may be captured by the widget...
			&lt;?php $this-&gt;endWidget(); ?&gt;</pre><p></p></div><p>or</p><p></p><div><pre>&lt;?php $this-&gt;widget("path.to.WidgetClass"); ?&gt;</pre><p></p></div><p>The latter is used when the widget does not need any body content.</p><p>Widgets can be configured to customize their behavior. This is done by setting their initial property values when calling&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CBaseController#beginWidget">CBaseController::beginWidget</a>&nbsp;or&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CBaseController#widget">CBaseController::widget</a>. For example, when using a<a href="http://www.yiiframework.com/doc/api/1.1/CMaskedTextField">CMaskedTextField</a>&nbsp;widget, we might like to specify the mask being used. We can do so by passing an array of initial property values as follows, where the array keys are property names and array values are the initial values of the corresponding widget properties:</p><p></p><div><pre>&lt;?php
			$this-&gt;widget("CMaskedTextField",array(
			    "mask"=&gt;"99/99/9999"
			));
			?&gt;</pre><p></p></div><p>To define a new widget, extend&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CWidget">CWidget</a>&nbsp;and override its&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CWidget#init">init()</a>&nbsp;and&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CWidget#run">run()</a>&nbsp;methods:</p><p></p><div><pre>class MyWidget extends CWidget
			{
			    public function init()
			    {
			        // this method is called by CController::beginWidget()
			    }

			    public function run()
			    {
			        // this method is called by CController::endWidget()
			    }
			}</pre><p></p></div><p>Like a controller, a widget can also have its own view. By default, widget view files are located under the&nbsp;<code>views</code>subdirectory of the directory containing the widget class file. These views can be rendered by calling<a href="http://www.yiiframework.com/doc/api/1.1/CWidget#render">CWidget::render()</a>, similar to that in controller. The only difference is that no layout will be applied to a widget view. Also,&nbsp;<code>$this</code>&nbsp;in the view refers to the widget instance instead of the controller instance.</p><blockquote><p><strong>Tip:</strong>&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CWidgetFactory#widgets">CWidgetFactory::widgets</a>&nbsp;can be used to configure widgets on a site-wide basis, allowing much easier base configuration. You can find more details on the&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/topics.theming#customizing-widgets-globally">theming page</a></p></blockquote><h2>3. System View&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.view#system-view"></a></h2><p>System views refer to the views used by Yii to display error and logging information. For example, when a user requests for a non-existing controller or action, Yii will throw an exception explaining the error. Yii displays the exception using a specific system view.</p><p>The naming of system views follows some rules. Names like&nbsp;<code>errorXXX</code>&nbsp;refer to views for displaying<a href="http://www.yiiframework.com/doc/api/1.1/CHttpException">CHttpException</a>&nbsp;with error code&nbsp;<code>XXX</code>. For example, if&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CHttpException">CHttpException</a>&nbsp;is raised with error code 404, the<code>error404</code>&nbsp;view will be displayed.</p><p>Yii provides a set of default system views located under&nbsp;<code>framework/views</code>. They can be customized by creating the same-named view files under&nbsp;<code>protected/views/system</code>.</p><br><p></p>
			',
			'content_ru' => '
				<p></p><p></p><p></p><p></p><p>Представление — это PHP-скрипт, состоящий преимущественно из элементов пользовательского интерфейса. Он может включать выражения PHP, однако рекомендуется, чтобы эти выражения не изменяли данные и оставались относительно простыми. Следуя концепции разделения логики и представления, большая часть кода логики должна быть помещена в контроллер или модель, а не в скрипт представления.</p><p>У представления есть имя, которое используется, чтобы идентифицировать файл скрипта представления в процессе рендеринга. Имя представления должно совпадать с названием файла представления. К примеру, для представления&nbsp;<code>edit</code>&nbsp;соответствующий файл скрипта должен называться&nbsp;<code>edit.php</code>. Чтобы отобразить представление, необходимо вызвать метод&nbsp;<a href="http://www.yiiframework.com/doc/api/CController#render">CController::render()</a>, указав имя представления. При этом метод попытается найти соответствующий файл в директории&nbsp;<code>protected/views/ControllerID</code>.</p><p>Внутри скрипта представления экземпляр контроллера доступен через&nbsp;<code>$this</code>. Таким образом, мы можем обратиться к свойству контроллера из кода представления:&nbsp;<code>$this-&gt;propertyName</code>.</p><p>Кроме того, мы можем использовать следующий способ для передачи данных представлению:</p><p></p><div><pre>$this-&gt;render("edit", array(
				    "var1"=&gt;$value1,
				    "var2"=&gt;$value2,
				));</pre><p></p></div><p>В приведённом коде метод&nbsp;<a href="http://www.yiiframework.com/doc/api/CController#render">render()</a>&nbsp;преобразует второй параметр — массив — в переменные. Как результат, внутри представления будут доступны локальные переменные&nbsp;<code>$var1</code>&nbsp;и&nbsp;<code>$var2</code>.</p><h2>Макет</h2><p>Макет (layout) — это специальное представление для декорирования других представлений. Макет обычно содержит части пользовательского интерфейса, общие для нескольких представлений. Например, макет может содержать верхнюю и нижнюю части страницы, заключая между ними содержание другого представления:</p><p></p><div><pre>…здесь верхняя часть…
				&lt;?php echo $content; ?&gt;
				…здесь нижняя…</pre><p></p></div><p>Здесь&nbsp;<code>$content</code>&nbsp;хранит результат рендеринга представления.</p><p>Макет применяется неявно при вызове метода&nbsp;<a href="http://www.yiiframework.com/doc/api/CController#render">render()</a>. По умолчанию в качестве макета используется представление<code>protected/views/layouts/main.php</code>. Его можно изменить путём установки значений&nbsp;<a href="http://www.yiiframework.com/doc/api/CWebApplication#layout">CWebApplication::layout</a>&nbsp;или&nbsp;<a href="http://www.yiiframework.com/doc/api/CController#layout">CController::layout</a>. Для рендеринга представления без применения макета необходимо вызвать&nbsp;<a href="http://www.yiiframework.com/doc/api/CController#renderPartial">renderPartial()</a>.</p><h2>Виджет</h2><p>Виджет (widget) — это экземпляр класса&nbsp;<a href="http://www.yiiframework.com/doc/api/CWidget">CWidget</a>&nbsp;или унаследованного от него. Это компонент, применяемый, в основном, с целью оформления. Виджеты обычно встраиваются в представления для формирования некоторой сложной, но в то же время самостоятельной части пользовательского интерфейса. К примеру, виджет календаря может быть использован для рендеринга сложного интерфейса календаря. Виджеты позволяют повторно использовать код пользовательского интерфейса.</p><p>Для подключения виджета необходимо выполнить в коде:</p><p></p><div><pre>&lt;?php $this-&gt;beginWidget("path.to.WidgetClass"); ?&gt;
				…некое содержимое, которое может быть использовано виджетом…
				&lt;?php $this-&gt;endWidget(); ?&gt;</pre><p></p></div><p>или</p><p></p><div><pre>&lt;?php $this-&gt;widget("path.to.WidgetClass"); ?&gt;</pre><p></p></div><p>Последний вариант используется, когда виджет не имеет внутреннего содержимого.</p><p>Изменить поведение виджета можно путём установки начальных значений его свойств при вызове&nbsp;<a href="http://www.yiiframework.com/doc/api/CBaseController#beginWidget">CBaseController::beginWidget</a>&nbsp;или<a href="http://www.yiiframework.com/doc/api/CBaseController#widget">CBaseController::widget</a>. Например, при использовании виджета&nbsp;<a href="http://www.yiiframework.com/doc/api/CMaskedTextField">CMaskedTextField</a>&nbsp;можно указать используемую маску, передав массив начальных значений свойств как показано ниже, где ключи массива являются именами свойств, а значения — начальными значениями соответствующих им свойств виджета:</p><p></p><div><pre>&lt;?php
				$this-&gt;widget("CMaskedTextField",array(
				    "mask"=&gt;"99/99/9999"
				));
				?&gt;</pre><p></p></div><p>Чтобы создать новый виджет, необходимо расширить класс&nbsp;<a href="http://www.yiiframework.com/doc/api/CWidget">CWidget</a>&nbsp;и переопределить его методы&nbsp;<a href="http://www.yiiframework.com/doc/api/CWidget#init">init()</a>&nbsp;и&nbsp;<a href="http://www.yiiframework.com/doc/api/CWidget#run">run()</a>:</p><p></p><div><pre>class MyWidget extends CWidget
				{
				    public function init()
				    {
				        // этот метод будет вызван внутри CBaseController::beginWidget()
				    }

				    public function run()
				    {
				        // этот метод будет вызван внутри CBaseController::endWidget()
				    }
				}</pre><p></p></div><p>Как и у контроллера, у виджета может быть собственное представление. По умолчанию файлы представлений виджета находятся в поддиректории&nbsp;<code>views</code>&nbsp;директории, содержащей файл класса виджета. Эти представления можно рендерить при помощи вызова<a href="http://www.yiiframework.com/doc/api/CWidget#render">CWidget::render()</a>&nbsp;точно так же, как и в случае с контроллером. Единственное отличие состоит в том, что для представления виджета не используются макеты. Также следует отметить, что&nbsp;<code>$this</code>&nbsp;в представлении указывает на экземпляр виджета, а не на экземпляр контроллера.</p><blockquote><p><strong>Подсказка:</strong>&nbsp;свойство&nbsp;<a href="http://www.yiiframework.com/doc/api/CWidgetFactory#widgets">CWidgetFactory::widgets</a>&nbsp;может быть использовано для настройки умолчаний для отдельных виджетов во всём приложении. Подробнее об этом можно прочитать в разделе «<a href="http://yiiframework.com.ua/ru/doc/guide/topics.theming">Темы оформления, глобальная настройка виджетов</a>».</p></blockquote><h2>Системные представления</h2><p>Системные представления относятся к представлениям, используемым Yii для отображения ошибок и информации лога. Например, когда пользователь запрашивает несуществующий контроллер или действие, Yii генерирует исключение, раскрывающее суть ошибки. Такое исключение будет отображено с помощью системного представления.</p><p>Именование системных представлений подчиняется некоторым правилам. Имена типа&nbsp;<code>errorXXX</code>&nbsp;относятся к представлениям, служащим для отображения исключений&nbsp;<a href="http://www.yiiframework.com/doc/api/CHttpException">CHttpException</a>&nbsp;с кодом ошибки&nbsp;<code>XXX</code>. Например, если исключение&nbsp;<a href="http://www.yiiframework.com/doc/api/CHttpException">CHttpException</a>&nbsp;сгенерировано с кодом ошибки 404, будет использовано представление&nbsp;<code>error404</code>.</p><p>Yii предоставляет стандартный набор системных представлений, расположенных в&nbsp;<code>framework/views</code>. Их можно изменить, создав файлы представлений с теми же названиями в директории&nbsp;<code>protected/views/system</code>.</p><br><p></p>
			',
		));
		$this->insert('tbl_page', array(
			'title_en'  => 'Component',
			'title_ru'  => 'Компонент',
			'slug'      => 'component',
			'visibility' => 1,
			'date_created' => date('Y-m-d'),
			'date_updated' => date('Y-m-d'),
			'category_id' => $category->id,
			'preview_en' => '
				Yii applications are built upon components which are objects written to a specification. A component is an instance of CComponent or its derived class.
			',
			'preview_ru' => '
				Yii-приложения состоят из компонентов–объектов, созданных согласно спецификациям. Компонент (component) — это экземпляр класса CComponent или производного от него.
			',
			'content_en' => '
				<p></p><p></p><p></p><p></p><p></p><p>Yii applications are built upon components which are objects written to a specification. A component is an instance of&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CComponent">CComponent</a>&nbsp;or its derived class. Using a component mainly involves accessing its properties and raising/handling its events. The base class&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CComponent">CComponent</a>&nbsp;specifies how to define properties and events.</p><h2>1. Component Property&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.component#component-property"></a></h2><p>A component property is like an object"s public member variable. We can read its value or assign a value to it. For example,</p><p></p><div><pre>$width=$component-&gt;textWidth;     // get the textWidth property
				$component-&gt;enableCaching=true;   // set the enableCaching property</pre><p></p></div><p>To define a component property, we can simply declare a public member variable in the component class. A more flexible way, however, is by defining getter and setter methods like the following:</p><p></p><div><pre>public function getTextWidth()
				{
					return $this-&gt;_textWidth;
				}

				public function setTextWidth($value)
					{
						$this-&gt;_textWidth=$value;
				}</pre><p></p></div><p>The above code defines a writable property named&nbsp;<code>textWidth</code>&nbsp;(the name is case-insensitive). When reading the property,&nbsp;<code>getTextWidth()</code>&nbsp;is invoked and its returned value becomes the property value; Similarly, when writing the property,&nbsp;<code>setTextWidth()</code>&nbsp;is invoked. If the setter method is not defined, the property would be read-only and writing it would throw an exception. Using getter and setter methods to define a property has the benefit that additional logic (e.g. performing validation, raising events) can be executed when reading and writing the property.</p><blockquote><p><strong>Note:</strong>&nbsp;There is a slight difference between a property defined via getter/setter methods and a class member variable. The name of the former is case-insensitive while the latter is case-sensitive.</p></blockquote><h2>2. Component Event&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.component#component-event"></a></h2><p>Component events are special properties that take methods (called&nbsp;<code>event handlers</code>) as their values. Attaching (assigning) a method to an event will cause the method to be invoked automatically at the places where the event is raised. Therefore, the behavior of a component can be modified in a way that may not be foreseen during the development of the component.</p><p>A component event is defined by defining a method whose name starts with&nbsp;<code>on</code>. Like property names defined via getter/setter methods, event names are case-insensitive. The following code defines an&nbsp;<code>onClicked</code>&nbsp;event:</p><p></p><div><pre>public function onClicked($event)
					{
						$this-&gt;raiseEvent("onClicked", $event);
				}</pre><p></p></div><p>where&nbsp;<code>$event</code>&nbsp;is an instance of&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CEvent">CEvent</a>&nbsp;or its child class representing the event parameter.</p><p>We can attach a method to this event as follows:</p><p></p><div><pre>$component-&gt;onClicked=$callback;</pre><p></p></div><p>where&nbsp;<code>$callback</code>&nbsp;refers to a valid PHP callback. It can be a global function or a class method. If the latter, the callback must be given as an array:&nbsp;<code>array($object,"methodName")</code>.</p><p>The signature of an event handler must be as follows:</p><p></p><div><pre>function methodName($event)
					{
						......
					}</pre><p></p></div><p>where&nbsp;<code>$event</code>&nbsp;is the parameter describing the event (it originates from the&nbsp;<code>raiseEvent()</code>&nbsp;call). The&nbsp;<code>$event</code>parameter is an instance of&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CEvent">CEvent</a>&nbsp;or its derived class. At the minimum, it contains the information about who raises the event.</p><p>An event handler can also be an anonymous function which is supported by PHP 5.3 or above. For example,</p><p></p><div><pre>$component-&gt;onClicked=function($event) {
						......
					}</pre><p></p></div><p>If we call&nbsp;<code>onClicked()</code>&nbsp;now, the&nbsp;<code>onClicked</code>&nbsp;event will be raised (inside&nbsp;<code>onClicked()</code>), and the attached event handler will be invoked automatically.</p><p>An event can be attached with multiple handlers. When the event is raised, the handlers will be invoked in the order that they are attached to the event. If a handler decides to prevent the rest handlers from being invoked, it can set&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CEvent#handled">$event-&gt;handled</a>&nbsp;to be true.</p><h2>3. Component Behavior&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.component#component-behavior"></a></h2><p>A component supports the&nbsp;<a href="http://en.wikipedia.org/wiki/Mixin">mixin</a>&nbsp;pattern and can be attached with one or several behaviors. A&nbsp;<em>behavior</em>&nbsp;is an object whose methods can be "inherited" by its attached component through the means of collecting functionality instead of specialization (i.e., normal class inheritance). A component can be attached with several behaviors and thus achieve "multiple inheritance".</p><p>Behavior classes must implement the&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/IBehavior">IBehavior</a>&nbsp;interface. Most behaviors can extend from the&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CBehavior">CBehavior</a>&nbsp;base class. If a behavior needs to be attached to a&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.model">model</a>, it may also extend from&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CModelBehavior">CModelBehavior</a>&nbsp;or<a href="http://www.yiiframework.com/doc/api/1.1/CActiveRecordBehavior">CActiveRecordBehavior</a>&nbsp;which implements additional features specifc for models.</p><p>To use a behavior, it must be attached to a component first by calling the behavior"s&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/IBehavior#attach">attach()</a>&nbsp;method. Then we can call a behavior method via the component:</p><p></p><div><pre>// $name uniquely identifies the behavior in the component
				$component-&gt;attachBehavior($name,$behavior);
				// test() is a method of $behavior
				$component-&gt;test();</pre><p></p></div><p>An attached behavior can be accessed like a normal property of the component. For example, if a behavior named&nbsp;<code>tree</code>&nbsp;is attached to a component, we can obtain the reference to this behavior object using:</p><p></p><div><pre>$behavior=$component-&gt;tree;
				// equivalent to the following:
				// $behavior=$component-&gt;asa("tree");</pre><p></p></div><p>A behavior can be temporarily disabled so that its methods are not available via the component. For example,</p><p></p><div><pre>$component-&gt;disableBehavior($name);
				// the following statement will throw an exception
				$component-&gt;test();
				$component-&gt;enableBehavior($name);
				// it works now
				$component-&gt;test();</pre><p></p></div><p>It is possible that two behaviors attached to the same component have methods of the same name. In this case, the method of the first attached behavior will take precedence.</p><p>When used together with&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.component#component-event">events</a>, behaviors are even more powerful. A behavior, when being attached to a component, can attach some of its methods to some events of the component. By doing so, the behavior gets a chance to observe or change the normal execution flow of the component.</p><p>A behavior"s properties can also be accessed via the component it is attached to. The properties include both the public member variables and the properties defined via getters and/or setters of the behavior. For example, if a behavior has a property named&nbsp;<code>xyz</code>&nbsp;and the behavior is attached to a component&nbsp;<code>$a</code>. Then we can use the expression&nbsp;<code>$a-&gt;xyz</code>&nbsp;to access the behavior"s property.</p><br><p></p>
			',
			'content_ru' => '
				<p></p><p></p><p></p><p></p><p></p><p></p><p>Yii-приложения состоят из компонентов–объектов, созданных согласно спецификациям. Компонент (component) — это экземпляр класса<a href="http://www.yiiframework.com/doc/api/CComponent">CComponent</a>&nbsp;или производного от него. Использование компонента, как правило, включает доступ к его свойствам, а также вызов и обработку его событий. Базовый класс&nbsp;<a href="http://www.yiiframework.com/doc/api/CComponent">CComponent</a>&nbsp;устанавливает правила, согласно которым определяются свойства и события.</p><h2>Объявление и использование свойства компонента</h2><p>Свойство компонента схоже с открытой переменной-членом класса (public member variable). Мы можем читать или устанавливать его значение. Например:</p><p></p><div><pre>$width=$component-&gt;textWidth; // получаем значение свойства textWidth
				$component-&gt;enableCaching=true; // устанавливаем значение свойства enableCaching</pre><p></p></div><p>Существует два разных способа определения свойства компонента. Первым способом является обычное объявление открытой переменной-члена класса компонента так, как показано ниже:</p><p></p><div><pre>class Document extends CComponent
				{
				    public $textWidth;
				}</pre><p></p></div><p>Другим способом является использование геттеров и сеттеров. Это более гибкий подход потому как помимо обычных свойств вы можете объявлять и свойства, доступные только для чтения или только для записи.</p><p></p><div><pre>class Document extends CComponent
				{
				    private $_textWidth;
				    protected $_completed=false;

				    public function getTextWidth()
				    {
				        return $this-&gt;_textWidth;
				    }

				    public function setTextWidth($value)
				    {
				        $this-&gt;_textWidth=$value;
				    }

				    public function getTextHeight()
				    {
				        // вычисляет и возвращает высоту текста
				    }

				    public function setCompleted($value)
				    {
				        $this-&gt;_completed=$value;
				    }
				}</pre><p></p></div><p>Компонент выше может быть использован следующим образом:</p><p></p><div><pre>$document=new Document();

				// мы можем как писать в, так и читать из textWidth
				$document-&gt;textWidth=100;
				echo $document-&gt;textWidth;

				// значение textHeight мы можем только получать
				echo $document-&gt;textHeight;

				// значение completed мы можем только изменять
				$document-&gt;completed=true;</pre><p></p></div><p>При чтении свойства, которое не было объявлено публичным членом класса, Yii пытается использовать методы-геттеры, т.е. для&nbsp;<code>textWidth</code>методом-геттером будет&nbsp;<code>getTextWidth</code>. Тоже самое происходит и при изменении свойства, которое не было объявлено публичным членом класса.</p><p>Если существует метод-геттер, но метода-сеттера при этом объявлено не было, то свойство компонента можно использовать только для чтения, в противном случае будет вызвано исключение. Обратное верно и для свойств, доступных только для изменения.</p><p>Использование методов чтения и записи имеет дополнительное преимущество: при чтении или записи значения свойства могут быть выполнены дополнительные действия (такие как проверка на корректность, вызов события и др.).</p><blockquote><p><strong>Примечание:</strong>&nbsp;Есть небольшая разница в определении свойства через методы и через простое объявление переменной. В первом случае имя свойства не чувствительно к регистру, во втором — чувствительно.</p></blockquote><h2>События компонента</h2><p>События компонента — это специальные свойства, в качестве значений которых выступают методы (называемые обработчиками событий). Назначение метода событию приведет к тому, что метод будет вызван автоматически при возникновении этого события. Поэтому поведение компонента может быть изменено совершенно отлично от закладываемого при разработке.</p><p>Событие компонента объявляется путём создания метода с именем, начинающимся на&nbsp;<code>on</code>. Так же как и имена свойств, заданных через методы чтения и записи, имена событий не чувствительны к регистру. Следующий код объявляет событие&nbsp;<code>onClicked</code>:</p><p></p><div><pre>public function onClicked($event)
				{
				    $this-&gt;raiseEvent("onClicked", $event);
				}</pre><p></p></div><p>где&nbsp;<code>$event</code>&nbsp;— это экземпляр класса&nbsp;<a href="http://www.yiiframework.com/doc/api/CEvent">CEvent</a>&nbsp;или производного от него, представляющего параметр события. К событию можно подключить обработчик как показано ниже:</p><p></p><div><pre>$component-&gt;onClicked=$callback;</pre><p></p></div><p>где&nbsp;<code>$callback</code>&nbsp;— это корректный callback-вызов PHP (см. PHP-функцию call_user_func). Это может быть либо глобальная функция, либо метод класса. В последнем случае вызову должен передаваться массив:&nbsp;<code>array($object,"methodName")</code>.</p><p>Обработчик события должен быть определён следующим образом:</p><p></p><div><pre>function methodName($event)
				{
				    …
				}</pre><p></p></div><p>где&nbsp;<code>$event</code>&nbsp;— это параметр, описывающий событие (передаётся методом&nbsp;<code>raiseEvent()</code>). Параметр&nbsp;<code>$event</code>&nbsp;— это экземпляр класса&nbsp;<a href="http://www.yiiframework.com/doc/api/CEvent">CEvent</a>или его производного. Как минимум, он содержит информацию о том, кто вызвал событие.</p><p>Обработчик события может быть анонимной функцией, требующей наличия версии PHP 5.3+. Например,</p><p></p><div><pre>$component-&gt;onClicked=function($event) {
				    …
				}</pre><p></p></div><p>Если теперь использовать метод&nbsp;<code>onClicked()</code>, то в нём будет вызвано событие&nbsp;<code>onClicked</code>. Назначенный ему обработчик будет запущен автоматически.</p><p>Событию могут быть назначены несколько обработчиков. При возникновении события обработчики будут вызваны в порядке их назначения. Если в обработчике необходимо предотвратить вызов последующих обработчиков, необходимо установить&nbsp;<a href="http://www.yiiframework.com/doc/api/CEvent#handled">$event-&gt;handled</a>&nbsp;в<code>true</code>.</p><h2>Поведения компонента</h2><p>Для компонентов реализован шаблон проектирования&nbsp;<a href="http://ru.wikipedia.org/wiki/%D0%9F%D1%80%D0%B8%D0%BC%D0%B5%D1%81%D1%8C_(%D0%BF%D1%80%D0%BE%D0%B3%D1%80%D0%B0%D0%BC%D0%BC%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5)">mixin</a>, что позволяет присоединить к ним одно или несколько поведений.&nbsp;<em>Поведение</em>— объект, чьи методы «наследуются» компонентом, к которому он присоединён. Под «наследованием» здесь понимается наращивание функционала, а не наследование в классическом смысле. К компоненту можно прикрепить несколько поведений и, таким образом, получить аналог множественного наследования.</p><p>Поведения классов должны реализовывать интерфейс&nbsp;<a href="http://www.yiiframework.com/doc/api/IBehavior">IBehavior</a>. Большинство поведений могут быть созданы путём расширения базового класса&nbsp;<a href="http://www.yiiframework.com/doc/api/CBehavior">CBehavior</a>. В случае если поведение необходимо прикрепить к&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.model">модели</a>, его можно создать на основе класса&nbsp;<a href="http://www.yiiframework.com/doc/api/CModelBehavior">CModelBehavior</a>&nbsp;или класса<a href="http://www.yiiframework.com/doc/api/CActiveRecordBehavior">CActiveRecordBehavior</a>, которые реализуют дополнительные, специфические для моделей, возможности.</p><p>Чтобы использовать поведение, его необходимо прикрепить к компоненту путём вызова метода поведения&nbsp;<a href="http://www.yiiframework.com/doc/api/IBehavior#attach">attach()</a>. После этого мы можем вызывать методы поведения через компонент:</p><p></p><div><pre>// $name уникально идентифицирует поведения в компоненте
				$component-&gt;attachBehavior($name,$behavior);
				// test() является методом $behavior
				$component-&gt;test();</pre><p></p></div><p>К прикреплённому поведению можно обращаться как к обычному свойству компонента. Например, если поведение с именем&nbsp;<code>tree</code>прикреплено к компоненту, мы можем получить ссылку на объект поведения следующим образом:</p><p></p><div><pre>$behavior=$component-&gt;tree;
				// эквивалентно выражению:
				// $behavior=$component-&gt;asa("tree");</pre><p></p></div><p>Поведение можно временно деактивировать, чтобы его методы и свойства были недоступны через компонент. Например:</p><p></p><div><pre>$component-&gt;disableBehavior($name);
				// выражение ниже приведет к вызову исключения
				$component-&gt;test();
				$component-&gt;enableBehavior($name);
				// здесь все будет работать нормально
				$component-&gt;test();</pre><p></p></div><p>В случае когда два поведения, прикреплённые к одному компоненту, имеют методы с одинаковыми именами, преимущество будет иметь метод поведения, прикреплённого раньше.</p><p>Использование поведений совместно с&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.component#component-event">событиями</a>&nbsp;даёт дополнительные возможности. Поведение, прикреплённое к компоненту, может назначать некоторые свои методы в качестве обработчиков событий компонента. В этом случае поведение получает возможность следить за ходом работы компонента и даже изменять его.</p><p>Свойства поведения также доступны из компонента, к которому оно присоединено. Свойства включают в себя как открытые поля класса поведения, так и его методы чтения/записи (getters/setters). Например, если поведение имеет свойство с именем&nbsp;<code>xyz</code>&nbsp;и привязано к компоненту&nbsp;<code>$a</code>, то мы можем использовать выражение&nbsp;<code>$a-&gt;xyz</code>&nbsp;для доступа к этому свойству.</p><br><p></p>
			',
		));
		$this->insert('tbl_page', array(
			'title_en'  => 'Module',
			'title_ru'  => 'Модуль',
			'slug'      => 'module',
			'visibility' => 1,
			'date_created' => date('Y-m-d'),
			'date_updated' => date('Y-m-d'),
			'category_id' => $category->id,
			'preview_en' => '
				A module is a self-contained software unit that consists of models, views, controllers and other supporting components. In many aspects, a module resembles to an application.
			',
			'preview_ru' => '
				Модуль — это самодостаточная программная единица, состоящая из моделей, представлений, контроллеров и иных компонентов. Во многом модуль схож с приложением.
			',
			'content_en' => '
				<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>A module is a self-contained software unit that consists of&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.model">models</a>,&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.view">views</a>,&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.controller">controllers</a>&nbsp;and other supporting components. In many aspects, a module resembles to an&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.application">application</a>. The main difference is that a module cannot be deployed alone and it must reside inside of an application. Users can access the controllers in a module like they do with normal application controllers.</p><p>Modules are useful in several scenarios. For a large-scale application, we may divide it into several modules, each being developed and maintained separately. Some commonly used features, such as user management, comment management, may be developed in terms of modules so that they can be reused easily in future projects.</p><h2>1. Creating Module&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.module#creating-module"></a></h2><p>A module is organized as a directory whose name serves as its unique&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CWebModule#id">ID</a>. The structure of the module directory is similar to that of the&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.application#application-base-directory">application base directory</a>. The following shows the typical directory structure of a module named&nbsp;<code>forum</code>:</p><pre>forum/
				   ForumModule.php            the module class file
				   components/                containing reusable user components
				      views/                  containing view files for widgets
				   controllers/               containing controller class files
				      DefaultController.php   the default controller class file
				   extensions/                containing third-party extensions
				   models/                    containing model class files
				   views/                     containing controller view and layout files
				      layouts/                containing layout view files
				      default/                containing view files for DefaultController
				         index.php            the index view file
				</pre><p>A module must have a module class that extends from&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CWebModule">CWebModule</a>. The class name is determined using the expression&nbsp;<code>ucfirst($id)."Module"</code>, where&nbsp;<code>$id</code>&nbsp;refers to the module ID (or the module directory name). The module class serves as the central place for storing information shared among the module code. For example, we can use&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CWebModule#params">CWebModule::params</a>&nbsp;to store module parameters, and use&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CWebModule#components">CWebModule::components</a>&nbsp;to share<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.application#application-component">application components</a>&nbsp;at the module level.</p><blockquote><p><strong>Tip:</strong>&nbsp;We can use the module generator in Gii to create the basic skeleton of a new module.</p></blockquote><h2>2. Using Module&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.module#using-module"></a></h2><p>To use a module, first place the module directory under&nbsp;<code>modules</code>&nbsp;of the&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.application#application-base-directory">application base directory</a>. Then declare the module ID in the&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CWebApplication#modules">modules</a>&nbsp;property of the application. For example, in order to use the above&nbsp;<code>forum</code>module, we can use the following&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.application#application-configuration">application configuration</a>:</p><p></p><div><pre>return array(
				    ......
				    "modules"=&gt;array("forum",...),
				    ......
				);</pre><p></p></div><p>A module can also be configured with initial property values. The usage is very similar to configuring&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.application#application-component">application components</a>. For example, the&nbsp;<code>forum</code>&nbsp;module may have a property named&nbsp;<code>postPerPage</code>&nbsp;in its module class which can be configured in the&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.application#application-configuration">application configuration</a>&nbsp;as follows:</p><p></p><div><pre>return array(
				    ......
				    "modules"=&gt;array(
				        "forum"=&gt;array(
				            "postPerPage"=&gt;20,
				        ),
				    ),
				    ......
				);</pre><p></p></div><p>The module instance may be accessed via the&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CController#module">module</a>&nbsp;property of the currently active controller. Through the module instance, we can then access information that are shared at the module level. For example, in order to access the above&nbsp;<code>postPerPage</code>&nbsp;information, we can use the following expression:</p><p></p><div><pre>$postPerPage=Yii::app()-&gt;controller-&gt;module-&gt;postPerPage;
				// or the following if $this refers to the controller instance
				// $postPerPage=$this-&gt;module-&gt;postPerPage;</pre><p></p></div><p>A controller action in a module can be accessed using the&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.controller#route">route</a>&nbsp;<code>moduleID/controllerID/actionID</code>. For example, assuming the above&nbsp;<code>forum</code>&nbsp;module has a controller named&nbsp;<code>PostController</code>, we can use the&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.controller#route">route</a><code>forum/post/create</code>&nbsp;to refer to the&nbsp;<code>create</code>&nbsp;action in this controller. The corresponding URL for this route would be&nbsp;<code>http://www.example.com/index.php?r=forum/post/create</code>.</p><blockquote><p><strong>Tip:</strong>&nbsp;If a controller is in a sub-directory of&nbsp;<code>controllers</code>, we can still use the above&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.controller#route">route</a>&nbsp;format. For example, assuming&nbsp;<code>PostController</code>&nbsp;is under&nbsp;<code>forum/controllers/admin</code>, we can refer to the<code>create</code>&nbsp;action using&nbsp;<code>forum/admin/post/create</code>.</p></blockquote><h2>3. Nested Module&nbsp;<a href="http://www.yiiframework.com/doc/guide/1.1/en/basics.module#nested-module">¶</a></h2><p>Modules can be nested in unlimited levels. That is, a module can contain another module which can contain yet another module. We call the former&nbsp;<em>parent module</em>&nbsp;while the latter&nbsp;<em>child module</em>. Child modules must be declared in the&nbsp;<a href="http://www.yiiframework.com/doc/api/1.1/CWebModule#modules">modules</a>&nbsp;property of their parent module, like we declare modules in the application configuration shown as above.</p><p>To access a controller action in a child module, we should use the route<code>parentModuleID/childModuleID/controllerID/actionID</code>.</p><br><p></p>
			',
			'content_ru' => '
				<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>Модуль — это самодостаточная программная единица, состоящая из&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.model">моделей</a>,&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.view">представлений</a>,&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.controller">контроллеров</a>&nbsp;и иных компонентов. Во многом модуль схож с&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.application">приложением</a>. Основное различие заключается в том, что модуль не может использоваться сам по себе — только в составе приложения. Пользователи могут обращаться к контроллерам внутри модуля абсолютно так же, как и в случае работы с обычными контроллерами приложения.</p><p>Модули могут быть полезными в нескольких ситуациях. Если приложение очень объёмное, мы можем разделить его на несколько модулей, разрабатываемых и поддерживаемых по отдельности. Кроме того, некоторый часто используемый функционал, например, управление пользователями, комментариями и пр., может разрабатываться как модули, чтобы впоследствии можно было с лёгкостью воспользоваться им вновь.</p><h2>Создание модуля</h2><p>Модуль организован как директория, имя которой выступает в качестве уникального&nbsp;<a href="http://www.yiiframework.com/doc/api/CWebModule#id">идентификатора модуля</a>. Структура директории модуля похожа на структуру&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.application#application-base-directory">базовой директории приложения</a>. Ниже представлена типовая структура директории модуля с именем&nbsp;<code>forum</code>:</p><pre>forum/
				   ForumModule.php            файл класса модуля
				   components/                содержит пользовательские компоненты
				      views/                  содержит файлы представлений для виджетов
				   controllers/               содержит файлы классов контроллеров
				      DefaultController.php   файл класса контроллера по умолчанию
				   extensions/                содержит сторонние расширения
				   models/                    содержит файлы классов моделей
				   views/                     содержит файлы представлений контроллера и макетов
				      layouts/                содержит файлы макетов
				      default/                содержит файлы представлений для контроллера по умолчанию
				         index.php            файл представления "index"
				</pre><p>В корневой директории модуля должен находиться класс модуля, наследующий&nbsp;<a href="http://www.yiiframework.com/doc/api/CWebModule">CWebModule</a>. Имя класса определяется, используя выражение<code>ucfirst($id)."Module"</code>, где&nbsp;<code>$id</code>&nbsp;соответствует идентификатору модуля (или названию директории модуля). Класс модуля выполняет роль центрального хранилища информации, совместно используемой компонентами модуля. Например, мы можем использовать<a href="http://www.yiiframework.com/doc/api/CWebModule#params">CWebModule::params</a>&nbsp;для хранения параметров модуля, а также&nbsp;<a href="http://www.yiiframework.com/doc/api/CWebModule#components">CWebModule::components</a>&nbsp;для совместного использования&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.application#application-component">компонентов приложения</a>&nbsp;на уровне модуля.</p><blockquote><p><strong>Подсказка:</strong>&nbsp;Для создания базового каркаса модуля можно воспользоваться генератором модулей, входящим в состав Gii.</p></blockquote><h2>Использование модуля</h2><p>Для использования модуля необходимо поместить папку модуля в директорию&nbsp;<code>modules</code>&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.application#application-base-directory">базовой директории приложения</a>. Далее необходимо объявить идентификатор модуля в свойстве приложения&nbsp;<a href="http://www.yiiframework.com/doc/api/CWebApplication#modules">modules</a>. Например, чтобы воспользоваться модулем&nbsp;<code>forum</code>, приведённым выше, можно использовать следующую&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.application#application-configuration">конфигурацию приложения</a>:</p><p></p><div><pre>return array(
				    …
				    "modules"=&gt;array("forum",…),
				    …
				);</pre><p></p></div><p>Кроме того, модулю можно задать начальные значения свойств. Порядок использования такой же, как и с&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.application#application-component">компонентами приложения</a>. Например, модуль&nbsp;<code>forum</code>&nbsp;может иметь в своём классе свойство с именем&nbsp;<code>postPerPage</code>, которое может быть установлено в&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.application#application-configuration">конфигурации приложения</a>&nbsp;следующим образом:</p><p></p><div><pre>return array(
				    …
				    "modules"=&gt;array(
				        "forum"=&gt;array(
				            "postPerPage"=&gt;20,
				        ),
				    ),
				    …
				);</pre><p></p></div><p>К экземпляру модуля можно обращаться посредством свойства&nbsp;<a href="http://www.yiiframework.com/doc/api/CController#module">module</a>&nbsp;активного в настоящий момент контроллера. Через экземпляр модуля можно получить доступ к совместно используемой информации на уровне модуля. Например, для того чтобы обратиться к упомянутому выше свойству&nbsp;<code>postPerPage</code>, мы можем воспользоваться следующим выражением:</p><p></p><div><pre>$postPerPage=Yii::app()-&gt;controller-&gt;module-&gt;postPerPage;
				// или таким, если $this ссылается на экземпляр контроллера
				// $postPerPage=$this-&gt;module-&gt;postPerPage;</pre><p></p></div><p>Обратиться к действию контроллера в модуле можно, используя&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.controller#route">маршрут</a>&nbsp;<code>moduleID/controllerID/actionID</code>. Например, предположим, что всё тот же модуль&nbsp;<code>forum</code>&nbsp;имеет контроллер с именем&nbsp;<code>PostController</code>. Тогда мы можем использовать&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.controller#route">маршрут</a>&nbsp;<code>forum/post/create</code>&nbsp;для того, чтобы обратиться к действию&nbsp;<code>create</code>&nbsp;этого контроллера. Адрес URL, соответствующий этому маршруту, будет таким:<code>http://www.example.com/index.php?r=forum/post/create</code>.</p><blockquote><p><strong>Подсказка:</strong>&nbsp;Если контроллер находится в подпапке папки&nbsp;<code>controllers</code>, мы также можем использовать формат&nbsp;<a href="http://yiiframework.com.ua/ru/doc/guide/basics.controller#route">маршрута</a>, приведенный выше. Например, предположим, что контроллер&nbsp;<code>PostController</code>&nbsp;находится в папке&nbsp;<code>forum/controllers/admin</code>, тогда мы можем обратиться к действию&nbsp;<code>create</code>&nbsp;через&nbsp;<code>forum/admin/post/create</code>.</p></blockquote><h2>Вложенные модули</h2><p>Модули могут быть вложенными друг в друга сколько угодно раз, т.е. один модуль может содержать в себе другой, который содержит в себе ещё один. Первый мы будем называть&nbsp;<em>модуль-родитель</em>, второй —&nbsp;<em>модуль-потомок</em>. Модули-потомки должны быть описаны в свойстве<a href="http://www.yiiframework.com/doc/api/CWebModule#modules">modules</a>&nbsp;модуля-родителя точно так же, как мы описываем модули в файле конфигурации приложения.</p><p>Для обращения к действию контроллера в дочернем модуле используется маршрут&nbsp;<code>parentModuleID/childModuleID/controllerID/actionID</code>.</p><br><p></p>
			',
		));
	}

	/**
	 * Discards migration.
	 *
	 * @return void
	 */
	public function safeDown()
	{
		Yii::app()->db->createCommand('SET FOREIGN_KEY_CHECKS=0;')->execute();
		$this->truncateTable('tbl_page');
		Yii::app()->db->createCommand('SET FOREIGN_KEY_CHECKS=1;')->execute();
		$this->dropColumn('tbl_page', 'preview_ru');
		$this->dropColumn('tbl_page', 'preview_en');
	}

}