<?php
if(!isset($article)) {
    $article = [];
}
?>

<div class="blog-post">
    <img src="<?php echo $article['image']; ?>" alt="">
    <div class="text-content">
        <span><a><?php echo $article['username']; ?></a> / <a><?php echo date("d.m.Y", strtotime($article['created_at'])); ?></a> / <a><?php echo $article['category']; ?></a></span>
        <h2><?php echo $article['title']; ?></h2>
        <p><?php echo $article['perex']; ?></p>
        <div class="simple-btn">
            <a href="single-post.php?id=<?php echo $article['id']; ?>">continue reading</a>
        </div>
    </div>
</div>
