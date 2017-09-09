<?php
/**
 * Created by PhpStorm.
 * User: pakholeung
 * Date: 8/13/17
 * Time: 1:24 PM
 */
?>
<h2><?php echo $title; ?></h2>

<?php foreach ($news as $news_item): ?>

    <h3><?php echo $news_item['title']; ?></h3>
    <div class="main">
        <?php echo $news_item['text']; ?>
    </div>
    <p><a href="http://<?php echo site_url('news/'.$news_item['slug']); ?>">View article</a></p>

<?php endforeach; ?>
