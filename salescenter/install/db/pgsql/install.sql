
CREATE TABLE b_salescenter_page (
  ID int8 GENERATED BY DEFAULT AS IDENTITY NOT NULL,
  NAME varchar(255),
  URL varchar(255),
  LANDING_ID int,
  HIDDEN char(1) NOT NULL DEFAULT 'N',
  IS_WEBFORM char(1) NOT NULL DEFAULT 'N',
  IS_FRAME_DENIED char(1) NOT NULL DEFAULT 'N',
  SORT int NOT NULL DEFAULT 500,
  PRIMARY KEY (ID)
);

CREATE TABLE b_salescenter_meta (
  ID int8 GENERATED BY DEFAULT AS IDENTITY NOT NULL,
  HASH varchar(8) NOT NULL,
  HASH_CRC int NOT NULL,
  USER_ID int NOT NULL,
  META text,
  META_CRC int NOT NULL,
  PRIMARY KEY (ID)
);
CREATE UNIQUE INDEX ux_b_salescenter_meta_hash ON b_salescenter_meta (hash);
CREATE INDEX ix_b_salescenter_meta_meta_crc ON b_salescenter_meta (meta_crc);

CREATE TABLE b_salescenter_page_param (
  ID int GENERATED BY DEFAULT AS IDENTITY NOT NULL,
  PAGE_ID int NOT NULL,
  FIELD varchar(255) NOT NULL,
  PRIMARY KEY (ID)
);
CREATE INDEX ix_b_salescenter_page_param_page_id ON b_salescenter_page_param (page_id);
