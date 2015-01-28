<?php
/**
 * Created by PhpStorm.
 * User: T445ENS
 * Date: 1/14/2015
 * Time: 12:34 PM
 */

$this->Html->css('news', array('inline' => false));

foreach($news as $key => $value) {
	echo ($key . ') ' . $value['Post'] . '<br />');
}

?>

<pre>
	<?php print_r($news); ?>
</pre>

