DELIMITER $$

CREATE
    TRIGGER `pusb8564_dataku`.`AU_REQUEST_DEPOSITE` AFTER UPDATE
    ON `pusb8564_dataku`.`REQUEST_DEPOSITE`
    FOR EACH ROW BEGIN
	SET @vEmail = OLD.EMAIL;
	SET @vOldStatus = OLD.STATUS;
	SET @vNewStatus = NEW.STATUS;
	SET @vSaldo = OLD.SALDO;
	IF @vOldStatus != @vNewStatus THEN
		IF @vNewStatus = "ISSUED" THEN
			SET @vOldSaldo = (SELECT SALDO FROM CUSTOMER_DEPOSITE WHERE EMAIL = @vEmail);
			SET @vNewSaldo = @vOldSaldo + @vSaldo;
			UPDATE CUSTOMER_DEPOSITE SET SALDO = @vNewSaldo WHERE EMAIL = @vEmail;
		END IF;
	END IF;
    END$$

DELIMITER ;