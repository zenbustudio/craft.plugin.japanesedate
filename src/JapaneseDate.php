<?php

namespace zenbustudio\japanesedate;

use craft\base\Plugin;
use craft\web\twig\variables\CraftVariable;
use yii\base\Event;
use zenbustudio\japanesedate\services\JapaneseDateService;
use zenbustudio\japanesedate\variables\JapaneseDateVariable;

/**
 * Class JapaneseDate
 *
 * @property JapaneseDateService $JapaneseDate
 */
class JapaneseDate extends Plugin {

	public static $plugin;

	function init()
	{
		parent::init();

		self::$plugin = $this;

		$this->setComponents([
			'JapaneseDate' => JapaneseDateService::class
		]);

		// Register Variables
		Event::on(CraftVariable::class, CraftVariable::EVENT_INIT, function(Event $event) {
			/* @var CraftVariable $variable */
			$variable = $event->sender;
			$variable->set('japaneseDate', JapaneseDateVariable::class);
		});
	}
}