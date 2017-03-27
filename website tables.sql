
create table user_profile(
User_ID int unsigned not null primary key,
first_name varchar(30) not null,
last_name varchar(30) not null,
email varchar(70) not null unique key,
score int null,
password varchar(70) not null);

Create table task_Profile(
Task_ID int unsigned Not null auto_increment primary key,
user_ID int unsigned not null,
Task_title varchar(100) not null,
page_count int unsigned not null,
word_count int unsigned not null,
claim_deadline date not null,
completion_deadline date null,
time_created TIMESTAMP,
task_description varchar(500) not null,
file_Format int not null);

Create table task_status(
task_ID int unsigned not null unique key,
status_ID int not null,
time_stamp timestamp);
Create table task_type(
task_ID int unsigned not null unique key,
type_ID int unsigned not null);
Create table task_tags(
task_ID int unsigned not null unique key,
tag_ID int unique not null);
Create table reviewed_tasks(
task_ID int unsigned not null unique key,
user_ID int unsigned not null unique key,
review varchar(1000));
Create table claimed_tasks(
task_ID int unsigned not null,
user_ID int unsigned not null,
ClaimedTask_ID int unsigned not null primary key);
Create table flagged_Tasks(
task_ID int unsigned not null unique key,
user_ID int unsigned not null unique key,
reason varchar(100) not null);
Create table banned_Users(
user_ID int unsigned not null unique key,
Moderator_ID int unsigned not null unique key,
reason varchar(100) not null);
Create table majors(
user_ID int unsigned not null unique key,
major_Area int not null);
