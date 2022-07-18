# install laravel and dependencies.
docker run --rm -v $(pwd):/app composer install
sudo chown -R $USER:$USER ~/gfisio/app



# nginx.conf
#mkdir -p nginx/{conf.d,ssl}