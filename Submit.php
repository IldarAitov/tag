<?php

    require_once 'Tag.php';

	class Submit extends Input
	{
        public function __construct(){
            $this->setAttr('type', 'submit');
            parent::__construct('');
        }

       
	}
?>