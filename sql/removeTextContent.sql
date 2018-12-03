UPDATE fp_text_contents
SET is_live = false
WHERE text_content_id = :text_content_id;
