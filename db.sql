DROP DATABASE spk_lahan_jagung; CREATE DATABASE spk_lahan_jagung; USE spk_lahan_jagung;
CREATE TABLE `admin` (
    id_admin int primary key auto_increment not null,
    username varchar(255),
    password varchar(255)
);

CREATE TABLE `alternatif` (
    id_alternatif int primary key auto_increment not null,
    nama_pemilik varchar(255), 
    alamat text,
    c1 int, -- id_crips 
    c2 int, -- id_crips 
    c3 int, -- id_crips 
    c4 int, -- id_crips 
    c5 int  -- id_crips
);

CREATE TABLE `crips` (
    id_crips int primary key auto_increment not null,
    nama varchar(255),
    id_kriteria int,
    bobot double
);

-- bridge table alternatif - crips
-- CREATE TABLE `alternatif_crips` (
--     id int primary key auto_increment not null,
--     id_alternatif int,
--     id_crips int
-- );

CREATE TABLE `kriteria` (
    id_kriteria int primary key auto_increment not null,
    nama_kriteria varchar(255),
    tipe varchar(255)
);

CREATE TABLE `perhitungan` (
    id_perhitungan int primary key auto_increment not null,
    id_alternatif int,
    id_kriteria int,
    nilai_perhitungan double
);


-- sample data
-- kriteria 
INSERT INTO `kriteria` (nama_kriteria, tipe) VALUES
    ("Jenis Tanah", "c1"),
    ("Suhu", "c2"),
    ("Ketersediaan Air", "c3"),
    ("PH Tanah", "c4"),
    ("Lapisan Olahan", "c5");

-- crips
INSERT INTO `crips` (nama, bobot, id_kriteria) VALUES
    -- C1: jenis tanah
    ("humus", 1.0, (SELECT id_kriteria FROM kriteria WHERE tipe = "c1")),
    ("laterit", 0.5, (SELECT id_kriteria FROM kriteria WHERE tipe = "c1")),
    ("padas", 0.0, (SELECT id_kriteria FROM kriteria WHERE tipe = "c1")),
    
    -- C2: suhu
    ("sejuk", 0.0, (SELECT id_kriteria FROM kriteria WHERE tipe = "c2")), -- 12 - 25 C
    ("hangat", 0.5, (SELECT id_kriteria FROM kriteria WHERE tipe = "c2")), -- 26 - 31 C
    ("panas", 1.0, (SELECT id_kriteria FROM kriteria WHERE tipe = "c2")), -- 32 > unlimited C

    -- C3: ketersediaan air
    ("sulit", 0.0, (SELECT id_kriteria FROM kriteria WHERE tipe = "c3")),
    ("sedang", 0.5, (SELECT id_kriteria FROM kriteria WHERE tipe = "c3")),
    ("mudah", 1.0, (SELECT id_kriteria FROM kriteria WHERE tipe = "c3")),

    -- C4: PH tanah
    ("asam", 0.0, (SELECT id_kriteria FROM kriteria WHERE tipe = "c4")),
    ("sedang", 0.5, (SELECT id_kriteria FROM kriteria WHERE tipe = "c4")),
    ("basah", 1.0, (SELECT id_kriteria FROM kriteria WHERE tipe = "c4")),

    -- C5: lapisan olahan
    ("dangkal", 0.0, (SELECT id_kriteria FROM kriteria WHERE tipe = "c5")),
    ("sedang", 0.5, (SELECT id_kriteria FROM kriteria WHERE tipe = "c5")),
    ("dalam", 1.0, (SELECT id_kriteria FROM kriteria WHERE tipe = "c5"));

INSERT INTO `alternatif` (
    nama_pemilik, alamat, c1, c2, c3, c4, c5
) VALUES (
    "prio", 
    "desa jetak", 
    (SELECT crips.id_crips FROM crips, kriteria WHERE crips.nama = "laterit" AND kriteria.tipe = "c1" AND crips.id_kriteria = kriteria.id_kriteria),
    (SELECT crips.id_crips FROM crips, kriteria WHERE crips.nama = "hangat" AND kriteria.tipe = "c2" AND crips.id_kriteria = kriteria.id_kriteria),
    (SELECT crips.id_crips FROM crips, kriteria WHERE crips.nama = "sulit" AND kriteria.tipe = "c3" AND crips.id_kriteria = kriteria.id_kriteria),
    (SELECT crips.id_crips FROM crips, kriteria WHERE crips.nama = "asam" AND kriteria.tipe = "c4" AND crips.id_kriteria = kriteria.id_kriteria),
    (SELECT crips.id_crips FROM crips, kriteria WHERE crips.nama = "dalam" AND kriteria.tipe = "c5" AND crips.id_kriteria = kriteria.id_kriteria)
);
