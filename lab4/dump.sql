-- Adminer 4.8.1 PostgreSQL 13.2 (Debian 13.2-1.pgdg100+1) dump

CREATE TABLE "public"."users" (
    "id" integer AUTO_INCREMENT,
    "username" character varying(50) UNIQUE,
    "email" character varying(100) UNIQUE,
    "password" character varying(255) UNIQUE,
    CONSTRAINT "users_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

-- 2024-10-14 15:03:39.414064+00
