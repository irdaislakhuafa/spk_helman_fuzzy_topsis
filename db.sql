CREATE TABLE `admin` (
    id_admin int primary key auto_increment not null,
    username varchar(255),
    password varchar(255)
);

CREATE TABLE `alternatif` (
    id_alternatif int primary key auto_increment not null,
    nama_pemilik varchar(255), 
    alamat text, 
    c1 double, 
    c2 double, 
    c3 double, 
    c4 double, 
    c5 double 
);

CREATE TABLE `crips` (
    id_crips int primary key auto_increment not null,
    nama varchar(255),
    bobot double,
);

CREATE TABLE `kriteria` (
    id_kriteria int primary key auto_increment not null,
    nama_kriteria varchar(255),
    nama_kriteria varchar(255),
    id_crips int,
);

CREATE TABLE `perhitungan` (
    id_perhitungan int primary key auto_increment not null,
    id_alternatif int,
    id_kriteria int,
    nilai_perhitungan double
);

-- sample data