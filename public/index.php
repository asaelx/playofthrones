<?php include('lib/functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Play of Thrones</title>
    <link rel="stylesheet" href="css/master.css">
</head>
<body>
    <div id="video-bg">
        <iframe id="got-trailer" src="https://<?php echo $episode_trailer; ?>?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&&playlist=z2pRLR6Ns5I&mute=1" frameborder="0" allowfullscreen></iframe>
    </div>
    <!-- /#video-bg -->

    <div id="video" data-magnet="<?php echo $config['magnet']; ?>" class="modal"></div>
    <!-- /#video -->

    <section id="top">
        <div class="wrapper">
            <div class="row">
                <div class="col-3">
                    <a href="#" class="logo">
                        <img src="img/logo.png" alt="" class="img">
                    </a>
                </div>
                <!-- /.col-3 -->
                <div class="col-9">
                    <nav id="nav">
                        <ul class="menu">
                            <li class="option">
                                <a href="#countdown" class="link scroll">Next Episode Countdown</a>
                            </li>
                            <!-- /.option -->
                            <li class="option">
                                <a href="#trailers" class="link scroll">Teasers and Trailers</a>
                            </li>
                            <!-- /.option -->
                            <li class="option">
                                <a href="#news" class="link scroll">Related News</a>
                            </li>
                            <!-- /.option -->
                            <li class="option">
                                <a href="#footer" class="link scroll">About</a>
                            </li>
                            <!-- /.option -->
                        </ul>
                        <!-- /.menu -->
                    </nav>
                    <!-- /#nav -->
                </div>
                <!-- /.col-9 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.wrapper -->
    </section>
    <!-- /#top -->

    <header id="header">
        <div class="wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="content">
                        <div class="got-logo">
                            <img src="img/got-logo.png" alt="" class="img">
                        </div>
                        <!-- /.got-logo -->
                        <div class="play">
                            <a href="#" class="link trigger-modal" data-modal="video">
                                <img src="img/play.png" alt="" class="img">
                                <span>Watch episode</span>
                            </a>
                        </div>
                        <!-- /.play -->
                        <div class="info">
                            <h1 class="title">
                                <img src="img/hbo-logo.png" alt="" class="img"> Game of Thrones
                            </h1>
                            <!-- /.title -->
                            <div class="season">Season <?php echo $episode->season; ?></div>
                            <!-- /.season -->
                            <div class="episode">Episode <?php echo $episode->number; ?> — <?php echo $episode->name; ?></div>
                            <!-- /.episode -->
                            <div class="summary">
                                <p><?php echo $episode->summary; ?></p>
                            </div>
                            <!-- /.summary -->
                        </div>
                        <!-- /.info -->
                    </div>
                    <!-- /.content -->
                </div>
                <!-- /.col-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.wrapper -->
    </header>
    <!-- /#header -->

    <section id="countdown" data-airstamp="<?php echo $next->airstamp; ?>">
        <div class="wrapper">
            <div class="row">
                <div class="col-12">
                    <h2 class="title">Season <?php echo $next->season; ?> Episode <?php echo $next->number; ?> Countdown</h2>
                    <!-- /.title -->
                </div>
                <!-- /.col-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="clock"></div>
                </div>
                <!-- /.col-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.wrapper -->
    </section>
    <!-- /#countdown -->

    <div id="trailers">
        <div class="wrapper">
            <div class="row">
                <div class="col-12">
                    <h2 class="title">Teasers and Trailers</h2>
                    <!-- /.title -->
                </div>
                <!-- /.col-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <?php foreach($trailers as $video): ?>
                    <div class="col-4">
                        <div class="trailer">
                            <a href="<?php echo $video['url']; ?>" target="_blank" class="thumbnail">
                                <img src="img/play-white.png" alt="" class="img">
                                <div class="image" style="background: url('<?php echo $video['thumbnail']; ?>') no-repeat center center / cover;"></div>
                                <!-- /.image -->
                            </a>
                            <!-- /.thumbnail -->
                            <div class="caption"><?php echo $video['title'] ?></div>
                            <!-- /.caption -->
                        </div>
                        <!-- /.trailer -->
                    </div>
                    <!-- /.col-4 -->
                <?php endforeach; ?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.wrapper -->

    </div>
    <!-- /#trailers -->

    <div id="news">
        <div class="wrapper">
            <div class="row">
                <div class="col-12">
                    <h2 class="title">Related News</h2>
                    <!-- /.title -->
                </div>
                <!-- /.col-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <?php foreach($news as $article): ?>
                    <div class="col-3">
                        <div class="article">
                            <a href="<?php echo $article['url']; ?>" target="_blank" class="thumbnail">
                                <img src="img/read.png" alt="" class="img">
                                <div class="image" style="background: url('<?php echo $article['thumbnail']; ?>') no-repeat center center / cover;"></div>
                                <!-- /.image -->
                            </a>
                            <!-- /.thumbnail -->
                            <div class="caption"><?php echo $article['title']; ?></div>
                            <!-- /.caption -->
                            <div class="excerpt"><?php echo $article['excerpt']; ?></div>
                            <!-- /.excerpt -->
                            <a href="<?php echo $article['url']; ?>" class="link" target="_blank">Read more</a>
                        </div>
                        <!-- /.article -->
                    </div>
                    <!-- /.col-3 -->
                <?php endforeach; ?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.wrapper -->

    </div>
    <!-- /#news -->

    <footer id="footer">
        <div class="wrapper">
            <div class="row">
                <div class="col-12">
                    <a href="#" class="logo">
                        <img src="img/logo.png" alt="" class="img">
                    </a>
                </div>
                <!-- /.col-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="text">
                        <p>This is a personal project that I created to watch the latest episode of Game of Thrones and also extra content such as teasers, trailers and news in one place.</p>
                        <blockquote>"<?php echo $quote->quote; ?>" <cite>— <?php echo $quote->character; ?></cite></blockquote>
                    </div>
                    <!-- /.text -->
                </div>
                <!-- /.col-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="by">Made with <span class="love">❤</span> by <a href="http://asaelx.com/" class="link" target="_blank">@asaelx</a></div>
                    <!-- /.by -->
                </div>
                <!-- /.col-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.wrapper -->
    </footer>
    <!-- /#footer -->

    <div class="layer">
        <button class="close-modal">&times;</button>
    </div>
    <!-- /.layer -->

    <script type="text/javascript" src="js/scripts.js"></script>
</body>
</html>
