<?php
    require_once '../data.php';
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    if (isset($posts[$id])) {
        $thumb_articles = $posts[$id]['thumbnail'];
        $title_articles = $posts[$id]['title'];
        $date_articles = $posts[$id]['date'];
        $content_file = $posts[$id]['content_file'];
        if (file_exists("../$content_file")) {
            $content = file_get_contents("../$content_file");
        } else {
            $content = 'No content found.';
        }
    } else {
        $title_articles = 'No posts found';
        $content = 'The article does not exist.';
    }

    // Lấy danh sách bài viết liên quan
    $related_articles = [];
    foreach ($posts as $post_id => $post) {
        if ($post_id != $id) {
            $related_articles[$post_id] = $post;
        }
    }
?>
<?php $title_page = $title_articles; ?>

<?php include('../components/header.php') ?>

    <!-- @main -->
    <main class="detailspage" id="detailspage">
        <!-- detail// -->
        <section class="detail">
            <div class="detail_container">
                <div class="detail_inner">
                    <div class="detail_entry">
                        <div class="detail_heading">
                            <h2><?php echo $title_articles; ?></h2>
                            <p><?php echo $date_articles; ?></p>
                        </div>
                        <figure class="detail_thumb">
                            <img class="lazy" data-src="<?php echo $thumb_articles; ?>" alt="<?php echo $title_articles; ?>" width="980"
                                height="654" loading="lazy" draggable="false">
                        </figure>
                        <div class="detail_content">
                            <?php echo $content; ?>
                    </div>
                    <div class="detail_controls">
                        <a href="/75th/#list">記事一覧に戻る</a>
                    </div>
                </div>
                <div class="detail_related">
                    <div class="detail_articles">
                        <?php include('../components/related-articles.php') ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- detail// -->
    </main>
    <!-- @@main -->

<?php include('../components/footer.php') ?>

<?php include('../components/endtag.php') ?>