<?php
    $file_name = $this->session->userdata('user_id');
    // set file path
    $files = "./$file_name.txt";

?>
 
<div class="page-sidebar sidebar horizontal-bar">
    <div class="page-sidebar-inner">
        <ul class="menu accordion-menu">
            <li class="nav-heading"><span>Navigation</span></li>

            <?php
                // checking file size
               // if(filesize($files)==0) {

                //} // end checking file size
                //else { // checking file size
                    //
                    $file = fopen($files, "r");
                    while (!feof($file)) {
                        echo fgets($file);
                    }
                    fclose($file);
               // }
            ?>

        </ul>
    </div><!-- Page Sidebar Inner-->
</div>

