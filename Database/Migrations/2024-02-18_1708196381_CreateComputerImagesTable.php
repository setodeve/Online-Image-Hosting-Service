<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreateComputerImagesTable implements SchemaMigration
{
    public function up(): array
    {
        return [
            "CREATE TABLE IF NOT EXISTS images (
                id BIGINT PRIMARY KEY AUTO_INCREMENT,
                img TEXT NOT NULL,
                comment VARCHAR(255) NOT NULL,
                token VARCHAR(255) NOT NULL,
                deleted_at TIMESTAMP NOT NULL,
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )"
        ];
    }

    public function down(): array
    {
        return [
            "DROP TABLE images"
        ];
    }
}
