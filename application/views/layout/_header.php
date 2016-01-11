<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-site-verification" content="RO_vBaO4_FhngXcvq35pEgAVAHsbHtl1FjsmpxXcLQo" />
        <meta name="description" content="Looking for Interesting stuff, click here to read some interesting and informative blogs and if you
        furthur need someone to discuss your ideas with, then you are going to love me. Leave a friendly hi :)" />
          <meta name="msvalidate.01" content="9A742AD490D0DC47C3C133D37576AAE2" />
        <meta property="article:author" content="http://www.facebook.com/varun.shrivastava.3">
        <meta property="article:publisher" content="http://www.varunshrivastava.in">
        <?php if(isset($blog[0])): ?>
        <meta property="og:title" content="<?= $blog[0]['heading']; ?>" />
        <meta property="og:site_name" content="Varun Shrivastava" />
        <meta property="og:url" content="<?php if(isset($uri)) echo $uri; else echo 'http://www.varunshrivastava.in'; ?>" />
        <meta property="og:description" content="<?php if(isset($blog[0]['summary'])){echo $blog[0]['summary'];}else{echo substr($blog[0]['content'],0,50).'...';} ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="<?php if(isset($blog[0]['cover_image'])){echo html_escape($blog[0]['cover_image']);} ?>" />
        <meta property="fb:app_id" content="646422418788927" />
        <meta name="Description" content="<?= $blog[0]['heading']; ?>" />
        <meta name="twitter:card" content="<?php if(isset($blog[0]['summary'])){echo $blog[0]['summary'];}else{echo substr($blog[0]['content'],0,50).'...';} ?>" />
        <meta name="twitter:url" content="<?php if(isset($uri)) echo $uri; else echo 'http://www.varunshrivastava.in'; ?>" />
        <meta name="twitter:title" content="<?= $blog[0]['heading']; ?>">
        <meta name="twitter:description" content="<?php if(isset($blog[0]['summary'])){echo $blog[0]['summary'];}else{echo substr($blog[0]['content'],0,50).'...';} ?>" />
        <meta name="twitter:image" content="<?php if(isset($blog[0]['cover_image'])){echo html_escape($blog[0]['cover_image']);} ?>" />
        <?php endif; ?>
        <?php if(isset($products[0]['title'])): ?>
        <meta property="og:title" content="<?= $products[0]['title']; ?>" />
        <meta property="og:site_name" content="Varun Shrivastava" />
        <meta property="og:url" content="<?php if(isset($uri)) echo $uri; else echo 'http://www.varunshrivastava.in'; ?>" />
        <meta property="og:description" content="<?php if(isset($products[0]['tag_line'])){echo $products[0]['tag_line'];}else{echo substr($products[0]['description'],0,200).'...';} ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="http://s6.postimg.org/4sos4yw8x/banner_web_design.jpg" />
        <meta property="fb:app_id" content="646422418788927" />
        <?php endif; ?>


        <title><?php echo $title; ?></title>
        <link rel="author" href="https://plus.google.com/+Varunshrivastava007" />
        <link rel="publisher" href="https://plus.google.com/+Varunshrivastava007" />
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <!-- Google Plus Like Button -->
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        
        <link rel="shortcut icon" href="<?= base_url(); ?>img/vs_logo.jpg" />
        <!-- Bootstrap Core CSS -->
        <?php echo link_tag('css/bootstrap.min.css'); ?>
        <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->

        <!-- Custom CSS -->
        <?= link_tag('css/clean-blog.min.css'); ?>
        <?= link_tag('css/style.css'); ?>
        <?= link_tag('css/style_1.css'); ?>
        <!--<link href="css/clean-blog.min.css" rel="stylesheet" >-->
        <!--<link href="css/style.css" rel="stylesheet" />-->

        <!-- Custom Fonts -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <?= link_tag("css/style.css")?>
        
        
        <script src="http://cdn.ckeditor.com/4.5.1/full/ckeditor.js"></script>
        <script src="<?= base_url(); ?>js/myjs.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="canonical" href="<?php if(isset($uri)){echo $uri;} else {echo 'http://www.varunshrivastava.in'; } ?>">
		
    </head>

    <body>
        <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '646422418788927',
      xfbml      : true,
      version    : 'v2.4'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

<!--        <div id="fb-root"></div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4&appId=646422418788927";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>-->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-66019195-2', 'auto');
  ga('send', 'pageview');

</script>

