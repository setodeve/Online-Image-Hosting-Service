# Online-Image-Hosting-Service


```mermaid
erDiagram
    images {
        id bigint PK 
        img text
        comment varchar(255) 
        deleted_at timestamp
        created_at timestamp
        updated_at timestamp
    }

```