-- Insert sample data into Habitation_Types
INSERT INTO Habitation_Types (type_name) VALUES ('House');
INSERT INTO Habitation_Types (type_name) VALUES ('Studio');
INSERT INTO Habitation_Types (type_name) VALUES ('Apartment');
INSERT INTO Habitation_Types (type_name) VALUES ('Villa');
INSERT INTO Habitation_Types (type_name) VALUES ('Cottage');

-- Insert sample data into Locations
INSERT INTO Locations (neighborhood_name) VALUES ('Downtown');
INSERT INTO Locations (neighborhood_name) VALUES ('Uptown');
INSERT INTO Locations (neighborhood_name) VALUES ('Suburb');
-- Inserting Clients
INSERT INTO Clients (name, password, email, phone) VALUES 
('John Doe', '123', 'john@example.com', '1234'),
('Jane Smith', '456', 'jane@example.com', '1234'),
('Alice Johnson', '789', 'alice@example.com', '1234');


-- Inserting Admins
INSERT INTO Admins (name, password) VALUES 
('Ny Voary', 'ETU003657');


-- Inserting property types
INSERT INTO Property_Types (type_name) VALUES
('House'),
('Studio'),
('Apartment'),
('Villa'),
('Chalet'),
('Loft'),
('Bungalow'),
('Mobile Home'),
('Luxury'),
('Castle');


-- Inserting locations
INSERT INTO Locations (neighborhood_name) VALUES
-- For Mobile Homes near national parks or campsites
('Andasibe - Mantadia National Park'),  
('Ranomafana National Park'),  
('Isalo National Park'),  
('Ankarafantsika National Park'),  
('Marojejy National Park'),  

-- For Castles in wealthy areas
('Ivandry - Antananarivo'),  
('Ambatobe - Antananarivo'),  
('Ankadilalana - Antananarivo'),  
('Androhibe - Antananarivo'),  

-- For Villas in scenic or high-end locations
('Nosy Be - Andilana'),  
('Foulpointe'),  
('Mahajanga - Amborovy'),  
('Ambatolampy'),  

-- For Chalets in mountainous or cooler regions
('Antsirabe'),  
('Andringitra'),  
('Betafo'),  
('Ambohimanga'),  

-- For Bungalows in coastal or beach areas
('Toamasina'),  
('Manakara'),  
('Fort Dauphin'),  
('Morondava'),  

-- For Lofts in urban or modernized areas
('Analakely - Antananarivo'),  
('Ampefiloha - Antananarivo'),  
('Antsahabe - Antananarivo'),  
('Antsakaviro - Antananarivo');


-- Inserting availability statuses
INSERT INTO Status_Availability (status_name) VALUES
('Available'),          -- The property is available for booking
('Reserved'),           -- The property has been reserved by a client
('Occupied'),           -- The property is currently occupied
('Under Maintenance'),  -- The property is temporarily unavailable due to repairs or upgrades
('Pending Approval'),   -- A reservation request is awaiting admin approval
('Unavailable');        -- The property is not available for booking for unspecified reasons


-- Inserting payment methods
INSERT INTO Payment_Methods (method_name) VALUES
('Credit Card'),       -- Payment via Visa, Mastercard, etc.
('Debit Card'),        -- Payment via bank-linked debit cards
('PayPal'),            -- Online payment using PayPal
('Bank Transfer'),     -- Direct bank-to-bank transfers
('Mobile Money'),      -- Services like Mvola, Orange Money, Airtel Money (popular in Madagascar)
('Cash on Arrival'),   -- Payment in cash upon check-in
('Cryptocurrency'),    -- Payment using Bitcoin, Ethereum, or other cryptocurrencies
('Google Pay'),        -- Payment via Google's digital wallet
('Apple Pay'),         -- Payment via Apple's digital wallet
('Gift Voucher');      -- Payment using agency-issued vouchers or gift cards