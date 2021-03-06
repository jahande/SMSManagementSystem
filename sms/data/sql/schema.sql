CREATE TABLE choice (id BIGINT AUTO_INCREMENT, name VARCHAR(50), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE contest (id BIGINT AUTO_INCREMENT, code BIGINT, start VARCHAR(25), end VARCHAR(25), participants VARCHAR(255), responder_id BIGINT, winners_count BIGINT, answer_id BIGINT, INDEX responder_id_idx (responder_id), INDEX answer_id_idx (answer_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE contest_choice (id BIGINT AUTO_INCREMENT, name VARCHAR(50), contest_id BIGINT, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE contest_data (id BIGINT AUTO_INCREMENT, person_id BIGINT, choice_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX choice_id_idx (choice_id), INDEX person_id_idx (person_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE election (id BIGINT AUTO_INCREMENT, code BIGINT, start VARCHAR(25), end VARCHAR(25), participants VARCHAR(255), responder_id BIGINT, INDEX responder_id_idx (responder_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE election_choice (id BIGINT AUTO_INCREMENT, name VARCHAR(50), election_id BIGINT, INDEX election_id_idx (election_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE election_data (id BIGINT AUTO_INCREMENT, person_id BIGINT, choice_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX choice_id_idx (choice_id), INDEX person_id_idx (person_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE groop (id BIGINT AUTO_INCREMENT, name VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE group_person (group_id BIGINT, person_id BIGINT, PRIMARY KEY(group_id, person_id)) ENGINE = INNODB;
CREATE TABLE person (id BIGINT AUTO_INCREMENT, first_name VARCHAR(50), last_name VARCHAR(50), email VARCHAR(50), phone VARCHAR(50), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE poll (id BIGINT AUTO_INCREMENT, code BIGINT, start VARCHAR(25), end VARCHAR(25), participants VARCHAR(255), responder_id BIGINT, INDEX responder_id_idx (responder_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE poll_choice (id BIGINT AUTO_INCREMENT, name VARCHAR(50), poll_id BIGINT, INDEX poll_id_idx (poll_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE poll_data (id BIGINT AUTO_INCREMENT, person_id BIGINT, choice_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX choice_id_idx (choice_id), INDEX person_id_idx (person_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE program (id BIGINT AUTO_INCREMENT, code BIGINT, start VARCHAR(25), end VARCHAR(25), participants VARCHAR(255), responder_id BIGINT, INDEX responder_id_idx (responder_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE register (id BIGINT AUTO_INCREMENT, code BIGINT, start VARCHAR(25), end VARCHAR(25), participants VARCHAR(255), responder_id BIGINT, capacity BIGINT, INDEX responder_id_idx (responder_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE register_data (id BIGINT AUTO_INCREMENT, person_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX person_id_idx (person_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE responder (id BIGINT AUTO_INCREMENT, name VARCHAR(25), response text, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sent (id BIGINT AUTO_INCREMENT, sender VARCHAR(25), receiver VARCHAR(25), send_date VARCHAR(25), text text, status_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX status_id_idx (status_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE status (id BIGINT AUTO_INCREMENT, name VARCHAR(25), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, first_name VARCHAR(255), last_name VARCHAR(255), email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
ALTER TABLE contest ADD CONSTRAINT contest_responder_id_responder_id FOREIGN KEY (responder_id) REFERENCES responder(id);
ALTER TABLE contest ADD CONSTRAINT contest_answer_id_contest_choice_id FOREIGN KEY (answer_id) REFERENCES contest_choice(id);
ALTER TABLE contest_data ADD CONSTRAINT contest_data_person_id_person_id FOREIGN KEY (person_id) REFERENCES person(id);
ALTER TABLE contest_data ADD CONSTRAINT contest_data_choice_id_contest_choice_id FOREIGN KEY (choice_id) REFERENCES contest_choice(id);
ALTER TABLE election ADD CONSTRAINT election_responder_id_responder_id FOREIGN KEY (responder_id) REFERENCES responder(id);
ALTER TABLE election_choice ADD CONSTRAINT election_choice_election_id_election_id FOREIGN KEY (election_id) REFERENCES election(id);
ALTER TABLE election_data ADD CONSTRAINT election_data_person_id_person_id FOREIGN KEY (person_id) REFERENCES person(id);
ALTER TABLE election_data ADD CONSTRAINT election_data_choice_id_election_choice_id FOREIGN KEY (choice_id) REFERENCES election_choice(id);
ALTER TABLE group_person ADD CONSTRAINT group_person_person_id_person_id FOREIGN KEY (person_id) REFERENCES person(id);
ALTER TABLE group_person ADD CONSTRAINT group_person_group_id_groop_id FOREIGN KEY (group_id) REFERENCES groop(id);
ALTER TABLE poll ADD CONSTRAINT poll_responder_id_responder_id FOREIGN KEY (responder_id) REFERENCES responder(id);
ALTER TABLE poll_choice ADD CONSTRAINT poll_choice_poll_id_poll_id FOREIGN KEY (poll_id) REFERENCES poll(id);
ALTER TABLE poll_data ADD CONSTRAINT poll_data_person_id_person_id FOREIGN KEY (person_id) REFERENCES person(id);
ALTER TABLE poll_data ADD CONSTRAINT poll_data_choice_id_poll_choice_id FOREIGN KEY (choice_id) REFERENCES poll_choice(id);
ALTER TABLE program ADD CONSTRAINT program_responder_id_responder_id FOREIGN KEY (responder_id) REFERENCES responder(id);
ALTER TABLE register ADD CONSTRAINT register_responder_id_responder_id FOREIGN KEY (responder_id) REFERENCES responder(id);
ALTER TABLE register_data ADD CONSTRAINT register_data_person_id_person_id FOREIGN KEY (person_id) REFERENCES person(id);
ALTER TABLE sent ADD CONSTRAINT sent_status_id_status_id FOREIGN KEY (status_id) REFERENCES status(id);
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
