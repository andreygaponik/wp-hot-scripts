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

<?php 
/**
 * Хлебные крошки с переводом
**/

	$curlang = pll_current_language();

	if ($curlang=='en') {
	  $lang = 'Home';
	}
	elseif ($curlang=='ru') {
	  $lang = 'Главная';
	}
	elseif ($curlang=='pl') {
	  $lang = 'Główny';
	}
	elseif ($curlang=='be') {
	  $lang = 'Галоўная';	
	}

	if( function_exists('kama_breadcrumbs') ){

		$myl10n = array(
			'home'       => $lang
		);

		kama_breadcrumbs(' > ', $myl10n );
	}
?>

<?php 
/**
 * Просмотр документов в браузере
**/
?>
<a href="http://docs.google.com/gview?url=<?php echo $link ?>" target="_blank" title="">Документ</a>
