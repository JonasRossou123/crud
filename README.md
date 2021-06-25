# crud

Must-have features

You have to provide the following pages for Students, Teacher & Class.

- A general overview of all records of that entity in a table   
    Each row should have a button to edit or delete the entity
    This page should have a "create new" button
- A detailed overview of the selected entity
    This should include a button to delete this entity
    Edge case: A teacher cannot be removed if he is still assigned to a class
    Edge case: If you remove a class, make sure to remove the link between the students and the class.
- A page to edit an existing entity
- A page to create a new entity

Fields:

On the general overview table you can yourself decide what would be useful information to show. On the detailed overview you have to provide the following information:

Student
    Name
    Email
    Class (with clickable link)
    Assigned teacher (clickable link - relation via class)
Teacher
    Name
    Email
    List of all students currently assigned to him (clickable link)
Class
    Name class (Giertz, Lamarr, ...)
    Location (Antwerp, Gent, Genk, Brussels, Liege)
    Assigned teacher (clickable link)
    List of assigned students (clickable link)

Monday 21/06
- understanding what is asked
- making plan of action
- making ORM
- creating tables  
- complete setup MVC model
- basic layout - view
- fetching all entities of all tables into homepage 
- making classes 
- from sql data to class instances

Tuesday 22/06
- adding css to view
- linking the create button to a new page 
- linking detail button to a new page and display all details
- 

Wednesday 23/06
- create all extra pages for teachers/class

Thursday 24/06
- did the same for teachers
- did the same for class

Friday 25/06
-
