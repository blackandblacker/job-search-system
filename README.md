                                                                Job Search System
                                                   University PHP Frameworks -Laravel project


1.The Project consists of 3 main controllers:
-JobsController
-CompanyController
-CityController

2.Models
-Job
-City
-Company
-User

Job's Fields:
-ID
-Position
-Job Description
-City
-Cover Image

City's Fields:
-ID
-Name
-Country

Company's Fields:
-ID
-Name
-City
-Address
-Phone Number

User's Fields:
-ID
-Name
-Email
-Password
----------------------------------------------------------------------------------------------------------------------------------
//How to use the application

1.If you want to be able to have full functionallity you have to first register 
  by click the register button in the top-right corner of the page and fill in your info.

2.When registered you will be redirected to the Home page where you will see the links
  to all of the lists(Jobs,Companies,Cities).

3.Upon clicking you will again be redirected to one of the pages based on which one you
  clicked on.

4.There you will see all the instaces of the different objects available in the database and you will have full
  CRUD funtionality over them.

5.To Create a new instance just click on the creat button and fill in the fields(note they have validation).
6 To see the other buttons and the full information of your instance click on the show button.
7.There you'll see all the buttons like (Go back,Edit,Delete) all the buttons are self explanatory.

-Edit will allow you change the information in all of the instace's fields if you made a mistake 
 or just wanted to change something.

-Go Back returns you to the page with all the instances.
-Delete removes the instaces from the database.

8.Only in the Jobs show page you will have an option to upload a file of your choosing.

9.There is a search bar where you can search for a specific instance.
  (you can search by one or more of the fields)

Example with a speficif job(you can search by city and name of the position) .
  
----------------------------------------------------------------------------------------------------------------------------------

All of the fields in the create and edit forms are validated and the create/edit methods will not be executed
if all the fields are not filled.

User authentication is implemented so if your a guest who just wants to view all the information
or if you want to have full functionality a registration is required.


