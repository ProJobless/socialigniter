<!--Sidebar-->
<aside>
    <?php if(!empty($modules)){
        foreach($modules as $module){
            if($module->module_position == 'right'){
                if($module->is_global == 1){
                    echo '<div class="mod_' . $module->module_position.'">';
                    //If "show_name" is enabled then display the module name heading
                    if($module->show_name == 1){
?>
                        <div class="heading-left">
                        <h3><?php echo $module->name; ?></h3>
                        </div><!--heading-left-->
                        <div class="<?php echo $module->class_suffix; ?>"></div><!--heading-line end-->
                        <div class="clr"></div>       
  <?php   
                    }
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
                 } else { //if not global
                     foreach($page_modules as $page_module){
                         if($module->id == $page_module->module_id){
                              echo '<div class="mod_' . $module->module_position.'">';
                               //If "show_name" is enabled then display the module name heading
                                if($module->show_name == 1){
?>
                                     <div class="heading-left">
                                    <h3><?php echo $module->name; ?></h3>
                                    </div><!--heading-left-->
                                    <div class="<?php echo $module->class_suffix; ?>"></div><!--heading-line end-->
                                    <div class="clr"></div>       
  <?php   
                                }
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
                         } //if page modules end
                     } //foreach end
                 } //if global end
          } //if position is right
        } //foreach module end
    } //if not empty end
    ?>
</aside>