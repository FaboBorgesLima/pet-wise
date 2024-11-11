CREATE TABLE medical_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(100) NOT NULL,
    appointment_date DATE NOT NULL,
    notes TEXT,
    medications VARCHAR(255)
);