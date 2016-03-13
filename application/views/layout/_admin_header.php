<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- <meta name="google-site-verification" content="cSK9weoz0MQ8vZbMeZt-7fKLMnWDPJ7J2etgdC5Qq68" /> -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <meta name="google-site-verification" content="RO_vBaO4_FhngXcvq35pEgAVAHsbHtl1FjsmpxXcLQo" /> -->
        <!-- <meta name="msvalidate.01" content="9A742AD490D0DC47C3C133D37576AAE2" /> -->
        <meta property="article:author" content="http://www.facebook.com/varun.shrivastava.3">
        <meta property="article:publisher" content="http://www.varunshrivastava.in">
        
        <link rel="shortcut icon" href="<?= base_url(); ?>img/vs_logo.jpg" />
        <title><?php echo $title; ?></title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        
        <!-- Bootstrap Core CSS -->
        <?php echo link_tag('css/bootstrap.min.css'); ?>
        <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->

        <!-- Custom CSS -->
        <?= link_tag('css/style.css'); ?>
        <?= link_tag('css/main.css'); ?>
        
        <!-- Emoji CSS -->
        <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
        
        <!-- CKEditor -->
        <script src="http://cdn.ckeditor.com/4.5.1/full/ckeditor.js"></script>
        

        <?php if (! empty($css)): ?>
            <?php foreach ($css as $link): ?>
                <link rel="stylesheet" type="text/css" href="<?= $link; ?>">
            <?php endforeach; ?>
        <?php endif; ?>

    </head>

    <body>

