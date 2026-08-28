-- Russian and Chinese were selectable in the interface but the item tables had
-- no description column for them, so `SELECT omschrijving_ru` failed and the
-- shop pages stayed empty. Add the columns and seed them from Portuguese.
ALTER TABLE `markt`
    ADD COLUMN `omschrijving_ru` mediumtext NOT NULL,
    ADD COLUMN `omschrijving_zh` mediumtext NOT NULL;

UPDATE `markt` SET `omschrijving_ru` = `omschrijving_pt`, `omschrijving_zh` = `omschrijving_pt`;

ALTER TABLE `marktespecial`
    ADD COLUMN `omschrijving_ru` mediumtext NOT NULL,
    ADD COLUMN `omschrijving_zh` mediumtext NOT NULL;

UPDATE `marktespecial` SET `omschrijving_ru` = `omschrijving_pt`, `omschrijving_zh` = `omschrijving_pt`;
