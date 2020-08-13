<?php 
date_default_timezone_set("America/Costa_Rica");
$category = get_queried_object(); 
$default_date = isset($_GET['post_date']) ? $_GET['post_date'] : date('Y-m-d');
?>

<div class="col-12 mb-2 px-0">
    <form method="GET" id="post-categories-filter">
        <div class="">
            <input type="hidden" name="cat" value="<?php echo $category->term_id ?>">
            <input class="mb-2" type="date" name="post_date" value="<?php echo $default_date ?>">
            <button type="submit">Buscar</button>
        </div>
    </form>
</div>
