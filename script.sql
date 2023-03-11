CREATE TABLE shop(
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(200),
    passwords VARCHAR(200),
    shop_name VARCHAR(20),
    shop_address VARCHAR(255),
    phone_no INT(10),
    gst_no VARCHAR(20),
    signup_date DATETIME DEFAULT CURRENT_TIMESTAMP
);
ALTER TABLE shop ADD CONSTRAINT uc_shop UNIQUE (email);
ALTER TABLE shop ADD user_url VARCHAR(255);

CREATE TABLE products(
    id INT AUTO_INCREMENT PRIMARY KEY,
    shop_id INT(100),
    prod_category VARCHAR(100) NOT NULL,
    prod_subcat VARCHAR(100) NOT NULL,
    prod_img VARCHAR(200),
    product_name VARCHAR(255) NOT NULL,
    product_quant INT(10) NOT NULL,
    product_price VARCHAR(10) NOT NULL,
    last_update DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT prod_shop FOREIGN KEY (shop_id) REFERENCES shop(id)
);
ALTER TABLE products ADD product_description VARCHAR(255);

CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255),
    phone_no INT(10),
    user_name VARCHAR(50),
    user_url VARCHAR(255),
    passwords VARCHAR(200),
    signup_date DATETIME DEFAULT CURRENT_TIMESTAMP
);
-- email should be unque

DELETE FROM posts WHERE url='1cb4196c78';

CREATE TABLE review(
    user_id INT(100),
    product_id INT(100),
    review VARCHAR(255),
    CONSTRAINT users_review FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT product_review FOREIGN KEY (product_id) REFERENCES products(id)
);

CREATE TABLE notifications(
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT(100),
    shop_id INT(100),
    notification_type VARCHAR(10),
    notification_link VARCHAR(255),
    CONSTRAINT user_ntf FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT shop_ntf FOREIGN KEY (shop_id) REFERENCES shop(id) 
);
ALTER TABLE notifications ADD seen_unseen VARCHAR(10);

CREATE TABLE order(
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(100),
    shop_id INT(100),
    CONSTRAINT shop_order FOREIGN KEY (shop_id) REFERENCES shop(id),
    CONSTRAINT user_id FOREIGN KEY (user_id) REFERENCES users(id) 
);