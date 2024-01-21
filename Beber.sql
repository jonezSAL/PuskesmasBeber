CREATE TABLE patients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    no_antrian INT NOT NULL,
    nama VARCHAR(255) NOT NULL,
    nik BIGINT NOT NULL,
    tgl_lahir DATE NOT NULL,
    status VARCHAR(20) NOT NULL,
    alamat TEXT NOT NULL,
    keluhan TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DELIMITER //

CREATE EVENT reset_and_set_created_at
ON SCHEDULE EVERY 1 DAY
STARTS TIMESTAMP(CURDATE() + INTERVAL 1 DAY)
DO
BEGIN
    UPDATE patients
    SET no_antrian = 0;

    UPDATE patients
    SET created_at = NOW() - INTERVAL FLOOR(RAND() * 10000) DAY;
END//

DELIMITER ;
