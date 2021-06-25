# Title: CRUD
- Repository: `crud`
- Type of Challenge: `Learning challenge`
- Duration: `4 days`
- Deployment strategy : `NA`
- Team challenge : `pairs`

## What did I learn?
- Structuring a project
- Importing data from database
- Apply basic OOP principles
- Learning how to use an MVC model in a project 
- Adding Loaders
- CRUD-principles
- Linking to other pages

## Learning objectives
- To be able to connect to a database
- To be able to write a simple Create, Read, Update & Delete (CRUD) application
- Use a provided MVC structure to work into

## Struggles?
- making one class only for each object. That's the point of OOP. It all works but I realize how I can improve my code when it comes to scalability 
- Understanding how a controller works in MVC and how it communicates with the model and the view

## The mission
Create a CRUD system to store student, teacher and class information in the database. You do not need to provide any login for this script, everybody can change and view anything!

## Must-have features
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

## Fields
On the general overview table you can yourself decide what would be useful information to show. On the detailed overview you have to provide the following information:

- Student
    - Name
    - Email
    - Class (with clickable link)
    - Assigned teacher (clickable link - relation via class)
- Teacher
    - Name
    - Email
    - List of all students currently assigned to him (clickable link)
- Class
    - Name class (Giertz, Lamarr, ...)
    - Location (Antwerp, Gent, Genk, Brussels, Liege)
    - Assigned teacher (clickable link)
    - List of assigned students (clickable link)

## Plan of attack
Monday 21/06
- [x] understanding what is asked
- [x] making plan of action
- [x] making ORM
- [x] creating tables  
- [x] complete setup MVC model
- [x] basic layout - view
- [x] fetching all entities of all tables into homepage 
- [x] making classes
- [x] transforming sql data to objects

Tuesday 22/06
- [x] adding css to view/I worked with bootstrap
- [x] linking the create button to a new page 
- [x] linking detail button to a new page and display all details 

Wednesday 23/06
- [x] create all extra pages for teachers/class
- [x] making routing comple on index page (if(isset($_GET.. ->   load controller)
- [x] making all functions in loader for students to complete information for (create,  adjust, detail)
- [x] setting up controller  

Thursday 24/06
- [x] did the same for teachers
- [x] did the same for class
- [ ] clickable links

Friday 25/06
- [x] trying to understand how I can improve my code for the next assignment (using OOP/databases), right now everything works but its not really scalable + I'm missing the point of OOP by creating multiple classes for the thing I want to display
     >> by creating only one class and using setters in that class instead of making a new class for the thing I want to display
     >> seperate file for loader (not just writing it in the same file as the Model Class Student e.g.) 
- [x] editing code => counter some minor problems
- [x] writing readme
- [x] adding comments
- [x] final push
