<?php




abstract class Software_Tester
{

    //The total number of tests performed
    protected $test_count = 0;
    //The total number of tests passed
    protected $passed_count = 0;
    //The total number of tests failed
    protected $failed_count = 0;

    public function get_test_count()
    {
        return $this -> test_count;
    }

    public function get_passed_count()
    {
        return $this -> passed_count;
    }

    public function get_failed_count()
    {
        return $this -> failed_count;
    }

}