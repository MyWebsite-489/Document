<?php

namespace App\Helpers;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class Common
{
    /**
     * Check menu item active
     * @param array $path
     * @param string $active
     * @return string
     */
    public static function setActive(array $path, $active = 'active')
    {
        $name = Route::currentRouteName();
        return in_array($name, $path, true) ? $active : '';
    }

    /**
     * Check menu tree view open
     * @param array $subMenu
     * @param string $menuOpen
     * @return string
     */
    public static function setTreeViewOpen(array $subMenu, $menuOpen = 'menu-open')
    {
        $name = Route::currentRouteName();
        return in_array($name, $subMenu, true) ? $menuOpen : '';
    }

    /**
     * delete old photo and add new image to db, return path of image
     * @param $file
     * @param string $newFilePath
     * @param string $oldFilePath
     * @return string
     */
    public static function uploadImage($file, $newFilePath, $oldFilePath = null)
    {
        // delete old image
        Storage::delete(str_replace('storage', '.', $oldFilePath));
        // Make directory if not exist
        $directory = dirname($newFilePath);
        if (!Storage::exists($directory)) {
            Storage::makeDirectory($directory);
        }
        // Store file
        Storage::put($newFilePath, file_get_contents($file));

        return $newFilePath;
    }
}
