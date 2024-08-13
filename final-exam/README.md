
# Final Exam: Employee Portal

This project is an Employee Portal that allows users to register and login. The portal consists of a front-end and back-end integrated with a MySQL database, all orchestrated using Docker.

## Folder Structure

```
final-exam
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
│       └── favicon.ico
│   └── includes
│       ├── global-footer.php
│       ├── global-navbar.php
│       ├── head.php
│       └── js-dependencies.php
│   ├── .env
│   ├── db_connect.php
│   ├── index.php
│   ├── login.php
│   ├── logout.php
│   ├── process_login.php
│   ├── process_register.php
│   └── register.php
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
   cd final-exam
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
  - **includes/global-footer.php:** Global footer.
  - **includes/global-navbar.php:** Global navbar.
  - **includes/head.php:** Global head element.
  - **includes/js-dependencies.php:** Global script references.
  - **db_connect.php:** Database connection script.
  - **index.php:** Homepage of the Employee Portal.
  - **login.php:** User login page.
  - **logout.php:** User logout page.
  - **process_login.php:** Processes the form submission for login.
  - **process_register.php:** Processes the form submission for register.
  - **register.php:** User register page.

### Database Initialization

- **init.sql:** SQL script to initialize the database schema.

## Usage

1. **Register:**
   - Create a new account using the register page.

2. **Login:**
   - Log in using your credentials.

## License

This project is licensed under the MIT License.

## Acknowledgements

- This project uses [Bootstrap](https://getbootstrap.com/) for styling.
- Docker configuration is inspired by [phpdocker.io](https://phpdocker.io/).
- This project was hosted on [InfinityFree](https://www.infinityfree.com/).
