-- Create database and table for Avengers Wiki
CREATE DATABASE IF NOT EXISTS avengers_wiki;
USE avengers_wiki;

CREATE TABLE IF NOT EXISTS characters (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    real_name VARCHAR(100) NOT NULL,
    status VARCHAR(50) NOT NULL,
    team VARCHAR(100) NOT NULL,
    abilities TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert initial data from existing data.json
INSERT INTO characters (name, real_name, status, team, abilities) VALUES
('Iron Man', 'Tony Stark', 'Deceased', 'Avengers', 'Genius-level intellect, Powered armor suit'),
('Captain America', 'Steve Rogers', 'Retired', 'Avengers', 'Enhanced strength, agility, Vibranium shield');
