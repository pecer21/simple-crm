## How to install 

- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__ (it has some seeded data for your testing)
- Run __php artisan adminlte:install__
- Run __php artisan vendor:publish --tag=datatables-buttons__
- Run __php artisan ui bootstrap --auth__
- Run __yarn add datatables.net-bs4 datatables.net-buttons-bs4__
- Run __yarn dev__
- That's it: launch the main URL.
