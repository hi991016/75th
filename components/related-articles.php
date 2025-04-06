    <?php
        require_once '../data.php';
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        // get related articles
        $related_articles = [];
        foreach ($posts as $post_id => $post) {
            if ($post_id != $id) {
                $related_articles[$post_id] = $post;
            }
        }
    ?>
    
    <div class="c-articles">
        <h2>Related Articles</h2>
        <div class="c-articles_list col2-sp">
            <?php if (!empty($related_articles)): ?>
                <?php foreach ($related_articles as $post_id => $post): ?>
                    <a href="/75th/details/?id=<?php echo $post_id; ?>" class="c-articles_items">
                        <figure>
                            <img class="lazy" data-src="<?php echo $post['thumbnail']; ?>" alt="<?php echo $post['title']; ?>"
                                width="447" height="298" loading="lazy" draggable="false">
                        </figure>
                        <h3 class="ttl"><?php echo $post['title']; ?></h3>
                        <p class="date"><?php echo $post['date']; ?></p>
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No related posts.</p>
            <?php endif; ?>
        </div>
    </div>