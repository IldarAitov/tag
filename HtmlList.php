<?php

    require_once 'Tag.php';

	class HtmlList extends Tag
	{

        private $items = []; // массив для хранения объектов Tag li

        public function addItem(ListItem $li){

            $this->items[] = $li;
			return $this; // вернем $this для цепочки
        }

        public function show(){
            //переопределяем метод родителя
            $result = $this->open();

            foreach($this->items as $li){
                
                $result .= $li->show();
            }

            $result .= $this->close();

            return $result;
        }

		
	}
?>