<?php

//TODO: Add functionality to this class from the textbook
class Form
{
    private $content;
    private $attr;

    public function __construct(array $attr = [])
    {
        $this->attr = $attr;
    }

    public function add_to_form(string $html, bool $new_line = TRUE)
    {
        if($new_line) $this->content[] = $html."\n"; else $this->content[] = $html;
    }

    public function display_form(HTML $produce_html)
    {
        $form_content = "";
        foreach($this->content AS $html_line)
            $form_content .= $html_line;
        return $produce_html->insert_form(PHP_EOL.$form_content.PHP_EOL, $this->attr);
    }

}