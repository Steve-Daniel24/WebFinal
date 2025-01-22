-- Drop tables in the correct order to avoid foreign key constraints
DROP TABLE IF EXISTS Payments;
DROP TABLE IF EXISTS Payment_Methods;
DROP TABLE IF EXISTS Favorites;
DROP TABLE IF EXISTS Availability;
DROP TABLE IF EXISTS Bookings;
DROP TABLE IF EXISTS Photos;
DROP TABLE IF EXISTS Properties;
DROP TABLE IF EXISTS Status_Availability;
DROP TABLE IF EXISTS Locations;
DROP TABLE IF EXISTS Habitation_Types;
DROP TABLE IF EXISTS Admins;
DROP TABLE IF EXISTS Clients;

-- Drop the database
DROP DATABASE IF EXISTS immobilier;
