
# Assignment 2: Employee Portal

This project is an Employee Portal that allows users to track projects and manage other employee information. The portal consists of a front-end and back-end integrated with a MySQL database, all orchestrated using Docker.

## Folder Structure

```
assignment-2
├── phpdocker
│   └── nginx
│       └── nginx.conf
│   └── php-fpm
│       ├── Dockerfile
│       └── php-ini-overrides.ini
│   ├── README.html
│   └── README.md
├── public
│   └── css
│       └── style.css
│   └── images
│       ├── employee-logo.png
│       ├── favicon.ico
│       └── user.png
│   └── includes
│       ├── global-footer.php
│       ├── global-navbar.php
│       ├── head.php
│       └── js-dependencies.php
│   └── uploads
│       └── 669ee848c4da57.40529630.png
│   ├── .env
│   ├── db_connect.php
│   ├── delete_employees.php
│   ├── delete_projects.php
│   ├── form_employees.php
│   ├── form_projects.php
│   ├── index.php
│   ├── logout.php
│   ├── process_employees.php
│   ├── process_projects.php
│   ├── process_sign_in.php
│   ├── process_sign_up.php
│   ├── sign_in.php
│   ├── sign_up.php
│   ├── view_employees.php
│   └── view_projects.php
├── .gitignore
├── docker-compose.yml
└── init.sql
```

## Getting Started

### Prerequisites

- Docker
- Docker Compose

### Setup

1. **Clone the repository:**
   ```sh
   git clone <repository-url>
   cd assignment-2
   ```

2. **Set Up Environment Variables:**
   - Ensure you have the following environment variables set in your GitHub repository secrets or locally in a `.env` file:
     ```
     DB_SERVER=mysql
     DB_USERNAME=user_app
     DB_PASSWORD=J5E7oPNxK9EaaozTL9YP
     DB_NAME=employee_portal_db
     ```

3. **Initialize the Database:**
   - The `init.sql` file will be automatically executed to set up the database schema when the MySQL container starts.

4. **Start the Docker Containers:**
   ```sh
   docker-compose up -d
   ```

5. **Access the Application:**
   - Open your browser and navigate to `http://localhost:61000` to access the Employee Portal.

## File Descriptions

### Docker Configuration

- **docker-compose.yml:** Defines the services, environment variables, and volumes for the application.
- **phpdocker:** Contains the configurations for the PHP and NGINX services.

### Application Code

- **public:** Contains the PHP files for the site.
  - **images/employee-logo.png:** Logo used in the navigation bar.
  - **images/favicon.ico:** Favicon used in the site.
  - **images/user.png:** Default user picture.
  - **includes/global-footer.php:** Global footer.
  - **includes/global-navbar.php:** Global navbar.
  - **includes/head.php:** Global head element.
  - **includes/js-dependencies.php:** Global script references.
  - **uploads/669ee848c4da57.40529630.png:** Sample of uploaded user picture.
  - **db_connect.php:** Database connection script.
  - **delete_employees.php:** Script to handle the deletion of employee.
  - **delete_projects.php:** Script to handle the deletion of project.
  - **form_employees.php:** Form for adding/editing employees.
  - **form_projects.php:** Form for adding/editing projects.
  - **index.php:** Homepage of the Employee Portal.
  - **logout.php:** User logout page.
  - **process_employees.php:** Processes the form submission for adding/editing employees.
  - **process_projects.php:** Processes the form submission for adding/editing projects.
  - **process_sign_in.php:** Processes the form submission for sign-in.
  - **process_sign_up.php:** Processes the form submission for sign-up.
  - **sign_in.php:** User sign-in page.
  - **sign_up.php:** User sign-up page.
  - **view_employees.php:** Displays the employees.
  - **view_projects.php:** Displays the projects.

### Database Initialization

- **init.sql:** SQL script to initialize the database schema.

## Usage

1. **Sign Up:**
   - Create a new account using the sign-up page.

2. **Sign In:**
   - Log in using your credentials.

3. **Add Employees:**
   - Navigate to the "Add Employees" page to create new employees.

4. **View Employees:**
   - Navigate to the "View Employees" page to see all employees.

5. **Edit Employees:**
   - Use the edit option on the "View Employees" page to modify an employee.

6. **Delete Employees:**
   - Use the delete option on the "View Employees" page to remove an employee.

7. **Add Projects:**
   - Navigate to the "Add Projects" page to create new projects and associate them with employees.

8. **View Projects:**
   - Navigate to the "View Projects" page to see all projects.

9. **Edit Projects:**
   - Use the edit option on the "View Projects" page to modify an project.

10. **Delete Projects:**
   - Use the delete option on the "View Projects" page to remove a project.

## License

This project is licensed under the MIT License.

## Acknowledgements

- This project uses [Bootstrap](https://getbootstrap.com/) for styling.
- Docker configuration is inspired by [phpdocker.io](https://phpdocker.io/).
- This project was hosted on [InfinityFree](https://www.infinityfree.com/).
