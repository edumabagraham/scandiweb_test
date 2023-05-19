CREATE TABLE products(
    sku VARCHAR(255) PRIMARY KEY,
    name VARCHAR(255),
    price DECIMAL(15,2)
);

CREATE TABLE dvd(
    id INT AUTO_INCREMENT PRIMARY KEY,
	product_sku VARCHAR(255),
    size INT(15),
    FOREIGN KEY (product_sku) REFERENCES products(sku)
);

CREATE TABLE book(
    id INT AUTO_INCREMENT PRIMARY KEY,
	product_sku VARCHAR(255),
    weight INT(10),
    FOREIGN KEY (product_sku) REFERENCES products(sku)
);

CREATE TABLE furniture(
    id INT AUTO_INCREMENT PRIMARY KEY,
	product_sku VARCHAR(255),
    height INT(10),
    width INT(10),
    length INT(10),
    FOREIGN KEY (product_sku) REFERENCES products(sku)
);


-- Insertions 
-- products
INSERT INTO products (sku, name, price) VALUES ('JVC200123', 'Acme DISC', 1.00), ('JVC200124', 'Lecrae DISC', 2.00),('JVC200125', 'AI DISC', 89.00), ('GGWP007', 'War and Peace', 26.00), ('GGWP008', 'Pride and Prejudice', 38.00), ('GGWP009', 'The Alchemist', 77.00), ('TR123055', 'Chair', 40.00),('TR123066', 'Desk', 490.00), ('TR123077', 'Dining Table', 2700.00);

-- dvd
INSERT INTO dvd (product_sku, size) VALUES ('JVC200123', 700), ('JVC200124', 850), ('JVC200125',73);

-- book
INSERT INTO book (product_sku, weight) VALUES ('GGWP007', 9), ('GGWP008', 8), ('GGWP009',38);

-- furniture
INSERT INTO furniture (product_sku, height, width, length) VALUES ('TR123055', 25,45,7), ('TR123066', 8,27,3), ('TR123077',83,29,12);