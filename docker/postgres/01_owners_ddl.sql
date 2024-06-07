CREATE TABLE IF NOT EXISTS owners (
    id SERIAL PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL
);

CREATE UNIQUE INDEX IF NOT EXISTS owner_uidx ON owners (first_name, last_name);
