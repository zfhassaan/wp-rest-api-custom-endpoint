<?php
function themeName_customize_register($wp_customize)
{
    // Add Section
    $wp_customize->add_section('slideshow', array(
        'title'             => __('Header', 'react-theme'),
        'priority'          => 70,
    ));

    // Add Settings
    $wp_customize->add_setting('customizer_setting_one', array(
        'transport'         => 'refresh',
        'height'         => 325,
    ));

    // Add Controls
    // fetch the settings value in rest api using it's settings attribute name
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'customizer_setting_one_control', array(
        'label'             => __('Header Background Image', 'react-theme'),
        'section'           => 'slideshow',
        'settings'          => 'customizer_setting_one',
    )));

    $wp_customize->add_setting('customizer_setting_two', array(
        'transport'         => 'refresh',
        'height'         => 325,
    ));

    // Add Controls
    // fetch the settings value in rest api using it's settings attribute name
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'customizer_setting_two_control', array(
        'label'             => __('Slider Image', 'react-theme'),
        'section'           => 'slideshow',
        'settings'          => 'customizer_setting_two',
    )));

    // Add setting for Slider Text Area
    $wp_customize->add_setting('title_text_block', array(
        'default'           => __('Slider Text', 'react-theme'),
        'sanitize_callback' => 'sanitize_text',
        'height' => 325,
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'custom_title_text', array(
        'label' => __('Slider Text', 'react-theme'),
        'section' => 'slideshow',
        'settings' => 'title_text_block',
        'type' => 'textarea',
    )));

    // Add setting for slider Learn More
    $wp_customize->add_setting('slider_url', array(
        'default'           => __('#', 'react-theme'),
        // 'sanitize_callback' => 'sanitize_text',
        'height' => 325,
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'custom_title_url', array(
        'label' => __('Slider Learn More Url', 'react-theme'),
        'section' => 'slideshow',
        'settings' => 'slider_url',
        'type' => 'url',
    )));

    // Add Section About
    $wp_customize->add_section('about', array(
        'title'             => __('About', 'react-theme'),
        'priority'          => 80,
    ));

    // Add setting for slider Learn More
    $wp_customize->add_setting('why_youma', array(
        'default'           => __('Why YouMa', 'react-theme'),
        // 'sanitize_callback' => 'sanitize_text',
        'height' => 325,
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'why_you_ma', array(
        'label' => __('About Us Heading', 'react-theme'),
        'section' => 'about',
        'settings' => 'why_youma',
        'type' => 'text',
    )));

    $wp_customize->add_setting('youma_description', array(
        'default' => __('Get actionable insights from', 'react-theme'),
        'height' => 325,
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'actionable_insights', array(
        'label' => __('YouMa Description', 'react-theme'),
        'section' => 'about',
        'settings' => 'youma_description',
        'type' => 'text',
    )));
}
add_action('customize_register', 'themeName_customize_register');
