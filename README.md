Create Dir. threetier and sub app web & db and put docker-compose.yml file here aswell.
In db Dir. pate init.sql & Dockerfile.
In web Dir create code & config Dir. Under code dir paste index.html & form.html Under config dir paste default.conf
In app Dir paste submit.php and also create test.php "...... <?php phpinfo(); ?> ......"

/3arch/
├── app
│   └── code
│       ├── test.php
│       ├── submit.php
├── db
│   ├── Dockerfile
│   └── init.sql
├── docker-compose.yml
└── web
    ├── code
    │   ├── form.html
    │   └── index.html
    └── config
        └── default.conf


docker-compose up -d
docker ps OR docker-compose ps
