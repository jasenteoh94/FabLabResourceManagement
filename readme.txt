In order to use this system,
 
1. Start your apache and MySQL server.
2. Extract the files in "SQL with password" into your apache directory.
3. Go to localhost/your_directory/index.php
4. Set up your database with our index.php.
5. Set up a SMTP server 
6. Test your SMTP server by registering a student account
7. Your software is then ready to be used.

KNOWN PROBLEMS

1. If you are using Windows Server, you might encounter a "mysql_connect(): Access denied for user 'root'@'localhost' (using password: YES)".
To fix this problem, use the "SQL no password" folder instead.
The difference with the two folders is that one will have a password parameter for the Database connection and the other one do not have the password parameter.

2. If your SMTP does not work, try to register the emails with non-microsoft emails. Microsoft seems to block off email from your internet SMTP ports.

3. If you have problem with linux creating files with setup.php. (can't open files) This might means your directory have no permission to write fles. Set permission on the directory will solve the problem: (For example)
sudo chmod o+w /var/www/directory_name/php
