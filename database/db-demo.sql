-- dummy data for demonstration purposes only; can also be used as test data

-- delete existing data first
DELETE FROM `ad`;
DELETE FROM `user`;
-- reset auto increment
ALTER TABLE `ad` AUTO_INCREMENT = 1;
ALTER TABLE `user` AUTO_INCREMENT = 1;

-- create two users; one user with regular privileges and one administrator with
-- elevated privileges
INSERT INTO `user` (
	`user_id`,
	`user_password`,
	`first_name`,
	`last_name`,
	`email_address`,
	`telephone_no`,
	`is_admin`
) VALUES (
	1,
	-- password: swordfish
	"2359f52bb4d55e12b9b6ff8625a59cdb8219882261e2e1be98c48dc71cc776e3",
	"John",
	"Smith",
	"smith001@cougars.csusm.edu",
	"123-456-7890",
	0
), (
	2,
	-- password: redpanda
	"11878107fe8b8d571a9f22701a1ad26201a4420458ff86e7cb825a5f90437e30",
	"Caleb",
	"Evans",
	"evans099@cougars.csusm.edu",
	"760-123-4567",
	1
);

-- create seven ads
INSERT INTO `ad` (
	`ad_id`,
	`user_id`,
	`book_title`,
	`book_author`,
	`book_edition`,
	`book_isbn`,
	`listed_price`,
	`path_to_picture`,
	`ad_description`,
	`creation_time`,
	`is_closed`
) VALUES (
	1,
	1,
	"Moby Dick",
	"Herman Melville",
	NULL,
	"9788124800485",
	24.50,
	"ad-1.jpg",
	"Minor tears on some pages, but perfectly readable",
	"2016-10-14 17:30:54",
	0
), (
	2,
	2,
	"Programming the World Wide Web",
	"Robert W. Sebasta",
	"8",
	"9780133775983",
	100.00,
	"ad-2.jpg",
	"In near perfect condition",
	"2016-11-16 09:04:26",
	0
), (
	3,
	2,
	"Digital Electronics: A Practical Approach",
	"William Kleitz",
	"9",
	"0132543036",
	60.00,
	"ad-3.jpg",
	"Brand new; still sealed",
	"2016-09-03 11:24:04",
	0
), (
	4,
	1,
	"The Catcher in the Rye",
	"J.D. Salinger",
	NULL,
	"9788970120676",
	20.00,
	"ad-4.jpg",
	"A few small scratches",
	"2015-02-02 14:52:19",
	1
), (
	5,
	1,
	"The Chronicles of Narnia: The Lion, the Witch and the Wardrobe",
	"C.S. Lewis",
	NULL,
	"0064404994",
	40.00,
	"ad-5.jpg",
	"Has a few traces of lion fur.\nRoar!",
	"2016-11-20 19:05:46",
	0
), (
	6,
	1,
	"Brave New World",
	"Aldous Huxley",
	NULL,
	"0060850523",
	30.00,
	"ad-6.jpg",
	"Some wear, but in good condition",
	"2014-06-27 13:06:23",
	0
), (
	7,
	1,
	"Fahrenheit 451",
	"Ray Bradbury",
	NULL,
	"9781451673319",
	10.00,
	"ad-7.jpg",
	"Pages slightly burnt",
	"2013-08-12 15:26:11",
	0
),
(
	8,
	2,
	"I Am the Messenger",
	"Markus Zusak",
	NULL,
	"9780375836671",
	30.00,
	"ad-8.jpg",
	"Paperback; good condition",
	"2010-05-29 11:31:59",
	0
);
