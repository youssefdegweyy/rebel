<?php

use Illuminate\Support\Facades\Storage;

/**
 * Generate Code 
 */
if (!function_exists('generateRandomCode')) {
	function generateRandomCode($string)
	{
		return $string . '-' . substr(md5(microtime()), rand(0, 26), 5);
	}
}
/**
 * Generate Code 
 */
if (!function_exists('format')) {
	function format($created_at)
	{
		//return	$created_at;
		return	$created_at?$created_at->format('Y-m-d h:i:s'):now();
	}
}

if (!function_exists('uploadToPublic')) {
	function uploadToPublic($folder, $image)
	{
		return 'uploads/' . Storage::disk('public_new')->put($folder, $image);
	}
}
if (!function_exists('calculateAge')) {
	function calculateAge($birthday)
	{
		$age =  date_diff(date_create($birthday), date_create(date("d-m-Y")));
		return $age->format("%y");
	}
}

if (!function_exists('fullName')) {
	function fullName($first_name, $last_name)
	{
		return $first_name . ' ' . $last_name;
	}
}


if (!function_exists('gender')) {
	function gender($type)
	{
		if ($type == 1) {
			return 'male';
		} elseif ($type == 2) {
			return 'female';
		} elseif ($type == 3) {
			return 'other';
		}
	}
}

if (!function_exists('durationType')) {
	function durationType($type)
	{
		if ($type == 1) {
			return 'day';
		} elseif ($type == 2) {
			return 'minutes';
		}
	}
}
/**
 * Upload
 */
if (!function_exists('upload')) {
	function upload($file, $path)
	{
		$baseDir = 'uploads/' . $path;

		//$name = sha1(time() . $file->getClientOriginalName());
		//$extension = $file->getClientOriginalExtension();
		$name = sha1(time() . $file->hashName());
		$extension = $file->extension();
		$fileName = "{$name}.{$extension}";

		$file->move(public_path() . '/' . $baseDir, $fileName);

		return "{$baseDir}/{$fileName}";
	}
}