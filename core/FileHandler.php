<?php

namespace core;

class FileHandler
{

    private static string $_BASE_PATH = __DIR__."\uploads";
    private static string $fieldName = "cv";
    private static string $file_type = "application/pdf";
    private static int $file_size = 2000000000000000;
    private static string $extension = ".pdf";

    private string $full_save_path;
    private string $file_name;

    /**
     * FileHandler constructor.
     */
    public function __construct()
    {
    }

    public function upload_file(): bool
    {
        if ($_FILES[self::$fieldName]["type"] !== self::$file_type)
            return false;

        if ($_FILES[self::$fieldName]["size"] > self::$file_size)
            return false;

        $this->setFileName();
        $this->setFullSavePath();
        return move_uploaded_file($_FILES[self::$fieldName]["tmp_name"], $this->getFullSavePath());

    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->file_name;
    }

    /**
     */
    public function setFileName(): void
    {
        $this->file_name = microtime(true)*10000.0.self::$extension;
    }

    /**
     * @return string
     */
    public function getFullSavePath(): string
    {
        return $this->full_save_path;
    }

    /**
     */
    public function setFullSavePath(): void
    {
        $this->setFileName();
        $this->full_save_path = self::$_BASE_PATH."\\".$this->file_name;
    }



    /**
     * @return string
     */
    public static function getBASEPATH(): string
    {
        return self::$_BASE_PATH;
    }

    /**
     * @param string $BASE_PATH
     */
    public static function setBASEPATH(string $BASE_PATH): void
    {
        self::$_BASE_PATH = $BASE_PATH;
    }

    /**
     * @return string
     */
    public static function getFieldName(): string
    {
        return self::$fieldName;
    }

    /**
     * @param string $fieldName
     */
    public static function setFieldName(string $fieldName): void
    {
        self::$fieldName = $fieldName;
    }

    /**
     * @return string
     */
    public static function getFileType(): string
    {
        return self::$file_type;
    }

    /**
     * @param string $file_type
     */
    public static function setFileType(string $file_type): void
    {
        self::$file_type = $file_type;
    }

    /**
     * @return int
     */
    public static function getFileSize(): int
    {
        return self::$file_size;
    }

    /**
     * @param int $file_size
     */
    public static function setFileSize(int $file_size): void
    {
        self::$file_size = $file_size;
    }


}