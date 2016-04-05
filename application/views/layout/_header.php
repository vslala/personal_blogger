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
        <?php
            if (isset($blog[0]))
            {
                $timestamp = $blog[0]['created_at'];
                $datetime = new DateTime($timestamp);
                $date = $datetime->format('Y-m-d');
                $time = $datetime->format('h:i:s');
            }

            if (isset($tags[0]))
            {
                $keywords = null;
                foreach ($tags as $t){
                    $keywords .= str_replace('#', '', $t['tag']).',';
                }
                echo '<meta name="keywords" content="'. $keywords .'" />';                   
            }
        ?>
        <?php if(isset($blog[0])): ?>
        <!-- Rich Html Snippet -->
        <meta itemprop="headline" content="<?= $blog[0]['heading']; ?>"/>
        <meta itemprop="description" content="<?= substr($blog[0]['summary'], 0, 150).'...'; ?>" />
        <meta itemprop="image" content="<?php if(isset($blog[0]['cover_image'])){echo html_escape($blog[0]['cover_image']);} ?>" />
        <meta itemprop="datePublished" content="<?= $date; ?>T<?= $time; ?>" />
        <!-- // -->
        <meta name="description" content="<?= substr($blog[0]['summary'], 0, 150).'...'; ?>" />
        <meta property="og:title" content="<?= $blog[0]['heading']; ?>" />
        <meta property="og:site_name" content="Varun Shrivastava" />
        <meta property="og:url" content="<?php if(isset($uri)) echo $uri; else echo 'http://www.varunshrivastava.in'; ?>" />
        <meta property="og:description" content="<?php if(isset($blog[0]['summary'])){echo $blog[0]['summary'];}else{echo substr($blog[0]['content'],0,50).'...';} ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="<?php if(isset($blog[0]['cover_image'])){echo html_escape($blog[0]['cover_image']);} ?>" />
        <meta property="fb:app_id" content="646422418788927" />
        <meta name="Description" content="<?= $blog[0]['heading']; ?>" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:url" content="<?php if(isset($uri)) echo $uri; else echo 'http://www.varunshrivastava.in'; ?>" />
        <meta name="twitter:title" content="<?= $blog[0]['heading']; ?>">
        <meta name="twitter:description" content="<?php if(isset($blog[0]['summary'])){echo $blog[0]['summary'];}else{echo substr($blog[0]['content'],0,150).'...';} ?>" />
        <meta name="twitter:image" content="<?php if(isset($blog[0]['cover_image'])){echo html_escape($blog[0]['cover_image']);} ?>" />
        <?php else: ?>
        <meta name="description" content="Varun Shrivastava is a passionate programmer and a great learner. He always looks for opportunities to interact with new people and make new friends. This is his website where he writes about different stuffs." />
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
        <?php if(isset($metaTags[0])){
            foreach ($metaTags as $key => $tag) {
                echo $tag;
            }
        } ?>
        

        <link rel="shortcut icon" href="<?= base_url(); ?>img/vs_logo.jpg" />
        <title><?php echo $title; ?></title>

        <link rel="author" href="https://plus.google.com/+Varunshrivastava007" />
        <link rel="publisher" href="https://plus.google.com/+Varunshrivastava007" />
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Google Plus Like Button -->
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        
        <!-- Bootstrap Core CSS -->
        <?php //echo link_tag('css/build/animate.css'); ?>
        <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->

        <!-- Custom CSS -->
        <?= link_tag('css/clean-blog.min.css'); ?>
        <?= link_tag('css/style.css'); ?>
        <?= link_tag('css/main.css'); ?>
        <!--<link href="css/clean-blog.min.css" rel="stylesheet" >-->
        <!--<link href="css/style.css" rel="stylesheet" />-->

        <!-- Custom Fonts -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <?= link_tag("css/style.css")?>
        
        <!-- Emoji CSS -->
        <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
        
        <!-- CKEditor -->
        <script src="http://cdn.ckeditor.com/4.5.1/full/ckeditor.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="canonical" href="<?php if(isset($uri)){echo $uri;} else {echo 'http://www.varunshrivastava.in'; } ?>">
		

        <?php if (! empty($css)): ?>
            <?php foreach ($css as $link): ?>
                <link rel="stylesheet" type="text/css" href="<?= $link; ?>">
            <?php endforeach; ?>
        <?php endif; ?>

        <style type="text/css">
        #mc_embed_signup{background:#fff; font:14px Helvetica,Arial,sans-serif; width: 100%;}
        </style>
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

