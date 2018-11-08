<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use Slim\Http\UploadedFile;

class Controller
{

    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function __get($property)
    {
        if ($this->container{$property}) {
            return $this->container->{$property};
        }
    }

    public function generateKey($max_size = 32)
    {

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characters_length = strlen($characters);
        $random_string = '';
        for ($i = 0; $i < $max_size; $i++) {
            $random_string .= $characters[rand(0, $characters_length - 1)];
        }

        return $random_string;

    }

    public function getSlug($text)
    {
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
        $text = trim($text, '-');
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = strtolower($text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        if (empty($text))
        {
            return 'n-a-'.bin2hex(random_bytes(8));
        }
        return $text;
    }

    public function getSetting()
    {
        return Setting::find(1);
    }

    public function moveUploadedFile($directory, UploadedFile $uploaded_file)
    {
        $extension = pathinfo($uploaded_file->getClientFilename(), PATHINFO_EXTENSION);
        $basename = bin2hex(random_bytes(8));
        $filename = sprintf('%s.%0.8s', $basename, $extension);

        $uploaded_file->moveTo($directory . DIRECTORY_SEPARATOR . $filename);

        return $filename;
    }
}