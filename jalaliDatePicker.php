<?php
/**
 * @link http://faravaghi.ir
 * @copyright Copyright (c) 2017 faravaghi
 * @license MIT http://opensource.org/licenses/MIT
 */
namespace faravaghi\jalaliDatePicker;

use faravaghi\jalaliDatePicker\jalaliDatePickerAsset;

use Yii;
use yii\base\Model;
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

/**
 * @author Mohammad Ebrahim Amini <info@faravaghi.ir>
 */
class jalaliDatePicker extends InputWidget
{

	/**
	 * @var string $selector
	 */
	public $selector;

	/**
	 * @var string attribute associated with this widget.
	 */
	public $attribute;

	/**
	 * @var string JS Callback for Daterange picker
	 */
	public $callback;

	/**
	 * @var string[] the JavaScript event handlers.
	 */
	public $events = array();

	/**
	 * Initializes the widget.
	 * If you override this method, make sure you call the parent implementation first.
	 */
	public function init()
	{
		parent::init();
	}

	/**
	 * Renders the widget.
	 */
	public function run()
	{
		$this->registerPlugin();
	}

	protected function registerPlugin()
	{
		if($this->selector){
			$this->registerJs($this->selector, $this->options, $this->callback);
		}
		else{
			$id = $this->options['id'];

			$input = $this->hasModel()
					? Html::activeInput('text', $this->model, $this->attribute, $this->options)
					: Html::textInput($this->name, $this->value, $this->options);

			echo $input;

			$this->registerJs("#{$id}", $this->options, $this->callback);
		}


	}

	protected function registerJs($selector, $options, $callback)
	{
		$view = $this->getView();

		jalaliDatePickerAsset::register($view);

		$js   = [];
		$js[] = '$("' . $selector . '").datepicker(' . Json::encode($options) . ($callback ? ', ' . Json::encode($callback) : '') . ')';
		foreach ($this->events as $event => $handler)
			$js[] = ".on('{$event}', " . Json::encode($handler) . ")";

		$view->registerJs(implode("\n", $js) . ';',View::POS_READY);
	}
}

