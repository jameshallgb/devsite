<div class="children">
    
    <?php
    if($post->post_parent)
    $children = wp_list_pages('title_li=&child_of='.$post->post_parent.'&echo=0'); else
    $children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0');
    if ($children) { ?>
    <div class="children__title">Additional Services</div>
    <ul class="children__list">
        <?php echo $children; ?>
    </ul>
    <?php  } ?>
   
</div>