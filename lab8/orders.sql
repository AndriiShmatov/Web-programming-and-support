-- Adminer 4.8.1 PostgreSQL 13.2 (Debian 13.2-1.pgdg100+1) dump

CREATE TABLE "public"."orders" (
    "id" integer DEFAULT nextval('orders_id_seq') NOT NULL,
    "order_number" character varying(255) NOT NULL,
    "weight" double precision NOT NULL,
    "city" character varying(255) NOT NULL,
    "delivery_option" character varying(50) NOT NULL,
    "delivery_point" character varying(255) NOT NULL,
    CONSTRAINT "orders_pkey" PRIMARY KEY ("id")
) WITH (oids = false);


-- 2024-11-19 20:04:00.29648+00
