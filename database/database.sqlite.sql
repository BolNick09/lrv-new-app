BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "cache" (
	"key"	varchar NOT NULL,
	"value"	text NOT NULL,
	"expiration"	integer NOT NULL,
	PRIMARY KEY("key")
);
CREATE TABLE IF NOT EXISTS "cache_locks" (
	"key"	varchar NOT NULL,
	"owner"	varchar NOT NULL,
	"expiration"	integer NOT NULL,
	PRIMARY KEY("key")
);
CREATE TABLE IF NOT EXISTS "failed_jobs" (
	"id"	integer NOT NULL,
	"uuid"	varchar NOT NULL,
	"connection"	text NOT NULL,
	"queue"	text NOT NULL,
	"payload"	text NOT NULL,
	"exception"	text NOT NULL,
	"failed_at"	datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "job_batches" (
	"id"	varchar NOT NULL,
	"name"	varchar NOT NULL,
	"total_jobs"	integer NOT NULL,
	"pending_jobs"	integer NOT NULL,
	"failed_jobs"	integer NOT NULL,
	"failed_job_ids"	text NOT NULL,
	"options"	text,
	"cancelled_at"	integer,
	"created_at"	integer NOT NULL,
	"finished_at"	integer,
	PRIMARY KEY("id")
);
CREATE TABLE IF NOT EXISTS "jobs" (
	"id"	integer NOT NULL,
	"queue"	varchar NOT NULL,
	"payload"	text NOT NULL,
	"attempts"	integer NOT NULL,
	"reserved_at"	integer,
	"available_at"	integer NOT NULL,
	"created_at"	integer NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "migrations" (
	"id"	integer NOT NULL,
	"migration"	varchar NOT NULL,
	"batch"	integer NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "password_reset_tokens" (
	"email"	varchar NOT NULL,
	"token"	varchar NOT NULL,
	"created_at"	datetime,
	PRIMARY KEY("email")
);
CREATE TABLE IF NOT EXISTS "posts" (
	"id"	integer NOT NULL,
	"title"	text NOT NULL,
	"content"	text,
	"user_id"	integer NOT NULL,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT),
	FOREIGN KEY("user_id") REFERENCES "users"("id") on delete no action on update no action
);
CREATE TABLE IF NOT EXISTS "profiles" (
	"id"	integer NOT NULL,
	"telegram"	text NOT NULL,
	"phone"	text NOT NULL,
	"vk"	text NOT NULL,
	"user_id"	integer,
	PRIMARY KEY("id" AUTOINCREMENT),
	FOREIGN KEY("user_id") REFERENCES "users"("id") on delete cascade
);
CREATE TABLE IF NOT EXISTS "roles" (
	"id"	integer NOT NULL,
	"name"	varchar NOT NULL,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "sessions" (
	"id"	varchar NOT NULL,
	"user_id"	integer,
	"ip_address"	varchar,
	"user_agent"	text,
	"payload"	text NOT NULL,
	"last_activity"	integer NOT NULL,
	PRIMARY KEY("id")
);
CREATE TABLE IF NOT EXISTS "tasks" (
	"id"	integer NOT NULL,
	"title"	text NOT NULL,
	"due"	date,
	"url"	text,
	"urgency_id"	integer,
	"user_id"	integer,
	PRIMARY KEY("id" AUTOINCREMENT),
	FOREIGN KEY("urgency_id") REFERENCES "urgencies"("id") on delete no action on update no action,
	FOREIGN KEY("user_id") REFERENCES "users"("id") on delete cascade
);
CREATE TABLE IF NOT EXISTS "urgencies" (
	"id"	integer NOT NULL,
	"name"	text NOT NULL,
	"color"	text NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "user_roles" (
	"id"	integer NOT NULL,
	"user_id"	integer NOT NULL,
	"role_id"	integer NOT NULL,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT),
	FOREIGN KEY("role_id") REFERENCES "roles"("id") on delete cascade,
	FOREIGN KEY("user_id") REFERENCES "users"("id") on delete cascade
);
CREATE TABLE IF NOT EXISTS "users" (
	"id"	integer NOT NULL,
	"name"	varchar NOT NULL,
	"email"	varchar NOT NULL,
	"email_verified_at"	datetime,
	"password"	varchar NOT NULL,
	"remember_token"	varchar,
	"created_at"	datetime,
	"updated_at"	datetime,
	PRIMARY KEY("id" AUTOINCREMENT)
);
INSERT INTO "migrations" VALUES (1,'0001_01_01_000000_create_users_table',1);
INSERT INTO "migrations" VALUES (2,'0001_01_01_000001_create_cache_table',1);
INSERT INTO "migrations" VALUES (3,'0001_01_01_000002_create_jobs_table',1);
INSERT INTO "migrations" VALUES (4,'2025_10_20_174041_create_tasks',2);
INSERT INTO "migrations" VALUES (5,'2025_10_20_180558_create_urgencies',3);
INSERT INTO "migrations" VALUES (6,'2025_11_10_113115_create_roles_and_user_roles_tables',4);
INSERT INTO "migrations" VALUES (7,'2025_11_10_113518_add_user_id_to_tasks_table',4);
INSERT INTO "migrations" VALUES (8,'2025_11_10_172411_create_profiles',5);
INSERT INTO "migrations" VALUES (10,'2025_11_10_182530_create_posts',6);
INSERT INTO "migrations" VALUES (11,'2025_11_17_185021_user_id_req',7);
INSERT INTO "posts" VALUES (1,'Мой первый пост','Контент первого поста',1,'2025-11-10','2025-11-10');
INSERT INTO "posts" VALUES (2,'Мой второй пост','Контент второго поста',1,'2025-11-10','2025-11-10');
INSERT INTO "posts" VALUES (3,'Сообщение','Сообщение по живому проводу',1,'2025-11-17 18:44:21','2025-11-17 18:44:21');
INSERT INTO "profiles" VALUES (1,'tgLink','+7(111)-111-11-11','bolNick09',1);
INSERT INTO "roles" VALUES (1,'участник',NULL,NULL);
INSERT INTO "roles" VALUES (2,'модератор',NULL,NULL);
INSERT INTO "roles" VALUES (3,'администратор',NULL,NULL);
INSERT INTO "sessions" VALUES ('EQFNfCvdlTPpaXtWdhjAe8IOmHwZfMGBVAH1NBSa',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMXZkZlZWYUEwT0Z1aFdCeDVPUjYwOEtXWndpMlFzdG50Z1k0bVhybyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMS91c2VycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc2MzQwNTE2MDt9fQ==',1763407548);
INSERT INTO "sessions" VALUES ('hPAFA9TFNamjtR080U79VNBR79Lj0LyUG4kiXzvu',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoickpEdE9pZ3V5TjF0MEY1MFNZb3l2TlFuS0pUa1ZSaXZ0MVVIMDBnQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9hc3NpZ24tcm9sZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc2MzgyMzgyMjt9fQ==',1763823950);
INSERT INTO "tasks" VALUES (2,'Test 1','2025-10-28',NULL,1,1);
INSERT INTO "tasks" VALUES (4,'Test 2','2025-10-28','',3,1);
INSERT INTO "tasks" VALUES (6,'Test 4','2025-10-31','',3,1);
INSERT INTO "tasks" VALUES (8,'Email: User@User','2025-11-11','',3,2);
INSERT INTO "tasks" VALUES (9,'Pass: UserUser1','2025-11-11','',3,2);
INSERT INTO "urgencies" VALUES (1,'Срочно','red');
INSERT INTO "urgencies" VALUES (2,'Средне','yellow');
INSERT INTO "urgencies" VALUES (3,'Не важно','green');
INSERT INTO "user_roles" VALUES (1,1,3,NULL,NULL);
INSERT INTO "user_roles" VALUES (2,2,1,NULL,NULL);
INSERT INTO "users" VALUES (1,'Admin','bolnick09rus@gmail.com',NULL,'$2y$12$jCiEpHMeKn.uR5FLcVJ1x.hm6/z0dmZLXFeW5DQoW.AS9Q8xCw.CK',NULL,'2025-10-27 18:29:45','2025-10-27 18:29:45');
INSERT INTO "users" VALUES (2,'User','User@User',NULL,'$2y$12$ybz7jWMlJBlThZtLom7kuOq954yQYZmmE6wnl4Atzstlj01DiE82m',NULL,'2025-11-10 12:38:37','2025-11-10 12:38:37');
CREATE UNIQUE INDEX IF NOT EXISTS "failed_jobs_uuid_unique" ON "failed_jobs" (
	"uuid"
);
CREATE INDEX IF NOT EXISTS "jobs_queue_index" ON "jobs" (
	"queue"
);
CREATE INDEX IF NOT EXISTS "sessions_last_activity_index" ON "sessions" (
	"last_activity"
);
CREATE INDEX IF NOT EXISTS "sessions_user_id_index" ON "sessions" (
	"user_id"
);
CREATE INDEX IF NOT EXISTS "tasks_user_id_index" ON "tasks" (
	"user_id"
);
CREATE UNIQUE INDEX IF NOT EXISTS "user_roles_user_id_role_id_unique" ON "user_roles" (
	"user_id",
	"role_id"
);
CREATE UNIQUE INDEX IF NOT EXISTS "users_email_unique" ON "users" (
	"email"
);
COMMIT;
