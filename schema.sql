-- Table for Users (admin and clients)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone_number VARCHAR(15) NOT NULL,
    role ENUM('admin', 'client') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for Habitations (properties)
CREATE TABLE habitations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(50) NOT NULL,  -- e.g., house, studio, apartment
    num_rooms INT NOT NULL,
    daily_rent DECIMAL(10, 2) NOT NULL,  -- Rent per day
    neighborhood VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,  -- Short description of the property
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for Photos of Habitations
CREATE TABLE photos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    habitation_id INT NOT NULL,
    photo_url VARCHAR(255) NOT NULL,  -- URL to the photo
    FOREIGN KEY (habitation_id) REFERENCES habitations(id) ON DELETE CASCADE
);

-- Table for Reservations
CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    habitation_id INT NOT NULL,
    user_id INT NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    total_amount DECIMAL(10, 2) NOT NULL,
    status ENUM('pending', 'confirmed', 'cancelled') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (habitation_id) REFERENCES habitations(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Table for Availability of Habitations
CREATE TABLE availability (
    id INT AUTO_INCREMENT PRIMARY KEY,
    habitation_id INT NOT NULL,
    date DATE NOT NULL,
    is_available BOOLEAN NOT NULL DEFAULT TRUE,
    FOREIGN KEY (habitation_id) REFERENCES habitations(id) ON DELETE CASCADE
);