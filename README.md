What is this repository for?

    This repository is majorly for web services, it's a MVC blog web based application written in codeigniter, whereby an admin can create posts, update and delete posts and a user can signup, login, like a post and leave comments to a post and also edit their comment. There is a signup page for users to register, a user authentication page and a login page page after successful registration.

How do I get set up?

    Registration page->Login page->user page
    bootstrap, JQuery
    Database configuration
        Host->"localhost" or "127.0.0.1"
        Username->"root"
        Password->""
        Database->Blog
        TABLES
            users-> holds user details
            news->holds posts
            column news.user_id=users.id is the matching order
SQL:
 CREATE DATABASE blog;						
 CREATE TABLE users(
  id INT NOT NULL  AUTO_INCREMENT PRIMARY KEY ,
  username VARCHAR(50) NOT NULL,
  firstname VARCHAR(50) NOT NULL,
  lastname VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  password VARCHAR(50) NOT NULL
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
);

CREATE  TABLE  news (
  id INT  NOT  NULL AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR (100) NOT  NULL,
  slug VARCHAR(100) NOT  NULL UNIQUE,
  image VARCHAR(100) DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  user_id INT NOT NULL
  CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
  likes INT(11)
);

CREATE TABLE comment(
  id INT  NOT  NULL AUTO_INCREMENT PRIMARY KEY,
  comment_username VARCHAR (100) NOT  NULL,
  comment_body TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  edited_at TIMESTAMP,
  post_id INT(11)
  CONSTRAINT fk_post_id FOREIGN KEY (post_id) REFERENCES news(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE likes(
  id INT  NOT  NULL AUTO_INCREMENT PRIMARY KEY,
  post_id INT(11)
  CONSTRAINT fk_post_id FOREIGN KEY (post_id) REFERENCES news(id) ON DELETE CASCADE ON UPDATE CASCADE,
  user_id INT NOT NULL
  CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,

);
						
		config : base_url=>http://localhost/CodeIgniter-blog/
		registration page=>http://localhost/CodeIgniter-blog/index.php/home/signup
		signin page  =>http://localhost/CodeIgniter-blog/index.php/home/login
		user page =>http://localhost/CodeIgniter-blog/home
		user profile page =>http://localhost/CodeIgniter-blog/home/profile/username


ROUTES
$route['home'] = 'home/index';
$route['home/login'] = 'users/login';
$route['home/signup'] = 'users/sign_up';
$route['home/profile/(:any)'] = 'users/profile/$1';
$route['home/update_post/(:any)'] = 'home/update_post/$1';
$route['home/add_comment']['post'] = 'home/add_comment';
