<?php if(!empty($modules)){
        foreach($modules as $module){
            if($module->module_position == 'header_right'){
                echo '<div class="mod_' . $module->module_position  . ' ' . $module->class_suffix . '">';
                    //If "show_name" is enabled then display the module name heading
                    if($module->show_name == 1) 
                        echo '<h3>'.$module->name.'</h3>';
                    //If it is a straight html module with no php
                    if($module->is_editable){
                        echo $module->content;
                    } else {
                        //Get the view name from the module name
                        $mod_view = strtolower(str_replace(' ','_',$module->name));
                        //Load the modules view file
                        $this->load->view("public/modules/mod_$mod_view"); 
                    }
               echo '</div>';
            } //if position is right
        } //foreach module end
    } //if not empty end
?>
