<?php
/**
 * Jaeger
 *
 * @copyright	Copyright (c) 2015-2016, mithra62
 * @link		http://jaeger-app.com
 * @version		1.0
 * @filesource 	./Platforms/View/Concrete5.php
 */
namespace JaegerApp\Platforms\View;

/**
 * Jaeger - Concrete5 View Object
 *
 * Contains the view helpers for Concrete5
 *
 * @package Platforms\Concrete5
 * @author Eric Lamb <eric@mithra62.com>
 */
class Concrete5 extends AbstractView
{
    /**
     * The path to the partials directory
     * @var string
     */
    protected $partials_path = '';
    
    /**
     * The URL base to use for calling static assets in view partials
     * @var string
     */
    protected $static_assets_url_base = '';
    
    /**
     * Sets the static asset URL base
     * @param string $url_base
     * @return \mithra62\Platforms\View\Concrete5
     */
    public function setStaticAssetsUrlBase($url_base)
    {
        $this->static_assets_url_base = $url_base;
        return $this;
    }
    
    /**
     * Returns the static asset URL base
     * @return string
     */
    public function getStaticAssetsUrlBase()
    {
        return $this->static_assets_url_base;
    }
}