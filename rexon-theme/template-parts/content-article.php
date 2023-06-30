<div class="container">
<header class="content-header">
	<div class="meta mb-3">
		<span class="date"><?php the_date();?></span>
		<?php
			the_tags('<span class="tag"><i class="fa fa-tag"></i>','</span><span class="tag"><i class="fa fa-tag"></i>','</span>');
		?>
		<span class="comment"><a href="<?php get_permalink() ?>"><i class='fa fa-comment'></i> <?php comments_number();?></a></span>
	</div>
</header>
<?php
the_content();
?>
<?php
    if (comments_open())
        comments_template();
?>
</div>
