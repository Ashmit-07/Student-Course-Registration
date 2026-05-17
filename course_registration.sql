-- =========================
-- DATABASE CREATION
-- =========================
CREATE DATABASE course_registration;
USE course_registration;

-- =========================
-- DEPARTMENT TABLE
-- =========================
CREATE TABLE Department (
    Department_ID INT AUTO_INCREMENT PRIMARY KEY,
    Department_Name VARCHAR(100),
    Office_Location VARCHAR(100)
);

-- =========================
-- INSTRUCTOR TABLE
-- =========================
CREATE TABLE Instructor (
    Instructor_ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100),
    Email VARCHAR(100),
    Department_ID INT,
    FOREIGN KEY (Department_ID) REFERENCES Department(Department_ID)
);

-- =========================
-- STUDENT TABLE
-- =========================
CREATE TABLE Student (
    Student_ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100),
    Address VARCHAR(200),
    Phone VARCHAR(15),
    Email VARCHAR(100),
    Department_ID INT,
    FOREIGN KEY (Department_ID) REFERENCES Department(Department_ID)
);

-- =========================
-- COURSE TABLE
-- =========================
CREATE TABLE Course (
    Course_ID INT AUTO_INCREMENT PRIMARY KEY,
    Course_Name VARCHAR(100),
    Credits INT,
    Department_ID INT,
    Instructor_ID INT,
    FOREIGN KEY (Department_ID) REFERENCES Department(Department_ID),
    FOREIGN KEY (Instructor_ID) REFERENCES Instructor(Instructor_ID)
);

-- =========================
-- SEMESTER TABLE
-- =========================
CREATE TABLE Semester (
    Semester_ID INT AUTO_INCREMENT PRIMARY KEY,
    Semester_Name VARCHAR(50),
    Academic_Year VARCHAR(10)
);

-- =========================
-- REGISTRATION TABLE
-- =========================
CREATE TABLE Registration (
    Registration_ID INT AUTO_INCREMENT PRIMARY KEY,
    Student_ID INT,
    Course_ID INT,
    Semester_ID INT,
    Registration_Date DATE,
    FOREIGN KEY (Student_ID) REFERENCES Student(Student_ID),
    FOREIGN KEY (Course_ID) REFERENCES Course(Course_ID),
    FOREIGN KEY (Semester_ID) REFERENCES Semester(Semester_ID)
);

-- =========================
-- UNIQUE CONSTRAINT (Prevent duplicate registration)
-- =========================
ALTER TABLE Registration 
ADD UNIQUE (Student_ID, Course_ID, Semester_ID);

-- =========================
-- INSERT DATA
-- =========================

-- Department
INSERT INTO Department (Department_Name, Office_Location) VALUES
('Computer Science and Engineering', 'Block A'),
('Electronics and Communication Engineering', 'Block B');

-- Instructor
INSERT INTO Instructor (Name, Email, Department_ID) VALUES
('Dr. Anil Gupta', 'gupta@example.com', 1),
('Dr. Kavita Nair', 'nair@example.com', 2);

-- Student
INSERT INTO Student (Name, Address, Phone, Email, Department_ID) VALUES
('Ashmit Pradhan', 'Bhubaneswar', '9876543210', 'ashmit@example.com', 1),
('Jestin Jaison', 'Kochi', '9876543211', 'jestin@example.com', 1),
('Bhabadeep Behera', 'Cuttack', '9876543212', 'bhabadeep@example.com', 2);

-- Course
INSERT INTO Course (Course_Name, Credits, Department_ID, Instructor_ID) VALUES
('Database Management Systems', 4, 1, 1),
('Operating Systems', 4, 1, 1),
('Digital Electronics', 3, 2, 2);

-- Semester
INSERT INTO Semester (Semester_Name, Academic_Year) VALUES
('Semester 1', '2025-2026'),
('Semester 2', '2025-2026');

-- Registration
INSERT INTO Registration (Student_ID, Course_ID, Semester_ID, Registration_Date) VALUES
(1, 1, 1, '2026-02-10'),  -- Ashmit → DBMS
(2, 2, 1, '2026-02-10'),  -- Jestin → OS
(3, 3, 1, '2026-02-11');  -- Bhabadeep → Digital Electronics