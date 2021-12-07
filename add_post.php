<!DOCTYPE html>
<html lang="en">

<?php include_once "parts/header.php"; ?>

<body>

<?php
include_once "parts/nav.php";

if(!isset($db)) {
    $db = new stdClass();
}
$id = $_GET['id'];
$categories = $db->getAllCategories();
?>

    <div class="page-heading">
        <div class="container">
            <div class="heading-content">
                <h1>Create new <em>Post</em></h1>
            </div>
        </div>
    </div>

    <div class="pricing-tables">
        <div class="container">
            <div class="col align-self-center">
                <div class="table-item" style="color: #fff; padding-bottom: 120px;">
                    <form action="insert_new_post.php" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputTitle">Title</label>
                                <input type="text" class="form-control" name="inputTitle" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputImage">Image</label>
                               <!-- <input type="text" class="form-control" name="inputImage" placeholder="img/image3.jpg" required> -->
                                <input type="file" lang="en" name="inputImage" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col" style="padding-left: 15px; padding-right: 15px">
                                <label for="inputPerex">Short text/description of post</label>
                                <input type="text" class="form-control" name="inputPerex" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col" style="padding-left: 15px; padding-right: 15px">
                                <label for="textAreaContent">Text in post</label>
                                <textarea name="textAreaContent" class="textAreaContent" required></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="optionCategory">Choose category of the photo:</label>
                            <select id="optionCategory" class="form-control" name="optionCategory" required>
                                <?php
                                foreach ($categories as $category) { ?>
                                    <option value="<?php echo $category['id']?>"><?php echo $category['cat_name']?></option>
                                <?php } ?>
                            </select>
                        </div>
                            <div class="form-group col-md-6">
                                <input type="hidden" name="inputUserId" value="<?php echo $id ?>">
                                <div class="simple-btn">
                                    <input type="submit" name="submit" value="Create post" id="btn-order">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include_once "parts/footer.php"; ?>
<?php include_once "parts/modal_menu.php"; ?>

</body>
</html>
