# kzas-test

##### Url de acesso:
    https://lucassouza.dev/kzas-test/
    
##### Usuarios para acesso:
    usuario: admin@admin.com
    senha: password
    
#### Rodando localmente
    git clone https://github.com/LucasSouzaa/kzas-test.git
    
###### Projeto Laravel
    
    cd administration-panel
    
    docker-compose up -d
    
    docker exec -it administration-panel_php_1 /bin/sh
    composer install
    php artisan migrate --seed
    
    enjoy!
    
###### Projeto Api
    
    cd api
    
    docker-compose up -d
    
    docker exec -it php-fpm /bin/sh
    cd /www
    composer install
    
    enjoy!
   

    
