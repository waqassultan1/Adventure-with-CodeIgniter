<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="center_content">
<div class="center_title_bar"><?php echo $title; ?></div>
<div style="clear:both;"></div>
<div class="main" style="clear:both;margin-bottom: 220px;">
    <li><a href="<?php echo base_url(); ?>admin/manage-pages.html">Manage Pages</a></li>
    <li><a href="<?php echo base_url(); ?>admin/manage-products.html">Manage Products</a></li>
    <li><a href="<?php echo base_url(); ?>admin/manage-orders.html">Manage Orders</a></li>
    <li><a href="<?php echo base_url(); ?>admin/profile.html">Profile</a></li>
    <li></li>
    <li><a href="<?php echo base_url(); ?>admin/logout.html" style="color:red;">Logout</a></li>
</div>