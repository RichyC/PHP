<?php


/*
 * Page_Content is a class that extends the HTML_Page to return html code that is specific towards an html
 * tag element and/or returns the html code for a specific webpage content
 */
class Page_Content
{
    public $content = [];

    public function __construct()
    {

    }

    public function add_to_content(string $html, bool $new_line = TRUE)
    {
        if($new_line) $this->content[] = $html."\n"; else $this->content[] = $html;
    }

    public function print_content()
    {
        foreach($this->content AS $html_family)
            echo "$html_family\n";
    }

}