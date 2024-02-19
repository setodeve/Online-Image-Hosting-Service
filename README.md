# Online-Image-Hosting-Service


```mermaid
erDiagram
    images {
        id bigint PK 
        img text
        comment varchar(255) 
        token varchar(255) 
        view bigint
        deleted_at timestamp
        created_at timestamp
        updated_at timestamp
    }

```