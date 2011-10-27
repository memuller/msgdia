<?php
/**
Template Name: Arquivos */
get_header(); ?> 

	<section id="list-post" class="box">
		<?php global $post; 
            $previous_year = $year = 0;
            $previous_month = $month = 0;
            $ul_open = false;
            $myposts = get_posts('numberposts=-1&orderby=post_date&order=DESC&category_name=mensagem');?>
 
		<?php foreach($myposts as $post) : setup_postdata($post);?>	
 
		<?php
        $year = mysql2date('Y', $post->post_date);
        $month = mysql2date('n', $post->post_date);
        $day = mysql2date('j', $post->post_date);
        ?>
 
		<?php if($year != $previous_year || $month != $previous_month) : ?>
		<?php if($ul_open == true) : ?>
            </ul>
		<?php endif; ?>
        <div class="content-box">
        <br />
		<h2><?php the_time('F Y'); ?></h2>
        <hr />
			<ul class="list_post_anim">
			<?php $ul_open = true; ?>
            <?php endif; ?>
            <?php $previous_year = $year; $previous_month = $month; ?>
                <li class="box-post" id="post-<?php the_ID(); ?>">
					<time><?php the_time('d/m/Y' ) ?>&nbsp;&nbsp;-&nbsp;&nbsp;</time>
                    <h2><a class="link" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                </li> 
            <?php endforeach; ?>
		</ul>
        <hr />
        
        <p><a href="<?php echo get_option('home'); ?>" title="<?php bloginfo('description'); ?>">&laquo; clique aqui</a> para retornar a mensagem do dia.</p>

        </div>
    </section>

<?php get_footer(); ?> 
