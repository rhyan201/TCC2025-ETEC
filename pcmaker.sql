CREATE DATABASE IF NOT EXISTS pcmaker
	CHARACTER SET utf8mb4
	COLLATE utf8mb4_unicode_ci;

USE pcmaker;

CREATE TABLE IF NOT EXISTS admin (
	id_admin INT UNSIGNED NOT NULL AUTO_INCREMENT,
	nome_admin VARCHAR(120) NOT NULL,
	email_admin VARCHAR(190) NOT NULL,
	senha VARCHAR(255) NOT NULL,
	PRIMARY KEY (id_admin),
	UNIQUE KEY uq_admin_email (email_admin)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS processador (
	cod_processador INT UNSIGNED NOT NULL AUTO_INCREMENT,
	nome_processador VARCHAR(150) NOT NULL,
	chipset_processador VARCHAR(30) NOT NULL,
	ddr_processador VARCHAR(10) NOT NULL,
	tdp_processador SMALLINT UNSIGNED NOT NULL DEFAULT 0,
	PRIMARY KEY (cod_processador)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS cpu (
	cod_cpu INT UNSIGNED NOT NULL AUTO_INCREMENT,
	nome_cpu VARCHAR(150) NOT NULL,
	chipset_cpu VARCHAR(30) NOT NULL,
	ddr_cpu VARCHAR(10) NOT NULL,
	tdp_cpu SMALLINT UNSIGNED NOT NULL DEFAULT 0,
	PRIMARY KEY (cod_cpu)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS motherboard (
	cod_motherboard INT UNSIGNED NOT NULL AUTO_INCREMENT,
	nome_mobo VARCHAR(150) NOT NULL,
	chipset_motherborad VARCHAR(30) NOT NULL,
	ddr_motherboard VARCHAR(10) NOT NULL,
	tdp_motherboard SMALLINT UNSIGNED NOT NULL DEFAULT 0,
	PRIMARY KEY (cod_motherboard)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS psu (
	cod_psu INT UNSIGNED NOT NULL AUTO_INCREMENT,
	nome_psu VARCHAR(150) NOT NULL,
	watts_psu SMALLINT UNSIGNED NOT NULL DEFAULT 0,
	ismodular VARCHAR(10) NOT NULL,
	certificado VARCHAR(30) NOT NULL,
	PRIMARY KEY (cod_psu)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS memoram (
	cod_ram INT UNSIGNED NOT NULL AUTO_INCREMENT,
	nome_ram VARCHAR(150) NOT NULL,
	tam_ram SMALLINT UNSIGNED NOT NULL DEFAULT 0,
	ddr_ram VARCHAR(10) NOT NULL,
	freq_ram SMALLINT UNSIGNED NOT NULL DEFAULT 0,
	tdp_ram SMALLINT UNSIGNED NOT NULL DEFAULT 0,
	PRIMARY KEY (cod_ram)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS gpu (
	cod_gpu INT UNSIGNED NOT NULL AUTO_INCREMENT,
	nome_gpu VARCHAR(150) NOT NULL,
	tam_mem_gpu SMALLINT UNSIGNED NOT NULL DEFAULT 0,
	tdp_gpu SMALLINT UNSIGNED NOT NULL DEFAULT 0,
	PRIMARY KEY (cod_gpu)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS memossd (
	cod_ssd INT UNSIGNED NOT NULL AUTO_INCREMENT,
	nome_ssd VARCHAR(150) NOT NULL,
	capacidade_ssd INT UNSIGNED NOT NULL DEFAULT 0,
	tdp_ssd SMALLINT UNSIGNED NOT NULL DEFAULT 0,
	PRIMARY KEY (cod_ssd)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS memohd (
	cod_hd INT UNSIGNED NOT NULL AUTO_INCREMENT,
	nome_hd VARCHAR(150) NOT NULL,
	capacidade_hd INT UNSIGNED NOT NULL DEFAULT 0,
	tam_hd DECIMAL(3,1) NOT NULL DEFAULT 0.0,
	tdp_hd SMALLINT UNSIGNED NOT NULL DEFAULT 0,
	PRIMARY KEY (cod_hd)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS air_cooler (
	id_air INT UNSIGNED NOT NULL AUTO_INCREMENT,
	nome_air VARCHAR(150) NOT NULL,
	suporte_air VARCHAR(150) NOT NULL DEFAULT '',
	tdp_cpumax_air SMALLINT UNSIGNED NOT NULL DEFAULT 0,
	PRIMARY KEY (id_air)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS water_cooler (
	id_water INT UNSIGNED NOT NULL AUTO_INCREMENT,
	nome_water VARCHAR(150) NOT NULL,
	suporte_water VARCHAR(150) NOT NULL DEFAULT '',
	tdp_cpumax_water SMALLINT UNSIGNED NOT NULL DEFAULT 0,
	PRIMARY KEY (id_water)
) ENGINE=InnoDB;

INSERT INTO processador
	(nome_processador, chipset_processador, ddr_processador, tdp_processador)
VALUES
	('Intel Core i5-12400F', 'LGA1700', 'DDR4', 65),
	('Intel Core i7-12700K', 'LGA1700', 'DDR5', 125),
	('AMD Ryzen 5 5600', 'AM4', 'DDR4', 65),
	('AMD Ryzen 7 5800X', 'AM4', 'DDR4', 105),
	('AMD Ryzen 7 7700', 'AM5', 'DDR5', 65);

INSERT INTO cpu
	(nome_cpu, chipset_cpu, ddr_cpu, tdp_cpu)
VALUES
	('Intel Core i3-12100', 'LGA1700', 'DDR4', 60),
	('Intel Core i5-13600K', 'LGA1700', 'DDR5', 125),
	('AMD Ryzen 5 7600', 'AM5', 'DDR5', 65),
	('AMD Ryzen 7 7800X3D', 'AM5', 'DDR5', 120),
	('AMD Ryzen 9 5900X', 'AM4', 'DDR4', 105);

INSERT INTO motherboard
	(nome_mobo, chipset_motherborad, ddr_motherboard, tdp_motherboard)
VALUES
	('ASUS PRIME B660M-A', 'LGA1700', 'DDR4', 35),
	('MSI PRO B760M-A', 'LGA1700', 'DDR5', 40),
	('ASUS TUF GAMING B550-PLUS', 'AM4', 'DDR4', 35),
	('MSI MAG B650 TOMAHAWK', 'AM5', 'DDR5', 45),
	('Gigabyte B550M DS3H', 'AM4', 'DDR4', 30);

INSERT INTO psu
	(nome_psu, watts_psu, ismodular, certificado)
VALUES
	('Corsair CV550', 550, 'nao', '80bronze'),
	('Corsair RM650e', 650, 'sim', '80gold'),
	('XPG Core Reactor 750W', 750, 'sim', '80gold'),
	('Cooler Master MWE 500', 500, 'nao', '80bronze'),
	('Corsair RM1000x', 1000, 'sim', '80gold');

INSERT INTO memoram
	(nome_ram, tam_ram, ddr_ram, freq_ram, tdp_ram)
VALUES
	('Kingston Fury Beast 8GB', 8, 'DDR4', 3200, 5),
	('Kingston Fury Beast 16GB', 16, 'DDR4', 3200, 5),
	('Corsair Vengeance 32GB', 32, 'DDR4', 3600, 6),
	('XPG Lancer 16GB', 16, 'DDR5', 5200, 6),
	('Kingston Fury Beast 32GB DDR5', 32, 'DDR5', 5600, 6);

INSERT INTO gpu
	(nome_gpu, tam_mem_gpu, tdp_gpu)
VALUES
	('NVIDIA GeForce GTX 1650', 4, 75),
	('AMD Radeon RX 6600', 8, 132),
	('NVIDIA GeForce RTX 3060', 12, 170),
	('AMD Radeon RX 6750 XT', 12, 250),
	('NVIDIA GeForce RTX 4070', 12, 200);

INSERT INTO memossd
	(nome_ssd, capacidade_ssd, tdp_ssd)
VALUES
	('Kingston NV2 500GB', 500, 5),
	('WD Blue SN570 1TB', 1024, 5),
	('Crucial P3 1TB', 1024, 5),
	('Samsung 980 500GB', 500, 6),
	('Kingston KC3000 2TB', 2048, 7);

INSERT INTO memohd
	(nome_hd, capacidade_hd, tam_hd, tdp_hd)
VALUES
	('Seagate Barracuda 500GB', 500, 3.5, 6),
	('WD Blue 1TB', 1000, 3.5, 6),
	('Seagate Barracuda 2TB', 2000, 3.5, 7),
	('WD Blue 1TB 2.5', 1000, 2.5, 5),
	('Toshiba P300 2TB', 2000, 3.5, 7);

INSERT INTO air_cooler
	(nome_air, suporte_air, tdp_cpumax_air)
VALUES
	('DeepCool AG400', 'AM4, AM5, LGA1200, LGA1700', 220),
	('Cooler Master Hyper 212', 'AM4, AM5, LGA1151, LGA1200, LGA1700', 180),
	('DeepCool AK400', 'AM4, AM5, LGA1200, LGA1700', 220),
	('Noctua NH-U12S', 'AM4, AM5, LGA1151, LGA1200, LGA1700', 180),
	('DeepCool AK620', 'AM4, AM5, LGA1200, LGA1700', 260);

INSERT INTO water_cooler
	(nome_water, suporte_water, tdp_cpumax_water)
VALUES
	('Cooler Master MasterLiquid 240L', 'AM4, AM5, LGA1200, LGA1700', 200),
	('DeepCool LE520', 'AM4, AM5, LGA1200, LGA1700', 220),
	('Corsair H100 RGB', 'AM4, AM5, LGA1200, LGA1700', 230),
	('DeepCool LS720', 'AM4, AM5, LGA1200, LGA1700', 280),
	('NZXT Kraken 240', 'AM4, AM5, LGA1200, LGA1700', 250);

INSERT INTO admin
    (nome_admin, email_admin, senha)
VALUES
	('Admin', 'admin@email.com', 'admin123');




