CREATE TABLE seekers (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
  username TEXT NOT NULL UNIQUE,
  password TEXT NOT NULL,
  first_name TEXT NOT NULL,
  last_name TEXT NOT NULL,
  email TEXT,
  phone_number TEXT NOT NULL,
  picpath TEXT NOT NULL UNIQUE
);

CREATE TABLE providers (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
  username TEXT NOT NULL UNIQUE,
  password TEXT NOT NULL,
  first_name TEXT NOT NULL,
  last_name TEXT NOT NULL,
  email TEXT,
  phone_number TEXT NOT NULL,
  picpath TEXT NOT NULL UNIQUE
);

CREATE TABLE jobs (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
  seeker_id INTEGER,
  provider_id INTEGER NOT NULL,
  location TEXT NOT NULL
);
CREATE TABLE provider_reviews (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
  provider_id INTEGER NOT NULL,
  job_id INTEGER NOT NULL,
  review TEXT
);
CREATE TABLE seeker_reviews (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
  seeker_id INTEGER NOT NULL,
  job_id INTEGER NOT NULL,
  review TEXT
);

INSERT INTO seekers (username, password, first_name, last_name, phone_number, picpath) VALUES
('David', '$2y$10$XdycOEig3.Sq.zTN54qKhuBuO.0pJpmvPikji9uT4lN9ncROBOqjy','Lusungu','Davido','911','1.png');
INSERT INTO seekers (username, password, first_name, last_name, phone_number, picpath) VALUES
('Chris', '$2y$10$HlYNTSd/q3sguKJsiGICXe8kmiL7omXsvpt5jHAYp0Hv9cCLIgkeq','Christopher','Mumba','111','2.png');
