<?php


    require_once 'Tag.php';

	class Input extends Tag
	{
        public function __construct(){
            parent::__construct('input');
        }

        public function open()
		{
            //чтобы не вызывать open
            $inputName = $this->getAttrValue('name');
			
			// Если атрибут name задан у инпута:
			if ($inputName) {
				if (isset($_REQUEST[$inputName])) {
					$value = $_REQUEST[$inputName];
					$this->setAttr('value', $value);
				}
			}
			
			return parent::open();

		}
		
		public function __toString()
		{
			return $this->open();
		}

        

		
	}
?>