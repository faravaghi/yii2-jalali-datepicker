Bootstrap Jalali Date Picker
========================
Jalali Date Picker for Bootstrap Yii2 Extension

[![Latest Stable Version](https://poser.pugx.org/faravaghi/yii2-jalali-datepicker/v/stable)](https://packagist.org/packages/faravaghi/yii2-jalali-datepicker) [![Total Downloads](https://poser.pugx.org/faravaghi/yii2-jalali-datepicker/downloads)](https://packagist.org/packages/faravaghi/yii2-jalali-datepicker) [![License](https://poser.pugx.org/faravaghi/yii2-jalali-datepicker/license)](https://packagist.org/packages/faravaghi/yii2-jalali-datepicker)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist faravaghi/yii2-jalali-datepicker "*"
```

or add

```
"faravaghi/yii2-jalali-datepicker": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?php 
use faravaghi\jalaliDatePicker\jalaliDatePicker;

echo $form->field(
		$model, 
		'date'
	)
	->widget(
		jalaliDatePicker::className(), [
		'options' => array(
			'format' => 'yyyy/mm/dd',
			'viewformat' => 'yyyy/mm/dd',
			'placement' => 'left',
			'todayBtn'=> 'linked',
		),
		'htmlOptions' => [
			'id' => 'date',
			'class'	=> 'form-control'
		]
	]);

?>
```
or without using the model:
```php
echo faravaghi\jalaliDatePicker\jalaliDatePicker::widget([
	'name' => 'startDate',
	'value' => '1397/06/20',
	'options' => array(
		'format' => 'yyyy/mm/dd',
		'viewformat' => 'yyyy/mm/dd',
		'placement' => 'left',
		'todayBtn'=> 'linked',
	),
]);
```
