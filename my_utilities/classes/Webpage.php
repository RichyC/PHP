<?php


class Webpage
{
    public $page_header;        //Page_Header object

    public $page_content;       //Page_Content object

    public function __construct(Page_Header $page_header, Page_Content $page_content) //Edit "Page_Content" class to allow for printing of Page_content
    {
        $this->page_header = $page_header;
        $this->page_content = $page_content;
    }

    public function display_page(HTML $produce_html)
    {
        $this->page_content->print_content();
    }

    public function print_page_title()
    {
        echo $this->page_header->get_page_title();
    }

    public function print_meta_elements(HTML $produce_html)
    {
        if($this->page_header->has_meta_elements()) $this->page_header->print_meta_elements($produce_html);
    }

    public function print_link_elements(HTML $produce_html)
    {
        if($this->page_header->has_link_elements()) $this->page_header->print_link_elements($produce_html);
    }

    public function print_stylesheets(HTML $produce_html)
    {
        if($this->page_header->has_stylesheets()) $this->page_header->print_stylesheets($produce_html);
    }

    public function print_scripts(HTML $produce_html)
    {
        if($this->page_header->has_scripts()) $this->page_header->print_scripts($produce_html);
    }

}