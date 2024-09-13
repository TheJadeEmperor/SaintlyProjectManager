<?php
include('../include/functions.php');
include('../include/config.php');
///////////////////////////////
$File = 'hubspot.csv';
$tableName = 'contacts';
///////////////////////////////


//get addresses from db and insert into $addressArray

$addressArray = array();

$opt = array(
'tableName' => $tableName,
'cond' => $cond
);

$resArray = dbSelect($opt);

foreach($resArray as $a) {
    //echo $a['address'];
    array_push($addressArray, $a['address']);
}

// print_r($addressArray); exit; 
 


$arrResult  = array();
$handle     = fopen($File, "r");

if(empty($handle) === false) {

    while(($data = fgetcsv($handle, 1000, ",")) !== FALSE){
        $arrResult[] = $data; 

        //mapping columns 
        $address = 3;
        $state = 4;
        $notes = 5;
        $zip = 10;
        $phone1 = 6;
        $phone2 = 7;
        $phone3 = 8;
        $email1 = 9;
        $first_name = 1;
        $last_name = 2;

        echo $data[$address].' '.$data[$city].' '.$data[$state] 
        .' '.$data[$phone1].' '.$data[$phone2].' '.$data[$phone3]

        .' '.$data[ $email1 ].' '.$data[ $email2 ]

        .' '.$data[ $first_name ].' '.$data[ $last_name ] 
        .' | <br >'; 

        //check for empty data - address phone1 phone2 phone3 email1
        if($data[$address] || $data[$phone1] || $data[$phone2] || $data[$phone3] || $data[ $email1 ] ) {

            //fix zip codes 
            if(!$data[$zip]) $data[$zip] = 00000;

            //check for dupes in address_array 
            if(!in_array($data[$address], $addressArray)) {
               
                //insert record into db row
                $opt = array(
                    'tableName' => $tableName,
                    'dbFields' => array(
                        'first_name' => $data[ $first_name ],
                        'last_name' => $data[ $last_name ],
                        'address' => $data[$address], 
                        'state' => $data[$state], 
                        'zip' => $data[$zip],  
                        'phone1' => $data[$phone1], 
                        'phone2' => $data[$phone2], 
                        'phone3' => $data[$phone3], 
                        'email1' => $data[$email1], 
                    )
                );
                
                $res = dbInsert($opt);
            }
            else { //update record 

            }
          
            
        }

    }
    fclose($handle);
}


//print_r($arrResult);
?>