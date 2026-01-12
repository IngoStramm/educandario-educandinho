<?php
function edu_debug($debug)
{
    echo '<pre>';
    var_dump($debug);
    echo '</pre>';
}

function edu_get_oldest_post_year()
{
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 1,
        'order'          => 'ASC',
        'orderby'        => 'date',
    );
    $oldest_post = get_posts($args);
    $year = date('Y');
    if (! empty($oldest_post)) {
        $first_post_date = $oldest_post[0]->post_date;
        $year = date('Y', strtotime($first_post_date));
    }
    return (int)$year;
}

function year_list_options()
{
    $options = [];
    $start_year = edu_get_oldest_post_year();
    $curr_year = date('Y');
    $year_count = (int)$curr_year;
    while ($year_count >= $start_year) {
        $options[] = $year_count;
        $year_count--;
    }
    return $options;
}
