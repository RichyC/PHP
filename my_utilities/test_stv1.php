<?php
require('myUtilities/Software_TesterV1.php');

$tester = new myUtilities\Software_TesterV1();

$tester->clear_test_items();

/*
var_dump($tester->strs_equal("yes", "yes"));  // true
var_dump($tester->strs_equal("no", "no"));  // true
var_dump($tester->strs_equal("Yes", "no"));  // false
var_dump($tester->strs_equal("Yes", "Yes"));    // true
var_dump($tester->strs_equal("", ""));    // true
var_dump($tester->strs_equal("1sRvzQu","1sRvzQu"));   // true
var_dump($tester->strs_equal("yEs","YeS"));     //false
var_dump($tester->strs_equal("<p>","<p>"));   //true
var_dump($tester->strs_equal("<p>","<p"));   //false
var_dump($tester->strs_equal("<p></p>;","<p></p>;"));   //true
var_dump($tester->strs_equal("<p></p>;","<p></p>"));    //false

var_dump($tester->ints_equal(1, 1)); //true
var_dump($tester->ints_equal(43, 34)); //false
var_dump($tester->ints_equal(435, 435)); //true
var_dump($tester->ints_equal(0, 0));   //true
var_dump($tester->ints_equal(12, 14));   //false
var_dump($tester->ints_equal(-345, -345));    //true
var_dump($tester->ints_equal(-0, -0));   //true
var_dump($tester->ints_equal(8472610380, 8472610381));   //false
var_dump($tester->ints_equal(-237561, -137561, FALSE));    //false
*/

$tester->compare_strings("yes", "yes", TRUE);  //true
$tester->compare_strings("no", "no", TRUE);    // true
$tester->compare_strings("Yes", "no", FALSE);  // false
$tester->compare_strings("Yees", "Yees", TRUE);    // true
$tester->compare_strings("", "", TRUE);    // true
$tester->compare_strings("1sRvzQu","1sRvzQu", TRUE);   // true
$tester->compare_strings("yEs","YeS", FALSE);     //false
$tester->compare_strings("<p>","<p>", TRUE);   //true
$tester->compare_strings("<p","<p>", FALSE);   //false
$tester->compare_strings("<p></p>;","<p></p>;", TRUE);   //true
$tester->compare_strings("<p></p>","<p></p>;", FALSE);    //false

$tester->compare_ints(1, 1, TRUE);
$tester->compare_ints(43, 34, FALSE);
$tester->compare_ints(435, 435, TRUE);
$tester->compare_ints(0, 0, TRUE);
$tester->compare_ints(12, 14, FALSE);
$tester->compare_ints(-345, -345, TRUE);
$tester->compare_ints(-1, -1, TRUE);
$tester->compare_ints(8472610380, 8472610381, FALSE);
$tester->compare_ints(-237561, -137561, FALSE);

//$tester->view_test_items();

$tester->run_tests();


