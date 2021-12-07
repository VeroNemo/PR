<!DOCTYPE html>
<html lang="en">

<?php
include_once "parts/header.php";

if(isset($db)) {
    $articles = $db->getAllArticles();
    $archivesDates = $db->getArchivesByDate();
    $archivesCategories = $db->getArchivesByCategory();
    $archivesAuthor = $db->getArchivesByAuthor();
    $recentPosts = $db->getRecentPosts();
    //  var_dump($articles);
    //  die();
} else {
    $db = new stdClass();
    $articles = [];
    $archivesDates = [];
    $archivesCategories = [];
    $archivesAuthor = [];
    $recentPosts = [];
}
?>

<body>

<?php include_once "parts/nav.php"; ?>

    <div class="page-heading">
        <div class="container">
            <div class="heading-content">
                <h1>Our <em>Blog</em></h1>
            </div>
        </div>
    </div>


    <div class="blog-entries">
        <div class="container">
            <div class="col-md-9">
                <div class="blog-posts">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                                foreach ($articles as $article) {
                                    include "parts/articles.php";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="side-bar">
                    <div class="archives">
                        <div class="sidebar-heding">
                            <h2>Archives</h2>
                        </div>
                        <ul>
                            <?php foreach ($archivesDates as $archiveDate) { ?>
                                <li><a href="archives.php?created_at=<?php echo $archiveDate['created_at']?>">> <?php echo date("Y, F", strtotime($archiveDate['created_at'])); ?> (<?php echo $archiveDate['countCA'];?>)</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="recent-posts">
                        <div class="sidebar-heding">
                            <h2>Recent Posts</h2>
                        </div>
                        <ul>
                            <?php foreach ($recentPosts as $recentPost) { ?>
                            <li>
                                <a href="single-post.php?id=<?php echo $recentPost['id']; ?>" style="display: flex">
                                <img src="<?php echo $recentPost['image']; ?>" style="width: 60px; height: 60px">
                                <div class="text">
                                    <h6><?php echo $recentPost['title']; ?></h6>
                                    <span><?php echo date("jS F, Y", strtotime($recentPost['created_at'])); ?></span>
                                </div>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="categories">
                        <div class="sidebar-heding">
                            <h2>Categories</h2>
                        </div>
                        <ul>
                            <?php foreach ($archivesCategories as $archiveCategory) { ?>
                                <li><a href="archives.php?category=<?php echo $archiveCategory['category']?>">> <?php echo $archiveCategory['category']; ?> (<?php echo $archiveCategory['countC'];?>)</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="categories">
                        <div class="sidebar-heding">
                            <h2>Authors</h2>
                        </div>
                        <ul>
                            <?php
                            foreach ($archivesAuthor as $archiveAuthor) { ?>
                                <li><a href="archives.php?user_name=<?php echo $archiveAuthor['userName']?>">> <?php echo $archiveAuthor['userName']; ?> (<?php echo $archiveAuthor['countA'];?>)</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include_once "parts/footer.php"; ?>
    <?php include_once "parts/modal_menu.php"; ?>

</body>
</html>