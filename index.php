<?php
/*
 *    PngCompote, is an simple php script to revert Apple *so called* 
 *    optimizations from iOS (iPhone & iPad) PNGs.
 *    Copyright (C) 2011 Ludovic Landry & Pascal Cans
 *
 *    This program is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    This program is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

require_once 'pngCompote.php';


//for compat < 5.2
function mypathinfo($file) {
    if (defined('PATHINFO_FILENAME')) return pathinfo($file);
    $pathinfo = pathinfo($file);
    if (strstr($file, '.')) {
        $fname = substr($pathinfo['basename'], 
                0 , -strlen($pathinfo['extension'])-1);
    } else{
        $fname = $pathinfo['basename'];
    }
    $pathinfo['filename'] = $fname;
    return $pathinfo;
}


$filename = 'Lenna.crush.png';
$newFilename = 'Lenna.compote.png';
$png = new PngFile($filename);

if ($png->isIphone) {
    if ($png->revertIphone(__DIR__ . '/'.$newFilename)) {
        echo 'cleaning done!'.PHP_EOL;
        echo '<img src="'.$newFilename.'"/>'.PHP_EOL;
    }
}

?>
