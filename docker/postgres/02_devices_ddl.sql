CREATE TYPE device_type AS ENUM ('pc', 'laptop', 'mobil');
CREATE TYPE operating_system AS ENUM ('win', 'lin', 'macOS', 'iOS', 'android');

CREATE TABLE IF NOT EXISTS devices (
    id SERIAL PRIMARY KEY,
    owner_id INT NOT NULL,
    hostname VARCHAR(255) NOT NULL,
    device_type device_type NOT NULL,
    operating_system operating_system NOT NULL,
    FOREIGN KEY(owner_id) REFERENCES owners(id) ON DELETE RESTRICT ON UPDATE CASCADE
);
