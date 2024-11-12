
CREATE TABLE "public"."users" (
    "id" integer AUTO_INCREMENT,
    "username" character varying(50) UNIQUE,
    "email" character varying(100) UNIQUE,
    "password" character varying(255) UNIQUE,
    CONSTRAINT "users_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

