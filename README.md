# Password Manager
Selam, özel bilgilerinizin başkalarının eline geçmesini istemiyorsanız bu şifre yönetim uygulamasını kullanabilirsiniz. 
Hi, you can use this password manager app if you do not want your private information to be captured by others.
# Getting  started
## Installation
Please check the official laravel installation guide for server requirements before you start. [Official  Documentation](https://laravel.com/docs/6.x#installation)
Clone the repository
    git clone git@github.brnysn/proje.git
Switch to the repo folder
    cd proje
Install all the dependencies using composer
    composer install
Copy the example env file and make the required configuration changes in the .env file
    cp .env.example .env
Generate a new application key
    php artisan key:generate
Run the database migrations (**!! Set  the  database  connection details  and  smtp  mail  informations  in  .env  before  migrating !!**) [Environment  variables](#environment-variables) 
Start the local development server or use Valet instead.
    php artisan serve
You can now access the server at http://localhost:8000
**TL;DR  command  list**
    git clone git@github.brnysn/proje.git
    cd proje
    composer install
    cp .env.example .env
    php artisan key:generate
**Make  sure  you  set  the  correct  database  connection  information  before  running  the  migrations** [Environment  variables](#environment-variables)
    php artisan migrate
    php artisan serve
## Environment  variables
**Set the DB information, app name, timezone and mail settings.**
- `.env`  -  Environment  variables  can  be  set  in  this  file or in `/config` folder
***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.
## Contact
If you have questions or feedback don't hesitate to mail me on : [yasin@brnysn.com](mailto:yasin@brnysn.com)
----------
