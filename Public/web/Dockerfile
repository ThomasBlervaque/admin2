FROM debian

ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get upgrade -y
RUN apt-get install net-tools iproute2 iputils-ping dnsutils curl nano -y

RUN apt-get install apache2 php php-cli php-mysql libapache2-mod-php -y

COPY ./index.html /var/www/html/www/
COPY ./b2b.php /var/www/html/b2b/
COPY ./www.conf /etc/apache2/sites-available/
COPY ./b2b.conf /etc/apache2/sites-available/

# Port 443
RUN apt-get install -y software-properties-common
RUN apt-get install -y python3-certbot-apache

COPY ./apache2.conf /etc/apache2/

RUN a2ensite www.conf && a2ensite b2b.conf
RUN service apache2 start

RUN a2enmod ssl
RUN service apache2 restart

# certbot --apache
WORKDIR /var/www/

CMD [ "apache2ctl", "-D", "FOREGROUND" ]