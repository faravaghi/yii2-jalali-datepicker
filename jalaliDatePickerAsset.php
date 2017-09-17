<?php
/**
 * @link http://faravaghi.ir
 * @copyright Copyright (c) 2017 faravaghi
 * @license MIT http://opensource.org/licenses/MIT
 */
/**
 * @copyright Copyright &copy; Mohammad Ebrahim Amini, faravaghi.ir, 2016
 * @package yii2-widgets
 * @subpackage yii2-jalali-datepicker
 * @version 1.0.0
 */

namespace faravaghi\jalaliDatePicker;

use Yii;
use yii\web\AssetBundle;

/**
 * Asset bundle for Jalali DateRangePicker Widget
 *
 * @author Mohammad Ebrahim Amini <faravaghi@gmail.com>
 * @since 1.0
 */
class jalaliDatePickerAsset extends AssetBundle
{
	public static $extra_js = [];

	public function init() {
		Yii::setAlias('@jalalidatepicker', __DIR__);

		foreach (static::$extra_js as $js_file) {
			$this->js[]= $js_file;
		}

		return parent::init();
	}

	public $sourcePath = '@jalalidatepicker/assets/';

	public $css = [
		'css/bootstrap-datepicker.css',
	];

	public $js = [
		'js/jalali.js',
		'js/calendar.js',
		'js/bootstrap-datepicker.js',
	];

	public $depends = [
		'yii\bootstrap\BootstrapPluginAsset',
	];
}