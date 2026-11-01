-- Match the 25-character account names accepted by rekeningen.username.
-- Widen both successful and failed login logs without truncating account names.
-- Repeatable on existing installs; customized columns wider than 25 are retained.
-- Select the target game database before running this migration.

SET @wl_login_names_sql = IF(
    EXISTS (
        SELECT 1 FROM information_schema.COLUMNS
        WHERE TABLE_SCHEMA = DATABASE()
          AND TABLE_NAME = 'inlog_logs'
          AND COLUMN_NAME = 'speler'
          AND CHARACTER_MAXIMUM_LENGTH >= 25
    ),
    'DO 0',
    'ALTER TABLE `inlog_logs` MODIFY COLUMN `speler` varchar(25) NOT NULL'
);
PREPARE wl_widen_login_names FROM @wl_login_names_sql;
EXECUTE wl_widen_login_names;
DEALLOCATE PREPARE wl_widen_login_names;

SET @wl_login_names_sql = IF(
    EXISTS (
        SELECT 1 FROM information_schema.COLUMNS
        WHERE TABLE_SCHEMA = DATABASE()
          AND TABLE_NAME = 'inlog_fout'
          AND COLUMN_NAME = 'spelernaam'
          AND CHARACTER_MAXIMUM_LENGTH >= 25
    ),
    'DO 0',
    'ALTER TABLE `inlog_fout` MODIFY COLUMN `spelernaam` varchar(25) NOT NULL'
);
PREPARE wl_widen_login_names FROM @wl_login_names_sql;
EXECUTE wl_widen_login_names;
DEALLOCATE PREPARE wl_widen_login_names;
SET @wl_login_names_sql = NULL;
