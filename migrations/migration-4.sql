CREATE TABLE alumni_deads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    generation VARCHAR(100) NOT NULL,
    date DATE NOT NULL,
    address TEXT NOT NULL,
    colleague_phone VARCHAR(100) NOT NULL,
    reason VARCHAR(100) NOT NULL,
    burial_location TEXT NOT NULL,
    status VARCHAR(20) DEFAULT "di ajukan",
    notes TEXT DEFAULT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE alumni_beneficiaries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    generation VARCHAR(100) NOT NULL,
    receiver_name VARCHAR(100) NOT NULL,
    receiver_status VARCHAR(100) NOT NULL,
    beneficiary_factor VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    colleague_phone VARCHAR(100) NOT NULL,
    status VARCHAR(20) DEFAULT "di ajukan",
    notes TEXT DEFAULT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE scholarship_receivers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    generation VARCHAR(100) NOT NULL,
    receiver_name VARCHAR(100) NOT NULL,
    receiver_status VARCHAR(100) NOT NULL,
    scholarship_factor VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    colleague_phone VARCHAR(100) NOT NULL,
    status VARCHAR(20) DEFAULT "di ajukan",
    notes TEXT DEFAULT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);