-- Database creation
CREATE DATABASE immobilier;
USE immobilier;

-- Table for Users
CREATE TABLE Clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Table for Habitation Types
CREATE TABLE Habitation_Types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type_name VARCHAR(50) NOT NULL UNIQUE  -- e.g., house, studio, apartment
);

-- Table for Locations (Neighborhoods)
CREATE TABLE Locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    neighborhood_name VARCHAR(255) NOT NULL UNIQUE
);

-- Table for Properties (Habitations)
CREATE TABLE Properties (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type_id INT NOT NULL,  -- Foreign key to Habitation_Types
    num_rooms INT NOT NULL, -- Number of rooms
    daily_rent DECIMAL(10, 2) NOT NULL,  -- Rent per day
    location_id INT NOT NULL,  -- Foreign key to Locations
    description TEXT NOT NULL,  -- Short description of the property
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (type_id) REFERENCES Habitation_Types(id) ON DELETE RESTRICT,
    FOREIGN KEY (location_id) REFERENCES Locations(id) ON DELETE RESTRICT
);

-- Table for Status Availability
CREATE TABLE Status_Availability (
    id INT AUTO_INCREMENT PRIMARY KEY,
    status_name VARCHAR(50) NOT NULL UNIQUE  -- E.g., available, reserved
);

-- Table for Photos of Properties
CREATE TABLE Photos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    property_id INT NOT NULL,
    photo_url VARCHAR(255) NOT NULL,  -- URL to the photo
    FOREIGN KEY (property_id) REFERENCES Properties(id) ON DELETE CASCADE
);

-- Table for Bookings
CREATE TABLE Bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    property_id INT NOT NULL,
    client_id INT NOT NULL,  -- Foreign key to Clients
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    total_amount DECIMAL(10, 2) NOT NULL,
    status_id INT NOT NULL, -- foreign key to Status_Availability
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (property_id) REFERENCES Properties(id) ON DELETE CASCADE,
    FOREIGN KEY (client_id) REFERENCES Clients(id) ON DELETE CASCADE,
    FOREIGN KEY (status_id) REFERENCES Status_Availability(id) ON DELETE RESTRICT
);

-- Table for Availability of Properties
CREATE TABLE Availability (
    id INT AUTO_INCREMENT PRIMARY KEY,
    property_id INT NOT NULL,
    date DATE NOT NULL,
    status_id INT NOT NULL, -- foreign key to Status_Availability
    FOREIGN KEY (property_id) REFERENCES Properties(id) ON DELETE CASCADE,
    FOREIGN KEY (status_id) REFERENCES Status_Availability(id) ON DELETE RESTRICT
);

-- Table for Favorites
CREATE TABLE Favorites (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT NOT NULL,
    property_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES Clients(id) ON DELETE CASCADE,
    FOREIGN KEY (property_id) REFERENCES Properties(id) ON DELETE CASCADE
);

-- Table for Payment Methods
CREATE TABLE Payment_Methods (
    id INT AUTO_INCREMENT PRIMARY KEY,
    method_name VARCHAR(100) NOT NULL UNIQUE
);

-- Table for Payments
CREATE TABLE Payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT NOT NULL,  -- Links to Bookings
    amount DECIMAL(10, 2) NOT NULL,
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    method_id INT NOT NULL,  -- Foreign key to Payment_Methods
    FOREIGN KEY (booking_id) REFERENCES Bookings(id) ON DELETE CASCADE,
    FOREIGN KEY (method_id) REFERENCES Payment_Methods(id) ON DELETE RESTRICT
);
