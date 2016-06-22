<?php

/**
 * 
 * Kirki toolkit configuration file
 * 
 * @package Wip_blog
 * @since Wip Blog 1.0
 */

if ( class_exists( 'Kirki' ) ) {
    // Customizer section
    
    Kirki::add_config( 'wipblog', array(
        'capability'    => 'edit_theme_options',
        'option_type'   => 'option',
        'option_name'   => 'wipblog',
    ) );

    Kirki::add_panel( 'blog', array(
        'priority'    => 10,
        'title'       => esc_html__( 'Blog', 'wip-blog' ),
        'description' => esc_html__( 'Main blog settings ', 'wip-blog' ),
        ));
    
    Kirki::add_section( 'sidebar-pos-b', array(
        'priority'    => 40,
        'title'       => esc_html__( 'Sidebar position', 'wip-blog' ),
        'description' => esc_html__( 'Set blog sidebar position.', 'wip-blog' ),
        'panel'       => 'blog'
        ));
        
    Kirki::add_section( 'footer', array(
        'priority'    => 20,
        'title'       => esc_html__( 'Footer', 'wip-blog' ),
        ));

    Kirki::add_section( 'blog-font', array(
        'priority'    => 30,
        'title'       => esc_html__( 'Blog text fonts', 'wip-blog' ),
        'description' => esc_html__( 'Set blog text fonts.', 'wip-blog' ),
        'panel'       => 'blog'
        ));
        
    Kirki::add_section( 'post-title-font', array(
        'priority'    => 20,
        'title'       => esc_html__( 'Titles fonts', 'wip-blog' ),
        'description' => esc_html__( 'Set the titles fonts.', 'wip-blog' ),
        'panel'       => 'blog'
        ));
        
    Kirki::add_section( 'blog-title-font', array(
        'priority'    => 10,
        'title'       => esc_html__( 'Blog title font', 'wip-blog' ),
        'description' => esc_html__( 'Set the blog title font.', 'wip-blog' ),
        'panel'       => 'blog'
        ));
    
    Kirki::add_field( 'wipblog', array(
        'type'        => 'select',
        'settings'     => 'sidebar-blog',
        'label'       => esc_html__( 'Sidebar position', 'wip-blog' ),
        'description' => esc_html__( 'Select the position of the sidebar in the blog and single post page.', 'wip-blog' ),
        'section'     => 'sidebar-pos-b',
        'default'     => 'full',
        'priority'    => 10,
        'choices'     => array(
            'full' => esc_html__( 'Full Width', 'wip-blog' ),
            'left' => esc_html__( 'Left side', 'wip-blog' ),
            'right' => esc_html__( 'Right side', 'wip-blog' ),
    )));

    Kirki::add_field( 'wipblog', array(
        'type'     => 'select',
        'settings' => 'base_typography_font_family',
        'label'    => esc_html__( 'Text Font Family', 'wip-blog' ),
        'section'  => 'blog-font',
        'default'  => 'Roboto',
        'priority' => 10,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output'   => array( 
            array(
                'element'  => 'p',
                'property' => 'font-family',
                ),
            array(
                'element'  => 'a',
                'property' => 'font-family',
                ),
        ),
    ) );
    
    Kirki::add_field( 'wipblog', array(
        'type'      => 'slider',
        'settings'  => 'base_typography_font_size',
        'label'     => esc_html__( 'Text Font Size', 'wip-blog' ),
        'section'     => 'blog-font',
        'default'   => 14,
        'priority'  => 20,
        'choices'   => array(
            'min'   => 7,
            'max'   => 48,
            'step'  => 1,
        ),
        'output' => array( 
            array(
                'element'  => 'p',
                'property' => 'font-size',
                'units'    => 'px',
            ),
            array(
                'element'  => 'a',
                'property' => 'font-size',
                'units'    => 'px'
                ),
            array(
                'element'  => 'i',
                'property' => 'font-size',
                'units'    => 'px'
                ),
        ),
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'element'  => 'p',
                'function' => 'css',
                'property' => 'font-size',
                'units'    => 'px'
            ),
            array(
                'element'  => 'a',
                'function' => 'css',
                'property' => 'font-size',
                'units'    => 'px'
            ),
            array(
                'element'  => 'i',
                'function' => 'css',
                'property' => 'font-size',
                'units'    => 'px'
            ),
        ),
    ) );
    
    Kirki::add_field( 'wipblog', array(
        'type'     => 'select',
        'settings' => 'post_h_typography_font_family',
        'label'    => esc_html__( 'Post Titles Font Family', 'wip-blog' ),
        'section'  => 'post-title-font',
        'default'  => 'Fresca',
        'priority' => 10,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output'   => array( array( 
                'element'  => '.post-name-link',
                'property' => 'font-family',
                )
            )
    ) );
    
    Kirki::add_field( 'wipblog', array(
        'type'      => 'slider',
        'settings'  => 'post_h_typography_font_size',
        'label'     => esc_html__( 'Post Titles Font Size', 'wip-blog' ),
        'section'     => 'post-title-font',
        'default'   => 36,
        'priority'  => 20,
        'choices'   => array(
            'min'   => 7,
            'max'   => 48,
            'step'  => 1,
        ),
        'output' => array( 
            array(
                'element'  => 'h2>a',
                'property' => 'font-size',
                'units'    => 'px',
            ),
        ),
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'element'  => 'h2>a',
                'function' => 'css',
                'property' => 'font-size',
                'units'    => 'px'
            ),
        ),
    ) );
    
    Kirki::add_field( 'wipblog', array(
        'type'     => 'select',
        'settings' => 'blog_title_typography_font_family',
        'label'    => esc_html__( 'Blog Title Font Family', 'wip-blog' ),
        'section'  => 'blog-title-font',
        'default'  => 'Fresca',
        'priority' => 10,
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output'   => array( 
            array( 
                'element'  => '.brand',
                'property' => 'font-family',
                ),
            array( 
                'element'  => '.sub-brand',
                'property' => 'font-family',
                )
            )
    ) );
    
    Kirki::add_field( 'wipblog', array(
        'type'      => 'slider',
        'settings'  => 'blog_title_typography_font_size',
        'label'     => esc_html__( 'Blog Title Font Size', 'wip-blog' ),
        'section'   => 'blog-title-font',
        'default'   => 80,
        'priority'  => 20,
        'choices'   => array(
            'min'   => 20,
            'max'   => 100,
            'step'  => 1,
        ),
        'output' => array( 
            array(
                'element'  => '.brand',
                'property' => 'font-size',
                'units'    => 'px',
            ),
        ),
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'element'  => '.brand',
                'function' => 'css',
                'property' => 'font-size',
                'units'    => 'px'
            ),
        ),
    ) );
    
    Kirki::add_field( 'wipblog', array(
        'type'      => 'slider',
        'settings'  => 'blog_subtitle_typography_font_size',
        'label'     => esc_html__( 'Blog SubTitle Font Size', 'wip-blog' ),
        'section'     => 'blog-title-font',
        'default'   => 36,
        'priority'  => 30,
        'choices'   => array(
            'min'   => 7,
            'max'   => 48,
            'step'  => 1,
        ),
        'output' => array( 
            array(
                'element'  => '.sub-brand',
                'property' => 'font-size',
                'units'    => 'px',
            ),
        ),
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'element'  => '.sub-brand',
                'function' => 'css',
                'property' => 'font-size',
                'units'    => 'px'
            ),
        ),
    ) );
    
    Kirki::add_field( 'wip-blog', array(
        'type'        => 'text',
        'settings'    => 'footer_text',
        'label'       => esc_html__( 'Footer copyright text', 'wip-blog' ),
        'default'     => esc_html__( 'This text is entered in the "text" control.', 'wip-blog' ),
        'section'     => 'footer',
        'default'     => esc_html__('Copyright &copy; All rights reserved 2015', 'wip-blog'),
        'priority'    => 10,
    ) );
    
}

