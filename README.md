## Installation (to demo)
1. Install Docker Desktop (https://www.docker.com/products/docker-desktop/) if not installed
2. Open Docker
3. Add the following to your .bashrc or zshrc file to create an alias for sail: `alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'`
4. From the project folder, run `sail up -d`
5. Run `sail cp .env.example .env`
6. Run `sail composer install`
7. Run `sail npm install`
8. Run `sail php artisan migrate` to migrate the database 
9. Run `sail php artisan db:seed` to seed the database with test data
10. Run `sail php artisan scout:import \App\Models\Contact` to import contacts into the search database
11. Run `sail npm run build`
12. Add to `/etc/hosts` file the following entry: `127.0.0.1 phonebook.test`
13. Access the app at `phonebook.test`
14. Register for an account and get access to the app

## Contributing
- Run `sail npm run dev` to start build with hot-module reloading via Vite

## Tests
- Run `sail cp .env.example.testing .env.testing`
- Run `sail phpunit`

## Search
- Search is via Meilisearch set up on Sail. Go to http://localhost:7700/ to access search panel.

## Architecture & development considerations
1. Laravel for backend
2. Laravel Breeze with Inertia + Vue.js as minimal starter kit to scaffold authentication, registration, components. I chose Breeze because I wanted to spend more time building the frontend than building API endpoints with associated overhead(error handling, json serialization, transformers, pagination, authentication, calling API from frontend). However, would build a full-featured REST or GraphQL API for a more complex application, especially enterprise software. 
3. Vue 3 for frontend, data is passed from server to client via Inertia.
4. Tests with PHPunit - only feature tests that test for right HTTP status code right now. Would build out more robust test suite over time.
5. Meilisearch for fast, full-text search of contacts. Try searching with small typos to see matches.
6. Tailwind CSS via Laravel Breeze for CSS styling,
