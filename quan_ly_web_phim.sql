CREATE DATABASE IF NOT EXISTS quan_ly_web_phim;
USE quan_ly_web_phim;

-- 1. Bảng vai trò
CREATE TABLE IF NOT EXISTS vai_tro
(
    id          INT PRIMARY KEY,
    ten_vai_tro VARCHAR(50) NOT NULL
);

-- 2. Bảng người dùng
CREATE TABLE IF NOT EXISTS nguoi_dung
(
    id            INT PRIMARY KEY,
    ten_dang_nhap VARCHAR(50) NOT NULL,
    mat_khau      VARCHAR(50) NOT NULL,
    ho_ten        VARCHAR(50),
    email         VARCHAR(50),
    sdt           VARCHAR(10),
    ngay_sinh     DATETIME,
    vai_tro_id    INT,
    FOREIGN KEY (vai_tro_id) REFERENCES vai_tro (id)
);

-- 3. Bảng quốc gia
CREATE TABLE IF NOT EXISTS quoc_gia
(
    id           INT PRIMARY KEY,
    ten_quoc_gia VARCHAR(30)
);

-- 4. Bảng thể loại
CREATE TABLE IF NOT EXISTS the_loai
(
    id           INT PRIMARY KEY,
    ten_the_loai VARCHAR(50) NOT NULL
);

-- 5. Bảng phim
CREATE TABLE IF NOT EXISTS phim
(
    id            INT PRIMARY KEY,
    ten_phim      VARCHAR(100) NOT NULL,
    dao_dien_id   INT,
    nam_phat_hanh INT,
    poster        VARCHAR(255),
    quoc_gia_id   INT,
    so_tap        INT,
    trailer       VARCHAR(255),
    mo_ta         TEXT,
    FOREIGN KEY (dao_dien_id) REFERENCES nguoi_dung (id),
    FOREIGN KEY (quoc_gia_id) REFERENCES quoc_gia (id)
);

-- 6. Bảng phim - diễn viên
CREATE TABLE IF NOT EXISTS phim_dien_vien
(
    id           INT PRIMARY KEY,
    phim_id      INT,
    dien_vien_id INT,
    FOREIGN KEY (phim_id) REFERENCES phim (id),
    FOREIGN KEY (dien_vien_id) REFERENCES nguoi_dung (id)
);


CREATE TABLE IF NOT EXISTS phim_the_loai
(
    id          INT PRIMARY KEY,
    phim_id     INT,
    the_loai_id INT,
    FOREIGN KEY (phim_id) REFERENCES phim (id),
    FOREIGN KEY (the_loai_id) REFERENCES the_loai (id)
);


CREATE TABLE IF NOT EXISTS tap_phim
(
    id         INT PRIMARY KEY,
    phim_id    INT,
    so_tap     INT,
    tieu_de    VARCHAR(100),
    thoi_luong INT,
    trailer    VARCHAR(255),
    FOREIGN KEY (phim_id) REFERENCES phim (id)
);

INSERT IGNORE INTO vai_tro (id, ten_vai_tro)
VALUES (1, 'admin'),
       (2, 'dao_dien'),
       (3, 'dien_vien'),
       (4, 'user');

INSERT IGNORE INTO quoc_gia (id, ten_quoc_gia)
VALUES (1, 'Việt Nam'),
       (2, 'Mỹ'),
       (3, 'Anh'),
       (4, 'Hàn Quốc'),
       (5, 'Nhật Bản'),
       (6, 'Pháp'),
       (7, 'Canada'),
       (8, 'Trung Quốc'),
       (9, 'Thái Lan'),
       (10, 'Úc'),
       (11, 'Đức'),
       (12, 'Tây Ban Nha'),
       (13, 'Ý'),
       (14, 'Nga'),
       (15, 'Ấn Độ'),
       (16, 'Philippines'),
       (17, 'Malaysia'),
       (18, 'Singapore'),
       (19, 'Indonesia'),
       (20, 'Brazil'),
       (21, 'Mexico'),
       (22, 'Ả Rập Xê Út'),
       (23, 'UAE'),
       (24, 'Thổ Nhĩ Kỳ'),
       (25, 'Thuỵ Điển'),
       (26, 'Na Uy'),
       (27, 'Hà Lan'),
       (28, 'Bỉ'),
       (29, 'Đan Mạch'),
       (30, 'Bồ Đào Nha');

INSERT IGNORE INTO the_loai (id, ten_the_loai)
VALUES (1, 'Hành động'),
       (2, 'Tình cảm'),
       (3, 'Hài hước'),
       (4, 'Kinh dị'),
       (5, 'Anime'),
       (6, 'Phiêu lưu'),
       (7, 'Khoa học viễn tưởng'),
       (8, 'Chiến tranh'),
       (9, 'Hình sự'),
       (10, 'Tâm lý'),
       (11, 'Cổ trang'),
       (12, 'Âm nhạc'),
       (13, 'Gia đình'),
       (14, 'Giật gân'),
       (15, 'Bí ẩn'),
       (16, 'Lịch sử'),
       (17, 'Thể thao'),
       (18, 'Tài liệu'),
       (19, 'Siêu anh hùng'),
       (20, 'Học đường'),
       (21, 'Thần thoại'),
       (22, 'Viễn tây'),
       (23, 'Lãng mạn'),
       (24, 'Zombie'),
       (25, 'Thám tử'),
       (26, 'Hành tinh'),
       (27, 'Phép thuật'),
       (28, 'Hacker'),
       (29, 'Cyberpunk'),
       (30, 'Trinh thám');


INSERT IGNORE INTO nguoi_dung (id, ten_dang_nhap, mat_khau, ho_ten, email, sdt, ngay_sinh, vai_tro_id)
VALUES
    -- Đạo diễn
    (1, 'nolan', 'pass123', 'Christopher Nolan', 'nolan@gmail.com', '0123456789', '1970-07-30', 2),
    (2, 'coppola', 'pass123', 'Francis Ford Coppola', 'coppola@gmail.com', '0123456790', '1939-04-07', 2),
    (3, 'bong_joonho', 'pass123', 'Bong Joon-ho', 'bongjh@gmail.com', '0123456791', '1969-09-14', 2),
    (4, 'miyazaki', 'pass123', 'Hayao Miyazaki', 'miyazaki@gmail.com', '0123456792', '1941-01-05', 2),
    (5, 'fincher', 'pass123', 'David Fincher', 'fincher@gmail.com', '0123456793', '1962-08-28', 2),
    (6, 'cameron', 'pass123', 'James Cameron', 'cameron@gmail.com', '0123456794', '1954-08-16', 2),
    (7, 'joe_russo', 'pass123', 'Joe Russo', 'joe_russo@gmail.com', '0123456795', '1971-07-18', 2),
    (8, 'gilligan', 'pass123', 'Vince Gilligan', 'gilligan@gmail.com', '0123456796', '1967-02-10', 2),
    (9, 'benioff', 'pass123', 'David Benioff', 'benioff@gmail.com', '0123456797', '1970-09-25', 2),
    (10, 'darabont', 'pass123', 'Frank Darabont', 'darabont@gmail.com', '0123456798', '1959-01-28', 2),
    -- Diễn viên
    (11, 'leo', 'pass123', 'Leonardo DiCaprio', 'leo@gmail.com', '0987654321', '1974-11-11', 3),
    (12, 'bale', 'pass123', 'Christian Bale', 'bale@gmail.com', '0987654322', '1974-01-30', 3),
    (13, 'pacino', 'pass123', 'Al Pacino', 'pacino@gmail.com', '0987654323', '1940-04-25', 3),
    (14, 'pitt', 'pass123', 'Brad Pitt', 'pitt@gmail.com', '0987654324', '1963-12-18', 3),
    (15, 'norton', 'pass123', 'Edward Norton', 'norton@gmail.com', '0987654325', '1969-08-18', 3),
    (16, 'cranston', 'pass123', 'Bryan Cranston', 'cranston@gmail.com', '0987654326', '1956-03-07', 3),
    (17, 'emilia', 'pass123', 'Emilia Clarke', 'emilia@gmail.com', '0987654327', '1986-10-23', 3),
    (18, 'freeman', 'pass123', 'Morgan Freeman', 'freeman@gmail.com', '0987654328', '1937-06-01', 3),
    (19, 'robbins', 'pass123', 'Tim Robbins', 'robbins@gmail.com', '0987654329', '1958-10-16', 3),
    -- Admin
    (20, 'harywill05', 'pass123', 'Dao The Huy', 'huydaothe835@gmail.com', '0123001230', '2005-05-29', 1),
    -- USER THƯỜNG
    (21, 'user01', '123456', 'Nguyễn Tiến Khởi', 'khoinguyen@gmail.com', '0921111222', '1998-09-03', 4),
    (22, 'user02', '123456', 'Dỗ Trung Kiên', 'kientrung@gmail.com', '0922222333', '2001-06-14', 4),
    (23, 'user03', '123456', 'Đào Quang Lộc', 'locdao@gmail.com', '0923333444', '2002-02-28', 4);


-- -- Bảng phim ----
INSERT IGNORE INTO phim (id, ten_phim, dao_dien_id, nam_phat_hanh, poster, quoc_gia_id, so_tap, trailer, mo_ta)
VALUES (1, 'Inception', 1, 2010, 'inception.jpg', 2, 1, 'inception_trailer.mp4',
        'Một giấc mơ trong mơ, kẻ ăn trộm ước mơ.'),
       (2, 'The Dark Knight', 1, 2008, 'dark_knight.jpg', 2, 1, 'dark_knight_trailer.mp4',
        'Batman đấu với Joker trong cuộc chiến giành công lý.'),
       (3, 'Titanic', 6, 1997, 'titanic.jpg', 2, 1, 'titanic_trailer.mp4',
        'Câu chuyện tình yêu lãng mạn trên con tàu định mệnh.'),
       (4, 'The Godfather', 2, 1972, 'godfather.jpg', 2, 1, 'godfather_trailer.mp4',
        'Gia đình mafia nắm quyền lực và mưu mô.'),
       (5, 'Fight Club', 5, 1999, 'fight_club.jpg', 2, 1, 'fight_club_trailer.mp4',
        'Một hội bí mật, những trận chiến nội tâm.'),
       (6, 'Parasite', 3, 2019, 'parasite.jpg', 4, 1, 'parasite_trailer.mp4',
        'Sự chênh lệch giai cấp dẫn đến những hệ quả khôn lường.'),
       (7, 'Spirited Away', 4, 2001, 'spirited_away.jpg', 5, 1, 'spirited_away_trailer.mp4',
        'Cô bé lạc vào thế giới linh hồn và ma quỷ.'),
       (8, 'Breaking Bad', 8, 2008, 'breaking_bad.jpg', 2, 62, 'breaking_bad_trailer.mp4',
        'Một giáo viên hóa chất trở thành trùm ma túy.'),
       (9, 'Game of Thrones', 9, 2011, 'game_of_thrones.jpg', 3, 73, 'got_trailer.mp4',
        'Cuộc chiến quyền lực giữa các gia tộc ở Westeros.'),
       (10, 'The Shawshank Redemption', 10, 1994, 'shawshank.jpg', 2, 1, 'shawshank_trailer.mp4',
        'Hy vọng và tự do ở nhà tù Shawshank.');

-- ---- Bảng phim_dien_vien ----
INSERT IGNORE INTO phim_dien_vien (id, phim_id, dien_vien_id)
VALUES
    -- Inception
    (1, 1, 11),
    -- The Dark Knight
    (2, 2, 12),
    (3, 2, 18),
    -- Titanic
    (4, 3, 11),
    -- The Godfather
    (5, 4, 13),
    -- Fight Club
    (6, 5, 14),
    (7, 5, 15),
    -- Parasite
    (8, 6, 11),
    -- Spirited Away
    (9, 7, 18),
    -- Breaking Bad
    (10, 8, 16),
    -- Game of Thrones
    (11, 9, 17),
    -- Shawshank
    (12, 10, 19);

-- ---- Bảng phim_the_loai ----
INSERT IGNORE INTO phim_the_loai (id, phim_id, the_loai_id)
VALUES (1, 1, 7),  -- Inception: khoa học viễn tưởng
       (2, 2, 1),  -- The Dark Knight: hành động
       (3, 2, 19), -- The Dark Knight: siêu anh hùng
       (4, 3, 23), -- Titanic: lãng mạn
       (5, 4, 9),  -- The Godfather: hình sự
       (6, 5, 10), -- Fight Club: tâm lý
       (7, 6, 15), -- Parasite: bí ẩn
       (8, 7, 5),  -- Spirited Away: anime
       (9, 8, 9),  -- Breaking Bad: hình sự
       (10, 9, 6), -- Game of Thrones: phiêu lưu
       (11, 10, 10);
-- The Shawshank Redemption: tâm lý

-- ---- Bảng tap_phim ----
INSERT IGNORE INTO tap_phim (id, phim_id, so_tap, tieu_de, thoi_luong, trailer)
VALUES
    -- Phim điện ảnh
    (1, 1, 1, 'Inception – Tập duy nhất', 148, 'inception_trailer.mp4'),
    (2, 2, 1, 'The Dark Knight – Tập duy nhất', 152, 'dark_knight_trailer.mp4'),
    (3, 3, 1, 'Titanic – Tập duy nhất', 195, 'titanic_trailer.mp4'),
    (4, 4, 1, 'The Godfather – Tập duy nhất', 175, 'godfather_trailer.mp4'),
    (5, 5, 1, 'Fight Club – Tập duy nhất', 139, 'fight_club_trailer.mp4'),
    (6, 6, 1, 'Parasite – Tập duy nhất', 132, 'parasite_trailer.mp4'),
    (7, 7, 1, 'Spirited Away – Tập duy nhất', 125, 'spirited_away_trailer.mp4'),
    -- Series Breaking Bad
    (8, 8, 1, 'Tập 1: Suy thoái', 58, 'bb_s1e1.mp4'),
    (9, 8, 2, 'Tập 2: Đường dẫn lùi', 47, 'bb_s1e2.mp4'),
    (10, 8, 3, 'Tập 3: Tái sinh', 47, 'bb_s1e3.mp4'),
    (11, 8, 4, 'Tập 4: Vượt giới hạn', 48, 'bb_s1e4.mp4'),
    (12, 8, 5, 'Tập 5: Bi kịch', 53, 'bb_s1e5.mp4'),
    -- Series Game of Throne
    (13, 9, 1, 'Tập 1: Đông đến', 62, 'got_s1e1.mp4'),
    (14, 9, 2, 'Tập 2: Gia tộc', 56, 'got_s1e2.mp4'),
    (15, 9, 3, 'Tập 3: Đường hận', 58, 'got_s1e3.mp4'),
    (16, 9, 4, 'Tập 4: Quyền lực', 60, 'got_s1e4.mp4'),
    (17, 9, 5, 'Tập 5: Hậu cung', 55, 'got_s1e5.mp4'),
    -- Shawshank (phim)
    (18, 10, 1, 'The Shawshank Redemption – Tập duy nhất', 142, 'shawshank_trailer.mp4');


