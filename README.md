# SleekwareDB API

SleekwareDB API is a backend for SleekwareDB. SleekwareDB is Web Interface for [SleekDB](https://github.com/rakibtg/SleekDB), that manage flat file NoSQL like database from web application interface.

> DISCLAIMER: This repository is under development

## Feature Need to Implement
- Authentication
    - **Email and Password Authentication**: Provides a simple email and password authentication mechanism to register and login users. This feature includes secure password hashing and storage, as well as email verification and password reset workflows.
    - **API Key Authentication**: Allows user to generate and manage API keys that can be used to authenticate requests to our app's API. This feature is useful for integrating with other services or allowing third-party developers to access our API.
- Database
    - **Collections**: A collection is a group of documents that share a similar structure. It can be used to store data like user profiles, blog posts, product listings, and more.
    - **Documents**: A document is a JSON object that represents a record in a collection. It can contain any number of key-value pairs, and can be queried and updated using various API methods.
    - **Fields**: A field is a key-value pair that defines a property of a document. Fields can have various types, including strings, numbers, booleans, arrays, and objects.
    - **Queries**: Provides a powerful query engine that allows user to filter and sort documents based on their fields. User can query documents using various comparison operators, logical operators, and sorting options.
    - **Indexes**: Allows user to create indexes on fields in user collections to speed up query performance. Indexes can be created for individual fields, as well as for combinations of fields.
    - **Security Rules**: Provides a set of security rules that allow user to control access to their database collections. User can define rules that restrict read, write, or delete operations based on the user's authentication status, IP address, or other criteria.
    - **Realtime Database**: Also supports real-time updates using WebSockets. USer can subscribe to changes in their database collections and receive real-time notifications whenever a document is added, updated, or deleted.
- Storage
    - **File Storage**: Provide storage feature allows user to securely store and manage files of any size, type, and quantity. You can use the Appwrite API to upload, download, and delete files.
    - **File Management**: Provides an interface to manage user files and folders. User can create, delete, and move files and folders using the API or the Appwrite dashboard.
    - **Security**: Storage feature provides secure file storage with access control, encryption, and firewall protection. You can set up rules to define which users can access certain files, and which actions they can perform on them.
    - **Webhooks**: Storage feature supports webhooks that allow user to monitor file events and perform actions when specific events occur. For example, user can trigger an action when a new file is uploaded or when a file is deleted.

## Usage

1. Cloning Project

**SSH**
```bash
git clone git@github.com:SleekwareDB/sleekwaredb-api.git
```
**HTTPS**
```bash
git clone https://github.com/SleekwareDB/sleekwaredb-api.git
```

**GitHub CLI**
```bash
gh repo clone SleekwareDB/sleekwaredb-api
```

2. Install & Running

```bash
cd sleekwaredb-api
composer install
docker-compose up
```

Application running on port `8888`, you can try to make `GET` request to test the application running `curl http://localhost:8888` or using [REST Client](https://marketplace.visualstudio.com/items?itemName=humao.rest-client) file in `rest` directory and choose `Welcome.rest` file.

## ToDo

- Create `.devcontainer` - [**help wanted**]

## Core Dependency

- [Slim Framework v4](https://www.slimframework.com/docs/v4/) - Rest API Framework
- [SleekDB](https://github.com/rakibtg/SleekDB) - flat file NoSQL