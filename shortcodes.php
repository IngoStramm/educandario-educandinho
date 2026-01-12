<?php

add_shortcode('edu_post_date_filter', 'edu_post_date_filter');
function edu_post_date_filter()
{
    $output = '
    <form class="edu-post-date-filter" action="" method="get">
        <div class="edu-select">
            <button type="button" class="edu-select-btn">
                ' . edu_icon_up() . '
                ' . edu_icon_down() . '
                <span class="edu-select-btn-text">' . __('Mês', 'edu') . '</span>
            </button>
            <ul class="edu-select-list">
                <li data-value="01">' . __('Janeiro', 'edu') . '</li>
                <li data-value="02">' . __('Fevereiro', 'edu') . '</li>
                <li data-value="03">' . __('Março', 'edu') . '</li>
                <li data-value="04">' . __('Abril', 'edu') . '</li>
                <li data-value="05">' . __('Maio', 'edu') . '</li>
                <li data-value="06">' . __('Junho', 'edu') . '</li>
                <li data-value="07">' . __('Julho', 'edu') . '</li>
                <li data-value="08">' . __('Agosto', 'edu') . '</li>
                <li data-value="09">' . __('Setembro', 'edu') . '</li>
                <li data-value="10">' . __('Outubro', 'edu') . '</li>
                <li data-value="11">' . __('Novembro', 'edu') . '</li>
                <li data-value="12">' . __('Dezembro', 'edu') . '</li>
            </ul>
            <input type="hidden" name="edu-post-month" id="edu-post-month" required>
            <button type="button" class="edu-clear-btn">' . edu_icon_times() . '</button>
        </div>
        <div class="edu-select">
            <button type="button" class="edu-select-btn">
                ' . edu_icon_up() . '
                ' . edu_icon_down() . '
                <span class="edu-select-btn-text">' . __('Ano', 'edu') . '</span>
            </button>
            <ul class="edu-select-list">';
    $options = year_list_options();
    foreach ($options as $option) {
        $output .= "<li data-value='$option'>$option</li>";
    }
    $output .= '</ul>
            <input type="hidden" name="edu-post-year" id="edu-post-year" required>
            <button type="button" class="edu-clear-btn">' . edu_icon_times() . '</button>
        </div>
        <button type="submit" class="edu-search-btn" id="edu-search-btn">
            ' . edu_icon_magnifying_glass() . '
            <span>' . __('Pesquisar', 'edu') . '</span>
        </button>
    </form>
    ';
    return $output;
}
