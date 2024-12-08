
## The Football Scores

Applications showing football scores from different leagues and teams with live updates.

## How to run 
Clone .env.example to .env and fill in the required environment variables for docker-compose to run the application.
```angular2html
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=football_game_scores
DB_USERNAME=example_user
DB_PASSWORD=example_password
```
cd into the project directory and run the following command
```docker compose up```
