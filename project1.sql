DROP DATABASE IF EXISTS hauntingInfo;
go
CREATE DATABASE hauntingInfo;
go
USE hauntingInfo;
go


CREATE TABLE employee
(
    employeeID INT NOT NULL PRIMARY KEY identity, --change auto increment to identity 
    fristName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL
);


CREATE TABLE visitor
(
    visitorID INT NOT NULL PRIMARY KEY identity,
    vistorName VARCHAR(255) NOT NULL,
    vistorPhone VARCHAR(15) NOT NULL,
    vistorEmail VARCHAR(255) NOT NULL,
    vistorEmailButton BIT NOT NULL,
    vistorComment VARCHAR(500) NOT NULL,
);



INSERT INTO employee
(fristName, lastName)
VALUES
('Buster', 'Bronco'), 
('Joeb', 'Adams'),
 ('Lane', 'Chadwick'), 
 ('Jeff', 'Bezos'), 
 ('Arnold','Lebron'), 
 ('Eric', 'Walter'), 
 ('Timmy', 'Turner'),
  ('Bruce', 'Wanye'), 
  ('Mario', 'Mario'),
  ('Joesph', 'Fireseed'),
  ('Achilles','Brad'),
  ('Blue', 'Bear'),
  ('Jeff', 'Goldblom'),
  ('Alan', 'Grant'),
  ('Hugh', 'Jackman'),
  ('Tom', 'Hardy'),
  ('Fighting', 'Pickle'),
  ('King','Kong'),
  ('Godzilla', 'Japan'),
  ('Brock', 'Chadwick'),
  ('Kim', 'Berly');
  go

 
  INSERT INTO visitor
  (vistorName, vistorPhone, vistorEmail, vistorEmailButton, vistorComment)
  VALUES
  ('Mickey Mouse','208-111-1234','micky@me.com','0','Good job'),
  ('Donald Duck','208-112-1234','donald@me.com','1','This place sucks'),
  ('Daffy Duck','208-113-1234','daffy@me.com','1','Love what you are doing'),
  ('Elmer Fudd','208-114-1234','elmer@me.com','0','Wheres the rabbits?'),
  ('Daisy Mario','208-115-1234','daisy@me.com','0','I was Scared'),
  ('Solid Snake','208-116-1234','john@me.com','1','Snake!!'),
  ('Bowser Dragon','208-117-1234','bowser@me.com','1','I hate mario'),
  ('John Madden','208-118-1234','john@me.com','0','Now this is football'),
  ('Setphen Smith','208-119-1234','smith@me.com','1','You are wrong'),
  ('Max Kellerman','208-120-1234','max@me.com','0','No im right'),
  ('Turok Dino','208-121-1234','turok@me.com','0','I am turok'),
  ('goofy dog','208-122-1234','goof@me.com','1','Yuck'),
  ('Barrack Obama','208-123-1234','barrack@me.com','0','freedom matters'),
  ('George Bush','208-124-1344','george@me.com','1','They have weapons'),
  ('Bill Clinton','208-125-1345','Bill@me.com','1','I did not'),
  ('Dick Cheney','208-126-1234','dick@me.com','0','I shot that guy'),
  ('Tom Bombadill','208-127-1234','tom@me.com','0','where did the hobbits go'),
  ('Bill Games','208-128-1345','billg@me.com','0','where did the my games go'),
  ('Tom Brady','208-129-1234','brady@me.com','0','where are my rings'),
  ('Arron Rodgers','208-111-1514','rodgers@me.com','1','no where are my rings'),
  ('Lamar Jackson','208-555-1549','Jackson@me.com','0','damn i suck');
  go;

  drop procedure if exists InsertVisitor
  go

   create procedure InsertVisitor
	 @vistorName varchar(255), @vistorPhone varchar(255), @vistorEmail varchar(255), @vistorEmailButton bit, @vistorComment varchar(500)
	 as
	 insert into visitor
	  (vistorName , vistorPhone, vistorEmail, vistorEmailbutton, vistorComment )
	 VALUES
	 (@vistorName, @vistorPhone, @vistorEmail, @vistorEmailbutton, @vistorComment)
	 go

	 execute InsertVisitor 'Lamar Jackson','208-555-1549','Jackson@me.com',0,'damn i suck'

	 CREATE USER [EJApp] For LOGIN [EJApp] WITH DEFAULT_SCHEMA=[dbo]
	 go
	 grant execute on InsertVisitor to EJApp
	 go

