<?php
function findDuplicates($array) {
    
    $counts = array();
    
    
    for ($i = 0; $i < count($array); $i++) {
        $number = $array[$i];
        $found = false;
        
        
        for ($j = 0; $j < count($counts); $j++) {
            if ($counts[$j]['number'] === $number) {
                $counts[$j]['count']++;
                $found = true;
                break;
            }
        }
        
        
        if (!$found) {
            $counts[] = array('number' => $number, 'count' => 1);
        }
    }
    
    
    $duplicates = array();
    for ($k = 0; $k < count($counts); $k++) {
        if ($counts[$k]['count'] > 1) {
            $duplicates[] = $counts[$k]['number'];
        }
    }
    
    return $duplicates;
}


$array = array(790, 483, 281, 224, 483, 60, 698, 483, 790, 168);


$result = findDuplicates($array);


echo "Angka yang muncul lebih dari 1 kali: ";
for ($m = 0; $m < count($result); $m++) {
    echo $result[$m];
    if ($m < count($result) - 1) {
        echo ", ";
    }
}
?>