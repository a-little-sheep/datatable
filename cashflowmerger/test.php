<?php

include_once "functions.php";

$pdo = mysql_connection();

$companyInfo = array();
sortCompanyBankInfo($pdo, $companyInfo);

function sortCompanyBankInfo($pdo, $companyInfo) {
    $temp = listBank($pdo);
    foreach ($temp as $key => $value) {
        $banklist = explode(",", $value['bankname']);
        $banknumb = explode(",", $value['accountnumber']);
        
        $tempCompany = array("companynumber"=> $value['companyname'], "banklist"=> array_combine($banknumb, $banklist));
        array_push($companyInfo, $tempCompany);
    }
    var_dump($companyInfo);
}
