<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreateComputerCommentsTable implements SchemaMigration
{
    public function up(): array
    {
        return [
            "CREATE TABLE IF NOT EXISTS comments (
                id BIGINT PRIMARY KEY,
                comment VARCHAR(255) NOT NULL,
                user_id BIGINT NOT NULL,
                image_id BIGINT NOT NULL,
                created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (user_id) REFERENCES users(id),
                FOREIGN KEY (image_id) REFERENCES images(id)
            );"
        ];
    }

    public function down(): array
    {
        return [
            "DROP TABLE comments"
        ];
    }
}
