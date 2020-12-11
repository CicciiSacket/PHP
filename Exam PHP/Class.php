<?php
abstract class persona{
    public $name;
    public $surname;
    public $mail;
    public $password;

    function __construct($name,$surname,$mail,$password) {
        $this->name = $name; 
        $this->surname = $surname;
        $this->mail = $mail;
        $this->password = $password;
    }
}

class student extends persona{
    public $exam = array();

    function __construct($name,$surname,$mail,$password,$exam){
        parent::__construct($name,$surname,$mail,$password);
        $this->name = $name; 
        $this->surname = $surname;
        $this->mail = $mail;
        $this->password = $password;
        $this->exam = $exam;
    }

    public function getName(){  
        return $this->name;
    }
    public function getSurname(){
        return $this->surname;
    }
    public function getMail(){
        return $this->mail;
    }
    public function getPassword(){
        return $this->password;
    }

    function getMedia(){
        $abs = '';
        foreach($this->exam as $exam){
            $abs = $exam->getValue();
        }
        return $abs / sizeof($this->exam);
    }
    function getInfoExam(){
        $examP = '';
        foreach($this->exam as $exam){
            $examP .= $exam->getDate() ."\t". $exam->getValue() ."\t" . $exam->getCourse()->getName() . "\n";
        }
        return $examP;
    }
    function getExamsNumber(){
        return sizeof($this->exam);
    }
    function getNameAndSurname(){
        return $this->name ." " . $this->surname;
    }
}

class teacher extends persona{
    public $course = array();

    function __construct($name,$surname,$mail,$password,$course){
        parent::__construct($name,$surname,$mail,$password);
        $this->name = $name; 
        $this->surname = $surname;
        $this->mail = $mail;
        $this->password = $password;
        $this->course = $course;
    }

    public function getName(){  
        return $this->name;
    }
    public function getSurname(){
        return $this->surname;
    }
    public function getMail(){
        return $this->mail;
    }
    public function getPassword(){
        return $this->password;
    }

    function getInfoCorsi(){
        $course2 = '';
        foreach($this->course as $course){
            $course2.= $course->getName()."\t" . $course->getHours(). "\t" . $course->getCfu(). "\n";
        }
        return $course2;
    }
}

class exam {
    public $date;
    public $course;
    public $value;

    function __construct($date, $course, $value) {
        $this->date = $date;
        $this->value = $value;
        $this->course = $course; 
    }

    public function getDate(){
        return $this->date;
    }
    public function getCourse(){
        return $this->course ;
    }
    public function getValue(){
        return $this->value;
    }
}

class course{
    public $name;
    public $n_hours;
    public $cfu;

    function __construct($name,$n_hours, $cfu) {
        $this->name = $name;
        $this->n_hours = $n_hours;
        $this->cfu = $cfu; 
    }

    public function getName(){
        return $this->name;
    }
    public function getHours(){
        return $this->n_hours;
    }
    public function getCfu(){
        return $this->cfu;
    }
}

?>