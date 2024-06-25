
# Data Feed Application

This application processes a local XML file (`feed.xml`) and inserts the data into a PostgreSQL database. The setup uses Docker for containerization.

## Prerequisites

Before you begin, ensure you have Docker installed on your system. You can download and install Docker from [here](https://www.docker.com/get-started).

## Setup and Run

1. **Clone the Repository:**

   ```bash
   git clone <repository-url>
   cd <repository-directory>
   ```

2. **Build and Start Docker Containers:**

   Run the following command to build and start the Docker containers:

   ```bash
   docker-compose up -d
   ```

   This command will start the necessary containers and create the `products` table in the PostgreSQL database using the `init.sql` file.

3. **Access the PHP Container:**

   Once the containers are running, access the PHP container:

   ```bash
   docker exec -it myapp_php bash
   ```

4. **Run the XML Parsing Script:**

   Inside the PHP container, run the following command to execute the script that parses the `feed.xml` file and inserts the data into the `products` table:

   ```bash
   php index.php
   ```

## Running Tests

To run the tests, execute the following command inside the PHP container:

```bash
vendor/bin/phpunit
```

This will run the PHPUnit tests and provide the results in the terminal.

## Summary

- Install Docker.
- Run `docker-compose up -d` to set up and start the application.
- Access the PHP container and execute `php index.php` to parse the XML file.
- Run `vendor/bin/phpunit` to execute the tests.

This setup ensures the application is containerized, easy to deploy, and tested thoroughly.
