1. Database name: reg
2. Import reg.sql to your MySQL Database
3. Or you can create table:
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_uid` varchar(20) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pwd` varchar(18) NOT NULL,
  `vaqt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
)