<?php
include("db.php");

header('Content-Type: application/json; charset=utf-8');      //告诉系统这是一个数组，而不是string
header("Access-Control-Allow-Origin: *");                      //给不同的locatie接口，让他们可以连接这个API

$dataJson = file_get_contents('php://input');   //https://www.geeksforgeeks.org/how-to-receive-json-post-with-php/
// echo $dataJson;
$dataGekozen = json_decode($dataJson, true); //https://www.geeksforgeeks.org/associative-arrays-in-php/ (true zorg dat json decode het omzet naar arry)
// echo $dataGekozen;
//0：afspraak tijd van gekozen dag van mysql halen.
$datum = $dataGekozen["datum"];
$serviceDuration = $dataGekozen["serviceDuration"];
$gekozendag = $conn->prepare("SELECT * FROM `afspraken` WHERE TIMESTAMP(datum) BETWEEN ? and ? "); //https://www.jianshu.com/p/9305e8698b52
$gekozendag->execute(["$datum 00:00:00","$datum 23:59:59"]);
$afspraken = $gekozendag->fetchAll(PDO::FETCH_ASSOC);
// echo json_encode($gekozentijd);
//1.tijdblokken met 15min.
$startDateTime = new DateTimeImmutable($datum);
$startDateTime = $startDateTime->setTime(8, 0);
$endDateTime = new DateTimeImmutable($datum);
$endDateTime = $endDateTime->setTime(17,0);

$tijdList = [];
while($startDateTime < $endDateTime){
    $endTime = $startDateTime->add(new DateInterval("PT$serviceDuration"."M"));
    $gevond = false;
    
    foreach($afspraken as $afspraak){
        $afspraakStart = new DateTimeImmutable($afspraak["datum"]);
        $afspraakEnd = new DateTimeImmutable($afspraak["afspraakeinde"]);
       if( 
        $afspraakStart < $endTime && $afspraakEnd > $startDateTime        
       ){
        $gevond = true; 
        break;
       }         
    } 

   if($gevond == false ){
    $tijdList[] = date_format($startDateTime,"H:i").'-'.date_format($endTime,"H:i");
   }
   
    
    $startDateTime = $startDateTime->add(new DateInterval("PT15M"));
}
//----------
echo json_encode ($tijdList);

//2.kozen van klanten duration (15min+30min) en datum naar backend verzenden.
$geslecteerdeTijd=($_POST);
//3. backend:verzoek uitlezen

//4A.als deze datum geen afspraken zijn, stuur dan een tijdlist met alle tijdblokken. (9:00-9:45/9:15-10:00/9:30-10:15)
//4B.als er afspraken zijn, stuur een tijdlist met alle beschikbare tijdblokken.

 