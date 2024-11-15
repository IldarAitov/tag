<?php
    interface iTag
	{
		// Геттер имени:
		public function getName();
		
		// Геттер текста:
		public function getText();
		
		// Геттер всех атрибутов:
		public function getAttrs();
		
		// Геттер одного атрибута по имени:
		public function getAttrValue($name);
		
		// Открывающий тег, текст и закрывающий тег:
		public function show();
		
		// Открывающий тег:
		public function open();
		
		// Закрывающий тег:
		public function close();
		
		// Установка текста:
		public function setText($text);
		
		// Установка атрибута:
		public function setAttr($name, $value = true);
		
		// Установка атрибутов через массив:
		public function setAttrsArray($attrs);
		
		// Удаление атрибута:
		public function removeAttr($name);
		
		// Установка класса:
		public function addClass($className);
		
		// Удаление класса:
		public function removeClass($className);
	}

	class Tag implements iTag{

		private $name; // свойство для хранения имени тега
        private $attrs; //ассоц. массив аттрибутов
        private $text; //текст тэга
		
		public function __construct($name){

			$this->name = $name;
            
            return  $this; //возвращаем объект чтобы поместить в цепочку
            
		}

        public function open(){
            //возращает открывающий тэг
            $name = $this->name;

            $attrStr = $this->getAttrsStr($this->attrs);
            return "<$name$attrStr>";
            
        }

        public function close(){
            //возвращает закрывающий тэг
            $name = $this->name;
            return "</$name>";
        }

        public function show(){
			return $this->open() . $this->text . $this->close();
		}

        public function setAttr($nameAttr, $value = true){
            //добавляет атрибут в массив аттрибутов
            //если значение true атрибут одиночный

            $this->attrs[$nameAttr] = $value;
            return $this; //возвр. объект чобы можно было использовать цепочку
        }

        public function setAttrsArray($attrsAr){
            //добавляет атрибут в массив аттрибутов
            
            foreach($attrsAr as $name => $value){
                $this->setAttr($name, $value);
            }
            return $this;
        }

        public function removeAttr($nameAttr){
            //удаляет аттр.
            unset($this->attrs[$nameAttr]);
            return $this; //возвр. объект чобы можно было использовать цепочку
        }

        public function getName(){
            return $this->name;
        }

        public function getText(){
            return $this->text;
        }

        public function setText($newText){
            $this->text = $newText;
            return $this;
        }

        public function getAttrValue($attrName){
            //выводит значение аттрибута если он есть
            if(array_key_exists($attrName, $this->attrs)){
                return $this->attrs[$attrName];
            } else {
                return null;
            };
        }

        public function getAttrs(){
            return $this->attrs;
        }

        public function addClass($className){

            //добавляем css класс 

            if (!empty($this->attrs['class'])){
                //если аттрибут class есть - добавляем
                $arrClass = explode(' ', $this->attrs['class']);

                if(!in_array($className, $arrClass)){
                    $arrClass[] = $className;
                    $this->setAttr('class', implode(' ', $arrClass));
                }
                
            } else {
                //если аттрибута class нет - добавляем
                $this->setAttr('class', $className);
            }

            return $this;
        }

        public function removeClass($className){
            //удаляет css класс

            if(!empty($this->attrs['class'])){

                $arrClass = explode(' ', $this->attrs['class']);

                if(in_array($className, $arrClass)){

                    $arrClass = $this->removeElem($className, $arrClass);
                    $this->setAttr('class', implode(' ', $arrClass));
                    
                };

                return $this;

            } else {
                return $this;
            }

            
        }

        private function getAttrsStr($attrs){
            //вспомоателдьная функция
            // возвращаеет строку атрибутов или пустую строку если аттр. нет
            $result = '';

            if(!empty($attrs)){
                foreach($attrs as $name => $value){
                    if ($value === true){
                        //если значение true атрибут одиночный
                        $result .= " $name";
                    } else {
                        $result .= " $name=\"$value\"";
                    }
                    
                };
                
            }
            return $result;
        }

        private function removeElem($elem, $arr){

		    $key = array_search($elem, $arr); // находим ключ элемента 
		    unset($arr[$key]); // удаляем элемент
		
		    return $arr; // возвращаем измененный массива
            }
	}

	
?>