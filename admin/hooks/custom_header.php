    <?php

    /**
    * @uses add_custom_image_header() To add support for a custom header.
    * @uses register_default_headers() To register the default custom header images provided with the theme.
    *
    * @since 3.0.0
    */

    // Your changeable header business starts here
    define( 'HEADER_TEXTCOLOR', '' );
    // No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
    define( 'HEADER_IMAGE', '%s/images/headers/forestfloor.jpg' );

    // The height and width of your custom header. You can hook into the theme's own filters to change these values.
    // Add a filter to yourtheme_header_image_width and yourtheme_header_image_height to change these values.
    define( 'HEADER_IMAGE_WIDTH', apply_filters( 'basic_header_image_width', 800 ) );
    define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'basic_header_image_height', 100 ) );

    // We'll be using post thumbnails for custom header images on posts and pages.
    // We want them to be 940 pixels wide by 198 pixels tall (larger images will be auto-cropped to fit).
    //set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

    // Don't support text inside the header image.
    define( 'NO_HEADER_TEXT', true );

    // Add a way for the custom header to be styled in the admin panel that controls
    // custom headers. See yourtheme_admin_header_style(), below.
    add_custom_image_header( '', 'basic_admin_header_style' );

    // � and thus ends the changeable header business.

    // Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
/*    register_default_headers( array (
    'berries' => array (
    'url' => '%s/images/headers/berries.jpg',
    'thumbnail_url' => '%s/images/headers/berries-thumbnail.jpg',
    'description' => __( 'Berries', 'yourtheme' )
    ),
    'cherryblossom' => array (
    'url' => '%s/images/headers/cherryblossoms.jpg',
    'thumbnail_url' => '%s/images/headers/cherryblossoms-thumbnail.jpg',
    'description' => __( 'Cherry Blossoms', 'yourtheme' )
    ),
    'concave' => array (
    'url' => '%s/images/headers/concave.jpg',
    'thumbnail_url' => '%s/images/headers/concave-thumbnail.jpg',
    'description' => __( 'Concave', 'yourtheme' )
    ),
    'fern' => array (
    'url' => '%s/images/headers/fern.jpg',
    'thumbnail_url' => '%s/images/headers/fern-thumbnail.jpg',
    'description' => __( 'Fern', 'yourtheme' )
    ),
    'forestfloor' => array (
    'url' => '%s/images/headers/forestfloor.jpg',
    'thumbnail_url' => '%s/images/headers/forestfloor-thumbnail.jpg',
    'description' => __( 'Forest Floor', 'yourtheme' )
    ),
    'inkwell' => array (
    'url' => '%s/images/headers/inkwell.jpg',
    'thumbnail_url' => '%s/images/headers/inkwell-thumbnail.jpg',
    'description' => __( 'Inkwell', 'yourtheme' )
    ),
    'path' => array (
    'url' => '%s/images/headers/path.jpg',
    'thumbnail_url' => '%s/images/headers/path-thumbnail.jpg',
    'description' => __( 'Path', 'yourtheme' )
    ),
    'sunset' => array (
    'url' => '%s/images/headers/sunset.jpg',
    'thumbnail_url' => '%s/images/headers/sunset-thumbnail.jpg',
    'description' => __( 'Sunset', 'yourtheme' )
    )
    ) );*/

    if ( ! function_exists( 'basic_admin_header_style' ) ) :
    /**
    * Styles the header image displayed on the Appearance > Header admin panel.
    *
    * Referenced via add_custom_image_header() in yourtheme_setup().
    *
    * @since 3.0.0
    */
    function basic_admin_header_style() {
    ?>
    <style type="text/css">
    #headimg {
    height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
    width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
    }
    #headimg h1, #headimg #desc {
    display: none;
    }
    </style>
    <?php
    }
    endif;
    ?>