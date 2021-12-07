<!DOCTYPE html>
<html lang="en">

<?php include_once "parts/header.php"; ?>

<body>

<?php
include_once "parts/nav.php";

if(!isset($db)) {
    $db = new stdClass();
}

$photos = $db->getAllPhotos();
$formats = $db->getAllFormats();
?>

<div class="page-heading">
    <div class="container">
        <div class="heading-content">
            <h1>Buy our <em>PHOTOS</em></h1>
        </div>
    </div>
</div>

<div class="pricing-tables">
    <div class="container">
        <div class="col align-self-center">
            <div class="table-item" style="color: white">
                <form action="create_order.php" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputFirstName">First name</label>
                            <input type="text" class="form-control" name="inputFirstName" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputLastName">Last name</label>
                            <input type="text" class="form-control" name="inputLastName" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8" style="padding-left: 15px">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" name="inputEmail" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPhoneNumber">Phone number</label>
                            <input type="tel" class="form-control" name="inputPhoneNumber" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col" style="padding-left: 15px; padding-right: 15px">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" name="inputAddress" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">City</label>
                            <input type="text" class="form-control" name="inputCity" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">Country</label>
                            <input type="text" class="form-control" name="inputCountry" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">Postcode</label>
                            <input type="text" class="form-control" name="inputPostcode" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPhoto">Choose photo:</label>
                            <select id="inputPhoto" class="form-control" name="optionPhotoName">
                                <?php
                                foreach ($photos as $photo) { ?>
                                    <option value="<?php echo $photo['photo_name']?>"><?php echo $photo['photo_name']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputFormat">Choose format of the photo:</label>
                            <select id="inputFormat" class="form-control" name="optionFormatSize">
                                <?php
                                foreach ($formats as $format) { ?>
                                    <option value="<?php echo $format['size']?>"><?php echo $format['size']?> (<?php echo $format['price'] ?>€)</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkFrame" name="checkFrame" value="1">
                            <label class="form-check-label" for="checkFrame">Frame for photo (+ 5€)</label>
                        </div>
                    </div>
                    <div class="simple-btn">
                        <input type="submit" name="submit" value="Order" id="btn-order">
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
