CREATE TABLE user
(
    id        INT PRIMARY KEY NOT NULL,
    username  varchar(32)     NOT NULL,
    password  varchar(128)    NOT NULL,
    lastLogin timestamp
);
CREATE TABLE presentation
(
    id               int PRIMARY KEY NOT NULL,
    name             varchar(64)     NOT NULL,
    theme            varchar(64)     NOT NULL,
    description      varchar(256),
    userId           int             NOT NULL,
    presentationCode varchar(16)     NOT NULL,
    lastActivity     TIMESTAMP,
    FOREIGN KEY (userId) REFERENCES user (id)
);
CREATE TABLE session
(
    id             int PRIMARY KEY NOT NULL,
    presentationId int             NOT NULL,
    startTime      TIMESTAMP,
    endTime        TIMESTAMP,
    FOREIGN KEY (presentationId) REFERENCES presentation (id)
);
CREATE TABLE Question
(
    id                    int PRIMARY KEY NOT NULL,
    username              varchar(32)     NOT NULL,
    question              varchar(256)    NOT NULL,
    participantIdentifier varchar(16)     NOT NULL,
    sessionId             int             NOT NULL,
    timeStamp             timestamp,
    FOREIGN KEY (sessionId) REFERENCES session (id)
)