<?php
/**
 * Пример вывода запланированных записей
**/

	$futurePosts = new WP_Query('showposts=3&post_type=event&post_status=future');
	while($futurePosts->have_posts()){ $futurePosts->the_post();  ?>

	<a href="<?php the_permalink(); ?>">
		<?php the_title(); ?>
	</a>

<?php } ?>

<?php 
/**
 * Перевод для Polylang
**/

	$curlang = pll_current_language();

		if ($curlang=='en') {
		  echo the_title();
		}
		elseif ($curlang=='ru') {
		  echo the_title();
		}
?>

<?php 
/**
 * Вывод произвольных полей из записи/страницы
**/

	echo get_post_meta($post->ID, 'Название произвольного поля', true); 
?>

<?php
/**
 * Вывод записей из Custom post types
**/

	$args = array(
	  'post_type' => 'name'
	);
	$my_posts = get_posts( $args );
	foreach ($my_posts as $post) :
	setup_postdata($post);
?>

	<a href="<?php the_permalink(); ?>">
		<?php the_title(); ?>
	</a>

<?php endforeach; ?>