INSERT INTO `user` (`user_password`, `first_name`, `last_name`, `email_address`, `telephone_no`, `is_admin`)
VALUES ("5c4d063a790dafdd57bc8e798c6d8b025e77c7d53fef8ec0fdde4109da6d3b1b", "admin", "admin", "admin@cougars.csusm.edu", "1111111111", 1);
INSERT INTO `user` (`user_password`, `first_name`, `last_name`, `email_address`, `telephone_no`, `is_admin`)
VALUES ("6427cdf1948b6f612d418ab0b0b03f6ccc46c73acda2be0917954663aa810ff6", "Evan", "Causey", "EC@cougars.csusm.edu", "7605558987", 0);
INSERT INTO `user` (`user_password`, `first_name`, `last_name`, `email_address`, `telephone_no`, `is_admin`)
VALUES ("335c1c6b07bbcf3108e9433458d319acb47c831d923320eea06f562f2f1c5ac5", "Caleb", "Evans", "CE@cougars.csusm.edu", "7605559876", 0);
INSERT INTO `user` (`user_password`, `first_name`, `last_name`, `email_address`, `telephone_no`, `is_admin`)
VALUES ("a73a3dbe85dd712284aa24890ba4d8e685ce0b06f338727bb9906d2ca57392ce", "Kevin", "Mata", "KM@cougars.csusm.edu", "7605559999", 0);
INSERT INTO `user` (`user_password`, `first_name`, `last_name`, `email_address`, `telephone_no`, `is_admin`)
VALUES ("a696253072555e3b647001608c5d0d94904f6a647be1fe53dc7b3be6c3a8e32d", "Luis", "Moreno", "LM@cougars.csusm.edu", "7605551111", 0);
INSERT INTO `user` (`user_password`, `first_name`, `last_name`, `email_address`, `telephone_no`, `is_admin`)
VALUES ("dc873b4532dcd913a78bd82f6cbea54d83ea51199d9e88b5cf76dfca5a90da3d", "Samir", "Asfirane", "SA@cougars.csusm.edu", "7605552222", 0);
INSERT INTO `user` (`user_password`, `first_name`, `last_name`, `email_address`, `telephone_no`, `is_admin`)
VALUES ("c67be415fde48a71285c3412546b4e72701498abe0fb73964fe188d1546e30a3", "Dom", "Aguayo Huerta", "DL@authors.csusm.edu", "5519993333", 0);
INSERT INTO `user` (`user_password`, `first_name`, `last_name`, `email_address`, `telephone_no`, `is_admin`)
VALUES ("f1dd7a1fbed3f537531be267a1bef3c6185afbc0c28c3fc56b10c73b6d85dc54", "Anubis", "Aguayo Huerta", "AL@authors.csusm.edu", "5559993333", 0);
INSERT INTO `user` (`user_password`, `first_name`, `last_name`, `email_address`, `telephone_no`, `is_admin`)
VALUES ("703130a69b2e0100746fe3b568eb6e87b29b83786a19f885df37db8157f317b5", "Cathy", "O'Neil", "Cathy@authors.csusm.edu", "1112223333", 0);
INSERT INTO `user` (`user_password`, `first_name`, `last_name`, `email_address`, `telephone_no`, `is_admin`)
VALUES ("6f0e1ce5e7ea470e04a9b4e02454642945c26f57549ca7715b983c37288884fe", "Tom", "Griffiths", "Tom@authors.csusm.edu", "1113332222", 0);
INSERT INTO `user` (`user_password`, `first_name`, `last_name`, `email_address`, `telephone_no`, `is_admin`)
VALUES ("7798ee80c9ce76f88b88c8bb1e111b2aac0c9993bce227309cfac1ee0dcbc905", "Michael", "Lewis", "ML@authors.csusm.edu", "3211234444", 0);
INSERT INTO `user` (`user_password`, `first_name`, `last_name`, `email_address`, `telephone_no`, `is_admin`)
VALUES ("33a334536ce098839c19551070ecd53e05ef01be3539d92f3e7855aebe5ca160", "Farrar", "Straus", "Farrar@authors.csusm.edu", "1112223333", 0);
INSERT INTO `user` (`user_password`, `first_name`, `last_name`, `email_address`, `telephone_no`, `is_admin`)
VALUES ("6f0e1ce5e7ea470e04a9b4e02454642945c26f57549ca7715b983c37288884fe", "Tom", "Giroux", "Tom@authors.csusm.edu", "1113332222", 0);
INSERT INTO `user` (`user_password`, `first_name`, `last_name`, `email_address`, `telephone_no`, `is_admin`)
VALUES ("7798ee80c9ce76f88b88c8bb1e111b2aac0c9993bce227309cfac1ee0dcbc905", "Timothy", "firress", "ML@authors.csusm.edu", "3211234444", 0);


INSERT INTO `ad` (`user_id`, `book_title`, `book_author`, `book_edition`, `book_isbn`, `listed_price`, `path_to_picture`, `ad_description`, `is_closed`)
VALUES (2, "El Tabaco Macaco", "Farrar Straus", 1, '1627790365', 20.50, NULL, "I see the the book has a few scratches around the corners.", 1);
INSERT INTO `ad` (`user_id`, `book_title`, `book_author`, `book_edition`, `book_isbn`, `listed_price`, `path_to_picture`, `ad_description`, `is_closed`)
VALUES (2, "Algorithms to Live By", "Michael Johnes", 1, '0553418815', 20.50, NULL, "New in the wrapper", 1);
INSERT INTO `ad` (`user_id`, `book_title`, `book_author`, `book_edition`, `book_isbn`, `listed_price`, `path_to_picture`, `ad_description`, `is_closed`)
VALUES (2, "The Undoing Project", "Tom Garland", 2, '0393254593', 10.40, NULL, "awesome", 1);
INSERT INTO `ad` (`user_id`, `book_title`, `book_author`, `book_edition`, `book_isbn`, `listed_price`, `path_to_picture`, `ad_description`, `is_closed`)
VALUES (3, "The Undoing Project", "Timothy", 1, '0393254593', 2.00, NULL, "Not new", 1);
INSERT INTO `ad` (`user_id`, `book_title`, `book_author`, `book_edition`, `book_isbn`, `listed_price`, `path_to_picture`, `ad_description`, `is_closed`)
VALUES (3, "Destruction by the computer", "Tom Smith", 1, '93857203784', 2.40, NULL, "new", 1);
INSERT INTO `ad` (`user_id`, `book_title`, `book_author`, `book_edition`, `book_isbn`, `listed_price`, `path_to_picture`, `ad_description`, `is_closed`)
VALUES (4, "Dont touch that keyboard", "Evan Causey", 1, '8740283749', 12.30, NULL, "old", 0);
INSERT INTO `ad` (`user_id`, `book_title`, `book_author`, `book_edition`, `book_isbn`, `listed_price`, `path_to_picture`, `ad_description`, `is_closed`)
VALUES (5, "Opps that was an error", "James Johns", 1, '2736294857', 33.40, NULL, "ruined", 1);
INSERT INTO `ad` (`user_id`, `book_title`, `book_author`, `book_edition`, `book_isbn`, `listed_price`, `path_to_picture`, `ad_description`, `is_closed`)
VALUES (6, "Looking for bugs", "Trumpet Willson", 1, '1029827394', 10.43, NULL, "never read", 1);
INSERT INTO `ad` (`user_id`, `book_title`, `book_author`, `book_edition`, `book_isbn`, `listed_price`, `path_to_picture`, `ad_description`, `is_closed`)
VALUES (7, "Captivating lectures about boolean", "Eric Fitzgarald", 1, '9837462936', 93.12, NULL, "look at it", 1);
INSERT INTO `ad` (`user_id`, `book_title`, `book_author`, `book_edition`, `book_isbn`, `listed_price`, `path_to_picture`, `ad_description`, `is_closed`)
VALUES (8, "Computer science in space", "DJ dance", 1, '9827364921', 11.20, NULL, "old book", 0);
INSERT INTO `ad` (`user_id`, `book_title`, `book_author`, `book_edition`, `book_isbn`, `listed_price`, `path_to_picture`, `ad_description`, `is_closed`)
VALUES (11, "Computer science in space", "DJ dance", 2, '1029387421', 28.23, NULL, "new book", 1);
