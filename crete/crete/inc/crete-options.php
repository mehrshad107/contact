<?php
/*
      Register Fonts
      */
function crete_fonts_url()
{
    $fonts_url = '';

 

    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $albert_sans = _x('on', 'Albert Sans font: on or off', 'crete');

    if ( 'off' !== $albert_sans) {
        $font_families = array();


        if ('off' !== $albert_sans) {
            $font_families[] = 'Albert Sans:100,300,400,500,600,700,800,900';
        }

        $query_args = array(
            'family' => urlencode(implode('|', $font_families)),
            'subset' => urlencode('latin,latin-ext'),
        );

        $fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
    }

    return esc_url_raw($fonts_url);
}