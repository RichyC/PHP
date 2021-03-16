<?php

//TODO: complete and test the uncompleted methods
require_once('Menu.php');

/*
 * Navigation_Menu extends the "Menu" class and is implemented to produce navigation menus for websites
 */
class Navigation_Menu extends Menu
{
    use code_spacer;
    /*
     * purpose: constructor for navigation menu object
     * $menu_items[array]: an array where key[string]:link title => value[string]:url link
     */
    public function __construct(array $menu_items){
       $this->options = $menu_items;
    }

    /*
     * purpose: returns html code for a navigation menu based on the items within the $options array
     * output: string
     */
    public function print_ul_menu(array $ul_attrs = [], array $li_attrs = [])   //attributes are printed in a queue fashion where the first attributed inserted is the first one out
    {
        $this->add_tab();
        $this->add_tab();
        $ul_content= "";
        $nav_content= "";
        $li_attributes = function ($li_attrs) {
            if(empty($li_attrs)) {
                return [];
            } else {
                $attrs = current($li_attrs);
                next($li_attrs);
                return $attrs;
            }
        };

        $this->add_tab();

        foreach($this->options AS $link_title => $link) {
            $list_items[] = $this->insert_tag("a", ["href" => $link] , $this->insert_h2($link_title, []));
        }

        foreach($list_items AS $list_item) {
            if ($list_item === end($list_items)) {
                $ul_content .= $this->use_tab(TRUE, $this->tab_spacing)."-->" . $this->insert_tag("li", $li_attributes($li_attrs), $list_item) . "\n".$this->use_tab(FALSE, $this->tab_spacing);
            } else {
                ($list_item === $list_items[0]) ? $ul_content .= $this->use_tab(FALSE, $this->tab_spacing).$this->insert_tag("li", $li_attributes($li_attrs), $list_item) . "<!--\n" : $ul_content .= $this->use_tab(FALSE, $this->tab_spacing)."-->" . $this->insert_tag("li", $li_attributes($li_attrs), $list_item) . "<!--\n";
            }
        }

        $nav_content .= "\n".$this->use_tab(TRUE, $this->tab_spacing).$this->insert_tag("ul", $ul_attrs, "\n".$ul_content)."\n".$this->use_tab(FALSE, $this->tab_spacing);

        return $this->insert_tag("nav", [], $nav_content);
    }

    /*
     * purpose: adds a navigation route to the $options array
     * input:
     *      $item_name: the name, which would be presented to the user, representing a particular navigation item
     *      $item_link: the path, which will be be "href" attribute of an "a" tag, representing a particular navigation item
     * postcondition: $options array has another index added to it where the key is the $item_name and the value is the $item_link
     */
    public function add_navigation_item(string $item_name, string $item_link)
    {
        $this->options[$item_name] = $item_link;
    }

    /*
     * purpose: removes a navigation route from the $options array
     * input:
     *      $item_name: the key representing the name of the navigation item to be removed
     * precondition: $options array must have an index key value that equal $item_name
     * postcondition: count($options) = (count($options) - 1) and a key that equals $item_name is not within the array
     */
    public function remove_navigation_item(string $item_name)
    {
        unset($this->options[$item_name]);
    }
}