# Elastic & Kibana Watch Project
This project aims at doing technology watch on Elasticsearch, configuration in a Symfony project.

## Installation

For start the project, simply run the command `docker-compose up -d` at the root of the project.

Enter the `elastic_symfony` container with command `docker exec -it elastic_symfony bash;`.

Install the dependencies with `composer install` in container.

Apply migrations with `sf doctrine:migrations:migrate`

Generate fixtures posts (10 000) with `sf doctrine:fixtures:load`

Populating the Elasticsearch index `sf fos:elastica:populate`

Run project on `http://elastic-watch.loc:8012`

Run Kibana on `http://elastic-watch.loc:5601/`