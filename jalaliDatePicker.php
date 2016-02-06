<?php

namespace faravaghi\jalaliDatePicker;

use faravaghi\jalaliDatePicker\jalaliDatePickerAsset;

use Yii;
use yii\base\Model;
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\base\Widget as Widget;

class jalaliDatePicker extends Widget
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
     * @var \yii\db\ActiveRecord model associated with this widget.
     */
    public $model;

	/**
	 * @var string JS Callback for Daterange picker
	 */
	public $callback;
	/**
	 * @var array Options to be passed to daterange picker
	 */
	public $options = [];
	/**
	 * @var string[] the JavaScript event handlers.
	 */
	public $events = array();
	/**
	 * @var array the HTML attributes for the widget container.
	 */
	public $htmlOptions = [];

	/**
	 * Initializes the widget.
	 * If you override this method, make sure you call the parent implementation first.
	 */
	public function init()
	{
		//checks for the element id
		if (!isset($this->htmlOptions['id'])) {
			$this->htmlOptions['id'] = $this->getId();
		}
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
		if ($this->selector)
		{
			$this->registerJs($this->selector, $this->options, $this->callback);
		} else {
			$id = $this->htmlOptions['id'];
			echo Html::activeInput('text', $this->model, $this->attribute, $this->htmlOptions);
			// echo Html::tag('input', '', $this->htmlOptions);
			$this->registerJs("#{$id}", $this->options, $this->callback);
		}


	}

	protected function registerJs($selector, $options, $callback) {
		$view = $this->getView();

		jalaliDatePickerAsset::register($view);

		$js   = [];
		$js[] = '$("' . $selector . '").datepicker(' . Json::encode($options) . ($callback ? ', ' . Json::encode($callback) : '') . ')';
		foreach ($this->events as $event => $handler)
			$js[] = ".on('{$event}', " . Json::encode($handler) . ")";

		$view->registerJs(implode("\n", $js) . ';',View::POS_READY);

	}
}

