-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema finalproject
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema finalproject
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `finalproject` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `finalproject` ;

-- -----------------------------------------------------
-- Table `finalproject`.`campus`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `finalproject`.`campus` (
  `CampusName` VARCHAR(45) NOT NULL,
  `Address` VARCHAR(45) NOT NULL,
  `PostalCode` VARCHAR(45) NOT NULL,
  `City` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`CampusName`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `finalproject`.`faculty`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `finalproject`.`faculty` (
  `Name` VARCHAR(45) NOT NULL,
  `Dean` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Name`),
  UNIQUE INDEX `Name_UNIQUE` (`Name` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `finalproject`.`advisingoffice`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `finalproject`.`advisingoffice` (
  `FacultyName` VARCHAR(45) NOT NULL,
  `Hours` VARCHAR(45) NOT NULL,
  `OfficeNum` VARCHAR(45) NULL DEFAULT NULL,
  `Building` VARCHAR(45) NULL DEFAULT NULL,
  `Campus` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`FacultyName`),
  INDEX `Campus_idx` (`Campus` ASC) VISIBLE,
  CONSTRAINT `CampusName`
    FOREIGN KEY (`Campus`)
    REFERENCES `finalproject`.`campus` (`CampusName`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FacName`
    FOREIGN KEY (`FacultyName`)
    REFERENCES `finalproject`.`faculty` (`Name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `finalproject`.`person`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `finalproject`.`person` (
  `UniversityID` INT NOT NULL,
  `Fname` VARCHAR(20) NOT NULL,
  `Lname` VARCHAR(45) NOT NULL,
  `Gender` VARCHAR(45) NOT NULL,
  `DOB` VARCHAR(45) NOT NULL,
  `HouseNum` VARCHAR(45) NOT NULL,
  `Street` VARCHAR(45) NOT NULL,
  `City` VARCHAR(45) NOT NULL,
  `StartDate` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`UniversityID`),
  UNIQUE INDEX `UniversityID_UNIQUE` (`UniversityID` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `finalproject`.`advisor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `finalproject`.`advisor` (
  `UniversityID` INT NOT NULL,
  `AdvisingOfficeFaculty` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`UniversityID`),
  INDEX `OfficeFac_idx` (`AdvisingOfficeFaculty` ASC) VISIBLE,
  CONSTRAINT `OfficeFac`
    FOREIGN KEY (`AdvisingOfficeFaculty`)
    REFERENCES `finalproject`.`advisingoffice` (`FacultyName`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `UniversityID`
    FOREIGN KEY (`UniversityID`)
    REFERENCES `finalproject`.`person` (`UniversityID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `finalproject`.`buildings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `finalproject`.`buildings` (
  `CampusName` VARCHAR(45) NOT NULL,
  `BuildingName` VARCHAR(45) NOT NULL,
  `YearBuilt` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`CampusName`),
  CONSTRAINT `CampName`
    FOREIGN KEY (`CampusName`)
    REFERENCES `finalproject`.`campus` (`CampusName`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `finalproject`.`classroom`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `finalproject`.`classroom` (
  `RoomNum` INT NOT NULL,
  `Building` VARCHAR(45) NOT NULL,
  `Capacity` INT NOT NULL,
  `Campus` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`RoomNum`, `Building`),
  INDEX `CampName_idx` (`Campus` ASC) VISIBLE,
  INDEX `ClassCampus_idx` (`Campus` ASC) VISIBLE,
  CONSTRAINT `ClassCampus`
    FOREIGN KEY (`Campus`)
    REFERENCES `finalproject`.`campus` (`CampusName`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `finalproject`.`department`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `finalproject`.`department` (
  `DepartmentName` VARCHAR(20) NOT NULL,
  `Code` VARCHAR(45) NOT NULL,
  `Head` VARCHAR(45) NOT NULL,
  `Faculty` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`DepartmentName`),
  UNIQUE INDEX `Name_UNIQUE` (`DepartmentName` ASC) VISIBLE,
  UNIQUE INDEX `Code_UNIQUE` (`Code` ASC) VISIBLE,
  INDEX `DeptFaculty_idx` (`Faculty` ASC) VISIBLE,
  CONSTRAINT `DeptFaculty`
    FOREIGN KEY (`Faculty`)
    REFERENCES `finalproject`.`faculty` (`Name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `finalproject`.`professor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `finalproject`.`professor` (
  `UniversityID` INT NOT NULL,
  `Position` VARCHAR(45) NOT NULL,
  `OfficeNum` VARCHAR(45) NOT NULL,
  `Building` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`UniversityID`),
  CONSTRAINT `UniID`
    FOREIGN KEY (`UniversityID`)
    REFERENCES `finalproject`.`person` (`UniversityID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `finalproject`.`course`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `finalproject`.`course` (
  `Number` INT NOT NULL,
  `Name` VARCHAR(45) NOT NULL,
  `DeptName` VARCHAR(45) NOT NULL,
  `ProfesserUID` INT NOT NULL,
  `ClassroomNum` INT NOT NULL,
  `Building` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Name`, `Number`, `ProfesserUID`),
  UNIQUE INDEX `Name_UNIQUE` (`Number` ASC) VISIBLE,
  UNIQUE INDEX `Number_UNIQUE` (`Name` ASC) VISIBLE,
  INDEX `CourseDept_idx` (`DeptName` ASC) VISIBLE,
  INDEX `CourseRoom_idx` (`ClassroomNum` ASC) VISIBLE,
  INDEX `ProfesserID_idx` (`ProfesserUID` ASC) VISIBLE,
  CONSTRAINT `CourseDept`
    FOREIGN KEY (`DeptName`)
    REFERENCES `finalproject`.`department` (`DepartmentName`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `CourseRoom`
    FOREIGN KEY (`ClassroomNum`)
    REFERENCES `finalproject`.`classroom` (`RoomNum`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `ProfID`
    FOREIGN KEY (`ProfesserUID`)
    REFERENCES `finalproject`.`professor` (`UniversityID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `finalproject`.`student`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `finalproject`.`student` (
  `UniversityID` INT NOT NULL,
  `ExpGrad` VARCHAR(45) NOT NULL,
  `Major` VARCHAR(45) NOT NULL,
  `Minor` VARCHAR(45) NOT NULL,
  `Overall GPA` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`UniversityID`),
  CONSTRAINT `UniIDStudent`
    FOREIGN KEY (`UniversityID`)
    REFERENCES `finalproject`.`person` (`UniversityID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `finalproject`.`enrolled`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `finalproject`.`enrolled` (
  `StudentUID` INT NOT NULL,
  `CourseName` VARCHAR(45) NOT NULL,
  `CourseNum` INT NOT NULL,
  `Semester` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`StudentUID`, `CourseName`, `CourseNum`),
  INDEX `CourseName_idx` (`CourseName` ASC) VISIBLE,
  INDEX `CourseNum_idx` (`CourseNum` ASC) VISIBLE,
  CONSTRAINT `CourseName`
    FOREIGN KEY (`CourseName`)
    REFERENCES `finalproject`.`course` (`Name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `CourseNum`
    FOREIGN KEY (`CourseNum`)
    REFERENCES `finalproject`.`course` (`Number`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `EnrolledID`
    FOREIGN KEY (`StudentUID`)
    REFERENCES `finalproject`.`student` (`UniversityID`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `finalproject`.`prerequisites`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `finalproject`.`prerequisites` (
  `CourseName` VARCHAR(45) NOT NULL,
  `PreReqName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`CourseName`, `PreReqName`),
  INDEX `PrereqName_idx` (`PreReqName` ASC) VISIBLE,
  CONSTRAINT `course`
    FOREIGN KEY (`CourseName`)
    REFERENCES `finalproject`.`course` (`Name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `prereq`
    FOREIGN KEY (`PreReqName`)
    REFERENCES `finalproject`.`course` (`Name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
