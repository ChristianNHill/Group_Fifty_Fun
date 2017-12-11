insert into school (id, name) 
	values 
	(1,"CU Boulder"),
	(2,"Colorado State University"),
	(3,"Mines");
insert into class (id, school_id, name, department_code, class_code)
	values
	(1, 1, "Software Development Methods and Tools", "CSCI", 3308),
	(2, 1, "Computer Systems", "CSCI", 2400),
	(3, 1, "Discrete Structures", "CSCI", 2824),
	(4, 1, "Calculus 3", "MATH", 2400),
	(5, 2, "Personal Computing", "CS", 110),
	(6, 2, "Theory for Introductory Programming", "CS", 122),
	(7, 2, "Interactive Programming with Java", "CS", 150),
	(8, 2, "Introduction to Unix", "CS", 155),
	(9, 2, "Introduction to C Programming I", "CS", 156),
	(10, 2, "Introduction to C Programming II", "CS", 157),
	(11, 3, "Data Structures", "CSCI", 262),
	(12, 3, "Special Topics", "CSCI", 298),
	(13, 3, "Introduction to the Linux Operating System", "CSCI", 274);
/*
insert into user (id, name, email, password)
	values
	(1, "Josh", "josh@email.com", "password"),
	(2, "Matt", "matt@eamil.com", "password"),
	(3, "Munta", "munta@email.com", "password"),
	(4, "Chris", "DataDaddy@email.com", "password");
	*/
insert into post (id, user_id, class_id, title, content, votes)
	values
	(1, 1, 2, "Attack Lab Help", "Can someone explain how to solve phase 5???", 3),
	(2, 4, 1, "Solutions to HW 3", "The solutions are blah blah blah ect.", 1),
	(3, 1, 4, "HW 8 #52 solution", "You just have to set up the integral, not evaluate it so this question is fairly simple.", 1);
insert into comment (id, post_id, user_id, content)
	values
	(1, 3, 2, "Thanks"),
	(2, 1, 2, "Yeah idk"),
	(3, 1, 4, "I think phase 5 is extra credit anyway");
insert into vote (id, link_id, user_id, value)
	values
	(1, 1, 2, 1),
	(2, 1, 3, 1),
	(3, 1, 4, 1),
	(4, 2, 1, 1),
	(5, 3, 3, 1);