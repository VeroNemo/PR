<?php
if (!isset($menus)) {
    $menus = [];
}
?>


<!-- Modal Log In-->
<div id="modalLogIn" class="modal">
    <!-- Modal Log In Content -->
    <div class="modalLogIn-content">
        <!-- Modal Log In Header -->
        <div class="modal-header">
            <h3 class="header-title">Log <em>in</em></h3>
            <div class="close-btn"><img src="img/close_contact.png" alt=""></div>
        </div>
        <!-- Modal Log In Body -->
        <div class="modal-body">
            <div class="col-md-6 col-md-offset-3">
                <form id="contact" action="./accept_logIn.php" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <input name="email" type="email" class="form-control" id="email" placeholder="Your email..." required>
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <input name="passwd" type="password" class="form-control" id="passwd" placeholder="Your password..." required>
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <button type="submit" name="submit" id="formLogIn-submit" class="btn">Ok</button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal button -->
<div class="popup-icon">
    <button id="modBtn" class="modal-btn"><img src="img/contact-icon.png" alt=""></button>
</div>

<!-- Modal -->
<div id="modal" class="modal">
    <!-- Modal Content -->
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h3 class="header-title">Send us <em>Message</em></h3>
            <div class="close-btn"><img src="img/close_contact.png" alt=""></div>
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
            <div class="col-md-6 col-md-offset-3">
                <form id="contact" action="./insert_message.php" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required="">
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <input name="email" type="email" class="form-control" id="email" placeholder="Your email..." required="">
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required=""></textarea>
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <button type="submit" id="form-submit" class="btn" name="submit">Send Message Now</button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<section class="overlay-menu">
    <div class="container">
        <div class="row">
            <div class="main-menu">
                <ul>
                    <?php foreach ($menus as $menu) { ?>
                    <li>
                        <a href="<?php echo $menu['path']; ?>"><?php echo $menu['item_name']; ?></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</section>