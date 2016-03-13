<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="google-site-verification" content="cSK9weoz0MQ8vZbMeZt-7fKLMnWDPJ7J2etgdC5Qq68" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-site-verification" content="RO_vBaO4_FhngXcvq35pEgAVAHsbHtl1FjsmpxXcLQo" />
        <meta name="msvalidate.01" content="9A742AD490D0DC47C3C133D37576AAE2" />

        <link rel="shortcut icon" href="<?= base_url(); ?>img/vs_logo.jpg" />
        <title><?php echo $title; ?></title>

        <link rel="stylesheet" href="<?= base_url(); ?>css/build/materialize.css">

        <?php if (isset($stylesheets[0])): ?>
            <?php foreach($stylesheets as $css): ?>
            <link rel="stylesheet" type="text/css" href="<?= $css; ?>">
            <?php endforeach; ?>
        <?php endif; ?>

        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/build/author/style.css">
    </head>

<body>