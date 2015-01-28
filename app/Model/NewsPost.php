<?php
/**
 * Created by PhpStorm.
 * User: DragonFlyy
 * Date: 1/20/2015
 * Time: 3:15 PM
 *//**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppModel','model');

class NewsPost extends AppModel {
	public $belongsTo = array (
		'User' => array (
			'fields' => 'user_name'
		)
	);

	public function frontPage (){
		$temp = $this->Find("all", array('order' => 'news_datetime DESC', 'limit' => 5));
		$out = [];
		foreach ($temp as $v)
		{
			$id = $v['NewsPost']['id'];
			$out[$id] = [];
			$out[$id]['Post'] = $v['NewsPost']['news_body'];
			$out[$id]['PostedBy'] = $v['User']['user_name'];
			$out[$id]['PostedByID'] = $v['NewsPost']['user_id'];
			$out[$id]['DatetimeStamp'] = $v['NewsPost']['news_datetime'];
		}

		return $out;
	}
}
