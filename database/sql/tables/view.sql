-- CREATE OR REPLACE
-- VIEW post_comments AS
-- SELECT ps.id, ps.userId, ps.title, ps.body,
--        pc.postId, pc.id, pc.name, pc.email, pc.body
-- FROM posts ps
--          JOIN comments pc ON ps.id = pc.postId
-- WHERE 1;
--
CREATE OR REPLACE VIEW post_comments AS
SELECT ps.id AS post_id,
       ps.userId,
       ps.title,
       ps.body,
       pc.postId,
       pc.id AS comment_id,
       pc.name,
       pc.email,
       pc.body AS comment_body
FROM posts ps
         JOIN comments pc ON ps.id = pc.postId;