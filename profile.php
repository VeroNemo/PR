<!DOCTYPE html>
<html lang="en">

<?php include_once "parts/header.php"; ?>

<body>

<?php
include_once "parts/nav.php";

if(!isset($db)) {
    $db = new stdClass();
    $articles = [];
}
if(isset($_GET['post-id'])) {
    $postId = $_GET['post-id'];
    $articleById = $db->getArticle($postId);
    $categories = $db->getAllCategories();
}
$id = $_GET['id'];      //author id
$articles = $db->getArticlesByAuthorId($id);
$authorName = $db->getAuthorName($id);

?>

    <div class="page-heading">
        <div class="container">
            <div class="heading-content">
                <h1>Welcome <em><?php echo $authorName ?></em></h1>
            </div>
        </div>
    </div>

<?php if(!isset($postId)) {?>
    <div class="blog-entries">
        <div class="container">
            <div class="col">
                <div class="blog-posts">
                    <div class="row">
                        <div class="col-md-12">
                            <?php foreach ($articles as $article) { ?>
                                <div class="blog-post">
                                    <img src="<?php echo $article['image']; ?>" alt="">
                                    <div class="text-content">
                                        <span><a><?php echo $article['username']; ?></a> / <a><?php echo date("d.m.Y", strtotime($article['created_at'])); ?></a> / <a><?php echo $article['category']; ?></a></span>
                                        <h2 data-title="<?php echo $article['title']; ?>"><?php echo $article['title']; ?></h2>
                                        <p><?php echo $article['perex']; ?></p>
                                        <br>
                                        <p><?php echo $article['content']; ?></p>
                                        <div class="simple-btn">
                                            <div>
                                            <a id="formBtnEditPost" href="profile.php?id=<?php echo $id ?>&post-id=<?php echo $article['id'] ?>">Edit Post</a>
                                            </div>
                                            <div>
                                                <input type="hidden" name="userId" value="<?php echo $id ?>">
                                                <a id="formBtnEditPost" href="delete_post.php?user-id=<?php echo $id ?>&post-id=<?php echo $article['id'] ?>" style="float: right">Delete Post</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php }else { ?>
    <div class="pricing-tables">
        <div class="container">
            <div class="col align-self-center">
                <div class="table-item" style="color: #fff; padding-bottom: 120px;">
                    <form action="edit_post.php" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputTitleEdit">Title</label>
                                <input type="text" class="form-control" name="inputTitleEdit" value="<?php echo $articleById['title'] ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputImageEdit">Image path</label>
                                <input type="hidden" class="form-control" name="inputImageEdit" value="<?php echo $articleById['image'] ?>">
                                <input type="file" name="inputFileImageEdit">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col" style="padding-left: 15px; padding-right: 15px">
                                <label for="inputPerexEdit">Short text/description of post</label>
                                <input type="text" class="form-control" name="inputPerexEdit" value="<?php echo $articleById['perex'] ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col" style="padding-left: 15px; padding-right: 15px">
                                <label for="textAreaContentEdit">Text in post</label>
                                <textarea name="textAreaContentEdit" class="textAreaContent"><?php echo $articleById['content'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="optionCategoryEdit">Choose category of the photo:</label>
                                <select id="optionCategory" class="form-control" name="optionCategoryEdit">
                                    <?php
                                    foreach ($categories as $category) { ?>
                                        <option value="<?php echo $category['id']?>"><?php echo $category['cat_name']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="hidden" name="inputUserId" value="<?php echo $id ?>">
                                <input type="hidden" name="inputPostId" value="<?php echo $postId?>">
                                <div class="simple-btn">
                                    <input type="submit" name="submit" value="Edit" id="btn-edit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}

include_once "parts/footer.php";
include_once "parts/modal_menu.php";
?>

</body>
</html>

