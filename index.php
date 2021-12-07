<!DOCTYPE html>
<html lang="en">

<?php
include_once "parts/header.php";

if(isset($db)) {
    $photos = $db->getAllPhotos();
    $count = 0;
} else {
    $db = new stdClass();
    $photos = [];
}
?>

<body>

<?php include_once "parts/nav.php"; ?>

    <div id="video-container">
        <div class="video-overlay"></div>
        <div class="video-content">
            <div class="inner">
              <h1>Welcome to <em>Happy Lens</em></h1>
            </div>
        </div>
        <video autoplay="" loop="" muted>
        	<source src="film.mp4" type="video/mp4" />
        </video>
    </div>


<div class="masonry-portfolio" id="masonry">
    <div class="container-fluid">
        <div class="masonry">
            <?php for($i = 1; $i <= 4; $i++) { ?>
                <div class="row" style="display: contents">
                    <?php for($j = 1; $j <= 3; $j++) { ?>
                        <div class="item col-md-4">
                            <a href="<?php echo $photos[$count]['photo_path'] ?>" data-lightbox="image-1"><div class="thumb">
                                <div class="hover-effect">
                                    <div class="hover-content">
                                        <p style="font-size: 20px"><?php echo $photos[$count]['photo_name'] ?></p>
                                    </div>
                                </div>
                                <div class="image">
                                    <img src="<?php echo $photos[$count]['photo_path'] ?>">
                                </div>
                            </div>
                            </a>
                        </div>
                    <?php
                    $count++;
                    } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php include_once "parts/footer.php"; ?>
<?php include_once "parts/modal_menu.php"; ?>

</body>
</html>