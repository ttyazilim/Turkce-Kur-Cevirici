<?php
//TTyazilim.com
//Taner MACİT
//tanermacit@gmail.com
//firmarehberiscripti.com
//Türkçe Kur Çevirici v 1.0
//17.10.2015
$xml = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/today.xml');
foreach ($xml->Currency as $Currency) {
    
    // USD alış satış
    if ($Currency['Kod'] == "USD") {
      $usd_ES = $Currency->ForexSelling;
        $usd_EA = $Currency->ForexBuying;
    }
    // EURO alış satış
    if ($Currency['Kod'] == "EUR") {
        $eur_ES = $Currency->ForexSelling;
        $eur_EA = $Currency->ForexBuying;
    }
}


function dolar_to_tl($a) { 
    global $usd_ES;
    $a = strtr($a, ',', '.'); 
    $b = strtr($usd_ES, ',', '.'); 
    $ret = $a * $b; 
    return strtr($ret, '.', ','); 
   } 
   
function euro_to_tl($a) { 
    global $eur_EA;
    $a = strtr($a, ',', '.'); 
    $b = strtr($eur_EA, ',', '.'); 
    $ret = $a * $b; 
    return strtr($ret, '.', ','); 
   }    

//100 doları TL ye çevirelim;
echo "100 Dolar ".dolar_to_tl("100")." TL dir.";

echo "<br><br>";
//100 euroyu TL ye çevirelim;
echo "100 Euro ".euro_to_tl("100")." TL dir.";

?>