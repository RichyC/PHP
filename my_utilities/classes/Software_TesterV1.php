<?php

require_once('Software_Tester.php');
require_once('../interfaces/iSoftware_Tester.php');
class Software_TesterV1 extends Software_Tester implements iSoftware_Tester
{
    private $test_items = array('compare_strings'=>array(), 'compare_ints'=>array(), 'compare_floats'=>array());    //will have the test case arguments
    private $expected_results = array('compare_strings'=>array(), 'compare_ints'=>array(), 'compare_floats'=>array());  //will have the expected results of each test case (true | false)
    private $precision_values = array();  //will have the precision of each float value comparison

    function __construct(){

    }
    /*
     * purpose: after a test script is ran, clear_results() will erase any data pertaining to the most previous test that was ran
     */
    private function clear_results()
    {
        global $test_count, $passed_count, $failed_count;

        $test_count = $passed_count = $failed_count = 0;
    }
    /*
     * purpose: after a test script is ran, print_results() will print results pertaining to the most previous test that was ran
     */
    private function print_results()
    {
        global $test_count, $passed_count, $failed_count;

        $percentage_passed = ($passed_count/$test_count) * 100;
        echo "Total number of tests: $test_count\n";
        echo "Percentage passed: $percentage_passed%\n";
        echo "Total failed tests: $failed_count\n";
    }
    /*
     * purpose: a helper function for run_tests() which prevents repeating code
     * $array_name: "compare_floats" | "compare_ints" | "compare_strings"
     */
    private function test_array(string $array_name)
    {
        global $test_count, $passed_count, $failed_count;
        switch($array_name) {
            case "compare_strings":
                $function = "strs_equal";
                $is_float = FALSE;
                break;
            case "compare_ints":
                $function = "ints_equal";
                $is_float = FALSE;
                break;
            case "compare_floats":
                $function = "floats_equal";
                $is_float = TRUE;
                break;
        }

        foreach($this->test_items[$array_name] AS $item1 => $item2) {
            if (($array_name === "compare_floats") ? $this->$function($item1, $item2, current($this->precision_values)) === current($this->expected_results[$array_name]) : $this->$function($item1, $item2) === current($this->expected_results[$array_name])) {
                $passed_count++;
            } else {
                $opposite = (current($this->expected_results[$array_name]) ? "not" : "");
                echo "test case failed: $item1 did $opposite equal $item2\n";
                $failed_count++;
            }
            $test_count++;
            next($this->expected_results[$array_name]);
            if($is_float)
                next($this->precision_values);
        }
    }
    /*
     * purpose: after all test cases are inserted into their respective arrays, run_tests() will perform each test within each array
     */
    public function run_tests()
    {
        $this->test_array('compare_strings');
        $this->test_array('compare_ints');
        $this->test_array('compare_floats');

        $this->print_results();

        $this->clear_results();

    }
    /*
     * purpose: will erase all test cases within each array
     */
    public function clear_test_items()
    {
        $this->test_items = array('compare_strings'=>array(), 'compare_ints'=>array(), 'compare_floats'=>array());
        $this->expected_results = array();
    }
    /*
     * purpose: will print all test cases within each array
     */
    public function view_test_items()
    {
       foreach($this->test_items['compare_strings'] AS $str1 => $str2){
           echo $str1." => ".$str2."\n";
       }

       foreach($this->test_items['compare_ints'] AS $num1 => $num2){
            echo $num1." => ".$num2."\n";
        }

       foreach($this->test_items['compare_floats'] AS $num1 => $num2){
            echo $num1." => ".$num2."\n";
        }
    }
    /*
     * purpose: helper function for inserting test cases into their respective arrays
     */
    private function test_insertion_helper(string $array_name, $item1, $item2, bool $expectedResult)
    {
        $this->test_items[$array_name] += [$item1 => $item2];
        $this->expected_results[$array_name][] = $expectedResult;
    }
    /*
     * purpose: inserts a test case for string comparison within the compare strings array
     * $str1: A string for the test comparison
     * $str2: A second string for test comparison
     * $expected_result: the expected result from comparing the two strings
     */
    public function compare_strings(string $str1, string $str2, bool $expected_result)
    {
        $this->test_insertion_helper('compare_strings', $str1, $str2, $expected_result);
    }
    /*
     * purpose: inserts a test case for integer comparison within the compare integers array
     * $num1: An integer for the test comparison
     * $num2: A second integer for test comparison
     * $expected_result: the expected result from comparing the two strings
     */
    public function compare_ints(int $num1, int $num2, bool $expected_result)
    {
        $this->test_insertion_helper('compare_ints', $num1, $num2, $expected_result);
    }
    /*
     * purpose: inserts a test case for integer comparison within the compare integers array
     * $num1: A float for the test comparison
     * $num2: A second float for a test comparison
     * $expected_result: the expected result from comparing the two strings
     */
    public function compare_floats(float $num1, float $num2, bool $expected_result, int $precision = 2)
    {
        $this->test_insertion_helper('compare_floats', strval($num1), strval($num2), $expected_result);
        $this->precision_values[] = $precision;
    }
    /*
     * purpose: inserts a test case for verifying that a function returns the appropriate html code
     * $produced_html: the html code produced by a function
     * $expected_html: the desired html code
     */
    public function verify_html(string $produced_html, string $expected_html)
    {
        if(strpos($produced_html, "\n") !== 0) {
            $produced_html_lines = explode("\n", $produced_html);
            $expected_html_lines = explode("\n", $expected_html);

            for ($i = 0; $i < count($produced_html_lines); $i++){
                $this->compare_strings(trim($produced_html_lines[$i]), trim($expected_html_lines[$i]), TRUE);
            }
        } else {
           $this->compare_strings($produced_html, $expected_html, TRUE);
        }

    }

    public function remove_test_item()
    {
        // TODO: Implement remove_test_item()
        return true;
    }
    /*
     * purpose: compares two strings and returns 0 if they are equal, a non zero value otherwise
     */
    public function strs_equal(string $str1, string $str2):bool
    {
        return $str1 === $str2;
    }
    /*
     * purpose: compares two integers and returns 0 if they are equal, a non zero value otherwise
     */
    public function ints_equal(int $num1, int $num2):bool
    {
        return $num1 === $num2;
    }
    /*
     * purpose: compares two floats and returns 0 if they are equal, a non zero value otherwise
     */
    public function floats_equal(float $num1, float $num2, int $precision = 2):bool
    {
        return bccomp(strval($num1), strval($num2), $precision) === 0;
    }
}