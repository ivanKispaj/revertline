    <?php
    class ReversStrops
    {
        public $strops;
        private $stropsarray;
        public function __construct($strops){
            $this->strops = $strops;
        }


        public function getStrops(){

            $strops = $this->stropsRevers();
            $countcharset = count($this->stropsarray)-1;
            $newresultarray = array();
            for ($i=0;$i <=$countcharset;$i++){
                $gotstr = $this->getarraystr($this->stropsarray[$i]);  // получаем массив побуквенно со знаками препинания
                $gotstra = $this->getarraystr($strops[$i]); // получаем массив побуквенно без знаков
                $result = array_diff($gotstr, $gotstra); // получаем количество знаков препинания в массив (расхождение массивов)
                $result  = array_values($result); // сбрасываем ключи массива
                $resaltarray = $this->getstrupper($gotstr,$gotstra,$result); // получаем массив побуквенно перевенутый со знаками и сохраненным регистром

                /*
                 * если массив есть то объединяем его в строку
                 */
                if ($resaltarray){
                    $newstring = '';
                    foreach ($resaltarray as $item) {
                        $newstring .= $item;
                    }
                    $newresultarray[$i] = $newstring;
                }
            }
            $newresultarray = implode(' ',$newresultarray);
            return $newresultarray;
        }
        /*
        * удаляет из массива все знаки кроме букв и цифр
        * и производит реверс
        */
        private function stropsRevers(){
            $this->stropsarray =	explode(' ', $this->strops);  // разбиваем строку на массив
            $carsshet = 0;
            foreach ($this->stropsarray as $charss){
                $subject[$carsshet] = $this->mb_strrev($charss);
                $carsshet ++;
            }
            return $subject;
        }
        /*
        * Разбивает входящий массив на массив по буквам.
        */
        private function getarraystr($str){
            $str =  preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);
            return $str;
        }

        private  function mb_strrev($string){
            $string = (preg_replace('/[^ a-zа-яё\d]/ui', '',$string ));
            $strrev = "";
            for($i = mb_strlen($string, "UTF-8"); $i >= 0; $i--) {
                $strrev .= mb_substr($string, $i, 1, "UTF-8");
            }
            return $strrev;
        }

        private function getstrupper ($chars,$gotstra,$simbols){
            $go = 0;
            $ch = 0;
            $cq = 0;
            $result = array();
            foreach ($chars as $charss) {
                if ($this->is_symbol($charss, $simbols, $cq)) {  // если это не буква
                    $result[$ch] = $charss;
                    $cq++;
                    $ch++;

                }else {
                    // проверка на регистр символа
                    $chr = mb_substr($charss, 0, 1, 'utf-8');
                    if (mb_strtolower($chr, 'utf-8') != $chr) {
                        $result[$ch] = mb_strtoupper($gotstra[$go]);
                        $go++;
                        $ch++;
                    }else {
                        $result[$ch] = mb_strtolower($gotstra[$go]);
                        $go++;
                        $ch++;
                    }
                }
            }
            return $result;
        }
        private function is_symbol($charss,$simbols,$cq){
            if (array_key_exists($cq,$simbols)) {  // если это не буква
                if ($charss === $simbols[$cq]){
                    return true;
                }
            }
            return false;
        }
    }