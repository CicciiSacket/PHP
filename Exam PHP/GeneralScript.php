<?php 

require_once('Class.php');

$corso1 = new course('php',80,10);
$corso2 = new course('sql',80,10);
$corso3 = new course('c',80,10);
$corso4 = new course('java',80,10);
$corso5 = new course('DB',80,10);
$corso6 = new course('JS',80,10);


$docente1 = new teacher('mario','rossi','mario@mail.com',12345,[$corso1]);
$docente2 = new teacher('mario','pluto','pluto@mail.com',12345,[$corso2]);
$docente3 = new teacher('pippo','rossi','mario@mail.com',12345,[$corso3]);

$esame1 = new exam('12-12-12',$corso1,30);
$esame2 = new exam('12-12-12',$corso2,20);
$esame3 = new exam('12-12-12',$corso3,25);
$esame4 = new exam('12-12-12',$corso4,19);
$esame5 = new exam('12-12-12',$corso5,28);


$studente1 = new student('ciccio','sacco','ciccio@mail.com',12345,[$esame1,$esame2]);
$studente2 = new student('mario','luigi','ciccio@mail.com',12345,[$esame2]);
$studente3 = new student('alfredo','gallo','ciccio@mail.com',12345,[$esame3]);

function mostExams(...$students){
    $counter=0;
    $bestStudent="";
    foreach($students as $student){
        if($student->getExamsNumber()>$counter){
            $counter=$student->getExamsNumber();
            $bestStudent=$student->getNameAndSurname();
        }elseif($student->getExamsNumber()==$counter){
            $bestStudent.=" and ".$student->getNameAndSurname();
        }
    }
    return $bestStudent." sustained ".$counter." exams";
}
function leastExams(...$students){
    $counter=99;
    $bestStudent="";
    foreach($students as $student){
        if($student->getExamsNumber()<$counter){
            $counter=$student->getExamsNumber();
            $bestStudent=$student->getNameAndSurname();
        }elseif($student->getExamsNumber()==$counter){
            $bestStudent.=" and ".$student->getNameAndSurname();
        }
    }
    return "\t".$bestStudent." sustained ".$counter." exams\t";
}

function highestAvg(...$students){
    $counter=0;
    $bestStudent="";
    foreach($students as $student){
        if($student->getMedia()>$counter){
            $counter+=$student->getMedia();
            $bestStudent=$student->getNameAndSurname();
        }
    }
    return $bestStudent."\t has the highest average, with \t".$counter;
}

function leastAvg(...$students){
    $counter=10;
    $bestStudent="";
    foreach($students as $student){
        if($student->getMedia()<$counter){
            $counter=$student->getMedia();
            $bestStudent=$student->getNameAndSurname();
        }
    }
    return $bestStudent." \thas the lowest average, with \t".$counter;
}

?>