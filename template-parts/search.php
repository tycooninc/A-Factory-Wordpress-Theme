<?php
$keyword = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';

$args = array(
    'post_type'      => array('post', 'products', 'downloads'),
    'post_status'    => 'publish',
    's'              => $keyword,
    'posts_per_page' => -1,
    'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
);

$search_query = new WP_Query($args);
?>

<div class="page-box search-wrapper">
		<div class="w1200">
			<div class="result">
				<span>Search keywords:<b><?php echo $_GET['s'];?></b></span>
				<span><b><?php echo $search_query->found_posts;?></b>  result in total</span>
			</div>
			<div class="list">

                <?php if ($search_query->have_posts()) : ?>

				<ul>
                    <?php while ($search_query->have_posts()) : $search_query->the_post(); ?>
					<li>
						<a href="<?php the_permalink(); ?>">
							<div class="title"><?php the_title(); ?></div>
						</a>
					</li>
                    <?php endwhile; ?>
				</ul>

                <?php else : ?>
                <p>No results found.</p>
                <?php endif; ?>
			</div>
		</div>
</div>