DROP TABLE fp_text_locations;

DROP TABLE fp_text_contents;

CREATE TABLE fp_text_contents (
  text_content_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  text_location VARCHAR(8),
  text_content VARCHAR(2500),
  is_live BOOL
);

INSERT INTO fp_text_contents (text_location, text_content, is_live)
VALUES ('1', 'Youth Night', true);

INSERT INTO fp_text_contents (text_location, text_content, is_live)
VALUES ('2', 'Every Sunday: &nbsp; 6pm - 8pm', true);

INSERT INTO fp_text_contents (text_location, text_content, is_live)
VALUES ('3', 'We pray for courage in our young people to grow in a personal relationship with Jesus that glorifies God. We want to Touch Lives with God’s Love; Transform Lives with God’s Word; and Do It All for God’s Glory. Our Project935 youth ministry follows Jesus’ teaching to his disciples as in Mark 9:35 - “Anyone who wants to be first must be the very last, and the servant of all.” Our young people enjoy this growing relationship with Jesus through fun activities, spirited worship, relevant study, service, and community.', true);

INSERT INTO fp_text_contents (text_location, text_content, is_live)
VALUES ('4', 'Grill and Chill', true);

INSERT INTO fp_text_contents (text_location, text_content, is_live)
VALUES ('5', 'Friday Night Post Football Game', true);

INSERT INTO fp_text_contents (text_location, text_content, is_live)
VALUES ('6', 'We Grill and you Chill.', true);

INSERT INTO fp_text_contents (text_location, text_content, is_live)
VALUES ('6', 'Pop Up Party', true);

INSERT INTO fp_text_contents (text_location, text_content, is_live)
VALUES ('7', 'Wednesday, Sept 20:   4pm - 6:30pm', true);

INSERT INTO fp_text_contents (text_location, text_content, is_live)
VALUES ('8', '(Pop Up Party details)', true);

INSERT INTO fp_text_contents (text_location, text_content, is_live)
VALUES ('9', 'Fall Fest', true);

INSERT INTO fp_text_contents (text_location, text_content, is_live)
VALUES ('10', 'October 27th 1-5 PM', true);

INSERT INTO fp_text_contents (text_location, text_content, is_live)
VALUES ('11', '(Fall Fest details)', true);

INSERT INTO fp_text_contents (text_location, text_content, is_live)
VALUES ('12', 'Xtreme Winter Gatlinburg', true);

INSERT INTO fp_text_contents (text_location, text_content, is_live)
VALUES ('13', '12/27-12/29', true);

INSERT INTO fp_text_contents (text_location, text_content, is_live)
VALUES ('14', 'Xtreme Winter Gatlinburg details', true);

INSERT INTO fp_text_contents (text_location, text_content, is_live)
VALUES ('15', 'Second paragraph description text from DB', true);



CREATE TABLE fp_text_locations (
  text_location_id INT NOT NULL AUTO_INCREMENT,
  text_content_id INT NOT NULL,
  text_x_coord INT,
  text_Y_coord INT,
  PRIMARY KEY (text_location_id),
  FOREIGN KEY (text_content_id) REFERENCES fp_text_contents(text_content_id)
);


INSERT INTO fp_text_locations (text_content_id, text_x_coord, text_y_coord)
VALUES(1, 2, 2);

INSERT INTO fp_text_locations (text_content_id, text_x_coord, text_y_coord)
VALUES(2, 1, 1);

INSERT INTO fp_text_locations (text_content_id, text_x_coord, text_y_coord)
VALUES(3, 2, 2);

INSERT INTO fp_text_locations (text_content_id, text_x_coord, text_y_coord)
VALUES(4, 3, 3);

INSERT INTO fp_text_locations (text_content_id, text_x_coord, text_y_coord)
VALUES(5, 3, 4);

SELECT * FROM fp_text_locations

INNER JOIN fp_text_contents
	ON fp_text_contents.text_content_id=fp_text_locations.text_content_id
	ORDER BY fp_text_locations.text_x_coord, fp_text_locations.text_y_coord;

CREATE TABLE fp_user_contents (
	text_content_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	user_id INT,
	text_location VARCHAR(8),
	text_content VARCHAR(2500)
);
