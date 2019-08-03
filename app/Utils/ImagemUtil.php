<?php
/**
 * Created by PhpStorm.
 * User: julio-cezar
 * Date: 06/05/19
 * Time: 09:10
 */

namespace App\Utils;


class ImagemUtil
{
    static $pathFileDefault = 'public/img/sem-icone.jpg';

    private $urlImage = '';
    private $urlImageDefault = '';


    public function __construct(string $urlImage = '')
    {
        $this->setUrlImageDefault(storage_path('app/' . self::$pathFileDefault));

        if(!empty($urlImage) && file_exists($urlImage) && is_file($urlImage)){
            $this->setUrlImage($urlImage);
        } else {
            $this->setUrlImage($this->getUrlImageDefault());
        }
    }

    /**
     * @param string $urlImage
     * @return string
     */
    public function checkImageDefault(string $urlImage = '')
    {
        if($urlImage){
            return $urlImage;
        }

        $this->setUrlImageDefault(storage_path('app/' . self::$pathFileDefault));
        $this->setUrlImage($this->getUrlImageDefault());

        return $this->getUrlBase64();
    }

    /**
     * @return string
     */
    public function getMimeType()
    {
        return mime_content_type($this->urlImage);
    }

    /**
     * @param string $fileBinary
     * @return string
     */
    public function getBase64(string $fileBinary = '')
    {
        return ($fileBinary) ? base64_encode($fileBinary) : base64_encode($this->urlImage);
    }

    /**
     * @return string
     */
    public function getUrlBase64()
    {
        $imgbinary = fread(fopen($this->getUrlImage(), "r"), filesize($this->getUrlImage()));

        return 'data:' . $this->getMimeType() . ';base64,' . $this->getBase64($imgbinary);
    }

    /**
     * @return bool|string
     */
    public function getBinaryFile()
    {
        return fread(fopen($this->getUrlImage(), "r"), filesize($this->getUrlImage()));
    }

    /**
     * @return string
     */
    public function getUrlImage(): string
    {
        return $this->urlImage;
    }

    /**
     * @param string $urlImage
     */
    public function setUrlImage(string $urlImage): void
    {
        $this->urlImage = $urlImage;
    }

    /**
     * @return string
     */
    public function getUrlImageDefault(): string
    {
        return $this->urlImageDefault;
    }

    /**
     * @param string $urlImageDefault
     */
    public function setUrlImageDefault(string $urlImageDefault): void
    {
        $this->urlImageDefault = $urlImageDefault;
    }
}