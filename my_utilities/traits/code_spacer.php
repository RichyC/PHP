<?php

trait code_spacer{

    public $tab_spacing = 1;

    /*
     * purpose: keeps track of the tab spaces being used for the DOM child nodes
     * $level_up[bool] = TRUE if the following nodes will be parents, FALSE if the following nodes will be siblings
     * $level[int] = the number of parents until its parent is a direct child of the "id = 'content'" div
     */
    public function use_tab(int $spaces, bool $remove_a_tab = FALSE)
    {
        if($spaces >= 1){
            return "\t".$this->use_tab($remove_a_tab, $spaces - 1);
        } else {
            if($remove_a_tab) $this->tab_spacing--;
            return "";
        }
    }

    /*
     * purpose: helps format the produced html code by adding appropriate tab spacing
     * precondition: $tabs variable exists
     */
    public function add_tab()
    {
        $this->tab_spacing++;
    }
}
