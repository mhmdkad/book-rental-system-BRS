BEGIN TRANSACTION;
INSERT INTO "users" ("id","name","email","email_verified_at","password","is_librarian","remember_token","created_at","updated_at") VALUES (1,'reader1','reader@brs.com',NULL,'$2y$10$ReG9tOkd5sVw3wH2zr3SyO4UJo.2P6SNHwq/2.eQIt2SdGC1Npn5q',0,NULL,'2022-04-16 09:46:42','2022-04-16 09:46:42'),
 (2,'librarian1','librarian@brs.com',NULL,'$2y$10$NRux608PBtGlN0//4JNjE.xD9PCrhthYPF2dzcskQTn2fgG0AW3JC',1,NULL,'2022-04-16 09:47:05','2022-04-16 09:47:05'),
 (3,'librarian2','librarian2@brs.com',NULL,'$2y$10$h7ONbd5L4QPA0Lgq0WPCteWNzGpseq.CdocmVDQwM9I84aQffpHUi',1,NULL,'2022-04-16 09:47:22','2022-04-16 09:47:22'),
 (4,'reader2','reader2@brs.com',NULL,'$2y$10$Fl4uQ01U1hISYd1XlLiv8.5ubptdF5VsvpKMo4mJSOqbaM7RB3FCe',0,NULL,'2022-04-18 11:25:49','2022-04-18 11:25:49');
INSERT INTO "books" ("id","title","authors","description","released_at","cover_image","pages","language_code","isbn","in_stock","created_at","updated_at") VALUES (1,'book1','auth1',NULL,'2022-04-01',NULL,33,'hu','33isbn',5,'2022-04-16 09:51:25','2022-04-16 12:18:00'),
 (2,'book2','auth2',NULL,'2022-04-01',NULL,55,'hu','55isbn',22,'2022-04-16 09:52:27','2022-04-16 09:52:27'),
 (5,'book3','auth3',NULL,'2022-04-05',NULL,55,'hu','oiu',22,'2022-04-18 18:18:27','2022-04-18 18:18:27'),
 (6,'book4','auth4',NULL,'2022-04-20',NULL,55,'hu','gh',5,'2022-04-18 20:38:31','2022-04-18 20:38:31');
INSERT INTO "genres" ("id","name","style","created_at","updated_at") VALUES (1,'romance','primary','2022-04-16 09:46:42','2022-04-16 09:46:42'),
 (2,'comedy','primary','2022-04-16 09:46:42','2022-04-16 09:46:42'),
 (11,'action','light',NULL,'2022-04-17 19:32:57'),
 (12,'History','info',NULL,'2022-04-17 21:44:26');
INSERT INTO "borrows" ("id","reader_id","book_id","status","request_processed_at","request_managed_by","deadline","returned_at","return_managed_by","created_at","updated_at") VALUES (1,1,2,'RETURNED','2022-04-10 00:00:00',2,'2022-04-12 14:23:39','2022-04-11 14:23:39',2,'2022-04-11 14:23:39','2022-04-11 14:23:39'),
 (2,1,2,'RETURNED','',2,'2022-04-12 14:23:39','2022-04-16 10:03:39',2,'2022-04-12 14:23:39','2022-04-16 22:03:39'),
 (4,1,1,'ACCEPTED','2022-04-18 16:12:24',2,'2022-04-22 18:40:00',NULL,NULL,'2022-04-11 14:23:39','2022-04-18 16:12:24'),
 (5,1,2,'ACCEPTED','2022-04-18 16:42:23',2,'2022-04-19 07:03:00',NULL,NULL,'2022-04-17 08:10:47','2022-04-18 16:42:23'),
 (6,4,1,'ACCEPTED','2022-04-18 11:27:26',2,'2022-04-19 00:0:00',NULL,NULL,'2022-04-18 11:26:06','2022-04-18 11:27:26'),
 (7,4,2,'ACCEPTED','2022-04-18 11:30:23',2,'2022-04-19 00:0:00',NULL,NULL,'2022-04-18 11:28:22','2022-04-18 11:30:23'),
 (8,4,5,'PENDING',NULL,NULL,NULL,NULL,NULL,'2022-04-18 18:21:34','2022-04-18 18:21:34');
INSERT INTO "book_genre" ("book_id","genre_id","created_at","updated_at") VALUES (2,1,NULL,NULL),
 (1,1,NULL,NULL),
 (1,2,NULL,NULL),
 (5,1,NULL,NULL),
 (5,2,NULL,NULL),
 (5,11,NULL,NULL),
 (5,12,NULL,NULL),
 (6,1,NULL,NULL),
 (6,2,NULL,NULL);
COMMIT;
