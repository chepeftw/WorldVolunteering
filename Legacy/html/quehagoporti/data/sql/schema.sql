CREATE TABLE activity (id BIGINT AUTO_INCREMENT, title VARCHAR(255) NOT NULL, date DATE NOT NULL, description text NOT NULL, place text NOT NULL, picture VARCHAR(255) NOT NULL, association_id BIGINT NOT NULL, is_active TINYINT(1) DEFAULT '1', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX association_id_idx (association_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE activity_survey (id BIGINT AUTO_INCREMENT, volunteer_survey_id BIGINT NOT NULL, association_survey_id BIGINT NOT NULL, field1 BIGINT DEFAULT 0 NOT NULL, field2 BIGINT DEFAULT 0 NOT NULL, field3 BIGINT DEFAULT 0 NOT NULL, field4 BIGINT DEFAULT 0 NOT NULL, field5 BIGINT DEFAULT 0 NOT NULL, field6 BIGINT DEFAULT 0 NOT NULL, field7 BIGINT DEFAULT 0 NOT NULL, field8 BIGINT DEFAULT 0 NOT NULL, field9 BIGINT DEFAULT 0 NOT NULL, field10 BIGINT DEFAULT 0 NOT NULL, field11 BIGINT DEFAULT 0 NOT NULL, field12 BIGINT DEFAULT 0 NOT NULL, field13 BIGINT DEFAULT 0 NOT NULL, field14 BIGINT DEFAULT 0 NOT NULL, field15 BIGINT DEFAULT 0 NOT NULL, field16 BIGINT DEFAULT 0 NOT NULL, field17 text NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX association_survey_id_idx (association_survey_id), INDEX volunteer_survey_id_idx (volunteer_survey_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE association (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL UNIQUE, address text NOT NULL, country_id BIGINT NOT NULL, department_id BIGINT NOT NULL, town VARCHAR(255) NOT NULL, departments text NOT NULL, mision text NOT NULL, vision text NOT NULL, about_us text NOT NULL, what_we_do text, legal_person TINYINT(1) NOT NULL, legal_person_type VARCHAR(255), legal_person_type_other VARCHAR(255), partner1_name VARCHAR(255) NOT NULL, partner1_email VARCHAR(255) NOT NULL, partner1_mobile BIGINT NOT NULL, partner2_name VARCHAR(255), partner2_email VARCHAR(255), partner2_mobile BIGINT, sat_registry TINYINT(1) NOT NULL, email VARCHAR(255) NOT NULL UNIQUE, phone1 BIGINT NOT NULL, phone2 BIGINT, website VARCHAR(255), facebook_page text, twitter_user text, logo VARCHAR(255) NOT NULL, founded DATE NOT NULL, history text, quantity_perm_men BIGINT NOT NULL, quantity_perm_women BIGINT NOT NULL, quantity_temp_men BIGINT NOT NULL, quantity_temp_women BIGINT NOT NULL, requirements text NOT NULL, commitment_type VARCHAR(255) NOT NULL, commitment_type_other VARCHAR(255), commitment text NOT NULL, mechanism_commitment text NOT NULL, compensation VARCHAR(255) NOT NULL, compensation_type VARCHAR(255), compensation_type_other VARCHAR(255), training VARCHAR(255) NOT NULL, training_type VARCHAR(255), training_type_other VARCHAR(255), donations TINYINT(1) DEFAULT '0', method text, utilization text, ip_address VARCHAR(255) NOT NULL, user_id BIGINT, random_value DOUBLE(18, 2) DEFAULT 0, approved TINYINT(1) DEFAULT '0', is_active TINYINT(1) DEFAULT '1', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX country_id_idx (country_id), INDEX department_id_idx (department_id), INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE association_category (association_id BIGINT, category_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(association_id, category_id)) ENGINE = INNODB;
CREATE TABLE association_department (association_id BIGINT, department_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(association_id, department_id)) ENGINE = INNODB;
CREATE TABLE association_survey (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL UNIQUE, address text NOT NULL, country_id BIGINT NOT NULL, department_id BIGINT NOT NULL, town VARCHAR(255) NOT NULL, departments text NOT NULL, mision text NOT NULL, vision text NOT NULL, about_us text NOT NULL, what_we_do text, legal_person TINYINT(1) NOT NULL, legal_person_type VARCHAR(255), legal_person_type_other VARCHAR(255), partner1_name VARCHAR(255) NOT NULL, partner1_email VARCHAR(255) NOT NULL, partner1_mobile BIGINT NOT NULL, partner2_name VARCHAR(255), partner2_email VARCHAR(255), partner2_mobile BIGINT, sat_registry TINYINT(1) NOT NULL, email VARCHAR(255) NOT NULL UNIQUE, phone1 BIGINT NOT NULL, phone2 BIGINT, website VARCHAR(255) UNIQUE, facebook_page text, twitter_user text, logo VARCHAR(255) NOT NULL, founded DATE NOT NULL, history text, quantity_perm_men BIGINT NOT NULL, quantity_perm_women BIGINT NOT NULL, quantity_temp_men BIGINT NOT NULL, quantity_temp_women BIGINT NOT NULL, requirements text NOT NULL, commitment_type VARCHAR(255) NOT NULL, commitment_type_other VARCHAR(255), commitment text NOT NULL, mechanism_commitment text NOT NULL, compensation VARCHAR(255) NOT NULL, compensation_type VARCHAR(255), compensation_type_other VARCHAR(255), training VARCHAR(255) NOT NULL, training_type VARCHAR(255), training_type_other VARCHAR(255), donations TINYINT(1) DEFAULT '0', method text, utilization text, ip_address VARCHAR(255) NOT NULL, random_value DOUBLE(18, 2) DEFAULT 0, approved TINYINT(1) DEFAULT '1', is_active TINYINT(1) DEFAULT '1', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME, INDEX country_id_idx (country_id), INDEX department_id_idx (department_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE association_survey_category (association_survey_id BIGINT, category_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(association_survey_id, category_id)) ENGINE = INNODB;
CREATE TABLE association_survey_department (association_survey_id BIGINT, department_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(association_survey_id, department_id)) ENGINE = INNODB;
CREATE TABLE category (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, root_id BIGINT, lft INT, rgt INT, level SMALLINT, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE country (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE department (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, country_id BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX country_id_idx (country_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE interesting_link (id BIGINT AUTO_INCREMENT, url VARCHAR(255) NOT NULL, association_id BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX association_id_idx (association_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE library (id BIGINT AUTO_INCREMENT, title VARCHAR(255) NOT NULL, description text NOT NULL, picture VARCHAR(255), media VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, is_active TINYINT(1) DEFAULT '1', rating BIGINT DEFAULT 0, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE library_comment (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, comment text, library_id BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX library_id_idx (library_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE library_rating (id BIGINT AUTO_INCREMENT, ip VARCHAR(255) NOT NULL, library_id BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX library_id_idx (library_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE news (id BIGINT AUTO_INCREMENT, title VARCHAR(255) NOT NULL, description text NOT NULL, picture VARCHAR(255) NOT NULL, is_active TINYINT(1) DEFAULT '1', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE partner (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mobile BIGINT NOT NULL, association_id BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX association_id_idx (association_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE photo (id BIGINT AUTO_INCREMENT, location VARCHAR(255) NOT NULL, order_number BIGINT DEFAULT 0, association_id BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX association_id_idx (association_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE state (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE tag (id BIGINT AUTO_INCREMENT, name VARCHAR(100), is_triple TINYINT(1), triple_namespace VARCHAR(100), triple_key VARCHAR(100), triple_value VARCHAR(100), INDEX name_idx (name), INDEX triple1_idx (triple_namespace), INDEX triple2_idx (triple_key), INDEX triple3_idx (triple_value), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE tagging (id BIGINT AUTO_INCREMENT, tag_id BIGINT NOT NULL, taggable_model VARCHAR(30), taggable_id BIGINT, INDEX tag_idx (tag_id), INDEX taggable_idx (taggable_model, taggable_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE tell_us (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, mobile VARCHAR(255), comment text NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE testimonial (id BIGINT AUTO_INCREMENT, title VARCHAR(255) NOT NULL, description text NOT NULL, picture VARCHAR(255) NOT NULL, association_id BIGINT NOT NULL, is_active TINYINT(1) DEFAULT '1', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX association_id_idx (association_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE town (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, department_id BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX department_id_idx (department_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE video (id BIGINT AUTO_INCREMENT, url VARCHAR(255) NOT NULL, association_id BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX association_id_idx (association_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE volunteer_survey (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL UNIQUE, age BIGINT NOT NULL, sex VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, status_other VARCHAR(255), kids BIGINT NOT NULL, ethnic VARCHAR(255) NOT NULL, ethnic_other VARCHAR(255), schooling VARCHAR(255) NOT NULL, schooling_discipline VARCHAR(255), occupation VARCHAR(255) NOT NULL, nationality VARCHAR(255) NOT NULL, nationality_other VARCHAR(255), religion VARCHAR(255) NOT NULL, religion_other VARCHAR(255), voluteering_time VARCHAR(255) NOT NULL, ip_address VARCHAR(255) NOT NULL, is_active TINYINT(1) DEFAULT '1', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE volunteer_survey_activity (volunteer_survey_id BIGINT, activity_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(volunteer_survey_id, activity_id)) ENGINE = INNODB;
CREATE TABLE volunteer_survey_association_survey (volunteer_survey_id BIGINT, association_survey_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(volunteer_survey_id, association_survey_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, first_name VARCHAR(255), last_name VARCHAR(255), email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128), algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
ALTER TABLE activity ADD CONSTRAINT activity_association_id_association_id FOREIGN KEY (association_id) REFERENCES association(id);
ALTER TABLE activity_survey ADD CONSTRAINT activity_survey_volunteer_survey_id_volunteer_survey_id FOREIGN KEY (volunteer_survey_id) REFERENCES volunteer_survey(id);
ALTER TABLE activity_survey ADD CONSTRAINT activity_survey_association_survey_id_association_survey_id FOREIGN KEY (association_survey_id) REFERENCES association_survey(id);
ALTER TABLE association ADD CONSTRAINT association_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);
ALTER TABLE association ADD CONSTRAINT association_department_id_department_id FOREIGN KEY (department_id) REFERENCES department(id);
ALTER TABLE association ADD CONSTRAINT association_country_id_country_id FOREIGN KEY (country_id) REFERENCES country(id);
ALTER TABLE association_category ADD CONSTRAINT association_category_category_id_category_id FOREIGN KEY (category_id) REFERENCES category(id) ON DELETE CASCADE;
ALTER TABLE association_category ADD CONSTRAINT association_category_association_id_association_id FOREIGN KEY (association_id) REFERENCES association(id) ON DELETE CASCADE;
ALTER TABLE association_department ADD CONSTRAINT association_department_department_id_department_id FOREIGN KEY (department_id) REFERENCES department(id) ON DELETE CASCADE;
ALTER TABLE association_department ADD CONSTRAINT association_department_association_id_association_id FOREIGN KEY (association_id) REFERENCES association(id) ON DELETE CASCADE;
ALTER TABLE association_survey ADD CONSTRAINT association_survey_department_id_department_id FOREIGN KEY (department_id) REFERENCES department(id);
ALTER TABLE association_survey ADD CONSTRAINT association_survey_country_id_country_id FOREIGN KEY (country_id) REFERENCES country(id);
ALTER TABLE association_survey_category ADD CONSTRAINT association_survey_category_category_id_category_id FOREIGN KEY (category_id) REFERENCES category(id) ON DELETE CASCADE;
ALTER TABLE association_survey_category ADD CONSTRAINT aaai FOREIGN KEY (association_survey_id) REFERENCES association_survey(id) ON DELETE CASCADE;
ALTER TABLE association_survey_department ADD CONSTRAINT association_survey_department_department_id_department_id FOREIGN KEY (department_id) REFERENCES department(id) ON DELETE CASCADE;
ALTER TABLE association_survey_department ADD CONSTRAINT aaai_1 FOREIGN KEY (association_survey_id) REFERENCES association_survey(id) ON DELETE CASCADE;
ALTER TABLE department ADD CONSTRAINT department_country_id_country_id FOREIGN KEY (country_id) REFERENCES country(id);
ALTER TABLE interesting_link ADD CONSTRAINT interesting_link_association_id_association_id FOREIGN KEY (association_id) REFERENCES association(id);
ALTER TABLE library_comment ADD CONSTRAINT library_comment_library_id_library_id FOREIGN KEY (library_id) REFERENCES library(id);
ALTER TABLE library_rating ADD CONSTRAINT library_rating_library_id_library_id FOREIGN KEY (library_id) REFERENCES library(id);
ALTER TABLE partner ADD CONSTRAINT partner_association_id_association_id FOREIGN KEY (association_id) REFERENCES association(id);
ALTER TABLE photo ADD CONSTRAINT photo_association_id_association_id FOREIGN KEY (association_id) REFERENCES association(id);
ALTER TABLE testimonial ADD CONSTRAINT testimonial_association_id_association_id FOREIGN KEY (association_id) REFERENCES association(id);
ALTER TABLE town ADD CONSTRAINT town_department_id_department_id FOREIGN KEY (department_id) REFERENCES department(id);
ALTER TABLE video ADD CONSTRAINT video_association_id_association_id FOREIGN KEY (association_id) REFERENCES association(id);
ALTER TABLE volunteer_survey_activity ADD CONSTRAINT vvvi FOREIGN KEY (volunteer_survey_id) REFERENCES volunteer_survey(id) ON DELETE CASCADE;
ALTER TABLE volunteer_survey_activity ADD CONSTRAINT volunteer_survey_activity_activity_id_activity_id FOREIGN KEY (activity_id) REFERENCES activity(id) ON DELETE CASCADE;
ALTER TABLE volunteer_survey_association_survey ADD CONSTRAINT vvvi_1 FOREIGN KEY (volunteer_survey_id) REFERENCES volunteer_survey(id) ON DELETE CASCADE;
ALTER TABLE volunteer_survey_association_survey ADD CONSTRAINT vaai FOREIGN KEY (association_survey_id) REFERENCES association_survey(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;