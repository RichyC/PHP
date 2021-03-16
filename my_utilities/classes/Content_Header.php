<?php

//TODO: Add functionality to this class
class Content_Header
{
    public $header_content;

    /*
     * purpose: constructor for Content_Header object
     * $header_content[array]: a numerical array where each index is separated by a new line
     */
    public function __construct()
    {

    }

    /*
     * purpose: add html code to the $header_content array, and a new line character after the html code added
     * $html: the line or lines of html code to be added to $header_content
     * precondition: must be valid html code
     * postcondition: web browser will render the html code
     */
    public function add_to_header(string $html, bool $new_line = TRUE)
    {
        if($new_line) $this->header_content[] = $html."\n"; else $this->header_content[] = $html;
    }

    /*
     * purpose: prints html code that represents the entire header
     * output: [string]
     */
    public function print_header()
    {
        foreach($this->header_content AS $html_code)  //returns an html family, as in parent node and its children nodes
            echo $html_code;
    }
}