<?php

//TODO: Add functionality to this class
class Page_Header
{
    private $page_title;
    private $meta_elements = [];
    private $stylesheets = [];
    private $link_elements = [];
    private $js_scripts = [];

    /*
     * $page_title: Title of the page to be placed within "<title></title>" tags
     * $page_stylesheet_path: If webpage object has a stylesheet tailored for it, then this is the path. Otherwise, an empty string
     * $page_js_path: If webpage object has a script tailored for it, then this is the path. Otherwise, an empty string
     */
    public function __construct(string $page_title, string $page_stylesheet_path = "", string $page_js_path = "")
    {
        $this->page_title = $page_title;
        if($page_stylesheet_path !== "") $this->insert_stylesheet($page_stylesheet_path);
        if($page_js_path !== "") $this->insert_js($page_js_path);
    }
    /*
     * purpose:returns the page title
     */
    public function get_page_title()
    {
        return $this->page_title;
    }
    /*
     * purpose:sets the page title to $page_title
     * $page_title: new page title
     */
    public function set_page_title(string $page_title)
    {
        $this->page_title = $page_title;
    }
    /*
     * purpose: returns a meta element for containing the attributes within "$attr_array"
     * $attr_array: key[string]:attribute name / value[string]: attribute value
     */
    public function insert_meta(HTML $produce_html, array $attr_array)
    {
        $this->meta_elements[] = $produce_html->insert_tag("meta", $attr_array);
    }
    /*
     * purpose: returns the meta tag for responsive web design
     */
    public function insert_rwd_meta(HTML $produce_html)
    {
        $this->insert_meta($produce_html, ['name' => 'viewport', 'content' => 'width=device-width,initial-scale=1.0']);
    }
    /*
     * purpose: inserts a stylesheet into the stylesheets array
     */
    public function insert_stylesheet(string $stylesheet_path)
    {
        $this->stylesheets[] = $stylesheet_path;
    }
    /*
     * purpose: inserts a script into the scripts array
     */
    public function insert_js(string $js_script_path)
    {
        $this->js_scripts[] = $js_script_path;
    }
    /*
     * purpose: inserts an html link element into the link_elements array
     */
    public function add_link(HTML $produce_html, array $attr_array)
    {
        $this->link_elements[] = $produce_html->insert_link($attr_array);
    }
    /*
     * purpose: returns true if there are meta elements, false if there are no meta elements
     * output: boolean
     */
    public function has_meta_elements()
    {
        return !empty($this->meta_elements);
    }
    /*
     * purpose: returns true if there are link elements, false if there are no link elements
     * output: boolean
     */
    public function has_link_elements()
    {
        return !empty($this->link_elements);
    }
    /*
     * purpose: returns true if there are stylesheets, false if there are no stylesheets
     * output: boolean
     */
    public function has_stylesheets()
    {
        return !empty($this->stylesheets);
    }
    /*
     * purpose: returns true if there are javascript scripts, false if there are none
     * output: boolean
     */
    public function has_scripts()
    {
        return !empty($this->js_scripts);
    }
    /*
     * purpose: returns all array keys and values, where keys are the attribute names and values are the attribute values, as html meta elements
     */
    public function print_meta_elements(HTML $produce_html)
    {
        foreach($this->meta_elements AS $the_meta_element)
            echo $produce_html->use_tab(FALSE, $produce_html->tab_spacing)."$the_meta_element\n";
    }
    /*
     * purpose: returns all array keys and values, where keys are the attribute names and values are the attribute values, as html link elements
     */
    public function print_link_elements(HTML $produce_html)
    {
        foreach($this->link_elements AS $the_link_element)
            echo $produce_html->use_tab(FALSE, $produce_html->tab_spacing)."$the_link_element\n";
    }
    /*
     * purpose: returns all stylesheets as html link elements
     */
    public function print_stylesheets(HTML $produce_html)
    {
        foreach($this->stylesheets AS $stylesheet)
            echo $produce_html->use_tab(FALSE, $produce_html->tab_spacing).$produce_html->insert_stylesheet($stylesheet)."\n";
    }
    /*
     * purpose: returns all javascript scripts as script elements
     */
    public function print_scripts(HTML $produce_html)
    {
        foreach($this->js_scripts AS $script)
            echo $produce_html->insert_script($script);
    }

}