<?php

abstract class ValvoMetal_Plugin {
    protected $name = '';
    protected $prefix = '';
    protected $capability = '';

    public function __construct() {
        $this->registerActivationHooks();
        $this->registerHooks();
    }

    protected function registerActivationHooks() {
        register_activation_hook(__FILE__, array($this, 'activate'));
        register_deactivation_hook(__FILE__, array($this, 'deactivate'));
    }

    /**
     * Activates the plugin.
     *
     * It's only a base method, so it only flushes the rewrite rules.
     */
    public function activate() {
        flush_rewrite_rules();
    }
    /**
     * Deactivates the plugin.
     *
     * It's only a base method, so it only flushes the rewrite rules.
     */
    public function deactivate() {
        flush_rewrite_rules();
    }

    protected function registerHooks() {
        add_action('admin_menu', array($this, 'register_settings_pages'));
        add_action('admin_init', array($this, 'register_settings'));
    }

    abstract public function register_settings_pages();

    abstract public function register_settings();

    /**
     * Render a template
     *
     * Allows parent/child themes to override the markup by placing the a file named basename( $default_template_path ) in their root folder,
     * and also allows plugins or themes to override the markup by a filter. Themes might prefer that method if they place their templates
     * in sub-directories to avoid cluttering the root folder. In both cases, the theme/plugin will have access to the variables so they can
     * fully customize the output.
     *
     * @param  string $default_template_path The path to the template, relative to the plugin's `views` folder
     * @param  array  $variables             An array of variables to pass into the template's scope, indexed with the variable name so that it can be extract()-ed
     * @return string
     */
    protected function render_template( $default_template_path = null, $variables = array() ) {
        $dir = dirname(debug_backtrace()[0]['file']);

        do_action( $this->prefix . '_render_template_pre', $default_template_path, $variables );
        $template_path = $dir . '/view/' . $default_template_path;
        $template_path = apply_filters( $this->prefix . '_template_path', $template_path );
        if ( is_file( $template_path ) ) {
            extract( $variables );
            ob_start();
            require( $template_path );
            $template_content = apply_filters( $this->prefix . '_template_content', ob_get_clean(), $default_template_path, $template_path, $variables );
        } else {
            $template_content = '';
        }
        do_action( $this->prefix . '_render_template_post', $default_template_path, $variables, $template_path, $template_content );
        return $template_content;
    }
}
