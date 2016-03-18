<nav>
    <div class="nav-wrapper">
        <a href="<?= base_url(); ?>author/home" class="brand-logo">
            <img class="logo" src="<?= base_url(); ?>img/vs_logo.jpg">
        </a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li class="<?php if (isset($setProfileActive)) echo $setProfileActive; ?>" ><a href="<?= base_url(); ?>author/profile/<?= $this->session->userdata("authorUsername") ?>">Profile</a></li>
            <li class="<?php if (isset($setHomeActive)) echo $setHomeActive; ?>" ><a href="<?= base_url(); ?>author/home">Home</a></li>
            <li class="<?php if (isset($setComposeActive)) echo $setComposeActive; ?>"><a href="<?= base_url(); ?>author/compose">Compose</a></li>
            <li><a href="<?= base_url(); ?>author/logout">Logout</a></li>
        </ul>
    </div>
</nav>
