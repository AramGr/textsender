#### Requirements
- docker 
***
## Installation
Go to the project directory and build the docker container.
This can take some time

```bash
docker-compose up -d
```

Migration is not implemented yet, so we have to create the database manually.

Enter into the docker mysql container to create the database.

```bash
docker exec -it textarea_form_mysql bash
```
Now when you are in the container you need to connect to the mysql.

```bash
mysql -u root -p
```
Here you need to enter the password. You need to take it from `config.php` file.

Create database with the query:

```bash
CREATE DATABASE text_bank;
```

Start using the database with query:

```bash
USE text_bank;
```

Finally, add the table with query:

```bash
CREATE TABLE texts (id int NOT NULL AUTO_INCREMENT, text text NOT NULL, session_id VARCHAR(255) NOT NULL, PRIMARY KEY (id));
CREATE INDEX session_id ON texts (session_id);
```

The Application is running on port `4000`. Access the application with url http://localhost:4000/
