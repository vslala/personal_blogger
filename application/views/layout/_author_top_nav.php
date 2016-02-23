<div class="pure-g">
    <div class="pure-u-1">
        <nav class="nav-container">
            <div class="menu">
                <span class="menu-left">
                    <img src="<?= base_url(); ?>img/vs_logo.jpg" class="pure-img logo">
                </span>
                <ul class="menu-group">
                    <li class="<?php if(isset($setHomeActive)) echo 'active'; ?> menu-item"><a href="<?= base_url(); ?>author/home">Home</a></li>
                    <li class="<?php if(isset($setComposeActive)) echo 'active'; ?> menu-item"> <a href="<?= base_url(); ?>author/compose">Compose</a> </li>
                    <li class="menu-item"><a href="<?= base_url(); ?>author/logout">Logout</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<hr />