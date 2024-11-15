<?php
    require_once 'Tag.php';

	class Link extends Tag
	{
        private const CLASSNAME = 'active';

		public function __construct(){
            
            parent::__construct('a');
            $this->setAttr('href', '');
            
        }

        public function open(){          //переопределяем родительский метод
            $this->activateSelf();      //проверяем на активную страницу
            return parent::open();          //вызываем родительский метод
        }

        private function activateSelf(){
            //проверяем активна ли ссылка
            if($this->getAttrValue('href') === $_SERVER['REQUEST_URI']){
                $this->addClass($this::CLASSNAME);
            };
        }
	}
?>