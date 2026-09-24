<?php

namespace App\Service;

class ImageUploader
{
    private const MAX_FILE_SIZE = 5 * 1024 * 1024;
    private const ALLOWED_MIME_TYPES = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/webp' => 'webp',
    ];

    public function upload(array $file): string
    {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            throw new \RuntimeException('Wystąpił błąd podczas przesyłania grafiki.');
        }

        if ($file['size'] > self::MAX_FILE_SIZE) {
            throw new \RuntimeException('Grafika może mieć maksymalnie 5 MB wielkości.');
        }

        $finfo = new \finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->file($file['tmp_name']);

        if (!isset(self::ALLOWED_MIME_TYPES[$mimeType])) {
            throw new \RuntimeException('Dozwolone są grafiki tylko w formatach JPG, PNG i WebP.');
        }

        if (getimagesize($file['tmp_name']) === false) {
            throw new \RuntimeException('Przesłany plik nie jest prawidłową grafiką.');
        }

        $extension = self::ALLOWED_MIME_TYPES[$mimeType];

        $fileName = bin2hex(random_bytes(16)) . '.' . $extension;

        $uploadDirectory = __DIR__ . '/../../uploads/articles/';

        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0755, true);
        }

        $destination = $uploadDirectory . $fileName;

        if (!move_uploaded_file($file['tmp_name'], $destination)) {
            throw new \RuntimeException('Nie udało się zapisać grafiki.');
        }

        return '/uploads/articles/' . $fileName;
    }
}
