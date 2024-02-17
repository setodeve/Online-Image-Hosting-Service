<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreateComputerImagesTable implements SchemaMigration
{
    public function up(): array
    {
        return [
            "CREATE TABLE IF NOT EXISTS images (
                id BIGINT PRIMARY KEY,
                img TEXT NOT NULL,
                comment VARCHAR(255) NOT NULL,
                user_id BIGINT NOT NULL,
                deleted_at TIMESTAMP NOT NULL,
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (user_id) REFERENCES users(id)
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
