ALTER TABLE votes ADD COLUMN slug VARCHAR(100) DEFAULT NULL;
ALTER TABLE pollings ADD COLUMN slug VARCHAR(100) DEFAULT NULL;
ALTER TABLE vote_counters ADD COLUMN user_info VARCHAR(100) DEFAULT NULL;
ALTER TABLE polling_counters ADD COLUMN user_info VARCHAR(100) DEFAULT NULL;