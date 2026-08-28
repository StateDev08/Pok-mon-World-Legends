-- Adds the per-character interface language so that background jobs (cron,
-- e-mails) and messages that are stored for another player can be written in
-- the language of the recipient instead of the language of the acting request.
ALTER TABLE `gebruikers`
    ADD COLUMN `language` varchar(2) NOT NULL DEFAULT 'pt';
