<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!--================Header Menu Area =================-->
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container box_1620">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/src/img/logo.png" alt="">
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary-menu',
                            'menu_class'     => 'nav',
                            // 'depth'         => 3,
                            'walker'         => new InspiriaMenuWalker(),

                        ));
                        ?>
                        <ul class="nav navbar-nav navbar-right header_social ml-auto">
                            <li class="nav-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="nav-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="nav-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li class="nav-item"><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="logo_part">
            <div class="container">
                <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/src/img/logo.png" alt="">
            </div>
        </div>
    </header>


    <!-- 


      <ul class="nav navbar-nav menu_nav">
                            <li class="nav-item active"><a class="nav-link" href="/">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="/category/classic">Category</a></li>
                            <li class="nav-item"><a class="nav-link" href="/archive">Archive</a></li>
                            <li class="nav-item"><a class="nav-link" href="/blog">Blog</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="/hello-world">Sinlge Blog</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="elements.html">Elements</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                        </ul>
     -->