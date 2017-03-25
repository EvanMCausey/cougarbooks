Select book_title, book_author, book_isbn, listed_price, ad_description
FROM ad
WHERE ad.is_closed = 1;

Select book_title, book_author, book_isbn, listed_price, ad_description
FROM ad
WHERE ad.user_id = (select DISTINCT user_id
From user
WHERE user.email_address  = "EC@cougars.csusm.edu");

SELECT book_title, book_author, book_isbn, listed_price, ad_description
FROM ad
WHERE ad_description LIKE '%new%';

SELECT book_title, book_author, book_isbn, listed_price, ad_description
FROM ad
WHERE book_title LIKE '%science%';

select book_title, book_edition, book_author, book_isbn, listed_price, ad_description
from ad
where creation_time >= ('2016-11-20 00:00:00');
