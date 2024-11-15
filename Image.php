<?php

    require_once 'Tag.php';

	class Image extends Tag
	{
		public function __construct(){

            $this->setAttr('src', '')->setAttr('alt', '');//уст обязательные атрибуты

            parent::__construct('img'); //вызываем род. класс
        }

        public function __toString(){
            return parent::open();
        }
	}
?>