Jalali Date Range Picker
========================
Jalali Date Picker for Bootstrap Yii2 Extension

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
<?= 
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
