SELECT * FROM fp_users
WHERE users_username = :users_username
	AND users_password = :users_password;
