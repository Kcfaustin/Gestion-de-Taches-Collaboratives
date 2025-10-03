<?php

namespace App\Helpers;

class AssetHelper
{
    /**
     * Get the compiled asset path from Vite manifest
     */
    public static function getAssetPath(string $asset): string
    {
        if (app()->environment('production')) {
            $manifestPath = public_path('build/.vite/manifest.json');
            
            if (file_exists($manifestPath)) {
                $manifest = json_decode(file_get_contents($manifestPath), true);
                
                if (isset($manifest[$asset])) {
                    return asset('build/' . $manifest[$asset]['file']);
                }
            }
            
            // Fallback to direct asset path
            return asset('build/assets/' . basename($asset));
        }
        
        return $asset;
    }
    
    /**
     * Get CSS asset path
     */
    public static function getCssPath(): string
    {
        return self::getAssetPath('resources/css/app.css');
    }
    
    /**
     * Get JS asset path
     */
    public static function getJsPath(): string
    {
        return self::getAssetPath('resources/js/app.js');
    }
}
